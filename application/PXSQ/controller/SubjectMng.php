<?php
namespace app\PXSQ\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\PXSQ\controller\CodeMachine;

class SubjectMng extends controller{

    private $CM;

    public function index(){
        return view('index');
    }

    public function showClassMng(){
         return view('SubjectClassMng');
    }


    public function AddSubjectClass(){
        $SubjectClassName = input('SubjectClassName');
        if(empty($SubjectClassName)){
            return '清输入题目类别名称!';
        }

        $this->CM=new CodeMachine();

        db()->query('INSERT INTO SubjectClass(SubjectClassCode,SubjectClassName) VALUES(?,?)'
            ,[$this->CM->GetAndIncCurCode('SCC'),$SubjectClassName]);

        return 'OK';
    }

    public function GetSubjectClassList(){
        $rows = db()->query('SELECT * FROM SubjectClass');
        return json_encode($rows,JSON_UNESCAPED_UNICODE);
    }

}