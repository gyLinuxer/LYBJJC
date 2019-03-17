<?php
/**
 * Created by PhpStorm.
 * User: liguangyao
 * Date: 2018/12/4
 * Time: 20:31
 */
namespace app\index\controller;
use think\Controller;
use think\Db;

class  Login extends Controller{
    public function index()
    {
        session("Corp",NULL);
        session("Name",NULL);
        session("userType",NULL);
        return view('index');
    }
    public  function Login()
    {
        $UserName = input('aU');
        $Pwd = input('bP');
        $Ret = db("UserList")->where(array(
            "UserName"=>$UserName,
            "Pwd"=>$Pwd
        ))->select();
        if(empty($Ret)){
            $this->assign("Warning","用户名或者密码错误！");
        }else{
            session("Corp",$Ret[0]["Corp"]);
            session("Name",$Ret[0]["Name"]);
            session("userType",$Ret[0]["userType"]);
            $this->redirect(url("Index/MainShowList/Index"));
        }
        return $this->index();
    }
}