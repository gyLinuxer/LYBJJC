<?php
namespace app\safetymng\controller;
use think\Controller;
use think\Db;
class CheckTBMng extends PublicController {
    private $PRE = 'lgy19891115';
    public  function index(){
        $this->assign('CheckDB',db('CheckBaseDB')->select());
        return view('index');
    }

    public function RMInputPre($Str){
        if(strpos($Str,$this->PRE)===0){
            return substr($Str,strlen($this->PRE)+1);
        }
        return $Str;
    }

    public function getCheckDBName($CheckDBID){
        return db('CheckBaseDB')->where(array('id'=>$CheckDBID))->select()[0]['BaseName'];
    }

    public function getCheckStandard($id){
        if(!is_numeric($id)){
            return $id;
        }
        return db('FirstHalfCheckTB')->where(array('id'=>$id,'IsValid'=>'YES'))->select()[0]['CheckStandard'];
    }

    public function FirstHalfCheckRowMng($opType = 'Add'){

        $data['BaseDBID']       = $this->RMInputPre(input('CheckDB'));
        $data['ProfessionName'] = $this->RMInputPre(input('ProfessionName'));
        $data['BusinessName']   = $this->RMInputPre(input('BusinessName'));
        $data['Code1']          = $this->RMInputPre(input('Code1'));
        $data['Code2']          = $this->RMInputPre(input('Code2'));
        $data['CheckSubject']   = $this->RMInputPre(input('CheckSubject'));
        $data['CheckContent']   = $this->RMInputPre(input('CheckContent'));
        $data['CheckStandard']  = $this->RMInputPre(input('CheckStandardEdit'));
        $data['AdderName']      = session('Name');
        $data['AddTime']        = date('Y-m-d H:i:s');
        $data['IsValid']        = 'YES';
        $MustNotBeEmptyKeys = ['ProfessionName','BusinessName','CheckStandard'];
        foreach ($MustNotBeEmptyKeys as $k){
            if(empty($data[$k])){
                $this->assign('Warning',$k.'不可为空!');
                goto OUT;
            }
        }


        if($opType=='Add'){
            $Ret = db('FirstHalfCheckTB')->where($data)->select();
            if(!empty($Ret)){
                $this->assign('Warning','该条款已经存在!') ;
            }else{
                $data['OldID']        = 0;
                $id = db('FirstHalfCheckTB')->insertGetId($data);
                if($id>0){
                    $t_data['StandardID'] = $id;
                    db('FirstHalfCheckTB')->where(['id'=>$id])->update($t_data);
                    $this->assign('Warning','添加成功！') ;
                }else{
                    $this->assign('Warning','添加失败！!') ;
                }
            }
        }else{//Mdf修改条款
            $oldId = input("rowId");
            if(empty($oldId)){
                $this->assign('Warning','未选择条款');
                goto OUT;
            }

            //检查修改过的条款是否已经存在
            $Ret = db('FirstHalfCheckTB')->where($data)->select();

            if(!empty($Ret)){
                $this->assign('Warning','该条款已经存在!') ;
                goto OUT;
            }
            $oldRow = db('FirstHalfCheckTB')->where(['StandardID'=>$oldId,"IsValid"=>"YES"])->find();
            $Ret = db('FirstHalfCheckTB')->where(['StandardID'=>$oldId,"IsValid"=>"YES"])->setField('IsValid', 'NO');
            if(empty($Ret)){
                $this->assign('Warning','删除旧条款失败');
                goto OUT;
            }else{
                $data['OldID']        = $oldId;
                $data['StandardID']   = $oldRow['StandardID'];
                $id = db('FirstHalfCheckTB')->insertGetId($data);
                $this->assign('Warning','条款修改成功!');
                goto OUT;
            }

        }

        OUT:
            return $this->showFirstHalfCheckRowMng();
    }

