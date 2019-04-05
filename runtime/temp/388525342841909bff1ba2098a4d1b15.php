<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"/private/var/www/html/public/../application/safetymng/view/Reform/mbReformIndex.html";i:1554427425;}*/ ?>

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
        </style>


</head>
<body class="container">
<form id ="mForm" method="post" action="<?php echo $FormAction; ?>">
    <input type="hidden" name="Platform" value="Mobile"/>
    <input type="hidden" name="ReformIDHid"  value="<?php echo $ReformID; ?>"/>
    <input type="hidden" name="TaskIDHid" value="<?php echo $TaskID; ?>"/>
    <input type="hidden" name="opType" value="<?php echo $opType; ?>"/>
    <input type="hidden" name="Platform" value="Mobile"/>
    <input type="hidden" name="CallBackURL" value="<?php echo $ReformSelData['CallBackURL']; ?>">
    <input id="RequireDefineCause" name="RequireDefineCause" checked="checked" style="display: none;"/>
    <input id="RequireDefineAction"  checked="checked" name="RequireDefineAction" style="display: none;"/>

    <div class="row">
        <div class="col-sm-offset-1 col-sm-10" style="margin-top: 10px;">
            <h3 style="text-align: center;color: #ac2925 ">不符合项整改/通知单(<?php echo $Reform['Code']; ?>)</h3>
            <?php if($Warning != ''): ?>
            <div class="form-group">
                <div class="col-sm-12">
                    <div class="alert alert-danger" role="alert"><strong>提示：</strong><?php echo $Warning; ?></div>
                </div>
            </div>
            <?php endif; if($Warning == ''): ?>
                <div class="alert alert-warning" role="alert">
                    <strong>提示：</strong>本页面用来直接向责任单位下发整改通知书立即整改，无需质量部门审核，提高整改实效性，但整个流程受质量部门监督。
                </div>
            <?php endif; ?>

        </div>
    </div>
    <div class="row" style="padding: 0px;">
        <table  class="table table-bordered" >
            <tr>
                <td  class="col-xs-4 col-sm-4">
                    <span style="font-size: medium;color: #00A000;">问题来源:</span>
                </td>
                <td class="col-xs-8 col-sm-8">
                    <?php if(in_array(($ReformIntStatus), explode(',',"1"))): ?>
                        <select class="form-control js-example-basic-multiple js-states " name="QuestionSourceName" id="QuestionSource" <?php if($ReformSelData['QuestionSourceName'] != ''): endif; ?>>
                            <option></option>
                            <?php if(is_array($QuestionSourceList) || $QuestionSourceList instanceof \think\Collection || $QuestionSourceList instanceof \think\Paginator): $i = 0; $__LIST__ = $QuestionSourceList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $vo['SourceName']; ?>" <?php if($vo['SourceName'] == $Reform['QuestionSourceName']): ?> selected <?php endif; ?>><?php echo $vo['SourceName']; ?></option>
                            <option value="<?php echo $vo['SourceName']; ?>" <?php if($vo['SourceName'] == $ReformSelData['QuestionSourceName']): ?> selected <?php endif; ?>><?php echo $vo['SourceName']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    <?php endif; if(!in_array(($ReformIntStatus), explode(',',"1"))): ?>
                        <span><?php echo $Reform['QuestionSourceName']; ?></span>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <span style="font-size: medium;color: #00A000;">通知书<br/>&nbsp标题:</span>
                </td>
                <td >
                    <span style="font-size: medium;font-weight: bolder;">
                            <?php if(in_array(($ReformIntStatus), explode(',',"1"))): ?>
                                <input name="ReformTitle" class="form-control" value="<?php if($Reform['ReformTitle'] == ''): ?> <?php echo $ReformSelData['QuestionSourceName']; ?>-<?php echo $ReformSelData['CheckSubject']; else: ?> <?php echo $Reform['ReformTitle']; endif; ?>"placeholder="必须填写"/>
                            <?php endif; if(!in_array(($ReformIntStatus), explode(',',"1"))): ?>
                                <span><?php echo $Reform['ReformTitle']; ?></span>
                            <?php endif; ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td >
                    <span style="font-size: medium;color: #00A000;">责任单位:</span>
                </td>
                <td >
                    <?php if(in_array(($ReformIntStatus), explode(',',"1"))): ?>
                    <select class="form-control js-example-basic-multiple js-states " multiple="multiple" name="DutyCorps[]" id="DutyCorps" <?php if($ReformSelData['DutyCorp'] != ''): endif; ?> >
                        <option ></option>
                        <?php if(is_array($CorpList) || $CorpList instanceof \think\Collection || $CorpList instanceof \think\Paginator): $i = 0; $__LIST__ = $CorpList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $vo['Corp']; ?>" <?php if($vo['Corp'] == $Reform['DutyCorp']): ?> selected <?php endif; ?>><?php echo $vo['Corp']; ?></option>
                        <option value="<?php echo $vo['Corp']; ?>" <?php if($vo['Corp'] == $ReformSelData['DutyCorp']): ?> selected <?php endif; ?>><?php echo $vo['Corp']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <?php endif; if(!in_array(($ReformIntStatus), explode(',',"1"))): ?>
                        <span><?php echo $Reform['DutyCorp']; ?></span>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td >
                    <span style="font-size: medium;color: #00A000;">当前部门:</span>
                </td>
                <td >
                    <span><?php echo $Reform['CurDealCorp']; ?></span>
                </td>
            </tr>
            <tr>
                <td >
                    <span style="font-size: medium;color: #00A000;">状态:</span>
                </td>
                <td >
                    <span><label class="label label-<?php 
                            $RF = new app\safetymng\controller\Reform;

                            echo $RF->GetReformStatusColor($Reform['ReformStatus']);
                      ?>"><?php echo $Reform['ReformStatus']; ?></label></span>
                </td>
            </tr>
            <tr>
                <td style="width: 150px;" class="PrivTD">
                    <span style="font-size: medium;color: #00A000;">检查日期:</span>
                </td>
                <td>
                    <?php if(in_array(($ReformIntStatus), explode(',',"1"))): ?>
                         <input class="form-control" name="CheckDate" type="date" value="<?php echo (isset($Reform['CheckDate']) && ($Reform['CheckDate'] !== '')?$Reform['CheckDate']:$Today); ?>"/>
                    <?php endif; if(!in_array(($ReformIntStatus), explode(',',"1"))): ?>
                        <span><?php echo $Reform['CheckDate']; ?></span>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td >
                    <span style="font-size: medium;color: #00A000;">督查人员:</span>
                </td>
                <td>
                    <?php if(in_array(($ReformIntStatus), explode(',',"1"))): ?>
                        <span><?php echo \think\Session::get('Name'); ?> </span>
                    <?php endif; if(!in_array(($ReformIntStatus), explode(',',"1"))): ?>
                        <span><?php echo $Reform['Inspectors']; ?></span>
                    <?php endif; ?>
                </td>
            </tr>
           <tr>
                <td colspan="2">
                    <span style="font-size: medium;color: #00A000;">不符合项描述:</span>
                    <div>
                        <?php if(in_array(($ReformIntStatus), explode(',',"1"))): ?>
                            <textarea id="NoConfirmDescEditor"  name="NonConfirmDesc" style="width:100%;height:200px;"><?php echo htmlspecialchars_decode($Reform['NonConfirmDesc']); ?> </textarea>
                        <?php endif; if(!in_array(($ReformIntStatus), explode(',',"1"))): ?>
                           <span><?php echo htmlspecialchars_decode($Reform['NonConfirmDesc']); ?> </span>
                        <?php endif; ?>
                    </div>

                </td>

            </tr>
                <tr>
                    <td>
                        <span style="font-size: medium;color: #00A000;">依据:</span>
                    </td>
                    <td>
                        <?php if(in_array(($ReformIntStatus), explode(',',"1"))): ?>
                            <textarea name="Basis"  class="form-control" style="width:100%;height:80px;" placeholder="不符合项的依据"><?php echo $Reform['Basis']; ?> <?php echo $ReformSelData['Basis']; ?></textarea>
                        <?php endif; if(!in_array(($ReformIntStatus), explode(',',"1"))): ?>
                            <span><?php echo $Reform['Basis']; ?> </span>
                        <?php endif; ?>

                    </td>
                </tr>
            <tr>
                   <td>
                        <span style="font-size: medium;color: #00A000;">整改要求:</span>
                    </td>
                    <td>
                        <?php if(in_array(($ReformIntStatus), explode(',',"1"))): ?>
                            <textarea name="ReformRequirement" class="form-control" style="width:100%;height:80px;"><?php echo $Reform['ReformRequirement']; ?> </textarea>
                        <?php endif; if(!in_array(($ReformIntStatus), explode(',',"1"))): ?>
                            <span><?php echo $Reform['ReformRequirement']; ?> </span>
                        <?php endif; ?>

                    </td>
            </tr>
            <tr>
                <td>
                    <span style="font-size: medium;color: #00A000;">原因分析</br>措施制定:</span>
                </td>
                <td>
                        <span > <?php if(in_array(($ReformIntStatus), explode(',',"1"))): ?>
                                           <input id="ActionAndCauseRequired"  name="ActionAndCauseRequired"  type="checkbox" />由责任单位分析原因并制定措施</span>
                                 <?php endif; ?>

                 </td>
            </tr>
                        <tr>
                            <td>
                                <span style="font-size: medium;color:red;">要求的<br/>反馈日期:</span>
                            </td>
                        <td>

                            <?php if(in_array(($ReformIntStatus), explode(',',"1"))): ?>
                                <input class="form-control" name="RequestFeedBackDate"  type="date" value="<?php echo (isset($Reform['RequestFeedBackDate']) && ($Reform['RequestFeedBackDate'] !== '')?$Reform['RequestFeedBackDate']:$Today); ?>"/>
                            <?php endif; if(!in_array(($ReformIntStatus), explode(',',"1"))): ?>
                                <span><?php echo $Reform['RequestFeedBackDate']; ?></span>
                            <?php endif; ?>
                        </td>
                            </tr>

                        <tr Action >
                            <td >
                            <span style="font-size: medium;color: #00A000;">直接原因:</span>
                            </td>
                            <td>
                                <?php if(in_array(($ReformIntStatus), explode(',',"1"))): ?>
                                    <textarea name="DirectCause" class="form-control" style="width:100%;height:80px;"><?php echo $Reform['DirectCause']; ?></textarea>
                                <?php endif; if(in_array(($ReformIntStatus), explode(',',"2,5"))): if($Reform['RequireDefineCause'] == 'YES'): ?>
                                     <textarea name="DirectCause"class="form-control"  style="width:100%;height:80px;"><?php echo $Reform['RootCause']; ?></textarea>
                                <?php endif; if($Reform['RequireDefineCause'] != 'YES'): ?>
                                    <span><?php echo $Reform['DirectCause']; ?></span>
                                <?php endif; endif; if(!in_array(($ReformIntStatus), explode(',',"1,2,5"))): ?>
                                    <span><?php echo $Reform['DirectCause']; ?></span>
                                <?php endif; ?>
                             </td>
                        </tr>
                        <tr Action >
                        <td >
                              <span style="font-size: medium;color: #00A000;">根本原因:</span>
                        </td>
                         <td>
                             <?php if(in_array(($ReformIntStatus), explode(',',"1"))): ?>
                                <textarea name="RootCause" class="form-control" style="width:100%;height:80px;"><?php echo $Reform['RootCause']; ?></textarea>
                             <?php endif; if(in_array(($ReformIntStatus), explode(',',"2,5"))): if($Reform['RequireDefineCause'] == 'YES'): ?>
                                <textarea name="RootCause" class="form-control" style="width:100%;height:80px;"><?php echo $Reform['RootCause']; ?></textarea>
                             <?php endif; if($Reform['RequireDefineCause'] != 'YES'): ?>
                                <span><?php echo $Reform['RootCause']; ?></span>
                             <?php endif; endif; if(!in_array(($ReformIntStatus), explode(',',"1,2,5"))): ?>
                                <span><?php echo $Reform['RootCause']; ?></span>
                             <?php endif; ?>

                        </td>
                        </tr>

                        <tr Action >
                            <td >
                                <span style="font-size: medium;">纠正措施:</span>
                            </td>
                            <td>
                                <?php if(in_array(($ReformIntStatus), explode(',',"1,2,5"))): ?>
                                    <textarea name="CorrectiveAction" class="form-control" style="width:100%;height:80px;"><?php echo $Reform['CorrectiveAction']; ?></textarea>
                                <?php endif; if(!in_array(($ReformIntStatus), explode(',',"1,2,5"))): ?>
                                    <span><?php echo $Reform['CorrectiveAction']; ?></span>
                                <?php endif; ?>
                                <br/>
                                <span style="color:red;">
                                    完成时限:
                               </span>


                                <?php if(in_array(($ReformIntStatus), explode(',',"1,2,5"))): ?>
                                    <input class="form-control" name="CorrectiveDeadline" class="form-control" type="date" value="<?php echo (isset($Reform['CorrectiveDeadline']) && ($Reform['CorrectiveDeadline'] !== '')?$Reform['CorrectiveDeadline']:$Today); ?>"/>
                                <?php endif; if(!in_array(($ReformIntStatus), explode(',',"1,2,5"))): ?>
                                    <span><?php echo $Reform['CorrectiveDeadline']; ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr Action >
                        <td >
                        <span style="font-size: medium;color:black;">预防措施:</span>
                            </td>
                            <td>
                              <?php if(in_array(($ReformIntStatus), explode(',',"1,2,5"))): ?>
                                <textarea name="PrecautionAction" class="form-control" style="width:100%;height:80px;" placeholder="若无预防措施,此处请留空白."><?php echo $Reform['PrecautionAction']; ?></textarea>
                              <?php endif; if(!in_array(($ReformIntStatus), explode(',',"1,2,5"))): ?>
                                <span><?php echo $Reform['PrecautionAction']; ?></span>
                              <?php endif; ?>
                                <br/>
                                <span style="color:red;">
                                完成时限:
                            </span>
                                <?php if(in_array(($ReformIntStatus), explode(',',"1,2,5"))): ?>
                                    <input class="form-control" name="PrecautionDeadline" class="form-control" type="date" value="<?php echo $Reform['PrecautionDeadline']; ?>"/>
                                <?php endif; if(!in_array(($ReformIntStatus), explode(',',"1,2,5"))): ?>
                                <span ><?php echo $Reform['PrecautionDeadline']; ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
            <tr Action >
                <td class="PrivTD">
                    <span style="font-size: medium;color: #00A000;">措施评估:</span>
                </td>
                <td >
                    <?php if(in_array(($ReformIntStatus), explode(',',"1,3"))): ?>
                    <span><input name="ActionIsOK" type="radio" value="YES" <?php if($Reform['ActionIsOK'] == 'YES'): ?> checked="checked" <?php endif; ?> /><label class="label label-success">措施评估通过</label> <span/>
                            <span style="margin-left: 10px;"><input name="ActionIsOK" type="radio" value="NO" <?php if($Reform['ActionIsOK'] == 'NO'): ?> checked="checked" <?php endif; ?>/><label class="label label-danger">措施评估不通过</label> </span>
                            <br/>
                            <textarea class="form-control" style="height: 100px;" name="ActionEval"><?php echo $Reform['ActionEval']; ?></textarea>
                        <?php endif; if(!in_array(($ReformIntStatus), explode(',',"1,3"))): ?>
                        <span><input name="ActionIsOK" type="radio" value="YES" <?php if($ReformIntStatus != '1,3'): ?> disabled="disabled" <?php endif; if($Reform['ActionIsOK'] == 'YES'): ?> checked="checked" <?php endif; ?> /><label class="label label-success">措施评估通过</label> </span>
                        <span style="margin-left: 10px;"><input  name="ActionIsOK" type="radio" value="NO" <?php if($ReformIntStatus != '1,3'): ?> disabled="disabled" <?php endif; if($Reform['ActionIsOK'] == 'NO'): ?> checked="checked" <?php endif; ?> /><label class="label label-danger">措施评估不通过</label> </span>
                            <br/>
                            <span><?php echo $Reform['ActionEval']; ?></span>
                        <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <span style="font-size: medium;color: blue;">整改证据(责任单位提供):</span>
                    <?php if(in_array(($ReformIntStatus), explode(',',"4,8"))): ?>
                         <textarea id="ProofEditor" name="Proof" style="width:100%;height:200px;"><?php echo htmlspecialchars_decode($Reform['Proof'] ); ?></textarea>
                    <?php endif; if(!in_array(($ReformIntStatus), explode(',',"4,8"))): ?>
                        <span><?php echo htmlspecialchars_decode($Reform['Proof'] ); ?></span>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td class="PrivTD">
                    <span style="font-size: medium;color: #00A000;">整改效果评估:</span>
                </td>
                <td >
                    <?php if(in_array(($ReformIntStatus), explode(',',"6"))): ?>
                    <span><input name="ProofEvalIsOK" type="radio" value="YES"  <?php if($Reform['ProofEvalIsOK'] == 'YES'): ?> checked="checked" <?php endif; ?>  /><label class="label label-success">整改效果可接受</label> <span/>
                        <span style="margin-left: 10px;"><input name="ProofEvalIsOK" type="radio" value="NO"  <?php if($Reform['ProofEvalIsOK'] == 'NO'): ?> checked="checked" <?php endif; ?>  /><label class="label label-danger">整改效果不可接受</label> </span>
                        <br/>
                            <textarea class="form-control" style="height: 100px;" name="ProofEvalMemo"><?php echo $Reform['ProofEvalMemo']; ?></textarea>
                        <?php endif; if(!in_array(($ReformIntStatus), explode(',',"6"))): ?>
                        <span><input name="ProofEvalIsOK" type="radio" value="YES"  disabled="disabled"  <?php if($Reform['ProofEvalIsOK'] == 'YES'): ?> checked="checked" <?php endif; ?>  /><label class="label label-success">整改效果可接受</label> <span/>
                            <span style="margin-left: 10px;"><input name="ProofEvalIsOK" type="radio" value="NO"  disabled="disabled" <?php if($Reform['ProofEvalIsOK'] == 'NO'): ?> checked="checked" <?php endif; ?>  /><label class="label label-danger">整改效果不可接受</label> </span>
                            <br/>
                                 <span><?php echo $Reform['ProofEvalMemo']; ?></span>
                        <?php endif; ?>
                </td>
            </tr>
                <tr>
                    <td colspan="2" style="">
                            <?php if($AddFastReform == 'YES'): ?>
                                <div class="row">
                                    <div class="" style="">
                                        <a class="btn btn-warning col-xs-offset-5" XFZGTZS >下发整改通知书</a>
                                    </div>
                                </div>
                            <?php endif; if($showSaveBtn == 'YES'): ?>
                                <div class="row">
                                    <div class="" style="">

                                        <?php if(!in_array(($ReformIntStatus), explode(',',"1"))): ?>
                                            <button class="btn btn-warning col-xs-offset-4"  type="submit" >先保存</button>
                                        <?php endif; if(in_array(($ReformIntStatus), explode(',',"1"))): ?>
                                            <span class="col-xs-offset-4"></span>
                                        <?php endif; ?>
                                        <a class="btn btn-success col-xs-offset-3" SubmitA >后提交</a>
                                    </div>
                                </div>
                            <?php endif; ?>
                    </td>
                </tr>
        </table>
        </div>

