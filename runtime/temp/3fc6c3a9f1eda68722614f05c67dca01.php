<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:86:"/private/var/www/html/public/../application/safetymng/view/QuestionInput/FeedBack.html";i:1551491686;s:60:"/private/var/www/html/application/safetymng/view/layout.html";i:1553048524;}*/ ?>
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
    <script type="text/javascript" charset="utf-8" src="/static/UEditor/ueditor.config.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/static/UEditor/ueditor.all.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/static/UEditor/lang/zh-cn/zh-cn.js"></script>
    <script src="/static/js/GY.js"></script>
    <link href="/static/css/dialog.css" rel="stylesheet">
    <script src="/static/js/dialog-plus.js"></script>
    <script src="/static/layer/layer.js"></script>
    <script src="/static/js/GY.js"></script>
    <style>
        .select2-container .select2-selection--single{
            height:34px;
            line-height: 34px;
        }
    </style>
    <script>
        function UEditorInit(id) {
            var editor = UE.getEditor(id,{
                //这里可以选择自己需要的工具按钮名称,此处仅选择如下五个
                serverUrl: "<?php echo url('SafetyMng/UEditorGYHelp/index'); ?>",
                toolbars: [
                    [
                        'undo', //撤销
                        'redo', //重做
                        'bold', //加粗
                        'indent', //首行缩进
                        'italic', //斜体
                        'subscript', //下标
                        'fontborder', //字符边框
                        'preview', //预览
                        'horizontal', //分隔线
                        'cleardoc', //清空文档
                        'fontfamily', //字体
                        'fontsize' //字号
                    ],[
                        'simpleupload', //单图上传
                        'insertimage', //多图上传
                        'emotion', //表情
                        'spechars', //特殊字符
                        'searchreplace', //查询替换
                        'map', //Baidu地图
                        'insertvideo', //视频
                        'justifyleft', //居左对齐
                        'justifyright', //居右对齐
                        'justifycenter', //居中对齐
                        'justifyjustify', //两端对齐
                        'forecolor', //字体颜色
                        'backcolor' //背景色
                    ],[
                        'insertorderedlist', //有序列表
                        'insertunorderedlist', //无序列表
                        'fullscreen', //全屏
                        'attachment', //附件
                        'imagecenter', //居中
                        'background', //背景
                        'template', //模板
                        'scrawl', //涂鸦
                        'inserttable', //插入表格
                    ]

                ],
                //focus时自动清空初始化时的内容
                autoFloatEnabled:false,
                //关闭字数统计
                wordCount:false,
                //关闭elementPath
                elementPathEnabled:false,
                //默认的编辑区域高度
                initialFrameHeight:300
                //更多其他参数，请参考ueditor.config.js中的配置项
            });
        }
    </script>
</head>

<body>
    <?php if($CurPlatform != 'Mobile'): ?>
        <div class="navbar navbar-default" role="navigation" style="height:75px;">
            <div class="container-fluid" >
                <div class="navbar-header col-sm-4">
                    <a class="navbar-brand" href="#">
                        <img style="width: 350px;height:50px;" src="/static/img/logo1.png" />
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
</head>
<body>

                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="alert alert-success" role="alert"><strong>提示：</strong>您输入的问题我们已经收到，请等候我们的处理。</div>
                        <?php if($Warning != ''): ?><div class="alert alert-danger" role="alert"><strong>提示：</strong><?php echo $Warning; ?></div><?php endif; ?>
                    </div>
                </div>
            <form class="" enctype="multipart/form-data" id="mForm" method="post" action="/SafetyMng/QuestionInput/QuestionInput.html">
                <div class="m-portlet__body">
                    <div class="form-group">
                        <label class="control-label col-sm-2">标题:</label>
                        <div class="col-lg-7 col-md-7 col-sm-7">
                            <span><?php echo $dataRow['QuestionTitle']; ?></span>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="control-label col-sm-2">问题描述:</label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <span><?php echo htmlspecialchars_decode($dataRow['QuestionInfo']); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">附件:</label>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <a href="/upload/<?php echo $dataRow['subFileSaveName']; ?>"><?php echo $dataRow['subFileName']; ?></a>
                        </div>
                    </div>
                </div>

            </form>

        <!--end::Form-->


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
