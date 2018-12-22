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

class DLInput extends PublicController{
    public function index($StoreCode='')
    {
        $this->assign("AmeterViewHistory",db('ammeterhistory')->where(array("StoreCode"=>$StoreCode))->select());
        $this->assign("StoreCode",$StoreCode);
        $this->assign("StoreName",db('storelist')->where(array("StoreCode"=>$StoreCode))->select()[0]["StoreName"]);
        return view('index');
    }
    public function AmeterInput(){
        $StoreCode = input("StoreCodeHid");
        $AmeterView = floatval(input('AmeterView'));
        $ViewDate = input('ViewDate');
        $Ret = db('storelist')->where(array("StoreCode"=>$StoreCode))->select();
        if(empty($Ret)){
            $this->assign("Warning","该商户不存在!");
            goto OUT;
        }

        if($AmeterView==0 || empty($ViewDate)){
            $this->assign("Warning","抄表日期与电表示数不能为空!");
            goto OUT;
        }

        $Ret = db()->query("SELECT AmmeterView ,StoreCode,ViewDate  FROM AmmeterHistory WHERE StoreCode =? ORDER BY ViewDate DESC Limit 1",array($StoreCode));
        $LastView = $Ret==NULL?0:floatval($Ret[0]["AmmeterView"]);
        if($AmeterView<$LastView){
            $this->assign("Warning","本次表数小于上次表数!");
            goto OUT;
        }

        $data["StoreCode"] = $StoreCode;
        $data["AmmeterView"] = $AmeterView;
        $data["ViewDate"] = $ViewDate;
        $data["AddTime"] = date("Y-m-d H:i:s");
        $data["AdderName"] = session("Name");
        db('ammeterhistory')->insert($data);

        OUT:
            return $this->index($StoreCode);
    }
}