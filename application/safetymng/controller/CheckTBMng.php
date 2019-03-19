<?php
namespace app\safetymng\controller;
use think\Controller;
use think\Db;
class CheckTBMng extends PublicController {
    private $PRE = 'lgy19891115';
    public  function index(){
        $this->assign('CheckDB',db('CheckBaseDB')->select());
        return view('index');
    }

    public function RMInputPre($Str){
        if(strpos($Str,$this->PRE)===0){
            return substr($Str,strlen($this->PRE)+1);
        }
        return $Str;
    }

    public function FirstHalfCheckRowMng($opType = 'Add',$rowId=0){

        $data['BaseDBID']       = $this->RMInputPre(input('CheckDB'));
        $data['ProfessionName'] = $this->RMInputPre(input('ProfessionName'));
        $data['BusinessName']   = $this->RMInputPre(input('BusinessName'));
        $data['Code1']          = $this->RMInputPre(input('Code1'));
        $data['Code2']          = $this->RMInputPre(input('Code2'));
        $data['CheckSubject']   = $this->RMInputPre(input('CheckSubject'));
        $data['CheckContent']   = $this->RMInputPre(input('CheckContent'));
        $data['CheckStandard']  = $this->RMInputPre(input('CheckStandardEdit'));
        $data['AdderName']      = session('Name');
        $data['AddTime']       = date('Y-m-d H:i:s');
        $data['IsValid']        = 'YES';

        foreach ($data as $k=>$v){
            if(empty($v)){
                $this->assign($k,'不可为空!');
                goto OUT;
            }
        }

        if($opType=='Add'){
            $Ret = db('FirstHalfCheckTB')->where($data)->select();
            if(!empty($Ret)){
                $this->assign('Warning','该条款已经存在!') ;
            }else{
                $data['OldID']        = 0;
                $id = db('FirstHalfCheckTB')->insertGetId($data);
                if($id>0){
                    $this->assign('Warning','添加成功！') ;
                }else{
                    $this->assign('Warning','添加失败！!') ;
                }
            }
        }else{//Mdf修改条款
            $oldId = input("rowId");
            if(empty($oldId)){
                $this->assign('Warning','未选择条款');
                goto OUT;
            }

            //检查修改过的条款是否已经存在
            $Ret = db('FirstHalfCheckTB')->where($data)->select();
            if(!empty($Ret)){
                $this->assign('Warning','该条款已经存在!') ;
                goto OUT;
            }

            $Ret = db('FirstHalfCheckTB')->where('id',$oldId)->setField('IsValid', 'NO');
            if(empty($Ret)){
                $this->assign('Warning','删除旧条款失败');
                goto OUT;
            }else{
                $data['OldID']        = $oldId;
                $id = db('FirstHalfCheckTB')->insertGetId($data);
                $this->assign('Warning','条款修改成功!');
                goto OUT;
            }

        }

        OUT:
            return $this->showFirstHalfCheckRowMng();
    }

    public function showFirstHalfCheckRowMng($opType = 'Add',$id=0){

        if($opType=='Mdf'){//通知前端
            $this->assign('NeedInitAllSelect','YES');
        }else{
            $this->assign('NeedInitAllSelect','NO');
        }

        $this->assign('id',$id);
        $this->assign('opType',$opType);
        $this->assign('CheckDB',db('CheckBaseDB')->select());
        return view('FirstHalfCheckRowMng');
    }

    public function SecondHalfCheckRowMng($opType = 'Add',$CheckStandardID=0,$id=0){

        $RelatedCorps_Arr = input('post.RelatedCorps/a');
        $RelatedCorps = '';
        foreach ($RelatedCorps_Arr as $v){
            if(empty($RelatedCorps)){
                $RelatedCorps= $v;
            }else{
                $RelatedCorps.='|'.$v;
            }
        }

        $data['CheckStandardID'] = input('CheckStandardID');
        $data['ComplianceStandard'] = input('ComplianceStandard');
        $data['BasisName'] = input('BasisName');
        $data['BasisTerm'] = input('BasisTerm');
        $data['RelatedCorps'] = $RelatedCorps;
        $data['CheckFrequency'] = input('CheckFrequency');
        $data['AdderName'] = session('Name');
        $data['AddTime'] = date('Y-m-d H:i:s');
        $data['IsValid'] = 'YES';

        foreach ($data as $k=>$v){
            if(empty($v)){
                $this->assign('Warning',$v.'不可为空!');
                goto OUT;
            }
        }

        if($opType=='Add'){

            $Ret = db('FirstHalfCheckTB')->where(array('id'=>$CheckStandardID,'IsValid'=>'YES'))->select();
            if(empty($Ret)){
                $this->assign('Warning','检查标准不存在!');
                goto OUT;
            }

            $id = db('SecondHalfCheckTB')->insertGetId($data);
            if(empty($id)){
                $this->assign('Warning','添加失败!');
                goto OUT;
            }else{
                $this->assign('Warning','添加成功!!');
                goto OUT;
            }
        }

        OUT:
            return $this->showSecondHalfCheckRowMng($opType,$CheckStandardID,$id);

    }

    public function showSecondHalfCheckRowMng($opType = 'Add',$CheckStandardID=0,$id=0){
        if(empty($CheckStandardID)){
            $this->assign('Warning','没有选择检查标准!');
            goto OUT;
        }

        $Ret = db('FirstHalfCheckTB')->where(array('id'=>$CheckStandardID))->select()[0];

        if(empty($Ret)){
            $this->assign('Warning','检查标准不存在!');
            goto OUT;
        }

        if(!empty($id)){
            $Ret = db('FirstHalfCheckTB')->where(array('id'=>$id,
                                                                'IsValid'=>'YES'))->select()[0];
            if(empty($Ret)){
                $this->assign('Warning','符合性判定标准不存在!');
                goto OUT;
            }else{
                $this->assign('ComplianceStandardRow',$Ret);
            }
        }

        $this->assign('CheckStandardID',$CheckStandardID);
        $this->assign('opType',$opType);
        $this->assign('id',$id);
        $this->assign('CorpList',db('UserList')->field('distinct Corp')->select());
        $this->assign('CheckStandard',$Ret['CheckStandard']);

        OUT:
            return view('SecondHalfCheckRowMng');
    }

    public function CheckRowQuery()
    {
        $CheckStandard = input('CheckStandard ');



        $data['BaseDBID']       = $this->RMInputPre(input('CheckDB'));
        $data['ProfessionName'] = $this->RMInputPre(input('ProfessionName'));
        $data['BusinessName']   = $this->RMInputPre(input('BusinessName'));
        $data['Code1']          = $this->RMInputPre(input('Code1'));
        $data['Code2']          = $this->RMInputPre(input('Code2'));
        $data['CheckSubject']   = $this->RMInputPre(input('CheckSubject'));
        $data['CheckContent']   = $this->RMInputPre(input('CheckContent'));
        $data['CheckStandard']  = $this->RMInputPre(input('CheckStandardEdit'));
        $data['AdderName']      = session('Name');
        $data['AddTime']       = date('Y-m-d H:i:s');
        $data['IsValid']        = 'YES';



       $this->assign('SecondCheckRowList', db()->query('SELECT SecondHalfCheckTB.*,FirstHalfCheckTB.CheckStandard FROM SecondHalfCheckTB JOIN FirstHalfCheckTB ON 
                        SecondHalfCheckTB.CheckStandardID = FirstHalfCheckTB.id'));
       return $this->index();
    }

}