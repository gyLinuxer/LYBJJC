<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:95:"/private/var/www/html/public/../application/safetymng/view/CheckTBMng/FirstHalfCheckRowMng.html";i:1552999037;}*/ ?>

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
<form id="mForm" action="/SafetyMng/CheckTBMng/FirstHalfCheckRowMng/opType/<?php echo $opType; ?>" method="post" enctype="application/x-www-form-urlencoded">
    <input type="hidden" name="rowId" id="rowId"  value="<?php echo $id; ?>"/>
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
            <div class="col-sm-3 col-sm-offset-1 col-xs-3 col-xs-offset-1"><span style="font-weight: bold;">数据库:</span></div>
            <div class="col-sm-8 col-xs-8">
                <select class="form-control required"  name="CheckDB" id="CheckDB" LinkAge>
                    <option ></option>
                    <?php if(is_array($CheckDB) || $CheckDB instanceof \think\Collection || $CheckDB instanceof \think\Paginator): $i = 0; $__LIST__ = $CheckDB;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $vo['id']; ?>" ><?php echo $vo['BaseName']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-3 col-sm-offset-1 col-xs-3 col-xs-offset-1"><span style="font-weight: bold;">专业名称:</span></div>
            <div class="col-sm-8 col-xs-8">
                <select class="form-control required" data-tags="true" name="ProfessionName" id="ProfessionName" LinkAge>
                    <option ></option>
                </select>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-3 col-sm-offset-1 col-xs-3 col-xs-offset-1" ><span style="font-weight: bold;">业务名称:</span></div>
            <div class="col-sm-8 col-xs-8">
                <select class="form-control required" data-tags="true" name="BusinessName"  id="BusinessName" LinkAge>
                    <option ></option>
                </select>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-3 col-sm-offset-1 col-xs-3 col-xs-offset-1"><span style="font-weight: bold;">检查项目:</span></div>
            <div class="col-sm-8 col-xs-8">
                <select class="form-control required" data-tags="true" name="CheckSubject"  id="CheckSubject" LinkAge>
                    <option ></option>
                </select>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-3 col-sm-offset-1 col-xs-3 col-xs-offset-1"><span style="font-weight: bold;">编号1:</span></div>
            <div class="col-sm-8 col-xs-8">
                <select class="form-control required" data-tags="true"  name="Code1" id="Code1" LinkAge>
                    <option ></option>
                </select>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-3 col-sm-offset-1 col-xs-3 col-xs-offset-1" ><span style="font-weight: bold;">编号2:</span></div>
            <div class="col-sm-8 col-xs-8">
                <select class="form-control required" data-tags="true" name="Code2" id="Code2" LinkAge>
                    <option ></option>
                </select>
            </div>
        </div>
         <div class="row" style="margin-top: 10px;">
            <div class="col-sm-3 col-sm-offset-1 col-xs-3 col-xs-offset-1" ><span style="font-weight: bold;">检查内容:</span></div>
            <div class="col-sm-8 col-xs-8">
                <select class="form-control required" data-tags="true" name="CheckContent" id="CheckContent"  LinkAge>
                    <option ></option>
                </select>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-3 col-sm-offset-1 col-xs-3 col-xs-offset-1" ><span style="font-weight: bold;">检查标准:</span></div>
            <div class="col-xs-8 col-xs-8 ">
                <select class="form-control required"  data-tags="true" name="CheckStandard"  id="CheckStandard">
                    <option ></option>
                </select>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-sm-3 col-sm-offset-1 col-xs-3 col-xs-offset-1" ><span style="font-weight: bold;">检查标准编辑:</span></div>
            <div class="col-xs-8 col-xs-8">
                <textarea name="CheckStandardEdit"  id="CheckStandardEdit" class="form-control" style="width: 100%;height: 100px;"></textarea>
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
    $NeedInitAllSelect = '<?php echo $NeedInitAllSelect; ?>';

    function FillAllSelectById ($id) {
        $.ajax({
            url:"/SafetyMng/Help/GetFirstHalfCheckTBRowById/id/"+$id,
            type:'get',
            dataType:"json",
            success:function (data,textStatus) {
                if(data==null){
                    layer.alert('获取数据失败!');
                    return;
                }
                $('#ProfessionName').select2({data:[{'text':data.ProfessionName,'id':data.ProfessionName}]});
                $('#ProfessionName').val(data.ProfessionName).trigger('change');

                $('#BusinessName').select2({data:[{'text':data.BusinessName,'id':data.BusinessName}]});
                $('#BusinessName').val(data.BusinessName).trigger('change');

                $('#CheckSubject').select2({data:[{'text':data.CheckSubject,'id':data.CheckSubject}]});
                $('#CheckSubject').val(data.CheckSubject).trigger('change');

                $('#Code1').select2({data:[{'text':data.Code1,'id':data.Code1}]});
                $('#Code1').val(data.Code1).trigger('change');

                $('#Code2').select2({data:[{'text':data.Code2,'id':data.Code2}]});
                $('#Code2').val(data.Code2).trigger('change');

                $('#CheckContent').select2({data:[{'text':data.CheckContent,'id':data.CheckContent}]});
                $('#CheckContent').val(data.CheckContent).trigger('change');

                $('#CheckStandard').select2({data:[{'text':data.CheckStandard,'id':data.CheckStandard}]});
                $('#CheckStandard').val(data.CheckStandard).trigger('change');

                $('#CheckDB').val(data.CheckDBId).trigger('change');

                $('#CheckStandardEdit').text(data.CheckStandard);

            },
            error:function (XMLHttpRequest,textStatus,errorThrown) {

            }
        });
    }

    function SelectLinkage (SelID) {
        $Pv = [];
        $SelArr = ['CheckDB','ProfessionName','BusinessName','CheckSubject','Code1','Code2','CheckContent','CheckStandard'];
        $SelArr.forEach(function (v) {
            $r = {'SelName':v,'SelText':$('#'+v + ' option:selected').text(),'SelVal':$('#'+v).val()};
            $Pv.push($r);
        });
        $PostData = {"EventSel":SelID,'data':$Pv,'FakeID':'YES'};
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
        $('select').select2();
        $('#CheckStandard').on("change",function () {
            $('#CheckStandardEdit').text($('#'+$(this).attr('id') + ' option:selected').text());
        });

        if($NeedInitAllSelect=='YES'){
            $('#ProfessionName').select2('data',{'text':1,'id':1});
            FillAllSelectById($('#rowId').val());
        }else{
            $('select[LinkAge]').on("change", function(e) {
                $val  = $(this).val();
                $text = $('#'+$(this).attr('id') + ' option:selected').text();
                if($val!='' && ($text ==$val)){

                }else{
                    SelectLinkage($(this).attr('id'))
                }
            });
        }

    });
</script>
</body>
</html>