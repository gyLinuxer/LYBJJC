<?php
namespace app\SafetyMng\controller;
use think\controller;
use think\Db;
use think\Request;
class QuestionInput extends controller
{
    public function index(){
        return view('index');
    }
    function QuestionInput()
    {
       $Title = input('QuestionTitle');
       $Content = input('content');

       if(empty($Title) || empty($Content)){
            $this->assign("Warning","请完善问题标题与描述!");
            goto OUT;
       }

       $data["QuestionTitle"] = $Title;
       $data["QuestionInfo"]  = htmlspecialchars($Content);
       $data["CreatorName"] = is_null(session("Name"))?'':session("Name");
       $data["CreateTime"] = date("Y-m-d H:i:s");

       $file = request()->file('subFile');
       if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'upload');
            if($info){
                $data["subFileSaveName"] = $info->getSaveName();
                $data["subFileName"] = $info->getFilename();
            }else{
                $this->assign("Warning","上传文件错误:".$file->getError());
                goto OUT;
            }
       }

       $Question_ID = db("questionlist")->insert($data);
       if($Question_ID<=0){
           $this->assign("Warning","输入问题失败!");
           goto OUT;
       }

        $id = db("questionlist")->getLastInsID();
        $Ret = TaskCore::isTaskCreated(TaskCore::QUESTION_SUBMITED,$id);
        if(empty($Ret)){//没有创建任务
            $TaskData['TaskType'] = TaskCore::QUESTION_SUBMITED;
            $TaskData['TaskName'] = $Title;
            $TaskData['SenderName'] = session("Name");
            $TaskData['SenderCorp'] = session("Corp");
            $TaskData['ReciveCorp'] = TaskCore::QUESTION_DEFAULT_RECEIVECORP;
            $TaskData['RelateID'] = $id;
            $TaskData['CreateTime'] = date('Y-m-d H:i:s');
            $TaskData['CreatorName'] = session("Name");
            $CT_Ret =  TaskCore::CreateTask($TaskData);
            if(!empty($CT_Ret["Ret"])){
                $this->assign("Warning","创建任务失败，原因为:".$CT_Ret["Ret"]);
            }else{
                db()->query("UPDATE QuestionList SET TaskID = ? WHERE ID = ?",array($CT_Ret["ID"],$Question_ID));
            }
        }
           return $this->showQuestionInfo($id);
       OUT:
           return $this->index();
    }
    public function showQuestionInfo($id = NULL)
    {

        if(!$id){
            return;
        }
        $this->assign("dataRow",db('questionlist')->where(array("id"=>$id))->select()[0]);
        return view('FeedBack');
    }
}