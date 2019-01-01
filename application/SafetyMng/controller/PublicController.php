<?php
namespace app\SafetyMng\controller;
use think\controller;
use think\Db;
use think\Request;

class PublicController extends  controller{

        public  $SuperCorp = "质检科";

        public function __construct(Request $request = null)
        {
            parent::__construct($request);
            if(is_null(session("Name"))){
                $this->redirect('SafetyMng/Login/Index');
            }
        }
        public function index()
        {
            echo date('Y-m-d', strtotime ("+10 month", strtotime('2011-11-01')));
        }

}