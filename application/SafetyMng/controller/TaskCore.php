<?php
namespace app\SafetyMng\controller;
use think\db;
use think\controller;
use think\Session;

class TaskCore extends PublicController{
    public static $TaskTypes = [];
    const QUESTION_SUBMITED = '问题提交';
    const QUESTION_DEFAULT_RECEIVECORP = '质检科';

    public  function index()
    {
        $data = [];
        echo is_null($data['55'])."-->".empty($data['55']).'-->'.dump(isset($data['55']));
    }
    static  public  function CreateTask($TaskData){
        $TaskType = $TaskData['TaskType'];
        $TaskName = $TaskData['TaskName'];
        $TaskInfo = $TaskData['TaskInfo'];
        $Deadline = $TaskData['DeadLine'];
        $SenderName = $TaskData['SenderName'];
        $ReciveCorp = $TaskData['ReciveCorp'];
        $RelatedID = $TaskData['RelateID'];
        $CreateTime = $TaskData['CreateTime'];
        $CreatorName = $TaskData['CreatorName'];
        $Ret = '' ;

        $MustFilled = ['TaskType','TaskName','TaskInfo','SenderName','ReciveCorp','RelateID','CreateTime','CreatorName'];
        foreach ($MustFilled as $Must){
            if(empty($TaskData[$Must])){
                $Ret = $Must.'-->任务要素不完整!';
                goto OUT;
            }
        }

        $INSRET =  db('tasklist')->data($TaskData)->insert();
        if($INSRET>0){
            $Ret = '';
        }

        OUT:
            return $Ret;
    }

    static function isTaskCreated($TaskType,$RelatedID)
    {
        $Ret =  db('tasklist')->field('id')->where(array("TaskType"=>$TaskType,'RelateID'=>$RelatedID))->select();
        if(empty($Ret)){
            return '';
        }else{
            return $Ret[0]['id'];
        }
    }

    function showTaskAlign($TaskID)
    {
        $Ret =  db('tasklist')->field('CurManagerName')->where(array("id"=>$TaskID))->select();
        $this->assign("TaskID",$TaskID);
        if(empty($Ret)){
            return '该编号任务不存在!';
        }
        $Ret = db('userlist')->where(array("Corp"=>session("Corp")))->select();
        $this->assign("PersonList",$Ret);
        return view('TaskAlign');
    }

    function TaskAlign(){
        $TaskID = input("TaskID");
        $ToName = input('ManagerSelect');
        $Msg = trim(input('TaskMsg'));
       if(empty($TaskID) || empty($ToName)) {
           return "任务ID与被分配人不可为空!";
       }
       //检查权限
       $Role = session("CorpRole");
       if(empty($Role) || $Role!='领导'){
            return "权限不足!";
       }
       $Ret =  db('tasklist')->field('CurManagerName')->where(array("id"=>$TaskID))->select();
       if(empty($Ret)){
           return '该编号任务不存在!';
       }
       if(empty($Ret[0]['CurManagerName'])){//任务未分配
           db('tasklist')->where(array("id"=>$TaskID))->update(array("CurManagerName"=>$ToName));
           if(!empty($Msg)){
                //发送任务消息
               db('taskmsg')->insert(array("TaskID"=>$TaskID,
                                                   "SenderName"=>session("Name"),
                                                    "ReceiverName"=>$ToName,
                                                    "ReceiveCorp"=>session("Corp"),
                                                    "Msg"=>$Msg,
                                                    "CreateTime"=>date("Y-m-d H:i:s"),
                                                    "State"=>0));
           }
       }elseif($Ret[0]['CurManagerName']==$ToName){
            return "";
       }else{//任务已分配给别人
            return "任务已分配给".$Ret[0]['CurManagerName'];
       }
       return "任务分配成功！";
    }
    function showMsg($TaskID)
    {
        $this->assign("MsgList",db("taskmsg")->where(array("TaskID"=>$TaskID))->order("CreateTime DESC")->select());
        return view('showMsg');
    }
}