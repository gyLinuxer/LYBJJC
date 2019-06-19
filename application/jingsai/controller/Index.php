<?php
namespace app\jingsai\controller;
use think\Controller;
use think\Db;
use think\Request;
class Index extends Controller
{
    public function index()
    {
        $this->assign('GroupList',db('GroupList')->order('CurFS DESC')->select());
        $this->assign('SubjectTypeList',db('Subject')->field('DISTINCT SubjectType')->select());
        return view('index');
    }

    public function  GetSubjectIDList($Type=NULL){
        $Ret['data']=db('Subject')->field('id,SubjectOKFS,SubjectType')->where(
            array('SubjectType'=>$Type,
                'IsOK'=>['exp',Db::raw(' IS NULL')]))->select();
        return json($Ret);
    }

    public function GetSubject($id=NULL){
        $row = db('Subject')->where(array('id'=>$id))->find();
        $row['SubjectContent'] = htmlspecialchars_decode($row['SubjectContent']);
        $row['SubjectAnswer']  = htmlspecialchars_decode($row['SubjectAnswer']);
        return json(['ret'=>'success','data'=>$row]);
    }

    public function showSubjectInput($id=NULL){
        if(!empty($id)){
            $Ret = db('Subject')->where(array('id'=>$id))->find();
        }
        $this->assign('Subject',$Ret);
        return view('s');
    }

    public function SubjectInput(){
        $data['SubjectType'] = input('SubjectType');
        $data['SubjectContent'] = htmlspecialchars(input('SubjectContent'));
        $data['SubjectAnswer'] = input('SubjectAnswer');
        $data['SubjectOKFS'] = input('OKFS');
        $data['SubjectNOFS'] = input('NOFS');

        foreach ($data as $k => $v){
            if($v==''){
                $Warning = $k.'不可为空';
                goto OUT;
            }
        }

        $id = input('SubjectID');
        if(!empty($id)){
            db('Subject')->where(array('id'=>$id))->update($data);
        }else{
            db('Subject')->insertGetId($data);
        }

        OUT:
            $this->assign('Warning',$Warning);
            return $this->showSubjectInput();
    }

    function GetDTUserList(){
        $data['ret'] = 'failed';
        $data['ret'] = 'success';
        $data['data']  = db('GroupList')->field('GroupName as Name')->order('GroupName ASC')->select();
        return json($data);
    }

    function AnswerSubject(){
        $SubjectID = input('CurSubjectID');
        $DTUser    = input('DTName');
        $IsOK      = input('IsOK');
        $SubjectRow = db('Subject')->where(['id'=>$SubjectID])->find();
        if(empty($SubjectRow)||!empty($SubjectRow['IsOK'])){
            goto OUT;
        }

        $FS = $IsOK=='Y'?intval($SubjectRow['SubjectOKFS']):0-intval($SubjectRow['SubjectNOFS']);
        $data['IsOK'] = $IsOK;
        $data['DTUser'] = $DTUser;
        $data['DTTime'] = date('Y-m-d H:i:s');
        db('Subject')->where(['id'=>$SubjectID])->update($data);
        db()->query('UPDATE GroupList SET CurFS = CurFS + (?) WHERE GroupName=?',[$FS,$DTUser]);


        OUT:
            return $this->redirect('/jingsai/Index');
    }

    function KF(){
        $DTUser    = input('CurDTUser');
        $KFFZ      = intval(input('KFFZ'));

        db()->query('UPDATE GroupList SET CurFS = CurFS - (?) WHERE GroupName=?',[$KFFZ,$DTUser]);

        return $this->redirect('/jingsai/Index');
    }

    function showSubjectList(){
        $this->assign('SubjectList',db('Subject')->order('SubjectType ASC ,id ASC')->select());
        return view('all');
    }
}
