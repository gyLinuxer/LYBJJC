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

        $HTQDStart = trim(input("HTQDStart"));
        $HTQDEnd = trim(input("HTQDEnd"));
        $HTJZStart = trim(input("HTJZStart"));
        $HTJZEnd = trim(input("HTJZEnd"));



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
            $SubSQL.= " AND StoreAddr = ? ";
            $ParamArr[] = $StoreAddr;
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

        if(!empty($HTQDStart)) {
            $SubSQL .= " AND ContactDate >= ? ";
            $ParamArr[] = $HTQDStart;
        }

        if(!empty($HTQDEnd)) {
            $SubSQL .= " AND ContactDate <= ? ";
            $ParamArr[] = $HTQDEnd;
        }

        if(!empty($HTJZStart)) {
            $SubSQL .= " AND ContactEndDate>= ? ";
            $ParamArr[] = $HTJZStart;
        }


        if(!empty($HTJZEnd)) {
            $SubSQL .= " AND ContactEndDate <= ? ";
            $ParamArr[] = $HTJZEnd;
        }



        $rows = db()->query("SELECT StoreList.*,DATEDIFF(StoreList.FZDeadDate,now()) as ZJLeftDays,
                      DATEDIFF(now(),StoreList.SFDeadDate) as SFLeftDays,
                      DATEDIFF(now(),StoreList.DFDeadDate) as DFLeftDays,
                      DATEDIFF(StoreList.WYFDeadDate,now()) as WYFLeftDays,
                      ROUND((ROUND(( CASE WHEN TIMESTAMPDIFF(MONTH,FZDeadDate,now())>0 THEN TIMESTAMPDIFF(MONTH,FZDeadDate,now()) ELSE 0 END ) * StoreRental ,2) + 
                      ROUND(( CASE WHEN TIMESTAMPDIFF(MONTH,WYFDeadDate,now())>0 THEN TIMESTAMPDIFF(MONTH,WYFDeadDate,now()) ELSE 0 END ) * StoreArea * ? ,2) + 
                      ROUND(( CASE WHEN TIMESTAMPDIFF(MONTH,SFDeadDate,now())>0 THEN TIMESTAMPDIFF(MONTH,SFDeadDate,now()) ELSE 0 END ) * ?  ,2) + 
                      ROUND(( CASE WHEN (DFCurrentDU - DFDeadDU)>0 THEN (DFCurrentDU - DFDeadDU) ELSE 0 END ) * ? ,2) +
                      OtherQK),2) AS TotalQK
                FROM StoreList  WHERE 1=1 ".$SubSQL,$ParamArr);

        return json_encode($rows,JSON_UNESCAPED_UNICODE);
    }

    public function showStoreList(){
        return view("StoreList");
    }

    public function getStoreList(){
        $rows = db()->query("SELECT StoreCode,StoreName FROM StoreList ORDER BY StoreCode ASC");
        return json_encode($rows,JSON_UNESCAPED_UNICODE);
    }

    public function ExpStoreList(){

            Loader::import('PHPExcel.PHPExcel');
            Loader::import('PHPExcel.PHPExcel.IOFactory.PHPExcel_IOFactory');
            Loader::import('PHPExcel.PHPExcel.Reader.Excel2007');
            $phpExcel = new \PHPExcel();
            $objReader = \PHPExcel_IOFactory::createReader ( 'Excel5' );
            $objPHPExcel = $objReader->load ("./StoreListMB.xls" );
            $objActSheet = $objPHPExcel->getSheet();

            $objActSheet1_Arr  = $objPHPExcel->setActiveSheetIndex(0)->toArray();

            $Arr1 = db()->query('SELECT id,StoreCode,StoreName,StoreAddr,StoreOwner,Tel,StoreArea,StoreRental,ContactDate,ContactEndDate,
ContactCode,FZDeadDate,WYFDeadDate,SFDeadDate,DFDeadDate,DFDeadDU,DFCurrentDU,DFCurrentDUDate,YJ,OtherQK FROM    StoreList');


            $objPHPExcel->getActiveSheet()->fromArray(array_merge($objActSheet->toArray(),empty($Arr1)?array():$Arr1));

            $objWriter = new \PHPExcel_Writer_Excel5($objPHPExcel);
            //$objWriter->save(str_replace('.php', '.xls', __FILE__));
            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control:must-revalidate,post-check=0,pre-check=0");
            header("Content-Type:application/force-download");
            header("Content-Type:application/vnd.ms-execl");
            header("Content-Type:application/octet-stream");
            header("Content-Type:application/download");
            header("Content-Disposition:attachment;filename=StoreList表_".session("Name")."_".date("YmdHis").".xls");
            header("Content-Transfer-Encoding:binary");
            $objWriter->save("php://output");


    }

}