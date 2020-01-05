<?php
namespace app\index\controller;
use think\controller;
use think\Db;

class StoreAddrList extends PublicController{
    public function Index(){
        $Addrs = db()->query('SELECT * FROM StoreAddr ORDER BY AddrCode');
        if(!empty($Addrs)){
            foreach ($Addrs as $k=>$v){
                $Addrs[$k]['YCZMJ'] = db()->query('SELECT  ROUND(SUM(StoreArea),2) as TArea FROM StoreList WHERE StoreAddr = ?',[$v['AddrCode']])[0]['TArea'];
                $Addrs[$k]['CZBL'] = round($Addrs[$k]['YCZMJ']/$Addrs[$k]['Cap'],4)*100;
            }
        }
        $this->assign("StoreAddrList",$Addrs);
        return view("index");
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

    public function GetStoreAddrList(){
        return json_encode(db()->query('SELECT * FROM StoreAddr ORDER BY AddrCode'));
    }
}