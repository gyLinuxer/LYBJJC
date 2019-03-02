<?php
/**
 * Created by PhpStorm.
 * User: liguangyao
 * Date: 2018/12/5
 * Time: 16:37
 */
namespace app\index\controller;
use think\Controller;
use think\db;
class StoreOrentalLog extends Controller{
    public function index($id=NULL){
        if(is_null($id)){
            $this->assign("Warning","该商户不存在!");
            goto OUT;
        }
        $Ret= db()->query("SELECT StoreList.*,OrentalLog.NextDeadDate,OrentalLog.BillMaker,
        OrentalLog.BillMakeDateTime,OrentalLog.Confirmer,OrentalLog.Confirmer,
        OrentalLog.ConfirmDateTime,OrentalLog.CurOrental,OrentalLog.JNORental,OrentalLog.GiverName,OrentalLog.LastDeadDate,OrentalLog.NextDeadDate FROM 
        StoreList JOIN OrentalLog ON StoreList.StoreCode = OrentalLog.StoreCode WHERE OrentalLog.Status = 2 AND StoreList.id = ?
        ",[$id]);
        $this->assign("OrentalLog",$Ret);
        OUT:
            return view('index');
    }
}