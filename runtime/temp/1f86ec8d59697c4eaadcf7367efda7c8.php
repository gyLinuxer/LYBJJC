<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/private/var/www/html/public/../application/safetymng/view/Login/index1.html";i:1552697181;}*/ ?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=0.95">
    <meta charset="UTF-8">
    <title>维修单位质量追踪与安全管理系统平台 v1.0</title>
    <script>

    </script>
    <!-- The styles -->
    <link id="bs-css" href="/static/css/bootstrap-cerulean.min.css" rel="stylesheet">
    <link href='/static/bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>    <!-- jQuery -->
    <script src="/static/bower_components/jquery/jquery.min.js"></script>
    <script src="/static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src='/static/js/jquery.dataTables.min.js'></script>
    <script src="/static/bower_components/responsive-tables/responsive-tables.js"></script>
    <script src="/static/js/charisma.js"></script>
    <link href="/static/css/charisma-app.css" rel="stylesheet">
</head>
<body>
<div class="ch-container">
    <div class="row">

        <div class="row">
            <div class="col-md-12 center login-header">
                <h2>维修单位质量追踪与安全管理系统平台 v1.0</h2>
            </div>
            <!--/span-->
        </div><!--/row-->

        <div class="row">
            <div class="well col-md-5 center login-box">
                <div class="alert alert-info">
                   请输入用户密码（不区分大小写）
                </div>
                <form class="form-horizontal" action="/SafetyMng/Login/Login.html" enctype="multipart/form-data" method="post">
                    <fieldset>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                            <input type="text" name="aU" class="form-control" placeholder="用户名">
                        </div>
                        <div class="clearfix"></div><br>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                            <input type="password" name ="bP" class="form-control" placeholder="密码">
                        </div>
                        <div class="clearfix"></div>
                        <div class="clearfix"></div>
                        <div class="form-group" style="margin-top: 20px">
                            <div class="col-sm-12">
                                <?php if($Warning != ''): ?>
                                    <div class="alert alert-danger" role="alert"><strong>提示：</strong><?php echo $Warning; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <p class="center col-md-5">
                            <button type="submit" class="btn btn-primary">登陆</button>
                        </p>
                    </fieldset>
                </form>
            </div>
            <!--/span-->
        </div><!--/row-->
    </div><!--/fluid-row-->

</div><!--/.fluid-container-->
</body>
</html>