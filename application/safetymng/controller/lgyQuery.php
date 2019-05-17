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
        $this->assign('Qs_Ret',$Qs_Ret);
        return $this->index();
    }
}