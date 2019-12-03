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
        //dump(input());
        $StoreName = trim(input("StoreName"));
        $StoreCode = trim(input("StoreCode"));
        $StoreAddr = trim(input("StoreAddr"));
        $StoreOwner = trim(input("StoreOwner"));
        $Tel = trim(input("Tel"));
        $StoreArea = input("StoreArea");
        $StoreRental = input("StoreRental");
        $NextGiveDate = input("NextGiveDate");
        $ContractDate = input("ContactDate");
        $ContractCode = input("ContactCode");
        $YJ = input("YJ");
        $file = request()->file("ContactFile");
        $StartDu= floatval(input("StartDu"));

        if(empty($StoreCode) || empty($NextGiveDate) || empty($StoreName)
            || empty($StoreAddr) || empty($StoreOwner) || empty($Tel)
            || empty($StoreRental) || empty($ContractDate) ){
            $this->assign("Warning","请将项目填写完整!");
            goto OUT;
        }

        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'upload');
            if($info){
                $data["ContactFileName"] = $info->getSaveName();
            }else{
                $this->assign("Warning","上传文件错误:".$file->getError());
                goto OUT;
            }
        }

        $where["StoreCode"] = $StoreCode;
        $Ret = Db("StoreList")->where($where)->select();
        if(!empty($Ret)){
            $this->assign("Warning","该商铺编码已经存在!");
            goto OUT;
        }

        $data["StoreCode"] = $StoreCode;
        $data["StoreName"] = $StoreName;
        $data["StoreAddr"] = $StoreAddr;
        $data["StoreOwner"] = $StoreOwner;
        $data["Tel"] = $Tel;
        $data["StoreRental"] = $StoreRental;
        $data["NextGiveDate"] = $NextGiveDate;
        $data["StoreArea"] = $StoreArea;
        $data["ContactDate"] = $ContractDate;
        $data["ContactCode"] = $ContractCode;
        $data["DFDeadDU"]   = $StartDu;
        $data["DFDeadDate"] = date("Y-m-d");
        $data["SFDeadDate"] = $this->GetTheLastDay();
        $data["WYFDeadDate"]= $this->GetTheLastDay();
        $data["YJ"]= $YJ;
        if(db("StoreList")->insert($data)>0){
            $this->assign("Warning","店铺添加成功！!");
        }
        OUT:
            return $this->index();
    }

    public function showMdfStore($rowId=NULL){
        $Ret = db('StoreList')->where(array('id'=>$rowId))->find();
        if(empty($Ret)){
            return '这个商户号好像不存在啊！';
        }

        $this->assign('Store',$Ret);

        $this->assign("StoreAddrList",db('StoreAddr')->order("addrcode ASC")->select());

        return view("StoreMdf");
    }

    public function MdfStore(){
        $StoreName = trim(input("StoreName"));
        $StoreCode = trim(input("StoreCode"));
        $StoreAddr = trim(input("StoreAddr"));
        $StoreOwner = trim(input("StoreOwner"));
        $Tel = trim(input("Tel"));
        $StoreArea = input("StoreArea");
        $StoreRental = input("StoreRental");
        $NextGiveDate = input("NextGiveDate");
        $ContractDate = input("ContactDate");
        $ContractCode = input("ContactCode");
        $file = request()->file("ContactFile");
        $StartDu= floatval(input("StartDu"));
        $YJ= floatval(input("YJ"));

        if(empty($StoreCode) || empty($NextGiveDate) || empty($StoreName)
            || empty($StoreAddr) || empty($StoreOwner) || empty($Tel)
            || empty($StoreRental) || empty($ContractDate) ){
            $this->assign("Warning","请将项目填写完整!");
            goto OUT;
        }

        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'upload');
            if($info){
                $data["ContactFileName"] = $info->getSaveName();
            }else{
                $this->assign("Warning","上传文件错误:".$file->getError());
                goto OUT;
            }
        }

        $where["StoreCode"] = $StoreCode;
        $Ret = Db("StoreList")->where($where)->find();
        if(empty($Ret)){
            $this->assign("Warning","该商铺不存在!!");
            goto OUT;
        }

        //$data["StoreCode"] = $StoreCode;
        $data["StoreName"] = $StoreName;
        $data["StoreAddr"] = $StoreAddr;
        $data["StoreOwner"] = $StoreOwner;
        $data["Tel"] = $Tel;
        $data["StoreRental"] = $StoreRental;
        $data["NextGiveDate"] = $NextGiveDate;
        $data["StoreArea"] = $StoreArea;
        $data["ContactDate"] = $ContractDate;
        $data["ContactCode"] = $ContractCode;
        $data["DFDeadDU"]   = $StartDu;
        $data["DFDeadDate"] = date("Y-m-d");
        $data["SFDeadDate"] = $this->GetTheLastDay();
        $data["WYFDeadDate"]= $this->GetTheLastDay();
        $data["YJ"]= $YJ;
        if(db("StoreList")->where(array('StoreCode'=>$StoreCode))->update($data)>0){
            $this->assign("Warning","店铺信息修改成功！!");
        }
        OUT:
        return $this->showMdfStore($Ret['id']);
    }

    function GetStoreInfo(){
        $StoreCode  = trim(input("StoreCode"));
        if(empty($StoreCode)){
            return "";
        }
        $row = db()->query("SELECT * FROM StoreList WHERE StoreCode = ?",[$StoreCode]);
        return json_encode($row[0],JSON_UNESCAPED_UNICODE);
    }

    function GetStoreQKInfo(){

        $StoreCode = trim(input('StoreCode'));
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
                       ROUND(( CASE WHEN DFDU>0 THEN DFDU ELSE 0 END ) * ? ,2)AS DFQK,
                       OtherQK,StoreCode,YJ
         FROM   (  SELECT  TIMESTAMPDIFF(MONTH,FZDeadDate,now()) AS FZMonth,
                    TIMESTAMPDIFF(MONTH,WYFDeadDate,now()) AS WYFMonth,
                    TIMESTAMPDIFF(MONTH,SFDeadDate,now()) AS SFMonth,
                    (DFCurrentDU - DFDeadDU) DFDU,OtherQK,StoreCode,YJ
         FROM StoreList WHERE StoreCode = ? ) xTable' ;

         $SQLParam = [$StoreRental,$WFYUnit * $StoreArea,$SFUnit,$DFUnit,$StoreCode];

         $row = db()->query($SQL,$SQLParam)[0];

         return json_encode($row,JSON_UNESCAPED_UNICODE);
    }



}