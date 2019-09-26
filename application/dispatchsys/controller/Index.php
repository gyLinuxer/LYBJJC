<?php
namespace app\DispatchSYS\controller;

class Index
{
    public function index()
    {
        return view("index");
    }

    public function tt()
    {
        return view("tt");
    }
    public function vant(){
        return view("vant");
    }

    public function element(){
        return view("element");
    }

    public  function Calc(){
        return (1+1)/3.0;
    }

    public function ScoreInput(){

        $Cross = ["s1"=>1,"s2"=>1,"s3"=>1,"s4"=>1,"s5"=>1,"s6"=>1,"s7"=>1];

        $PostData_Arr = json_decode(file_get_contents('php://input'),true);
        $SocreArr = $PostData_Arr['scores'];
        $dName = $PostData_Arr['dName'];

        foreach ($SocreArr as $k=>$v){
            if(empty($v)){
                return $k."不可为空!";
            }
        }


        $Ret = db()->query("SELECT * FROM GroupList WHERE GroupName = ?",[$dName]);



        if(empty($Ret)){
            return "队伍不存在!";
        }

        arsort($SocreArr); //排序

        $i = 0;
        $avgScore = 0.0;
        foreach($SocreArr as $k=>$v){
            $i++;
            if($i==1 || $i==7){
                $Cross[$k] = 0;
            }else{
                $avgScore += floatval($v)/5.0;
            }
        }



        db()->query("INSERT INTO GroupScores(GroupName,Score1,isUsed1,Score2,isUsed2,Score3,
                              isUsed3,Score4,isUsed4,Score5,isUsed5,Score6,isUsed6,Score7,isUsed7,AvgScore) VALUES 
                               (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",[
                                   $dName
            ,$SocreArr["s1"],$Cross["s1"]
            ,$SocreArr["s2"],$Cross["s2"]
            ,$SocreArr["s3"],$Cross["s3"]
            ,$SocreArr["s4"],$Cross["s4"]
            ,$SocreArr["s5"],$Cross["s5"]
            ,$SocreArr["s6"],$Cross["s6"]
            ,$SocreArr["s7"],$Cross["s7"]
            ,$avgScore
        ]);

        db()->query("UPDATE GroupList SET GroupScore =? WHERE GroupName = ?" ,[$avgScore,$dName]);


        return json(db("GroupScores")->order("id DESC")->select());
    }

    function getCurScores(){
        return json(db("GroupScores")->order("id DESC")->select());
    }

    function getGroupList(){
        return json(db("GroupList")->where(["GroupScore"=>["neq",0]])->order("GroupScore DESC")->select());
    }

    function getGroupList1(){
        return json(db("GroupList")->order("GroupName DESC")->select());
    }

    function getJSResult(){
        $Ret = db("GroupList")->order("GroupScore DESC")->limit(7)->select();
        $Arr =[];
        /*if(!empty($Ret) && count($Ret)>=6){
           $Arr["dj1"]=[$Ret[0]["GroupName"]];

           $Arr["dj2"]=[$Ret[1]["GroupName"],$Ret[2]["GroupName"]];

           $Arr["dj3"]=[$Ret[3]["GroupName"],$Ret[4]["GroupName"],$Ret[5]["GroupName"]];

        }*/
        foreach ($Ret as $v){
            $Arr[] = $v['GroupName'];
        }

        return json($Arr);
    }

    function showWelcome(){
        return view("Welcome");
    }

}
