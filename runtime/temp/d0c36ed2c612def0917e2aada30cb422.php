<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:89:"/private/var/www/html/public/../application/safetymng/view/CheckTask/OnlineCheckPage.html";i:1554390763;}*/ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
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
        img{
            max-width: 100%;
        }
        video{
            max-width: 100%;
        }

        span[LBSpan]{
            font-weight: bold;
            font-size: medium;
            color: #00A000;
        }
        span[CTSpan]{
            font-size: medium;

        }

        div[gyRow]{
            margin-top: 20px;

        }

        div[DYL]{
            padding: 0px;
        }
        div[DEL]{
            padding: 0px;
        }
    </style>



</head>
<body class="container-fluid">
<form id ="mForm" method="post" action="/SafetyMng/CheckTask/saveCheckRowResult">
    <input name="CheckResult" id="CheckResult" type="hidden" value="<?php echo $CheckRowData['IsOk']; ?>"/>
    <input name="CheckRowID"  id="CheckRowID" type="hidden" value="<?php echo $CheckRowData['id']; ?>">
    <input name="CurOrderID"  id="CurOrderID" type="hidden" value="<?php echo $CurOrderID; ?>">
    <input name="CheckListID"  id="CheckListID" type="hidden" value="<?php echo $CheckListID; ?>">
    <div class="row">
        <table class="table" style="margin-bottom: 1px;{border:1px solid #ffffff} ">
            <tbody>
            <tr>
                <div class="alert alert-success" role="alert"><span style="font-size: large;font-weight: bold;margin-left: 5%">质量追踪与安全管理系统电子检查单</span><br/>
                    <span style="font-size: smaller;font-weight: bold;margin-left: 15%">编号:<?php echo $CheckInfoRow['CheckCode']; ?></span></div>
            </tr>
            <?php if($Warning != ''): ?>
            <tr>
                 <div class="alert alert-danger" role="alert"><strong>提示：</strong><?php echo $Warning; ?></div>
            </tr>
            <?php endif; ?>
            <tr>
                <td>
                    <label >检查名称:</label>
                </td>
                <td colspan="2">
                    <span style="color: #0e90d2;font-weight: bold;"><?php echo $CheckInfoRow['CheckName']; ?></span>
                </td>
            </tr>
            <tr>
                <td style="width: 20%;">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-default">第 <?php echo $CurOrderID; ?> 条</button>
                        <button type="button" class="btn btn-sm btn-default dropdown-toggle"
                                data-toggle="dropdown" id="UL">
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" style="min-width: 15px;" id="DWUL" >

                        </ul>
                    </div>
                </td>
                <td style="width:50%;" colspan="2">
                    <div class="progress" style="margin-top:3px;">
                        <div  id="Pbar" class="progress-bar  progress-bar-default  progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                        <span class="" id="PBarSpan" >0%</span>
                    </div>
                    </div>
                </td>

            </tr>
            <tr>
                <td>
                    <label >判定标准:</label>
                </td>
                <td colspan="2">
                <textarea class="form-control" style="height: 150px;" disabled="disabled"><?php echo $CheckRowData['ComplianceStandard']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label >检查对象:</label>
                </td>
                <td>
                    <label class="label label-warning"><?php echo $CheckInfoRow['DutyCorp']; ?></label>
                </td>
            </tr>
            <tr>
                <td>
                    <label >检查状态:</label>
                </td>
                <td colspan="2">
                    <?php if($CheckRowData['IsOk'] != ''): ?>
                        <label class="label label-success" style="margin-left: 5px;">本条已被<?php echo trim($CheckRowData['Checker']); ?>检查</label>
                    <?php else: ?>
                        <label class="label label-default" style="margin-left: 5px;">尚未检查</label>
                    <?php endif; ?>

                </td>
            </tr>
            <tr>
                <td>
                    <label >检查结果:</label>
                </td>
                <td colspan="2">
                    <div class="btn-group" role="group" >
                        <button SEL type="button" OK class="btn btn-default btn-sm " <?php if($CheckRowData['IsOk'] != ''): ?> disabled="disabled" <?php endif; ?>>符合</button>
                        <button SEL type="button" NotOK class="btn btn-default btn-sm" <?php if($CheckRowData['IsOk'] != ''): ?> disabled="disabled" <?php endif; ?>>不符合</button>
                        <a id="FeedBack"    style="margin-left: 50px;" class="btn btn-sm btn-default">反馈<?php if($CheckRowData['FeedBack'] != ''): ?><div class="badge">1</div><?php endif; ?></a>
                    </div>
                </td>
            </tr>
            <?php if($CheckRowData['IsOk'] == ''): ?>
                <tr style="display:none;" DEALTR>
                    <td>
                        <label >处理类型:</label>
                    </td>
                    <td colspan="2">
                        <div class="btn-group" role="group" >
                            <button DEAL type="button" QsSubmit class="btn btn-default btn-sm">提交问题</button>
                            <button DEAL type="button" FastReform class="btn btn-default btn-sm">下发立即整改</button>
                        </div>
                    </td>
                </tr>
                <tr >
                    <td>
                        <label >确认:</label>
                    </td>
                    <td colspan="2">
                        <div class="btn-group" role="group" >
                            <button NEXT type="submit"  class="btn btn-success btn-sm">本条款检查完毕</button>
                            <a id="ExitFinish"    style="margin-left: 50px;" class="btn btn-sm btn-danger">临时离开</a>
                        </div>
                    </td>
                </tr>
            <?php endif; if($CheckRowData['IsOk'] == 'NO'): ?>
                <tr >
                    <td>
                        <label >处理类型:</label>
                    </td>
                    <td colspan="2">
                        <a href="#"><?php echo $CheckRowData['DealType']; ?></a>
                    </td>
                </tr>
            <?php endif; if($CheckRowData['IsOk'] != ''): ?>
                <tr >
                    <td>
                        <label >下一条:</label>
                    </td>
                    <td colspan="2">

                            <button NEXT type="submit"  class="btn btn-default btn-sm">下一条</button>
                            <a id="CheckFinished"  type="submit"  style="margin-left: 50px;display: none;" class="btn btn-sm btn-success">查看检查完成</a>

                            <a id="ExitFinish"    style="margin-left: 50px;" class="btn btn-sm btn-danger">离开检查</a>

                    </td>
                </tr>
            <?php endif; ?>
    </tbody>
    </table>
    </div>

