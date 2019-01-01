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
use think\Loader;

class GiveFee extends PublicController
{
    public function index($StoreCode = '')
    {

        if (empty($StoreCode)) {
            return "商铺号为空!";
        }

        $Ret = db('storelist')->where(array("StoreCode" => $StoreCode))->select();
        if (empty($Ret)) {
            return "商铺不存在！";
        }
        $this->assign("KPStatus",$Ret[0]["SDWYFStatus"]);
        $SysConf_Ret = db()->query("SELECT * FROM SysConf limit 1");

        $this->assign("StoreCode", $Ret[0]["StoreCode"]);
        $this->assign("StoreName", $Ret[0]["StoreName"]);
        $this->assign("Corp", session("Corp"));

        $Ret = $this->CheckPriceHistoryOK($StoreCode, "水费");
        if (!empty($Ret) ) {
            return $Ret;
        }
        $TotalFee = 0;
        $Ret_Data = $this->CalcSFPrice($StoreCode);
        $this->assign("SFStartDate",$Ret_Data["StartDate"]);
        $this->assign("SFENDDate"  ,$Ret_Data["EndDate"]);
        $this->assign("SFTotalFee" ,$Ret_Data["TotalFee"]);
        if($Ret_Data["Ret"]!="OK"){
            $this->assign("Warning",$Ret_Data["Ret"]);
            goto OUT;
        }
        $TotalFee += floatval($Ret_Data["TotalFee"]);

        $Ret_Data = $this->CalcDFPrice($StoreCode);
        $this->assign("DFStartDate",$Ret_Data["DFStartDate"]);
        $this->assign("DFEndDate"  ,$Ret_Data["DFEndDate"]);
        $this->assign("DFTotalFee" ,$Ret_Data["DFTotalFee"]);
        $this->assign("StartDU"  ,$Ret_Data["StartDU"]);
        $this->assign("EndDU" ,$Ret_Data["EndDU"]);
        $this->assign("DF_DU_Used"  ,$Ret_Data["DF_DU_Used"]);
        $this->assign("DFPrice"  ,$SysConf_Ret[0]["DFPrice"]);
        if($Ret_Data["Ret"]!="OK"){
            $this->assign("Warning",$Ret_Data["Ret"]);
            goto OUT;
        }
        $TotalFee += floatval($Ret_Data["DFTotalFee"]);

        $Ret_Data = $this->CalcWYFPrice($StoreCode);
        $this->assign("WYFStartDate",$Ret_Data["WYFStartDate"]);
        $this->assign("WYFEndDate"  ,$Ret_Data["WYFEndDate"]);
        $this->assign("WYFTotalFee" ,$Ret_Data["WYFTotalFee"]);
        $this->assign("StoreArea"   ,$Ret_Data["StoreArea"]);
        $this->assign("WYFPrice"    ,$Ret_Data["WYFPrice"]);
        $this->assign("WFYTotalFee"    ,$Ret_Data["WFYTotalFee"]);
        if($Ret_Data["Ret"]!="OK"){
            $this->assign("Warning",$Ret_Data["Ret"]);
            goto OUT;
        }
        $TotalFee += floatval($Ret_Data["WFYTotalFee"]);

        OUT:

        $this->assign("TotalFee",$TotalFee);
        $this->assign("TotalFeeDX",$this->getamount($TotalFee));

        return view('index');
    }

    public function CalcSFPrice($StoreCode)
    {
        $Ret_Data = array();
        $Ret = db('storelist')->where(array("StoreCode" => $StoreCode))->select();
        if (empty($Ret)) {
            $Ret_Data["Ret"] = "商铺不存在!";
            goto OUT;
        }
        $StartYM  = date("Y-m-1", strtotime("+1 day", strtotime($Ret[0]["SFDeadDate"])));
        $CurMonth = date("Y-m-d",strtotime("-1 day +1 month", strtotime(date("Y-m-1"))));
        if(strtotime($StartYM) >= strtotime($CurMonth)){
            $Ret_Data["StartDate"] = $Ret[0]["SFDeadDate"];
            $Ret_Data["EndDate"]   = $Ret[0]["SFDeadDate"];
            $Ret_Data["TotalFee"]  = 0;
            $Ret_Data["Ret"]       = "OK";
            goto OUT;
        }
        //到这个函数的时候已经检查过每个月的水费单价了
        $Ret_Data["Ret"] = $this->CheckPriceHistoryOK($StoreCode,"水费");
        if(!empty($Ret_Data["Ret"])){
            goto OUT;
        }
        $Ret =  db()->query("SELECT SUM(Price) as TotalFee FROM PriceHistory WHERE Month BETWEEN ? AND ?",array($StartYM,$CurMonth));
        $Ret_Data["StartDate"] = $StartYM;
        $Ret_Data["EndDate"]   = $CurMonth;
        $Ret_Data["TotalFee"]  = $Ret[0]["TotalFee"];
        $Ret_Data["Ret"]       = "OK";

        OUT:
            return $Ret_Data;
    }

