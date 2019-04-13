<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"/private/var/www/html/public/../application/safetymng/view/QuestionMng/index.html";i:1554681335;s:60:"/private/var/www/html/application/safetymng/view/layout.html";i:1555119853;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--

              中国民用航空飞行学院洛阳分院　
                       机务工程部　
                        李光耀　
                 email: gyLinuxer@163.com
                    QQ: 447649795
                  微信: 447649795
-->

    <meta charset="utf-8">
    <title>维修单位质量追踪与安全管理系统平台v1.0</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="author" content="author">
    <!-- 网页描述 -->
    <meta name="description" content="hello">
    <!-- 关键字使用","分隔 -->
    <meta name="keywords" content="a,b,c">
    <!-- 禁止浏览器从本地机的缓存中调阅页面内容 -->
    <meta http-equiv="Pragma" content="no-cache">
    <!-- 用来防止别人在框架里调用你的页面 -->
    <meta http-equiv="Window-target" content="_top">
    <!-- content的参数有all，none，index，noindex，follow，nofollow，默认是all -->
    <meta name="robots" content="none">
    <!-- 收藏图标 -->
    <link rel="Shortcut Icon" href="favicon.ico" rel="external nofollow" >
    <!-- 网页不会被缓存 -->
    <meta http-equiv="Cache-Control" content="no-cache, must-revalidate">
    <!-- 解决部分兼容性问题，如果安装了GCF，则使用GCF来渲染页面，如果未安装GCF，则使用最高版本的IE内核进行渲染。 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!-- 页面按原比例显示 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--[if lt IE 9]>
    <![endif]-->
    <!-- The styles -->
    <link id="bs-css" href="/static/css/bootstrap-cerulean.min.css" rel="stylesheet">
    <link href="/static/css/charisma-app.css" rel="stylesheet">
    <link href='/static/bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='/static/bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='/static/bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='/static/bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='/static/bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='/static/bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='/static/css/jquery.noty.css' rel='stylesheet'>
    <link href='/static/css/noty_theme_default.css' rel='stylesheet'>
    <link href='/static/css/elfinder.min.css' rel='stylesheet'>
    <link href='/static/css/elfinder.theme.css' rel='stylesheet'>
    <link href='/static/css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='/static/css/uploadify.css' rel='stylesheet'>
    <link href='/static/css/animate.min.css' rel='stylesheet'>
    <link href='/static/css/doc.min.css' rel='stylesheet'>
    <link href='/static/css/MyCss.css' rel='stylesheet'>
    <link href='/static/css/jquery-ui.min.css' rel='stylesheet'>

    <link href="/static/css/bootstrap-table.css" rel="stylesheet">
    <link href="/static/css/zTreeStyle/zTreeStyle.css" rel="stylesheet">
    <link href="/static/css/bootstrap-editable.css" rel="stylesheet">
    <link href="/static/css/ui-dialog.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="/static/js/jquery.js"></script>
    <script src="/static/js//bootstrap.js"></script>

    <!-- include summernote css/js -->
    <link href="/static/css/summernote.css" rel="stylesheet">
    <script src="/static/js/summernote.js"></script>

    <!-- library for cookie management -->
    <script src="/static/js/jquery.cookie.js"></script>
    <!-- calender plugin -->

    <!-- data table plugin -->
    <script src='/static/js/jquery.dataTables.min.js'></script>

    <!-- select or dropdown enhancer -->
    <script src="/static/bower_components/chosen/chosen.jquery.min.js"></script>
    <!-- plugin for gallery image view -->
    <script src="/static/bower_components/colorbox/jquery.colorbox-min.js"></script>
    <!-- notification plugin -->
    <script src="/static/js/jquery.noty.js"></script>
    <!-- library for making tables responsive -->
    <script src="/static/bower_components/responsive-tables/responsive-tables.js"></script>
    <!-- tour plugin -->
    <script src="/static/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
    <!-- star rating plugin -->
    <!-- for iOS style toggle switch -->
    <!-- autogrowing textarea plugin -->
    <script src="/static/js/jquery.autogrow-textarea.js"></script>
    <!-- multiple file upload plugin -->
    <script src="/static/js/jquery.uploadify-3.1.min.js"></script>
    <script src="/static/js/gyComm.js"></script>
    <script src="/static/js/jquery-ui.min.js"></script>
    <script src="/static/js/gyComm.js"></script>
    <script src="/static/js//bootstrap-slider.min.js"></script>
    <link href="/static/css/select2.min.css" rel="stylesheet" />
    <script src="/static/js/select2.min.js"></script>
    <link href="/static/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <script src="/static/js/dialog-plus-min.js"></script>
    <script type="text/javascript" src="/static/js/jquery.treegrid.js"></script>
    <link rel="stylesheet" href="/static/css/jquery.treegrid.css">

    <script type="text/javascript" charset="utf-8" src="/static/UEditor/lang/zh-cn/zh-cn.js"></script>
    <script src="/static/js/GY.js"></script>
    <link href="/static/css/dialog.css" rel="stylesheet">
    <script src="/static/js/dialog-plus.js"></script>
    <script src="/static/layer/layer.js"></script>
    <script src="/static/js/GY.js"></script>
    <style>
        .select2-container .select2-selection--single{
            height:36px;
            line-height: 36px;
        }
    </style>
    <script>

    </script>
