<?php
/**
 * Created by PhpStorm.
 * User: liguangyao
 * Date: 2018/12/5
 * Time: 16:37
 */
namespace app\index\controller;

class SDPrice extends PublicController{
    public function index()
    {
        $this->assign("SFPriceList",db()->query("SELECT * FROM PriceHistory WHERE Type = '水费' ORDER BY Month DESC "));
        $this->assign("DFPriceList",db()->query("SELECT * FROM PriceHistory WHERE Type = '电费' ORDER BY Month DESC "));
        $this->assign("WYPriceList",db()->query("SELECT * FROM PriceHistory WHERE Type = '物业费' ORDER BY Month DESC "));
        return view('index');
    }
    public function AddPrice(){
        $Type = input("Type");
        if($Type!='水费' && $Type !='电费' && $Type !='物业费'){
            $this->assign("Warning","没有选择单价类型!");
            goto OUT;
        }else if($Type=='水费'){
            $Price = input("SFPrice");
            $Month = input("SFMonth");
        }else if($Type=='电费'){
            $Price = input("DFPrice");
            $Month = input("DFMonth");
        }else if($Type=='物业费'){
            $Price = input("WYPrice");
            $Month = input("WYMonth");
        }

        $Ret = db("PriceHistory")->where(array("Month"=>$Month,"Type"=>$Type))->select();
        if(!empty($Ret)){
            $this->assign("Warning","该月份的单价已经存在!");
            goto OUT;
        }

        $data["Type"]= $Type;
        $data["Price"]= $Price;
        $data["Month"]= $Month."-1";
        $data["AddTime"]= date("Y-m-d H:i:s");
        db("PriceHistory")->insert($data);

        OUT:
            return $this->index();
    }
}