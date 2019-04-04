<?php
namespace app\safetymng\controller;
use think\Controller;
use think\Db;
use think\Request;

class MyRelatedQuestion extends PublicController{
    public function index()
    {
        $Question_Submited = db()->query("SELECT * FROM QuestionList WHERE CreatorName=?",
        array(session('Name')));
        $CorpRole = session('CorpRole');
        $ReformList = '';
        if($CorpRole=='领导'){
            $ReformList = db()->query("SELECT * FROM ReformList WHERE ChildTaskID IN (SELECT ID FROM TaskList WHERE isDeleted = '否' AND  ReciveCorp = ?)",array(session("Corp")));
            //dump($ReformList);
        }else{
            $ReformList = db()->query("SELECT * FROM ReformList WHERE ChildTaskID IN (SELECT ID FROM TaskList WHERE isDeleted = '否' AND  id in 
                                (SELECT DISTINCT TaskID FROM TaskDealerGroup WHERE Name=?))",array(session('Name')));
        }

        $CorpRole = session('CorpRole');
        $TaskList = '';
        if($CorpRole=='领导'){
            $TaskList = db()->query("SELECT * FROM TaskList WHERE isDeleted = '否' AND Status <> '已完成' AND (ReciveCorp = ? OR id in 
                                (SELECT DISTINCT TaskID FROM TaskDealerGroup WHERE Name=?)) ",array(session("Corp"),session('Name')));
        }else{
            $TaskList = db()->query("SELECT * FROM TaskList WHERE isDeleted = '否' AND Status <> '已完成' AND  id in 
                                (SELECT DISTINCT TaskID FROM TaskDealerGroup WHERE Name=?)",array(session('Name')));
        }

        $this->assign("TaskList",$TaskList);

        $this->assign("ReformList",$ReformList);
        $this->assign("Question_Submited",$Question_Submited);
        $this->assign("ASC1",0);
        $this->assign("ASC2",0);
        $this->assign("CurPlatform","Mobile");
        return view('index');
    }
}
