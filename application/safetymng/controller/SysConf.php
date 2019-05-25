<?php
namespace app\safetymng\controller;
use think\controller;
use think\Db;
use think\Paginator;
use think\Request;

class SysConf extends PublicController
{
    public function index()
    {
        $this->assign("QuestionSourceList",db('QuestionSource')->select());
        $this->assign("ReformDeletePwd",db('SysConf')->where(array("KeyName"=>"ReformDeletePwd"))->select()[0]);
        return view('index');
    }
    public function AddQuestionSource()
    {
        $SourceName = input('SourceName');
        $CodePre    = input('CodePre');
        if(empty($SourceName)||empty($CodePre)){
            $this->assign("Warning","请输入问题来源名以及整改通知单编号前缀!");
            goto OUT;
        }

       $Ret =  db()->query("SELECT * FROM QuestionSource WHERE SourceName = ? OR CodePre = ? ",array($SourceName,$CodePre));
       if(!empty($Ret)) {
           $this->assign("Warning","问题来源名或整改通知单编号前缀已存在!");
           goto OUT;
       }

       $data["SourceName"] = $SourceName;
       $data["CodePre"]   = $CodePre;
       $data["AddTime"]   = date("Y-m-d H:i:s");
       db("QuestionSource")->insert($data);

        OUT:
            return $this->index();
    }

    public function GetQsDefaultRecvCorp($GroupCorp){
        if(empty($GroupCorp))
            return '';

        $Ret = db('SysConf')->where(array('KeyType'=>'DefaultQsRecvCorp','KeyName'=>$GroupCorp))->select()[0];
        if(empty($Ret)){
            return '';
        }else{
            return $Ret['KeyValue'];
        }
    }

    public function  showDataTypeMng($Warning=NULL){
       $DataTypeList = db('SysConf')->where(
           array('KeyType'=>'DataType',
               'CorpGroup'=>$this->GetGroupCorp()
           ))->select();
       $this->assign('DataTypeList',$DataTypeList);
       $this->assign('Warning',$Warning);
       return view('DataTypeMng');
    }

    public function AddDataType(){
        if(!$this->IsSuperCorp()){
            return '您没有增加资料类型的权限';
        }

        $DataType = input('DataType');
        if(empty($DataType)){
            $Warning = '资料类型不可为空!';
            goto OUT;
        }

        $Ret = db('SysConf')->where(
            array('KeyType'=>'DataType',
                  'KeyName'=>$DataType,
                'CorpGroup'=>$this->GetGroupCorp()
            ))->find();

        if(!empty($Ret)){
            $Warning = '资料类型:'.$DataType.'已存在!';
            goto OUT;
        }

        $id = db('SysConf')->insertGetId(array(
            'KeyType'=>'DataType',
            'KeyName'=>$DataType,
            'KeyValue'=>$DataType,
            'MdfTime'=>date('Y-m-d H:i:s'),
            'CorpGroup'=>$this->GetGroupCorp()
            ));

        if(!empty($id)){
            $Warning = '添加成功!';
        }else{
            $Warning = '添加失败!!!!';
        }


        OUT:
            return $this->showDataTypeMng($Warning);

    }

    public function DelDataType()
    {
        if (!$this->IsSuperCorp()) {
            return '您没有删除资料类型的权限';
        }

        $DataType = input("DType");

        if (empty($DataType)) {
            $Warning = '要删除的资料类型为空!';
            goto OUT;
        }
        $Ret =  db('Data')->where(array('DataType' =>$DataType))->find();
        if(!empty($Ret)){
            $Warning = $DataType.'下尚有文件存在,不允许删除!';
            goto OUT;
        }

        $Cnt = db('SysConf')->where(array(
            'KeyType'=>'DataType',
            'KeyName'=>$DataType,
            'CorpGroup'=>$this->GetGroupCorp()
        ))->delete();

        if(!empty($Cnt)){
            $Warning = '删除成功!';
        }else{
            $Warning = '删除失败!!!!';
        }

        OUT:
            return $this->showDataTypeMng($Warning);
    }

}
