<?php
namespace app\SafetyMng\controller;
use think\db;
class Index extends PublicController
{
    public function index()
    {

        //dump(input());
        return view('index');
    }
    public function uploadFile(){

    }
}
