<?php
namespace app\SafetyMng\controller;
use think\controller;
use think\Db;
use think\Request;

class Reform extends PublicController{
    public $ReformStatus = array("NonReasonAndAction","ActionIsOK","ActionIsNotOk","ProofIsUpload","ProofIsOk","ProofIsNotOk");
    public function index($QuestionID=NULL,$ReformID=NULL)
    {
        if(empty($QuestionID) && empty($ReformID)){
            return "关联问题不可为空";
        }else if(!empty($ReformID)){
            $Reform = db("reformlist")->where(array("id"=>$ReformID))->select();
            if(!empty($Reform)){
                $this->assign("NonConfirmDesc",htmlspecialchars_decode($Reform[0]["NonConfirmDesc"]));
                $this->assign("QuestionTitle" ,$Reform[0]["QuestionTitle"]);
                $this->assign("ReformInfo",db("reformlist")->where(array("id"=>$ReformID))->select());
                $this->assign("Reform",$Reform);
            }else{
                return "整改通知单ID不存在!";
            }
        }else if(!empty($QuestionID)){
            $Question = db("questionlist")->where(array("id"=>$QuestionID))->select();
            if(!empty($Question)){
                $this->assign("QuestionTitle",$Question[0]["QuestionTitle"]);
                $this->assign("NonConfirmDesc" ,htmlspecialchars_decode($Question[0]["QuestionInfo"]));
            }else{
                return "问题ID不存在!";
            }
        }

        $this->assign("QuestionID",$QuestionID);
        $this->assign("ReformID",$ReformID);
        $this->assign("Today",date("Y-m-d"));
        $this->assign("CorpList",db()->query("SELECT Distinct Corp FROM UserList"));
        $this->assign("QuestionSourceList",db('questionsource')->select());

        return view('index');
    }

    public function SaveReform(){
        $QuestionID  = input("QuestionIDHid");
        //$Role = session("FakeRoleArr")[$]
    }
}