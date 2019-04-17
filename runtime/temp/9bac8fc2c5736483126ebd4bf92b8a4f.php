<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/private/var/www/html/public/../application/safetymng/view/Reform/index.html";i:1555538862;}*/ ?>

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
    <script src="/static/js/jquery.raty.min.js"></script>
    <!-- for iOS style toggle switch -->
    <script src="/static/js/jquery.iphone.toggle.js"></script>
    <!-- autogrowing textarea plugin -->
    <script src="/static/js/jquery.autogrow-textarea.js"></script>
    <!-- multiple file upload plugin -->
    <script src="/static/js/jquery.uploadify-3.1.min.js"></script>

    <link rel="shortcut icon" href="/static/img/favicon.ico">
    <script type="text/javascript" src="/static/ckeditor/ckeditor.js"></script>
    <script src="/static/js/gyComm.js"></script>
    <script src="/static/js/jquery-ui.min.js"></script>
    <script src="/static/js/gyComm.js"></script>
    <script src="/static/js//bootstrap-slider.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/static/PCUEditor/ueditor.config.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/static/PCUEditor/ueditor.all.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/static/PCUEditor/lang/zh-cn/zh-cn.js"></script>

    <link href="/static/css/select2.min.css" rel="stylesheet" />
    <script src="/static/js/select2.min.js"></script>
</head>
<meta charset="UTF-8">
<title></title>
<style>
    .select2-container .select2-selection--single{
        height:34px;
        line-height: 34px;
    }
    .PrivTD{
        background-color: #dddddd;
    }

    table {
        table-layout: fixed;
        word-break: break-all;
    }

    img{
        max-width: 100%;
    }

