<?php
namespace app\PXSQ\controller;
use think\Controller;
use think\Db;
use think\Request;
class Index extends Controller
{
  public function index()
  {
      return view('index');
  }
}
