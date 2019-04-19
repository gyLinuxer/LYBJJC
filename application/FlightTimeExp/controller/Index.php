<?php
namespace app\FlightTimeExp\controller;
use think\Db;
class Index
{
    public function index()
    {
          dump(db()->query('SELECT * FROM WXDB'));
    }
}
