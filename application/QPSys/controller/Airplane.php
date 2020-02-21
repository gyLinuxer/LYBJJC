<?php
namespace app\QPSys\controller;
/**
 * Created by PhpStorm.
 * User: liguangyao
 * Date: 2020/2/20
 * Time: 15:41
 */

class Airplane {
    public function  index(){

        return view('index');
    }

    public function GetACList(){
        return json_encode(db('AirplaneList')->select(),JSON_UNESCAPED_UNICODE);
    }

    public  function GetACStatusList(){
        return json_encode(db('StatusList')->select(),JSON_UNESCAPED_UNICODE);
    }

    public  function GetACTypeList(){
        return json_encode(db()->query('SELECT Distinct ACType FROM AirplaneList'),JSON_UNESCAPED_UNICODE);
    }

    public function ACQry(){
        $subSql = ' ';
        $param =[];
        $ACType = input('ACType');
        $ACNo   = input('ACNo');
        $Status = input('Status');

        if(!empty($ACType)){
            $subSql .= 'AND ACType=? ';
            $param[] = $ACType;
        }

        if(!empty($ACNo)){
            $subSql .= 'AND ACNo=? ';
            $param[] = $ACNo;
        }

        if(!empty($Status)){
            $subSql .= 'AND Status=? ';
            $param[] = $Status;
        }

        return json_encode(db()->query('SELECT * FROM AirplaneList WHERE 1 = 1 '.$subSql,$param),JSON_UNESCAPED_UNICODE);

    }

}