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
    static public function FillFakeCorpAndRole($QuestionID){
        $Question = db()->query("SELECT TaskID From QuestionList WHERE ID = ? ",array($QuestionID));
        if(empty($Question)){
            return ;
        }
        $TaskID = $Question[0]["TaskID"];
        $Ret = db()->query("SELECT * FROM TaskDealerGroup WHERE TaskID = ? ",array($TaskID));
        if(!empty($Ret)){
            $FakeRoleArr = session("FakeRoleArr");
            if(empty($FakeRoleArr)){
                $FakeRoleArr = array($TaskID=>$Ret[0]);
            }else{
                $FakeRoleArr[$TaskID] = $Ret[0];
            }
            session("FakeRoleArr",$FakeRoleArr);
        }
        //session["FakeRoleArr"] => {TaskID=>{
        //                                   Name,Corp,Role,GroupID
        //  }}
    }
}