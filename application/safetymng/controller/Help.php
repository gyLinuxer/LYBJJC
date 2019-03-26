<?php
namespace app\safetymng\controller;
/**
 * Created by PhpStorm.
 * User: liguangyao
 * Date: 2018/12/8
 * Time: 20:40
 */
use think\Controller;
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

    public function AddRowToCheckList(){
        $PostData_Arr = json_decode(file_get_contents('php://input'),true);
    }

}
