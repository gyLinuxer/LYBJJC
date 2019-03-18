<?php
namespace app\safetymng\controller;
use think\Controller;
use think\Db;
class CheckTBMng extends PublicController {
    public  function index(){
        $this->assign('CheckDB',db('CheckBaseDB')->select());
        return view('index');
    }

    public function showFirstHalfCheck(){
        
    }

    public function FirstHalfCheckRowMng($opType = 'Add'){
        $this->assign('CheckDB',db('CheckBaseDB')->select());
        return view('FirstHalfCheckRowMng');
    }

}