<?php
namespace app\safetymng\controller;
use think\db;
use think\controller;
use think\Session;

class TaskCore extends PublicController{
    public static $TaskTypes = [];
    //问题默认接收部门
    const QUESTION_DEFAULT_RECEIVECORP = '质检科';

    //任务类型
    const QUESTION_REFORM = '问题-整改';
    const QUESTION_SUBMITED = '问题-待处理';
    const REFORM_SUBTASK = '整改通知书';
    const QUESTION_FAST_REFORM = '问题-立即整改';
    const ONLINE_CheckTask = '在线检查任务';
    //整改子任务状态
    const REFORM_ACTION_MAKED  = '整改-措施已制定';
    const REFORM_UNDEFINED_ACTION  = '整改-待制定措施';
    const REFORM_ACTION_ISNOTOK = '整改-措施不通过';
    const REFORM_ACTION_ISOK = '整改-措施通过';
    const REFORM_UNDEFINE_PROOF = '整改-整改证据待上传';
    const REFORM_PROOF_UPLOADED = '整改-证据已上传待审核';
    const REFORM_PROOF_ISNOTOK  = '整改-整改效果不通过';
    const REFORM_PROOF_ISOK  = '整改-整改效果通过';
    //部门
    const DEFAULT_RECEIVECORP   = '质检科';
    const MULT_CORP = '多部门协作';
    public  function index()
    {

    }



    static public function GetTaskMngUrlByTaskID($TaskID = NULL,$Platform='PC'){
        if(empty($TaskID)){
            return '';
        }

        $TaskData = db('TaskList')->where(array('id'=>$TaskID))->select()[0];
        if(empty($TaskData)){
            return '';
        }

        switch ($TaskData['TaskType']){
            case TaskCore::QUESTION_REFORM:
            case TaskCore::QUESTION_SUBMITED:
            case TaskCore::REFORM_SUBTASK:
            case TaskCore::QUESTION_FAST_REFORM:
            {
                if($Platform!='PC'){
                    $URL = '/SafetyMng/TaskList/showMBTaskDetail/TaskID/';
                }else{
                    $URL = '/SafetyMng/QuestionMng/showQuestionMng/TaskID/';
                }
                return $URL.$TaskID;
                break;
            }
            case TaskCore::ONLINE_CheckTask:{
                if($Platform!='PC'){
                    $URL = '/SafetyMng/CheckTask/showOnlineCheckIndex/CheckListID/';
                }else{
                    $URL = '/SafetyMng/CheckTask/showCheckListMng/CheckListID/';
                }
                $Ret = db('CheckList')->where(array('TaskID'=>$TaskID))->select()[0];
                return $URL.$Ret['id'];
            }
        }

    }

    static  public function FindReformOrQuestionByTaskID($TaskID){
        $TaskData = db()->query("SELECT * FROM TaskList WHERE ID= ?",array($TaskID));
        $TaskType = $TaskData[0]["TaskType"];
        $Data_Ret = array('Ret'=>'','Type'=>'');
        if(strpos($TaskType, TaskCore::QUESTION_SUBMITED) === 0
            || strpos($TaskType, TaskCore::QUESTION_REFORM) ===0
                || strpos($TaskType, TaskCore::QUESTION_FAST_REFORM ) === 0){//问题处理中的整改分支，则RelatedID为QuesitonID,这都是父任务类型
            $Question = db()->query("SELECT * FROM QuestionList WHERE ID=?",array($TaskData[0]["RelateID"]))[0];
            $Data_Ret['Type'] = 'Question';
            $Data_Ret['Ret']  = $Question;
        }else if(strpos($TaskType, '整改')===0){//整改子任务,则RelatedID为ReFormID
            $Reform = db()->query("SELECT * FROM ReformList WHERE ID = ? ",array($TaskData[0]["RelateID"]))[0];
            $Data_Ret['Type'] = 'Reform';
            $Data_Ret['Ret']  = $Reform;
        }
        return $Data_Ret;
    }

    static  public  function CreateTask($TaskData){

        $Ret_Data = array("Ret"=>"","ID"=>0);

        $MustFilled = ['TaskType','TaskName','ReciveCorp','RelateID','CreateTime','ParentID'];
        foreach ($MustFilled as $Must){
            if(!isset($TaskData[$Must])){
                $Ret_Data['Ret'] = $Must.'-->任务要素不完整!';
                goto OUT;
            }
        }

        $INSRET_ID =  db('TaskList')->insertGetId($TaskData);
        $Ret_Data['SQL'] = db()->getLastSql();

        if($INSRET_ID>0){
            $Ret_Data['ID'] = $INSRET_ID;
        }else{
            $Ret_Data['Ret'] = '任务创建失败!';
        }

        OUT:
            return $Ret_Data;
    }

    static function isTaskCreated($TaskType,$RelatedID)
    {
        $Ret =  db('TaskList')->field('id')->where(array("TaskType"=>$TaskType,'RelateID'=>$RelatedID))->select();
        if(empty($Ret)){
            return '';
        }else{
            return $Ret[0]['id'];
        }
    }

