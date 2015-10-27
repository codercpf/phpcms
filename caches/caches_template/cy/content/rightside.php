<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><div class="right">
	
<!-- 点击排行榜 -->
<link type="text/css" href="<?php echo WEB_PATH;?>statics/cy/css/style.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo WEB_PATH;?>statics/cy/js/jquery.min2.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>statics/cy/js/jquery.idTabs.min.js"></script>

<div id="right-1" class="R-mainbox1 mar-b20">
	<h3 class="zlzj-title">
		<span>排行榜</span>
	</h3>
	<div class="top-list">
		<ul class="top-list-ul">
			<li>
				<a href="#top-list-1" class="selected">日</a>
			</li>
			<li>
				<a href="#top-list-2">周</a>
			</li>
			<li>
				<a href="#top-list-3">月</a>
			</li>
		</ul>
		<div id="top-list-1" style="display: block;">
			<ul class="wpp-list item">
				<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=fbafd35ffb693c85081188e48ecf3319&action=sitehits&siteid=1&num=10&order=dayviews+DESC&cache=60\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$tag_cache_name = md5(implode('&',array('siteid'=>'1','order'=>'dayviews DESC',)).'fbafd35ffb693c85081188e48ecf3319');if(!$data = tpl_cache($tag_cache_name,60)){$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'sitehits')) {$data = $content_tag->sitehits(array('siteid'=>'1','order'=>'dayviews DESC','limit'=>'10',));}if(!empty($data)){setcache($tag_cache_name, $data, 'tpl_data');}}?>
	<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
				<li class="title-li">
					<?php if($n==1 or $n==2 or $n==3) { ?> <i class="s-number"><?php } else { ?> <i class="q-number"><?php } ?><?php echo $n?></i>
					<a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" class="wpp-post-title" target="_blank" ><?php echo str_cut($v['title'],60,'...');?></a>						
				</li>
				<?php $n++;}unset($n); ?> 
	<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
			</ul>
		</div>
		<div id="top-list-2" style="display: none;">
			<ul class="wpp-list item">
				<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=277d0351d4e851a1d00a945b6c2c736a&action=sitehits&siteid=1&num=10&order=weekviews+DESC&cache=3600\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$tag_cache_name = md5(implode('&',array('siteid'=>'1','order'=>'weekviews DESC',)).'277d0351d4e851a1d00a945b6c2c736a');if(!$data = tpl_cache($tag_cache_name,3600)){$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'sitehits')) {$data = $content_tag->sitehits(array('siteid'=>'1','order'=>'weekviews DESC','limit'=>'10',));}if(!empty($data)){setcache($tag_cache_name, $data, 'tpl_data');}}?>
		<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
				<li class="title-li">
					<?php if($n==1 or $n==2 or $n==3) { ?>
					<i class="s-number"><?php } else { ?><i class="q-number"><?php } ?><?php echo $n?></i>
					<a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" class="wpp-post-title" target="_blank" ><?php echo str_cut($v['title'],60,'...');?></a>						
				</li>
				<?php $n++;}unset($n); ?> 
		<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
			</ul>
		</div>
		<div id="top-list-3" style="display: none;">
			<ul class="wpp-list item">
				<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=38742d14e0ae9e5ad8cc897312968fbf&action=sitehits&siteid=1&num=10&order=monthviews+DESC&cache=3600\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$tag_cache_name = md5(implode('&',array('siteid'=>'1','order'=>'monthviews DESC',)).'38742d14e0ae9e5ad8cc897312968fbf');if(!$data = tpl_cache($tag_cache_name,3600)){$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'sitehits')) {$data = $content_tag->sitehits(array('siteid'=>'1','order'=>'monthviews DESC','limit'=>'10',));}if(!empty($data)){setcache($tag_cache_name, $data, 'tpl_data');}}?>
		<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
				<li class="title-li">
					<?php if($n==1 or $n==2 or $n==3) { ?><i class="s-number"><?php } else { ?><i class="q-number"><?php } ?><?php echo $n?></i>
					<a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" class="wpp-post-title" target="_blank" ><?php echo str_cut($v['title'],60,'...');?></a>						
				</li>
				<?php $n++;}unset($n); ?> 
		<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
			</ul>
		</div>
	</div>
</div>
<script>
      jQuery(document).ready(function($) {
        $(".top-list ul").idTabs();
      });
</script>
<!-- 点击排行榜结束 -->


<!-- 评论排行榜 -->
<div id="right-2" class="R-mainbox1 mar-b20 popular-posts">
	<h3 class="zlzj-title">
		<span>热评文章</span>
	</h3>
	<div class="widget-content">
		<ul class="wpp-list item">

 				<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=cee7ba691cced57382220fb4f5856ee8&sql=select+n.%60id%60%2Cn.%60title%60%2Cn.%60thumb%60%2Cn.%60username%60%2Cc.%60url%60%2Cc.%60total%60+FROM+%60v9_news%60+AS+n%2C+%60v9_comment%60+AS+c+WHERE+%0D%0ASUBSTRING_INDEX%28SUBSTRING_INDEX%28c.%60commentid%60%2C%27-%27%2C2%29%2C%27-%27%2C-1%29%3Dn.%60id%60+AND+n.%60status%60%3D99+AND+n.%60thumb%60%21%3D%27%27+ORDER+BY+c.%60total%60+DESC&num=10&cache=60\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$tag_cache_name = md5(implode('&',array('sql'=>'select n.`id`,n.`title`,n.`thumb`,n.`username`,c.`url`,c.`total` FROM `v9_news` AS n, `v9_comment` AS c WHERE 
SUBSTRING_INDEX(SUBSTRING_INDEX(c.`commentid`,\'-\',2),\'-\',-1)=n.`id` AND n.`status`=99 AND n.`thumb`!=\'\' ORDER BY c.`total` DESC',)).'cee7ba691cced57382220fb4f5856ee8');if(!$data = tpl_cache($tag_cache_name,60)){pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select n.`id`,n.`title`,n.`thumb`,n.`username`,c.`url`,c.`total` FROM `v9_news` AS n, `v9_comment` AS c WHERE 
SUBSTRING_INDEX(SUBSTRING_INDEX(c.`commentid`,'-',2),'-',-1)=n.`id` AND n.`status`=99 AND n.`thumb`!='' ORDER BY c.`total` DESC LIMIT 10");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);if(!empty($data)){setcache($tag_cache_name, $data, 'tpl_data');}}?>
				<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
					<li class="thumb-li">
						<a class="post-thumb" href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" target="_blank">
							<img width="202" height="150" src="<?php echo thumb($v[thumb],90,66);?>" class="wpp-thumbnail wpp_featured_stock wp-post-image" alt="<?php echo $v['title'];?>" style="display: block;">
							<noscript>
								&lt;img width="202" height="150" src="<?php echo thumb($v[thumb],90,66);?>" class="wpp-thumbnail wpp_featured_stock wp-post-image" alt="6" /&gt;
							</noscript>
						</a>
						<a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" class="wpp-post-title thumb-a" target="_blank"><?php echo str_cut($v['title'],70,'...');?></a>
						<span class="post-stats">
							<span class="wpp-author">
								<a href="#"><?php echo $v['username'];?></a>
							</span>
						</span>
					</li>	
				<?php $n++;}unset($n); ?>
				<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

		</ul>
		<div class="clearfix"></div>
	</div>
</div>





<!-- 评论排行榜结束 -->
</div>
