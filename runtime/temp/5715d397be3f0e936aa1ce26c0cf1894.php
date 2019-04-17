<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"/private/var/www/html/public/../application/safetymng/view/Reform/ReformList.html";i:1555540628;}*/ ?>

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
    <title>安全管理系统v1.0</title>
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
</head>
<head>
    <meta charset="UTF-8">
</head>
<body class="container-full">
<div class="form-group">
    <div class="col-sm-12">
        <?php if($Warning != ''): ?><div class="alert alert-danger" role="alert"><strong>提示：</strong><?php echo $Warning; ?></div><?php endif; ?>
    </div>
</div>
<div class="row" style="margin-top: 20px;">
    <div class="col-sm-12">
        <table class="table table-hover table-bordered bootstrap-datatable datatable responsive">
            <thead>
            <tr>
                <th>序号</th>
                <th style="width: 150px;">整改通知单编号</th>
                <th class="col-sm-3">标题</th>
                <th  style="width: 80px;">责任单位</th>
                <th>当前处理部门</th>
                <th>当前状态</th>
                <th>反馈状态</th>
                <th>纠正证据</th>
                <th>预防证据</th>
                <?php if(\think\Session::get('Corp') == '质检科'): ?>
                <th>删除</th>
                <?php endif; ?>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($ReformList) || $ReformList instanceof \think\Collection || $ReformList instanceof \think\Paginator): $i = 0; $__LIST__ = $ReformList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;
                $RF = new app\safetymng\controller\Reform;
                $showInfo =  $RF->GetReformMultiStatus($vo['id'],$vo);
             ?>
            <tr>
                <td>
                    <?php echo $Count++; ?>
                </td>
                <td>
                    <span style="font-size: smaller;color: #00A000;"><?php echo $vo['Code']; ?></span>
                </td>
                <td>

                    <a JMP TaskID = "<?php echo $TaskID; ?>" Code="RM<?php echo $vo['id']; ?>" rowId = "<?php echo $vo['id']; ?>"><?php echo $vo['ReformTitle']; ?></a>
                </td>
                <td>
                    <?php echo $vo['DutyCorp']; ?>
                </td>
                <td>

                    <?php if($vo['CurDealCorp'] != \think\Session::get('Corp')): ?>
                        <label class="label label-warning"><?php echo $vo['CurDealCorp']; ?></label>
                    <?php endif; if($vo['CurDealCorp'] == \think\Session::get('Corp')): ?>
                        <label class="label label-default"><?php echo $vo['CurDealCorp']; ?></label>
                    <?php endif; ?>
                </td>
                <td>
                    <label class="label label-<?php 
                            $RF = new app\safetymng\controller\Reform;

                            echo $RF->GetReformStatusColor($vo['ReformStatus']);
                      ?>">
                    <?php echo $vo['ReformStatus']; ?>
                    </label>
                </td>
                <td>
                    <label class="label label-<?php echo $showInfo['FeedBackInfoColor']; ?>"><?php echo $showInfo['FeedBackInfo']; ?></label>
                    <label class="label label-<?php echo $showInfo['FeedBackLeftDaysColor']; ?>"><?php echo $showInfo['FeedBackLeftDays']; ?></label>
                </td>
                <td>
                    <label class="label label-<?php echo $showInfo['CorrectiveInfoColor']; ?>"><?php echo $showInfo['CorrectiveInfo']; ?></label>
                    <label class="label label-<?php echo $showInfo['CorrectiveLeftDaysColor']; ?>"><?php echo $showInfo['CorrectiveLeftDays']; ?></label>
                </td>
                <td>
                    <label class="label label-<?php echo $showInfo['PrecautionInfoColor']; ?>"><?php echo $showInfo['PrecautionInfo']; ?></label>
                    <label class="label label-<?php echo $showInfo['PrecautionLeftDaysColor']; ?>"><?php echo $showInfo['PrecautionLeftDays']; ?></label>
                </td>

                <?php if(\think\Session::get('Corp') == '质检科'): ?>
                <td>
                    <input type="checkbox" EnableDel style="margin-right: 10px;" rowId = "<?php echo $vo['id']; ?>" /><a BtnID="DelBtn<?php echo $vo['id']; ?>" DelBtn class="btn btn-sm btn-danger" rowId="<?php echo $vo['id']; ?>" disabled>删除</a>
                </td>
                <?php endif; ?>

            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
        <?php if($showZJBtn == 'YES'): ?>
            <div class="row">
                <a class="btn btn-success " style="margin-left: 86%" ZJ >增加整改通知书</a>
            </div>
        <?php endif; ?>
</div>
<script>
    var Count = <?php echo (isset($ReformCount) && ($ReformCount !== '')?$ReformCount:'0'); ?>;
    var TabCount = 1;

    $(function () {
        //$("#aReformList",window.parent.document).text('整改通知书列表'+'<span class="badge">'+Count+'</span>');
        $("#aReformList",window.parent.document).empty();
        $("#aReformList",window.parent.document).text('整改通知书列表');
        $('<span class="badge">'+Count+'</span>').appendTo($("#aReformList",window.parent.document));
        $('a[XFZG]').click(function () {
            window.location = '/SafetyMng/Reform/SendReform/TaskID/'+$(this).attr('TaskID')+'/ReformID/'+$(this).attr('rowID');
        });


        $('a[TXTZS],a[JMP]').click(function () {
            PrivCode = $(this).attr('Code');
            TaskID = $(this).attr('TaskID');
            if($('#li'+PrivCode,window.parent.document).length ==0){

               window.open('/SafetyMng/Reform/Index/TaskID/'+TaskID+'/ReformID/'+$(this).attr("rowId")+'/opType/Mdf');
            }

        });

        $('a[ZJ]').click(function () {
            window.open('/SafetyMng/Reform/Index/TaskID/<?php echo $TaskID; ?>');
        });

       $('input[EnableDel]').click(function () {
           if($(this).is(":checked")){
               $("a[BtnID=DelBtn"+$(this).attr('rowId')+"]").removeAttr('disabled');
           }else{
               $("a[BtnID=DelBtn"+$(this).attr('rowId')+"]").attr('disabled','disabled');
           }
       });

        $('a[CLoseBtn]').click(function () {
            $TaskID = $(this).attr('TaskID');
            $rowID = $(this).attr('rowID');
            var dd = dialog({
                    title: '提示',
                    content: '您点击已阅之后，任务将会被关闭？确定吗？',
                    width:440,
                    left:300,
                    top:300,
                    okValue:'确定',
                    ok: function () {
                        window.location = '/SafetyMng/Reform/SendReform/TaskID/'+$TaskID+'/ReformID/'+$rowID;
                    },
                    cancelValue:'我再看看',
                    cancel:function () {

                    }
                    }
            );
            dd.showModal();
        });

        <?php if(\think\Session::get('Corp') == '质检科'): ?>
            $('a[DelBtn]').click(function () {
                layer.open({
                    title:'删除整改通知书',
                    type: 2,
                    content: "/SafetyMng/Reform/showDeleteReform/ReformID/"+$(this).attr("rowId"),
                    area: ['530px', '400px']
                });
            });
        <?php endif; ?>



    });
</script>
</body>
</html>