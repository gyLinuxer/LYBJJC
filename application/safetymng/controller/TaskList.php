<?php
/**
 * Created by PhpStorm.
 * User: liguangyao
 * Date: 2018/12/4
 * Time: 20:31
 */
namespace app\safetymng\controller;
use think\Controller;
use think\Db;


class TaskList extends PublicController
{
    public function Index($ActiveLi = 'QuestionMng')
    {
        $CorpRole = session('CorpRole');
        $QTaskList = ''; //问题列表
        $OCTaskList = '';//在线检查任务列表
        $ReformList = '' ;//整改通知书列表
        if($CorpRole=='领导'){
            //部门领导可以看到任务接收部门为本部门的所有任务，以及任务处理人员名单里面有他的任务
            $QTaskList = db()->query("SELECT * FROM TaskList WHERE isDeleted = '否' AND TaskType <> ?   AND TaskList.Status <> '已完成' AND  (ReciveCorp = ? OR TaskList.id in 
                                (SELECT DISTINCT TaskID FROM TaskDealerGroup WHERE Name=?))",array(TaskCore::ONLINE_CheckTask,session("Corp"),session('Name')));
            $OCTaskList = db()->query("SELECT *,CheckList.id as CheckListID FROM TaskList JOIN CheckList ON CheckList.id = TaskList.RelateID WHERE isDeleted = '否' AND TaskType = ?   AND TaskList.Status <> '已完成' AND  (ReciveCorp = ? OR TaskList.id in 
                                (SELECT DISTINCT TaskID FROM TaskDealerGroup WHERE Name=?))",array(TaskCore::ONLINE_CheckTask,session("Corp"),session('Name')));

        }else{
            //普通成员可以看到任务处理人员名单里面有他的任务
            $QTaskList = db()->query("SELECT * FROM TaskList WHERE isDeleted = '否' AND TaskType <> ? AND TaskList.Status <> '已完成' AND  TaskList.id in 
                                (SELECT DISTINCT TaskID FROM TaskDealerGroup WHERE Name=?)",array(TaskCore::ONLINE_CheckTask,session('Name')));
            $OCTaskList = db()->query("SELECT *,CheckList.id as CheckListID FROM TaskList JOIN CheckList ON CheckList.id = TaskList.RelateID  WHERE isDeleted = '否' AND TaskType = ?  AND TaskList.Status <> '已完成' AND  TaskList.id in 
                                (SELECT DISTINCT TaskID FROM TaskDealerGroup WHERE Name=?)",array(TaskCore::ONLINE_CheckTask,session('Name')));
        }
        //整改通知书列表
        if(session('Corp')==$this->SuperCorp){
            //超级部门的所有成员都可以看到所有整改通知书
            $ReformList = db()->query("SELECT * FROM ReformList WHERE ReformStatus<>'整改效果审核通过' AND isDeleted ='否' Order BY DutyCorp,IssueDate ASC");
        }else{
            //
            $ReformList = db()->query("SELECT * FROM ReformList WHERE ReformStatus<>'整改效果审核通过' AND DutyCorp= ? AND isDeleted ='否' Order BY DutyCorp,IssueDate ASC",array(session('Corp')));
        }

        $this->assign('ActiveLI',$ActiveLi);
        $this->assign('QCnt',count($QTaskList));
        $this->assign('RFCnt',count($ReformList));
        $this->assign('OCCnt',count($OCTaskList));
        $this->assign("ReformList",$ReformList);
        $this->assign("QTaskList",$QTaskList);
        $this->assign("OCTaskList",$OCTaskList);
        $this->assign("Cnt",1);
        $this->assign("Count",1);
        return view('index');
    }
    public function showMBTaskDetail($TaskID = 0,$ReformID = 0){
        if(empty($TaskID)){
            return '任务ID不可为0';
        }

        $TaskDataRow =  db('TaskList')->where(array('id'=>$TaskID))->select()[0];

        if(empty($TaskDataRow)){
            return '任务不存在!';
        }

        $Ret = TaskCore::FindReformOrQuestionByTaskID($TaskID);
        if(empty($Ret['Ret'])){
            return "关联问题不存在!";
        }else if($Ret['Type']=='Reform'){
            $QuestionID  = $Ret['Ret']["RelatedQuestionID"];
        }else if($Ret['Type']=='Question'){
            $QuestionID  = $Ret['Ret']["id"];
        }

        $dataRow  = db('QuestionList')->where(array("id"=>$QuestionID))->select()[0];

        $ReformC = new Reform();
        $ReformList = $ReformC->GetReformListByTaskID($TaskID);
        //选择了单个整改通知书
        $bFind = false;
        $CurReform = array();
        if(!empty($ReformID)){
            foreach($ReformList as $R){
                if($R['id']==$ReformID){
                    $bFind = true;
                    $CurReform = $R;
                }
            }
        }

        $TaskType = $TaskDataRow['TaskType'];
        if(strpos($TaskType,TaskCore::QUESTION_REFORM)===0 ||
            strpos($TaskType,TaskCore::QUESTION_FAST_REFORM)===0||
            strpos($TaskType,TaskCore::REFORM_SUBTASK)===0){
            $this->assign('showReformList','YES');
        }

        if($bFind){
            $this->assign('ActiveLI','LiReformList');
        }
        $this->assign('CurReform',$CurReform);
        $this->assign('ReformID',$ReformID);
        $this->assign("ReformList",$ReformList);
        $this->assign('TaskDataRow',db('TaskList')->where(array('id'=>$TaskID))->select()[0]);
        $this->assign('QuestionData',$dataRow);
        $this->assign("CurPlatform","Mobile");
        $this->assign("TaskID",$TaskID);
        return view('MBTaskDetail');
    }
}
