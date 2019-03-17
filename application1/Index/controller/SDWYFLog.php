<?php
/**
 * Created by PhpStorm.
 * User: liguangyao
 * Date: 2018/12/3
 * Time: 22:14
 */
namespace app\index\controller;
use think\controller;
use think\Db;
class SDWYFLog extends PublicController{
    public function index(){

        $StoreCode = trim(input("StoreCode"));
        $StoreName = trim(input("StoreName"));
        $StoreOwner = trim(input("StoreOwner"));
        $Date1 = trim(input("Date1"));
        $Date2 = trim(input("Date2"));

        $SubSQL = "";

        $ParamArr = [];

        if(!empty($StoreCode)){
            $SubSQL.= " AND StoreList.StoreCode Like ? ";
            $ParamArr[] = '%'.$StoreCode.'%';
        }


        if(!empty($StoreName)){
            $SubSQL.= " AND StoreName Like ? ";
            $ParamArr[] = '%'.$StoreName.'%';
        }

        if(!empty($StoreOwner)){
            $SubSQL.= " AND StoreOwner Like ? ";
            $ParamArr[] = '%'.$StoreOwner.'%';
        }

        if(!empty($Date1)){
            $SubSQL.= " AND QRTime >= ? ";
            $ParamArr[] = $Date1;
        }

        if(!empty($Date2)){
            $SubSQL.= " AND QRTime <= ? ";
            $ParamArr[] = $Date2;
        }

        $Ret= db()->query("SELECT StoreList.StoreName,StoreList.StoreOwner,PaymentHistory.* FROM StoreList Join PaymentHistory 
        ON StoreList.StoreCode = PaymentHistory.StoreCode WHERE PaymentHistory.PayCode Not IN (SELECT GivingSDWYF FROM StoreList )
        ".$SubSQL,$ParamArr);

        $this->assign("FeeLog",$Ret);
        return view("index");
    }
}