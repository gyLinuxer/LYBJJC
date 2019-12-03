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

    public function AmeterInput(){
       $StoreCode = trim(input('StoreCode'));
       $AmmeterView = trim(input('AmmeterView'));
       if(empty($StoreCode) || floatval($AmmeterView)<=0){
            return '必须选择抄表商户，并且输入电表示数。';
       }

       $row = db()->query("SELECT * FROM StoreList WHERE StoreCode = ?",[$StoreCode])[0];
       $DFCurrentDU  =  $row['DFCurrentDU'];
       if($AmmeterView <= $DFCurrentDU){
           return '输入的电表示数不可小于或等于'.$DFCurrentDU;
       }

       db("AmmeterHistory")->insert(
           [
               'StoreCode'=>$StoreCode,
               'AmmeterView'=>$AmmeterView,
               'AddTime'=>date("Y-m-d H:i:s"),
               'AdderName'=>session("Name")
           ]
       );

       db()->query("UPDATE StoreList SET DFCurrentDU = ?,DFCurrentDUDate=? WHERE StoreCode = ?",
           [
               $AmmeterView,date("Y-m-d"),$StoreCode
           ]);

       return "OK";

    }

    function showDLInput(){
        return view('DLInput');
    }

    function GetDLList(){
        $StoreCode = trim(input("StoreCode"));
        $rows  = db()->query("SELECT * FROM AmmeterHistory WHERE StoreCode = ? ORDER BY AddTime DESC",[$StoreCode]);
        return json_encode($rows,JSON_UNESCAPED_UNICODE);
    }

}