    public function CalcDFPrice($StoreCode){
        $Ret_Data = array();
        $Ret = db('storelist')->where(array("StoreCode" => $StoreCode))->select();
        if (empty($Ret)) {
            $Ret_Data["Ret"] = "商铺不存在!";
            goto OUT;
        }

        $DF_DS = floatval($Ret[0]["DFDeadDU"]);
        $DFView_Ret = db()->query("SELECT * FROM AmmeterHistory WHERE StoreCode = ? ORDER BY ViewDate DESC limit 1",array($StoreCode));
        if(empty($DFView_Ret)){
            $Ret_Data["Ret"] = "该商户暂时没有抄表记录!";
            goto OUT;
        }
        $SysConf_Ret = db()->query("SELECT * FROM SysConf limit 1");

        $DF_Price = floatval($SysConf_Ret[0]["DFPrice"]);
        $DF_DU_Used = floatval($DFView_Ret[0]["AmmeterView"]) - $DF_DS;
        $Ret_Data["DFStartDate"] = date("Y-m-d",strtotime("+1 day",strtotime($Ret[0]["DFDeadDate"])));
        $Ret_Data["DFEndDate"]   = $DFView_Ret[0]["ViewDate"];
        if(strtotime($Ret_Data["DFStartDate"])>=strtotime($Ret_Data["DFEndDate"])){
            $Ret_Data["DFStartDate"] = $Ret_Data["DFEndDate"];
        }
        $Ret_Data["StartDU"]   = $Ret[0]["DFDeadDU"];
        $Ret_Data["EndDU"]     = $DFView_Ret[0]["AmmeterView"];
        $Ret_Data["DF_DU_Used"]= $DF_DU_Used;
        $Ret_Data["DFTotalFee"]= $DF_DU_Used * $DF_Price;
        $Ret_Data["Ret"] =  "OK";
        if($DF_DU_Used<0){
            $Ret_Data["Ret"]  = "电表抄错了，用电量为".$DF_DU_Used."度";
        }


        OUT:
            return $Ret_Data;
    }

    public function CalcWYFPrice($StoreCode){
        $Ret_Data = array();
        $Ret = db('storelist')->where(array("StoreCode" => $StoreCode))->select();
        if (empty($Ret)) {
            $Ret_Data["Ret"] = "商铺不存在!";
            goto OUT;
        }
        $StoreArea = $Ret[0]["StoreArea"];
        $SysConf_Ret = db()->query("SELECT * FROM SysConf limit 1");
        $StartDate = date("Y-m-01",strtotime("+1 day",strtotime($Ret[0]["WYFDeadDate"])));
        $StartDate1 = $StartDate;
        $EndDate   = date("Y-m-d",strtotime("-1 day +1 month", strtotime(date("Y-m-01"))));
        $EndDate1  = date("Y-m-01",strtotime("-1 day +1 month", strtotime(date("Y-m-01"))));
        $WYFPrice  = floatval($SysConf_Ret[0]["WYFPrice"]);
        $i = 1;

        $Ret_Data["WYFStartDate"] = $StartDate;
        $Ret_Data["WYFEndDate"]   = $EndDate;
        if(strtotime($StartDate1)>strtotime($EndDate1)){
            $Ret_Data["WYFStartDate"] = $Ret[0]["WYFDeadDate"];
            $i = 0;
            $Ret_Data["WYFEndDate"]   = $Ret[0]["WYFDeadDate"];
        }else{
            while($StartDate1!=$EndDate1){
                $StartDate1 = date("Y-m-01",strtotime("+1 month",strtotime($StartDate1)));
                $i++;
            }
        }

        $Ret_Data["StoreArea"]    = floatval($StoreArea);
        $Ret_Data["WYFPrice"]     = $WYFPrice;
        $Ret_Data["WFYTotalFee"]  = $WYFPrice * $StoreArea * $i;
        $Ret_Data["Ret"] = "OK";

        OUT:
           return $Ret_Data;
    }



