<?php
namespace app\FlightTimeExp\controller;
use think\Db;

class Index
{
    public function index()
    {
        dump(db()->query('SELECT top 100 * FROM  [172.16.65.149].jwb.dbo.flight'));
          dump(db()->query('SELECT * FROM  AA_AdminPlugin'));
       // $db = odbc_connect('Driver={SQL Server Native Client 10.0};Server=172.16.76.61;Database=test;','wsprint','wsprint');
    }
}
