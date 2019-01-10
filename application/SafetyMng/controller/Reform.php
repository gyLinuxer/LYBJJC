<?php
namespace app\SafetyMng\controller;
use think\controller;
use think\Db;
use think\Request;

class Reform extends PublicController{
    public $ReformStatus = array('NonIssued'=>"未下发",'ActionisNotDefined'=>"未分析原因制定措施",'ActionIsMaked'=>"措施已制订待审核",'ActionIsOk'=>"措施审核通过执行中",
        'ActionIsNotOk'=>"措施审核不通过",'ProofIsUploaded' =>"整改证据已上传待审核",'ProofIsOk'=>"整改效果审核通过",'ProofIsNotOk'=>"整改效果审核不通过");
    /*
     * 1、未下发
     * 2、未分析原因制定措施
     * 3、措施已制订待审核
     * 4、措施审核通过执行中
     * 5、措施审核不通过
     * 6、整改证据已上传待审核
     * 7、整改效果审核通过
     * 8、整改效果审核不通过
     * */
    public $ReformStatus_AssginArr = array('未下发'=>1,'未分析原因制定措施'=>2,'措施已制订待审核'=>3,'措施审核通过执行中'=>4,
                                            '措施审核不通过'=>5,'整改证据已上传待审核'=>6,'整改效果审核通过'=>7,'整改效果审核不通过'=>8);
    public function index($TaskID=NULL,$ReformID =NULL,$opType='New')//opType :New Mdf
    {
        if(empty($TaskID)){
            return "任务ID不可为空!";
        }
        $Question = '';
        $Reform = '';
        //若有ReformID，则优先找到Reform，通过Reform来填充各个项目
        //若没有ReformID，则通过TaskID找到Question

        $Data = TaskCore::FindReformOrQuestionByTaskID($TaskID);
        dump($Data);
        if(empty($Data['Ret'])){
            return "任务ID错误!找不到关联问题和整改通知";
        }else{
            if($Data['Type']=='Question'){
                $Question = $Data['Ret'];
            }else if($Data['Type']=='Reform'){
                if($opType=='Mdf'){
                    $Reform = $Data["Ret"];
                }
            }
        }

        if($opType=='Mdf'){
            if(!empty($ReformID)){
                $Reform = db()->query("SELECT * FROM ReformList WHERE id=?",array($ReformID));
            }else{
                if(empty($Reform)){
                    return "整改通知书不存在!";
                }else{
                    $this->assign("Reform",$Reform[0]);
                }
            }
        }

        dump($Reform);


        if(empty($Question) && empty($Reform)){
            return "关联问题不可为空";
        }else if(!empty($Reform) && $opType=='Mdf'){
            if(!empty($Reform)){
                $this->assign("NonConfirmDesc",htmlspecialchars_decode($Reform["NonConfirmDesc"]));
                $this->assign("QuestionTitle" ,$Reform[0]["QuestionTitle"]);
                $this->assign("ReformInfo",$Reform[0]);
                $this->assign("Reform",$Reform[0]);
            }else{
                return "整改通知单ID不存在!";
            }
        }else if(!empty($Question)){
            if(!empty($Question)){
                $this->assign("QuestionTitle",$Question["QuestionTitle"]);
                $this->assign("NonConfirmDesc" ,htmlspecialchars_decode($Question["QuestionInfo"]));
            }else{
                return "问题ID不存在!";
            }
        }

        $this->assign("opType",$opType);
        $this->assign("QuestionID",empty($Question)?0:$Question["id"]);
        $this->assign("TaskID",$TaskID);
        $this->assign("ReformID",empty($Reform)?0:$Reform[0]["id"]);
        $this->assign("ReformIntStatus",empty($Reform)?0:$this->ReformStatus_AssginArr[$Reform[0]["ReformStatus"]]);
        dump($this->ReformStatus_AssginArr[$Reform[0]["ReformStatus"]]);
        $this->assign("Today",date("Y-m-d"));
        $this->assign("CorpList",db()->query("SELECT Distinct Corp FROM UserList"));
        $this->assign("QuestionSourceList",db('questionsource')->select());

        return view('index');
    }

