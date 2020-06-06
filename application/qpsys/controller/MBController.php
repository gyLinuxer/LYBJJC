<?php
namespace app\QPSys\controller;

use think\Controller;
use think\Request;

class  MBController extends  Controller{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
    }

    public function  index(){
        return view('AppList');
    }

    public  function showACQry(){
        return view('ACQry');
    }

    public function showXQSQ(){
        return view('XQSQ');
    }

    public function showLogin(){
        return view('Login');
    }

    public function Login()
    {
        $userName = input('userName');
        $passWord = input('passWord');
        $row = db('UserList')->where([
            'UserName'=>$userName,
            'Pwd' => $passWord,
        ])->select();
        if(empty($row)){
            return '用户名或者密码错误!';
        }

        $row = $row[0];
        session('UserID',$row['id']);
        session('Name',$row['Name']);
        return 'OK';

    }
}