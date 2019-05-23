<?php
namespace app\safetymng\controller;
use think\db;
use think\controller;
use think\Session;
use think\Request;

class TaskCore extends PublicController{
    private  $CorpMng = NULL;
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->CorpMng = new CorpMng();
    }

    public static $TaskTypes = [];


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
        $Ret = $this->IsSuperCorp()?$this->CorpMng->GetGroupCorpUserList($this->GetGroupCorp()):$this->CorpMng->GetCorpUserList($this->GetCorp());
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
                $ReformID = db()->query("SELECT ToID FROM IDCrossIndex WHERE FromID = ? LIMIT 1", array($QuestionID))[0]["ToID"];
                //检查整改通知书是否存在，可能被删除了。

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

    static  public function JudgeUserRoleByTaskID($TaskID){
        //根据角色和任务分配
        //1、超级部门的领导和部领导在所有任务上都等同于监察员
        //2、其它部门的领导在其所有任务上等同于该任务的处理人
        //四种角色：超级部门的领导 本任务监察员 责任部门领导 责任部门本任务处理人员
        $CorpRole = session("CorpRole");//领导与成员
        $Corp = session('Corp');

        $Task = db()->query("SELECT * FROM TaskList WHERE id = ?",array($TaskID));
        $GroupInfo = db()->query("SELECT * FROM TaskDealerGroup WHERE TaskID = ? AND Name = ? ",array($TaskID,session('Name')));
        $TaskRole = '';
        if(empty($Task)){
            return '';
        }

        $TaskType = $Task[0]["TaskType"];
        $ReciveCorp = $Task[0]["ReciveCorp"];

        if(strpos($TaskType,TaskCore::QUESTION_REFORM)===0 ||
            strpos($TaskType,TaskCore::QUESTION_FAST_REFORM)===0
            || strpos($TaskType,TaskCore::QUESTION_SUBMITED)===0
            || strpos($TaskType,TaskCore::REFORM_SUBTASK)==0) {//问题整改父任务
            if($CorpRole=='领导' && (session('CorpInfo')['IsSuperCorp']=='YES')){
                //监察部门领导
                $TaskRole = 'JCY';
            }else if($CorpRole =='领导' &&$ReciveCorp == $Corp){
                $TaskRole = 'CLRY';//处理人员
            }else if(!empty($GroupInfo)){
                $TaskRole = 'CLRY';
            }else{
                $TaskRole = '';
            }
        }else if(strpos($TaskType,TaskCore::ONLINE_CheckTask)===0){//在线检查任务
            if(!empty($GroupInfo)){
                $TaskRole = 'CLRY';//处理人员
            }else{
                $TaskRole = '';//其它人员
            }
        }
        else if(strpos($TaskType,'整改')===0){//问题整改子任务
            if($CorpRole =='领导' &&$ReciveCorp == $Corp){
                $TaskRole = 'CLRY';//处理人员
            }else if(!empty($GroupInfo)){
                $TaskRole = 'CLRY';
            }else{
                $TaskRole = '';
            }
        }
        return $TaskRole;
    }

    public function isTaskCanBeClose($TaskID = 0){

        $Task = db()->query("SELECT * FROM TaskList WHERE id = ?",array($TaskID))[0];
        if(!empty($Task)){
            $RoleRet = TaskCore::JudgeUserRoleByTaskID($TaskID);
            if(empty($RoleRet)){
                return '您不是本任务的处理人员,无法关闭任务';
            }
        }else{
            return '任务不存在!' ;
        }


        $TaskType = $Task['TaskType'];

        if($Task['Status']=='已完成'){
            $Ret = '已关闭';
            return $Ret;
        }

       /*
        const QUESTION_REFORM = '问题-整改';    //这个问题关联的所有整改通知书均整改通过
        const QUESTION_SUBMITED = '问题-待处理';//不允许关闭
        const REFORM_SUBTASK = '整改通知书';//关联的整改通知书整改完毕
        const QUESTION_FAST_REFORM = '问题-立即整改';//等同于问题-整改
        const ONLINE_CheckTask = '在线检查任务';//关联的检查任务检查完毕
       */

       $RF = new Reform();
       $RelatedID = $Task["RelateID"];
       $Ret = '';
       switch ($TaskType) {
           case TaskCore::QUESTION_REFORM:
           case TaskCore::QUESTION_FAST_REFORM:{
                   //查看是不是所有整改通知书均已关闭。
                   $ReformList = db()->query("SELECT Code,ReformStatus FROM ReformList WHERE isDeleted = '否' AND id in 
                                              (SELECT ToID FROM IDCrossIndex WHERE FromID = ?)", array($RelatedID));
                   $Ret = '';
                   if (!empty($ReformList)) {
                       foreach ($ReformList as $R) {
                           if ($R['ReformStatus'] != $RF->ReformStatus['ProofIsOk']) {
                                $Ret .= '编号为'.$R['Code'].'的整改通知书,当前状态为'.$R['ReformStatus'].',任务不可关闭!</br>';
                           }
                       }
                   }
                   if(empty($Ret)){
                       $Ret = '可关闭';
                   }
                   break;
           }

           case TaskCore::QUESTION_SUBMITED:{
                   $Ret = '问题尚未处理,不可关闭!';
                   break;
           }

           case TaskCore::REFORM_SUBTASK:{
                   $Reform= db()->query("SELECT Code,ReformStatus FROM ReformList WHERE isDeleted = '否' AND id = ? ", array($RelatedID))[0];

                   if(!$Reform){
                       $Ret = '任务异常:关联的整改通知书不存在!';
                   }else if($Reform['ReformStatus'] != $RF->ReformStatus['ProofIsOk']){
                       $Ret = '编号为'.$Reform['Code'].'的整改通知书,当前状态为'.$Reform['ReformStatus'].',任务不可关闭!</br>';
                   }else{
                       $Ret = '可关闭';
                   }
                   break;
           }


           case TaskCore::ONLINE_CheckTask:{
                  $CKT = new CheckTask();
                  $CheckList  = db()->query('SELECT CheckCode,Status FROM CheckList WHERE TaskID = ?',array($TaskID));
                  $Ret = '';
                  if(!empty($CheckList)){
                      foreach ($CheckList as $CK){
                          if($CK['Status']!=$CKT->CheckTaskStatus_Arr['CheckIsFinished']){
                              $Ret .= '编号为'.$CK['CheckCode'].'的检查任务,当前状态为'.$CK['Status'].',任务不可关闭!</br>';
                          }
                      }
                  }
                   if(empty($Ret)){
                       $Ret = '可关闭';
                   }
                  break;
           }
       }
       return $Ret;

    }

    public function  showCloseTask($TaskID=0){
        $isCanBeClose = $this->isTaskCanBeClose($TaskID);
        $this->assign('TaskIsCanClose',$isCanBeClose);
        $this->assign('TaskID',$TaskID);
        return view('CloseTask');
    }

    public function CloseTask(){
        $TaskID = input('TaskID');
        $Ret = $this->isTaskCanBeClose($TaskID);
        if( $Ret =='可关闭' ){
            db()->query("UPDATE TaskList SET Status ='已完成'  WHERE id =  ? ",array($TaskID));
            $this->assign('CloseLayer','YES');
        }

        return $this->showCloseTask($TaskID);

    }



}