</head>

<body>
    <?php if($CurPlatform != 'Mobile'): ?>
        <div class="navbar navbar-default" role="navigation" style="height:75px;">
            <div class="container-fluid" >
                <div class="navbar-header col-sm-4">
                    <a class="navbar-brand" href="#">
                        <img CAFUC="Fuck" style="width: 350px;height:50px;" src="/static/img/logo1.png"  />
                    </a>
                </div>
                <div class="col-sm-8">
                    <ul class="nav navbar-nav" style="margin-top:15px">
                        <li class="dropdown"><a href="/SafetyMng/TaskList/Index.html">任务列表</a></li>
                        <li class="dropdown"><a href="/SafetyMng/QuestionInput/Index.html">问题提交</a></li>
                        <li class="dropdown"><a href="/SafetyMng/CheckTask/Index.html">生成检查任务</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                系统元数据管理 <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown"><a href="/SafetyMng/SysConf/Index.html">系统配置</a></li>
                                <li class="divider"></li>
                                <li class="dropdown"><a href="/SafetyMng/CheckTBMng/Index.html">条款数据库</a></li>
                                <li class="divider"></li>
                                <li class="dropdown"><a href="" href="#">人员管理</a></li>
                            </ul>
                        </li>

                        <li class="dropdown"><a href="/SafetyMng/Login/ExitSYS">退出登陆</a></li>
                        <li class="dropdown"><a href="#"> </a></li>
                        <li class="dropdown"><a href="#">欢迎^_^ <?php echo \think\Session::get('Name'); ?> (<?php echo \think\Session::get('Corp'); ?>) </a></li>
                    </ul>
                </div>

            </div>
        </div>
    <?php endif; if($CurPlatform == 'Mobile'): ?>
        <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header" >
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div style="margin-top: 15px;padding-left: 5px;">
                    <span class="" style="color: white;font-weight: bold;font-size: medium;">维修单位质量追踪与安全管理系统平台</span>
                </div>

            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/SafetyMng/MyRelatedQuestion">当前任务</a></li>
                    <li class="divider"></li>
                    <li><a href="/SafetyMng/QuestionInput/index">问题提交</a></li>
                    <li class="divider"></li>
                    <li><a href="/SafetyMng/Reform/showFastReformIndex.html">下发立即整改</a></li>
                    <li class="divider"></li>
                    <li><a href="/SafetyMng/Login/ExitSYS.html">退出系统</a></li>
                </ul>
            </div>
        </div>
        </nav>
    <?php endif; ?>





            <div id="content_main" class="col-lg-12 col-xs-12 col-sm-12">
                
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        img[CAFUC!=Fuck]{
            max-width: 100%;
        }
    </style>
</head>
<meta charset="UTF-8">
<title></title>
</head>
<body class="container-fluid">
<ul id="myTab" class="nav nav-tabs" >
    <li id="QuestionMng" class="active">
        <a href="#home" aria-controls="closetab" role="tab" data-toggle="tab">
            <span>问题描述与处理</span>
        </a>
    </li>
    <?php if($showReformList == 'YES'): ?>
        <li id="LiReformList" class="">
            <a href="#ReformList" id="aReformList" data-toggle="tab">
                整改通知书列表
            </a>
        </li>
    <?php endif; ?>
