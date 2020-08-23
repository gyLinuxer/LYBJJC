<?php
namespace app\QPSys\controller;

class Index
{
    public function index()
    {
        session("UserID", 1);
        return view('index');
    }

}
