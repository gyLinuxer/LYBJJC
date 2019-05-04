<?php
/**
 * Created by PhpStorm.
 * User: liguangyao
 * Date: 2019/4/30
 * Time: 07:06
 */
namespace app\safetymng\controller;
use think\Controller;
use think\Db;
use think\Request;
class TreeMng extends PublicController{
    public function index(){

        $this->assign('TreeList',db()->query("SELECT * FROM Trees WHERE  ParentNodeCode = '0' AND IsDeleted = '否'"));
        return view('index');
    }

    public function  GetValidNodeCode($ParentNodeCode){
        if($ParentNodeCode==''){
            return '';
        }
        //检查父节点是否存在
        if($ParentNodeCode!='0'){//不是添加根节点
            $Ret = db('Trees')->where(array('NodeCode'=>$ParentNodeCode))->select();
            if(empty($Ret)){
                return '';
            }
        }

        //查看该父节点下子节点个数
        $Ret =  db('Trees')->where(array('ParentNodeCode'=>$ParentNodeCode
        ))->select();

        $Cnt = count($Ret);
        do{//检查节点编号重复
            $Code = $ParentNodeCode.sprintf('%04d',$Cnt);
            $Ret = db('Trees')->where(array('NodeCode'=>$Code))->select();
            $Cnt++;
        }while(!empty($Ret));

        return $Code;
    }
    //增加子节点
    public function AddTreeNode(){
        $PostData_Arr = json_decode(file_get_contents('php://input'),true);
        $ParentCode = $PostData_Arr['ParentCode'];
        $NodeName = $PostData_Arr['NewNodeName'];
        $Ret['Ret'] = 'Failed';

        if(empty($NodeName)){
            $Ret['msg']  = '节点名称不可为空!';
            goto OUT;
        }

        $db_Ret = db()->query('SELECT * FROM Trees WHERE NodeCode = ? ',array($ParentCode));
        if(empty($db_Ret)){
            $Ret['msg']  = '父节点不存在!';
            goto OUT;
        }

        $ParentNode_Ret = db()->query('SELECT * FROM Trees WHERE NodeCode = ? ',array($ParentCode));
        $db_Ret = db()->query('SELECT * FROM Trees WHERE ParentNodeCode = ? AND NodeName=? ',array($ParentCode,$NodeName));
        if(!empty($db_Ret)){//如果有同名节点，则看其是否应被删除
            if($db_Ret[0]['isDeleted']=='是'){//重新启用被删除掉的节点
                //反删除
                db()->query("UPDATE Trees SET UsedCnt=UsedCnt+1,isDeleted ='否',AdderName=?,AddTime=? WHERE NodeCode = ?",
                    array(session('Name'),date('Y-m-d H:i:s'),$db_Ret[0]['NodeCode']));
                $Ret['Ret'] = 'success';
                $Ret['NodeCode'] = $db_Ret[0]['NodeCode'];
                $Ret['ParentNodeCode'] = $db_Ret[0]['ParentNodeCode'];
                $Ret['NodeName'] = $db_Ret[0]['NodeName'];

            }else{//节点名称重复
                $Ret['msg']  = '该节点名已经存在!';
                goto OUT;
            }
        }else{//节点名不存在
            if(empty($ParentNode_Ret)){//父节点不存在!
                $Ret['msg']  = '父节点不存在!';
                goto  OUT;
            }
            $NewNodeCode = $this->GetValidNodeCode($ParentCode);
            $data =array();
            $data['NodeName'] = $NodeName;
            $data['NodeCode'] = $NewNodeCode;
            $data['ParentNodeCode'] = $ParentCode;
            $data['TreeCode'] = $ParentNode_Ret[0]['TreeCode'];
            $data['AddTime']  = date('Y-m-d H:i:s');
            $data['AdderName']= session('Name');
            $data['isDeleted']= '否';

            db('Trees')->insert($data);
            $Ret['Ret'] = 'success';
            $Ret['NodeCode'] = $NewNodeCode;
            $Ret['ParentNodeCode'] = $ParentCode;
            $Ret['NodeName'] = $NodeName;
        }

        OUT:
            return json($Ret,JSON_UNESCAPED_UNICODE);
    }

