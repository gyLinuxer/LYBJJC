<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:80:"/private/var/www/html/public/../application/safetymng/view/CheckTBMng/index.html";i:1552917797;s:60:"/private/var/www/html/application/safetymng/view/layout.html";i:1552876055;}*/ ?>
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
    <title>检查条款管理</title>
    <style>
        .xuxian{
            height:0;
            border-bottom:#000000 2px dashed;
        }
    </style>
</head>
<body class="container-full">
<div class="col-sm-11 col-sm-offset-1" >
    <div class="row">
        <div class="col-sm-10" style="margin-top: 10px;">
            <?php if($Warning != ''): ?>
            <div class="form-group">
                <div class="col-sm-12">
                    <div class="alert alert-danger" role="alert"><strong>提示：</strong><?php echo $Warning; ?></div>
                </div>
            </div>
            <?php endif; if($Warning == ''): ?>
            <div class="alert alert-success" role="alert">
                <strong>提示：</strong>本页面用来对检查数据库进行管理。
            </div>
            <?php endif; ?>

        </div>
    <table class="table table-bordered" style="max-width: 85%">
        <tr>
                <td style="width: 10%">
                    <span style="font-weight: bold;">操作模式:</span>
                </td>
                <td style="width: 25%">
                    <div class="btn-group" >
                        <a  type="button" name="AddBtn" id="AddBtn" opType="Add" MName="增加" class="btn btn-default ">增加</a>
                        <a  type="button" name="MdfBtn" id="MdfBtn" opType="Mdf" MName="修改" class="btn btn-default ">修改</a>
                        <a  type="button" name="DelBtn" id="DelBtn"  MName="删除" class="btn btn-default ">删除</a>
                    </div>
                </td>
                <td style="width: 10%">
                    <span style="font-weight: bold;">编号1:</span>
                </td>
                <td style="width: 20%">
                    <select class="form-control required"  name="Code1" id="Code1" LinkAge>

                    </select>
                </td>
                <td style="width: 10%">
                    <span style="font-weight: bold;">编号2:</span>
                </td>
                <td >
                    <select class="form-control required" data-tags="true"  name="Code2" id="Code2" LinkAge>
                    </select>
                </td>
                <td>
                    <a  class="btn btn-success">确定</a>
                </td>
        </tr>
        <tr>
        <div class="row">
            <td><span style="font-weight: bold;">数据库:</span></td>
            <td>
                <select class="form-control required"  name="CheckDB" id="CheckDB" LinkAge>
                    <option ></option>
                    <?php if(is_array($CheckDB) || $CheckDB instanceof \think\Collection || $CheckDB instanceof \think\Paginator): $i = 0; $__LIST__ = $CheckDB;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $vo['id']; ?>" ><?php echo $vo['BaseName']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </td>
            <td><span style="font-weight: bold;">检查内容:</span></td>
            <td colspan="">
                <select class="form-control required" data-tags="true" name="CheckContent" id="CheckContent" LinkAge>

                </select>
            </td>
            <td><span style="font-weight: bold;">检查标准:</span></td>
            <td colspan="2">
                <select class="form-control required"  name="CheckStandard"  id="CheckStandard">

                </select>
            </td>

        </div >
        </tr>
        <tr>
            <td ><span style="font-weight: bold;">专业名称:</span></td>
            <td >
                <select class="form-control required"  name="ProfessionName" id="ProfessionName" LinkAge>
                    <option></option>
                </select>
            </td>
            <td rowspan="4" colspan="5">
                <textarea class="form-control" style="height: 200px;"></textarea>
            </td>
        </tr>
        <tr>
                <td >
                    <span style="font-weight: bold;">业务名称:</span>
                </td>
                <td >
                    <select class="form-control required"  name="BusinessName"  id="BusinessName" LinkAge>

                    </select>
                </td>

        </tr>
        <tr>
             <td ><span style="font-weight: bold;">检查项目:</span></td>
                <td >
                    <select class="form-control required"  name="CheckSubject"  id="CheckSubject" LinkAge>

                    </select>
                </td>
            </div>
        </tr>
        <tr>
            <td><span style="font-weight: bold;">责任部门:</span></td>
            <td >
                <select class="form-control required"  name="RelatedCorps"  id="RelatedCorps" >

                </select>
            </td>
        </tr>
    </table>

    <div class="row " style="margin-top: 15px;">
        <div class="col-sm-10 xuxian"></div>
    </div>
    <div class="row" style="margin-top: 15px;">
        <div class="col-sm-10" style="padding: 0px;">
            <div id = "gyDiv" class="row pre-scrollable" style="overflow:scroll; width:100%;">
                <table class="table  table-bordered bootstrap-datatable datatable table-hover responsive" style="min-width: 400%;min-height:300px;margin-left: 20px">
                    <thead>
                    <tr>
                        <!----  FlightData表字段列表
                         `类别``航班号``航班状态``执行日期``起飞机场``预计起飞``实际起飞``目的机场``预计到达``实际到达``
                         注册号``SSR``备降机场一``备降机场二``PBN``飞行计划``飞行时间``飞行计划``飞行规则``飞行种类`
                         `备注``高度``架次``RVSM``其他情报``监视设备``降落机场``尾流``速度``通导设备``计划起飞``计划到达``航路`
                         --->
                        <th>序号</th>
                        <th>类别</th>
                        <th>航班号</th><!-- 生成类型 航空公司　起点　终点　航班类型--->
                        <th>航班状态</th>
                        <th>执行日期</th>
                        <th>起飞机场</th><!-- 航空公司　机号　机型　座位总数-->
                        <th>目的机场</th>
                        <th>计划起飞</th>
                        <th>计划到达</th>
                        <th>实际起飞</th>
                        <th>预计到达</th>
                        <th>实际到达</th>
                        <th >注册号</th>
                        <th>机型</th>
                        <th >SSR</th>
                        <th>备降机场一</th>
                        <th>备降机场二</th>
                        <th>PBN</th>
                        <th>飞行时间</th>
                        <th>飞行规则</th>
                        <th>飞行种类</th>
                        <th>备注</th>
                        <th>高度</th>
                        <th>架次</th>
                        <th>RVSM</th>
                        <th>其他情报</th>
                        <th>监视设备</th>
                        <th>降落机场</th>
                        <th>尾流</th>
                        <th>速度</th>
                        <th>通导设备</th>
                        <th>航路</th>
                    </thead>
                    <tbody>
                    <volist name="CurFlightData" id="vo">
                        <tr>
                            <td>
                                <?php echo $vo['id']; ?>
                            </td>
                            <td>
                                <?php echo $vo.类别; ?>
                            </td>
                            <td>
                                <a href="#"  ShowFlightHistory FlightID = "<?php echo $vo['id']; ?>"><?php echo $vo.航班号; ?></a>
                            </td>
                            <td>
                                <?php echo $vo.航班状态; ?>
                            </td>
                            <td>
                                <?php echo $vo.执行日期; ?>
                            </td>
                            <td>
                                <?php echo $vo.起飞机场; ?>
                            </td>
                            <td>
                                <?php echo $vo.目的机场; ?>
                            </td>
                            <td>
                                <?php echo $vo.计划起飞; ?>
                            </td>
                            <td>
                                <?php echo $vo.计划到达; ?>
                            </td>
                            <td>
                                <?php echo $vo.实际起飞; ?>
                            </td>
                            <td>
                                <?php echo $vo.预计到达; ?>
                            </td>
                            <td>
                                <?php echo $vo.实际到达; ?>
                            </td>
                            <td>
                                <?php echo $vo.注册号; ?>
                            </td>
                            <td>
                                <?php echo $vo.机型; ?>
                            </td>
                            <td>
                                <?php echo $vo['SSR']; ?>
                            </td>
                            <td>
                                <?php echo $vo.备降机场一; ?>
                            </td>
                            <td>
                                <?php echo $vo.备降机场二; ?>
                            </td>
                            <td>
                                <?php echo $vo['PBN']; ?>
                            </td>
                            <td>
                                <?php echo $vo.飞行时间; ?>
                            </td>
                            <td>
                                <?php echo $vo.飞行规则; ?>
                            </td>
                            <td>
                                <?php echo $vo.飞行种类; ?>
                            </td>
                            <td>
                                <?php echo $vo.备注; ?>
                            </td>
                            <td>
                                <?php echo $vo.高度; ?>
                            </td>
                            <td>
                                <?php echo $vo.架次; ?>
                            </td>
                            <td>
                                <?php echo $vo['RVSM']; ?>
                            </td>
                            <td>
                                <?php echo $vo.其他情报; ?>
                            </td>
                            <td>
                                <?php echo $vo.监视设备; ?>
                            </td>
                            <td>
                                <?php echo $vo.降落机场; ?>
                            </td>
                            <td>
                                <?php echo $vo.尾流; ?>
                            </td>
                            <td>
                                <?php echo $vo.速度; ?>
                            </td>
                            <td>
                                <?php echo $vo.通导设备; ?>
                            </td>
                            <td>
                                <?php echo $vo.航路; ?>
                            </td>
                        </tr>
                    </volist>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<input type="hidden" id="opType" name="opType" value=""/>
