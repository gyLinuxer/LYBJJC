<?php
namespace app\QPSys\controller;

class XQXX {
    function index(){
        return view('index');
    }

    function SaveXQ(){
        /*
         *  CurBaseAddr:'',
                CurSD:'',
                CurXQRQ:'',
                CurXLLX:'',
                CurTSXQ:'',
                CurACType:'',*/
        $BaseAddr = input('CurBaseAddr');
        $CurXQRQ = input('CurXQRQ');
        $CurSD = input('CurSD');
        $CurXLLX = input('CurXLLX');
        $CurTSXQ = input('CurTSXQ');
        $CurACType = input('CurACType');
        $CurACNum = intval(input('CurACNum'));

        $Warning = '';

        if(empty($BaseAddr)) {
            $Warning = '基地不能为空!';
            goto OUT;
        }

        if(empty($CurSD)) {
            $Warning = '训练时段不能为空!';
            goto OUT;
        }

        if(empty($CurXLLX)) {
            $Warning = '训练类型不能为空!';
            goto OUT;
        }

        if(empty($CurXQRQ)){
            $Warning = '需求日期不能为空';
            goto OUT;
        }else{
            if($CurXQRQ=='今天'){
                $CurXQRQ = date('Y-m-d');
            }else{
                $CurXQRQ = date("Y-m-d",strtotime("+1 day"));
            }
        }

        if(empty($CurACType)) {
            $Warning = '机型不能为空!';
            goto OUT;
        }

        if($CurACNum <=0){
            $Warning = '架数必须大于0!';
            goto OUT;
        }

        $data['Base'] = $BaseAddr;
        $data['XQRQ'] = $CurXQRQ;
        $data['ACType'] =  $CurACType;
        $data['ACNum'] =  $CurACNum;
        $data['SD'] =  $CurSD;
        $data['XLLX'] =  $CurXLLX;
        $data['TSXQ'] =  $CurTSXQ;
        $data['Status'] ='已提交';
        $data['CreateTime'] = date('Y-m-d H:i:s');
        $data['CreatorID'] = session('UserID');
        $data['ACNoApproved'] = 0;

        $Ret = db('XQXX')->insert($data);

        if($Ret>0){
            $Warning = 'OK';
        }else{
            $Warning = '保存失败!';
        }

        OUT:

        return $Warning;
    }

    function DelXQ(){
        $XQId = input('id');
        $Ret = db('XQXX')->where([
            'CreatorID'=>session('UserID'),
            'id'=>$XQId
                        ])->select();
        if(empty($Ret)){
            return '要删除的需求不存在!';
        }

        if(!in_array($Ret[0]['Status'],['已提交'])){
            return '需求已处于审批状态，不可删除!';
        }

        $Ret = db('XQXX')->where([
            'CreatorID'=>session('UserID'),
            'id'=>$XQId
        ])->delete();

        if($Ret>0){
            return '删除成功!';
        }else{
            return '删除失败!';
        }

    }

   public function GetMyXQXX(){
        $Role = session('Role');
        if($Role=='领导'){
            return $this->getXQSPList();
        }

       $Ret = db()->query("SELECT XQXX.*,UserList.Name FROM XQXX JOIN UserList ON XQXX.CreatorID =UserList.id  
        WHERE CreatorID = ? AND XQRQ >=? ",[session('UserID'),date('Y-m-d')]);


      return json_encode($Ret,JSON_UNESCAPED_UNICODE);
    }

    public function getXQSPList()
    {
        $Role = session('Role');
        if($Role!='领导'){
            return null;
        }

        $Corp = session('Corp');
        $Ret = db()->query("SELECT XQXX.*,UserList.Name FROM XQXX JOIN UserList ON XQXX.CreatorID =UserList.id   WHERE CreatorID IN 
          (SELECT id FROM UserList WHERE Corp=?)",[$Corp]);

        return json_encode($Ret,JSON_UNESCAPED_UNICODE);
    }

    public function XQSP(){
        $id = input('id');
        $yes = input('y');
        $Status = '已驳回';
        if($yes == 'YES'){
            $Status = '已审核';
        }

        if(session('Role')!='领导'){
            return '您并非本部门领导无权审批!';
        }

        $Ret = db()->query("UPDATE XQXX SET Status = ? WHERE id=? AND CreatorID IN 
         (SELECT id FROM UserList WHERE Corp = ?) ",[$Status,$id,session('Corp')]);

        if($Ret>0){
            return 'OK';
        }else{
            return '操作失败!';
        }
    }

}