</ul>
<div id="myTabContent" class="tab-content">
    <div class="tab-pane active" id="home" style="">
        <form id="form1" class="form-horizontal" role="form" enctype="application/x-www-form-urlencoded" method="post" action="/Index/SysConf/SetSysConf.html">

            <div class="col-sm-10 col-sm-offset-2" style="margin-top: 20px;">
                <table border="1" bordercolor="gray" >
                    <tr>
                        <td style="width: 100px;" valign="top">
                            <span style="font-size: large;color: #00A000;">问题标题:</span>
                        </td>
                        <td align="center;" >
                            <span style="color: #0d7bdc;font-size: medium;"><?php echo $dataRow['QuestionTitle']; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100px;" valign="top">
                            <span style="font-size: large;color: #00A000;">问题来源:</span>
                        </td>
                        <td align="center;" >
                            <span style="font-size: medium;"><?php echo $dataRow['QuestionSource']; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100px;" valign="top">
                            <span style="font-size: large;color: #00A000;">问题对象:</span>
                        </td>
                        <td align="center;" >
                            <span style="font-size: medium;"><label class="label label-danger"><?php echo $dataRow['RelatedCorp']; ?></label></span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100px;" valign="top">
                            <span style="font-size: large;color: #00A000;">问题依据:</span>
                        </td>
                        <td align="center;" >
                            <span style="font-size: medium;"><?php echo $dataRow['Basis']; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100px;" valign="top">
                            <span style="font-size: large;color: #00A000;">发现人:</span>
                        </td>
                        <td align="center;">
                            <span style="font-size: medium;"><?php echo $dataRow['Finder']; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100px;" valign="top">
                            <span style="font-size: large;color: #00A000;">发现时间:</span>
                        </td>
                        <td align="center;">
                            <span style="font-size: medium;"><?php echo $dataRow['DateFound']; ?></span>
                        </td>
                    </tr>
                        <tr>
                            <td style="width: 100px;" valign="top">
                                <span style="font-size: large;color: #00A000;">问题描述:</span>
                            </td>
                            <td>
                                <span><?php echo htmlspecialchars_decode($dataRow['QuestionInfo']); ?></span>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <span style="font-size: large;color: #00A000;">提交人:</span>
                            </td>
                            <td>
                                <span style="margin-left: 10px;"><?php echo $dataRow['CreatorName']; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span style="font-size: large;color: #00A000;">提交时间:</span>
                            </td>
                            <td>
                                <span style="margin-left: 10px;"><?php echo $dataRow['CreateTime']; ?></span>
                            </td>
                        </tr>
                    </table>
                    <hr/>
                    <?php if($showMng == 'YES'): ?>
                        <div class="row">
                            <button class="btn  btn-primary " >标记为无效信息</button>
                            <a XFZG class="btn  btn-danger col-sm-offset-1" style="margin-left: 100px;">下发整改通知单</a>
                            <button class="btn  btn-warning" style="margin-left: 100px;">纳入SMS</button>
                            <button class="btn  btn-primary" style="margin-left: 100px;">纳入安全隐患</button>
                            <button class="btn  btn-default " style="margin-left: 100px;">退回</button>
                        </div>
                    <?php endif; ?>
                </div>
        </form>
    </div>
    <?php if($showReformList == 'YES'): ?>
        <div class="tab-pane" id="ReformList" style="">
            <iframe id = "ReformListForm" src="/SafetyMng/Reform/showReformList/TaskID/<?php echo $TaskID; ?>" name="ReformListForm" scrolling="no" width="97%" height="800px" onload="" frameborder="0"></iframe>
        </div>
    <?php endif; ?>
</div>


<script>
    var TabCount = 1;


    function changeFrameHeight(t){
        /*var ifm= document.getElementById(t);

        var subWeb = ifm.contentDocument;
        if(ifm != null && subWeb != null) {
            ifm.height = subWeb.body.scrollHeight;
            ifm.width = subWeb.body.scrollWidth;
        }*/
       var iframeid=document.getElementById(t); //iframe id

            if (iframeid && !window.opera){
                if (iframeid.contentDocument && iframeid.contentDocument.body.offsetHeight){
                    iframeid.height = iframeid.contentDocument.body.offsetHeight;
                }else if(iframeid.Document && iframeid.Document.body.scrollHeight){
                    iframeid.height = iframeid.Document.body.scrollHeight;
                }
            }


    }


    function CloseBtnClick(t) {
        var d1 = dialog({
            title: '确认关闭',
            content: '当前未保存内容在关闭后将无法再现保存！确认要关闭吗?',
            width:440,
            okValue:'确定',
            ok: function () {
                Code = $(t).attr('PrivCode');
                $('#li'+Code).remove();
                $('#div'+Code).remove();
                $('#myTab > li').removeClass('active');
                $('#LiReformList').addClass('active');
                $('#myTabContent > div').removeClass('active');
                $('#ReformList').addClass('active');
            },
            cancelValue:'再想想',
            cancel:function () {

            }
        });
        d1.showModal();
    }

    $(function () {
        $("a[XFZG]").bind('click',function () {
            var d1 = dialog({
                title: '确认',
                content: '确定进入问题-整改分支？',
                width:440,
                okValue:'确定',
                ok: function () {
                    window.location = '/SafetyMng/QuestionMng/setQuestionDealType/TaskID/<?php echo $TaskID; ?>/Type/0'
                },
                cancelValue:'再想想',
                cancel:function () {
                    
                }
            });
            d1.showModal();
        });

        $('iframe').each2(function () {
            changeFrameHeight($(this).attr('id'));
        })
    });
</script>

</body>
</html>
            </div>


<script>
    $(function(){
            $("#MainFrm").attr("height", $(window).height()-90);
            $("#vdiv").css("height",$(window).height());

    });



</script>

</body>
</html>
