<?php
/**
 * Created by PhpStorm.
 * User: liguangyao
 * Date: 2018/12/4
 * Time: 20:31
 */
namespace app\SafetyMng\controller;
use think\Controller;
use think\Db;


class TaskList extends PublicController
{
    public function Index()
    {
        $CorpRole = session('CorpRole');
        $TaskList = '';
        if($CorpRole=='领导'){
            $TaskList = db()->query("SELECT * FROM TaskList WHERE isDeleted = '否' AND  ReciveCorp = ?",array(session("Corp")));
        }else{
            $TaskList = db()->query("SELECT * FROM TaskList WHERE isDeleted = '否' AND  id in 
                                (SELECT DISTINCT TaskID FROM TaskDealerGroup WHERE Name=?)",array(session('Name')));
        }
        $this->assign("TaskList",$TaskList);
        $this->assign("Cnt",1);
        return view('index');
    }
}