    public function showFirstHalfCheckRowMng($opType = 'Add',$id=0){

        if($opType=='Mdf'){//通知前端
            $this->assign('NeedInitAllSelect','YES');
        }else{
            $this->assign('NeedInitAllSelect','NO');
        }

        $this->assign('id',$id);
        $this->assign('opType',$opType);
        $this->assign('CheckDB',db('CheckBaseDB')->select());
        return view('FirstHalfCheckRowMng');
    }

    public function SecondHalfCheckRowMng($opType = 'Add',$CheckStandardID=0,$id=0){

        $RelatedCorps_Arr = input('post.RelatedCorps/a');
        $RelatedCorps = '';
        if(!empty($RelatedCorps_Arr)){
            foreach ($RelatedCorps_Arr as $v){
                if(empty($RelatedCorps)){
                    $RelatedCorps= $v;
                }else{
                    $RelatedCorps.='|'.$v;
                }
            }
        }

        $CheckMethods_Arr = input('post.CheckMethods/a');
        $CheckMethods = '';
        if(!empty($CheckMethods_Arr)){
            foreach ($CheckMethods_Arr as $v){
                if(empty($CheckMethods)){
                    $CheckMethods = $v;
                }else{
                    $CheckMethods.='|'.$v;
                }
            }
        }

        $data['CheckStandardID'] = input('CheckStandardID');
        $data['ComplianceStandard'] = input('ComplianceStandard');
        $data['BasisName'] = input('BasisName');
        $data['BasisTerm'] = input('BasisTerm');
        $data['RelatedCorps'] = $RelatedCorps;
        $data['CheckMethods'] = $CheckMethods;
        $data['CheckFrequency'] = input('CheckFrequency');
        $data['InnerManual'] = input('InnerManual');
        $data['AdderName'] = session('Name');
        $data['AddTime'] = date('Y-m-d H:i:s');
        $data['IsValid'] = 'YES';

        $MustNotBeEmptyKeys = ['ComplianceStandard','CheckStandardID'];

        foreach ($MustNotBeEmptyKeys as $k){
            if(empty($data[$k])){
                $this->assign('Warning',$k.'不可为空!');
                goto OUT;
            }
        }

        $Ret = db('FirstHalfCheckTB')->where(array('StandardID'=>$CheckStandardID,'IsValid'=>'YES'))->select();
        if(empty($Ret)){
            $this->assign('Warning','检查标准不存在!');
            goto OUT;
        }

        if($opType=='Add'){
            $id = db('SecondHalfCheckTB')->insertGetId($data);
            if(empty($id)){
                $this->assign('Warning','添加失败!');
                goto OUT;
            }else{
                $this->assign('Warning','添加成功!!');
                goto OUT;
            }
        }else if($opType=='Mdf'){
            $Cnt = db('SecondHalfCheckTB')->where(array('id'=>$id,'IsValid'=>'YES'))->setField('IsValid','NO');
            if(empty($Cnt)){
                $this->assign('Warning','符合性判定标准不存在!');
                goto OUT;
            }
            $data['OldID'] = $id;
            $id  =  db('SecondHalfCheckTB')->insertGetId($data);
            if(empty($id)){
                $this->assign('Warning','添加符合性判定标准失败!');
                goto OUT;
            }else{
                $this->assign('Warning','添加符合性判定标准成功!!!');
            }
        }

        OUT:
            return $this->showSecondHalfCheckRowMng($opType,$CheckStandardID,$id);

    }

