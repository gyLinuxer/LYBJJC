<?php
namespace app\index\controller;
/**
 * Created by PhpStorm.
 * User: liguangyao
 * Date: 2018/12/4
 * Time: 16:06
 */

use think\Controller;
use think\db;
class SysConf extends PublicController{
    public function index(){
        $row = db("SysConf")->where(array("id"=>1))->select()[0];
        $this->assign("SysConf",$row);
        return view("index");
    }
    public function SetSysConf()
    {
        $GreenDeadDay  = intval(input("GreenDeadDay"));
        $YellowDeadDay = intval(input("YellowDeadDay"));
        $DFPrice = floatval(input("DFPrice"));
        $WYFPrice = floatval(input("WYFPrice"));
        if($GreenDeadDay<=0 || $YellowDeadDay<=0 || $GreenDeadDay<=$YellowDeadDay){
            $this->assign("Warning","时间设置错误！");
            goto OUT;
        }
        if($DFPrice<=0 || $WYFPrice<=0){
            $this->assign("Warning","电费和物业费单价不能小于0！");
            goto OUT;
        }

        db("SysConf")->where(array("id"=>1))->update(array("GreenDeadDay"=>$GreenDeadDay,
            "YellowDeadDay"=>$YellowDeadDay,"DFPrice"=>$DFPrice,"WYFPrice"=>$WYFPrice));

        OUT:
            return $this->index();
    }
}