<?php
/**
 * Created by PhpStorm.
 * User: liguangyao
 * Date: 2018/12/3
 * Time: 22:14
 */
namespace app\index\controller;
use think\Controller;
use think\Db;
class StoreList extends PublicController{
    public function index()
    {
        $this->assign("StoreAddrList",db('StoreAddr')->order("addrcode ASC")->select());
        return view("index");
    }
    public function  GetTheLastDay(){
        return date("Y-m-d",strtotime("+1 month -1 day",strtotime(date("Y-m-1"))));
    }
    public function AddStore(){
        $Data = input();
        $rows_Find = db()->query('SELECT * FROM StoreList WHERE StoreCode=?',[$Data['StoreCode']]);
        if(!empty($rows_Find)){
            return '该店铺号已经存在!';
        }

        foreach ($Data as $d){
            if(empty($d)){
                return '请完整填写所有项目!';
            }
        }

        $Cnt = db()->query('INSERT INTO StoreList (
            StoreName,StoreAddr,StoreOwner,FZDeadDate,Tel,StoreArea,StoreRental,
            ContactDate,ContactEndDate,ContactCode,SFDeadDate,DFDeadDate,DFCurrentDU,DFCurrentDUDate,
            WYFDeadDate,YJ,StoreCode) VALUES (
              ?,?,?,?,?,?,?,
              ?,?,?,?,?,?,?,
              ?,?,?
            )
            ',[
            $Data['StoreName'],$Data['StoreAddr'],$Data['StoreOwner'],$Data['FZDeadDate'],$Data['Tel'],$Data['StoreArea'],$Data['StoreRental'],
            $Data['ContactDate'],$Data['ContactEndDate'],$Data['ContactCode'],$Data['SFDeadDate'],$Data['DFDeadDate'],$Data['DFCurrentDU'],$Data['DFCurrentDUDate'],
            $Data['WYFDeadDate'],$Data['YJ'],$Data['StoreCode']
        ]);
        if($Cnt>0){
            return 'OK';
        }else{
            return '修改失败!';
        }
    }

    public function showMdfStore(){


        return view("MdfStore");
    }

    public function MdfStore(){
        $Data = input();
        $Cnt = db()->query('UPDATE StoreList SET 
            StoreName=?,StoreAddr=?,StoreOwner=?,FZDeadDate=?,Tel=?,StoreArea=?,StoreRental=?,
            ContactDate=?,ContactEndDate=?,ContactCode=?,SFDeadDate=?,DFDeadDate=?,DFCurrentDU=?,DFCurrentDUDate=?,
            WYFDeadDate=?,YJ=? WHERE StoreCode=?
            ',[
                $Data['StoreName'],$Data['StoreAddr'],$Data['StoreOwner'],$Data['FZDeadDate'],$Data['Tel'],$Data['StoreArea'],$Data['StoreRental'],
                $Data['ContactDate'],$Data['ContactEndDate'],$Data['ContactCode'],$Data['SFDeadDate'],$Data['DFDeadDate'],$Data['DFCurrentDU'],$Data['DFCurrentDUDate'],
                $Data['WYFDeadDate'],$Data['YJ'],$Data['StoreCode']
        ]);
        if($Cnt>0){
            return 'OK';
        }else{
            return '修改失败!';
        }
    }

    function GetStoreInfo(){
        $StoreCode  = trim(input("StoreCode"));
        if(empty($StoreCode)){
            return "";
        }
        $row = db()->query("SELECT * FROM StoreList WHERE StoreCode = ?",[$StoreCode]);
        return json_encode($row[0],JSON_UNESCAPED_UNICODE);
    }

    function GetStoreQKInfo($StoreCode=''){

        if(empty($StoreCode)){
            return '';
        }

        $ConfRow = db()->query("SELECT * FROM SysConf WHERE id = 1")[0];
        $StoreInfo = db()->query("SELECT * FROM StoreList WHERE StoreCode = ? ",[$StoreCode])[0];

        $StoreRental = floatval($StoreInfo['StoreRental']);
        $StoreArea = floatval($StoreInfo['StoreArea']);
        $SFUnit = floatval($ConfRow['SFPrice']);
        $DFUnit = floatval($ConfRow['DFPrice']);
        $WFYUnit = floatval($ConfRow['WYFPrice']);

        $SQL = 'SELECT ROUND(( CASE WHEN FZMonth>0 THEN FZMonth ELSE 0 END ) * ? ,2)AS FZQK,
                       ROUND(( CASE WHEN WYFMonth>0 THEN WYFMonth ELSE 0 END ) * ? ,2)AS WYFQK,
                       ROUND(( CASE WHEN SFMonth>0 THEN SFMonth ELSE 0 END ) * ?  ,2)AS SFQK,
                       ROUND(( CASE WHEN DFDU>0 THEN DFDU ELSE 0 END ) * ? ,2) AS DFQK,
                       OtherQK,StoreCode,YJ
         FROM   (  SELECT  TIMESTAMPDIFF(MONTH,FZDeadDate,now()) AS FZMonth,
                    TIMESTAMPDIFF(MONTH,WYFDeadDate,now()) AS WYFMonth,
                    TIMESTAMPDIFF(MONTH,SFDeadDate,now()) AS SFMonth,
                    (DFCurrentDU - DFDeadDU) DFDU,OtherQK,StoreCode,YJ
         FROM StoreList WHERE StoreCode = ? ) xTable' ;

         $SQLParam = [$StoreRental,$WFYUnit * $StoreArea,$SFUnit,$DFUnit,$StoreCode];

         $row = db()->query($SQL,$SQLParam)[0];
         $row['TotalQK'] = ROUND($row['FZQK'] + $row['WYFQK'] +$row['SFQK'] +$row['DFQK'] +$row['OtherQK'],2);

         return json_encode($row,JSON_UNESCAPED_UNICODE);
    }

    public function showAddStore(){
        return view('AddStore');
    }




}