</form>
<script>

    function fomatFloat(src,pos){
        return Math.round(src*Math.pow(10, pos))/Math.pow(10, pos);
    }
    
    function updateCPT() {
        $o =  {'CheckListId':<?php echo $CheckListID; ?>};
        $.ajax({
            url:"/SafetyMng/Help/Ajax_GetCheckListCompleteStatus",
            data: JSON.stringify($o),
            type:'post',
            dataType:"json",
            success:function (data,textStatus) {
                $CPT = Math.floor(data.CPT*10000)/100;
                $('#Pbar').css('width',$CPT+'%');
                $('#PBarSpan').text($CPT+'%');
                $('#DWUL').empty();
                $Stats_Arr = data.Detail;
                $i = 0;
                $Stats_Arr.forEach(function ($v) {
                    //<li><a href="'.U('Exam/showNextSubject').'&Direction=Down&SubjectRankID='.$i.'" class="label-lg label-success">题'.$i.'
                    ++$i;
                    $('<li><a href="/SafetyMng/CheckTask/showOnlineCheckPage/CheckListID/'+<?php echo $CheckListID; ?>+'/CurOrderID/'+$i+'" class="label-lg label-'+$v.Status+'">第'+($i)+'条</a></li>').appendTo($('#DWUL'));
                });

                if($CPT>=100){
                    $('#CheckFinished').css('display','');
                }
            },
            error:function (XMLHttpRequest,textStatus,errorThrown) {
                layer.alert('设置状态失败!');
            }
        });
    }

    $(function () {

        $('button[OK]').click(function () {
            $(this).addClass('btn-success');
            $('button[NotOK]').removeClass('btn-warning');
            $('tr[DEALTR]').css('display','none');
            $('#CheckResult').val('YES');
        });

        $('button[NotOK]').click(function () {
            $(this).addClass('btn-warning');
            $('button[OK]').removeClass('btn-success');
            $('tr[DEALTR]').css('display','table-row');
            $('#CheckResult').val('NO');
        });


        $('button[QsSubmit]').click(function () {
            $(this).addClass('btn-danger');
            $('button[FastReform]').removeClass('btn-danger');
            window.open('/SafetyMng/CheckTask/showQuestionInputByCheckRow/CheckRowID/<?php echo $CheckRowData["id"]; ?>');
        });

        $('button[FastReform]').click(function () {
            $(this).addClass('btn-danger');
            $('button[QsSubmit]').removeClass('btn-danger');
            $(this).blur();
            window.open('/SafetyMng/CheckTask/showFastReformByCheckRow/CheckRowID/<?php echo $CheckRowData["id"]; ?>');
        });

       if($('#CheckResult').val()=='YES'){
           $('button[OK]').addClass('btn-success');
           $('button[NotOK]').removeClass('btn-warning');
       }else if($('#CheckResult').val()=='NO'){
           $('button[OK]').removeClass('btn-success');
           $('button[NotOK]').addClass('btn-warning');
           $('tr[DEALTR]').css('display','table-row');
       }

       $('#UL').click(function () {
           updateCPT();

       });
        updateCPT();
        $('#CheckFinished').click(function () {
            window.location = '/SafetyMng/CheckTask/showCheckIsFinished/CheckListID/<?php echo $CheckListID; ?>';
        });

        $('#ExitFinish').click(function () {
            layer.confirm('确定离开检查？离开不会丢失检查结果.', {
                btn: ['确定','取消'] //按钮
            }, function(){
                window.location = '/SafetyMng/MyRelatedQuestion';
            }, function(){

            });

        });
        $('#FeedBack').click(function () {
            layer.open({
                title:'检查条款问题反馈',
                type: 2,
                content: '/SafetyMng/CheckTask/showFeedBackPage/CheckRowID/<?php echo $CheckRowData["id"]; ?>',
                area: ['300px', '295px'],
                cancel:function () {
                    window.parent.location.reload();
                }
            });
        });

    });
</script>
</body>
</html>