<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:83:"/private/var/www/html/public/../application/safetymng/view/CheckTask/CheckList.html";i:1554791136;s:60:"/private/var/www/html/application/safetymng/view/layout.html";i:1554681335;}*/ ?>
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
            height:36px;
            line-height: 36px;
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
    <title>Title</title>
    <style>
        span[LBSpan]{
            font-weight: bold;
            font-size: medium;
            color: #00A000;
        }
        span[CTSpan]{

            text-decoration:underline;
        }
    </style>
</head>
<body class="container-full">
<form action="/SafetyMng/CheckTask/showCheckListMng" method="post" enctype="application/x-www-form-urlencoded">
    <div class="row">
    <div class="col-sm-12" style="margin-top: 10px;">
        <?php if($Warning != ''): ?>
        <div class="form-group">
            <div class="col-sm-12">
                <div class="alert alert-danger" role="alert"><strong>提示：</strong><?php echo $Warning; ?></div>
            </div>
        </div>
        <?php endif; ?>

    </div>
</div>
    <?php $CT = new app\safetymng\controller\CheckTask(); ?>
<div class="row" >
    <div class="col-sm-1 " ><span LBSpan>检查编号:</span></div>
    <div class="col-sm-2">
        <span CTSpan><?php echo $CheckInfoRow['CheckCode']; ?></span>
    </div>
    <div class="col-sm-1"><span LBSpan>任务来源:</span></div>
    <div class="col-sm-2">
        <span CTSpan><?php echo $CheckInfoRow['CheckSource']; ?></span>
    </div>
    <div class="col-sm-1"><span LBSpan>检查名称:</span></div>
    <div class="col-sm-2">
        <span CTSpan><?php echo $CheckInfoRow['CheckName']; ?></span>
    </div>
    <div class="col-sm-1"><span LBSpan>检查人员:</span></div>
    <div class="col-sm-2">
        <span CTSpan><?php echo $CheckInfoRow['Checkers']; ?></span>
    </div>

</div>

    <div class="row" style="margin-top: 20px;">
        <div class="col-sm-1"><span LBSpan>计划日期:</span></div>
        <div class="col-sm-2">
            <span CTSpan><?php echo $CheckInfoRow['ScheduleDate']; ?></span>
        </div>
        <div class="col-sm-1 " ><span LBSpan>状态:</span></div>
        <div class="col-sm-2">
            <?php if($CheckInfoRow['Status']  == '检查已结束'): ?><label   class="label label-success">检查已结束</label>
            <?php elseif($CheckInfoRow['Status'] == '检查已开始'): ?><label  class="label label-warning">检查已开始</label>
            <?php else: ?> <label class="label label-default" ><?php echo $CheckInfoRow['Status']; ?></label>
            <?php endif; ?>
        </div>
        <?php if($CheckInfoRow['Status'] == '检查已结束'): ?>
        <div class="col-sm-1"><span LBSpan>检查时长:</span></div>
        <div class="col-sm-2">
            <span CTSpan><?php  $CT = new app\safetymng\controller\CheckTask(); echo $CT->GetCheckTimeCostStr($CheckInfoRow['TotalSecondCosted']);   ?></span>
        </div>
        <div class="col-sm-1"><span LBSpan>合格率:</span></div>
        <div class="col-sm-2">
            <span CTSpan><?php  echo substr(strval(intval($CheckInfoRow['OkRowCnt'])/floatval($CheckInfoRow['CheckRowCnt']==0?1:$CheckInfoRow['CheckRowCnt'])*100),0,5).'%';  ?></span>
        </div>
        <?php endif; ?>
    </div>

