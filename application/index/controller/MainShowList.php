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
    public function StoreQry(){

        $StoreCode = trim(input("StoreCode"));
        $StoreAddr = trim(input("StoreAddr"));
        $StoreName = trim(input("StoreName"));
        $StoreOwner = trim(input("StoreOwner"));
        $ContactCode = trim(input("ContactCode"));
        $OrderBy  = trim(input("Orderby"));


        $FZDQStart = trim(input("FZDQStart"));
        $WYFDQStart = trim(input("WYFDQStart"));
        $SFDQStart = trim(input("SFDQStart"));
        $DFDQStart = trim(input("DFDQStart"));

        $FZDQEnd = trim(input("FZDQEnd"));
        $WYFDQEnd = trim(input("WYFDQEnd"));
        $SFDQEnd = trim(input("SFDQEnd"));
        $DFDQEnd = trim(input("DFDQEnd"));


        $SubSQL = "";

        $ConfRow = db()->query("SELECT * FROM SysConf WHERE id = 1")[0];

        $SFUnit = floatval($ConfRow['SFPrice']);
        $DFUnit = floatval($ConfRow['DFPrice']);
        $WFYUnit = floatval($ConfRow['WYFPrice']);

        $ParamArr = [$WFYUnit,$SFUnit,$DFUnit];

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

        if(!empty($ContactCode)){
            $SubSQL.= " AND ContactCode Like ? ";
            $ParamArr[] = '%'.$ContactCode.'%';
        }


        if(!empty($FZDQStart)) {
            $SubSQL .= " AND FZDeadDate >= ? ";
            $ParamArr[] = $FZDQStart;
        }

        if(!empty($WYFDQStart)) {
            $SubSQL .= " AND WYFDeadDate >= ? ";
            $ParamArr[] = $WYFDQStart;
        }

        if(!empty($SFDQStart)) {
            $SubSQL .= " AND SFDeadDate >= ? ";
            $ParamArr[] = $SFDQStart;
        }

        if(!empty($DFDQStart)) {
            $SubSQL .= " AND DFDeadDate >= ? ";
            $ParamArr[] = $DFDQStart;
        }

        if(!empty($FZDQEnd)) {
            $SubSQL .= " AND FZDeadDate <= ? ";
            $ParamArr[] = $FZDQEnd;
        }

        if(!empty($WYFDQEnd)) {
            $SubSQL .= " AND WYFDeadDate <= ? ";
            $ParamArr[] = $WYFDQEnd;
        }

        if(!empty($DFDQEnd)) {
            $SubSQL .= " AND DFDeadDate <= ? ";
            $ParamArr[] = $DFDQEnd;
        }

        if(!empty($SFDQEnd)) {
            $SubSQL .= " AND SFDeadDate <= ? ";
            $ParamArr[] = $SFDQEnd;
        }

        $OrderByArr["房租剩余天数"] = "FZDeadDate";
        if(!empty($OrderByArr[$OrderBy])){
            $SubSQL.= " Order by ".$OrderByArr[$OrderBy];
        }

        $rows = db()->query("SELECT StoreList.*,DATEDIFF(StoreList.FZDeadDate,now()) as ZJLeftDays,
                      DATEDIFF(now(),StoreList.SFDeadDate) as SFLeftDays,
                      DATEDIFF(now(),StoreList.DFDeadDate) as DFLeftDays,
                      DATEDIFF(StoreList.WYFDeadDate,now()) as WYFLeftDays,OrentalLog.Status ,IFNULL(Status,-1) as State,
                      ROUND((ROUND(( CASE WHEN TIMESTAMPDIFF(MONTH,FZDeadDate,now())>0 THEN TIMESTAMPDIFF(MONTH,FZDeadDate,now()) ELSE 0 END ) * StoreRental ,2) + 
                      ROUND(( CASE WHEN TIMESTAMPDIFF(MONTH,WYFDeadDate,now())>0 THEN TIMESTAMPDIFF(MONTH,WYFDeadDate,now()) ELSE 0 END ) * StoreArea * ? ,2) + 
                      ROUND(( CASE WHEN TIMESTAMPDIFF(MONTH,SFDeadDate,now())>0 THEN TIMESTAMPDIFF(MONTH,SFDeadDate,now()) ELSE 0 END ) * ?  ,2) + 
                      ROUND(( CASE WHEN (DFCurrentDU - DFDeadDU)>0 THEN (DFCurrentDU - DFDeadDU) ELSE 0 END ) * ? ,2) +
                      OtherQK),2) AS TotalQK
                FROM StoreList Left JOIN OrentalLog ON StoreList.isGiving = OrentalLog.id WHERE 1=1 ".$SubSQL,$ParamArr);

        return json_encode($rows,JSON_UNESCAPED_UNICODE);
    }

    public function showStoreList(){
        return view("StoreList");
    }

    public function getStoreList(){
        $rows = db()->query("SELECT StoreCode,StoreName FROM StoreList ORDER BY StoreCode ASC");
        return json_encode($rows,JSON_UNESCAPED_UNICODE);
    }

}