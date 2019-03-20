<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:96:"/private/var/www/html/public/../application/safetymng/view/CheckTBMng/SecondHalfCheckRowMng.html";i:1553043749;}*/ ?>

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

    <link href='/static/css/MyCss.css' rel='stylesheet'>
    <link id="bs-css" href="/static/css/bootstrap.css" rel="stylesheet">

    <link href="/static/css/bootstrap-table.css" rel="stylesheet">
    <link href="/static/css/dialog.css" rel="stylesheet">
    <script src="/static/js/dialog-plus.js"></script>
    <script src="/static/js/dialog.js"></script>
    <script src="/static/js/jquery.js"></script>
    <script src="/static/js//bootstrap.js"></script>
    <link href="/static/css/summernote.css" rel="stylesheet">
    <script src="/static/js/summernote.js"></script>
    <script src="/static/js/gyComm.js"></script>
    <link href="/static/css/select2.min.css" rel="stylesheet" />
    <script src="/static/js/select2.min.js"></script>
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
</head>
<body class="container-full" >
<form id="mForm" action="/SafetyMng/CheckTBMng/SecondHalfCheckRowMng/opType/<?php echo $opType; ?>/CheckStandard/<?php echo $CheckStandardID; ?>/id/<?php echo $id; ?>" method="post" enctype="application/x-www-form-urlencoded">
    <input type="hidden" name="CheckStandardID" id="CheckStandardID"  value="<?php echo $CheckStandardID; ?>"/>
    <input type="hidden" name="rowId" name="rowId"   value="<?php echo $CheckStandardID; ?>"/>
    <div class="col-sm-8 col-sm-offset-2" >
        <div class="row">
            <div class="col-sm-10" style="margin-top: 10px;">
                <?php if($Warning != ''): ?>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="alert alert-danger" role="alert"><strong>提示：</strong><?php echo $Warning; ?></div>
                    </div>
                </div>
                <?php endif; if($Warning == ''): ?>
                <div class="alert alert-warning" role="alert">
                    <strong>提示：</strong>本页面用来对检查条款进行管理。
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-3 col-sm-offset-1 col-xs-3 col-xs-offset-1" ><span style="font-weight: bold;">检查标准:</span></div>
            <div class="col-xs-8 col-xs-8">
                <textarea   id="CheckStandard" disabled="disabled" class="form-control" style="width: 100%;height: 100px;"><?php echo $CheckStandard; ?></textarea>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-3 col-sm-offset-1 col-xs-3 col-xs-offset-1" ><span style="font-weight: bold;">符合性标准:</span></div>
            <div class="col-xs-8 col-xs-8">
                <textarea   id="ComplianceStandard"  name="ComplianceStandard" class="form-control" style="width: 100%;height: 100px;"><?php echo $ComplianceStandardRow['ComplianceStandard']; ?></textarea>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-3 col-sm-offset-1 col-xs-3 col-xs-offset-1"><span style="font-weight: bold;">依据名称:</span></div>
            <div class="col-sm-8 col-xs-8">
                <input class="form-control" name="BasisName" value="<?php echo $ComplianceStandardRow['BasisName']; ?>"/>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-3 col-sm-offset-1 col-xs-3 col-xs-offset-1" ><span style="font-weight: bold;">依据条款:</span></div>
            <div class="col-sm-8 col-xs-8">
                <input class="form-control" name="BasisTerm" value="<?php echo $ComplianceStandardRow['BasisTerm']; ?>"/>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-3 col-sm-offset-1 col-xs-3 col-xs-offset-1"><span style="font-weight: bold;">检查方式:</span></div>
            <div class="col-sm-8 col-xs-8">
                <select class="form-control required" data-tags="true" name="CheckMethods[]"  multiple="multiple" id="CheckMethods" LinkAge>
                    <option >现场文件审查</option>
                    <option >远程文件审查</option>
                    <option >现场实地审查</option>
                    <option >远程视频审查</option>
                </select>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-3 col-sm-offset-1 col-xs-3 col-xs-offset-1"><span style="font-weight: bold;">责任部门:</span></div>
            <div class="col-sm-8 col-xs-8">
                <select class="form-control required" data-tags="true" name="RelatedCorps[]"  multiple="multiple" id="RelatedCorps" LinkAge>
                    <?php if(is_array($CorpList) || $CorpList instanceof \think\Collection || $CorpList instanceof \think\Paginator): $i = 0; $__LIST__ = $CorpList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $vo['Corp']; ?>" ><?php echo $vo['Corp']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-3 col-sm-offset-1 col-xs-3 col-xs-offset-1"><span style="font-weight: bold;">检查频次:</span></div>
            <div class="col-sm-8 col-xs-8">
                <input class="form-control" name="CheckFrequency" value="<?php echo $ComplianceStandardRow['CheckFrequency']; ?>"/>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;margin-bottom: 20px;">
            <div class="col-sm-3 col-sm-offset-2 col-xs-3 col-xs-offset-1"><span style="font-weight: bold;">操作:</span></div>
            <div class="col-xs-8 col-xs-8">
                <div class="col-sm-offset-2 col-xs-offset-2">
                    <button type="submit" class="btn btn-success" >保存</button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="CurRowId" name="CurRowId" value="0"/>
</form>

<script>
    $CheckMethods = <?php echo (isset($CheckMethods) && ($CheckMethods !== '')?$CheckMethods:[]); ?>;
    $RelatedCorps = <?php echo (isset($RelatedCorps) && ($RelatedCorps !== '')?$RelatedCorps:[]); ?>;
    $(function () {
        $('select').select2();
        $('#CheckMethods').val($CheckMethods).change();
        $('#RelatedCorps').val($RelatedCorps).change();
    });
</script>
</body>
</html>