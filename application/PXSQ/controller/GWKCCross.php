<?php
namespace app\PXSQ\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\PXSQ\controller\CodeMachine;

class GWKCCross extends controller{

    public function index(){
        return view('GWKCIndex');
    }

    public function GetGWunTrainedCourseList(){//获取岗位尚未挂钩课程
        $GWCode = input('GWCode');
        if(empty($GWCode)){
            return '';
        }
        $rows =  db()->query('SELECT * FROM CourseList WHERE CourseCode 
            NOT IN (SELECT CourseCode FROM GW_Cross_Course WHERE GWCode = ?)',[$GWCode]);
        return json_encode($rows,JSON_UNESCAPED_UNICODE);
    }

    public function GetGW_KC_Cross_List(){
        $GWCode = trim(input('GWCode'));

        $SQL = 'SELECT A.GWCourseReqHour,A.GWCourseTrainHourReq,B.CourseName,C.GWName,A.CourseCode
                FROM GW_Cross_Course A JOIN CourseList B ON A.CourseCode = B.CourseCode JOIN GWList C ON A.GWCode = C.GWCode ';

        $paramArr = [];

        if(!empty($GWCode)){
            $SQL.= ' WHERE A.GWCode = ? ';
            $paramArr = [$GWCode];
        }

        $rows = db()->query($SQL,$paramArr);

        return json_encode($rows,JSON_UNESCAPED_UNICODE);
    }

    public function  AddGWKC(){
        $GWCode = input('GWCode');
        $CourseCode = input('CourseCode');
        $GWCourseReqHour = input('GWCourseReqHour');
        $GWCourseTrainHourReq = input('GWCourseTrainHourReq');

        if(empty($GWCode) || empty($CourseCode)
            || empty($GWCourseReqHour) || empty($GWCourseTrainHourReq)){
              return '请输入所有数据!';
        }

        $rows =  db()->query('SELECT id FROM GW_Cross_Course WHERE GWCode = ? AND CourseCode = ?',[$GWCode,$CourseCode]);

        if(!empty($rows)){
            return '本课程该岗位培训列表中已存在!';
        }

        db()->query('INSERT INTO GW_Cross_Course
                (GWCode,CourseCode,GWCourseReqHour,GWCourseTrainHourReq) VALUES(?,?,?,?)',[$GWCode,$CourseCode,$GWCourseReqHour,$GWCourseTrainHourReq]);

        return '课程加入完成!';
    }

    public function DelGWKC(){
        $GWCode = input('GWCode');
        $CourseCode = input('CourseCode');


    }

}