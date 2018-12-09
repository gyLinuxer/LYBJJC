<?php
/**
 * Created by PhpStorm.
 * User: liguangyao
 * Date: 2018/12/3
 * Time: 22:14
 */
namespace app\index\controller;
use think\controller;
use think\Db;
class StoreList extends PublicController{
    public function index()
    {
        $this->assign("StoreAddrList",db('storeaddr')->order("addrcode ASC")->select());
        return view("index");
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
        $ContactFile = request()->file("ContactFile");
        //dump($StoreArea);
        if(empty($StoreCode) || empty($NextGiveDate) || empty($StoreName)
            || empty($StoreAddr) || empty($StoreOwner) || empty($Tel)
            || empty($StoreRental) ){
            goto OUT;
        }
        /*if(!is_null($ContactFile)){
            $File = $ContactFile->move("/upload");
            $data["ContactFileName"] = $File->getSaveName();
        }*/

        $where["StoreCode"] = $StoreCode;
        $Ret = Db("storelist")->where($where)->select();
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
        if(db("storelist")->insert($data)>0){
            $this->assign("Warning","店铺添加成功！!");
        }
        //dump(\db()->getLastSql());
        OUT:
            return $this->index();
    }
}