    public function CheckPriceHistoryOK($StoreCode, $FeeType)
    {//电费与物业费单价功能已停用。
        $Ret = db('storelist')->where(array("StoreCode" => $StoreCode))->select();
        if (empty($Ret)) {
            return "商铺不存在!";
        }
        $Ret = $Ret[0];
        $KV = array("水费" => "SFDeadDate", "电费" => "DFDeadDate", "物业费" => "WYFDeadDate");
        if (empty($KV[$FeeType])) {
            return "缴费类型错误！";
        }
        if (empty($Ret[$KV[$FeeType]])) {
            return "该商户" . $FeeType . "上次缴费时间为空，初始数据错误，请联系李光耀!";
        }

        $StartYM = date("Y-m-1", strtotime("+1 day", strtotime($Ret[$KV[$FeeType]])));
        $Year = intval(date("Y", strtotime("+1 day", strtotime($Ret[$KV[$FeeType]]))));
        $Month = intval(date("m", strtotime("+1 day", strtotime($Ret[$KV[$FeeType]]))));
        $CurMonth = date("Y-m-1");
        if(strtotime($StartYM) >= $CurMonth){
            return "";//水费已经交到这个月了
        }
        do {
            $CurMonth = date("Y-m-1", strtotime("-1 month", strtotime($CurMonth)));
            $Ret = db('pricehistory')->where(array("Type" => $FeeType, "Month" => $CurMonth))->select();
            if (empty($Ret)) {
                return "缺少" . $CurMonth . "$FeeType" . "单价数据，请补齐!";
            }
        } while ($CurMonth != $StartYM);
        return "";
    }

