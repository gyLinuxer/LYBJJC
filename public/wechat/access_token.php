<?php
require './WeChat.class.php';
//appId
define('APPID','wxd364401c517fb9cf');
//appsecret
define('APPSECRET','6aab4b48a66a1709073f203ab44458e1');
//token
define('TOKEN','zkgy2000');
//appkey图灵机器人官网获得
define('APPKEY','wxd364401c517fb9cf');
$wechat = new WeChat(APPID,APPSECRET,TOKEN,APPKEY);
