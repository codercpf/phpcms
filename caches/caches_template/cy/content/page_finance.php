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
        <h2>融资申请</h2>
        <article>
            <section class="section-submit-report">
             
    <div class="form-group">
        <div class="form-controls">
            <div class="report-con-tips reportTipsShow">
                <ol>
                    <li>请认真填写以下表格内容，如内容较多，可在商业计划书中另附内容，以附件形式上传</li>
                    <li>请在商业计划书中阐述清楚商业模式；附加公司现阶段面临的问题，以及解决方案；并详细阐述公司核心团队的从业经历———你懂得，投资本质是投人！</li>
                </ol>
            </div>
        </div>
    </div>

                <form action="<?php echo APP_PATH;?>index.php?m=content&c=index&a=receivefinance" method="post" class="form-horizontal form-model" name="financeForm">
                    <div class="form-group">
                        <label class="label-control">
                            <span class="required">*</span>
                            项目名称
                        </label>
                        <div class="form-controls">
                            <input type="text" class="form-control" name="finance[itemName]" datatype="*">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label-control">
                            <span class="required">*</span>
                            项目标签
                        </label>
                        <div class="form-controls">
                            <input type="radio" name="finance[itemType]"  class="radio" value="电子商务" datatype="*" nullmsg="请选择项目标签">电子商务&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="finance[itemType]"  class="radio" value="SNS社交网络">SNS社交网络&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="finance[itemType]"  class="radio" value="广告营销">广告营销&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="finance[itemType]"  class="radio" value="游戏动漫">游戏动漫<br/>
                            <input type="radio" name="finance[itemType]"  class="radio" value="电子硬件">电子硬件&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="finance[itemType]"  class="radio" value="消费生活">消费生活&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="finance[itemType]"  class="radio" value="医疗健康 ">医疗健康 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="finance[itemType]"  class="radio" value="金融服务">金融服务<br/>
                            <input type="radio" name="finance[itemType]"  class="radio" value="教育培训">教育培训&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="finance[itemType]"  class="radio" value="旅游户外">旅游户外&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="finance[itemType]"  class="radio" value="多媒体娱乐">多媒体娱乐&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="finance[itemType]"  class="radio" value="汽车交通">汽车交通<br/>
                            <input type="radio" name="finance[itemType]"  class="radio" value="企业服务">企业服务&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="finance[itemType]"  class="checkbox ot" value="其他">其他
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
                            联系人
                        </label>
                        <div class="form-controls">
                            <input type="text" class="form-control" name="finance[contactPerson]" datatype="*">
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label class="label-control">
                            <span class="required">*</span>
                            联系电话
                        </label>
                        <div class="form-controls">
                            <input type="text" class="form-control" name="finance[contactTel]" datatype="m"></div>
                    </div>
                    <div class="form-group">
                        <label class="label-control">
                            <span class="required">*</span>
                            E-Mail
                        </label>
                        <div class="form-controls">
                            <input type="email" class="form-control" name="finance[contactEmail]" datatype="e"></div>
                    </div>
                    <div class="form-group">
                        <label class="label-control">
                            <span class="required">*</span>
                            通讯地址
                        </label>
                        <div class="form-controls">
                            <input type="text" class="form-control" name="finance[contactAddr]" datatype="*"></div>
                    </div>

                    <div class="form-group">
                        <label class="label-control">
                            <span class="required">*</span>
                            融资目的
                        </label>
                        <div class="form-controls">
                            <input type="text" class="form-control" name="finance[financeAim]" datatype="*"></div>
                    </div>                   

                    
                    <div class="form-group">
                        <label class="label-control">
                            <span class="required">*</span>
                            市场规模
                        </label>
                        <div class="form-controls">
                            <input type="text" class="form-control" name="finance[marketSize]" datatype="*"></div>
                    </div>
                    <div class="form-group">
                        <label class="label-control">
                            <span class="required">*</span>
                            产品/服务
                        </label>
                        <div class="form-controls">                            
                            <input type="text" class="form-control" name="finance[proService]" placeholder="公司产品/服务的开发计划" datatype="*"></div>
                    </div>                    
                    
                    <div class="form-group">
                        <label class="label-control">
                            <span class="required">*</span>
                            融资额度
                        </label>
                        <div class="form-controls">
                            <input type="number" class="form-control" name="finance[financeNum]" datatype="*">&nbsp;万</div>
                    </div>
                    <div class="form-group">
                        <label class="label-control">
                            <span class="required">*</span>
                            转让股份比例
                        </label>
                        <div class="form-controls">
                            <input type="text" class="form-control" name="finance[financePercent]" datatype="/^(100|[1-9]?\d(\.\d\d?)?)%$/" nullmsg="请填写转让股份比例" errormsg="格式错误，如20%"></div>
                    </div>
                    <div class="form-group">
                        <label class="label-control">
                            <span class="required">*</span>
                                商业计划书
                        </label>
                        <div class="form-controls"> 
                                <?php echo form::upfiles('finance[busiplan]', 'busiplan', '', 'content','','','form-control','','pdf|doc|docx|xls|xlsx|ppt|pptx')?>
                                <br/>
                        </div>
                    </div>

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
        var demo = $('form[name="financeForm"]').Validform({
            tiptype:3,
            label:".label-control",
            showAllError:true,
            ajaxPost:false
        });
/*
       demo.addRule([
       {
            ele:":input#busiplan",
            datatype:"*",
            nullmsg="请上传商业计划书",
            alert(1)
        }
        ]);
*/
    });
</script>
<?php include template("content","footer"); ?>
