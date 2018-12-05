<?php
/**
 * Created by PhpStorm.
 * User: liguangyao
 * Date: 2018/12/4
 * Time: 18:06
 */
namespace app\index\controller;
use think\controller;
use think\Db;

class GiveOrental extends PublicController
{
    private  $FillerCorp = "招商";
    private  $ConfirmerCorp = "财务";

    private  function  JudgeRole(){
           if(session("Corp")==$this->FillerCorp) {
                return "Filler";
           }else if(session("Corp")==$this->ConfirmerCorp){
                return "Confirmer";
           }else{
               return "";
           }
    }

    public function index($id=NULL){
        $Ret= db()->query("SELECT StoreList.*,OrentalLog.NextDeadDate,OrentalLog.BillMaker,
        OrentalLog.BillMakeDateTime,OrentalLog.Confirmer,OrentalLog.Confirmer,
        OrentalLog.ConfirmDateTime,OrentalLog.FeedBack,OrentalLog.JNORental,OrentalLog.GiverName,OrentalLog.Status FROM 
        StoreList LEFT JOIN OrentalLog ON StoreList.isGiving = OrentalLog.id 
        WHERE StoreList.id=?",[$id]);
        $this->assign("Role",$this->JudgeRole());
        $this->assign("Status",$Ret[0]["Status"]);
        if(empty($Ret)){
            dump($id);
            return "该商户不存在！";
        }else{
            $this->assign("row",$Ret[0]);
        }
        return view('index');
    }
    public function CalcNextGiveDate($StoreRental/*店铺租金*/,$NextGiveDate,$RentalGived)
    {
        $ZS = intval($RentalGived / $StoreRental);
        $XS = $RentalGived / $StoreRental - $ZS;
        $d1 = strtotime ("+".$ZS." month", strtotime($NextGiveDate));
        $DaysInMonth = date('t', $d1);
        $LeftDays = round($DaysInMonth * $XS);
        $d2 = date('Y-m-d', strtotime ("+".$LeftDays." day", $d1));
        return $d2;
    }
    public function GiveOrental()
    {
        dump(input());
        $id = input("rowId");
        $JNJE = floatval(input("JNJE"));
        $GiverName = input("GiverName");
        if(empty($GiverName) || $JNJE< 1 ){
            $this->assign("Warning","请填写缴纳人和缴纳金额，且金额不可小于1元。");
            goto OUT;
        }
        $Role = $this->JudgeRole();
        $StoreRow = db("storelist")->where(array("id"=>$id))->select()[0];
        $StoreRental = $StoreRow["StoreRental"];
        $NextGiveDate = $StoreRow["NextGiveDate"];
        if(empty($StoreRow)){
            $this->assign("Warning","该店铺不存在!");
            goto OUT;
        }else{
            $GivingID = $StoreRow["isGiving"];
            $ZS = intval($JNJE / $StoreRental);
            $XS = $JNJE / $StoreRental - $ZS;
            if(!empty($GivingID)){
                $OrentalLogRow = db("orentallog")->where(array("id"=>$GivingID))->select()[0];
            }

            if(empty($GivingID) && $Role=="Filler"){//还没有开始缴纳，并且是招商部门的人,开始缴纳
                //开始计算租金到期时间
                $NextGiveDateCalc =  $this->CalcNextGiveDate($StoreRental,$NextGiveDate,$JNJE);
                $data["StoreCode"] = $StoreRow["StoreCode"];
                $data["GiverName"] = $GiverName;
                $data["CurORental"] = $StoreRow["StoreRental"];
                $data["JNOrental"] = $JNJE;
                $data["LastDeadDate"] = $StoreRow["NextGiveDate"];
                $data["NextDeadDate"] = $NextGiveDateCalc;
                $data["BillMaker"] = session("Name");
                $data["BillMakeDateTime"] = date('Y-m-d H:i:s');
                $data["Status"] = 0;
                $LogID = db("orentallog")->insert($data);
                \db("storelist")->where(array("id"=>$id))->update(array("isGiving"=>db("orentallog")->getLastInsID()));
            }else if(!empty($GivingID) && $OrentalLogRow["Status"]=="0" && $Role=="Confirmer" && input("opType")=="2" ){//进入财务确认环节
                $data["Confirmer"] = session("Name");
                $data["ConfirmDateTime"] = date('Y-m-d H:i:s');
                $data["FeedBack"] = "";
                $data["Status"] = 2;
                db('orentallog')->where(array("id"=>$GivingID))->update($data);
                $data = array();
                $data["NextGiveDate"] = $OrentalLogRow["NextDeadDate"];
                $data["isGiving"] = "";
                db("storelist")->where(array("id"=>$id))->update($data);
            }else if(!empty($GivingID) && $OrentalLogRow["Status"]=="0" && $Role=="Confirmer" && input("opType")=="1" ){//财务驳回
                $data["Confirmer"] = session("Name");
                $data["ConfirmDateTime"] = date('Y-m-d H:i:s');
                $data["FeedBack"] = input("FeedBack");
                $data["Status"] = 1;
                db('orentallog')->where(array("id"=>$GivingID))->update($data);
            }else if(!empty($GivingID) && $OrentalLogRow["Status"]=="1" && $Role=="Filler" && input("opType")=="0" ){
                $NextGiveDateCalc =  $this->CalcNextGiveDate($StoreRental,$NextGiveDate,$JNJE);
                $data["StoreCode"] = $StoreRow["StoreCode"];
                $data["GiverName"] = $GiverName;
                $data["CurORental"] = $StoreRow["StoreRental"];
                $data["JNORental"] = $JNJE;
                $data["LastDeadDate"] = $StoreRow["NextGiveDate"];
                $data["NextDeadDate"] = $NextGiveDateCalc;
                $data["BillMaker"] = session("Name");
                $data["BillMakeDateTime"] = date('Y-m-d H:i:s');
                $data["Confirmer"] = "";
                $data["ConfirmDateTime"] = NULL;
                $data["Status"] = 0;
                db("orentallog")->where(array("id"=>$GivingID))->update($data);
            }
        }

        OUT:
            return $this->index();
    }
}