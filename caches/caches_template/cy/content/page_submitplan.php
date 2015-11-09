<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>

    <link rel="stylesheet" href="<?php echo WEB_PATH;?>statics/cy/css/base.css"></head>
    <div class="content main-content-wrap">
        <div class="container investor-co">
            <div class="title line investor">
                <h3>提交商业计划书</h3>
            </div>
            <div class="waitingVal apply-syndicate">
                <div class="apply-title">请根据本公司情况将以下问题填写完整，邮件主题增加前缀【商业计划书】</div>
                <div class="apply-content">
                    <section class="part-1">
                        <h3>Part 1：</h3>
                        <p>公司简称</p>                        
                        <p>公司核心产品</p>
                        <h3></h3>
                        <p>公司业务简介</p>
                        <p>创始团队核心成员介绍</p>
                        <p>公司的优势/亮点在于</p>
                        <p>市场和竞争情况</p>
                        <p>能反映公司情况的相关数据</p> 
                    </section>
                    <section class="part-2">
                        <h3>Part 2:</h3>
                        <p>法律属性</p>
                        <p>营销策略</p>
                        <p>预计出让股权比例</p>                        
                        <h3></h3>
                        <p>本次预算金额</p>
                        <p>收支平衡计划</p>
                    </section>
                    <section class="part-3">
                        <h3>Part 3:</h3>
                        <p class="required">*请附上你的BP</p>
                    </section>
                </div>
                <a class="complete-info" href="mailto:businessplan@yunyou.com"><b class="ng-binding">发送至businessplan@yunyou.com</b></a>
                <p class="mt-15">若你的公司情况通过评估认定，我们将在15个工作日内与你取得联系。</p>
            </div>
        </div>
    </div>

<?php include template("content","footer"); ?>