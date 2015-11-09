<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html lang="zh">
<head>
<?php include template("common","meta"); ?>
<title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
<?php include template("common","style"); ?>
<?php include template("common","javascript"); ?>
<style type="text/css">
/* 分类导航 */
.sort > ul > li{overflow:hidden; line-height:2em; padding: 0.5em; border-top: 0.1em dashed rgb(220,220,220);}
.sort > ul > li:first-child{border-top: 0;}
.sort > ul > li > h6,.sort > ul > li > ul >li{float: left;}
.sort > ul > li > ul{overflow:hidden;}
.sort li li{margin-left: 1em;}
.sort li.selected > a{color: rgb(255,0,0); font-weight: bold;}
/* 项目列表 */
.project > div.table > div.tbody div.td{vertical-align:middle;}
.project > div.table > div.tbody div.image{width:5em; height: 5em; position: absolute; top:0.5em; left:0.5em;}
.project > div.table > div.tbody div.image > a,.project > div.table > div.tbody div.image img{display: block; width: 100%; height: 100%;}
.project > div.table > div.tbody div.info{height: 5em; margin-left:5.5em; overflow: hidden;}
.project > div.table > div.tbody div.title{line-height: 2em; font-weight: bold;}
.project > div.table > div.tbody div.company,.project > div.table > div.tbody div.brief{line-height:1.5em;}
.project > div.table > div.tbody div.brief{text-indent:0; color:rgb(128,128,128); overflow:hidden; text-overflow:ellipsis;}
</style>
</head>
<body>
<div class="site">
<?php include template("common","header"); ?>
<?php $typeid = intval($_GET['typeid']);?>
<?php $state = $_GET['state'];?>
<div class="content">
    <div class="container hidden margin-bottom" >
        <div class="nav margin-top">
            <div class="sort bg border">
                <ul>
                    <li>
                        <h6>行业</h6>
                        <?php $TYPE = getcache('type_content_'.$siteid,'commons'); ?>
                        <?php $arrtype = explode(',',$usable_type); ?>
                        <ul>
                            <li<?php if(empty($typeid)||$typeid==0) { ?> class="selected"<?php } ?>><a href="index.php?m=content&c=index&a=lists&catid=<?php echo $catid;?>&state=<?php echo $state;?>">全部</a></li>
                            <?php $n=1;if(is_array($arrtype)) foreach($arrtype AS $t) { ?>
                            <?php if(!empty($t)) { ?>
                            <li<?php if($typeid==$t) { ?> class="selected"<?php } ?>><a href="index.php?m=content&c=index&a=lists&catid=<?php echo $catid;?>&typeid=<?php echo $t;?>&state=<?php echo $state;?>"><?php echo $TYPE[$t]['name'];?></a></li>
                            <?php } ?>
                            <?php $n++;}unset($n); ?>
                        </ul>
                    </li>
                    <li>
                        <h6>状态</h6>
                        <ul><?php $n=1;if(is_array(filters('state',12))) foreach(filters('state',12) AS $r) { ?>
                            <li<?php if($state==$r['value']) { ?> class="selected"<?php } ?>><a href="index.php?m=content&c=index&a=lists&catid=<?php echo $catid;?>&typeid=<?php echo $typeid;?>&state=<?php echo $r['value'];?>"><?php echo $r['name'];?></a></li><?php $n++;}unset($n); ?>
                        </ul>
                    </li>
                    <li>
                        <h6>排序</h6>
                        <ul>
                            <li class="selected"><a href="#">综合推荐</a></li>
                            <li><a href="#">最新上线</a></li>
                            <li><a href="#">热投项目</a></li>
                            <li><a href="#">冷门项目</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main margin-top project">
            <div class="table border">
                <div class="colgroup">
                    <div class="col"></div>
                    <div class="col" style="width: 7em;"></div>
                    <div class="col" style="width: 6em;"></div>
                    <div class="col" style="width: 8em;"></div>
                    <div class="col" style="width: 7em;"></div>
                </div>
                <div class="thead">
                    <div class="tr">
                        <div class="th">项目</div>
                        <div class="th">类型</div>
                        <div class="th">状态</div>
                        <div class="th">融资金额</div>
                        <div class="th">时间</div>
                    </div>
                </div>
                <div class="tbody">
                    <?php
                    if(empty($typeid)){
                        $where = '';
                    }else{
                        $where = 'typeid='.$typeid;
                    }
                    if(!empty($state)){
                        if(empty($where)){
                            $where .= 'state="'.$state.'"';
                        }else{
                            $where .= ' and state="'.$state.'"';
                        }
                    }
                    ?>
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=dd9d217fcfd95fb4500bcf236170c988&action=lists&catid=%24catid&where=%24where&order=listorder+DESC&num=15&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 15;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'where'=>$where,'order'=>'listorder DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'where'=>$where,'order'=>'listorder DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
                    <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                    <div class="tr">
                        <div class="td">
                            <div class="image"><a href="<?php echo $r['url'];?>" target="_blank"><img src="<?php echo $r['thumb'];?>"></a></div>
                            <div class="info">
                                <div class="title"><a href="<?php echo $r['url'];?>" target="_blank"><?php echo $r['title'];?></a></div>
                                <div class="company"><a href="#" target="_blank"><?php echo $r['username'];?></a></div>
                                <div class="brief"><?php echo $r['description'];?></div>
                            </div>
                        </div>
                        <div class="td text-center"><a href="index.php?m=content&c=index&a=lists&catid=<?php echo $catid;?>&typeid=<?php echo $r['typeid'];?>" target="_blank"><?php echo $TYPE[$r['typeid']]['name'];?></a></div>
                        <div class="td text-center"><a href="#" target="_blank"><?php echo $r['state'];?></a></div>
                        <div class="td">￥<?php echo number_format($r[financing]);?></div>
                        <div class="td"><?php echo date('Y-m-d',$r[expiration]);?></div>
                    </div>
                    <?php $n++;}unset($n); ?>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </div>
            </div>
            <?php echo $pages;?>
        </div>
        <?php include template("content","sidebar"); ?>
    </div>
</div>
<?php include template("common","footer"); ?>
</div>
</body>
</html>