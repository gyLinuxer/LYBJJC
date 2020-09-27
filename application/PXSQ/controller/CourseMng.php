<?php
namespace app\PXSQ\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\PXSQ\controller\CodeMachine;

class CourseMng extends controller{

    private $CM;

    public function index(){
        return view('index');
    }

    public  function GetCourseList(){
        $rows = db()->query('SELECT * FROM CourseList');
        return json_encode($rows,JSON_UNESCAPED_UNICODE);
    }

    public function AddCourse(){

        $this->CM = new CodeMachine();

        $CourseName = trim(input('CourseName'));
        $CourseBaseHourReq = input('CourseBaseHourReq');
        $CourseReTrainMonths = input('CourseReTrainMonths');

        if(empty($CourseName)|| !is_numeric($CourseBaseHourReq) ||  !is_numeric($CourseReTrainMonths)){
            return '清输入所有数据!';
        }

        $rows = db()->query('SELECT * FROM CourseList WHERE CourseName = ?',[$CourseName]);

        if(!empty($rows)){
            return '该课程已经存在!';
        }

        db()->query('INSERT INTO 
            CourseList(CourseCode,CourseName,CourseBaseHourReq,CourseReTrainMonths) 
            VALUES(?,?,?,?)',[$this->CM->GetAndIncCurCode('KC'),
            $CourseName,$CourseBaseHourReq,$CourseReTrainMonths]);

        return 'OK';
    }

    public function GetCourseInfo(){
        $CourseCode = input('CourseCode');
        $rows = db()->query('SELECT * FROM CourseList WHERE CourseCode = ?',[$CourseCode]);
        if(!empty($rows)){
            return json_encode($rows[0],JSON_UNESCAPED_UNICODE);
        }
        return '';
    }
}
