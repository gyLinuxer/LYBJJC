<?php
namespace app\index\controller;
use think\controller;
use think\Db;

class StoreAddrList extends PublicController{
    public function Index(){
        //$this->assign("Airlines",NULL);
        //$this->assign("name","Fuck");
        $this->assign("StoreAddrList",db('StoreAddr')->select());
        return view("index");
    }
    public function hello()
    {

    }
    public function AddAddr()
    {
        $AddrCode = trim(input("AddrCode"));
        $AddrInfo = trim(input("AddrInfo"));
        $Cap = intval(input("Cap"));
        if(empty($AddrCode) || empty($AddrInfo) || $Cap <=0){
            goto OUT;
        }
        $data["AddrCode"] = $AddrCode;
        $data["AddrInfo"] = $AddrInfo;
        $data["Cap"] = $Cap;
        db("StoreAddr")->insert($data);
      //  $this->assign("")
        OUT:
        return $this->Index();
    }
}