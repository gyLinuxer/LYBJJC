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
    public function GetSysConf(){
        $row = db("SysConf")->where(array("id"=>1))->select()[0];
        return json_encode($row,JSON_UNESCAPED_UNICODE);
    }
    public function SetSysConf()
    {
        $GreenDeadDay  = intval(input("GreenDeadDay"));
        $YellowDeadDay = intval(input("YellowDeadDay"));
        $DFPrice = floatval(input("DFPrice"));
        $WYFPrice = floatval(input("WYFPrice"));
        $SFPrice = floatval(input("SFPrice"));
        $QKYJBL = floatval(input("QKYJBL"));
        if($GreenDeadDay<=0 || $YellowDeadDay<=0 || $GreenDeadDay<=$YellowDeadDay){
            $this->assign("Warning","时间设置错误！");
            goto OUT;
        }
        if($DFPrice<=0 || $WYFPrice<=0 || $SFPrice<=0){
            $this->assign("Warning","电费和物业费单价及水费不能小于0！");
            goto OUT;
        }

        db("SysConf")->where(array("id"=>1))->update(
            array(
                "GreenDeadDay"=>$GreenDeadDay,
                "YellowDeadDay"=>$YellowDeadDay,
                "DFPrice"=>$DFPrice,
                "WYFPrice"=>$WYFPrice,
                "QKYJBL"=>$QKYJBL,
                "SFPrice"=>$SFPrice,
            )
        );

        OUT:
            return $this->index();
    }

    public function ChgPwd(){
        $Pwd = input('pwd');
        $Warning = '';
        if(empty($Pwd)){
            $Warning = '密码不可为空!';
            goto OUT;
        }
        $UserID = session("UserID");
        $Ret = db('UserList')->where(['id'=>$UserID])->update(['Pwd'=>$Pwd]);
        if($Ret>0){
            $Warning ='密码修改成功';
        }else{
            $Warning ='密码修改失败';
        }
        OUT:
            $this->assign('Warning',$Warning);
            return $this->showChgPwd();
    }

    public function showChgPwd(){
        return view('ChgPwd');
    }
}