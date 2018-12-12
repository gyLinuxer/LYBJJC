<?php
namespace app\SafetyMng\controller;
use think\db;
use think\controller;

class QuestionMng extends PublicController
{
    private $QuestionMng_AllowCorp = array('质检科');
    public function index()
    {

    }
    public function showQuestionMng($QuestionID=NULL)
    {
        $Corp = session("Corp");
        if(!in_array($Corp,$this->QuestionMng_AllowCorp)){
            return "您权限不足!";
        }
        //dump(db('questionlist')->where(array("id"=>$QuestionID))->select()[0]);
        $this->assign("dataRow",db('questionlist')->where(array("id"=>$QuestionID))->select()[0]);
        return view('index');
    }
}