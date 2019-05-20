<?php
namespace app\safetymng\controller;

use think\Controller;
use think\Db;
use think\Request;

class lgyQuery extends PublicController{
    public function index (){
        $this->assign('QsSourceList',db()->query('SELECT SourceName,CodePre From QuestionSource ORDER BY SourceName'));
        $this->assign('CorpList',db()->query('SELECT * FROM CorpList'));
        $this->assign('UserList',db()->query('SELECT Name,Corp FROM UserList ORDER BY Corp,Name'));
        return view('index');
    }

    public function QsQuery(){
        $SQL = "SELECT * FROM QuestionList  WHERE  1 = 1 ";
        $Param_Arr = array();
        $QsTitle = input('QsTitle');
        $QsSource = input('QsSource');
        $QsInfo = input('QsInfo');
        $Finder = input('Finder');
        $SDate = input('SDate');
        $EDate = input('EDate');
        $QsCorp = input('QsCorp');
        $NodeList = json_decode(input('QsLabelCalc'),true);
        $R = $this->GetSubjectIDsByNodeListAndSubjectTypes($NodeList,'Qs');

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

        if(!empty($NodeList)){//有标签查询条件
            $SQL .= ' AND id IN (?)';
            $Param_Arr[] = $R;
        }

        $Qs_Ret = db()->query($SQL,$Param_Arr);
        dump(db()->getLastSql());
        $this->assign('Qs_Ret',$Qs_Ret);
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
            dump($NodeCode);
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
                  'NodeCode'=>array('IN',$AndJQNodes)
            ))->group('SubjectID')->having('count(distinct NodeCode)='.$AndJQNodeCnt)->select();
        $ANDJQRet = array_column($ANDJQRet,'SubjectID');

        $ORRet = db('LabelCrossIndex')->field('SubjectID')->where(array('SubjectType'=>array('in',$SubjectTypes),'NodeCode'=>array('IN',$ORNodeCodeList)))->select();
        $ORRet = array_column($ORRet,'SubjectID');

        $ANDMHRet = NULL;
        $bStart = false;
        if(!empty($AndMHNodeCodes)){
            foreach ($AndMHNodeCodes as $k=>$v) {
                if(!$bStart){
                    $t_Ret = db('LabelCrossIndex')->field('SubjectID')->where(
                        array('SubjectType'=>array('IN',$SubjectTypes),
                        'NodeCode'=>array('IN',$v)))->select();
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
                            'SubjectID'=>array('IN',$ANDMHRet)))->select();
                    $ANDMHRet = array_column($t_Ret,'SubjectID');
                    //dump(db('LabelCrossIndex')->getLastSql());
                }
            }
        }

        $AndRet  = array_intersect(empty($ANDMHRet)?array():$ANDMHRet,empty($ANDJQRet)?array():$ANDJQRet);
        $Ret = array_merge($AndRet,$ORRet);
        dump($Ret);
        return $Ret;

    }

}