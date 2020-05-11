<?php
namespace app\QPSys\controller;
class XLJD{
    function GetXLJD(){
        return json_encode(db('XLJD')->select(),JSON_UNESCAPED_UNICODE);
    }
}
