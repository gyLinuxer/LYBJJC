<?php
namespace app\index\controller;

class Index extends PublicController
{
    public function index($id='')
    {
        return view("");
     }
    public function hello()
    {
        return "hello!";
    }

    public function UpdateStoreQKByQKTable(){
      $rows =  db()->query('SELECT * FROM OtherQFLog');
      if(empty($rows)){
          return '无任何欠款记录';
      }
      $i=0;
      foreach ($rows as $r){
          db()->query("UPDATE StoreList SET OtherQK = OtherQK + ? WHERE StoreCode = ?",[$r['Fee'],$r['StoreCode']]);
          $i++;
      }
      return '更新'.$i.'条记录!';
    }
}
