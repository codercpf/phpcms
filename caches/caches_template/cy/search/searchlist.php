<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('content', 'header'); ?>

    <link rel="stylesheet" href="<?php echo WEB_PATH;?>statics/cy/css/commen.css">    
    <link rel="stylesheet" href="<?php echo WEB_PATH;?>statics/cy/css/search2.css">    
    <div id="main" class="com-width mt90 clearfix">
        <div class="list-wrap fl">
            <div class="search-page-content com-width clearfix" style="margin-top:0">
                <div class="search-left">
                    <div class="search-page-number">
                        <h1 class="keyword"><?php echo $q;?></h1>
                        <?php echo $totalnums;?>个结果
                    </div>
                    <div class="search-data-list">
                    <?php $n=1; if(is_array($data)) foreach($data AS $i => $r) { ?>
                        <div class="content-item clearfix">
                            <div class="item-img fl">
                                <a href="<?php echo $r['url'];?>" target="_blank">
                                    <img src="<?php echo $r['thumb'];?>" alt="" title=""></a>
                            </div>
                            <div class="item-info fl">
                                <h2 class="item-tit">
                                    <a href="<?php echo $r['url'];?>" target="_blank">
                                        <?php echo $r['title'];?>
                                    </a>
                                </h2>
                                <p class="item-intro"><?php echo $r['description'];?></p>
                                <p class="item-other">
                                    <!-- <span class="author fl">Nana</span> -->
                                    <span class="tag fr">发布时间：<?php echo format::date($r[inputtime], 0);?></span>
                                </p>
                            </div>
                        </div>
                    <?php $n++;}unset($n); ?>
                    <?php if(empty($data)) { ?>
                        <div class="search-no-result">
                            <span class="orange">抱歉 未找到结果</span>
                            请尝试搜索其他关键词
                        </div>                    
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- 右侧栏 -->
        <?php include template('content','rightside'); ?>
        <!-- 右侧栏结束 -->
    </div>

<?php include template('content', 'footer'); ?>