<hr/>
<div class="row" style="margin-top: 15px;">
    <div class="col-sm-12" style="margin-left: 10px;">
        <div id = "gyDiv" class="row pre-scrollable" style="overflow:scroll; width:100%;min-height: 450px;">
            <table class="table  table-bordered bootstrap-datatable datatable table-hover responsive" style="min-width:3500px;">
        <thead>
        <tr>
            <th style="width: 50px;">序号</th>
            <th style="width: 100px;">专业名称</th>
            <th style="width: 150px;">检查项目</th>

                <th style="width: 80px;">检查结果</th>
                <th style="width: 100px;">检查人</th>
                <th style="width: 130px;">检查时长</th>
                <th style="width: 130px;">处理类型</th>
                <th style="width: 130px;">反馈</th>

            <th style="width: 400px;">符合性验证标准<?php if($NeedShowCheckRowMngBtn == '1'): ?><a class="btn btn-sm btn-warning" AddSecondCheckRow style="margin-left: 20px;">+</a><a class="btn btn-sm btn-danger" DelCheckRow style="margin-left: 20px;">-</a> <a class="btn btn-sm btn-success" CheckListIsOK style="margin-left: 20px;">确认添加完毕</a><?php endif; ?></th>
            <th style="width: 500px;">检查标准</th>
            <th style="width: 100px;">检查方法</th>
            <th style="width: 100px;">依据名称</th>
            <th style="width: 100px;">依据条款</th>
            <th style="width: 100px;">编号1</th>
            <th style="width: 100px;">编号2</th>
            <th style="width: 300px;">责任单位</th>
            <th style="width: 100px;">所在数据库</th>
            <th style="width: 100px;">单位手册</th>
            <th >检查频次</th>
        </thead>
        <tbody >

        <?php if(is_array($CheckList) || $CheckList instanceof \think\Collection || $CheckList instanceof \think\Paginator): $i = 0; $__LIST__ = $CheckList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr CheckListRowId = <?php echo $vo['CheckListRowId']; ?> >
            <td>
                <?php if($CheckInfoRow['Status'] == '检查单未制定'): ?>
                    <input type="checkbox" id="CK<?php echo $vo['CheckListRowId']; ?>" CheckListRowId = "<?php echo $vo['CheckListRowId']; ?>"/>
                <?php endif; ?>
                <?php echo ++$xh; ?>
            </td>
            <td>
                <?php echo $vo['ProfessionName']; ?>
            </td>
            <td>
                <?php echo $vo['CheckSubject']; ?>
            </td>

                <td>
                    <?php if($vo['IsOk'] == 'YES'): ?><label class="label label-success">符合</label>
                    <?php elseif($vo['IsOk'] == 'NO'): ?> <label class="label label-danger">不符合</label>
                     <?php else: ?>       <label class="label label-default">未检查</label>
                    <?php endif; ?>
                </td>
                <td>
                    <?php echo $vo['Checker']; ?>
                </td>
                <td>
                    <?php  echo $CT->GetCheckTimeCostStr($vo['CostSecond']);  ?>
                </td>
                <td>
                    <a href="javascript:;" showTaskCoreInfo TaskID = "<?php echo $vo['RelatedTaskID']; ?>"><?php echo $vo['DealType']; ?></a>
                </td>
                <td>
                    <span style="color: #0d7bdc;"><?php echo $vo['FeedBack']; ?></span>

                </td>
            <td>
                <?php echo $vo['ComplianceStandard']; ?>
            </td>
            <td>
                <?php echo $vo['CheckStandard']; ?>
            </td>
            <td>
                <?php echo $vo['CheckMethods']; ?>
            </td>
            <td>
                <?php echo $vo['BasisName']; ?>
            </td>
            <td>
                <?php echo $vo['BasisTerm']; ?>
            </td>
            <td>
                <?php echo $vo['Code1']; ?>
            </td>
            <td>
                <?php echo $vo['Code2']; ?>
            </td>

            <td>
                <?php echo $vo['RelatedCorps']; ?>
            </td>
            <td>
                <?php echo $vo['BaseName']; ?>
            </td>
            <td>
                <?php echo $vo['InnerManual']; ?>
            </td>
            <td>
                <?php echo $vo['CheckFrequency']; ?>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
    </div>
</div>

</form>
<script>
    $CheckListID = <?php echo $CheckListID; ?>;
    $(function () {
        $('a[AddSecondCheckRow]').click(function () {
            $URL =  "/SafetyMng/CheckTask/showCheckSelectRow/CheckListID/<?php echo $CheckInfoRow['id']; ?>";
            layer.open({
                title:'添加检查条款',
                type: 2,
                content: $URL,
                area: ['1000px', '700px'],
                cancel: function(index, layero){
                    window.parent.location.reload();
                    return false;
                }
            });
        });

        $('tr[CheckListRowId]').dblclick(function () {
            $CheckListId = $(this).attr('CheckListRowId');
            if ($('#CK' + $CheckListId).is(':checked')) {
                $('#CK' + $CheckListId).removeAttr('checked');
            }else{
                $('#CK' + $CheckListId).attr('checked','checked');
            }
        });

        $('a[DelCheckRow]').click(function () {
            $Cks =  $('input[CheckListRowId]:checked');
            $Arr = [];
            $Cks.each(function () {
                $o = {'CheckListId':$CheckListID,'CkId':$(this).attr('id'),'CheckListRowId':$(this).attr('CheckListRowId')};
                $Arr.push($o);
            });

            $.ajax({
                url:"/SafetyMng/Help/Ajax_DelCheckListRow",
                data: JSON.stringify($Arr),
                type:'post',
                dataType:"json",
                success:function (data,textStatus) {
                    if(data['Ret']!='Success'){
                        layer.alert('删除条款失败:'+data['Msg']);
                    }else{
                        window.location.reload();
                    }
                },
                error:function (XMLHttpRequest,textStatus,errorThrown) {
                    layer.alert('删除条款失败!');
                }
            });
        });

        $('a[CheckListIsOK]').click(function () {
            $o =  {'CheckListId':$CheckListID};
            $.ajax({
                url:"/SafetyMng/Help/Ajax_SetCheckTaskToCheckListIsDefined",
                data: JSON.stringify($o),
                type:'post',
                dataType:"json",
                success:function (data,textStatus) {
                    if(data['Ret']=='Success'){
                        window.location.reload();
                    }else{
                        layer.alert('设置状态失败:'+data['Msg']);
                    }
                },
                error:function (XMLHttpRequest,textStatus,errorThrown) {
                    layer.alert('设置状态失败!');
                }
            });
        });
        $('a[showTaskCoreInfo]').click(function () {
            layer.open({
                type: 2,
                title: false,
                area: ['680px', '750px'],
                shade: 0.8,
                closeBtn: 0,
                shadeClose: true,
                content: '/SafetyMng/TaskCore/showTaskCoreInfoPage/TaskID/'+$(this).attr('TaskID')
            });
        });



        $('#gyDiv').css('min-height',window.screen.height-310);

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
