<?php
namespace app\PXSQ\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\PXSQ\controller\CodeMachine;

class gwMng extends controller{

    private  $CM ;

    public function index(){
        return view('index');
    }

    public function test(){
        return "test";
    }

    public function AddGW(){
        $this->CM = new CodeMachine();
        $GWName = trim(input('GWName'));
        $GWZZ = input('GWZZ');

        if(empty($GWName)  || empty($GWZZ)){
            return '必须输入岗位名称和岗位职责';
        }

        $rows  = db()->query('SELECT id FROM GWList WHERE GWName = ?', [$GWName]);
        if(!empty($rows)){
            return '该岗位名称已存在!';
        }

        db()->query('INSERT INTO GWList (GWCode,GWName,GWDuty) VALUES (?,?,?)',[
            $this->CM->GetCurCode('GW'),
            $GWName,
            $GWZZ
            ]);

        $this->CM->IncCurCode('GW');

        return 'OK';
    }

    public function GetGWList(){
        $rows = db()->query('SELECT * FROM GWList ORDER BY GWCode ASC ');
        return json_encode($rows,JSON_UNESCAPED_UNICODE);
    }

    public function showGetGWList(){
        return view('gwList');
    }


}