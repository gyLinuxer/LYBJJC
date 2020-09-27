<?php
namespace app\PXSQ\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\PXSQ\controller\CodeMachine;

class GWKCCross extends controller{

    public function GetGWunTrainedCourseList(){//获取岗位尚未挂钩课程
        $GWCode = input('GWCode');
        $rows =  db()->query('SELECT * FROM CourseList WHERE CourseCode 
            NOT IN (SELECT CourseCode FROM GW_Cross_Course WHERE GWCode = ?)',[$GWCode]);
        return json_encode($rows,JSON_UNESCAPED_UNICODE);
    }


}