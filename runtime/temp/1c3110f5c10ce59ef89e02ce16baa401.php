<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"/private/var/www/html/public/../application/safetymng/view/CheckTask/CheckRowSelect.html";i:1554335929;}*/ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
    <STYLE>
        .select2-container .select2-selection--single{
            height:34px;
            line-height: 34px;
        }
        .xuxian{
            height:0;
            border-bottom:#000000 2px dashed;
        }
    </STYLE>
</head>
<body class="container-full">
<form action="/SafetyMng/CheckTask/CheckRowQuery/CheckListID/<?php echo $CheckListID; ?>" method="post" enctype="application/x-www-form-urlencoded">
    <input type="hidden" id="opType" name="opType" value=""/>
    <input type="hidden" id="CurRowId" name="CurRowId" value="0"/>
    <?php 
        $CTBMng = new app\safetymng\controller\CheckTBMng();
     ?>
    <div style="width: 96%;margin-left: 2%;" >
        <div class="row">
            <table class="table table-bordered col-sm-11">
                <tr>
                    <td style="width: 10%;"><span style="font-weight: bold;">数据库:</span></td>
                    <td style="width: 20%">
                        <select class="form-control required"  name="CheckDB" id="CheckDB" LinkAge>
                            <option></option>
                            <?php if(is_array($CheckDB) || $CheckDB instanceof \think\Collection || $CheckDB instanceof \think\Paginator): $i = 0; $__LIST__ = $CheckDB;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo $vo['id']; ?>" <?php if(\think\Request::instance()->post('CheckDB1') == ''): ?>"} selected <?php endif; ?>><?php echo $vo['BaseName']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td>
                    <td style="width: 13%">
                        <span style="font-weight: bold;">专业名称:</span>
                    </td>
                    <td style="width: 20%">
                        <select class="form-control required"  data-tags="true" name="ProfessionName" id="ProfessionName" LinkAge>
                            <option></option>
                            <option value="<?php echo $CTBMng->RMInputPre(input('ProfessionName')); ?>" selected><?php echo $CTBMng->RMInputPre(input('ProfessionName')); ?></option>
                        </select>
                    </td>
                    <td style="width: 10%">
                        <span style="font-weight: bold;">业务名称:</span>
                    </td>
                    <td style="width: 10%">
                        <select class="form-control required" data-tags="true"  name="BusinessName" id="BusinessName" LinkAge>
                            <option></option>
                            <option value="<?php echo $CTBMng->RMInputPre(input('BusinessName')); ?>" selected><?php echo $CTBMng->RMInputPre(input('BusinessName')); ?></option>
                        </select>
                    </td>
                    <td style="width: 3%"><span style="font-weight: bold;">部门:</span></td>
                    <td >
                        <input name="RelatedCorps" value="<?php echo $CheckListInfo['DutyCorp']; ?>" class="form-control" readonly/>
                    </td>

                </tr>
                <tr>
                    <div class="row">

                        <td><span style="font-weight: bold;">检查项目:</span></td>
                        <td colspan="">
                            <select class="form-control required" data-tags="true" name="CheckSubject" id="CheckSubject" LinkAge>
                                <option></option>
                                <option value="<?php echo $CTBMng->RMInputPre(input('CheckSubject')); ?>" selected><?php echo $CTBMng->RMInputPre(input('CheckSubject')); ?></option>
                            </select>
                        </td>
                        <td><span style="font-weight: bold;">编号1:</span></td>
                        <td >
                            <select class="form-control required"  data-tags="true" name="Code1"  id="Code1" LinkAge>
                                <option></option>
                                <option value="<?php echo $CTBMng->RMInputPre(input('Code1')); ?>" selected><?php echo $CTBMng->RMInputPre(input('Code1')); ?></option>
                            </select>
                        </td>
                        <td><span style="font-weight: bold;">编号2:</span></td>
                        <td >
                            <select class="form-control required"  data-tags="true" name="Code2"  id="Code2" LinkAge>
                                <option></option>
                                <option value="<?php echo $CTBMng->RMInputPre(input('Code1')); ?>" selected><?php echo $CTBMng->RMInputPre(input('Code1')); ?></option>
                            </select>
                        </td>
                        <td colspan="2"style="text-align: center;">
                            <button type="submit"  class="btn btn-success">查询</button>
                        </td>

                    </div >
                </tr>
                <tr>
                    <td ><span style="font-weight: bold;">检查内容:</span></td>
                    <td >
                        <select class="form-control required" data-tags="true" name="CheckContent" id="CheckContent" LinkAge>
                            <option value="<?php echo $CTBMng->RMInputPre(input('CheckContent')); ?>" selected><?php echo $CTBMng->RMInputPre(input('CheckContent')); ?></option>
                        </select>
                    </td>
                    <td >
                        <span style="font-weight: bold;">检查标准:</span>
                    </td>
                    <td colspan="5">
                        <select class="form-control required" data-tags="true" name="CheckStandard"  id="CheckStandard" >
                            <option></option>
                            <option><?php echo $CTBMng->getCheckStandard(input('CheckStandard')); ?></option>
                        </select>
                    </td>
                </tr>
                <tr>


                </tr>
            </table>
        </div>
        <div class="row " style="margin-top: 15px;">
            <div class="col-sm-12 xuxian"></div>
        </div>
        <div class="row" style="margin-top: 15px;">
            <div class="col-sm-12" >
                <div id = "gyDiv" style="overflow:scroll; width:100%;min-height: 400px;">
                    <table class="table table-bordered bootstrap-datatable datatable table-hover responsive" style="min-width:2000px;">
                        <thead>
                        <tr>
                            <th style="width: 50px;">序号</th>
                            <th style="width: 400px;">检查标准</th>
                            <th style="width: 300px;">符合性验证标准<span>&nbsp;&nbsp;&nbsp;&nbsp;<input id="SELAll"  SELAll type="checkbox"/>全选</span>&nbsp;&nbsp;&nbsp;&nbsp;<span><input  DeSELAll id="DeSELAll" type="checkbox"/>全不选</span> <a AddCheckRow class="btn btn-sm btn-warning">+</a></th><!-- 生成类型 航空公司　起点　终点　航班类型--->
                            <th>检查方法</th>
                            <th>依据名称</th>
                            <th>依据条款</th><!-- 航空公司　机号　机型　座位总数-->
                            <th>责任单位</th>
                            <th>检查频次</th>
                        </thead>
                        <tbody >
                        <?php if(is_array($CheckRowList) || $CheckRowList instanceof \think\Collection || $CheckRowList instanceof \think\Paginator): $i = 0; $__LIST__ = $CheckRowList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr CheckStandardID = "<?php echo $vo['CheckStandardID']; ?>" rowId = "<?php echo $vo['id']; ?>" CKId = "CK<?php echo ++$Cnt; ?>" >
                            <td>
                               <input id="CK<?php echo $Cnt; ?>" type="checkbox" SelCkBox FHID = "<?php echo $vo['FHId']; ?>" SHID = "<?php echo $vo['id']; ?>" BaseDBID="<?php echo $vo['BaseDBID']; ?>" CKListRowId = "<?php echo $vo['CheckListRowId']; ?>" <?php if($vo['CheckListRowId'] != ''): ?>checked="checked"<?php endif; ?> />
                            </td>
                            <td>
                                <?php echo $vo['CheckStandard']; ?>
                            </td>
                            <td>
                                <?php echo $vo['ComplianceStandard']; ?>
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
                                <?php echo $vo['RelatedCorps']; ?>
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
    </div>
    <input type="hidden" name="RowSeled" value=""/>
    <input type="hidden" name="CheckTaskID" value="<?php echo $CheckListID; ?>"/>
