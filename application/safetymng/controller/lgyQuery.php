<?php
namespace app\safetymng\controller;

use think\Controller;
use think\Db;
use think\Request;

class lgyQuery extends PublicController{

    private  $CorpMng = NULL;
    private  $RF = NULL;
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->CorpMng = new CorpMng();
        $this->RF = new Reform();
    }

    public function index (){
        $this->assign('QsSourceList',db()->query('SELECT SourceName,CodePre From QuestionSource ORDER BY SourceName'));
        $this->assign('CorpList',db()->query('SELECT * FROM CorpList'));
        $this->assign('UserList',db()->query('SELECT Name,Corp FROM UserList ORDER BY Corp,Name'));
        return view('index');
    }

    public function QsQuery(){
        $SQL = "SELECT id FROM QuestionList  WHERE  1 = 1 ";
        $Param_Arr = array();
        $QsTitle = input('QsTitle');
        $QsSource = input('QsSource');
        $QsInfo = input('QsInfo');
        $Finder = input('Finder');
        $SDate = input('SDate');
        $EDate = input('EDate');
        $QsCorp = input('QsCorp');
        $NodeList = json_decode(input('QsLabelCalc'),true);
        $Ids = $this->GetSubjectIDsByNodeListAndSubjectTypes($NodeList,'Qs');

        if(!empty($NodeList) && empty($Ids)){
            //有标签筛选条件,但是筛选结果为空
            goto OUT;
        }

        if(!empty($QsTitle)){
            $SQL .= ' AND QuestionTitle Like ?';
            $Param_Arr[] = '%'.$QsTitle.'%';
        }

        if(!empty($QsSource)){
            $SQL .= ' AND QuestionSource Like ?';
            $Param_Arr[] = '%'.$QsSource.'%';
        }

        if(!empty($QsInfo)){
            $SQL .= ' AND QuestionInfo Like ?';
            $Param_Arr[] = '%'.$QsInfo.'%';
        }

        if(!empty($Finder)){
            $SQL .= ' AND Finder Like ?';
            $Param_Arr[] = '%'.$Finder.'%';
        }

        if(!empty($QsCorp)){
            $SQL .= ' AND RelatedCorp Like ?';
            $Param_Arr[] = '%'.$QsCorp.'%';
        }

        if(!empty($SDate)){
            $SQL .= ' AND DateFound >= ?';
            $Param_Arr[] = $SDate;
        }

        if(!empty($EDate)){
            $SQL .= ' AND DateFound <= ?';
            $Param_Arr[] = $EDate;
        }

        $Qs_Ret = db()->query($SQL,$Param_Arr);
        $Qs_Ret = array_column($Qs_Ret,'id');
        if(!empty($NodeList)){
            $Qs_Ret = array_intersect($Ids,$Qs_Ret);
        }

        $Ret = db('QuestionList')->where(array('id'=>array('IN',$Qs_Ret)))->select();
        $this->assign('QsLabelCalc',json_decode(json_encode(input('QsLabelCalc'))));
        $this->assign('Qs_Ret',$Ret);

        OUT:
            return $this->index();
    }
    //NodeList--->[{NodeCode:'',NodeName:'',MatchType:0/1,CalcType:0/1,TreeCode:,TreeName:}]
    function splitNodeCode($NodeCode){
        $len = strlen($NodeCode);

        if( $len % 4 != 0 ){//长度不是4的整数倍，有问题。
           return "('')";
        }

        $Ret =  array();
        for($i=0;$i<$len/4;$i++){
            $Ret[] = substr($NodeCode,0,$len-$i*4);
        }

        return $Ret;
    }
    function GetSubjectIDsByNodeListAndSubjectTypes($NodeList,$SubjectTypes){
        if(empty($NodeList)){
            return '';
        }

        $ORNodeCodeList = array();
        $AndMHNodeCodes = array();
        $AndJQNodeCnt = 0;
        $AndJQNodes = array();

        foreach ($NodeList as $k=>$v){
            $NodeCode = $v['NodeCode'];
            //dump($NodeCode);
           if($v['CalcType']==1){//或
               if($v['MatchType']==1){
                   $ORNodeCodeList[] = $NodeCode;
               }else{
                   $ORNodeCodeList = array_merge($ORNodeCodeList,$this->splitNodeCode($NodeCode));
               }
           }else{//且
               if($v['MatchType']==1){//精确匹配
                   $AndJQNodes[] = $NodeCode;
                   $AndJQNodeCnt++;
               }else{//模糊匹配，几下所有NodeCode;
                   $AndMHNodeCodes[] = $this->splitNodeCode($NodeCode);
               }
           }
        }

        $ANDJQRet = db('LabelCrossIndex')->field('SubjectID')->where(
            array('SubjectType'=>array('IN',$SubjectTypes),
                  'NodeCode'=>array('IN',$AndJQNodes),
                  'IsValid'=>'YES'
            ))->group('SubjectID')->having('count(distinct NodeCode)='.$AndJQNodeCnt)->select();
        $ANDJQRet = array_column($ANDJQRet,'SubjectID');

        $ORRet = db('LabelCrossIndex')->field('SubjectID')->where(
            array('SubjectType'=>array('in',$SubjectTypes),
                'NodeCode'=>array('IN',$ORNodeCodeList),
                'IsValid'=>'YES'))->select();
        $ORRet = array_column($ORRet,'SubjectID');

        $ANDMHRet = NULL;
        $bStart = false;
        if(!empty($AndMHNodeCodes)){
            foreach ($AndMHNodeCodes as $k=>$v) {
                if(!$bStart){
                    $t_Ret = db('LabelCrossIndex')->field('SubjectID')->where(
                        array('SubjectType'=>array('IN',$SubjectTypes),
                            'NodeCode'=>array('IN',$v),
                            'IsValid'=>'YES'))->select();
                    $ANDMHRet = array_column($t_Ret,'SubjectID');
                    $bStart = true;
                   // dump(db('LabelCrossIndex')->getLastSql());
                }else{
                    if(empty($ANDMHRet)){//已经没有符合条件的SubjectID了
                        break;
                    }
                    $t_Ret = db('LabelCrossIndex')->field('SubjectID')->where(
                        array('SubjectType'=>array('IN',$SubjectTypes),
                            'NodeCode'=>array('IN',$v),
                            'SubjectID'=>array('IN',$ANDMHRet),
                            'IsValid'=>'YES'))->select();
                    $ANDMHRet = array_column($t_Ret,'SubjectID');
                   // dump(db('LabelCrossIndex')->getLastSql());
                }
            }
        }

        //dump($ANDMHRet);

        $AndRet  = array_intersect(empty($ANDMHRet)?$ANDJQRet:$ANDMHRet,empty($ANDJQRet)?$ANDMHRet:$ANDJQRet);
        $Ret = array_merge($AndRet,$ORRet);
       // dump("GetSubjectIDsByNodeListAndSubjectTypes".'Ret');
       // dump($Ret);
        return $Ret;

    }

    public function showRFQuery(){
        $this->assign('RFSourceList',db()->query('SELECT SourceName,CodePre From QuestionSource ORDER BY SourceName'));
        $this->assign('CorpList',$this->CorpMng->GetAllCorpsInGroupCorp($this->GetGroupCorp()));
        $this->assign('UserList',$this->CorpMng->GetGroupCorpUserList($this->GetGroupCorp()));
        $this->assign('RFStatusList',array_keys($this->RF->ReformStatus_AssginArr));
        return view('RFQuery');
    }

    public function RFQuery(){

     // dump(input());

        $IN_Keys =array('RFSource'=>                    ['eq','QuestionSourceName'],
                        'DutyCorp'=>                    ['eq','DutyCorp'],
                        'RFTitle'=>                     ['like','ReformTitle'],
                        'RFStatus'=>                    ['eq','ReformStatus'],
                        'RFCode'=>                      ['like','Code'],
                        'Inspector'=>                   ['like','Inspectors'],
                        'NonConfirmDesc'=>              ['like','NonConfirmDesc'],
                        'Basis'=>                       ['like','Basis'],
                        'IssueCorp'=>                   ['eq','IssueCorp'],
                        'CurDealCorp'=>                 ['eq','CurDealCorp'],
                        'RFRequire'=>                   ['like','ReformRequirement'],
                        'CorrectAction'=>               ['like','CorrectiveAction'],
                        'PrecautionAction'=>            ['like','PrecautionAction'],
                        'ActionMaker'=>                 ['eq','ActionMakerName'],
                        'ActionEvalerName'=>                ['eq','ActionEvalerName'],
                        'ActionIsOK'=>                  ['eq_any','ActionIsOK'],
                        'CorrectActionProofIsOK'=>      ['eq_any','CorrectiveActionProofEvalIsOK'],
                        'CorrectActionEvaler'=>         ['eq','CorrectiveActionProofEvalerName'],
                        'PrecautionActionProofIsOK'=>   ['eq_any','PrecautionActionProofEvalIsOK'],
                        'PrecautionActionEvaler'=>      ['eq','PrecautionActionProofEvalerName'],
                        'CheckStartDate'=>              ['egt','CheckDate'],
                        'CheckEndDate'=>                ['elt','CheckDate'],
                        'FeedBackBeyond'=>              ['exp','ActionMakeTime',' >= RequestFeedBackDate '],
                        'CorrectBeyond'=>               ['exp','CorrectiveActionProofUploadTime',' >=CorrectiveDeadline '],
                        'PrecautionBeyond'=>            ['exp','PrecautionActionProofUploadTime',' >=PrecautionDeadline '],
                        'WhichRoleMakeAction'=>         input('WhichRoleMakeAction')=='ANY'?NULL:['eq','RequireDefineAction'],
                        'ActionIsMaked'=>               input('ActionIsMaked')=='ANY'? NULL: (input('ActionIsMaked')=='YES'? ['exp','CorrectiveAction',' IS NOT NULL']:['exp','CorrectiveAction',' IS NULL']),
                        'CorrectDeadLineStartDate'=>    ['egt','CorrectiveDeadline'],
                        'CorrectDeadLineEndDate'=>      ['elt','CorrectiveDeadline'],
                        'PrecautionDeadLineStartDate'=> ['egt','CorrectiveDeadline'],
                        'PrecautionDeadLineEndDate'=>   ['elt','CorrectiveDeadline'],
                        'ActionMakeStartDate'=>         ['egt','ActionMakeTime'],
                        'ActionMakeEndDate'=>           ['elt','ActionMakeTime'],
                        'ActionEvalStartDate'=>         ['glt','ActionEvalTime'],
                        'ActionEvalEndDate'=>           ['elt','ActionEvalTime'],
                        'RequireFeedBackStartDate'=>    ['egt','RequestFeedBackDate'],
                        'RequireFeedBackEndDate'=>      ['elt','RequestFeedBackDate'],
                        'CorrectActionProofIsUpload'=>              input('CorrectActionProofIsUpload')=='ANY'? NULL: (input('CorrectActionProofIsUpload')=='YES'? ['exp','CorrectiveActionProof',' IS NOT NULL']:['exp','CorrectiveActionProof',' IS NULL']),
                        'CorrectActionProofUploadStartDate'=>       ['egt','CorrectiveActionProofUploadTime'],
                        'CorrectActionProofUploadEndDate'=>         ['elt','CorrectiveActionProofUploadTime'],
                        'CorrectActionProofEvalStartDate'=>         ['egt','CorrectiveActionProofEvalTime'],
                        'CorrectActionProofEvalEndDate'=>           ['elt','CorrectiveActionProofEvalTime'],
                        'PrecautionActionProofIsUpload'=>           input('PrecautionActionProofIsUpload')=='ANY'? NULL: (input('PrecautionActionProofIsUpload')=='YES'? ['exp','PrecautionActionProof',' IS NOT NULL']:['exp','PrecautionActionProof',' IS NULL']),
                        'PrecautionActionUploadStartDate'=>         ['egt','PrecautionActionProofUploadTime'],
                        'PrecautionActionUploadEndDate'=>           ['elt','PrecautionActionProofUploadTime'],
                        'PrecautionActionProofEvalStartDate'=>      ['egt','PrecautionActionProofEvalTime'],
                        'PrecautionActionProofEvalEndDate'=>        ['elt','PrecautionActionProofEvalTime'],
        );

        $ActionEvalDateCP = trim(input('ActionEvalDateCP'));
        $ActionEvalDays   = trim(input('ActionEvalDays'));
        if(!empty($ActionEvalDateCP) && !empty($ActionEvalDays)){
            $IN_Keys['ActionEvalDateCP']= ['exp',''," TIMESTAMPDIFF(DAY,ActionMakeTime,ActionEvalTime)".($ActionEvalDateCP=='LT'?"<=":">=").intval($ActionEvalDays)];
        }

        $CorrectActionProofEvalCP = trim(input('CorrectActionProofEvalCP'));
        $CorrectActionProofEvalDays   = trim(input('CorrectActionProofEvalDays'));
        if(!empty($CorrectActionProofEvalCP) && !empty($CorrectActionProofEvalDays)){
            $IN_Keys['CorrectActionProofEvalCP']= ['exp',''," TIMESTAMPDIFF(DAY,CorrectiveActionProofUploadTime,CorrectiveActionProofEvalTime)".($CorrectActionProofEvalCP=='LT'?"<=":">=").intval($CorrectActionProofEvalDays)];
        }


        $PrecautionActionProofEvalCP = trim(input('PrecautionActionProofEvalCP'));
        $PrecautionActionProofEvalDays  = trim(input('PrecautionActionProofEvalDays'));
        if(!empty($PrecautionActionProofEvalCP) && !empty($PrecautionActionProofEvalDays)){
            $IN_Keys['PrecautionActionProofEvalCP']= ['exp',''," TIMESTAMPDIFF(DAY,PrecautionActionProofUploadTime,PrecautionActionProofEvalTime)".($PrecautionActionProofEvalCP=='LT'?"<=":">=").intval($PrecautionActionProofEvalDays)];
        }

        /*
         *        ->eq 相等
         *        ->like 相似
         *        ->eq_any 如果值为any则忽略,否则等同于eq
         *        ->egt  字段 >= 输入
         *        ->elt  字段 >= 输入
         *        raw_arr->数组作为查询输入
         *        exp->sql表达式
         * */
        $where['isDeleted'] = '否';
        foreach ($IN_Keys as $k =>$v){
            $T = trim(input($k));
            if(!empty($T)){
                    switch ($v[0]){
                        case 'eq':{
                            $where[$v[1]]=['eq',$T];
                            break;
                        }
                        case 'like':{
                            $where[$v[1]]=['like','%'.$T.'%'];
                            break;
                        }
                        case 'eq_any':{
                            if($T!='ANY'){
                                $where[$v[1]]=['eq',$T];
                            }
                            break;
                        }
                        case 'egt':{
                            if($T!='ANY'){
                                $where[$v[1]]=['egt',$T];
                            }
                            break;
                        }
                        case 'elt':{
                            if($T!='ANY'){
                                $where[$v[1]]=['elt',$T];
                            }
                            break;
                        }
                        case 'raw_arr':{
                            $where[$v[1]]=$v;
                            break;
                        }
                        case 'exp':{
                            $where[$v[1]]=['exp',Db::raw($v[2])];
                            break;
                        }
                }}
        }

        $Ret = db('ReformList')->where($where)->select();
        dump(db()->getLastSql());
       $this->assign('ReformList',$Ret);



        return $this->showRFQuery();
    }

}