</style>
</head>
<body>
<form id ="mForm" method="post" action="/SafetyMng/Reform/SaveReform">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10" style="margin-top: 10px;">
            <h3 style="text-align: center;color: #ac2925 ">不符合项整改/通知单(<?php echo $Reform['Code']; ?>)</h3>
            <?php if($Warning != ''): ?>
            <div class="form-group">
                <div class="col-sm-12">
                    <div class="alert alert-danger" role="alert"><strong>提示：</strong><?php echo $Warning; ?></div>
                </div>
            </div>
            <?php endif; ?>
            <input type="hidden" name="ReformIDHid"   value="<?php echo $ReformID; ?>"/>
            <input type="hidden" name="QuestionIDHid" value="<?php echo $QuestionID; ?>"/>
            <input type="hidden" name="TaskIDHid" value="<?php echo $TaskID; ?>"/>
            <input type="hidden" name="opType" value="<?php echo $opType; ?>"/>
            <input type="hidden" name="Platform" value="PC"/>
            <hr/>
            <table border="1"  class="col-sm-12">
                <tr>
                    <td style="width: 150px;" class="PrivTD">
                        <span style="font-size: medium;color: #00A000;">问题来源:</span>
                    </td>
                    <td colspan="1" style="width: 40%">
                        <?php if(in_array(($ReformIntStatus), explode(',',"1"))): ?>
                            <select class="form-control js-example-basic-multiple js-states " name="QuestionSourceName" id="QuestionSource">
                                <option ></option>
                                <?php if(is_array($QuestionSourceList) || $QuestionSourceList instanceof \think\Collection || $QuestionSourceList instanceof \think\Paginator): $i = 0; $__LIST__ = $QuestionSourceList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo $vo['SourceName']; ?>" <?php if($vo['SourceName'] == $Reform['QuestionSourceName']): ?> selected <?php endif; ?>><?php echo $vo['SourceName']; ?></option>

                                <?php if($Reform['QuestionSourceName'] == ''): ?>
                                    <option value="<?php echo $vo['SourceName']; ?>" <?php if($Question['SourceName'] == $Question['QuestionSourceName']): ?> selected <?php endif; ?>><?php echo $vo['SourceName']; ?></option>
                                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        <?php endif; if(!in_array(($ReformIntStatus), explode(',',"1"))): ?>
                            <span><?php echo $Reform['QuestionSourceName']; ?></span>
                        <?php endif; ?>

                    </td>
                    <td class="PrivTD">
                        <span style="font-size: medium;color: #00A000;">通知书标题:</span>
                    </td>
                    <td >
                    <span style="font-size: medium;font-weight: bolder;">
                        <?php if(in_array(($ReformIntStatus), explode(',',"1"))): ?>
                            <input name="ReformTitle" class="form-control" value="<?php echo (isset($Reform['ReformTitle']) && ($Reform['ReformTitle'] !== '')?$Reform['ReformTitle']:$Question['QuestionTitle']); ?>"/>
                        <?php endif; if(!in_array(($ReformIntStatus), explode(',',"1"))): ?>
                            <span><?php echo $Reform['ReformTitle']; ?></span>
                        <?php endif; ?>
                    </span>
                    </td>
                </tr>
                <tr>
                    <td class="PrivTD">
                        <span style="font-size: medium;color: #00A000;">责任单位:</span>
                    </td>
                    <td style="width: 40%">
                        <?php if(in_array(($ReformIntStatus), explode(',',"1"))): ?>
                            <select class="form-control js-example-basic-multiple js-states " multiple="multiple" name="DutyCorps[]" id="DutyCorps">
                                <option ></option>
                                <?php if(is_array($CorpList) || $CorpList instanceof \think\Collection || $CorpList instanceof \think\Paginator): $i = 0; $__LIST__ = $CorpList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $vo['Corp']; ?>"
                                    <?php 
                                        if($Reform['DutyCorp']!=$vo['Corp']){
                                            if($Question['RelatedCorp'] == $vo['Corp']){
                                                echo 'selected';
                                            }
                                        }else{
                                                echo 'selected';
                                        }
                                     ?>
                                    ><?php echo $vo['Corp']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        <?php endif; if(!in_array(($ReformIntStatus), explode(',',"1"))): ?>
                            <span><?php echo $Reform['DutyCorp']; ?></span>
                        <?php endif; ?>
                    </td>
                    <td style="width: 150px;" class="PrivTD">
                        <span style="font-size: medium;color: #00A000;">检查日期:</span>
                    </td>
                    <td>
                        <?php if(in_array(($ReformIntStatus), explode(',',"1"))): ?>
                             <input class="form-control" name="CheckDate" type="date" value="<?php if(empty($Reform['CheckDate'])){echo date('Y-m-d',strtotime($Question['DateFound']));}else{echo $Reform['CheckDate'];} ?>"/>
                        <?php endif; if(!in_array(($ReformIntStatus), explode(',',"1"))): ?>
                             <span><?php echo $Reform['CheckDate']; ?></span>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td class="PrivTD">
                        <span style="font-size: medium;color: #00A000;" >关联问题:</span>
                    </td>
                    <td style="width: 40%">
                        <a href="#"><span style="font-size: medium;"><?php echo $QuestionTitle; ?></span></a>
                    </td>
                    <td style="width: 100px;" class="PrivTD">
                        <span style="font-size: medium;color: #00A000;" >督查员:</span>
                    </td>
                    <td>
                        <span><?php echo $Reform['Inspectors']; ?></span>
                    </td>
                </tr>
                <tr>
                    <td class="PrivTD">
                        <span style="font-size: medium;color: #00A000;" >下发日期:</span>
                    </td>
                    <td style="width: 40%">
                    <span style="font-size: medium;font-weight: bold; ">
                         <?php if(in_array(($ReformIntStatus), explode(',',"1"))): ?>
                              <?php echo (isset($Reform['IssueDate'] ) && ($Reform['IssueDate']  !== '')?$Reform['IssueDate'] : $Today); endif; if(!in_array(($ReformIntStatus), explode(',',"1"))): ?>
                             <span><?php echo $Reform['IssueDate']; ?></span>
                        <?php endif; ?>
                    </span>
                    </td>
                    <td style="width: 100px;" class="PrivTD">
                        <span style="font-size: medium;color: red;" >要求反馈日期:</span>
                    </td>
                    <td>
                        <?php if(in_array(($ReformIntStatus), explode(',',"1"))): ?>
                            <input class="form-control" name="RequestFeedBackDate" type="date" value="<?php echo $Reform['RequestFeedBackDate']; ?>"/>
                        <?php endif; if(!in_array(($ReformIntStatus), explode(',',"1"))): ?>
                            <span><?php echo $Reform['RequestFeedBackDate']; ?></span>
                        <?php endif; ?>

                    </td>
                </tr>
                <tr>
                    <td class="PrivTD"> <span style="font-size: medium;color: #00A000;" >当前部门:</span></td>
                    <td ><?php echo $Reform['CurDealCorp']; ?></td>
                    <td class="PrivTD"><span style="font-size: medium;color: #00A000;" >状态:</span></td>
                    <td> <label class="label label-<?php 
                            $RF = new app\safetymng\controller\Reform;

                            echo $RF->GetReformStatusColor($Reform['ReformStatus']);
                      ?>">
                        <?php echo $Reform['ReformStatus']; ?>
                    </label></td>
                </tr>
                <tr>
                    <td class="PrivTD">
                        <span style="font-size: medium;color: #00A000;" >不符合项描述:</span>
                    </td>
                    <td colspan="3">
                        <?php if(in_array(($ReformIntStatus), explode(',',"1"))): ?>
                            <textarea id="NonConfirmDesc" summernote name="NonConfirmDesc" style="width:100%;">



                                <?php if($ReformStatus != ''): ?>
                                    <?php echo htmlspecialchars_decode($Reform['NonConfirmDesc']); endif; if($ReformStatus == ''): ?>
                                    <?php echo $NonConfirmDesc; endif; ?>




                             </textarea>
                        <?php endif; if(!in_array(($ReformIntStatus), explode(',',"1"))): ?>
                            <span><?php echo htmlspecialchars_decode($Reform['NonConfirmDesc']); ?></span>
                        <?php endif; ?>

                    </td>
                </tr>
                <tr>
                    <td class="PrivTD">
                        <span style="font-size: medium;color: #00A000;" >依据:</span>
                    </td>
                    <td colspan="3">
                       <?php if(in_array(($ReformIntStatus), explode(',',"1"))): ?>
                            <input class="form-control" name="Basis"  value="<?php echo (isset($Reform['Basis']) && ($Reform['Basis'] !== '')?$Reform['Basis']:$Question['Basis']); ?>"/>
                        <?php endif; if(!in_array(($ReformIntStatus), explode(',',"1"))): ?>
                            <span><?php echo $Reform['Basis']; ?></span>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td class="PrivTD">
                        <span style="font-size: medium;color: #00A000;" > 整改要求:</span>
                    </td>
                    <td colspan="3">
                        <span style="font-size: medium;">要求责任单位:    <span style=""><input type="checkbox" name="RequireDefineCause" <?php if($ReformIntStatus != '1'): ?> disabled="disabled" <?php endif; if($Reform['RequireDefineCause'] == 'YES'): ?> checked="checked" <?php endif; ?>/> 分析原因</span><span style="">     <input type="checkbox" name="RequireDefineAction" <?php if($ReformIntStatus != '1'): ?> disabled="disabled" <?php endif; if($Reform['RequireDefineAction'] == 'YES'): ?> checked="checked" <?php endif; ?>/> 制定措施</span></span>
                        <br/>
                        <?php if(in_array(($ReformIntStatus), explode(',',"1"))): ?>
                            <input class="form-control" name="ReformRequirement" value="<?php echo $Reform['ReformRequirement']; ?>" />
                        <?php endif; if(!in_array(($ReformIntStatus), explode(',',"1"))): ?>
                            <span><?php echo $Reform['ReformRequirement']; ?></span>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2" class="PrivTD">
                        <span style="font-size: medium;color: #00A000;">原因分析:</span>
                    </td>
                    <td colspan="3" >
                        <span style="font-size: small;color: #00A000;">直接原因:</span>
                        <?php if(in_array(($ReformIntStatus), explode(',',"1"))): ?>
                            <input class="form-control" name="DirectCause" value="<?php echo $Reform['DirectCause']; ?>"/>
                        <?php endif; if(in_array(($ReformIntStatus), explode(',',"2,5"))): if($Reform['RequireDefineCause'] == 'YES'): ?>
                                <input class="form-control" name="DirectCause" value="<?php echo $Reform['DirectCause']; ?>"/>
                            <?php endif; if($Reform['RequireDefineCause'] != 'YES'): ?>
                                <span><?php echo $Reform['DirectCause']; ?></span><span style="font-size: smaller;color: #0d7bdc;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $Reform['CauseEvalerName']; ?>&nbsp;&nbsp;<?php echo $Reform['CauseEvalTime']; ?></span>
                            <?php endif; endif; if(!in_array(($ReformIntStatus), explode(',',"1,2,5"))): ?>
                            <span><?php echo $Reform['DirectCause']; ?></span><span style="font-size: smaller;color: #0d7bdc;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $Reform['CauseEvalerName']; ?>&nbsp;&nbsp;<?php echo $Reform['CauseEvalTime']; ?></span>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" >
                        <span style="font-size: small;color: #00A000;">根本原因:</span>

                        <?php if(in_array(($ReformIntStatus), explode(',',"1"))): ?>
                            <input class="form-control" name="RootCause" value="<?php echo $Reform['RootCause']; ?>"/>
                        <?php endif; if(in_array(($ReformIntStatus), explode(',',"2,5"))): if($Reform['RequireDefineCause'] == 'YES'): ?>
                                <input class="form-control" name="RootCause" value="<?php echo $Reform['RootCause']; ?>"/>
                            <?php endif; if($Reform['RequireDefineCause'] != 'YES'): ?>
                                <span><?php echo $Reform['RootCause']; ?></span><span style="font-size: smaller;color: #0d7bdc;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $Reform['CauseEvalerName']; ?>&nbsp;&nbsp;<?php echo $Reform['CauseEvalTime']; ?></span>
                            <?php endif; endif; if(!in_array(($ReformIntStatus), explode(',',"1,2,5"))): ?>
                            <span><?php echo $Reform['RootCause']; ?></span><span style="font-size: smaller;color: #0d7bdc;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $Reform['CauseEvalerName']; ?>&nbsp;&nbsp;<?php echo $Reform['CauseEvalTime']; ?></span>
                        <?php endif; ?>

                    </td>
                </tr>
                <tr>
                    <td rowspan="4" class="PrivTD">
                        <span style="font-size: medium;color: #00A000;">整改措施:</span>
                    </td>
                    <td colspan="3">
                        <span style="font-size: medium;color: #00A000;">纠正措施:</span>
                        <?php if(in_array(($ReformIntStatus), explode(',',"1,2,5"))): ?>
                             <textarea class="form-control" style="height: 150px;" name="CorrectiveAction" ><?php echo $Reform['CorrectiveAction']; ?></textarea>
                        <?php endif; if(!in_array(($ReformIntStatus), explode(',',"1,2,5"))): ?>
                            <span><?php echo $Reform['CorrectiveAction']; ?></span><span style="font-size: smaller;color: #0d7bdc;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $Reform['ActionMakerName']; ?>&nbsp;&nbsp;<?php echo $Reform['ActionMakeTime']; ?></span>
                        <?php endif; ?>
                        <br/>
                    </td>

                </tr>
                <tr>
                    <td class="PrivTD">
                        <span style="font-size:small;color: red;">纠正措施预计完成期限:</span>
                    </td>
                    <td colspan="2">

                        <?php if(in_array(($ReformIntStatus), explode(',',"1,2,5"))): ?>
                            <input class="form-control" type="date" style="width: 150px;" name="CorrectiveDeadline" value="<?php echo $Reform['CorrectiveDeadline']; ?>"/>
                        <?php endif; if(!in_array(($ReformIntStatus), explode(',',"1,2,5"))): ?>
                            <span><?php echo $Reform['CorrectiveDeadline']; ?></span>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td  colspan="3" >
                        <span style="font-size: medium;color: #00A000;" >预防措施:</span>
                        <?php if(in_array(($ReformIntStatus), explode(',',"1,2,5"))): ?>
                            <textarea class="form-control" style="height: 150px;" name="PrecautionAction"><?php echo $Reform['PrecautionAction']; ?></textarea>
                        <?php endif; if(!in_array(($ReformIntStatus), explode(',',"1,2,5"))): ?>
                            <span><?php echo $Reform['PrecautionAction']; ?></span><span style="font-size: smaller;color: #0d7bdc;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $Reform['ActionMakerName']; ?>&nbsp;&nbsp;<?php echo $Reform['ActionMakeTime']; ?></span>
                        <?php endif; ?>
                        <br/>
                    </td>
                </tr>
                <tr>
                    <td class="PrivTD">
                        <span style="font-size: small;color: red;" >预防措施预计完成期限:</span>
                    </td>
                    <td colspan="2">
                        <?php if(in_array(($ReformIntStatus), explode(',',"1,2,5"))): ?>
                            <input class="form-control" type="date" style="width: 150px;" name="PrecautionDeadline" value="<?php echo $Reform['PrecautionDeadline']; ?>"/>
                        <?php endif; if(!in_array(($ReformIntStatus), explode(',',"1,2,5"))): ?>
                            <span><?php echo $Reform['PrecautionDeadline']; ?></span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php if($ReformIntStatus >= 3): ?>
                <tr>
                    <td class="PrivTD">
                        <span style="font-size: medium;color: #00A000;">措施评估:</span>
                    </td>
                    <td colspan="3">
                        <?php if(in_array(($ReformIntStatus), explode(',',"1,3"))): ?>
                        <span><input name="ActionIsOK" type="radio" value="YES" <?php if($Reform['ActionIsOK'] == 'YES'): ?> checked="checked" <?php endif; ?> /><label class="label label-success">措施评估通过</label> <span/>
                            <span><input name="ActionIsOK" type="radio" value="NO" <?php if($Reform['ActionIsOK'] == 'NO'): ?> checked="checked" <?php endif; ?>/><label class="label label-danger">措施评估不通过</label> </span>
                            <br/>
                            <textarea class="form-control" style="height: 100px;" name="ActionEval"><?php echo $Reform['ActionEval']; ?></textarea>
                        <?php endif; if(!in_array(($ReformIntStatus), explode(',',"1,3"))): ?>
                            <span><input name="ActionIsOK" type="radio" value="YES" <?php if($ReformIntStatus != '1,3'): ?> disabled="disabled" <?php endif; if($Reform['ActionIsOK'] == 'YES'): ?> checked="checked" <?php endif; ?> /><label class="label label-success">措施评估通过</label> </span>
                            <span><input name="ActionIsOK" type="radio" value="NO" <?php if($ReformIntStatus != '1,3'): ?> disabled="disabled" <?php endif; if($Reform['ActionIsOK'] == 'NO'): ?> checked="checked" <?php endif; ?> /><label class="label label-danger">措施评估不通过</label> </span>
                            <br/>
                            <span><?php echo $Reform['ActionEval']; ?></span><span style="font-size: smaller;color: #0d7bdc;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $Reform['ActionEvalerName']; ?>&nbsp;&nbsp;<?php echo $Reform['ActionEvalTime']; ?></span>
                        <?php endif; ?>

                    </td>
                </tr>
                <?php endif; if(in_array(($ReformIntStatus), explode(',',"4,7"))): ?>
                    <tr>
                        <td class="PrivTD">
                            <span style="font-size: medium;color: #0000cc;">纠正措施<br/>整改证据:</span>
                        </td>
                        <td colspan="3">
                            <?php 
                                $showType  = '';
                                if(session('Corp') == $Reform['DutyCorp'] && $ReformIntStatus==4 && ($Reform['CorrectiveActionProof'] == '' || $Reform['CorrectiveActionProofEvalIsOK'] == 'NO') ){
                                    $showType = 'EDIT';
                                }else{
                                    $showType ='SHOW';
                                }
                             if($showType == 'EDIT'): ?>
                                <textarea id="CorrectiveActionProof"  name="CorrectiveActionProof" style="width:100%;"><?php echo htmlspecialchars_decode($Reform['CorrectiveActionProof'] ); ?></textarea>
                            <?php endif; if($showType != 'EDIT'): ?>
                                <span><?php echo htmlspecialchars_decode($Reform['CorrectiveActionProof'] ); ?></span><span style="font-size: smaller;color: #0d7bdc;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $Reform['CorrectiveActionProofUploaderName']; ?>&nbsp;&nbsp;<?php echo $Reform['CorrectiveActionProofUploadTime']; ?></span>
                            <?php endif; ?>

                        </td>
                    </tr>
                <?php endif; if($Reform['CorrectiveActionProof'] != ''): ?>
                    <tr >
                        <td class="PrivTD">
                            <span style="font-size: medium;color: #0000cc;">纠正措施<br/>证据评估:</span>
                        </td>
                        <td colspan="3" style="">
                            <?php 
                                $showType  = '';
                                if(session('Corp') == $Reform['IssueCorp']){
                                    $showType = $Reform['CorrectiveActionProofEvalIsOK']==''?'EDIT':'SHOW';
                                }else{
                                    $showType ='SHOW';
                                }
                             if($showType == 'EDIT'): ?>
                            <span><input name="CorrectiveActionProofEvalIsOK" type="radio" value="YES"  <?php if($Reform['CorrectiveActionProofEvalIsOK'] == 'YES'): ?> checked="checked" <?php endif; ?>  /><label class="label label-success">整改效果可接受</label> <span/>
                                <span><input name="CorrectiveActionProofEvalIsOK" type="radio" value="NO"  <?php if($Reform['CorrectiveActionProofEvalIsOK'] == 'NO'): ?> checked="checked" <?php endif; ?>  /><label class="label label-danger">整改效果不可接受</label> </span>
                            <br/>
                                <textarea class="form-control" style="height: 100px;" name="CorrectiveActionProofEvalMemo"><?php echo $Reform['CorrectiveActionProofEvalMemo']; ?></textarea>
                            <?php endif; if($showType != 'EDIT'): ?>
                                <span><input name="CorrectiveActionProofEvalIsOK" type="radio" value="YES"  disabled="disabled"  <?php if($Reform['CorrectiveActionProofEvalIsOK'] == 'YES'): ?> checked="checked" <?php endif; ?>  /><label class="label label-success">整改效果可接受</label> <span/>
                                    <span><input name="CorrectiveActionProofEvalIsOK" type="radio" value="NO"  disabled="disabled" <?php if($Reform['CorrectiveActionProofEvalIsOK'] == 'NO'): ?> checked="checked" <?php endif; ?>  /><label class="label label-danger">整改效果不可接受</label> </span>
                                <br/>
                                     <span><?php echo $Reform['CorrectiveActionProofEvalMemo']; ?></span><span style="font-size: smaller;color: #0d7bdc;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $Reform['CorrectiveActionProofEvalerName']; ?>&nbsp;&nbsp;<?php echo $Reform['CorrectiveActionProofEvalTime']; ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endif; if(in_array(($ReformIntStatus), explode(',',"4,7"))): ?>
                    <tr>
                        <td class="PrivTD">
                            <span style="font-size: medium;color:black;">预防措施<br/>整改证据:</span>
                        </td>
                        <td colspan="3">
                            <?php 
                                $showType  = '';
                                if(session('Corp') == $Reform['DutyCorp'] && $ReformIntStatus==4 && ($Reform['PrecautionActionProof'] == '' || $Reform['PrecautionActionProofEvalIsOK'] == 'NO') ){
                                    $showType = 'EDIT';
                                }else{
                                    $showType ='SHOW';
                                }
                             if($showType == 'EDIT'): ?>
                                 <textarea id="PrecautionActionProof"  name="PrecautionActionProof" style="width:100%;"><?php echo htmlspecialchars_decode($Reform['PrecautionActionProof'] ); ?></textarea>
                            <?php endif; if($showType != 'EDIT'): ?>
                                <span><?php echo htmlspecialchars_decode($Reform['PrecautionActionProof'] ); ?></span><span style="font-size: smaller;color: #0d7bdc;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $Reform['PrecautionActionProofUploaderName']; ?>&nbsp;&nbsp;<?php echo $Reform['PrecautionActionProofUploadTime']; ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endif; if($Reform['PrecautionActionProof'] != ''): ?>
                    <tr>
                        <td class="PrivTD">
                            <span style="font-size: medium;color: black;">预防措施<br/>证据评估:</span>
                        </td>
                        <td colspan="3" style="">

                            <?php 
                                $showType  = '';
                                if(session('Corp') == $Reform['IssueCorp']){
                                    $showType = $Reform['PrecautionActionProofEvalIsOK']==''?'EDIT':'SHOW';
                                }else{
                                    $showType ='SHOW';
                                }
                             if($showType == 'EDIT'): ?>
                            <span><input name="PrecautionActionProofEvalIsOK" type="radio" value="YES"  <?php if($Reform['PrecautionActionProofEvalIsOK'] == 'YES'): ?> checked="checked" <?php endif; ?>  /><label class="label label-success">整改效果可接受</label> <span/>
                                <span><input name="PrecautionActionProofEvalIsOK" type="radio" value="NO"  <?php if($Reform['PrecautionActionProofEvalIsOK'] == 'NO'): ?> checked="checked" <?php endif; ?>  /><label class="label label-danger">整改效果不可接受</label> </span>
                            <br/>
                                <textarea class="form-control" style="height: 100px;" name="PrecautionActionProofEvalMemo"><?php echo $Reform['PrecautionActionProofEvalMemo']; ?></textarea>
                            <?php endif; if($showType != 'EDIT'): ?>
                                <span><input name="PrecautionActionProofEvalIsOK" type="radio" value="YES"  disabled="disabled"  <?php if($Reform['PrecautionActionProofEvalIsOK'] == 'YES'): ?> checked="checked" <?php endif; ?>  /><label class="label label-success">整改效果可接受</label> <span/>
                                    <span><input name="PrecautionActionProofEvalIsOK" type="radio" value="NO"  disabled="disabled" <?php if($Reform['PrecautionActionProofEvalIsOK'] == 'NO'): ?> checked="checked" <?php endif; ?>  /><label class="label label-danger">整改效果不可接受</label> </span>
                                <br/>
                                     <span><?php echo $Reform['PrecautionActionProofEvalMemo']; ?></span><span style="font-size: smaller;color: #0d7bdc;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $Reform['PrecautionActionProofEvalerName']; ?>&nbsp;&nbsp;<?php echo $Reform['PrecautionActionProofEvalTime']; ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
    <?php if($showSaveBtn == 'YES'): ?>
        <div class="row">
            <div class="col-sm-offset-6" style="margin-top: 10px;">
                <button type="submit" class="btn btn-primary">保存并发送</button>
            </div>
        </div>
    <?php endif; ?>
