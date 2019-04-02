<?php
namespace app\safetymng\controller;
use think\console\Output;
use think\Controller;
use think\Db;

class CheckTask extends PublicController{
    public $CheckTaskStatus_Arr = array('CheckListUndefined'=>'检查单未制定',
                                        'CheckListIsDefined'=>'检查单已制定',
                                        'CheckIsStarted'    =>'检查已开始');

    public $CheckTaskIntStatus_Arr = array( '检查单未制定'=>1,
                                            '检查单已制定'=>2,
                                            '检查已开始'=>3);
    public function index(){
        $this->assign('UserList',db('UserList')->where(array(
            'Corp'=>session('Corp')))->select());
        $this->assign('QuestionSource',db('QuestionSource')->select());
        $this->assign('Today',date('Y-m-d'));
        $this->assign('CorpList',db('UserList')->field('distinct Corp')->select());
        return view('index');
    }



    public function CreateCheckTask(){
        $data['CheckName']    = input('CheckName');
        $data['CheckSource']  = input('CheckSource');
        $data['ScheduleDate'] = input('ScheduleDate');
        $data['CheckSource']  = input('CheckSource');
        $data['DutyCorp']     = input('Corp');

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
        $data['Status'] = $this->CheckTaskStatus_Arr['CheckListUndefined'];
        $data['AddTime'] = date('Y-m-d H:i:s');
        $id = db('CheckList')->insertGetId($data);
        if(empty($id)){
            $this->assign("Warning",'创建检查任务失败!');
            goto OUT1;
        }

        $data = array();
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
            $this->redirect('/SafetyMng/CheckTask/showCheckListMng/CheckListID/'.$id);

        OUT1:
            return $this->index();
    }