    public function JudgeUserRoleByTaskID($TaskID){
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
            return "";
        }

        $TaskType = $Task[0]["TaskType"];
        $ReciveCorp = $Task[0]["ReciveCorp"];
        if(strpos($TaskType,'问题-整改')===0){//问题整改父任务
            if($CorpRole=='领导' && $Corp == $this->SuperCorp){
                //监察部门领导
                $TaskRole = 'JCY';
            }else if (!empty($GroupInfo)){//是监察员
                $TaskRole = 'JCY';
            }else {
                $TaskRole = '';//其它人员
            }
        }else if(strpos($TaskType,'整改')===0){//问题整改子任务
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

    public function showReformList($TaskID)
    {
        $TaskRole = $this->JudgeUserRoleByTaskID($TaskID);
        if (empty($TaskRole)) {
           return;
        }
        $Task = db()->query("SELECT * FROM TaskList WHERE id = ?", array($TaskID));
        if ($TaskRole == 'JCY') {//现实本任务中所有整改通知单
            $QuestionID = $Task[0]["RelateID"];
            $ReformList = db()->query("SELECT * FROM ReformList WHERE id in (SELECT ToID FROM IDCrossIndex WHERE FromID = ?)", array($QuestionID));
        } else if ($TaskRole == 'CLRY') {//现实本任务管理的整改通知单
            $ReformList = db()->query("SELECT * FROM ReformList WHERE id = ?", array($Task[0]["RelateID"]));
        } else {
            $ReformList = array();
        }
        $this->assign("ReformList", $ReformList);
        $this->assign("ReformCount", count($ReformList));
        $this->assign("Count", 1);
        $this->assign("TaskID", $TaskID);
        return view('ReformList');
    }


    public function SaveReform(){//New Fill
        //先看看当前操作者在该问题中是什么角色，然后结合整改通知书当前状态，决定他该干什么，能干什么
        $TaskID = input("TaskIDHid");
        $ReformID = input("ReformIDHid");
        $opType= input('opType');
        $ParentTaskType  = '';

        $Reform = '';
        $Question = '';
        if(empty($TaskID)){
            return "任务ID不可为空!";
        }
        if(empty($ReformID)){//如果$ReformID为空，父任务只会找到关联的Question，子任务才能找到对应的Reform
            $Ret_Data = TaskCore::FindReformOrQuestionByTaskID($TaskID);
            if($Ret_Data['Type'] == 'Question'){
                $Question = $Ret_Data['Ret'];
            }else if($Ret_Data['Type'] == 'Reform'){
                $Reform = $Ret_Data['Ret'];
            }
        }else{
            $Reform  = db()->query("SELECT * FROM ReformList WHERE id=?",array($ReformID))[0];
            if(empty($Reform)){
                return "整改通知书不存在!";
            }
        }

        $isJCY = 'NO';
        $Role = $this->JudgeUserRoleByTaskID($TaskID);
        if(empty($Role)){
            return "越权访问";
        }elseif ($Role=='JCY'){
            $isJCY = 'YES';
        }elseif($Role=='CLRY'){
            $isJCY = 'NO';
        }

        $Inspectors = '';

        $b_NeedJCYDefineCause  = 'NO';
        $b_NeedJCYDefineAction = 'NO';
        if($opType=='Mdf'){

        }






        if($opType=='New'){//增加整改通知书
            if($isJCY!='YES'){
                return "您权限不足!";
            }
            if(empty($Question)){
                return "关联问题不存在!";
            }

            $data["QuestionSourceName"] = input("QuestionSourceName");
            $data["DutyCorps"] = input("post.DutyCorps/a");
            $data["ParentTaskID"] = $TaskID;
            $data["CheckDate"] = input("CheckDate");
            $data["RequestFeedBackDate"]  = input("RequestFeedBackDate");
            $data["RelatedQuestionID"] = !empty($Question)?$Question['id']:'';
            $data["QuestionTitle"]     = $Question['QuestionTitle'];
            $data["ReformTitle"]     = input('ReformTitle');
            $data["NonConfirmDesc"] = htmlspecialchars(input("NonConfirmDesc"));
            $data["Basis"] = input("Basis");
            $data["ReformRequirement"]   = input("ReformRequirement");
            $data["RequireDefineCause"]  = input("RequireDefineCause")=='on'?'YES':'NO';
            $data["RequireDefineAction"] = input("RequireDefineAction")=='on'?'YES':'NO';
            $data["DirectCause"] = input("DirectCause");
            $data["RootCause"]   = input("RootCause");
            $data["CorrectiveAction"] = input("CorrectiveAction");
            $data["CorrectiveDeadline"] = input("CorrectiveDeadline");
            $data["PrecautionAction"] = input("PrecautionAction");
            $data["PrecautionDeadline"] = input("PrecautionDeadline");
            $data["ReformStatus"] = '未下发';
            $data["ActionIsOK"] = input("ActionIsOK");
            $data["ActionEval"] = input("ActionEval");

            $MustNotBeEmptyKeys = array("QuestionSourceName","DutyCorps","CheckDate","RequestFeedBackDate",'RequireDefineCause'
                                        ,'RequireDefineAction',"RelatedQuestionID","NonConfirmDesc","Basis"
                                        ,"ReformRequirement",'ReformTitle');

            foreach ($MustNotBeEmptyKeys as $k){
                if(empty($data[$k])){
                    $this->assign("Warning",$k."不可为空!");
                    goto OUT;
                }
            }
            $DutyCorps = input("post.DutyCorps/a");
            unset($data["DutyCorps"]);

            if($data["RequireDefineCause"] =='NO'){//不需要责任单位分析原因,则整改通知书下发单位需要分析原因
                $b_NeedJCYDefineCause = 'YES';
                if(empty($data["DirectCause"])||empty($data["RootCause"])){
                    $this->assign("Warning","没有分析直接原因与根本原因!");
                    goto  OUT;
                }
                $data["CauseEvalerName"] = session("Name");
                $data["CauseEvalTime"]   = date("Y-m-d H:i:s");
            }else{// 不需要监察员分析原因
                unset($data["DirectCause"]);
                unset($data["RootCause"]);
            }

            if($data["RequireDefineAction"]=='NO'){//不要责任单位指定措施,则整改通知书下发单位需要指定措施并明确期限
                $b_NeedJCYDefineAction = 'YES';
                if(empty($data["CorrectiveAction"]) || empty($data["CorrectiveDeadline"]) || empty($data["PrecautionAction"]) || empty($data["PrecautionDeadline"])){
                    $this->assign("Warning","没有制定措施及明确措施预计完成时限!");
                    goto  OUT;
                }
                if(empty($data["ActionIsOK"])|| empty($data["ActionEval"])){
                    $this->assign("Warning","没有措施评估!");
                    goto  OUT;
                }
                $data["ActionMakerName"] = session("Name");
                $data["ActionMakeTime"]  = date("Y-m-d H:i:s");
                $data["ActionEvalerName"] = session("Name");
                $data["ActionEvalTime"]   = date("Y-m-d H:i:s");
             }else{ // 不需要监察员指定措施
                unset($data["CorrectiveAction"]);
                unset($data["CorrectiveDeadline"]);
                unset($data["PrecautionAction"]);
                unset($data["PrecautionDeadline"]);
            }

            if($b_NeedJCYDefineAction =='NO' && $b_NeedJCYDefineCause== 'YES'){//已经指定措施，又让责任单位指定分析原因，不允许
                $this->assign("Warning","不允许已制订措施，又让责任单位分析原因!");
                goto OUT;
            }

            //保存整改通知书

            $CodePre = db()->query("SELECT CodePre FROM QuestionSource WHERE SourceName = ? ",array($data["QuestionSourceName"]));
            if(empty($CodePre)){
                $this->assign("Warning",$data["QuestionSourceName"]."问题来源不存在!");
                goto OUT;
            }
            $CodePre = $CodePre[0]["CodePre"];

            $data["Inspectors"] = $Inspectors;
            $data["IssueDate"] = date("Y-m-d");

            $IDs = array();
            foreach ($DutyCorps as $DutyCorp){
               $data["Code"] = $CodePre."-".date("YmdHis").rand(100,999);
               $data["DutyCorp"] =  $DutyCorp;
               $data["CurDealCorp"] =  $DutyCorp;
               $IDs[$DutyCorp] = db("reformlist")->insertGetId($data);
               dump($IDs[$DutyCorp] );
               if(empty($IDs[$DutyCorp])){
                   $this->assign("Warning",'增加整改通知书失败!');
                   goto OUT;
               }
               $Cross_Data["Type"] = "问题-整改";
               $Cross_Data["FromID"] = $Question['id'];
               $Cross_Data["ToID"] = $IDs[$DutyCorp];
               db('idcrossindex')->insert($Cross_Data);
            }

        }



        OUT:
            return $this->index($TaskID);
    }

    public function IssueReform($TaskID,$ReformID){
       $Role =  $this->JudgeUserRoleByTaskID($TaskID);
       if($Role !='JCY'){
           $this->assign("Warning","越权访问!");
           goto OUT;
       }

       //到这已经是监察员了
        $Reform = db()->query("SELECT * FROM ReformList WHERE id = ?",array($ReformID))[0];
        if(empty($Reform)){
            $this->assign("Warning","该整改通知书不存在!");
            goto OUT;
        }

        $ReformStatus = $Reform['ReformStatus'];
        if($ReformStatus!='未下发'){//已经下发了
            $this->assign("Warning","该整改通知书已经下发了!");
            goto OUT;
        }

        $ChildTaskStatus  = '' ;
        $ReformNewStatus  = '' ;
        $DeadLine = '';
        if($Reform["RequireDefineAction"] == 'YES'){
            $ChildTaskStatus =TaskCore::REFORM_UNDEFINED_ACTION;
            $ReformNewStatus = $this->ReformStatus['ActionisNotDefined'];
        }else{
            $ChildTaskStatus =TaskCore::REFORM_UNDEFINE_PROOF;
            $ReformNewStatus = $this->ReformStatus['ActionIsOk'];
        }

        $TaskData = array();
        $TaskData["TaskType"] = '整改通知书';
        $TaskData["TaskStatus"] = $ChildTaskStatus;
        $TaskData['TaskName'] = $Reform["ReformTitle"];
        $TaskData['DeadLine'] = $Reform["RequestFeedBackDate"];
        $TaskData['SenderName'] = session("Name");
        $TaskData['SenderCorp'] = $this->SuperCorp;
        $TaskData['ReciveCorp'] = $Reform['DutyCorp'];
        $TaskData['RelateID'] = $ReformID;
        $TaskData['CreateTime'] = date("Y-m-d H:i:s");
        $TaskData['CreatorName'] = session("Name");
        $TaskData['ParentID'] = $TaskID;
        $Ret = TaskCore::CreateTask($TaskData);
        if(!empty($Ret['Ret'])){
            $this->assign("Warning","任务创建失败->".$Ret['Ret']);
            goto OUT;
        }else{
            db()->query("UPDATE ReformList SET ChildTaskID = ?,ReformStatus=? WHERE id = ?",array($Ret['ID'],$ReformNewStatus,$ReformID));
        }

       OUT:
            return $this->showReformList($TaskID);
    }
}