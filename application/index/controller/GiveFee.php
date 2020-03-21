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

    public function showGiveFee(){
        return view('GiveWYFZFee');
    }

    public function index($StoreCode = '')
    {

        if (empty($StoreCode)) {
            return "商铺号为空!";
        }

        $Ret = db('StoreList')->where(array("StoreCode" => $StoreCode))->select();
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
        $Ret = db('StoreList')->where(array("StoreCode" => $StoreCode))->select();
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
        $Ret = db('StoreList')->where(array("StoreCode" => $StoreCode))->select();
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
        $Ret = db('StoreList')->where(array("StoreCode" => $StoreCode))->select();
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
        $Ret = db('StoreList')->where(array("StoreCode" => $StoreCode))->select();
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
        if(strtotime($StartYM) >strtotime($CurMonth)){
            return "";//水费已经交到这个月了
        }
        do {
            $Ret = db('PriceHistory')->where(array("Type" => $FeeType, "Month" => $CurMonth))->select();
            if (empty($Ret)) {
                return "缺少" . date("Y-m",strtotime($CurMonth)) . "$FeeType" . "单价数据，请补齐!";
            }
            $CurMonth = date("Y-m-1", strtotime("-1 month ", strtotime($CurMonth)));
        } while ($CurMonth != $StartYM);
        return "";
    }

    public function FeeOpt()
    {
        $opType = intval(input("opType"));
        $StoreCode = input("StoreCodeHid");
        //0 开票 1 收款 2 退回 3 下载
        $Store_Ret = db("StoreList")->where(array("StoreCode"=>$StoreCode))->select();
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
                var_dump($Ret_Data);
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
                db("PaymentHistory")->insert($data);

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
                db("PaymentHistory")->insert($data);

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
                db("PaymentHistory")->insert($data);

                db()->query("UPDATE StoreList SET GivingSDWYF=?,SDWYFStatus=? WHERE StoreCode = ?",array($PayCode,'已开票',$StoreCode));
                //$this->assign("Warning","开票成功!");
            }
            else{//什么也不做
                //$this->assign("Warning","收据已开！");
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
                $DF_Ret  = db("PaymentHistory")->where(array("PayCode"=>$PayCode,"Type"=>"电费"))->select();
                $SF_Ret  = db("PaymentHistory")->where(array("PayCode"=>$PayCode,"Type"=>"水费"))->select();
                $WYF_Ret  = db("PaymentHistory")->where(array("PayCode"=>$PayCode,"Type"=>"物业费"))->select();
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
            $DF_Ret  = db("PaymentHistory")->where(array("PayCode"=>$PayCode,"Type"=>"电费"))->select();
            $SF_Ret  = db("PaymentHistory")->where(array("PayCode"=>$PayCode,"Type"=>"水费"))->select();
            $WYF_Ret  = db("PaymentHistory")->where(array("PayCode"=>$PayCode,"Type"=>"物业费"))->select();

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

    public function showGiveWYZJFee(){
        return view('GiveWYZJFee');
    }

    public function GetStoreWYFOrZJNextGiveStartMonth(){
        $StoreCode = trim(input('StoreCode'));
        $Type = intval(trim(input('Type')));//0:租金 1:物业费
        if(empty($StoreCode)){
            return '';
        }

        $row = db()->query("SELECT * FROM StoreList WHERE StoreCode = ?",[$StoreCode]);
        if(empty($row)){
            return '';
        }

        if($Type==0) {
            $EndDate = $row[0]['FZDeadDate'];
        }else{
            $EndDate = $row[0]['WYFDeadDate'];
        }

        return date('Y-m-d', strtotime("$EndDate +1 day"));
    }

    public function GiveWYZJFee(){

        $FeeType_Arr = ['物业费','房租'];

        $StoreCode = trim(input("StoreCode"));
        $FeeType = trim(input("FeeType"));
        $FeeStartDate = trim(input("StartFeeDate"));
        $FeeEndDate = trim(input("EndFeeDate"));
        $Fee = trim(input("Fee"));
        $Memo  = trim(input("Memo"));
        $FeeGiver = trim(input("FeeGiver"));


        if(empty($StoreCode)){
            return "未选择商户";
        }

        if(empty($FeeType)){
            return "未选择费用类别";
        }

        if(!in_array($FeeType,$FeeType_Arr)){
            return "只能选择物业费或者租金!";
        }

        if(empty($FeeStartDate)){
            return "未选择费用起始日期";
        }

        if(empty($FeeEndDate)){
            return "未选择费用结束日期";
        }

        if(intval($Fee)<=0){
            return "费用需大于0";
        }

        if(empty($FeeGiver)){
            return "缴费人不可为空!";
        }

        $row = db()->query("SELECT * FROM StoreList WHERE StoreCode = ?",[$StoreCode]);
        if(empty($row)){
            return '商户不存在!';
        }

        if($FeeType=='房租') {
            $FeeLastDate = $row[0]['FZDeadDate'];
        }else {
            $FeeLastDate = $row[0]['WYFDeadDate'];
        }

        $NextStartDate= date('Y-m-d', strtotime("$FeeLastDate +1 day"));

        if($NextStartDate!=$FeeStartDate){
             return '费用起始月必须为'.$NextStartDate;
        }

        //费用区间重复检测
        $rows = db()->query("SELECT * FROM PaymentHistory WHERE
              StoreCode = ? AND 
              Type=? AND (
              (FeeStartDate<=? AND FeeEndDate >=?) OR 
              (FeeStartDate<=? AND FeeEndDate >=?) OR 
              (FeeStartDate>=? AND FeeEndDate <=?) )
             ",[$StoreCode,$FeeType,$FeeStartDate,$FeeStartDate,$FeeEndDate,$FeeEndDate,$FeeStartDate,$FeeEndDate]);
        if(!empty($rows)){
            return "现有缴费区间".$rows[0]["FeeStartDate"]."至".$rows[0]["FeeEndDate"]."与本区间重复!";
        }

        $data["StoreCode"] = $StoreCode;
        $data["Type"] = $FeeType;
        $data["FeeStartDate"] = $FeeStartDate;
        $data["FeeEndDate"] = $FeeEndDate;
        $data["Fee"] = $Fee;
        $data["AddTime"] = date("Y-m-d H:i:s");
        $data["GiverName"] = $FeeGiver;
        $data["QRRName"] = session("Name");
        $data["QRTime"] = date("Y-m-d H:i:s");
        $data["Memo"] = $Memo;

        db('PaymentHistory')->insert($data);

        if($FeeType=='物业费'){
            db()->query("UPDATE StoreList SET WYFDeadDate=? WHERE StoreCode = ?",[$FeeEndDate,$StoreCode]);
        }else if($FeeType=='房租'){
            db()->query("UPDATE StoreList SET FZDeadDate=? WHERE StoreCode = ?",[$FeeEndDate,$StoreCode]);
        }

        return "写入缴费记录成功!";
    }

    function GetStoreFeeList(){
        $StoreCode = trim(input("StoreCode"));
        $FeeType = trim(input("FeeType"));
        if(empty($StoreCode) || empty($FeeType)){
            return "";
        }
        $rows = db()->query("SELECT * FROM PaymentHistory WHERE StoreCode = ? AND Type=? ORDER BY FeeStartDate ASC",[$StoreCode,$FeeType]);
        return json_encode($rows,JSON_UNESCAPED_UNICODE);
    }

    function showQFInput(){
        return view('QFInput');
    }

    function QFInput(){

        $StoreCode = trim(input("StoreCode"));
        $QFDate = trim(input("QFDate"));
        $QFSubject = trim(input("QFSubject"));
        $Fee = trim(input("Fee"));
        $Memo = trim(input("Memo"));

        if(empty($StoreCode)){
            return "店铺号不能为空!";
        }

        if(empty($QFDate)){
            return "欠费日期不能为空!";
        }

        if(empty($QFSubject)){
            return "欠费明目不能为空!";
        }

        if(intval($Fee)<=0){
            return "欠费金额不能小于等于0!";
        }

        $data["StoreCode"] = $StoreCode;
        $data["QFDate"] = $QFDate;
        $data["QFSubject"] = $QFSubject;
        $data["Fee"] = $Fee;
        $data["QRRName"] = session("Name");
        $data["QRTime"] = date("Y-m-d H:i:s");
        $data["Memo"] = $Memo;
        if(db("OtherQFLog")->insert($data)>0){
            $this->updateStoreOtherQK($StoreCode);
            return "输入成功!";
        }else{
            return "输入失败!";
        }

    }

    function updateStoreOtherQK($StoreCode){
        $row  = db()->query("SELECT Sum(Fee) as TotalFee FROM OtherQFLog WHERE StoreCode = ?",[$StoreCode]);
        if(empty($row)){
            return ;
        }
        db()->query("UPDATE StoreList SET OtherQK=? WHERE StoreCode = ?",[$row[0]['TotalFee'],$StoreCode]);
    }

    function GetQFList($StoreCode){
        if(empty($StoreCode))
            return "";
        $rows = db()->query("SELECT * FROM OtherQFLog WHERE StoreCode = ? ORDER BY QFDate DESC ",[$StoreCode]);
        return json_encode($rows);
    }

    function DelOtherQKById(){
        $id = trim(input('id'));
        $row = db()->query("SELECT StoreCode  FROM OtherQFLog WHERE id=?",[$id]);
        if(empty($row)){
            return '';
        }
        db()->query("DELETE FROM OtherQFLog WHERE id = ? ",[$id]);
        $this->updateStoreOtherQK($row[0]['StoreCode']);
    }

    function showGiveSDF(){
        return view('GiveSDF');
    }

    function GetStoreSDJFInfoJSON(){


        return json_encode($this->GetStoreSDJFInfo());

    }

    function GetStoreSDJFInfo(){
        $StoreCode = trim(input('StoreCode'));

        $ConfRow = db()->query("SELECT * FROM SysConf WHERE id = 1")[0];
        $SQL = 'SELECT SFMonth,DFDeadDate,DFCurrentDUDate,SFDeadDate,DFDU,StoreName,DFDeadDU,DFCurrentDU,
                       ROUND(( CASE WHEN SFMonth>0 THEN SFMonth ELSE 0 END ) * ?  ,2)AS SFQK,
                       ROUND(( CASE WHEN DFDU>0 THEN DFDU ELSE 0 END ) * ? ,2)AS DFQK,
                       StoreCode
         FROM   (  SELECT TIMESTAMPDIFF(MONTH,SFDeadDate,now()) AS SFMonth,
                    (DFCurrentDU - DFDeadDU) DFDU,StoreCode,StoreName,DFDeadDate,DFCurrentDUDate,SFDeadDate,DFDeadDU,DFCurrentDU
         FROM StoreList WHERE StoreCode = ? ) xTable' ;

        $row = db()->query($SQL,[$ConfRow['SFPrice'],$ConfRow['DFPrice'],$StoreCode]);

        if(empty($row)){
            return "";
        }

        $row = $row[0];

        $data = [
            ['StoreCode'=>$row['StoreCode'],'StoreName'=>$row['StoreName'],'Type'=>'水费',"Start"=>$row['SFDeadDate'],'End'=>date("Y-m-d"),'Unit'=>$row['SFMonth'],'Price'=>$ConfRow['SFPrice'],'Fee'=>$row['SFQK']],
            ['StoreCode'=>$row['StoreCode'],'StoreName'=>$row['StoreName'],'Type'=>'电费',"Start"=>$row['DFDeadDU'].'度/'.$row['DFDeadDate'],'End'=>$row['DFCurrentDU'].'度/'.date("Y-m-d"),
                'Unit'=>$row['DFDU'],'Price'=>$ConfRow['DFPrice'],'Fee'=>$row['DFQK'],'DFDeadDU'=>$row['DFDeadDU'],'DFCurrentDU'=>$row['DFCurrentDU']],
        ];

        return $data;
    }

    function DownSDReport(){

        $SDData = $this->GetStoreSDJFInfo();
        if(empty($SDData)){
            return '';
        }

        Loader::import('PHPExcel.PHPExcel');
        Loader::import('PHPExcel.PHPExcel.IOFactory.PHPExcel_IOFactory');
        Loader::import('PHPExcel.PHPExcel.Reader.Excel2007');
        $phpExcel = new \PHPExcel();
        $objReader = \PHPExcel_IOFactory::createReader ( 'Excel5' );
        $objPHPExcel = $objReader->load ("./SDMB.xls" );
        $objActSheet = $objPHPExcel->getSheet();
        $objPHPExcel->setActiveSheetIndex(0);
        $objActSheet1_Arr  = $objPHPExcel->setActiveSheetIndex(0)->toArray();

        $objActSheet1_Arr[0][4] = "打印时间:".date("Y-m-d H:i:s");//单据编号

        $objActSheet1_Arr[1][1] = $SDData[0]["StoreName"];
        $objActSheet1_Arr[1][4] = $SDData[0]["StoreCode"];

        $objActSheet1_Arr[3][1] = $SDData[0]["Start"];
        $objActSheet1_Arr[3][2] = $SDData[0]["End"];
        $objActSheet1_Arr[3][3] = $SDData[0]["Price"];
        $objActSheet1_Arr[3][4] = $SDData[0]["Unit"];
        $objActSheet1_Arr[3][5] = $SDData[0]["Fee"];

        $objActSheet1_Arr[5][1] = $SDData[1]["Start"];
        $objActSheet1_Arr[5][2] = $SDData[1]["End"];
        $objActSheet1_Arr[5][3] = $SDData[1]["Price"];
        $objActSheet1_Arr[5][4] = $SDData[1]["Unit"];
        $objActSheet1_Arr[5][5] = $SDData[1]["Fee"];

        $objActSheet1_Arr[7][3] = $SDData[1]["Fee"]+$SDData[0]["Fee"];
        $objActSheet1_Arr[7][1] = $this->getamount($SDData[1]["Fee"]+$SDData[0]["Fee"]);

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
        header("Content-Disposition:attachment;filename=水电费_".session("Name")."_".date("YmdHis").".xls");
        header("Content-Transfer-Encoding:binary");
        $objWriter->save("php://output");
    }


    function DownWFYOrFZReport(){

        $StoreCode = input('StoreCode');
        $StoreName = input('StoreName');
        $FeeType   = input('FeeType');
        $Start     = input('Start');
        $End       = input('End');
        $UnitPrice = input('UnitPrice');
        $Num       = input('Num');
        $Fee       = input('Fee');
        $DX        = $this->getamount($Fee);

        Loader::import('PHPExcel.PHPExcel');
        Loader::import('PHPExcel.PHPExcel.IOFactory.PHPExcel_IOFactory');
        Loader::import('PHPExcel.PHPExcel.Reader.Excel2007');
        $phpExcel = new \PHPExcel();
        $objReader = \PHPExcel_IOFactory::createReader ( 'Excel5' );
        $objPHPExcel = $objReader->load ("./FZMB.xls" );
        $objActSheet = $objPHPExcel->getSheet();
        $objPHPExcel->setActiveSheetIndex(0);
        $objActSheet1_Arr  = $objPHPExcel->setActiveSheetIndex(0)->toArray();

        $objActSheet1_Arr[0][4] = "开票:".session('Name').'  '.date("Y-m-d H:i:s");//单据编号

        $objActSheet1_Arr[1][1] = $StoreName;
        $objActSheet1_Arr[1][4] = $StoreCode;

        $objActSheet1_Arr[2][0] = $FeeType;

        $objActSheet1_Arr[3][1] = $Start;
        $objActSheet1_Arr[3][2] = $End;
        $objActSheet1_Arr[3][3] = $UnitPrice;
        $objActSheet1_Arr[3][4] = $Num;
        $objActSheet1_Arr[3][5] = $Fee;

        $objActSheet1_Arr[5][3] = $Fee;
        $objActSheet1_Arr[5][1] = $DX;

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
        header("Content-Disposition:attachment;filename=".$FeeType."_".session("Name")."_".date("YmdHis").".xls");
        header("Content-Transfer-Encoding:binary");
        $objWriter->save("php://output");
    }


    function  GiveSDFee(){
        $SDFee_Arr = $this->GetStoreSDJFInfo();
        if(empty($SDFee_Arr)){
            return '未能获取该商户的水电信息!';
        }


        $SDJFR = input('SDJFR');
        if(empty($SDJFR)){
            return '请输入水电缴费人!';
        }

        /*
         *  $data = [
            ['StoreCode'=>$row['StoreCode'],'StoreName'=>$row['StoreName'],
        'Type'=>'水费',"Start"=>$row['SFDeadDate'],'End'=>date("Y-m-d"),
        'Unit'=>$row['SFMonth'],'Price'=>$ConfRow['SFPrice'],'Fee'=>$row['SFQK']],
            ['StoreCode'=>$row['StoreCode'],'StoreName'=>$row['StoreName'],'Type'=>'电费',"Start"=>$row['DFDeadDU'].'度/'.$row['DFDeadDate'],'End'=>$row['DFCurrentDU'].'度/'.date("Y-m-d"),'Unit'=>$row['DFDU'],'Price'=>$ConfRow['DFPrice'],'Fee'=>$row['DFQK']],
        ];
         * */



        $bInsert = false;
        for($i=0;$i<count($SDFee_Arr);$i++){
            if($SDFee_Arr[$i]['Fee']>0){
                $bInsert = true;
                if(db('PaymentHistory')->insert(
                  [
                      'StoreCode'=>$SDFee_Arr[$i]['StoreCode'],
                      'Type'=>$SDFee_Arr[$i]['Type'],
                      'Fee'=>$SDFee_Arr[$i]['Fee'],
                      'FeeStartDate'=>$SDFee_Arr[$i]['Type']=='电费'?explode('/',$SDFee_Arr[$i]['Start'])[1]:$SDFee_Arr[$i]['Start'],
                      'FeeEndDate'=>$SDFee_Arr[$i]['Type']=='电费'?explode('/',$SDFee_Arr[$i]['End'])[1]:$SDFee_Arr[$i]['End'],
                      'StartDU'=>empty($SDFee_Arr[$i]['DFDeadDU'])?'':$SDFee_Arr[$i]['DFDeadDU'],
                      'EndDU'=>empty($SDFee_Arr[$i]['DFCurrentDU'])?'':$SDFee_Arr[$i]['DFCurrentDU'],
                      'Unit'=>$SDFee_Arr[$i]['Unit'],
                      'Price'=>$SDFee_Arr[$i]['Price'],
                      'AddTime'=>date('Y-m-d H:i:s'),
                      'GiverName'=>$SDJFR,
                      'QRRName'=>session('Name'),
                      'QRTime'=>date('Y-m-d H:i:s'),
                  ]
                )>0){
                    if($SDFee_Arr[$i]['Type']=='电费'){
                        db()->query('UPDATE StoreList SET DFDeadDate = ?,DFDeadDU=?',[
                            explode('/',$SDFee_Arr[$i]['End'])[1],
                            $SDFee_Arr[$i]['DFCurrentDU']
                        ]);
                    }else if($SDFee_Arr[$i]['Type']=='水费'){
                        db()->query('UPDATE StoreList SET SFDeadDate = ?',[
                            $SDFee_Arr[$i]['End']
                        ]);
                    }
                }
            }
        }

        if($bInsert){
            return 'OK';
        }else{
            return '暂时无需缴纳水电费!';
        }

    }


    function GetStoreSDFHistory(){
        $StoreCode = trim(input('StoreCode'));
        if(empty($StoreCode)){
            return '店铺号不能为空!';
        }

        $rows = db()->query("SELECT * FROM PaymentHistory WHERE Type in ('电费','水费') 
                  AND StoreCode = ? ORDER BY QRTime DESC",[$StoreCode]);
        return json_encode($rows,JSON_UNESCAPED_UNICODE);
    }


}