    public function showCheckListMng($CheckListID){
        $CheckInfoRow = db('CheckList')->where(array('id'=>$CheckListID))->select()[0];
        $SQL = "SELECT CheckBaseDB.BaseName,FirstHalfCheckTB.ProfessionName,FirstHalfCheckTB.BusinessName,FirstHalfCheckTB.CheckSubject,FirstHalfCheckTB.CheckSubject,
        FirstHalfCheckTB.Code1,FirstHalfCheckTB.Code2,FirstHalfCheckTB.CheckContent,FirstHalfCheckTB.CheckStandard,
        SecondHalfCheckTB.ComplianceStandard,SecondHalfCheckTB.CheckMethods,SecondHalfCheckTB.BasisName,
        SecondHalfCheckTB.BasisTerm,SecondHalfCheckTB.RelatedCorps,SecondHalfCheckTB.CheckFrequency,CheckListDetail.id as CheckListRowId
        FROM FirstHalfCheckTB JOIN SecondHalfCheckTB JOIN CheckListDetail JOIN CheckBaseDB ON CheckBaseDB.id=FirstHalfCheckTB.BaseDBID AND SecondHalfCheckTB.CheckStandardID = FirstHalfCheckTB.id AND 
              SecondHalfCheckTB.IsValid ='YES' AND FirstHalfCheckTB.IsValid = 'YES' AND CheckListDetail.CheckDBID = FirstHalfCheckTB.BaseDBID 
              AND CheckListDetail.FirstHalfTBID = FirstHalfCheckTB.id AND CheckListDetail.SecondHalfTBID = SecondHalfCheckTB.id WHERE CheckListDetail.CheckListID=?";
        $Ret = db()->query($SQL,array($CheckListID));

        $CKIntStatus  = $this->CheckTaskIntStatus_Arr[$CheckInfoRow['Status']];
        $this->assign('NeedShowCheckRowMngBtn',$CKIntStatus>=$this->CheckTaskIntStatus_Arr[$this->CheckTaskStatus_Arr['CheckListIsDefined']]?0:1);
        $this->assign('CheckInfoRow',$CheckInfoRow);
        $this->assign('CheckListID',$CheckListID);
        $this->assign('CheckList',$Ret);
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


        $SQL =  "SELECT SecondHalfCheckTB.*,
                        FirstHalfCheckTB.id as FHId,
                        FirstHalfCheckTB.BaseDBID,
                        FirstHalfCheckTB.ProfessionName,
                        FirstHalfCheckTB.BusinessName,
                        FirstHalfCheckTB.Code1,
                        FirstHalfCheckTB.Code2,
                        FirstHalfCheckTB.CheckSubject,
                        FirstHalfCheckTB.CheckStandard,
                        CheckListDetail.id as CheckListRowId FROM SecondHalfCheckTB JOIN FirstHalfCheckTB ON 
                        SecondHalfCheckTB.CheckStandardID = FirstHalfCheckTB.id 
                         LEFT JOIN CheckListDetail  ON   SecondHalfCheckTB.id  = CheckListDetail.SecondHalfTBID AND CheckListDetail.CheckListID = ?
                        WHERE
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
            array($CheckListID,$data['BaseDBID'],$data['ProfessionName'],
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

    public function showOnlineCheckIndex($CheckListID=NULL){
        if(empty($CheckListID)){
            return '检查单编号为空!';
        }

        $CKListData = db('CheckList')->where(array('id'=>$CheckListID))->select()[0];
        $this->assign('CheckInfoRow',$CKListData);
        return view('OnlineCheckIndex');
    }

    public function showFastReformByCheckRow($CheckRowID)
    {
        $Ret = db()->query('SELECT * FROM CheckListDetail JOIN CheckList ON CheckList.id = CheckListDetail.CheckListID AND CheckListDetail.id = ? 
                        JOIN FirstHalfCheckTB ON FirstHalfCheckTB.id = CheckListDetail.FirstHalfTBID JOIN SecondHalfCheckTB ON SecondHalfCheckTB.id = CheckListDetail.SecondHalfTBID',array($CheckRowID))[0];
        if(empty($Ret)){
            return '条款不存在！';
        }

        $data['QuestionSourceName'] = $Ret['CheckSource'];
        $data['Inspectors'] = session('Name');
        $data['Basis'] = $Ret['BasisTerm']. $Ret['ComplianceStandard'];
        $data['DutyCorp'] = $Ret['DutyCorp'];
        $data['CallBackURL'] = '/SafetyMng/CheckTask/CHGCheckRowDealType/CheckRowID/'.$CheckRowID.'/DealType/2'.'/RelatedID/';


        $RF = new Reform();
        return $RF->showFastReformIndex(0,0,'YES',$data);
    }


    public function showOnlineCheckPage($CheckListID=NULL,$CurOrderID=0){
        if(empty($CheckListID)){
            return "检查单ID不可为空";
        }

        $CKListData = db('CheckList')->where(array('id'=>$CheckListID))->select()[0];

        if(empty($CKListData)){
            return '检查单不存在!';
        }

        $CheckRowData = array();
        if($CurOrderID==0){//如果没有制定条款号，则自动跳到第一个未检查项目
            $CheckRowData = db()->query('SELECT * FROM CheckListDetail WHERE CheckListID=? AND IsOK IS NULL ORDER BY id LIMIT 1',array($CheckListID))[0];
        }else{
            $CheckRowData = db('CheckList')->where(array('CheckListID'=>$CheckListID))->select()[0];
        }

        $this->assign('CheckRowData',$CheckRowData);
        $this->assign('CurOrderID',$CurOrderID);
        $this->assign('CheckInfoRow',$CKListData);
        return view('OnlineCheckPage');
    }


    public function StartCheck($CheckListID= NULL ){
        if(empty($CheckListID)){
            return '检查单ID不可为空!';
        }

       $Ret = db('CheckList')->where(array('id'=>$CheckListID))->select()[0];
        if(empty($Ret)){
            return '检查单不存在!';
        }

        if($Ret['Status']==$this->CheckTaskStatus_Arr['CheckListIsDefined']){//检查单已经制定
            db('CheckList')->where(array('id'=>$CheckListID))->update(array('Status'=>$this->CheckTaskStatus_Arr['CheckIsStarted']));
        }else if($Ret['Status']==$this->CheckTaskStatus_Arr['CheckIsStarted']){//检查已经开始

        }else{
            return '检查单当前的状态为:'.$Ret['Status'];
        }

        OUT:
            return $this->showOnlineCheckPage($CheckListID);
    }

    public function CHGCheckRowDealType($CheckRowID=0,$DealType=1/*1:问题提交,2:立即整改*/,$RelatedID=0){
        $this->assign('Title',$DealType==1?'问题提交成功!':'整改通知书下发成功!');
        $this->assign('Content','请您关闭本页面继续检查。');
        return view('CheckRowDealTypeCHGStatus');
    }

}