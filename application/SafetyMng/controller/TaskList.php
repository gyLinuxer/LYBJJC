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


class TaskList extends PublicController
{
    public function Index()
    {
        $this->assign("TaskList",\db("tasklist")->select());
        return view('index');
    }
}