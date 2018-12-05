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
        $Ret= db()->query("SELECT StoreList.*,OrentalLog.NextDeadDate,OrentalLog.BillMaker,
        OrentalLog.BillMakeDateTime,OrentalLog.Confirmer,OrentalLog.Confirmer,
        OrentalLog.ConfirmDateTime,OrentalLog.CurOrental,OrentalLog.JNORental,OrentalLog.GiverName,OrentalLog.LastDeadDate,OrentalLog.NextDeadDate FROM 
        StoreList JOIN OrentalLog ON StoreList.StoreCode = OrentalLog.StoreCode WHERE OrentalLog.Status = 2
        ");

        $this->assign("OrentalLog",$Ret);
        return view("index");
    }
}