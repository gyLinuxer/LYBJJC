<?php
namespace app\PXSQ\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\PXSQ\controller\CodeMachine;


class userMng extends controller{
    public function GetAllUserList(){
        return json_encode(db('UserList')->select(),JSON_UNESCAPED_UNICODE);
    }
}