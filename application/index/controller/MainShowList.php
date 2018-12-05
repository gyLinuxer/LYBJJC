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

        $StoreCode = trim(input("StoreCode"));
        $StoreAddr = trim(input("StoreAddr"));
        $StoreName = trim(input("StoreName"));
        $StoreOwner = trim(input("StoreOwner"));
        $ContactCode = trim(input("ContactCode"));
        $OrderBy  = trim(input("Orderby"));
        $SubSQL = "";

        $ParamArr = [];

        if(!empty($StoreCode)){
            $SubSQL.= " AND StoreList.StoreCode Like ? ";
            $ParamArr[] = '%'.$StoreCode.'%';
        }

        if(!empty($StoreAddr)){
            $SubSQL.= " AND StoreAddr Like ? ";
            $ParamArr[] = '%'.$StoreAddr.'%';
        }

        if(!empty($StoreName)){
            $SubSQL.= " AND StoreName Like ? ";
            $ParamArr[] = '%'.$StoreName.'%';
        }

        if(!empty($StoreOwner)){
            $SubSQL.= " AND StoreOwner Like ? ";
            $ParamArr[] = '%'.$StoreOwner.'%';
        }

        if(!empty($ContactCode)){
            $SubSQL.= " AND ContactCode Like ? ";
            $ParamArr[] = '%'.$ContactCode.'%';
        }

        $OrderByArr["房租剩余天数"] = "NextGiveDate";
        if(!empty($OrderByArr[$OrderBy])){
            $SubSQL.= " Order by ".$OrderByArr[$OrderBy];
        }
        $rows = db()->query("SELECT StoreList.*,DATEDIFF(StoreList.NextGiveDate,now()) as LeftDays,OrentalLog.Status ,IFNULL(Status,-1) as State
 FROM StoreList Left JOIN OrentalLog
                          ON StoreList.isGiving = OrentalLog.id WHERE 1=1 ".$SubSQL,$ParamArr);
        //dump($rows);
        $this->assign("StoreList",$rows);
        $this->assign("SysConf",db("sysconf")->select()[0]);
        $this->assign("StoreAddr",db("storeaddr")->select());
        return view('index');
    }


}