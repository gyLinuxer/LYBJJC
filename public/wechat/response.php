<?php

require './WeChat.class.php';
define('APPID','wxd364401c517fb9cf');
define('APPSECRET','6aab4b48a66a1709073f203ab44458e1');
define('TOKEN','zkgy2000');
//
define('APPKEY','');
$wechat = new WeChat(APPID,APPSECRET,TOKEN,APPKEY);
//$access_token = $wechat->getAccessToken();
//$qrcode = $wechat->getQRCode(124);
//第一次验证调用
//$wechat->firstValid();
$wechat->responseMsg();

