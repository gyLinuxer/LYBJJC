<?php
namespace app\QPSys\controller;

use think\Controller;

class  MBController extends  Controller{
    public function  index(){
        return view('AppList');
    }
    public  function showACQry(){
        return view('ACQry');
    }
}