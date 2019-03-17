<?php
namespace app\safetymng\controller;
use think\Controller;
use think\Db;
class CheckTBMng extends PublicController {
    function index(){
        $this->assign('CheckDB',db('CheckBaseDB')->select());
        return view('index');
    }

}