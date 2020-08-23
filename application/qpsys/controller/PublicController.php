<?php
namespace app\QPSys\controller;

use think\Controller;

class  PublicController extends  Controller{
    public function Tran2WArr1WArr($Arr,$KeyName){
        $data = [];
        foreach ($Arr as $k=>$v){
            $data[] = $Arr[$k][$KeyName];
        }
        return $data;
    }
    public function  index(){
        return 'index';
    }
}