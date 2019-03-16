<?php
namespace app\safetymng\controller;
use think\Controller;
use think\Db;
use think\Request;

class PublicController extends  Controller{

        public  $SuperCorp = "质检科";

        public function __construct(Request $request = null)
        {
            parent::__construct($request);
            $this->IS_Mobile();
            if(is_null(session("Name"))){
                $this->redirect('SafetyMng/Login/Index');
            }
        }

        function IS_Mobile(){
            $regex_match="/(nokia|iphone|ipad|micromsg|android|motorola|^mot\-|softbank|foma|docomo|kddi|up\.browser|up\.link|";
            $regex_match.="htc|dopod|blazer|netfront|helio|hosin|huawei|novarra|CoolPad|webos|techfaith|palmsource|";
            $regex_match.="blackberry|alcatel|amoi|ktouch|nexian|samsung|^sam\-|s[cg]h|^lge|ericsson|philips|sagem|wellcom|bunjalloo|maui|";
            $regex_match.="symbian|smartphone|midp|wap|phone|windows ce|iemobile|^spice|^bird|^zte\-|longcos|pantech|gionee|^sie\-|portalmmm|";
            $regex_match.="jig\s browser|hiptop|^ucweb|^benq|haier|^lct|opera\s*mobi|opera\*mini|320x320|240x320|176x220";
            $regex_match.=")/i";
            $IS =  isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE']) or preg_match($regex_match, strtolower($_SERVER['HTTP_USER_AGENT']));
            if($IS){
                $this->assign("CurPlatform","Mobile");
            }
            return $IS;
        }
}