    public function FeeOpt()
    {
        $opType = intval(input("opType"));
        $StoreCode = input("StoreCodeHid");
        //0 开票 1 收款 2 退回 3 下载
        $Store_Ret = db("storelist")->where(array("StoreCode"=>$StoreCode))->select();
        if(empty($Store_Ret)){
            return "没有选择商铺!";
        }
        if($opType==0){
            if(empty($Store_Ret[0]["GivingSDWYF"]) || $Store_Ret[0]["SDWYFStatus"] =="退回重开"){//没有正在缴费
                $TotalFee = 0;
                $SysConf_Ret = db()->query("SELECT * FROM SysConf limit 1");

                $t_PayCode = $Store_Ret[0]["GivingSDWYF"];
                if(!empty($t_PayCode)){
                    db()->query("DELETE FROM PaymentHistory WHERE PayCode = ?",array($t_PayCode));
                }

                $PayCode = date("YmdHis").rand(100,999);

                $Ret_Data = $this->CalcSFPrice($StoreCode);
                if($Ret_Data["Ret"]!="OK"){
                    $this->assign("Warning",$Ret_Data["Ret"]);
                    goto OUT;
                }
                $SFStartDate = $Ret_Data["StartDate"];
                $SFENDDate   = $Ret_Data["EndDate"];
                $SFTotalFee  = $Ret_Data["TotalFee"];
                $TotalFee += $SFTotalFee;

                $data = array();
                $data["PayCode"] = $PayCode;
                $data["StoreCode"] = $StoreCode;
                $data["FeeStartDate"] = $SFStartDate;
                $data["FeeEndDate"] = $SFENDDate;
                $data["Type"] = "水费";
                $data["Fee"]  = $SFTotalFee;
                $data["Price"]= $SFTotalFee;
                $data["Unit"] = "分摊累加";
                $data["AddTime"] = date("Y-m-d H:i:s");
                $data["KPRName"] = session("Name");
                db("paymenthistory")->insert($data);

                $Ret_Data = $this->CalcDFPrice($StoreCode);
                if($Ret_Data["Ret"]!="OK"){
                    $this->assign("Warning",$Ret_Data["Ret"]);
                    goto OUT;
                }
                $DFStartDate = $Ret_Data["DFStartDate"];
                $DFEndDate   = $Ret_Data["DFEndDate"];
                $DFTotalFee  = $Ret_Data["DFTotalFee"];
                $StartDU     = $Ret_Data["StartDU"];
                $EndDU       = $Ret_Data["EndDU"];
                $DF_DU_Used  = $Ret_Data["DF_DU_Used"];
                $DFPrice     = $SysConf_Ret[0]["DFPrice"];
                $TotalFee    += floatval($DFPrice);

                $data = array();
                $data["PayCode"] = $PayCode;
                $data["FeeStartDate"] = $DFStartDate;
                $data["StoreCode"] = $StoreCode;
                $data["FeeEndDate"] = $DFEndDate;
                $data["Type"] = "电费";
                $data["Fee"]  = $DFTotalFee;
                $data["Price"]= $DFPrice;
                $data["Unit"] = $DF_DU_Used;
                $data["StartDU"] = $StartDU;
                $data["EndDU"] = $EndDU;
                $data["AddTime"] = date("Y-m-d H:i:s");
                $data["KPRName"] = session("Name");
                db("paymenthistory")->insert($data);

                $Ret_Data = $this->CalcWYFPrice($StoreCode);
                if($Ret_Data["Ret"]!="OK"){
                    $this->assign("Warning",$Ret_Data["Ret"]);
                    goto OUT;
                }
                $WYFStartDate = $Ret_Data["WYFStartDate"];
                $WYFEndDate   = $Ret_Data["WYFEndDate"];
                $WYFTotalFee  = $Ret_Data["WFYTotalFee"];
                $StoreArea    = $Ret_Data["StoreArea"];
                $WYFPrice     = $Ret_Data["WYFPrice"];
                $TotalFee     += floatval($WYFTotalFee);
                $TotalFeeDX   = $this->getamount($TotalFee);

                $data = array();
                $data["PayCode"] = $PayCode;
                $data["FeeStartDate"] = $WYFStartDate;
                $data["StoreCode"] = $StoreCode;
                $data["FeeEndDate"] = $WYFEndDate;
                $data["Type"] = "物业费";
                $data["Fee"]  = $WYFTotalFee;
                $data["Price"]= $WYFPrice;
                $data["Unit"] = $StoreArea;
                $data["AddTime"] = date("Y-m-d H:i:s");
                $data["KPRName"] = session("Name");
                db("paymenthistory")->insert($data);

                db()->query("UPDATE StoreList SET GivingSDWYF=?,SDWYFStatus=? WHERE StoreCode = ?",array($PayCode,'已开票',$StoreCode));
                $this->assign("Warning","开票成功!");
            }
            else{//什么也不做
                $this->assign("Warning","收据已开！");
            }
        }else if($opType==1){//收款
            if(!empty($Store_Ret[0]["GivingSDWYF"])) {
                $GiverName = input("GiverName");
                if(empty($GiverName)){
                    $this->assign("Warning","请输入交款人姓名!");
                    goto OUT;
                }
                $PayCode = $Store_Ret[0]["GivingSDWYF"];
                db()->query("UPDATE PaymentHistory SET GiverName = ?,QRRName=?,QRTime=? WHERE PayCode = ? ",array($GiverName,session("Name"),
                    date("Y-m-d H:i:s"),$PayCode));
                $DF_Ret  = db("paymenthistory")->where(array("PayCode"=>$PayCode,"Type"=>"电费"))->select();
                $SF_Ret  = db("paymenthistory")->where(array("PayCode"=>$PayCode,"Type"=>"水费"))->select();
                $WYF_Ret  = db("paymenthistory")->where(array("PayCode"=>$PayCode,"Type"=>"物业费"))->select();
                db()->query("UPDATE StoreList SET SFDeadDate=?,DFDeadDate=?,WYFDeadDate=?,DFDeadDU=?,GivingSDWYF='',SDWYFStatus = '' WHERE StoreCode = ?",array($SF_Ret[0]["FeeEndDate"],
                    $DF_Ret[0]["FeeEndDate"],$WYF_Ret[0]["FeeEndDate"],$DF_Ret[0]["EndDU"] ,$StoreCode));
                $this->assign("Warning","收款成功!");
            }
        }else if($opType==2){//退回
            if(!empty($Store_Ret[0]["GivingSDWYF"]) && $Store_Ret[0]["SDWYFStatus"] =="已开票") {//已经开票
                $PayCode = $Store_Ret[0]["GivingSDWYF"];
                db()->query("UPDATE PaymentHistory SET QRRName=?,QRTime=? WHERE PayCode = ? ",array(session("Name"),
                    date("Y-m-d H:i:s"),$PayCode));
                db()->query("UPDATE StoreList SET SDWYFStatus = ?  WHERE GivingSDWYF = ? ",array('退回重开',$PayCode));

            }
        }else if($opType==3){//下载单据
            if(empty($Store_Ret[0]["GivingSDWYF"])){
                $this->assign("Warning","票据未开!");
                goto OUT;
            }
            $PayCode  = $Store_Ret[0]["GivingSDWYF"];
            $DF_Ret  = db("paymenthistory")->where(array("PayCode"=>$PayCode,"Type"=>"电费"))->select();
            $SF_Ret  = db("paymenthistory")->where(array("PayCode"=>$PayCode,"Type"=>"水费"))->select();
            $WYF_Ret  = db("paymenthistory")->where(array("PayCode"=>$PayCode,"Type"=>"物业费"))->select();

            Loader::import('PHPExcel.PHPExcel');
            Loader::import('PHPExcel.PHPExcel.IOFactory.PHPExcel_IOFactory');
            Loader::import('PHPExcel.PHPExcel.Reader.Excel2007');
            $phpExcel = new \PHPExcel();
            $objReader = \PHPExcel_IOFactory::createReader ( 'Excel5' );
            $objPHPExcel = $objReader->load ("./SDWYFMB.xls" );
            $objActSheet = $objPHPExcel->getSheet();
            $objPHPExcel->setActiveSheetIndex(0);
            $objActSheet1_Arr  = $objPHPExcel->setActiveSheetIndex(0)->toArray();

            $objActSheet1_Arr[0][4] = "编号:".$PayCode;//单据编号

            $objActSheet1_Arr[1][1] = $Store_Ret[0]["StoreName"];//单据编号
            $objActSheet1_Arr[1][4] = $Store_Ret[0]["StoreCode"];//单据编号

            $objActSheet1_Arr[3][1] = $DF_Ret[0]["StartDU"]."/".date("Y年m月d日",strtotime($DF_Ret[0]["FeeStartDate"]));//电费开始
            $objActSheet1_Arr[3][2] = $DF_Ret[0]["EndDU"]."/".date("Y年m月d日",strtotime($DF_Ret[0]["FeeEndDate"]));//电费开始
            $objActSheet1_Arr[3][3] = $DF_Ret[0]["Price"];//电费单价
            $objActSheet1_Arr[3][4] = $DF_Ret[0]["Unit"];//用电量
            $objActSheet1_Arr[3][5] = $DF_Ret[0]["Fee"];//用电量


            $objActSheet1_Arr[5][1] = date("Y年m月d日",strtotime($WYF_Ret[0]["FeeStartDate"]));//单据编号
            $objActSheet1_Arr[5][2] = date("Y年m月d日",strtotime($WYF_Ret[0]["FeeEndDate"]));//单据编号
            $objActSheet1_Arr[5][3] = $WYF_Ret[0]["Price"];//单据编号
            $objActSheet1_Arr[5][4] = $WYF_Ret[0]["Unit"];//单据编号
            $objActSheet1_Arr[5][5] = $WYF_Ret[0]["Fee"];//单据编号

            $objActSheet1_Arr[7][1] = date("Y年m月d日",strtotime($SF_Ret[0]["FeeStartDate"]));//单据编号
            $objActSheet1_Arr[7][2] = date("Y年m月d日",strtotime($SF_Ret[0]["FeeEndDate"]));//单据编号
            $objActSheet1_Arr[7][3] = $SF_Ret[0]["Price"];//单据编号

            $objActSheet1_Arr[7][5] = $SF_Ret[0]["Fee"];//单据编号

            $TotalFee = floatval($DF_Ret[0]["Fee"]) + floatval($SF_Ret[0]["Fee"]) +floatval($WYF_Ret[0]["Fee"]);
            $objActSheet1_Arr[9][1] = $this->getamount($TotalFee);
            $objActSheet1_Arr[9][3] = $TotalFee;

            $objPHPExcel->getActiveSheet()->fromArray($objActSheet1_Arr);
            $objWriter = new \PHPExcel_Writer_Excel5($objPHPExcel);
            //$objWriter->save(str_replace('.php', '.xls', __FILE__));
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control:must-revalidate,post-check=0,pre-check=0");
            header("Content-Type:application/force-download");
            header("Content-Type:application/vnd.ms-execl");
            header("Content-Type:application/octet-stream");
            header("Content-Type:application/download");
            header("Content-Disposition:attachment;filename=水电物业费_".session("Name")."_".date("YmdHis").".xls");
            header("Content-Transfer-Encoding:binary");
            $objWriter->save("php://output");
        }

        OUT:
            return $this->index($StoreCode);
    }

    public function GiveFee()
    {
        return date("Y-m-d",strtotime ("+1 month", strtotime('2018-3-30')));
    }

}