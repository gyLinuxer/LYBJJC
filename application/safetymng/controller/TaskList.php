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
    public function Index()
    {
        $CorpRole = session('CorpRole');
        $TaskList = '';
        if($CorpRole=='领导'){
            $TaskList = db()->query("SELECT * FROM TaskList WHERE isDeleted = '否' AND Status <> '已完成' AND  ReciveCorp = ?",array(session("Corp")));
        }else{
            $TaskList = db()->query("SELECT * FROM TaskList WHERE isDeleted = '否' AND Status <> '已完成' AND  id in 
                                (SELECT DISTINCT TaskID FROM TaskDealerGroup WHERE Name=?)",array(session('Name')));
        }
        $this->assign("TaskList",$TaskList);
        $this->assign("Cnt",1);
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
