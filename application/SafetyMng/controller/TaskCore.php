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
        $Ret =  db('tasklist')->field('DealGroupID')->where(array("id"=>$TaskID))->select();
        $this->assign("TaskID",$TaskID);
        if(empty($Ret)){
            return '该编号任务不存在!';
        }elseif(!empty($Ret[0]['DealGroupID'])){
            return '任务已分配!';
        }
        $Ret = db('userlist')->where(array("Corp"=>session("Corp")))->select();
        $this->assign("PersonList",$Ret);
        return view('TaskAlign');
    }
    public  function GetUniqueGroupID()
    {
        return date('YmdHis').rand(100,999);
    }
    function TaskAlign(){
        $TaskID = input("TaskID");
        $Manager = input('ManagerSelect');
        $GroupDealer = input('post.GroupDealer/a');
        $Msg = trim(input('TaskMsg'));
       if(empty($TaskID) || empty($Manager)) {
           return "任务ID与被任务组长不可为空!";
       }
       //检查权限
       $Role = session("CorpRole");
       if(empty($Role) || $Role!='领导'){
            return "权限不足!";
       }
       $Ret =  db('tasklist')->field('DealGroupID')->where(array("id"=>$TaskID))->select();
       if(empty($Ret)){
           return '该编号任务不存在!';
       }
       if(empty($Ret[0]['DealGroupID'])){//任务未分配
           //写入组长
           $DealGroupID = $this->GetUniqueGroupID();
           $data = array();
           $data["TaskID"]= $TaskID;
           $data["GroupID"]= $DealGroupID;
           $data["Name"]= $Manager;
           $data["Role"]= '组长';
           $data["Corp"]= session("Corp");
           $data["AddTime"]= date("Y-m-d H:i:s");
           db('taskdealergroup')->insert($data);
           //写入组员
           foreach ($GroupDealer as $Dealer){
               if($Dealer != $Manager){
                   $data["Role"]= '组员';
                   $data["Name"]= $Dealer;
                   db('taskdealergroup')->insert($data);
               }
           }

           db('tasklist')->where(array("id"=>$TaskID))->update(array("DealGroupID"=>$DealGroupID));
           if(!empty($Msg)){
                //发送任务消息
               db('taskmsg')->insert(array("TaskID"=>$TaskID,
                                                   "SenderName"=>session("Name"),
                                                    "ReceiveGroup"=>$DealGroupID,
                                                    "Msg"=>$Msg,
                                                    "CreateTime"=>date("Y-m-d H:i:s"),
                                                    "State"=>0));
           }
       }else{//任务已分配给别人
            return "任务已分配";
       }
       return "任务分配成功！";
    }
    function showMsg($TaskID)
    {
        $this->assign("MsgList",db("taskmsg")->where(array("TaskID"=>$TaskID))->order("CreateTime DESC")->select());
        return view('showMsg');
    }
}