<?php
namespace app\PXSQ\controller;
use think\Controller;
use think\Db;
use think\Request;


class CodeMachine extends controller{
    public  function  GetCurCode($CodeType){
        $row = db()->query('SELECT CurCodeMax FROM CodeMachine  WHERE CodeType = ? ',[$CodeType]);
        if(empty($row)){
            return "";
        }

        $CurMaxCode = $row[0]['CurCodeMax'];

        return $CodeType.'-'.$CurMaxCode;
    }

    public function IncCurCode($CodeType){
        db()->query('UPDATE CodeMachine SET CurCodeMax = CurCodeMax + 1 WHERE CodeType = ? ',[$CodeType]);
    }

    public function GetAndIncCurCode($CodeType){

        $row = db()->query('SELECT CurCodeMax FROM CodeMachine  WHERE CodeType = ? ',[$CodeType]);
        if(empty($row)){
            return "";
        }

        $CurMaxCode = $row[0]['CurCodeMax'];

        db()->query('UPDATE CodeMachine SET CurCodeMax = CurCodeMax + 1 WHERE CodeType = ? ',[$CodeType]);

        return $CodeType.'-'.$CurMaxCode;
    }
}