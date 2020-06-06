<?php
namespace app\QPSys\controller;

class XQXX {
    function index(){
        return view('index');
    }

    function SaveXQ(){
        /*
         *  CurBaseAddr:'',
                CurSD:'',
                CurXQRQ:'',
                CurXLLX:'',
                CurTSXQ:'',
                CurACType:'',*/
        $BaseAddr = input('CurBaseAddr');
        $CurXQRQ = input('CurXQRQ');
        $CurSD = input('CurSD');
        $CurXLLX = input('CurXLLX');
        $CurTSXQ = input('CurTSXQ');
        $CurACType = input('CurACType');
        $CurACNum = intval(input('CurACNum'));

        $Warning = '';

        if(empty($BaseAddr)) {
            $Warning = '基地不能为空!';
            goto OUT;
        }

        if(empty($CurSD)) {
            $Warning = '训练时段不能为空!';
            goto OUT;
        }

        if(empty($CurXLLX)) {
            $Warning = '训练类型不能为空!';
            goto OUT;
        }

        if(empty($CurXQRQ)){
            $Warning = '需求日期不能为空';
            goto OUT;
        }else{
            if($CurXQRQ=='今天'){
                $CurXQRQ = date('Y-m-d');
            }else{
                $CurXQRQ = date("Y-m-d",strtotime("+1 day"));
            }
        }

        if(empty($CurACType)) {
            $Warning = '机型不能为空!';
            goto OUT;
        }

        if($CurACNum <=0){
            $Warning = '架数必须大于0!';
            goto OUT;
        }

        $data['Base'] = $BaseAddr;
        $data['XQRQ'] = $CurXQRQ;
        $data['ACType'] =  $CurACType;
        $data['ACNum'] =  $CurACNum;
        $data['SD'] =  $CurSD;
        $data['XLLX'] =  $CurXLLX;
        $data['TSXQ'] =  $CurTSXQ;
        $data['Status'] ='已提交';
        $data['CreateTime'] = date('Y-m-d H:i:s');
        $data['CreatorID'] = session('UserID');
        $data['ACNoApproved'] = 0;

        $Ret = db('XQXX')->insert($data);

        if($Ret>0){
            $Warning = 'OK';
        }else{
            $Warning = '保存失败!';
        }

        OUT:

        return $Warning;
    }

    function GetMyXQXX(){
       $Ret =  db('XQXX')->where(['CreatorID'=>session('UserID')])->select();
       return json_encode($Ret,JSON_UNESCAPED_UNICODE);
    }
}
