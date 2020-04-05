<?php
namespace app\QPSys\controller;
class User {
    public function  index (){
        return view('index');
    }
    public function GetCorpList(){
        return json_encode(db('CorpList')->select(),JSON_UNESCAPED_UNICODE);
    }

    public function GetUserByID($UserID){
        return json_encode(db('UserList')->where(['id'=>$UserID])->select()[0],JSON_UNESCAPED_UNICODE);
    }

    public function AddOrMdfUser(){
        $data = [];
        $data['Name'] = input('curName');
        $data['Corp'] = input('curCorp');
        $data['PersonType'] = input('curPersonType');
        $data['Role'] = input('curRole');

        foreach ($data as $k=>$v){
            if(empty($data[$k])){
                return $k.'不可为空!';
            }
        }

        if($data['PersonType']=='学生'){
            $data['TeacherID'] = input('curTeacherID');
            $data['XLJD'] = input('curXLJD');
            if(empty($data['TeacherID'])) {
                return '学生必须选择对应教员!';
            }
            if(empty($data['XLJD'])) {
                return '学生必须选择训练阶段!';
            }
        }

        $opType = input('opType');
        $UserName = input('curUserName');
        $curPwd = input('curPwd');
        if($opType =='Add'){
            if(empty($UserName)){
                $data['UserName'] = $data['Name'];
            }else{
                $data['UserName'] = $UserName;
            }
            if(empty($curPwd)){
                $data['Pwd'] = '123';
            }else{
                $data['Pwd'] = $curPwd;
            }
            //检查在同一部门下，是否有同一姓名人员
            $Ret = db('UserList')->query('SELECT ID FROM UserList WHERE Corp = ? AND Name = ?',[$data['Corp'],$data['Name']]);
            if(!empty($Ret)){
                return $data['Corp'].'下已经存在名为'.$data['Name'].'的人员.';
            }
            //用户名检测重复
            $Ret = db('UserList')->query('SELECT * FROM UserList WHERE UserName = ?',[$data['UserName']]);
            if(!empty($Ret)){
                return '用户名'.$data['UserName'].'已存在，请换一个吧!';
            }

            $Ret = db('UserList')->insert($data);
            if(empty($Ret)){
                return '添加用户失败!';
            }
        }else{ //Mdf
            $CurUserId = input('CurUserID');
            $Ret =  db('UserList')->where(['id'=>$CurUserId])->update($data);
            if(empty($Ret)){
                return '更新用户失败!';
            }
        }

        return 'OK';
    }


    public  function  UserQry(){
        return json_encode(db('UserList')->select(),JSON_UNESCAPED_UNICODE);
    }

}