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
        $CorpRole = session('CorpRole');
        $TaskList = '';
        if($CorpRole=='领导'){
            $TaskList = db()->query("SELECT * FROM TaskList WHERE ReciveCorp = ?",array(session("Corp")));
        }else{
            $TaskList = db()->query("SELECT * FROM TaskList WHERE id in 
                                (SELECT DISTINCT TaskID FROM TaskDealerGroup WHERE Name=?)",array(session('Name')));
        }
        $this->assign("TaskList",$TaskList);
        return view('index');
    }
}