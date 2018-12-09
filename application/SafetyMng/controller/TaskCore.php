<?php
namespace app\SafetyMng\controller;
use think\db;
use think\controller;
class TaskCore extends PublicController{
    public static $TaskTypes = [];
    public  function index()
    {
        $data = [];
        echo is_null($data['55'])."-->".empty($data['55']).'-->'.dump(isset($data['55']));
    }
    static  public  function CreateTask($TaskData){
        $TaskType = $TaskData['TaskType'];
        $TaskName = $TaskData['TaskName'];
        $TaskInfo = $TaskData['TaskInfo'];
        $Deadline = $TaskData['Deadline'];
        $SenderName = $TaskData['SenderName'];
        $ReciveCorp = $TaskData['ReciveCorp'];
        $Ret = '' ;

        $MustFilled = ['TaskType','TaskName','TaskInfo','SenderName','ReciveCorp'];
        foreach ($MustFilled as $Must){
            if(empty($TaskData[$Must])){
                $Ret = '任务要素不完整!';
                goto OUT;
            }
        }

        $INSRET =  db('tasklist')->data($TaskData)->insert();
        if($INSRET>0){
            $Ret = '';
        }

        OUT:
            return $Ret;
    }
}