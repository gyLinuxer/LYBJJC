<?php
/**
 * Created by PhpStorm.
 * User: liguangyao
 * Date: 2018/12/4
 * Time: 16:39
 */
namespace app\index\controller;
use think\controller;
use think\Db;

class MainShowList extends PublicController{
    public function index(){
        $this->assign("StoreList",\db("storelist")->order("StoreAddr ASC")->select());
        return view('index');
    }
}