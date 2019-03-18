<?php
namespace app\safetymng\controller;
use think\Controller;
use think\Db;
class CheckTBMng extends PublicController {
    private $PRE = 'lgy19891115';
    public  function index(){
        $this->assign('CheckDB',db('CheckBaseDB')->select());
        return view('index');
    }

    public function RMInputPre($Str){
        if(strpos($Str,$this->PRE)===0){
            return substr($Str,strlen($this->PRE)+1);
        }
        return $Str;
    }

    public function FirstHalfCheckRowMng($opType = 'Add'){
        dump(input());

        $data['BaseDBID']       = $this->RMInputPre(input('CheckDB'));
        $data['ProfessionName'] = $this->RMInputPre(input('ProfessionName'));
        $data['BusinessName']   = $this->RMInputPre(input('BusinessName'));
        $data['Code1']          = $this->RMInputPre(input('Code1'));
        $data['Code2']          = $this->RMInputPre(input('Code2'));
        $data['CheckSubject']   = $this->RMInputPre(input('CheckSubject'));
        $data['CheckContent']   = $this->RMInputPre(input('CheckContent'));
        $data['CheckStandard']  = $this->RMInputPre(input('CheckStandard'));
        $data['IsValid']        = 'YES';
        dump($data);
        if($opType=='Add'){
            $Ret = db('FirstHalfCheckTB')->where($data)->select();
            if(!empty($Ret)){
                echo "已经存在!";
            }else{
                echo "不存在!";
                echo db()->getLastSql();
            }
        }
    }

    public function showFirstHalfCheckRowMng($opType = 'Add'){
        $this->assign('opType','Add');
        $this->assign('CheckDB',db('CheckBaseDB')->select());
        return view('FirstHalfCheckRowMng');
    }

}