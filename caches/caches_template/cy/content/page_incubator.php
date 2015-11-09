<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
    <link rel="stylesheet" href="<?php echo WEB_PATH;?>statics/cy/css/report.css">
    <script type="text/javascript">
    <!--
        var charset = '<?php echo CHARSET;?>';
        var uploadurl = '<?php echo pc_base::load_config('system','upload_url')?>';
        var formclass = '<?php echo pc_base::load_sys_class('form', '', 0)?>';
    //-->
    </script>
    <!-- 上传框样式文件，必须 -->
    <link href="<?php echo CSS_PATH;?>dialog.css" rel="stylesheet" type="text/css" />
    <!-- 支持弹出上传框，必须 -->
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH;?>dialog.js"></script>
    <meta charset="utf-8"/>

    
    <div class="maincontent">
        <div class="clearfix help-apply">
            <h2>入驻申请</h2>
            <article>
                <section class="section-submit-report">
                    <div class="form-group">
                        <div class="form-controls">
                            <div class="report-con-tips reportTipsShow">
                                <ol>
                                    <li>
                                        流程：项目及团队介绍材料提交 –> 机构评审、孵化服务中心审核 –> 团队当面交流 –> 通过并签订入驻协议 –> 正式入驻
                                    </li>
                                    <li>在以往创业大赛获奖的初创型大学生创业者、团队以及中小企业优先入驻孵化器</li>
                                    <li>
                                        入驻创业实体(团队)出现从事违法生产经营活动、严重或屡次违反孵化基地有关管理规定、入驻后三个月未能正常从事生产经营活动、入驻创业实体(团队)转让致使创业主体不符合入驻条件等情形之一的，园区责令其限期(最长不超过30日)退出孵化基地
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <form action="<?php echo APP_PATH;?>index.php?m=content&c=index&a=receiveapply" method="post" class="form-horizontal form-model" name="applyForm">

                        <div class="form-group">
                            <label class="label-control">
                                <span class="required">*</span>
                                公司名称
                            </label>
                            <div class="form-controls">
                                <input type="text" class="form-control" name="apply[companyName]" datatype="*"></div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">
                                <span class="required">*</span>
                                联系人
                            </label>
                            <div class="form-controls">
                                <input type="text" class="form-control" name="apply[contactPerson]" datatype="*"></div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">
                                <span class="required">*</span>
                                联系人职务
                            </label>
                            <div class="form-controls">
                                <input type="text" class="form-control" name="apply[contactPost]" datatype="*"></div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">
                                <span class="required">*</span>
                                联系电话
                            </label>
                            <div class="form-controls">
                                <input type="text" class="form-control" name="apply[contactTel]" datatype="m">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">
                                <span class="required">*</span>
                                E-Mail
                            </label>
                            <div class="form-controls">
                                <input type="text" class="form-control" name="apply[contactEmail]" datatype="e">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="label-control">
                                <span class="required">*</span>
                                通讯地址
                            </label>
                            <div class="form-controls">
                                <input type="text" class="form-control" name="apply[contactAddr]" datatype="*"></div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">
                                <span class="required">*</span>
                                企业官网
                            </label>
                            <div class="form-controls">
                                <input type="text" class="form-control" name="apply[companyWeb]" datatype="url" errormsg="网址以http://开头"></div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">
                                <span class="required">*</span>
                                项目类型
                            </label>
                            <div class="form-controls" style="display: block">
                                <input type="radio" name="apply[itemType]"  class="radio" value="电子商务" datatype="*" nullmsg="请选择项目类型！">    
                                电子商务&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="apply[itemType]"  class="radio" value="SNS社交网络">    
                                SNS社交网络&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="apply[itemType]"  class="radio" value="广告营销">    
                                广告营销&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="apply[itemType]"  class="radio" value="游戏动漫">    
                                游戏动漫
                                <br/>    
                                <input type="radio" name="apply[itemType]"  class="radio" value="电子硬件">    
                                电子硬件&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="apply[itemType]"  class="radio" value="消费生活">    
                                消费生活&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="apply[itemType]"  class="radio" value="医疗健康 ">    
                                医疗健康 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="apply[itemType]"  class="radio" value="金融服务">    
                                金融服务
                                <br/>    
                                <input type="radio" name="apply[itemType]"  class="radio" value="教育培训">    
                                教育培训&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="apply[itemType]"  class="radio" value="旅游户外">    
                                旅游户外&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="apply[itemType]"  class="radio" value="多媒体娱乐">    
                                多媒体娱乐&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="apply[itemType]"  class="radio" value="汽车交通">    
                                汽车交通
                                <br/>    
                                <input type="radio" name="apply[itemType]"  class="radio" value="企业服务">    
                                企业服务&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="apply[itemType]"  class="checkbox ot" value="其他">其他
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">
                                <span class="required">*</span>
                                团队人数
                            </label>
                            <div class="form-controls">
                                <input type="number" min="0" class="form-control" name="apply[teamNum]" datatype="n"></div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">
                                <span class="required">*</span>
                                项目现状
                            </label>
                            <div class="form-controls">
                                <input type="radio" name="apply[itemStatus]" class="statusradio" value="创意阶段" datatype="*" nullmsg="请选择项目现状！">    
                                创意阶段&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="apply[itemStatus]" class="statusradio" value="创业计划">    
                                创业计划&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="apply[itemStatus]" class="statusradio" value="已经启动">    
                                已经启动&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="apply[itemStatus]" class="statusradio" value="已经运营">
                                已经运营&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="label-control">
                                <span class="required">*</span>
                                上传附件
                            </label>
                            <div class="form-controls">
                                <?php echo form::upfiles('apply[attachment]', 'attachment', '', 'content','','','form-control','','pdf|doc|docx|xls|xlsx|ppt|pptx')?>    
                                <br/>    
                            </div>
                        </div>

<!--                        
                    <div class="form-group">    
                        <label class="label-control">
                            <span class="required">*</span>
                            验证码
                        </label>
                        <div class="form-controls">
                            <?php //echo form::checkcode(); ?>    
                            <br/>    
                        </div>
                    </div>
-->
                    <div class="form-group">
                        <label class="label-control">
                            <span class="required">&nbsp;</span>
                        </label>
                        <div class="form-controls">
                            <button type="submit" name="dosubmit" class="btn-normal" value="提交">提交</button>
                        </div>                        
                    </div>                    

                </form>
            </section>
        </article>
    </div>
    </div>

<script type="text/javascript" src="<?php echo WEB_PATH;?>statics/cy/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>statics/cy/js/Validform_v5.3.2.js"></script>
<script type="text/javascript">
    $(function(){
        var demo = $('form[name="applyForm"]').Validform({
            tiptype:3,
            label:".label-control",
            showAllError:true,
            ajaxPost:false
        });

       /* demo.addRule([{
            ele:":radio:first",
            datatype:"*"
        },
        ]);
        */ 

    });
</script>

<?php include template("content","footer"); ?>