</form>
<script>
    function PCUEditorInit(id) {
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
            initialFrameHeight:400
            //更多其他参数，请参考ueditor.config.js中的配置项
        });
    }
    $(function () {
        $("a[name='']").bind('click',function () {
            $("#frm1").attr("src","/Index/GiveOrental/Index/id/"+ ""+$(this).attr("rowId"));

        });
        $('.js-example-basic-multiple').select2();
        $('select').select2();
       /* var $summernote = $('textarea[summernote]').summernote({
            height: 400,
            minHeight: null,
            maxHeight: null,
            focus: true,
            airMode: false,
            //调用图片上传
            callbacks: {
                onImageUpload: function (files) {
                    sendFile($summernote, files[0]);
                }
            }
        });
        function sendFile($summernote, file) {
            var formData = new FormData();
            formData.append("file", file);
            $.ajax({
                url: "/SafetyMng/Help/uploadFile.html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function (data) {
                    //alert(data);
                    $summernote.summernote('insertImage', data, function ($image) {
                        $image.attr('src', data);
                    });
                }
            });
        }
*/
        if($('#NonConfirmDesc').length>0){
            PCUEditorInit('NonConfirmDesc');
        }

        if($('#CorrectiveActionProof').length>0){
            PCUEditorInit('CorrectiveActionProof');
        }
        if($('#PrecautionActionProof').length>0){
            PCUEditorInit('PrecautionActionProof');
        }



        $('select').select2();
        $('#ReformListForm',window.parent.document).attr('src',$('#ReformListForm',window.parent.document).attr('src'));
    });
</script>
</body>
</html>