<?php
namespace app\SafetyMng\controller;
use think\controller;
use think\Db;
use think\Request;
class QuestionInput extends controller
{
    public function index(){
        return view('index');
    }
}