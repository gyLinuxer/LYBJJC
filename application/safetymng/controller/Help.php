<?php
namespace app\safetymng\controller;
/**
 * Created by PhpStorm.
 * User: liguangyao
 * Date: 2018/12/8
 * Time: 20:40
 */
use think\Controller;
use think\Log;
class Help extends Controller
{
    public function uploadFile(){
        //dump(request()->file());
        $file = request()->file('file');
       // dump(request()->file());
        // 移动到框架应用根目录/public/upload/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'upload');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
                //echo $info->getExtension();
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                echo '/upload/'.$info->getSaveName();
                // 输出 42a79759f284b767dfcb2a0197904287.jpg
                //echo $info->getFilename();
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }

    public function  Ajax_SelectLinkage(){

        $PostData_Arr = json_decode(file_get_contents('php://input'),true);
        $EventSel = $PostData_Arr['EventSel'];
        $NeedFakeID = $PostData_Arr['FakeID'];
        $NeedFakeCheckStandardID = $PostData_Arr['FakeCheckStandardID'];
        $Data_Arr = $PostData_Arr['data'];

        $SelNameList = array('CheckDB'=>'ProfessionName',
                            'ProfessionName'=>'BusinessName',
                            'BusinessName'=>'CheckSubject',
                            'CheckSubject'=>'Code1',
                            'Code1'=>'Code2',
                            'Code2'=>'CheckContent',
                            'CheckContent'=>'CheckStandard',
                            'CheckStandard'=>'');

        $SelNameIndex = array('CheckDB'=>0,
                            'ProfessionName'=>1,
                            'BusinessName'=>2,
                            'CheckSubject'=>3,
                            'Code1'=>4,
                            'Code2'=>5,
                            'CheckContent'=>6,
                            'CheckStandard'=>7);

        if(!array_key_exists($EventSel,$SelNameList)){
            return json([]);
        }

        $SelText = $Data_Arr[$SelNameIndex[$EventSel]]['SelText'];
        $SelVal  = $Data_Arr[$SelNameIndex[$EventSel]]['SelVal'];
        if(!empty($NeedFakeID)){
            $FakeID = "CONCAT('lgy19891115-',".$SelNameList[$EventSel].") AS ";
        }else{
            $FakeID = '';
        }

        $FakeCheckStandardID = '';
        if(!empty($NeedFakeCheckStandardID)){
            $FakeCheckStandardID = "CONCAT('lgy19891115-',".$SelNameList[$EventSel].") AS ";
        }



        switch ($EventSel){
            case 'CheckDB':{
               return json(array('TargetSel'=>$SelNameList[$EventSel],'data'=>db('FirstHalfCheckTB')
                                ->field('distinct '.$SelNameList[$EventSel].' as text,'.$FakeID.' id')
                               ->where(array('BaseDBID'=>$SelVal))
                               ->select()));
               break;
            }
            case 'ProfessionName':{
                $BaseDBID =  $Data_Arr[$SelNameIndex['CheckDB']]['SelVal'];
                return json(array('TargetSel'=>$SelNameList[$EventSel],'data'=>db('FirstHalfCheckTB')
                    ->field('distinct '.$SelNameList[$EventSel].' as text,'.$FakeID.' id')
                    ->where(array('BaseDBID'=>$BaseDBID,
                                    'IsValid'=>'YES',
                                    'ProfessionName'=>$SelText))
                    ->select()));
                break;
            }
            case 'BusinessName':{
                $BaseDBID =  $Data_Arr[$SelNameIndex['CheckDB']]['SelVal'];
                $ProfessionName =  $Data_Arr[$SelNameIndex['ProfessionName']]['SelText'];
                return json(array('TargetSel'=>$SelNameList[$EventSel],'data'=>db('FirstHalfCheckTB')
                    ->field('distinct '.$SelNameList[$EventSel].' as text,'.$FakeID.' id')
                    ->where(array('BaseDBID'=>$BaseDBID,
                        'IsValid'=>'YES',
                        'ProfessionName'=>$ProfessionName,
                        'BusinessName'=>$SelText))
                    ->select()));
                break;
            }
            case 'CheckSubject':{
                $BaseDBID =  $Data_Arr[$SelNameIndex['CheckDB']]['SelVal'];
                $ProfessionName =  $Data_Arr[$SelNameIndex['ProfessionName']]['SelText'];
                $BusinessName   =  $Data_Arr[$SelNameIndex['BusinessName']]['SelText'];
                return json(array('TargetSel'=>$SelNameList[$EventSel],'data'=>db('FirstHalfCheckTB')
                    ->field('distinct '.$SelNameList[$EventSel].' as text,'.$FakeID.' id')
                    ->where(array('BaseDBID'=>$BaseDBID,
                        'ProfessionName'=>$ProfessionName,
                        'IsValid'=>'YES',
                        'BusinessName'=>$BusinessName,
                        'CheckSubject'=>$SelText))
                    ->select()));
                break;
            }
            case 'Code1':{
                $BaseDBID =  $Data_Arr[$SelNameIndex['CheckDB']]['SelVal'];
                $ProfessionName =  $Data_Arr[$SelNameIndex['ProfessionName']]['SelText'];
                $BusinessName   =  $Data_Arr[$SelNameIndex['BusinessName']]['SelText'];
                $CheckSubject =  $Data_Arr[$SelNameIndex['CheckSubject']]['SelText'];
                return json(array('TargetSel'=>$SelNameList[$EventSel],'data'=>db('FirstHalfCheckTB')
                    ->field('distinct '.$SelNameList[$EventSel].' as text,'.$FakeID.' id')
                    ->where(array('BaseDBID'=>$BaseDBID,
                        'ProfessionName'=>$ProfessionName,
                        'IsValid'=>'YES',
                        'BusinessName'=>$BusinessName,
                        'CheckSubject'=>$CheckSubject,
                        'Code1'=>$SelText))
                    ->select()));
                break;
            }
            case 'Code2':{
                $BaseDBID =  $Data_Arr[$SelNameIndex['CheckDB']]['SelVal'];
                $ProfessionName =  $Data_Arr[$SelNameIndex['ProfessionName']]['SelText'];
                $BusinessName   =  $Data_Arr[$SelNameIndex['BusinessName']]['SelText'];
                $Code1 =  $Data_Arr[$SelNameIndex['Code1']]['SelText'];
                $CheckSubject =  $Data_Arr[$SelNameIndex['CheckSubject']]['SelText'];
                return json(array('TargetSel'=>$SelNameList[$EventSel],'data'=>db('FirstHalfCheckTB')
                    ->field('distinct '.$SelNameList[$EventSel].' as text,'.$FakeID.' id')
                    ->where(array('BaseDBID'=>$BaseDBID,
                        'ProfessionName'=>$ProfessionName,
                        'BusinessName'=>$BusinessName,
                        'IsValid'=>'YES',
                        'CheckSubject'=>$CheckSubject,
                        'Code1'=>$Code1,
                        'Code2'=>$SelText))
                    ->select()));
                break;
            }

            case 'CheckContent':{
                $BaseDBID =  $Data_Arr[$SelNameIndex['CheckDB']]['SelVal'];
                $ProfessionName =  $Data_Arr[$SelNameIndex['ProfessionName']]['SelText'];
                $BusinessName   =  $Data_Arr[$SelNameIndex['BusinessName']]['SelText'];
                $Code1 =  $Data_Arr[$SelNameIndex['Code1']]['SelText'];
                $Code2 =  $Data_Arr[$SelNameIndex['Code2']]['SelText'];
                $CheckSubject =  $Data_Arr[$SelNameIndex['CheckSubject']]['SelText'];
                return json(array('TargetSel'=>$SelNameList[$EventSel],'data'=>db('FirstHalfCheckTB')
                    ->field('distinct '.$SelNameList[$EventSel].' as text, '.$FakeCheckStandardID.' id')
                    ->where(array('BaseDBID'=>$BaseDBID,
                        'ProfessionName'=>$ProfessionName,
                        'BusinessName'=>$BusinessName,
                        'CheckSubject'=>$CheckSubject,
                        'IsValid'=>'YES',
                        'Code1'=>$Code1,
                        'Code2'=>$Code2,
                        'CheckContent'=>$SelText))
                    ->select()));
                break;
        }
        }

    }

