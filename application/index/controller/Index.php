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
}
