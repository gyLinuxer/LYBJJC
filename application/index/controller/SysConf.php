<?php
namespace app\index\controller;
/**
 * Created by PhpStorm.
 * User: liguangyao
 * Date: 2018/12/4
 * Time: 16:06
 */
use think\controller;
use think\db;
class SysConf extends PublicController{
    public function index(){
        return view("index");
    }
}