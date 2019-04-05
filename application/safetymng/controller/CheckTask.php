<?php
namespace app\safetymng\controller;
use think\console\Output;
use think\Controller;
use think\Db;

class CheckTask extends PublicController{
    public $CheckTaskStatus_Arr = array('CheckListUndefined'=>'检查单未制定',
                                        'CheckListIsDefined'=>'检查单已制定',
                                        'CheckIsStarted'    =>'检查已开始',
                                        'CheckIsFinished'   =>'检查已结束');

    public $CheckTaskIntStatus_Arr = array( '检查单未制定'=>1,
                                            '检查单已制定'=>2,
                                            '检查已开始'  =>3,
                                            '检查已结束'  =>4);
    public function index(){
        $this->assign('UserList',db('UserList')->order('Name ASC')->select());
        $this->assign('QuestionSource',db('QuestionSource')->select());
        $this->assign('Today',date('Y-m-d'));
        $this->assign('CorpList',$this->GetCorpList());
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
        $data['ReciveCorp'] = TaskCore::MULT_CORP;
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
        $Ret = $CTask->TaskAlign($Ret['ID'],'YES');
        dump($Ret);
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
        SecondHalfCheckTB.ComplianceStandard,SecondHalfCheckTB.CheckMethods,SecondHalfCheckTB.BasisName,SecondHalfCheckTB.InnerManual,
        SecondHalfCheckTB.BasisTerm,SecondHalfCheckTB.RelatedCorps,SecondHalfCheckTB.CheckFrequency,CheckListDetail.DealType,CheckListDetail.id as CheckListRowId,CheckListDetail.Checker,CheckListDetail.IsOk,CheckListDetail.DealType,
        TIMESTAMPDIFF(SECOND,CheckListDetail.StartTime,CheckListDetail.EndTime) as CostSecond
        
        FROM FirstHalfCheckTB JOIN SecondHalfCheckTB JOIN CheckListDetail JOIN CheckBaseDB ON CheckBaseDB.id=FirstHalfCheckTB.BaseDBID AND SecondHalfCheckTB.CheckStandardID = FirstHalfCheckTB.id AND 
              SecondHalfCheckTB.IsValid ='YES' AND FirstHalfCheckTB.IsValid = 'YES' AND CheckListDetail.CheckDBID = FirstHalfCheckTB.BaseDBID 
              AND CheckListDetail.FirstHalfTBID = FirstHalfCheckTB.id AND CheckListDetail.SecondHalfTBID = SecondHalfCheckTB.id WHERE CheckListDetail.CheckListID=? ORDER BY CheckListDetail.SecondHalfTBID ASC ";
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
        $data['Corp']           = "%".input('RelatedCorps')."%";



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
                        SecondHalfCheckTB.IsValid = 'YES' AND 
                        SecondHalfCheckTB.RelatedCorps LIKE ?
                        ";


        $this->assign('RelatedCorps',json_encode(input('RelatedCorps/a'),JSON_UNESCAPED_UNICODE));

        $CheckRowListData =  db()->query($SQL,
            array($CheckListID,$data['BaseDBID'],$data['ProfessionName'],
            $data['BusinessName'],$data['Code1'],
            $data['Code2'],$data['CheckSubject'],
            $data['CheckContent'],$data['CheckStandard'],$data['Corp']));

        $this->assign('CheckRowList',$CheckRowListData);
        return $this->showCheckSelectRow($CheckListID);
    }

