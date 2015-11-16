<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<link rel="stylesheet" href="<?php echo WEB_PATH;?>statics/cy/css/commen.css">
<link rel="stylesheet" href="<?php echo WEB_PATH;?>statics/cy/css/search2.css">
<!--main-->
<div id="main" class="com-width mt90 clearfix">
    <div class="list-wrap fl">
        <div class="search-page-content com-width clearfix" style="margin-top:0">
            <div style="float: left;">
                <div class="search-left">
                    <div class="search-page-number">
                        <h1 class="keyword"><?php echo $tag;?></h1>
                    </div>                    
                    <div class="search-data-list">
                    <?php $n=1;if(is_array($datas)) foreach($datas AS $r) { ?>
                        <div class="content-item clearfix">
                            <div class="item-img fl">
                                <a href="<?php echo $r['url'];?>" target="_blank">
                                    <img src="<?php echo thumb($r[thumb],186,118,0);?>" alt="" title=""></a>
                            </div>
                            <div class="item-info fl">
                                <h2 class="item-tit">
                                    <a href="<?php echo $r['url'];?>" target="_blank"><?php echo $r['title'];?></a>
                                </h2>
                                <p class="item-intro"><?php echo str_cut($r[description],300);?></p>
                                
                                <p class="item-other">
                                    <!-- <span class="author fl">陈畅</span> -->
                                    <span class="time fl"><?php echo date('Y-m-d',$r[inputtime]);?></span>                                    
                                    <span class="tag fr">
                                        标签：
                                        <?php $n=1;if(is_array($r[keywords])) foreach($r[keywords] AS $keyword) { ?>
                                        <a href="<?php echo APP_PATH;?>index.php?m=content&c=tag&a=lists&tag=<?php echo urlencode($keyword);?>" target="_blank"><?php echo $keyword;?></a>
                                        <?php $n++;}unset($n); ?>
                                    </span>
                                </p>                                 
                            </div>
                        </div>
                    <?php $n++;}unset($n); ?>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--首页右侧-->
    <?php include template('content', 'rightside'); ?>
    <!--首页右侧-->
</div>

<?php include template("content","footer"); ?>