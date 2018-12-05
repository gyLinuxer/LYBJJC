<?php
/**
 * Created by PhpStorm.
 * User: liguangyao
 * Date: 2018/12/4
 * Time: 16:39
 */
namespace app\index\controller;
use think\controller;
use think\Db;
use think\Request;

class PublicController extends  controller{
        public function __construct(Request $request = null)
        {
            parent::__construct($request);
            if(is_null(session("Name"))){
                $this->redirect('Index/Login/Index');
            }
        }
        public function index()
        {
            echo date('Y-m-d', strtotime ("+10 month", strtotime('2011-11-01')));
        }
}