    public function showCheckSelectRow($CheckListID=NULL)
    {
        if(empty($CheckListID)){
            return "检查单ID不可为空";
        }
        $this->assign('CorpList',$this->GetCorpList());
        $this->assign('CheckDB',db('CheckBaseDB')->select());
        $this->assign('CheckListID',$CheckListID);
        $this->assign('CheckListInfo',db('CheckList')->where(array('id'=>$CheckListID))->select()[0]);
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

    public function showQuestionInputByCheckRow($CheckRowID){
        $Ret = db()->query('SELECT * FROM CheckListDetail JOIN CheckList ON CheckList.id = CheckListDetail.CheckListID AND CheckListDetail.id = ? 
                        JOIN FirstHalfCheckTB ON FirstHalfCheckTB.id = CheckListDetail.FirstHalfTBID JOIN SecondHalfCheckTB ON SecondHalfCheckTB.id = CheckListDetail.SecondHalfTBID',array($CheckRowID))[0];
        if(empty($Ret)){
            return '条款不存在！';
        }

        $data['QuestionSourceName'] = $Ret['CheckSource'];
        $data['Inspectors'] = session('Name');
        $data['Basis'] = $Ret['BasisTerm']. $Ret['ComplianceStandard'];
        $data['DutyCorp'] = $Ret['DutyCorp'];
        $data['CallBackURL'] = '/SafetyMng/CheckTask/CHGCheckRowDataStatus/CheckRowID/'.$CheckRowID.'/DealType/1'.'/RelatedID/';
        $data['CheckSubject'] = $Ret['CheckSubject'];

        $QsIN = new QuestionInput();
        return $QsIN->index($data);
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
        $data['CallBackURL'] = '/SafetyMng/CheckTask/CHGCheckRowDataStatus/CheckRowID/'.$CheckRowID.'/DealType/2'.'/RelatedID/';
        $data['CheckSubject'] = $Ret['CheckSubject'];

        $RF = new Reform();
        return $RF->showFastReformIndex(0,0,'YES',$data);
    }

    public function saveCheckRowResult(){

        $CheckRowID = input('CheckRowID');
        $CheckResult = input('CheckResult');
        $CurOrderID = intval(input('CurOrderID'));
        $CheckListID = input('CheckListID');

        if(empty($CheckRowID)){
            return '条款ID及顺序ID不能为空';
        }

        if(empty($CheckResult)){
            $this->assign('Warning','没有选择检查结果!');
            goto OUT1;
        }

        $CheckRowData = db('CheckListDetail')->where(array('id'=>$CheckRowID))->select()[0];

        if(empty($CheckRowData)){
            $this->assign('Warning','检查条款不存在!');
            goto OUT1;
        }

        $CurResult = $CheckRowData['IsOk'];
        if(empty($CurResult) && $CurResult!='NO'){//说明没有设定结果，并且结果为YES
            db('CheckListDetail')->where(array('id'=>$CheckRowID))->update(
                        array('Checker'=>session('Name'),
                               'EndTime'=>date('Y-m-d H:i:s'),
                                'IsOk'=>$CheckResult));
        }

        $CheckRows = db('CheckListDetail')->order('SecondHalfTBID ASC')->where(array('CheckListID'=>$CheckListID))->select();
        $CheckInfo = db('CheckList')->where(array('id'=>$CheckListID))->select()[0];
        //检查是不是所有条款都检查完毕了
        $unCPTRow  = db()->query('SELECT id FROM CheckListDetail WHERE IsOk IS NULL AND CheckListID = ?',array($CheckListID));
        if(count($unCPTRow)==0 && empty($CheckInfo['EndTime'])){//本检查单已经全部完成了
            if($CheckInfo['Status'] == $this->CheckTaskStatus_Arr['CheckIsStarted']){
                dump($CurOrderID);
                db('CheckList')->where(array('id'=>$CheckListID))->update(array(
                    'Status'=>$this->CheckTaskStatus_Arr['CheckIsFinished'],
                    'EndTime'=>date('Y-m-d H:i:s'),
                    'TotalSecondCosted'=>$this->GetCheckCostTime($CheckListID),
                    'OkRowCnt'=>$this->GetCheckOKRowCnt($CheckListID)));
            }
        }

        $RowCnt = count($CheckRows);
        $NextOrderID = intval($CurOrderID)+1;
        if($NextOrderID>$RowCnt){
            $NextOrderID =1;
        }


        OUT:
            $this->redirect('/SafetyMng/CheckTask/showOnlineCheckPage/CheckListID/'.$CheckListID.'/CurOrderID/'.$NextOrderID);

        OUT1:
            return $this->showOnlineCheckPage($CheckListID,$CurOrderID);
            //$this->redirect('/SafetyMng/CheckTask/showOnlineCheckPage/CheckListID/'.$CheckListID.'/CurOrderID/'.($CurOrderID));

    }

    public function GetCheckCostTime($CheckListID){
        $TotalSecond = db()->query('SELECT SUM(TIMESTAMPDIFF(SECOND,StartTime,EndTime)) as TotalSecond,CheckListID FROM `CheckListDetail` WHERE 
                                    StartTime IS NOT NULL AND EndTime IS NOT NULL  AND CheckListID = ? GROUP  BY CheckListID',array($CheckListID))[0]['TotalSecond'];
        return  $TotalSecond;
    }

    public function GetCheckOKRowCnt($CheckListID){
        $OKRowCnt = db('CheckListDetail')->field('count(id) as CNT')->where(array('CheckListID'=>$CheckListID,'IsOk'=>'YES'))->select()[0]['CNT'];
        return $OKRowCnt;
    }

    public function showOnlineCheckPage($CheckListID=NULL,$CurOrderID=0){
        $CurOrderID = intval($CurOrderID);
        if(empty($CheckListID)){
            return "检查单ID不可为空";
        }

        $CKListData = db('CheckList')->where(array('id'=>$CheckListID))->select()[0];

        if(empty($CKListData)){
            return '检查单不存在!';
        }

        $CheckRows = db('CheckListDetail')->order('SecondHalfTBID ASC')->where(array('CheckListID'=>$CheckListID))->select();

        if(empty($CheckRows)){
            return '检查条款不存在!';
        }

        $CheckRowData = array();

        if($CurOrderID<1){//如果没有制定条款号，则自动跳到第一个未检查项目
            $CheckRowData = db()->query('SELECT * FROM CheckListDetail WHERE CheckListID=? AND IsOK IS NULL ORDER BY SecondHalfTBID LIMIT 1',array($CheckListID))[0];
            if(empty($CheckRowData)){
                $CheckRowData = db()->query('SELECT * FROM CheckListDetail WHERE CheckListID=?  ORDER BY SecondHalfTBID ASC LIMIT 1',array($CheckListID))[0];
            }else{//更新CurOrderID为第一个未检查项目的顺序号
                $CurOrderID = db()->query('SELECT Count(id) as Cnt FROM CheckListDetail WHERE CheckListID=?  AND SecondHalfTBID <=?',
                    array($CheckListID,$CheckRowData['SecondHalfTBID']))[0]['Cnt'];
            }
        }else{//按照$CurOrderID
            if($CurOrderID<=count($CheckRows)){
                $RealID = $CheckRows[$CurOrderID-1]['id'];
            }else{//如果大于条款总数量，则跳转到最后一个条款
                $RealID = $CheckRows[0]['id'];
                $CurOrderID = 1;
            }

            $CheckRowData = db()->query('SELECT * FROM CheckListDetail WHERE id = ?',array($RealID))[0];
        }

        if(empty($CheckRowData['IsOk'])){//还没有开始检查
            db('CheckListDetail')->where(array('id'=>$CheckRowData['id']))->update(array('StartTime'=>date('Y-m-d H:i:s')));
        }

        $this->assign('CheckRowData',$CheckRowData);
        $this->assign('CurOrderID',$CurOrderID);
        $this->assign('CheckInfoRow',$CKListData);
        $this->assign('CheckListID',$CheckListID);
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

        if(empty($Ret['StartTime'])){
            db('CheckList')->where(array('id'=>$CheckListID))->update(array('StartTime'=>date('Y-m-d H:i:s')));
        }

        if($Ret['Status']==$this->CheckTaskStatus_Arr['CheckListIsDefined']){//检查单已经制定
            db('CheckList')->where(array('id'=>$CheckListID))->update(array('Status'=>$this->CheckTaskStatus_Arr['CheckIsStarted']));
        }else if($Ret['Status']==$this->CheckTaskStatus_Arr['CheckIsStarted']){//检查已经开始

        }else{
            //return '检查单当前的状态为:'.$Ret['Status'];
        }

        OUT:
            return $this->showOnlineCheckPage($CheckListID);
    }



    public function CHGCheckRowDataStatus($CheckRowID=0,$DealType=1/*1:问题提交,2:立即整改*/,$RelatedID=0){
        $DealType_Arr  = array(1=>'问题提交',2=>'立即整改');
        $Title = '';
        $Content = '';

        if(empty($CheckRowID) || empty($RelatedID) || !array_key_exists($DealType,$DealType_Arr)){
            $Title =  $DealType_Arr[$DealType].'失败!!';
            $Content = '请您关闭本页面再操作一次试试:检查条款ID或关联ID为空，或者处理类型不存在!';
            goto OUT;
        }

        switch ($DealType){
            case 1:{//问题提交
                  $DataRow =   db('QuestionList')->where(array('id'=>$RelatedID))->select()[0];
                  $NonConfirmDesc = $DataRow['QuestionInfo'];
                break;
            }
            case 2:{//立即整改
                  $DataRow =   db('ReformList')->where(array('id'=>$RelatedID))->select()[0];
                  $NonConfirmDesc = $DataRow['NonConfirmDesc'];
                break;
            }
        }

        $DutyCorp = db()->query('SELECT DutyCorp FROM CheckList JOIN  CheckListDetail ON CheckListDetail.id = ? AND 
                              CheckList.id = CheckListDetail.CheckListID',array($CheckRowID))[0]['DutyCorp'];

        if(empty($DataRow) || empty($DutyCorp)){
            $Title =  $DealType_Arr[$DealType].'失败!!';
            $Content = '请您关闭本页面再操作一次试试:问题或者整改找不到或者责任单位为空!';
            goto OUT;
        }



        $Cnt =  db('CheckListDetail')->where(array('id'=>$CheckRowID))->
                    update(array('RelatedTaskID'=>empty($DataRow['TaskID'])?$DataRow['ParentTaskID']:$DataRow['TaskID'],
                                 'RelatedID'=>$RelatedID,
                                 'DealType'=>$DealType_Arr[$DealType],
                                 'NonConfirmDesc'=>$NonConfirmDesc,
                                  'IsOk'=>'NO',
                                  'Checker'=>session('Name'),
                                  'EndTime'=>date('Y-m-d H:i:s'),
                                  'NonConfirmDutyCorp'=>$DutyCorp));

        $Title = $DealType_Arr[$DealType].($Cnt==1?'操作成功!':'操作失败!');
        $Content = '请您关闭本页面，'.($Cnt==1?'继续检查。':'再操作一次试试。');
        OUT:

        $this->assign('Title',$Title);
        $this->assign('Content',$Content);
        return view('CheckRowDealTypeCHGStatus');
    }

    function showCheckIsFinished($CheckListID){
        if(empty($CheckListID)){
            return '检查单ID不可为空!';
        }

        $Ret = db('CheckList')->where(array('id'=>$CheckListID))->select()[0];
        if(empty($Ret)){
            return '检查单不存在!';
        }

        return $this->showOnlineCheckIndex($CheckListID);

    }

    function GetCheckTimeCostStr($Second){
        $Second = intval($Second);
        return intval($Second/3600).'小时'.intval(($Second%3600)/60).'分'.  ($Second%60).'秒';
    }

    function showFeedBackPage($CheckRowID=0){
        if(empty($CheckRowID)){
            return '条款ID不能为空!';
        }

        $this->assign('CheckRowID',$CheckRowID);
        $this->assign('FeedBack',db('CheckListDetail')->where(array('id'=>$CheckRowID))->select()[0]['FeedBack']);
        return view('CheckDetailFeedBack');
    }

    function saveCheckDetailFeedBack($CheckRowID=0){
        if(empty($CheckRowID)){
            return '条款ID不能为空!';
        }
        $FeedBack = input('FeedBack');
        db('CheckListDetail')->where(array('id'=>$CheckRowID))->update(
            array('FeedBack'=>$FeedBack,
                'FeedBackTime'=>date('Y-m-d H:i:s'),
                'FeedBacker'=>session('Name')
            ));
        return $this->showFeedBackPage($CheckRowID);
    }


}