<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<!--main-->
<link rel="stylesheet" href="<?php echo WEB_PATH;?>statics/cy/css/commen.css">
<link rel="stylesheet" href="<?php echo WEB_PATH;?>statics/cy/css/list.css">

<div id="main" class="com-width mt90 clearfix">

    <div class="list-wrap fl">

        <div class="articles-list">
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=11e982198282a77f17ebf8d7a1dede5e&action=lists&catid=%24catid&num=10&order=id+DESC&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 10;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>        
<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
    <?php if($n==1) { ?>
            <div class="content-item-notop content-item clearfix">
    <?php } else { ?>
            <div class="content-item clearfix">
    <?php } ?>
                    <div class="item-img fl">
                        <a href="<?php echo $r['url'];?>" target="_blank">
                            <img src="<?php echo thumb($r[thumb],186,118,0);?>" alt="" title=""></a>
                    </div>
                    <div class="item-info fr">
                        <h2 class="item-tit">
                            <a href="<?php echo $r['url'];?>" target="_blank"><?php echo $r['title'];?></a>
                        </h2>
                        <p class="item-intro"><?php echo str_cut($r[description],300);?></p>
                        <p class="item-other">
                            <!-- <span class="author fl"><?php echo $r['username'];?></span> -->
                        <span class="time fr" data-time="<?php echo $r['inputtime'];?>" title="<?php echo date('Y-m-d H:i:s',$r[inputtime]);?>"><?php echo date('Y-m-d',$r[inputtime]);?></span>
                    </p>
                </div>
            </div>
            <hr>
<?php $n++;}unset($n); ?>
            <div id="pages" class="page-box"><?php echo $pages;?></div>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </div>
    </div>
    <!--首页右侧-->
    <?php include template('content', 'rightside'); ?>
    <!--首页右侧-->
    </div>
</div>
<?php include template("content","footer"); ?>