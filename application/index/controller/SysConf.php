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
        $row = db("sysconf")->where(array("id"=>1))->select()[0];
        $this->assign("SysConf",$row);
        return view("index");
    }
    public function SetSysConf()
    {
        $GreenDeadDay  = intval(input("GreenDeadDay"));
        $YellowDeadDay = intval(input("YellowDeadDay"));
        if($GreenDeadDay<=0 || $YellowDeadDay<=0 || $GreenDeadDay<=$YellowDeadDay){
            $this->assign("Warning","时间设置错误！");
            goto OUT;
        }

        db("sysconf")->where(array("id"=>1))->update(array("GreenDeadDay"=>$GreenDeadDay,
            "YellowDeadDay"=>$YellowDeadDay));

        OUT:
            return $this->index();
    }
}