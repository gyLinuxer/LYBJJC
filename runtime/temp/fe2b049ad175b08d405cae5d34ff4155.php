<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"/private/var/www/html/public/../application/safetymng/view/TaskCore/TaskAlign.html";i:1552875936;}*/ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
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

    <!-- jQuery -->
    <script src="/static/bower_components/jquery/jquery.min.js"></script>


    <script src="/static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

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
    <script src="/static/js/jquery.raty.min.js"></script>
    <script src="/static/js/moment.js"></script>
    <!-- for iOS style toggle switch -->
    <script src="/static/js/jquery.iphone.toggle.js"></script>
    <!-- autogrowing textarea plugin -->
    <script src="/static/js/jquery.autogrow-textarea.js"></script>
    <!-- multiple file upload plugin -->
    <script src="/static/js/jquery.uploadify-3.1.min.js"></script>
    <!-- history.js for cross-browser state change on ajax -->
    <script src="/static/js/jquery.history.js"></script>
    <link rel="shortcut icon" href="/static/img/favicon.ico">
    <script type="text/javascript" src="/static/ckeditor/ckeditor.js"></script>
    <script src="/static/js/gyComm.js"></script>
    <script src="/static/js/jquery-ui.min.js"></script>
    <link href="/static/css/select2.min.css" rel="stylesheet" />
    <script src="/static/js/select2.min.js"></script>
</head>
<body class="container-full">
<div class="col-sm-8 col-sm-offset-2" style="margin-top: 20px;">
    <form class="form-horizontal" method="post" enctype="multipart/form-data" action="/SafetyMng/TaskCore/TaskAlign.html">
        <div class="form-group">
            <input type="hidden" name="TaskID" value="<?php echo $TaskID; ?>"/>
            <label for="ManagerSelect" class="col-sm-2 control-label">任务组长:</label>
            <div class="col-sm-3" style="width: 300px">
                <select Select2 class="form-control" name="ManagerSelect" id="ManagerSelect">
                    <option ></option>
                    <?php if(is_array($PersonList) || $PersonList instanceof \think\Collection || $PersonList instanceof \think\Paginator): $i = 0; $__LIST__ = $PersonList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <option ><?php echo $vo['Name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <input type="hidden" name="TaskID" value="<?php echo $TaskID; ?>"/>
            <label for="ManagerSelect" class="col-sm-2 control-label">成员:</label>
            <div class="col-sm-3"  style="width: 300px;">
                <select class="form-control" name="GroupDealer[]" id="GroupDealer" multiple="multiple" >
                    <option ></option>
                    <?php if(is_array($PersonList) || $PersonList instanceof \think\Collection || $PersonList instanceof \think\Paginator): $i = 0; $__LIST__ = $PersonList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <option ><?php echo $vo['Name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="TaskMsg" class="col-sm-2 control-label">要求:</label>
            <div class="col-sm-10">
                <textarea id="TaskMsg" name="TaskMsg" style="width: 270px;height: 200px;"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <button type="submit" style="margin-left:35%" class="btn btn-primary">分配</button>
            </div>
        </div>
    </form>
</div>


<script>
    $(function () {
        $('select').select2();
    });
</script>
</body>
</html>