</form>
</body>
<script>
    $CheckListId = <?php echo $CheckListID; ?>;
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
        $PostData = {"EventSel":SelID,'data':$Pv,'FakeID':'YES','FakeCheckStandardID':''};
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
    $RelatedCorps = <?php echo (isset($RelatedCorps) && ($RelatedCorps !== '')?$RelatedCorps:[]); ?>;
    $(function () {
        $('select').select2();

        $('select[LinkAge]').on("change", function(e) {
            $val  = $(this).val();
            $text = $('#'+$(this).attr('id') + ' option:selected').text();
            if($val!='' && ($text ==$val)){

            }else{
                SelectLinkage($(this).attr('id'))
            }
            $('#RelatedCorps').val($RelatedCorps).change();
         });

        $('a[AddCheckRow]').click(function () {
           $Cks =  $('input[SelCkBox]:checked');
           $Arr = [];
            $Cks.each(function () {
                $o = {'CheckListId':$CheckListId,'CkId':$(this).attr('id'),'FHID':$(this).attr('FHID'),'BaseDBID':$(this).attr('BaseDBID'),'SHID':$(this).attr('SHID'),'CKListRowId':$(this).attr('CKListRowId')};
                $Arr.push($o);
            });

            $.ajax({
                url:"/SafetyMng/Help/Ajax_AddRowToCheckList",
                data: JSON.stringify($Arr),
                type:'post',
                dataType:"json",
                success:function (data,textStatus) {
                    if(data['Ret']!='Success'){
                        layer.alert('部分条款添加失败!');
                    }
                    $Btn = $('a[AddCheckRow]');
                    $Btn.toggleClass('btn-warning');
                    $Btn.toggleClass('btn-success');
                    $Btn.attr('disabled','disabled');
                    $Btn.text('已添加');
                },
                error:function (XMLHttpRequest,textStatus,errorThrown) {
                    window.location.reload();
                }
            });
        });

        $('tr[CheckStandardID]').dblclick(function () {
            $CkId = $(this).attr('CkId');
            $('a[AddCheckRow]').text('+');
            $Btn = $('a[AddCheckRow]');
            if($Btn.hasClass('btn-success')){
                $Btn.toggleClass('btn-warning');
                $Btn.toggleClass('btn-success');
                $Btn.removeAttr('disabled');
                $Btn.text('+');
            }

            if ($('#'+$CkId).is(':checked')) {
                $('#'+$CkId).removeAttr('checked');
            }else{
                $('#'+$CkId).attr('checked','checked');
            }
        });

        $("#RelatedCorps").select2({"disabled":true});

        $('#DeSELAll').click(
            function () {
                if($(this).is(':checked')){
                    $('input[SelCkBox]').removeAttr('checked');
                    $('input[SELAll]').removeAttr('checked');
                }else{
                    $('input[SelCkBox]').attr('checked','checked');
                }
            }
        );

        $('#SELAll').click(
            function () {
                if($(this).is(':checked')) {
                    $('input[SelCkBox]').attr('checked','checked');
                    $('input[DeSELAll]').removeAttr('checked');
                }else{
                    $('input[SelCkBox]').removeAttr('checked');
                }
            }
        );
        //alert($('input[checkbox]').length);
    });
</script>
</html>