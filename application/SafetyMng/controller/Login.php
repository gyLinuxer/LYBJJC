<?php
/**
 * Created by PhpStorm.
 * User: liguangyao
 * Date: 2018/12/4
 * Time: 20:31
 */
namespace app\SafetyMng\controller;
use think\controller;
use think\Db;

class  Login extends controller{
    public function index()
    {
        session("Corp",NULL);
        session("Name",NULL);
        session("userType",NULL);
        return view('login-3');
    }
    public  function Login()
    {
        $UserName = input('aU');
        $Pwd = input('bP');
        $Ret = db("userlist")->where(array(
            "UserName"=>$UserName,
            "Pwd"=>$Pwd
        ))->select();
        if(empty($Ret)){
            $this->assign("Warning","用户名或者密码错误！");
        }else{
            session("Corp",$Ret[0]["Corp"]);
            session("Name",$Ret[0]["Name"]);
            session("CorpRole",$Ret[0]["CorpRole"]);
            $this->redirect(url("/SafetyMng/TaskList"));
        }
        return $this->index();
    }
}