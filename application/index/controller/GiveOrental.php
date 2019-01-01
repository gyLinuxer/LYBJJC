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
use think\Loader;

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
                $data["JNORental"] = $JNJE;
                $data["LastDeadDate"] = $StoreRow["NextGiveDate"];
                $data["NextDeadDate"] = $NextGiveDateCalc;
                $data["BillMaker"] = session("Name");
                $data["BillMakeDateTime"] = date('Y-m-d H:i:s');
                $data["PayCode"] = date("YmdHis").rand(100,999);
                $data["Status"] = 0;
                db("orentallog")->insert($data);
                db("storelist")->where(array("id"=>$id))->update(array("isGiving"=>db("orentallog")->getLastInsID()));
            }else if(!empty($GivingID) && $OrentalLogRow["Status"]=="0" && $Role=="Confirmer" && input("opType")=="2" ){//进入财务确认环节
                $data["Confirmer"] = session("Name");
                $data["ConfirmDateTime"] = date('Y-m-d H:i:s');
                $data["FeedBack"] = "";
                $data["Status"] = 2;
                db('orentallog')->where(array("id"=>$GivingID))->update($data);
                $data = array();
                $data["NextGiveDate"] = $OrentalLogRow["NextDeadDate"];
                $data["LastGiveDate"] = $OrentalLogRow["LastDeadDate"];
                $data["isGiving"] = "";
                $Ret = db("storelist")->where(array("id"=>$id))->update($data);
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
            }else if(!empty($GivingID) && $OrentalLogRow["Status"]=="0" && $Role=="Filler" && input("opType")=="3" ) {//票据下载
                Loader::import('PHPExcel.PHPExcel');
                Loader::import('PHPExcel.PHPExcel.IOFactory.PHPExcel_IOFactory');
                Loader::import('PHPExcel.PHPExcel.Reader.Excel2007');
                $phpExcel = new \PHPExcel();
                $objReader = \PHPExcel_IOFactory::createReader ( 'Excel5' );
                $objPHPExcel = $objReader->load ("./ZJMB.xls" );
                $objActSheet = $objPHPExcel->getSheet();
                $objPHPExcel->setActiveSheetIndex(0);
                $objActSheet1_Arr  = $objPHPExcel->setActiveSheetIndex(0)->toArray();

                $ZJLogRow =  db('orentallog')->where(array("id"=>$GivingID))->select();
                if(empty($ZJLogRow)){
                    return;
                }

                $objActSheet1_Arr[0][4] = "编号:".$ZJLogRow[0]["PayCode"];//单据编号

                $objActSheet1_Arr[1][1] = $StoreRow["StoreName"];//商铺名称
                $objActSheet1_Arr[1][4] = $StoreRow["StoreCode"];//商铺编号

                $objActSheet1_Arr[3][1] = date("Y年m月d日",strtotime($ZJLogRow[0]["LastDeadDate"]));//电费开始
                $objActSheet1_Arr[3][2] = date("Y年m月d日",strtotime($ZJLogRow[0]["NextDeadDate"]));//电费开始
                $objActSheet1_Arr[3][3] = $ZJLogRow[0]["CurORental"];//当前租金
                $objActSheet1_Arr[3][4] = $ZJLogRow[0]["JNORental"];//缴费金额

                $objActSheet1_Arr[5][1] = $ZJLogRow[0]["JNORental"];;//缴费金额大写
                $objActSheet1_Arr[5][3] = $this->getamount($ZJLogRow[0]["JNORental"]);//缴费金额小写

                $objPHPExcel->getActiveSheet()->fromArray($objActSheet1_Arr);
                $objWriter = new \PHPExcel_Writer_Excel5($objPHPExcel);
                header("Pragma: public");
                header("Expires: 0");
                header("Cache-Control:must-revalidate,post-check=0,pre-check=0");
                header("Content-Type:application/force-download");
                header("Content-Type:application/vnd.ms-execl");
                header("Content-Type:application/octet-stream");
                header("Content-Type:application/download");
                header("Content-Disposition:attachment;filename=租金票据_".session("Name")."_".date("YmdHis").".xls");
                header("Content-Transfer-Encoding:binary");
                $objWriter->save("php://output");
            }
        }

        OUT:
            return $this->index($id);
    }
}