    private function  GetOneRowFromTable($TBName,$id){
       return db($TBName)->where(array('id'=>$id))->select()[0];
    }

    public function  GetFirstHalfCheckTBRowById($id=0){
        return json(db()->query('SELECT FirstHalfCheckTB.*,CheckBaseDB.id as CheckDBId,CheckBaseDB.BaseName as BaseName 
              FROM FirstHalfCheckTB JOIN CheckBaseDB ON FirstHalfCheckTB.BaseDBID = CheckBaseDB.id WHERE FirstHalfCheckTB.id = ? ',array($id))[0]);
    }

    public function Ajax_AddRowToCheckList(){
        $PostData_Arr = json_decode(file_get_contents('php://input'),true);
        $Ret['Ret'] = 'Failed';
        $FailedCks_Arr = array();
        if(empty($PostData_Arr)){
            $Ret['Msg'] = '提交数据为空';
            goto OUT;
        }

        $CKListId = intval($PostData_Arr[0]['CheckListId']);
        $CKStatus = db('CheckList')->where(array('id'=>$CKListId))->select()[0]['Status'];
        if(empty($CKStatus)){
            $Ret['Msg'] = '编号为'.$CKListId.'的检查任务不不存在!';
            goto OUT;
        }
        $CkTask = new CheckTask();
        $CKIntStatus  = $CkTask->CheckTaskIntStatus_Arr[$CKStatus];
        if($CKIntStatus>=$CkTask->CheckTaskIntStatus_Arr[$CkTask->CheckTaskStatus_Arr['CheckListIsDefined']]){
            //检查单已经制定好了
            $Ret['Ret'] = 'Failed';
            $Ret['Msg'] = '检查单已经制定好了';
            goto OUT;
        }

        foreach ($PostData_Arr as $v){
            $FHID = intval($v['FHID']);
            $SHID = intval($v['SHID']);
            $BaseDBID  = intval($v['BaseDBID']);
            $CKListId = intval($v['CheckListId']);
            $CkId = intval($v['CkId']);

            //先看CheckListDetail中有没有这个条款
            $dbREt = db('CheckListDetail')->where(array('CheckDBID'=>$BaseDBID,'CheckListID'=>$CKListId,'FirstHalfTBID'=>$FHID,'SecondHalfTBID'=>$SHID))->select();
            if(empty($dbREt)){
                //开始添加
                //1、检查正确性
                $dbREt =  db()->query("SELECT SecondHalfCheckTB.id FROM SecondHalfCheckTB JOIN FirstHalfCheckTB ON SecondHalfCheckTB.CheckStandardID = FirstHalfCheckTB.id AND 
              SecondHalfCheckTB.IsValid ='YES' AND FirstHalfCheckTB.IsValid = 'YES' WHERE SecondHalfCheckTB.CheckStandardID = ? AND SecondHalfCheckTB.id = ? AND FirstHalfCheckTB.BaseDBID = ?",
                    array($FHID,$SHID,$BaseDBID));
                if(empty($dbREt)){//提交的检查项目不合法
                    $FailedCks_Arr[] = $CkId;
                }else{
                    db()->query("INSERT INTO CheckListDetail(CheckDBID,CheckListID,FirstHalfTBID,SecondHalfTBID,CheckStandSnap,ComplianceStandard,AddTime,
                    ProfessionName,BusinessName,CheckSubject,Code1,Code2,CheckContent,CheckMethods,BasisName,BasisTerm,RelatedCorps,InnerManual,CheckFrequency) 
                    SELECT FirstHalfCheckTB.BaseDBID as CheckDBID,? as CheckListID,FirstHalfCheckTB.id as FirstHalfTBID,SecondHalfCheckTB.id as SecondHalfTBID,FirstHalfCheckTB.CheckStandard as CheckStandSnap,
                    SecondHalfCheckTB.ComplianceStandard as ComplianceStandard,? as AddTime,
                     FirstHalfCheckTB.ProfessionName,FirstHalfCheckTB.BusinessName,FirstHalfCheckTB.CheckSubject,FirstHalfCheckTB.Code1,FirstHalfCheckTB.Code2,FirstHalfCheckTB.CheckContent,
                     SecondHalfCheckTB.CheckMethods,SecondHalfCheckTB.BasisName,SecondHalfCheckTB.BasisTerm,SecondHalfCheckTB.RelatedCorps,SecondHalfCheckTB.InnerManual,SecondHalfCheckTB.CheckFrequency
                     FROM FirstHalfCheckTB JOIN SecondHalfCheckTB  ON SecondHalfCheckTB.CheckStandardID = FirstHalfCheckTB.id AND 
              SecondHalfCheckTB.IsValid ='YES' AND FirstHalfCheckTB.IsValid = 'YES' WHERE SecondHalfCheckTB.CheckStandardID = ? AND SecondHalfCheckTB.id = ? AND FirstHalfCheckTB.BaseDBID = ?",
                    array($CKListId,date('Y-m-d H:i:s'),$FHID,$SHID,$BaseDBID)
                    );
                }
            }

            if(empty($FailedCks_Arr)){
                $Ret['Ret'] = 'Success';
            }else{
                $Ret['Ret'] = 'PartFailed';
            }
            $Ret['FailedCkIds'] = $FailedCks_Arr;

        }

        OUT:
            return json($Ret);
    }

    public function Ajax_DelCheckListRow(){
        $PostData_Arr = json_decode(file_get_contents('php://input'),true);
        $Ret['Ret'] = 'Failed';
        $FailedCks_Arr = array();

        if(empty($PostData_Arr)){
            $Ret['Msg'] = '提交数据为空';
            goto OUT;
        }


        $CKListId = intval($PostData_Arr[0]['CheckListId']);
        $CKStatus = db('CheckList')->where(array('id'=>$CKListId))->select()[0]['Status'];
        if(empty($CKStatus)){
            $Ret['Msg'] = '编号为'.$CKListId.'的检查任务不不存在!';
            goto OUT;
        }
        $CkTask = new CheckTask();
        $CKIntStatus  = $CkTask->CheckTaskIntStatus_Arr[$CKStatus];
        if($CKIntStatus>=$CkTask->CheckTaskIntStatus_Arr[$CkTask->CheckTaskStatus_Arr['CheckListIsDefined']]){
            //检查单已经制定好了
            $Ret['Ret'] = 'Failed';
            $Ret['Msg'] = '检查单已经制定好了';
            goto OUT;
        }

        foreach ($PostData_Arr as $v){
            $CheckListRowId = $v['CheckListRowId'];
            $CkId = $v['CkId'];
            $CheckListId = $v['CheckListId'];
            $Cnt = db('CheckListDetail')->where(array('id'=>$CheckListRowId,'CheckListID'=>$CheckListId))->delete();
            if($Cnt==0){
                $FailedCks_Arr[] = $CkId;
            }
        }

        if(empty($FailedCks_Arr)){
            $Ret['Ret'] = 'Success';
        }else{
            $Ret['Ret'] = 'PartFailed';
        }

    OUT:

        return json($Ret);
    }

    public function Ajax_SetCheckTaskToCheckListIsDefined(){
        $PostData_Arr = json_decode(file_get_contents('php://input'),true);
        $Ret['Ret'] = 'Failed';


        $CKListId = intval($PostData_Arr['CheckListId']);
        $CKStatus = db('CheckList')->where(array('id'=>$CKListId))->select()[0]['Status'];
        if(empty($CKStatus)){
            $Ret['Msg'] = '编号为'.$CKListId.'的检查任务不不存在!';
            goto OUT;
        }
        $CkTask = new CheckTask();
        $CKIntStatus  = $CkTask->CheckTaskIntStatus_Arr[$CKStatus];
        if($CKIntStatus>=$CkTask->CheckTaskIntStatus_Arr[$CkTask->CheckTaskStatus_Arr['CheckListIsDefined']]){
            //检查单已经制定好了
            $Ret['Msg'] = '检查单已经制定好了';
            goto OUT;
        }
        $CkRowCnt = db('CheckListDetail')->field('count(id) as Cnt')->where(array('CheckListID'=>$CKListId))->select()[0]["Cnt"];
        $Cnt_Ret  = db('CheckList')->where(array('id'=>$CKListId))->update(
                                    array('Status'=>$CkTask->CheckTaskStatus_Arr['CheckListIsDefined'],
                                          'CheckRowCnt'=>$CkRowCnt));
        if($Cnt_Ret<1){
            $Ret['Ret'] = 'Failed';
        }else{
            $Ret['Ret'] = 'Success';
        }


        OUT:
            return json($Ret);

    }

    public function Ajax_GetCheckListCompleteStatus(){
        $PostData_Arr = json_decode(file_get_contents('php://input'),true);
        $Ret['Ret'] = 'Failed';

        $CKListId = intval($PostData_Arr['CheckListId']);
        $Ret = db()->query("SELECT id,CheckSubject, case IsOk WHEN 'YES' THEN 'success'
                                     WHEN 'NO' THEN 'danger'  ELSE ' ' END Status
                                    FROM CheckListDetail WHERE CheckListID = ? ORDER BY SecondHalfTBID",array($CKListId));
        $Cnt_CPT = intval(db()->query('SELECT count(id) as cnt FROM CheckListDetail WHERE IsOk IS NOT NULL  AND CheckListID = ?',array($CKListId))[0]['cnt']);
        $Ret_Arr = array('CPT'=>$Cnt_CPT/count($Ret),'Detail'=>$Ret);
        return json($Ret_Arr);

    }

    public function UpdateCheckDetailCheckStand(){
        $Ret = db('CheckListDetail')->select();
        foreach ($Ret as $v) {
            $CheckRowID = $v['id'];
            db()->query('UPDATE CheckListDetail SET CheckStandSnap  = 
                    (SELECT CheckStandard FROM FirstHalfCheckTB WHERE id = ?) WHERE id = ?',array($v['FirstHalfTBID'],$v['id']));
        }
        echo "UpdateCheckDetailCheckStand-->OK!";
    }

    public function UpdateCheckDetailComplianceStandard(){
        $Ret = db('CheckListDetail')->select();
        foreach ($Ret as $v) {
            $CheckRowID = $v['id'];
            db()->query('UPDATE CheckListDetail SET ComplianceStandard  = 
                    (SELECT ComplianceStandard FROM SecondHalfCheckTB WHERE id = ?) WHERE id = ?',array($v['SecondHalfTBID'],$v['id']));
        }
        echo "OK!";
    }

    public function gyFillQuestionSubInfo(){
        $Ret =db()->query("SELECT * FROM CheckListDetail JOIN CheckList ON CheckListDetail.CheckListID = CheckList.id JOIN SecondHalfCheckTB  ON 
   CheckListDetail.SecondHalfTBID = SecondHalfCheckTB.id WHERE DealType ='立即整改'");
        if(!empty($Ret)){
            foreach ($Ret as $v){
               $QsID =  db('TaskList')->field('RelateID')->where(array('id'=>$v['RelatedTaskID']))->select()[0]['RelateID'];
               db('QuestionList')->where(array('id'=>$QsID))->update(array(
                   'QuestionSource'=>$v['CheckSource'],
                   'RelatedCorp'=>$v['DutyCorp'],
                   'Basis'=>$v['Basis'],
                   'Finder'=>$v['Checker'],
                   'DateFound'=>$v['StartTime'],
                   'Basis'=>$v['BasisTerm'].$v['ComplianceStandard']
               ));
               echo 'QsID:'.$QsID.'</br>';
            }
        }
    }

    public function show2019FDZCQsInfo(){
        $Ret = db()->query('SELECT  FirstHalfCheckTB.CheckSubject,
            CheckList.DutyCorp,
            QuestionList.QuestionTitle,
            QuestionList.Basis,
            QuestionList.Finder,
            ReformList.ReformTitle,
            ReformList.CorrectiveAction,
            ReformList.PrecautionAction,
            ReformList.CorrectiveDeadline,
            ReformList.PrecautionDeadline,
            ReformList.ReformStatus,
            QuestionList.id as FromID,
            CheckListDetail.RelatedTaskID
            FROM  
            CheckListDetail JOIN FirstHalfCheckTB ON CheckListDetail.FirstHalfTBID = FirstHalfCheckTB.id JOIN CheckList ON CheckListDetail.CheckListID = CheckList.id  
            JOIN `TaskList` ON  CheckListDetail.RelatedTaskID = TaskList.id  
            JOIN QuestionList ON TaskList.RelateID = QuestionList.id 
            LEFT JOIN IDCrossIndex ON QuestionList.id = IDCrossIndex.FromID 
            JOIN ReformList ON IDCrossIndex.ToID = ReformList.id 
            WHERE CheckListDetail.RelatedTaskID AND CheckListDetail.CheckListID = 30 IS NOT NULL');
        $this->assign('InfoList',$Ret);
        return view('index');
    }

    public  function test(){
        return view('test');
    }

    public function  UpDateCheckListDetail(){
        $CkRows = db('CheckListDetail')->select();
        foreach ($CkRows as $v){
            $SecondHalfTBID = $v['SecondHalfTBID'];
            echo $SecondHalfTBID.'</br>';
            $Ret =db()->query('SELECT * FROM FirstHalfCheckTB JOIN SecondHalfCheckTB on SecondHalfCheckTB.CheckStandardID=FirstHalfCheckTB.id 
                              WHERE SecondHalfCheckTB.id = ?',array($v['SecondHalfTBID']))[0];
            db()->query('UPDATE CheckListDetail SET ProfessionName=?,BusinessName=?,CheckSubject=?,
                                    Code1=?,Code2=?,CheckContent=?,CheckMethods=?,BasisName=?,BasisTerm=?,
                                     RelatedCorps=?,InnerManual=?,CheckFrequency=? WHERE id = ?',array(
                $Ret['ProfessionName'], $Ret['BusinessName'],$Ret['CheckSubject'],$Ret['Code1'],$Ret['Code2'],
                $Ret['CheckContent'],$Ret['CheckMethods'],$Ret['BasisName'],$Ret['BasisTerm'],$Ret['RelatedCorps'],
                $Ret['InnerManual'],$Ret['CheckFrequency'],$v['id']));

        }
    }

    public function showT()
    {
        return view('t');
    }
}
