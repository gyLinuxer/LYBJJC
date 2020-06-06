<?php
namespace app\QPSys\controller;

class XLLX {
    public function index(){
        return view('XLLX');
    }
    public function getXLLXList(){
        return json_encode(db()->query('SELECT * FROM XLLX'),JSON_UNESCAPED_UNICODE);
    }
    public function DelOtherQKById($id){
        db('XLLX')->query('DELETE FROM XLLX WHERE id=?',[$id]);
    }
    public function getXLLXNameList(){
        $Ret = db()->query('SELECT XLLX FROM XLLX');
        return json_encode($this->Tran2WArr1WArr($Ret,'XLLX'),JSON_UNESCAPED_UNICODE);
    }

    public function Tran2WArr1WArr($Arr,$KeyName){
        $data = [];
        foreach ($Arr as $k=>$v){
            $data[] = $Arr[$k][$KeyName];
        }
        return $data;
    }
}