    public function DelTreeNode(){
        $PostData_Arr = json_decode(file_get_contents('php://input'),true);
        $NodeCode = $PostData_Arr['NodeCode'];
        $Ret['Ret'] = 'Failed';
        //先看结点是否存在
        $db_Ret = db('Trees')->where(array('NodeCode'=>$NodeCode,'isDeleted'=>'否'))->select();
        if(empty($db_Ret)){
            $Ret['msg'] = '要删除的节点已经不存在了!';
            goto OUT;
        }

        //查看该节点是否是父节点
        $db_Ret = db()->query("SELECT * FROM Trees WHERE ParentNodeCode = ? AND isDeleted = '否'",array($NodeCode));
        if(!empty($db_Ret)){
            $Ret['msg'] = '请删除所有子节点后再删除本节点!';
            goto OUT;
        }

        db('Trees')->where(array('NodeCode'=>$NodeCode))->update(array('isDeleted'=>'是'));
        $Ret['Ret'] = 'success';

        OUT:
            return json($Ret,JSON_UNESCAPED_UNICODE);
    }

    public function renameTreeNode(){
        $PostData_Arr = json_decode(file_get_contents('php://input'),true);
        $NodeCode = $PostData_Arr['NodeCode'];
        $NewName = trim($PostData_Arr['NewNodeName']);
        $Ret['Ret'] = 'Failed';

        if(empty($NewName)){
            $Ret['msg'] = '节点名不可为空!';
            goto OUT;
        }

        //先看节点存在不，再看名字是否改变，以及是否和未删除节点名称重复
        $db_Ret = db('Trees')->where(array('NodeCode'=>$NodeCode,'isDeleted'=>'否'))->select();
        if(empty($db_Ret)){
            $Ret['Ret'] = '节点不存在!';
            goto OUT;
        }

        $db_Ret = db('Trees')->where(array('ParentNodeCode'=>$db_Ret[0]['ParentNodeCode'],'NodeName'=>$NewName,'isDeleted'=>'否'))->select();
        if(!empty($db_Ret)){
            if($db_Ret[0]['NodeCode']==$NodeCode && count($db_Ret)==1){//名字没变
                $Ret['Ret'] = 'success';
                goto OUT;
            }else{
                $Ret['msg'] = '该名称已经存在!';
                goto OUT;
            }
        }


        //开始重新命名
        $data['NodeName']= $NewName;
        $data['AddTime'] = date('Y-m-d H:i:s');
        $data['AdderName'] = session('Name');
        db('Trees')->where(array('NodeCode'=>$NodeCode))->update($data);
        $Ret['Ret'] = 'success';

        OUT:
            return json($Ret,JSON_UNESCAPED_UNICODE);
    }

    public function AddTree(){
        $TreeName = trim(input('TreeName'));

        if(empty($TreeName)){
            $this->assign('Warning','树名称不可为空!');
            goto OUT;
        }

        //查看根节点是否已经存在
        $Ret= db('Trees')->where(array('NodeName'=>$TreeName,
                                              'IsDeleted'=>'否'))->select();
        if(!empty($Ret)){
            $this->assign('Warning','该标签树已经存在!');
            goto OUT;
        }

        $data['NodeName'] = $TreeName;
        $data['ParentNodeCode'] = '0';
        $data['AdderName'] = session('Name');
        $data['AddTime'] = date('Y-m-d H:i:s');
        $data['isDeleted'] = '否';
        $data['NodeCode'] = $this->GetValidNodeCode('0');

        if($data['NodeCode']==''){
            $this->assign('Warning','获取节点代码失败!');
            goto OUT;
        }

        $data['TreeCode'] = $data['NodeCode'];


        db('Trees')->insert($data);


        OUT:
            return $this->index();
    }

    public function GetTreeNodeJsonData(){
        $PostData_Arr = json_decode(file_get_contents('php://input'),true);
        $TreeRootCode = $PostData_Arr['TreeCode'];
        $Ret['Ret'] = 'Failed';
        $Ret['RootCode'] = $TreeRootCode;
        if(empty($TreeRootCode)){
            return json($Ret);
        }
        $Ret['Ret'] = 'Success';
        $Data_Ret = db()->query("SELECT NodeCode as id ,ParentNodeCode as pId,NodeName  as name FROM Trees WHERE TreeCode = ? AND isDeleted = '否' ",array($TreeRootCode));
        $Ret['data'] = $Data_Ret;
        return json($Ret,JSON_UNESCAPED_UNICODE);
    }
}