    function showTaskAlign($TaskID)
    {
        $Ret =  db('TaskList')->field('DealGroupID')->where(array("id"=>$TaskID))->select();
        $this->assign("TaskID",$TaskID);
        if(empty($Ret)){
            return '该编号任务不存在!';
        }elseif(!empty($Ret[0]['DealGroupID'])){
            return '任务已分配!';
        }
        $Ret = db('UserList')->where(
            session("Corp")==$this->SuperCorp?'':array("Corp"=>session("Corp"))
        )->select();
        $this->assign("PersonList",$Ret);
        return view('TaskAlign');
    }
    static public  function GetUniqueGroupID()
    {
        return date('YmdHis').rand(100,999);
    }
    function TaskAlign($TaskIn = 0,$DontCheckCorpRole='NO'){

        if(empty($TaskIn)){
            $TaskID = input("TaskID");
        }else{
            $TaskID = $TaskIn;
        }

        $Manager = input('ManagerSelect');
        $GroupDealer = input('post.GroupDealer/a');
        $Msg = trim(input('TaskMsg'));
       if(empty($TaskID) || empty($Manager)) {
           return "任务ID与被任务组长不可为空!";
       }
       //检查权限
       $Role = session("CorpRole");
       if($DontCheckCorpRole=='NO'){
           if(empty($Role) || $Role!='领导' ){
               return "权限不足!";
           }
       }

       $Ret =  db('TaskList')->field('DealGroupID')->where(array("id"=>$TaskID))->select();
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
           db('TaskDealerGroup')->insert($data);
           //写入组员
           $GroupMember = $Manager.' ';
           if(!empty($GroupDealer)){
               foreach ($GroupDealer as $Dealer){
                   if($Dealer != $Manager){
                       $data["Role"]= '组员';
                       $data["Name"]= $Dealer;
                       $GroupMember.= $Dealer.' ';
                       db('TaskDealerGroup')->insert($data);
                   }
               }
           }


           db('TaskList')->where(array("id"=>$TaskID))->update(array("DealGroupID"=>$DealGroupID,'GroupMember'=>$GroupMember));
           if(!empty($Msg)){
                //发送任务消息
               db('TaskMsg')->insert(array("TaskID"=>$TaskID,
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
        $this->assign("MsgList",db("TaskMsg")->where(array("TaskID"=>$TaskID))->order("CreateTime DESC")->select());
        return view('showMsg');
    }

    function getTaskMngUrl($TaskID=0){
        $TaskType =  db('TaskList')->where(array('id'=>$TaskID))->select()[0]["TaskType"];
        if(empty($TaskType)){
            return '';
        }

        $URL_Arr = array(QUESTION_REFORM=>'/SafetyMng/QuestionMng/showQuestionMng/TaskID/'.$TaskID,
                         QUESTION_SUBMITED=>'/SafetyMng/QuestionMng/showQuestionMng/TaskID/'.$TaskID,
                         REFORM_SUBTASK=>'/SafetyMng/QuestionMng/showQuestionMng/TaskID/'.$TaskID,
                         QUESTION_FAST_REFORM=>'/SafetyMng/QuestionMng/showQuestionMng/TaskID/'.$TaskID,
                         ONLINE_CheckTask=>'/SafetyMng/QuestionMng/showQuestionMng/TaskID/'.$TaskID,
                        );

    }

    function showTaskCoreInfoPage($TaskID=0){//根据任务ID显示任务核心信息页面
        $TaskRow = db('TaskList')->where(array('id'=>$TaskID))->select()[0];
        if(empty($TaskRow)){
            return '任务不存在!';
        }
        $Platform = $this->IS_Mobile()?'Mobile':'PC';
        $TaskType = $TaskRow['TaskType'];
        $RelateID = $TaskRow['RelateID'];;
        switch ($TaskType){
            case TaskCore::REFORM_SUBTASK:
            {//整改类的
                 $RF = new Reform();
                 return $RF->index($TaskID,$RelateID,'Mdf',$Platform);
                 break;
            }
            case TaskCore::QUESTION_REFORM:
            case TaskCore::QUESTION_FAST_REFORM:
            {
                $RF = new Reform();
                $QuestionID = $TaskRow["RelateID"];
                $ReformID= db()->query("SELECT ToID FROM IDCrossIndex WHERE FromID = ? LIMIT 1", array($QuestionID))[0]["ToID"];

                return $RF->index($TaskID,$ReformID,'Mdf',$Platform);
                break;
            }

            case TaskCore::QUESTION_SUBMITED:{
                //问题提交的
                $QsID  = $TaskRow['RelateID'];
                $QsData = db('QuestionList')->where(array('id'=>$QsID))->select()[0];
                $this->assign('dataRow',$QsData);
                if($Platform!='PC'){
                    return view('QuestionInput/mbshowQ');
                }else{
                    return view('QuestionInput/DiscretePCshowQs');
                }

                break;
            }
        }
    }


}
