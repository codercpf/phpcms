<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
    <link rel="stylesheet" href="<?php echo WEB_PATH;?>statics/cy/css/report.css"></head>

    <div class="maincontent">
        <div class="clearfix help-main">
            <h2>寻求报道</h2>
            <article>
                <section class="section-submit-report">
                    <div class="form-group">
                        <div class="form-controls">
                            <div class="report-con-tips reportTipsShow">
                                <ol>
                                    <li>请在下边的文本框里用尽量简洁的说清楚你产品的特点，和别人不同的地方。</li>
                                    <li>希望简短的几句话，能够打动我们的作者，让他们马上就愿意试用你的产品，或者去联系你。</li>
                                    <li>如果你希望我们花几个小时时间去报道你的公司，也请你花半个小时时间用心填写这个表单。</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <form class="form-horizontal form-model" name="reportForm">
                        <div class="form-group">
                            <label class="label-control">
                                <span class="required">*</span>
                                公司名称
                            </label>
                            <div class="form-controls">
                                <input type="text" class="form-control" name="companyName" required></div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">
                                <span class="required">*</span>
                                公司地址
                            </label>
                            <div class="form-controls">
                                <input type="text" class="form-control" name="companyAddr" required></div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">
                                <span class="required">*</span>
                                所属行业
                            </label>
                            <div class="form-controls">
                                <input type="text" class="form-control" name="companyRealm" required></div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">
                                <span class="required">*</span>
                                你产品的主要功能或服务是？
                            </label>
                            <div class="form-controls">
                                <textarea class="form-control" id="" cols="30" rows="5" placeholder="200字以内" name="introduction" maxlength="200" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">
                                <span class="required">*</span>
                                对行业的看法
                            </label>
                            <div class="form-controls">
                                <textarea class="form-control" id="" cols="30" rows="5" placeholder="1000字以内" name="industryViewpoint" maxlength="1000" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="label-control">
                                <span class="required">*</span>
                                创业有趣经历分享
                            </label>
                            <div class="form-controls">
                                <textarea class="form-control" id="" cols="30" rows="5" placeholder="1000字以内" name="interestingExp" maxlength="1000" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">
                                <span class="required">*</span>
                                联系方式（电话、邮箱等）
                            </label>
                            <div class="form-controls">
                                <textarea class="form-control" cols="30" rows="5" placeholder="100字以内" name="contactInfo" maxlength="100" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label-control">
                                <span class="required">&nbsp;</span>
                            </label>
                            <div class="form-controls">
                                <button type="submit" class="btn-normal">提交</button>
                            </div>
                        </div>
                    </form>
                </section>
            </article>
        </div>
    </div>
    
<?php include template("content","footer"); ?>