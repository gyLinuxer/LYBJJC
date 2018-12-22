<?php
namespace app\SafetyMng\controller;
use think\controller;
use think\Db;
use think\Request;

class Reform extends PublicController{
    public function index()
    {
        $this->assign("QuestionSourceList",db('questionsource')->select());
        return view('index');
    }
}