</body>
<script>
    function SelectLinkage (SelID) {
        $Pv = [];
        $SelArr = ['CheckDB','ProfessionName','BusinessName','Code1','Code2','CheckSubject','CheckContent','CheckStandard'];
        $SelArr.forEach(function (v) {
            $r = {'SelName':v,'SelText':$('#'+v + ' option:selected').text(),'SelVal':$('#'+v).val()};
            $Pv.push($r);
        });
        $PostData = {"EventSel":SelID,'data':$Pv};
        $.ajax({
            url:"/SafetyMng/Help/Ajax_SelectLinkage",
            data: JSON.stringify($PostData),
            type:'post',
            dataType:"json",
            success:function (data,textStatus) {
                $TargetSel = data['TargetSel'];
                $SelData = data['data'];
                //alert($TargetSel);
                $bBegin = false;
                $SelArr.forEach(function (v) {
                    if($bBegin){
                        $('#'+v).html('').select2('data', null);
                    }
                    if(v==SelID){
                        $bBegin =true;
                    }
                });
                $('#'+$TargetSel).select2({data:$SelData});
                $('#'+$TargetSel).val('').select2();
            },
            error:function (XMLHttpRequest,textStatus,errorThrown) {

            }
        });
    }

     $(function () {
         $("a[opType]").bind('click',function () {
             layer.open({
                 title:'维护',
                 type: 2,
                 content: '/SafetyMng/CheckTBMng/showFirstHalfCheckRowMng.html',
                 area: ['500px', '600px']
             });
         });

        $('select[LinkAge]').on("change", function(e) {
             SelectLinkage($(this).attr('id'))
         });

        $('select').select2();
    });
</script>
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
