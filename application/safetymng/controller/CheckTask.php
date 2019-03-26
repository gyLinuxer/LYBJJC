<?php
namespace app\safetymng\controller;
use think\console\Output;
use think\Controller;
use think\Db;

class CheckTask extends PublicController{
    public function index(){
        $this->assign('UserList',db('UserList')->where(array(
            'Corp'=>session('Corp')))->select());
        $this->assign('QuestionSource',db('QuestionSource')->select());
        $this->assign('Today',date('Y-m-d'));
        return view('index');
    }


    public function CreateCheckTask(){
        $data['CheckName']    = input('CheckName');
        $data['CheckSource']  = input('CheckSource');
        $data['ScheduleDate'] = input('ScheduleDate');
        $data['CheckSource']  = input('CheckSource');

        foreach ($data as $v){
            if(empty($v)){
                $this->assign("Warning",'请填写所有要素.');
                goto OUT1;
            }
        }

        $CodePre = db()->query("SELECT CodePre FROM QuestionSource WHERE SourceName = ? ",array($data['CheckSource']))[0]['CodePre'];
        if(empty($CodePre)){
            $this->assign("Warning",$data['CheckSource']."检查来源不存在!");
            goto OUT1;
        }

        $C = substr($CodePre,-1,1);

        if( $C[0]!="1"){
            $CodePre.='-';
        }

        $data['CheckCode'] = $CodePre .'JX-'.date('YmdHis');
        $data['TaskID'] = 0;
        $data['Status'] = '尚未开始';
        $id = db('CheckList')->insertGetId($data);
        if(empty($id)){
            $this->assign("Warning",'创建检查任务失败!');
            goto OUT1;
        }

        $data = array();

        //$MustFilled = ['TaskType','TaskName','ReciveCorp','RelateID','CreateTime','ParentID'];
        $data['TaskType'] = TaskCore::ONLINE_CheckTask;
        $data['TaskName'] = input('CheckName');
        $data['ReciveCorp'] = session('Corp');
        $data['RelateID'] = $id;
        $data['CreateTime'] = date('Y-m-d H:i:s');
        $data['ParentID'] = 0;
        $Ret = TaskCore::CreateTask($data);
        if(empty($Ret['ID'])){
            $this->assign("Warning",'创建检查任务失败:'.$Ret['Ret']);
            goto OUT1;
        }else{
            //更新检查者一列和任务ID
            $Checkers = input('ManagerSelect');
            $GroupDealer = input('post.GroupDealer/a');
            if(!empty($GroupDealer)){
                foreach ($GroupDealer as $v){
                    $Checkers.= ' '.$v;
                }
            }

            db('CheckList')->where(array('id'=>$id))->update(array('Checkers'=>$Checkers,'TaskID'=>$Ret['ID']));
        }



        $CTask  = new TaskCore();
        $Ret = $CTask->TaskAlign($Ret['ID']);



        if($Ret!='任务分配成功！'){
            $this->assign("Warning",$Ret);
        }

        OUT:
            return $this->showCheckListMng($id);

        OUT1:
            return $this->index();
    }

    public function showCheckListMng($CheckListID){
        $CheckInfoRow = db('CheckList')->where(array('id'=>$CheckListID))->select()[0];
        $this->assign('CheckInfoRow',$CheckInfoRow);
        return view('CheckList');
    }

    public function CheckRowQuery($CheckListID=NULL){

        $CTBMng = new CheckTBMng();

        $data['BaseDBID']       = $CTBMng->RMInputPre(input('CheckDB'));
        $data['ProfessionName'] = "%".$CTBMng->RMInputPre(input('ProfessionName'))."%";
        $data['BusinessName']   = "%".$CTBMng->RMInputPre(input('BusinessName'))."%";
        $data['Code1']          = "%".$CTBMng->RMInputPre(input('Code1'))."%";
        $data['Code2']          = "%".$CTBMng->RMInputPre(input('Code2'))."%";
        $data['CheckSubject']   = "%".$CTBMng->RMInputPre(input('CheckSubject'))."%";
        $data['CheckContent']   = "%".$CTBMng->RMInputPre(input('CheckContent'))."%";
        $data['CheckStandard']  = "%".$CTBMng->RMInputPre(input('CheckStandard'))."%";


        $SQL =  " SELECT SecondHalfCheckTB.*,
                        FirstHalfCheckTB.id as FHId,
                        FirstHalfCheckTB.BaseDBID,
                        FirstHalfCheckTB.ProfessionName,
                        FirstHalfCheckTB.BusinessName,
                        FirstHalfCheckTB.Code1,
                        FirstHalfCheckTB.Code2,
                        FirstHalfCheckTB.CheckSubject,
                        FirstHalfCheckTB.CheckStandard,
                        CheckListDetail.id as CheckListRowId FROM SecondHalfCheckTB JOIN FirstHalfCheckTB ON 
                        SecondHalfCheckTB.CheckStandardID = FirstHalfCheckTB.id LEFT JOIN CheckListDetail ON CheckListDetail.FirstHalfTBID = FirstHalfCheckTB.id 
                         AND CheckListDetail.SecondHalfTBID = SecondHalfCheckTB.id WHERE 
                        BaseDBID= ? AND 
                        ProfessionName like ? AND 
                        BusinessName LIKE ? AND 
                        Code1 LIKE ? AND 
                        Code2 LIKE ? AND 
                        CheckSubject LIKE ? AND 
                        FirstHalfCheckTB.CheckContent LIKE ? AND 
                        FirstHalfCheckTB.CheckStandard LIKE ? AND 
                        FirstHalfCheckTB.IsValid = 'YES' AND 
                        SecondHalfCheckTB.IsValid = 'YES'
                        ";


        $this->assign('RelatedCorps',json_encode(input('RelatedCorps/a'),JSON_UNESCAPED_UNICODE));

        $CheckRowListData =  db()->query($SQL,
            array($data['BaseDBID'],$data['ProfessionName'],
            $data['BusinessName'],$data['Code1'],
            $data['Code2'],$data['CheckSubject'],
            $data['CheckContent'],$data['CheckStandard']));

        $this->assign('CheckRowList',$CheckRowListData);
        return $this->showCheckSelectRow($CheckListID);
    }

    public function showCheckSelectRow($CheckListID=NULL)
    {
        if(empty($CheckListID)){
            return "检查单ID不可为空";
        }
        $this->assign('CorpList',db('UserList')->field('distinct Corp')->select());
        $this->assign('CheckDB',db('CheckBaseDB')->select());
        $this->assign('CheckListID',$CheckListID);
        return view('CheckRowSelect');
    }
}