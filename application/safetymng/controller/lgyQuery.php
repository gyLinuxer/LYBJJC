<?php
namespace app\safetymng\controller;

use think\Controller;
use think\Db;
use think\Request;

class lgyQuery extends PublicController{

    private  $CorpMng = NULL;
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->CorpMng = new CorpMng();
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
        $this->assign('CorpList',db()->query('SELECT * FROM CorpList'));
        $this->assign('UserList',$this->CorpMng->GetGroupCorpUserList($this->GetGroupCorp()));
        return view('RFQuery');
    }

    public function RFQuery(){
        return $this->showRFQuery();
    }

}