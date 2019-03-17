<?php
/**
 * Created by PhpStorm.
 * User: liguangyao
 * Date: 2018/12/5
 * Time: 16:37
 */
namespace app\index\controller;

class OrentalLog extends PublicController{
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
            $SubSQL.= " AND ConfirmDateTime >= ? ";
            $ParamArr[] = $Date1;
        }

        if(!empty($Date2)){
            $SubSQL.= " AND ConfirmDateTime <= ? ";
            $ParamArr[] = $Date2;
        }

        $Ret= db()->query("SELECT StoreList.*,OrentalLog.NextDeadDate,OrentalLog.BillMaker,
        OrentalLog.BillMakeDateTime,OrentalLog.Confirmer,OrentalLog.Confirmer,
        OrentalLog.ConfirmDateTime,OrentalLog.CurOrental,OrentalLog.PayCode,OrentalLog.JNORental,OrentalLog.GiverName,OrentalLog.LastDeadDate,OrentalLog.NextDeadDate FROM 
        StoreList JOIN OrentalLog ON StoreList.StoreCode = OrentalLog.StoreCode WHERE OrentalLog.Status = 2
        ".$SubSQL,$ParamArr);

        $this->assign("OrentalLog",$Ret);
        return view("index");
    }
}