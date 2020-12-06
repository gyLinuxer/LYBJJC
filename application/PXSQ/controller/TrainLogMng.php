<?php
namespace app\PXSQ\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\PXSQ\controller\CodeMachine;


class TrainLogMng extends controller{

    private $CM;

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->CM = new CodeMachine();
    }

    public function showTrainLogInput(){
        return view('TrainLogInput');
    }


    public function TrainGroupInput(){

        $TrainGroupCode = $this->CM->GetCurCode('TG');

        $TrainGroup = json_decode(file_get_contents('php://input'),true);

        if(!empty($TrainGroup['ExamPlanCode'])){//培训分组有考试
            $TrainGroupTabData['TrainGroupCode'] = $TrainGroupCode;
            $TrainGroupTabData['TrainGroupName'] = $TrainGroup['TrainGroupName'];
            $TrainGroupTabData['ExamPlanCode']  = $TrainGroup['ExamPlanCode'];
            $Ret = db('TrainGroup')->insert($TrainGroupTabData);
            if(empty($Ret)){
                return '添加培训分组记录TrainGroup表失败!';
            }else{
                $this->CM->GetAndIncCurCode('TG');
            }

            foreach ($TrainGroup['TrainReceivers'] as $v){
                $TrainGroup_Receiver_Cross_Data['TrainGroupCode'] = $TrainGroupCode;
                $TrainGroup_Receiver_Cross_Data['TrainGroupReceiverCode'] = $v['UserCode'];
                $TrainGroup_Receiver_Cross_Data['ExamStatus'] = '未完成';
                db('TrainGroup_Receiver_Cross')->insert($TrainGroup_Receiver_Cross_Data);
            }

            foreach ($TrainGroup['curCourseList'] as $v){
                $TrainGroupCourseDetail['TrainGroupCode'] = $TrainGroupCode;
                $TrainGroupCourseDetail['CourseCode'] = $v['CourseCode'];
                $TrainGroupCourseDetail['CourseName'] = $v['CourseName'];
                $TrainGroupCourseDetail['TrainBeginDate'] = $v['BeginDate'];
                $TrainGroupCourseDetail['TrainBeginDate']   = $v['BeginDate'];
                $TrainGroupCourseDetail['TrainEndDate']   = $v['EndDate'];
                $TrainGroupCourseDetail['TrainMethod']   = $v['TrainMethod'];
                $TrainGroupCourseDetail['TrainTeacherCode']   = $v['Teacher'];
                db('TrainGroupCourseDetail')->insert($TrainGroupCourseDetail);
            }
        }else{//没有考试，直接写培训记录
            $TrainLogData['TrainGroupCode'] = $TrainGroupCode;
            $this->CM->GetAndIncCurCode('TG');
            $TrainLogData['TrainLogCode']   = $this->CM->GetCurCode('TL');
            $TrainLogData['TrainGroupName'] = $TrainGroup['TrainGroupName'];
            foreach ($TrainGroup['curCourseList'] as $v){
                foreach ($TrainGroup['TrainReceivers'] as $v1){
                    $TrainLogData['TrainCourseCode'] = $v['CourseCode'];
                    $TrainLogData['TrainCourseName'] = $v['CourseName'];
                    $TrainLogData['TrainBeginDate'] = $v['BeginDate'];
                    $TrainLogData['TrainEndDate']   = $v['EndDate'];
                    $TrainLogData['TrainMethod']   = $v['TrainMethod'];
                    $TrainLogData['TrainTeacherCode']   = $v['Teacher'];
                    $TrainLogData['TrainReceiverCode']   = $v1['UserCode'];
                    $TrainLogData['TrainReceiverName']   = $v1['Name'];
                    $Ret = db('TrainLog')->insert($TrainLogData);
                    if(empty($Ret)){
                        return '写培训记录TrainLog失败!';
                    } else{
                        $this->CM->GetAndIncCurCode('TL');
                    }
                }
            }

        }

        return 'OK';


    }

}