    public function showSecondHalfCheckRowMng($opType = 'Add',$CheckStandardID=0,$id=0){
        if(empty($CheckStandardID)){
            $this->assign('Warning','没有选择检查标准!');
            goto OUT;
        }

        $Ret = db('FirstHalfCheckTB')->where(array('StandardID'=>$CheckStandardID,'IsValid'=>'YES'))->select()[0];
        if(empty($Ret)){
            $this->assign('Warning','检查标准不存在!');
            goto OUT;
        }else{
            $this->assign('CheckStandard',$Ret['CheckStandard']);
        }

        if(!empty($id)){
            $Ret = db()->query("SELECT * FROM SecondHalfCheckTB  WHERE id=? AND IsValid='YES' ",array($id));
            $this->assign('ComplianceStandardRow',$Ret[0]);
            $this->assign('CheckMethods',json_encode(explode('|',$Ret[0]['CheckMethods'])));
            $this->assign('RelatedCorps',json_encode(explode('|',$Ret[0]['RelatedCorps'])));
        }

        $this->assign('CheckStandardID',$CheckStandardID);
        $this->assign('opType',$opType);
        $this->assign('id',$id);
        $this->assign('CorpList',$this->GetCorpList());

        OUT:
            return view('SecondHalfCheckRowMng');
    }

    public function showCheckRowQuery(){
        $rowData = $this->CheckRowQuery();
        $this->assign('SecondCheckRowList',$rowData);
        return $this->index();
    }


    public function CheckRowQuery()
    {
        $data['BaseDBName']       =  "%".input('CheckDB')."%";
        $data['ProfessionName'] = "%".$this->RMInputPre(input('ProfessionName'))."%";
        $data['BusinessName']   = "%".$this->RMInputPre(input('BusinessName'))."%";
        $data['Code1']          = "%".$this->RMInputPre(input('Code1'))."%";
        $data['Code2']          = "%".$this->RMInputPre(input('Code2'))."%";
        $data['CheckSubject']   = "%".$this->RMInputPre(input('CheckSubject'))."%";
        $data['CheckContent']   = "%".$this->RMInputPre(input('CheckContent'))."%";
        $data['CheckStandard']  = "%".$this->RMInputPre(input('CheckStandard'))."%";


        $SQL =  " SELECT SecondHalfCheckTB.*,
                        FirstHalfCheckTB.BaseDBID,
                        FirstHalfCheckTB.ProfessionName,
                        FirstHalfCheckTB.BusinessName,
                        FirstHalfCheckTB.Code1,
                        FirstHalfCheckTB.Code2,
                        FirstHalfCheckTB.CheckSubject,
                        FirstHalfCheckTB.CheckContent,
                        FirstHalfCheckTB.StandardID,
                        FirstHalfCheckTB.id as CheckStandardRowID,
                        FirstHalfCheckTB.CheckStandard FROM SecondHalfCheckTB JOIN FirstHalfCheckTB ON 
                        SecondHalfCheckTB.CheckStandardID = FirstHalfCheckTB.StandardID JOIN CheckBaseDB on CheckBaseDB.id=FirstHalfCheckTB.BaseDBID WHERE 
                        CheckBaseDB.BaseName LIKE ? AND 
                        FirstHalfCheckTB.ProfessionName like ? AND 
                        FirstHalfCheckTB.BusinessName LIKE ? AND 
                        FirstHalfCheckTB.Code1 LIKE ? AND 
                        FirstHalfCheckTB.Code2 LIKE ? AND 
                        FirstHalfCheckTB.CheckSubject LIKE ? AND 
                        FirstHalfCheckTB.CheckContent LIKE ? AND 
                        FirstHalfCheckTB.CheckStandard LIKE ? AND 
                        FirstHalfCheckTB.IsValid = 'YES' AND 
                        SecondHalfCheckTB.IsValid = 'YES' ORDER BY BaseDBID,ProfessionName,CheckSubject,Code1,Code2,CheckContent,FirstHalfCheckTB.CheckStandard
                        ";



        $this->assign('RelatedCorps',json_encode(input('RelatedCorps/a'),JSON_UNESCAPED_UNICODE));

        //return db()->query($SQL,array(1,2,3,4,5,6,7));

        return  db()->query($SQL,array($data['BaseDBName'],$data['ProfessionName'],
                                      $data['BusinessName'],$data['Code1'],
                                      $data['Code2'],$data['CheckSubject'],
                                      $data['CheckContent'],$data['CheckStandard']));
        //dump(db()->getLastSql());
      // return $this->index();
    }

}