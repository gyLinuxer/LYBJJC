<?php
namespace app\safetymng\controller;
use think\Controller;
use think\Db;
use think\Request;
//此模块应该加入禁止访问序列？？
class CorpMng {
    public function index(){

    }

    public function GetCorpInfo($Corp=NULL){
        if(empty($Corp)){
            return NULL;
        }
        $CorpInfo = db('CorpList')->where(array('Corp'=>$Corp))->select()[0];
        return $CorpInfo;
    }

    public function GetAllCorpsInGroupCorp($GroupCorp = NULL){
        if(empty($GroupCorp)){
            return NULL;
        }

        $Ret = db('CorpList')->where(array('GroupCorp'=>$GroupCorp))->select();
        return $Ret;
    }

    public function GetChildrenCorps($Corp){
        $Children= array($Corp);
        $Ret = array($Corp);
        do{
            $t = db('CorpList')->field('Corp')->where(array('ParentCorp'=>array('IN',$Children)))->select();
            $Children = array_column($t,'Corp');
            $Ret = array_merge($Ret,$Children);
        }while(!empty($Children));
        return $Ret;
    }

    public function  GetCorpUserList($Corp){//可以看到子孙部门的所有问题
       $Ret = db('UserList')->join('CorpList','UserList.Corp = CorpList.Corp')->order('UserList.Corp,UserList.Name')->where(array('UserList.Corp'=>array('IN',$this->GetChildrenCorps($Corp))))->select();
       return $Ret;
    }

    public function GetGroupCorpUserList($GroupCorp){
        $Ret = db('UserList')->join('CorpList','UserList.Corp = CorpList.Corp')->where(array('UserList.Corp'=>array('IN',$this->GetChildrenCorps($GroupCorp))))->select();
       return $Ret;
    }

}