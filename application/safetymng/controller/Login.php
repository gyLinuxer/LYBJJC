<?php
/**
 * Created by PhpStorm.
 * User: liguangyao
 * Date: 2018/12/4
 * Time: 20:31
 */
namespace app\safetymng\controller;
use think\Controller;
use think\Db;
use think\Log;
class  Login extends Controller{

    function IS_Mobile(){
        $regex_match="/(nokia|iphone|ipad|micromsg|android|motorola|^mot\-|softbank|foma|docomo|kddi|up\.browser|up\.link|";
        $regex_match.="htc|dopod|blazer|netfront|helio|hosin|huawei|novarra|CoolPad|webos|techfaith|palmsource|";
        $regex_match.="blackberry|alcatel|amoi|ktouch|nexian|samsung|^sam\-|s[cg]h|^lge|ericsson|philips|sagem|wellcom|bunjalloo|maui|";
        $regex_match.="symbian|smartphone|midp|wap|phone|windows ce|iemobile|^spice|^bird|^zte\-|longcos|pantech|gionee|^sie\-|portalmmm|";
        $regex_match.="jig\s browser|hiptop|^ucweb|^benq|haier|^lct|opera\s*mobi|opera\*mini|320x320|240x320|176x220";
        $regex_match.=")/i";
        return isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE']) or preg_match($regex_match, strtolower($_SERVER['HTTP_USER_AGENT']));
    }

    public function  GetSysNameByServerIP(){
        $Ret = db('SysConf')->where(array('KeyType'=>'SysName','KeyName'=>$_SERVER['SERVER_ADDR']))->select()[0];
        if(empty($Ret)){
            return '安全管理系统';
        }else{
            return $Ret['KeyValue'];
        }
    }

    public function index()
    {
        $Name = session("Name");
        $this->assign('SysName',$this->GetSysNameByServerIP());
        if(!empty($Name)){
            if($this->IS_Mobile()){
                $this->redirect(url("/SafetyMng/MyRelatedQuestion"));
            }
            $this->redirect(url("/SafetyMng/TaskList/showQuestionList"));
            return;
        }
        if($this->IS_Mobile()){
            return view('index1');
        }
        return view('index1');
    }
    public  function Login()
    {
        $UserName = input('aU');
        $Pwd = input('bP');
        if(empty($UserName) || empty($Pwd)){
            //$this->assign('Warning','')；
            goto OUT;
        }
        $Ret = db()->query("SELECT * FROM UserList WHERE LOWER(UserName) = ? AND LOWER(Pwd) = ?",array(strtolower($UserName),strtolower($Pwd)));
        if(empty($Ret)){
            $this->assign("Warning","用户名或者密码错误！");
            Log::write('登陆失败:'.$UserName.'---->'.$Pwd."-->".date('Y-m-d H:i:s'),'zk2000');
        }else{
            $CorpMng = new CorpMng();
            $CorpInfo = $CorpMng->GetCorpInfo($Ret[0]["Corp"]);
            if(empty($CorpInfo)){
                $this->assign("Warning","获取部门相关信息失败!");
                Log::write('登陆失败:'.$UserName.$Ret[0]["Corp"].'获取部门相关信息失败!','zk2000');
                goto OUT;
            }
            session("CorpInfo",$CorpInfo);
            session("Corp",$Ret[0]["Corp"]);
            session("Name",$Ret[0]["Name"]);
            session("CorpRole",$Ret[0]["CorpRole"]);

            Log::write('登陆成功:'.$Ret[0]["Name"].':'.date('Y-m-d H:i:s'),'zk2000');
            if($this->IS_Mobile()){
                $this->redirect(url("/SafetyMng/MyRelatedQuestion"));
            }
            $this->redirect(url("/SafetyMng/TaskList/showQuestionList"));
        }
        OUT :
            return $this->index();
    }

    public function ExitSYS()
    {
        session("Corp",NULL);
        session("Name",NULL);
        session("CorpRole",NULL);
        return $this->index();
    }
}
