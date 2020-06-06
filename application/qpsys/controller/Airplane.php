<?php
namespace app\QPSys\controller;
/**
 * Created by PhpStorm.
 * User: liguangyao
 * Date: 2020/2/20
 * Time: 15:41
 */
use think\Controller;

class Airplane extends  Controller{
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

    public function  ACSave(){
        $Warning = '';
        $ACNo = input('ACNo');
        $Status = input('Status');
        $XLLXLimited = input('XLLXLimited/a');
        $SDLimited = input('SDLimited');

        $XLLXFoundCnt = count(db('XLLX')->whereIn('XLLX',$XLLXLimited)->select());
        $StatusNotAllow = count(db()->query('SELECT * FROM StatusList WHERE Status = ?',[$Status]));

        if($StatusNotAllow ==0){
            $Warning = '状态超范围!';
            goto OUT;
        }

        if($XLLXFoundCnt != count($XLLXLimited)){
            $Warning = '限制超范围!';
            goto OUT;
        }

        $CurAC = db()->query('SELECT * FROM AirplaneList WHERE ACNo=?',[$ACNo]);
        if(empty($CurAC)){
            $Warning = '当前机号不存在!';
            goto OUT;
        }

        $data = [];
        $data['XLLXLimited'] = json_encode($XLLXLimited,JSON_UNESCAPED_UNICODE);
        $data['Status']      = $Status;
        $data['SDLimited']   = $SDLimited;

        if($CurAC[0]['Status']!=$Status){
            $data['StatusChangeTime'] = date('Y-m-d H:i:s');
        }

        $MdfCnt = db('AirplaneList')->where(['ACNo'=>$ACNo])->update($data);
        if($MdfCnt>0){
            $Warning = 'OK';
        }else{
            $Warning = '更新失败!';
        }

        OUT:
            echo $Warning;
    }

    public function showMBACQry(){
        return view('MbAcQry');
    }

    public function Tran2WArr1WArr($Arr,$KeyName){
        $data = [];
        foreach ($Arr as $k=>$v){
            $data[] = $Arr[$k][$KeyName];
        }
        return $data;
    }

    public function getACNoList(){
        $Arr = db('AirplaneList')->field('ACNo')->select();
        return json_encode($this->Tran2WArr1WArr($Arr,'ACNo'),JSON_UNESCAPED_UNICODE);
    }

    public function getStatusList(){
        $Arr = db('StatusList')->field('Status')->select();
        return json_encode($this->Tran2WArr1WArr($Arr,'Status'),JSON_UNESCAPED_UNICODE);
    }


    public function getACNoListByACType(){
        $subSql = ' ';
        $param =[];
        $ACType = input('ACType');
        if(!empty($ACType)){
            $subSql .= 'AND ACType=? ';
            $param[] = $ACType;
        }

        return json_encode($this->Tran2WArr1WArr( db()->query('SELECT ACNo FROM AirplaneList WHERE 1 = 1 '.$subSql,$param),'ACNo'),JSON_UNESCAPED_UNICODE);
    }

}