<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"/private/var/www/html/public/../application/safetymng/view/TaskList/index.html";i:1555540121;s:60:"/private/var/www/html/application/safetymng/view/layout.html";i:1555119853;}*/ ?>
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
    <title>Title</title>
    <style>
        .table>tbody>tr:hover {

        }
    </style>
</head>
<body>
<form id ="mForm" method="post" action="/SafetyMng/TaskList/Index.html">
<ul id="myTab" class="nav nav-tabs" >
<li id="QuestionMng" class="<?php if($ActiveLI == 'QuestionMng'): ?>active<?php endif; ?>">
    <a href="#home" aria-controls="closetab" role="tab" data-toggle="tab">
        <span>收到的问题列表<span class="badge"><?php echo $QCnt; ?></span></span>
    </a>
</li>
<li id="LiReformList" class="<?php if($ActiveLI == 'LiReformList'): ?>active<?php endif; ?>">
    <a href="#ReformList" id="aReformList" data-toggle="tab">
        整改通知书列表<span class="badge"><?php echo $RFCnt; ?></span>
    </a>
</li>
<li id="LiOnlineCheckList" class="<?php if($ActiveLI == 'LiOnlineCheckList'): ?>active<?php endif; ?>">
    <a href="#OnlineCheckList" id="aLiOnlineCheckList" data-toggle="tab">
        在线检查任务列表<span class="badge"><?php echo $OCCnt; ?></span>
    </a>
</li>
    <li id="Li2019FDZC" class="<?php if($ActiveLI == 'LiFDZC'): ?>active<?php endif; ?>">
    <a href="#DivLi2019FDZC" id="aLi2019FDZC" data-toggle="tab">
        2019年维修单位法定自查及自审整改进度专项汇总单<span class="badge"><?php echo $FDZCQsCnt; ?></span>
    </a>
    </li>
