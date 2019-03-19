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

    public function FirstHalfCheckRowMng($opType = 'Add',$rowId=0){

        $data['BaseDBID']       = $this->RMInputPre(input('CheckDB'));
        $data['ProfessionName'] = $this->RMInputPre(input('ProfessionName'));
        $data['BusinessName']   = $this->RMInputPre(input('BusinessName'));
        $data['Code1']          = $this->RMInputPre(input('Code1'));
        $data['Code2']          = $this->RMInputPre(input('Code2'));
        $data['CheckSubject']   = $this->RMInputPre(input('CheckSubject'));
        $data['CheckContent']   = $this->RMInputPre(input('CheckContent'));
        $data['CheckStandard']  = $this->RMInputPre(input('CheckStandardEdit'));
        $data['AdderName']      = session('Name');
        $data['AddTime']       = date('Y-m-d H:i:s');
        $data['IsValid']        = 'YES';

        foreach ($data as $k=>$v){
            if(empty($v)){
                $this->assign($k,'不可为空!');
                goto OUT;
            }
        }

        if($opType=='Add'){
            $Ret = db('FirstHalfCheckTB')->where($data)->select();
            if(!empty($Ret)){
                $this->assign('Warning','该条款已经存在!') ;
            }else{
                $data['OldID']        = 0;
                $id = db('FirstHalfCheckTB')->insertGetId($data);
                if($id>0){
                    $this->assign('Warning','添加成功！') ;
                }else{
                    $this->assign('Warning','添加失败！!') ;
                }
            }
        }



        OUT:
            return $this->showFirstHalfCheckRowMng();
    }

    public function showFirstHalfCheckRowMng($opType = 'Add',$id=0){

        if($opType=='Mdf'){//通知前端
            $this->assign('NeedInitAllSelect','YES');
        }else{
            $this->assign('NeedInitAllSelect','NO');
        }

        $this->assign('id',$id);
        $this->assign('opType','Add');
        $this->assign('CheckDB',db('CheckBaseDB')->select());
        return view('FirstHalfCheckRowMng');
    }

}