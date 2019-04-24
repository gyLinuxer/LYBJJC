<?php
namespace app\FlightTimeExp\controller;
use think\Controller;
use think\Db;

class Index  extends Controller
{
    private  $TB_PRE = '[172.16.65.149].jwb.dbo.';
    public function index()
    {
        $this->GetAllModelPlanes();
        $this->lgyQuery();
        OUT:
         return view('index');
    }

    private function AddFHTime($Time1,$Time2){
        $ZS1 = intval($Time1);
        $XS1 = (floatval($Time1)-intval($Time1))/0.6;

        $ZS2 = intval($Time2);
        $XS2 = (floatval($Time2)-intval($Time2))/0.6;

        $Add = $ZS1 + $XS1 + $ZS2 + $XS2 ;
        $Add = ($Add - intval($Add)) * 0.6 + intval($Add);
        return $Add;
    }

    public function  TranArrToJHKey($Arr_IN)
    {
           $data =array();
           if(!empty($Arr_IN)) {
               foreach ($Arr_IN as $v){
                   $data[$v['JH']] = $v;
               }
           }
           return $data;
    }

    public function lgyQuery(){
        $PlaneHid = input('PlaneHid');
        $PlaneHid = explode('|',$PlaneHid);
        $INCase = implode(',',$PlaneHid);
        $StartDate = input('StartDate');
        $EndDate   = input('EndDate');

        if(strtotime($EndDate)<strtotime($StartDate)){
            $this->assign('Waring','结束日期小于开始日期');
            goto OUT;
        }

        $ParamArr = array();
        $ParamArr1 = array();
        if(!empty($EndDate)){
            $rqSql1 = ' AND FT_TB.日期 <=? ';
            $ParamArr[] = $EndDate;
        }

        if(!empty($StartDate)){
            $rqSql2 = ' AND FT_TB.日期 >=? ';
            $ParamArr1[] = $EndDate;
            $ParamArr1[] = $StartDate;

        }

        if(empty($INCase)){
            goto OUT;
        }else{
            $INCase = '('.$INCase.')';
        }

        //翻修后时间等
        $Ret1 = db()->query("SELECT
          ltrim(rtrim(FT_TB.[机型])) as JX,
          FT_TB.[机号] as JH,
          sum(连续起落*0.5 + 复飞起落*0.2+正常起落) as FC_TSO,
          (round(sum(([空中时间]-round([空中时间],0,1))/0.6),0,1) + sum(round(空中时间,0,1)))+(sum(([空中时间]-round([空中时间],0,1))/0.6) - round(sum(([空中时间]-round([空中时间],0,1))/0.6),0,1))*0.6 as FH_TSO,
          (round(sum((地面时间-round(地面时间,0,1))/0.6),0,1) + sum(round(地面时间,0,1)))+(sum((地面时间-round(地面时间,0,1))/0.6) - round(sum((地面时间-round(地面时间,0,1))/0.6),0,1))*0.6 as DMH_TSO,
          sum(正常起落) as ZCQL_TSO
      FROM ".$this->TB_PRE."[flight] as FT_TB join ".$this->TB_PRE."plane as PL_TB on FT_TB.机号 = PL_TB.机号 where FT_TB.机号 in ".$INCase.$rqSql1." AND 日期 >=上次翻修日期   group by FT_TB.[机型],FT_TB.机号,上次翻修日期,自开始空地时间,
          自开始空中时间,
          自开始起落次数
           order by FT_TB.机号",$ParamArr);

        if(!empty($Ret1)){
            foreach ($Ret1 as $k =>$v){
                $Ret1[$k]['FGH_TSO']=$this->AddFHTime($v['DMH_TSO'],$Ret1[$k]['FH_TSO']);
            }
            $Ret1 = $this->TranArrToJHKey($Ret1);
        }

        //查询区间内

        $Ret2 = db()->query("SELECT
          ltrim(rtrim(FT_TB.[机型])) as JX,
          FT_TB.[机号] as JH,
          自开始空中时间 as FH_ZD,
          自开始空地时间 as FGH_ZD,
          自开始起落次数 as QL_ZD,
          sum(连续起落*0.5 + 复飞起落*0.2+正常起落) as FC_INQR,
          (round(sum(([空中时间]-round([空中时间],0,1))/0.6),0,1) + sum(round(空中时间,0,1)))+(sum(([空中时间]-round([空中时间],0,1))/0.6) - round(sum(([空中时间]-round([空中时间],0,1))/0.6),0,1))*0.6 as FH_INTB,
          (round(sum((地面时间-round(地面时间,0,1))/0.6),0,1) + sum(round(地面时间,0,1)))+(sum((地面时间-round(地面时间,0,1))/0.6) - round(sum((地面时间-round(地面时间,0,1))/0.6),0,1))*0.6 as DMH_INTB,
          sum(正常起落) as ZCQL_INTB
      FROM ".$this->TB_PRE."[flight] as FT_TB join ".$this->TB_PRE."plane as PL_TB on FT_TB.机号 = PL_TB.机号 where FT_TB.机号 in ".$INCase.$rqSql1.$rqSql2."   group by FT_TB.[机型],FT_TB.机号,上次翻修日期,自开始空地时间,
          自开始空中时间,
          自开始起落次数 order by FT_TB.机号",$ParamArr1);

        if(!empty($Ret2)){
            foreach ($Ret2 as $k =>$v){
                //将FH_ZD自带飞行小时与FH_INTB相加，得到真正的空中时间
                $Ret2[$k]['FH_INQR'] = $v['FH_INTB'];
                //将FGH_ZD自带飞行小时与自新飞行小时相加，得到真正的空地时间
                $Ret2[$k]['FGH_INQR']=$this->AddFHTime($v['DMH_INTB'],$v['FH_INTB']);
                //将QL_ZD自带起落次数与ZCQL_INTB相加
                $Ret2[$k]['QL_INQR']= $v['ZCQL_INTB'];
            }
            $Ret2 = $this->TranArrToJHKey($Ret2);
        }

       // dump($Ret2);
        //自新的
        $Ret = db()->query("SELECT
          ltrim(rtrim(FT_TB.[机型])) as JX,
          FT_TB.[机号] as JH,
          自开始空中时间 as FH_ZD,
          自开始空地时间 as FGH_ZD,
          自开始起落次数 as QL_ZD,
          sum(连续起落*0.5 + 复飞起落*0.2+正常起落) as FC_INTB,
          (round(sum(([空中时间]-round([空中时间],0,1))/0.6),0,1) + sum(round(空中时间,0,1)))+(sum(([空中时间]-round([空中时间],0,1))/0.6) - round(sum(([空中时间]-round([空中时间],0,1))/0.6),0,1))*0.6 as FH_INTB,
          (round(sum((地面时间-round(地面时间,0,1))/0.6),0,1) + sum(round(地面时间,0,1)))+(sum((地面时间-round(地面时间,0,1))/0.6) - round(sum((地面时间-round(地面时间,0,1))/0.6),0,1))*0.6 as DMH_INTB,
          sum(正常起落) as ZCQL_INTB
      FROM ".$this->TB_PRE."[flight] as FT_TB join ".$this->TB_PRE."plane as PL_TB on FT_TB.机号 = PL_TB.机号 where FT_TB.机号 in ".$INCase.$rqSql1."   group by FT_TB.[机型],FT_TB.机号,上次翻修日期,自开始空地时间,
          自开始空中时间,
          自开始起落次数 order by FT_TB.机号",$ParamArr);

        if(!empty($Ret)){
            $i = 0 ;
            $j = 0 ;
            foreach ($Ret as $k =>$v){
                $JH = $v['JH'];
                //将FH_ZD自带飞行小时与FH_INTB相加，得到真正的空中时间
                $Ret[$k]['FH_TSN']=$this->AddFHTime($v['FH_INTB'],$v['FH_ZD']);
                //将FGH_ZD自带飞行小时与自新飞行小时相加，得到真正的空地时间
                $Ret[$k]['FGH_TSN']=$this->AddFHTime($v['DMH_INTB'],$Ret[$k]['FH_TSN']);
                $Ret[$k]['FGH_TSN']=$this->AddFHTime($v['FGH_ZD'],$Ret[$k]['FGH_TSN']);
                //将QL_ZD自带起落次数与ZCQL_INTB相加
                $Ret[$k]['QL_TSN']=$this->AddFHTime($v['ZCQL_INTB'],$v['QL_ZD']);
                //将循环次数与QL_ZD相加，得到自新循环次数
                $Ret[$k]['FC_TSN']=$this->AddFHTime($v['FC_INTB'],$v['QL_ZD']);

                $Ret[$k]['FH_TSO'] = $Ret1[$JH]['FH_TSO'];
                $Ret[$k]['FGH_TSO'] = $Ret1[$JH]['FGH_TSO'];
                $Ret[$k]['QL_TSO'] = $Ret1[$JH]['ZCQL_TSO'];
                $Ret[$k]['FC_TSO'] = $Ret1[$JH]['FC_TSO'];

                $Ret[$k]['FH_INQR'] = $Ret2[$JH]['FH_INQR'];
                $Ret[$k]['FGH_INQR'] = $Ret2[$JH]['FGH_INQR'];
                $Ret[$k]['QL_INQR'] = $Ret2[$JH]['QL_INQR'];
                $Ret[$k]['FC_INQR'] = $Ret2[$JH]['FC_INQR'];
            }
        }
        

        $this->assign('PlaneInfoList',$Ret);
        OUT:
    }

    public function GetAirPlaneFHInfo($RegNOs){//获取飞机的FH修后FH等数据
        $AirPlane =  db()->query('SELECT * FROM [172.16.65.149].jwb.dbo.plane WHERE 机号=?',array($RegNOs))[0];
       $FX_Date = date('Y-m-d',strtotime($AirPlane['上次翻修日期']));
    }

    public function GetAllModelPlanes(){

        $this->assign("SR20List" ,db()->query("SELECT 机型 ,机号 as JH FROM [172.16.65.149].jwb.dbo.Plane WHERE 机型 = 'SR20'")) ;
        $this->assign("LE500List" ,db()->query("SELECT 机型,机号 as JH FROM [172.16.65.149].jwb.dbo.Plane WHERE 机型 = 'LE500'")) ;
        $this->assign("C172List" ,db()->query("SELECT 机型,机号 as JH FROM [172.16.65.149].jwb.dbo.Plane WHERE 机型 = '172R'")) ;
        $this->assign("PA44List" ,db()->query("SELECT 机型,机号 as JH FROM [172.16.65.149].jwb.dbo.Plane WHERE 机型 = 'PA44'")) ;
        $this->assign("MA600List" ,db()->query("SELECT 机型,机号 as JH FROM [172.16.65.149].jwb.dbo.Plane WHERE 机型 = 'MA600'")) ;

        $this->assign('S20Cnt',1);
        $this->assign('LE500Cnt',1);
        $this->assign('PA44Cnt',1);
        $this->assign('C172Cnt',1);
        $this->assign('MA600Cnt',1);

    }
}