</ul>
<div id="myTabContent" class="tab-content">
      <div class="tab-pane <?php if($ActiveLI == 'QuestionMng'): ?>active<?php endif; ?>" id="home" style="">
            <div class="col-sm-12" style="margin-top: 20px;">
                <table class="table table-hover table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                    <tr>
                        <th>编号</th>
                        <th>任务类型</th>
                        <th>任务名称</th>
                        <th>来自</th>
                        <th>处理小组</th>
                        <th>消息</th>
                        <?php if(\think\Session::get('CorpRole') == '领导'): ?>
                            <th>分配任务</th>
                        <?php endif; ?>
                        <th>当前状态</th>
                        <th>关闭</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($QTaskList) || $QTaskList instanceof \think\Collection || $QTaskList instanceof \think\Paginator): $i = 0; $__LIST__ = $QTaskList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td>
                            <?php echo $Cnt++; ?>
                        </td>
                        <td>
                            <?php 
                                $TC = new app\safetymng\controller\TaskCore;
                                $color = "";
                                if($vo["TaskType"]== $TC::QUESTION_SUBMITED ){
                                    $color = "label-default";
                                }else if($vo["TaskType"]==$TC::QUESTION_REFORM){
                                    $color = "label-danger";
                                }else if($vo["TaskType"]==$TC::REFORM_SUBTASK){
                                    $color = "label-danger";
                                }else if($vo["TaskType"]==$TC::QUESTION_FAST_REFORM){
                                    $color = "label-warning";
                                }else if($vo["TaskType"]==$TC::ONLINE_CheckTask){
                                    $color = "label-success";
                            }
                                echo  "<label class=\"label ".$color."\">".$vo["TaskType"]."</span>";
                             ?>

                        </td>
                        <td class="col-sm-4">
                            <a  href="<?php  echo $TC::GetTaskMngUrlByTaskID($vo['id']); ?>"  style="color: #00A000;" rowId = "<?php echo $vo['id']; ?>" showQuestionMng TaskID = "<?php echo $vo['id']; ?>"><?php echo $vo['TaskName']; ?></a>
                        </td>
                        <td>
                            <?php echo $vo['SenderCorp']; ?>(<?php echo $vo['SenderName']; ?>)
                        </td>
                        <td>
                            <?php echo $vo['GroupMember']; ?>
                        </td>
                        <td>
                            <a  rowId = "<?php echo $vo['id']; ?>" MsgView>查看<?php echo $MsgCount; ?></a>
                        </td>
                        <?php if(\think\Session::get('CorpRole') == '领导'): ?>

                            <td>
                                <?php if($vo['GroupMember'] == ''): ?>
                                    <a class="btn btn-default btn-sm" TaskAlign rowId = "<?php echo $vo['id']; ?>">分配任务</a>
                                <?php else: ?>
                                    <span style="color: #48484c;">已分配</span>
                                <?php endif; ?>
                            </td>
                        <?php endif; ?>
                        <td>
                            <?php echo $vo['TaskInnerStatus']; ?>
                        </td>
                        <td>
                            <a class="btn btn-info btn-sm" CloseTask rowId = "<?php echo $vo['id']; ?>">关闭</a>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
       </div>
          <div class="tab-pane <?php if($ActiveLI == 'LiReformList'): ?>active<?php endif; ?>" id="ReformList" style="">
            <div style=" width:100%;margin-top: 20px;">
                <table class="table table-hover table-bordered bootstrap-datatable datatable responsive" >
                    <thead>
                    <tr>
                        <th >序号</th>
                        <th style="width: 200px;">整改通知单编号</th>
                        <th class="col-sm-3">标题</th>
                        <th style="width: 80px;">督查部门</th>
                        <th style="width: 80px;">责任部门</th>
                        <th >当前状态</th>
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
                            <a  TXTZS ChildTaskID = "<?php echo $vo['ChildTaskID']; ?>" DutyCorp = <?php echo $vo['DutyCorp']; ?> CurCorp = <?php echo \think\Session::get('Corp'); ?> TaskID = "<?php echo $vo['ParentTaskID']; ?>" Code="RM<?php echo $vo['id']; ?>" rowId = "<?php echo $vo['id']; ?>" RCode = <?php echo $vo['Code']; ?>> <?php echo $vo['ReformTitle']; ?></a>

                        </td>
                        <td>
                            <?php if($vo['IssueCorp'] != '质检科'): ?>
                                <span style="color: #0d7bdc;font-weight: bolder;"> <?php echo $vo['IssueCorp']; ?></span>
                            <?php else: ?>
                                <span> <?php echo $vo['IssueCorp']; ?></span>
                            <?php endif; ?>
                        </td>
                        <td>
                           <?php echo $vo['DutyCorp']; ?>
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
        </div>
    <div class="tab-pane <?php if($ActiveLI == 'LiOnlineCheckList'): ?>active<?php endif; ?>" id="OnlineCheckList" style="">
        <div style=" width:100%;margin-top: 20px;">
            <table class="table table-hover table-bordered bootstrap-datatable datatable responsive" >
        <thead>
        <tr>
            <th >序号</th>
            <th style="width: 200px;"> 检查编号</th>
            <th>任务标题</th>
            <th>检查对象</th>
            <th>计划日期</th>
            <th>检查组</th>
            <th>条款数量</th>
            <th>当前状态</th>
            <th>进度</th>
            <th>已花费时长</th>
            <th>关闭</th>
        </tr>
        </thead>
        <tbody>
        <?php 
            $CT = new app\safetymng\controller\CheckTask();
            $TC = new app\safetymng\controller\TaskCore();
         if(is_array($OCTaskList) || $OCTaskList instanceof \think\Collection || $OCTaskList instanceof \think\Paginator): $i = 0; $__LIST__ = $OCTaskList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
            <td>
                <?php echo ++$OnlineCheckTaskCnt; ?>
            </td>
            <td>
                <span style="font-size: smaller;color:#0e90d2 "><?php echo $vo['CheckCode']; ?></span>
            </td>
            <td>
                <a  href="<?php  echo $TC::GetTaskMngUrlByTaskID($vo['TaskID']); ?>"  style="color: #00A000;" rowId = "<?php echo $vo['TaskID']; ?>" showQuestionMng TaskID = "<?php echo $vo['TaskID']; ?>"> <?php echo $vo['CheckName']; ?></a>

            </td>
            <td>
                <label  class="label label-warning"><?php echo $vo['DutyCorp']; ?></label>

            </td>
            <td>
                <?php echo $vo['ScheduleDate']; ?>
            </td>
            <td>
                <?php echo $vo['Checkers']; ?>
            </td>
            <td>
                <label class="label label-default" > <?php   echo $CT->GetCheckunOKRowCnt($vo['CheckListID']);   ?>/<?php echo $vo['CheckRowCnt']; ?>项</label>

            </td>
            <td>
                <?php if($vo['Status']  == '检查已结束'): ?><label   class="label label-success">检查已结束</label>
                <?php elseif($vo['Status'] == '检查已开始'): ?><label  class="label label-warning">检查已开始</label>
                <?php else: ?> <label class="label label-default" ><?php echo $vo['Status']; ?></label>
                <?php endif; ?>

            </td>
            <td>
                <?php   echo $CT->GetCheckListCompleteProgress($vo['CheckListID']);   ?>
            </td>
            <td>
                <?php   echo $CT->GetCheckTimeCostStr($CT->GetCheckCostTime($vo['CheckListID']));   ?>
            </td>
            <td>
                <a class="btn btn-info btn-sm" CloseTask rowId = "<?php echo $vo['TaskID']; ?>">关闭</a>
            </td>
         </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
         </tbody>
         </table>
        </div>
    </div>

    <div class="tab-pane <?php if($ActiveLI == 'Li2019FDZC'): ?>active<?php endif; ?>" id="DivLi2019FDZC" style="">
        <div style=" width:100%;margin-top: 20px;">
            <h2 style="text-align: center;">2019年洛阳分院维修单位法定自查及自我质量审核问题整改实时汇总单</h2>
            <hr/>
            <table class="table  table-bordered bootstrap-datatable datatable table-hover responsive"  >
                <thead>
                <tr>
                    <th style="width: 20px;">序号</th>
                    <th style="width: 120px;">检查项目</th>
                    <th class="col-sm-3">问题标题</th>
                    <th style="width: 80px;">检查人</th>
                    <th style="width: 80px;">问题单位</th>
                    <th class="col-sm-1">通知书状态</th>
                    <th >纠正措施</th>
                    <th style="width: 100px;">纠正期限</th>
                    <th >预防措施</th>
                    <th style="width: 100px;">预防期限</th>
                </thead>
                <tbody >
                <?php 
                $RF = new app\safetymng\controller\Reform();
                 if(is_array($FDZC2019RetList) || $FDZC2019RetList instanceof \think\Collection || $FDZC2019RetList instanceof \think\Paginator): $i = 0; $__LIST__ = $FDZC2019RetList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr >
                    <td>
                        <?php echo ++$xh; ?>
                    </td>
                    <td>
                        <?php echo $vo['CheckSubject']; ?>
                    </td>

                    <td>
                        <a href="javascript:;" showTaskCoreInfo TaskID = "<?php echo $vo['RelatedTaskID']; ?>"><?php echo $vo['QuestionTitle']; ?></a>
                    </td>
                    <td>
                        <?php echo $vo['Finder']; ?>
                    </td>
                    <td>
                        <?php echo $vo['DutyCorp']; ?>
                    </td>
                    <td><label class="label label-<?php echo $RF->GetReformStatusColor($vo['ReformStatus']); ?>"><?php echo $vo['ReformStatus']; ?><label></td>
                    <td>
                        <?php echo $vo['CorrectiveAction']; ?>
                    </td>
                    <td>
                        <?php echo $vo['CorrectiveDeadline']; ?>
                    </td>
                    <td>
                        <?php echo $vo['PrecautionAction']; ?>
                    </td>
                    <td>
                        <?php echo $vo['PrecautionDeadline']; ?>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</form>
