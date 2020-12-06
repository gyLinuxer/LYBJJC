<?php
namespace app\PXSQ\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\PXSQ\controller\CodeMachine;

class ExamMng extends controller{

    var $CM;

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->CM = new CodeMachine();
    }

    public function showExamPlanInput(){
        return view('ExamPlanInput');
    }

    public function AddExamPlan(){
        $ExamPlanName = trim(input('ExamPlanName'));
        $ExamStartTime = input('ExamStartTime');
        $ExamEndTime = input('ExamEndTime');
        $ExamSubjectLogic = input('ExamSubjectLogicList/a');

        if(empty($ExamPlanName)){
            return '必须输入考试计划名称!';
        }

        if(empty($ExamStartTime) ||empty($ExamEndTime)){
            return '必须输入考试开始和结束时间!';
        }

        if(date('Y-m-d H:i:s',$ExamEndTime) < date('Y-m-d H:i:s',$ExamStartTime)){
            return '结束时间必须大于开始时间';
        }

        if(empty($ExamSubjectLogic)){
            return '必须输入出题逻辑!';
        }

        $ExamPlanCode = $this->CM->GetCurCode('EP');

        $data['ExamPlanCode'] = $ExamPlanCode;
        $data['ExamPlanName'] = $ExamPlanName;
        $data['ExamStartTime'] = $ExamStartTime;
        $data['ExamEndTime'] = $ExamEndTime;


        $rows = db()->query('SELECT * FROM ExamPlanTab WHERE ExamPlanName = ?',[$ExamPlanName]);
        if(!empty($rows)){
            return '该考试计划已经存在!';
        }

        $Cnt = db('ExamPlanTab')->insert($data);

        if($Cnt<=0){
            return '添加考试计划失败!';
        }

        $this->CM->IncCurCode('EP');

        foreach ($ExamSubjectLogic as $v){
            $data = [];
            $data['ExamPlanCode'] = $ExamPlanCode;
            $data['SubjectClassCode'] = $v['SubjectClassCode'];
            $data['SubjectCnt'] = $v['SubjectCntTo'];
            db('ExamSubjectStrategy')->insert($data);
        }

        return '添加考试计划成功!';
    }

    public function GetAvailableExamPlan(){
       $rows =  db()->query('SELECT * FROM ExamPlanTab WHERE ExamEndTime > ?',[date('Y-m-d H:i:s')]);
       return json_encode($rows,JSON_UNESCAPED_UNICODE);
    }



}