</form>

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
    $(function () {
        $('a[XFZGTZS]').click(function () {
                var d1 = dialog({
                    title: '确认',
                    content: '确定内容填写完整并下发整改通知书吗？',
                    width:440,
                    okValue:'确定',
                    ok: function () {
                       $('#mForm').submit();
                    },
                    cancelValue:'再想想',
                    cancel:function () {

                    }
                });
                d1.showModal();
        });
        $('a[SubmitA]').click(function () {
            window.location = '/SafetyMng/Reform/SendReform/TaskID/<?php echo $TaskID; ?>/ReformID/<?php echo $ReformID; ?>/Platform/Mobile';
        });
        $('#ActionAndCauseRequired').click(function () {
            $isRequired = $(this).is(':Checked');
            if($isRequired){
                $('#RequireDefineCause').attr("checked", 'checked');
                $('#RequireDefineAction').attr("checked", 'checked');
            }
            if(!$isRequired){
                $("tr[Action]").css("display","table-row");
            }else{
                $("tr[Action]").css("display","none");
            }
        });
        if($('#NoConfirmDescEditor').length>0){
            UEditorInit('NoConfirmDescEditor');
        }
        if($('#ProofEditor').length>0){
            UEditorInit('ProofEditor');
        }
        $('select').select2();

    });
</script>
</body>
</html>