</body>
<script>
$(function () {

    $('a[XFZG]').click(function () {
        window.location = '/SafetyMng/Reform/SendReform/TaskID/'+$(this).attr('TaskID')+'/ReformID/'+$(this).attr('rowID')+'/Platform/_SafetyMng_TaskList_Index_ActiveLi_LiReformList';
    });

    $('a[TXTZS]').click(function () {
        $RealTaskID = $(this).attr('DutyCorp')==$(this).attr('CurCorp')?$(this).attr('ChildTaskID'):$(this).attr('TaskID');
        window.open('/SafetyMng/Reform/Index/TaskID/'+$RealTaskID+'/ReformID/'+$(this).attr("rowId")+'/opType/Mdf');
    });

    $('#myModal').on('hidden.bs.modal', function (e) {
        $("#mForm").submit();
    });
    $("a[TaskAlign]").bind('click',function () {
        layer.open({
            title:'任务分配',
            type: 2,
            content: "/SafetyMng/TaskCore/showTaskAlign/TaskID/"+$(this).attr("rowId"),
            area: ['300px', '500px']
        });
    });

    $("a[CloseTask]").bind('click',function () {
        layer.open({
            title:'关闭任务',
            type: 2,
            content: "/SafetyMng/TaskCore/showCloseTask/TaskID/"+$(this).attr("rowId"),
            area: ['300px', '260px'],
            end:function () {
               parent.window.location.reload();
            }
        });
    });

    $("a[MsgView]").bind('click',function () {
        var d1 = dialog({
            title: '任务消息',
            url: "/SafetyMng/TaskCore/showMsg/TaskID/"+$(this).attr("rowId"),
            width:440,
            okValue:'已阅',
            ok: function () {}
        });
        d1.showModal();
    });
    $("a[ShowMyOrentalLog]").bind('click',function () {
        $("#frm1").attr("src","/Index/StoreOrentalLog/index/id/"+ ""+$(this).attr("rowId"));
    });


    <?php if(\think\Session::get('Corp') == '质检科'): ?>
    $('input[EnableDel]').click(function () {
        if($(this).is(":checked")){
            $("a[BtnID=DelBtn"+$(this).attr('rowId')+"]").removeAttr('disabled');
        }else{
            $("a[BtnID=DelBtn"+$(this).attr('rowId')+"]").attr('disabled','disabled');
        }
    });
    $('a[DelBtn]').click(function () {
        layer.open({
            title:'删除整改通知书',
            type: 2,
            content: "/SafetyMng/Reform/showDeleteReform/ReformID/"+$(this).attr("rowId"),
            area: ['530px', '400px']
        });
    });
    <?php endif; ?>

        $('a[showTaskCoreInfo]').click(function () {
            layer.open({
                type: 2,
                title: false,
                area: ['680px', '750px'],
                shade: 0.8,
                closeBtn: 0,
                scrollbar: false,
                shadeClose: true,
                content: '/SafetyMng/TaskCore/showTaskCoreInfoPage/TaskID/'+$(this).attr('TaskID')
            });
        });

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
