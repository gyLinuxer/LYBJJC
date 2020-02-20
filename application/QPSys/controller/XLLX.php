<?php
namespace app\QPSys\controller;

class XLLX {
    public function index(){
        return view('XLLX');
    }
    public function getXLLXList(){
        return json_encode(db()->query('SELECT * FROM XLLX'),JSON_UNESCAPED_UNICODE);
    }
}