<?php
namespace app\SafetyMng\controller;
use think\controller;
use think\Db;
use think\Request;

class SysConf extends PublicController
{
    public function index()
    {
        $this->assign("QuestionSourceList",db('questionsource')->select());
        return view('index');
    }
    public function AddQuesionSource()
    {
        $SourceName = input('SouceName');
        $CodePre    = input('CodePre');
        if(empty($SourceName)||empty($CodePre)){
            $this->assign("Warning","请输入问题来源名以及整改通知单编号前缀!");
            goto OUT;
        }

       $Ret =  db()->query("SELECT * FROM QuestionSource WHERE SourceName = ? OR CodePre = ? ",$SourceName,$CodePre);
       if(!empty($Ret)) {
           $this->assign("Warning","问题来源名或整改通知单编号前缀已存在!");
           goto OUT;
       }

       $data["SouceName"] = $SourceName;
       $data["CodePre"]   = $CodePre;
       $data["AddTime"]   = date("Y-m-d H:i:s");
       db("questionsource")->insert($data);

        OUT:
            return $this->index();
    }
}
