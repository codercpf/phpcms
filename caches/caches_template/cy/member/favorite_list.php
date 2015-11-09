<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('content', 'header'); ?>
<link rel="stylesheet" href="<?php echo WEB_PATH;?>statics/cy/css/commen.css">
<link rel="stylesheet" href="<?php echo WEB_PATH;?>statics/cy/css/member.css" />


<div id="main" class="com-width mt20 clearfix">
	<div id="member" class="clearfix">
		<?php include template('member','account_manage_left'); ?>
		
		<div id="member-content" class="member-content fr">
			<div class="member-collect">
				<div class="member-content-hd">
					<span class="ui-tab-tit show-item">我的收藏</span>
				</div>

				<div class="member-bd">

					<ul class="member-collect-list">
						<?php $n=1; if(is_array($favoritelist)) foreach($favoritelist AS $k => $v) { ?>
							<li class="member-collect-item">
								<a href="<?php echo $v['url'];?>" target="_blank" class="collect-tit fl"><?php echo $v['title'];?></a>
								<!-- <td><?php echo format::date($v['adddate'], 1);?></td> -->
								<a href="index.php?m=member&c=index&a=favorite&id=<?php echo $v['id'];?>" class="collect-btn fr">取消收藏</a>
							</li>
						<?php $n++;}unset($n); ?>						

<!-- 
						<li class="member-collect-item">
							<a href="http://www.linkedin.com/shareArticle?mini=true&url=http://www.cyzone.cn/a/20150925/281060.html?utm_s" class="collect-tit fl">为什么互联网医疗消灭不了黄牛？</a>
							<a href="javascript:;" data-modelid="1" data-id="281060" class="collect-btn fr">取消收藏</a>
						</li>						
 -->
						<li class="member-collect-item hide no-item">
							<a class="collect-tit fl">您还没有收藏的文章哦</a>
						</li>
					</ul>
<!-- 
					<form method="post" action="" id="myform" name="myform">
						<table width="100%" cellspacing="0" class="table_form">
							<tr>
								<td><?php echo L('title');?></td>
								<td><?php echo L('adddate');?></td>
								<td><?php echo L('operation');?></td>
							</tr>
							<?php $n=1; if(is_array($favoritelist)) foreach($favoritelist AS $k => $v) { ?>
							<tr>
								<td><a href="<?php echo $v['url'];?>" target="_blank"><?php echo $v['title'];?></a></td>
								<td><?php echo format::date($v['adddate'], 1);?></td>
								<td><a href="index.php?m=member&c=index&a=favorite&id=<?php echo $v['id'];?>"><?php echo L('delete');?></a></td>
							</tr>
							<?php $n++;}unset($n); ?>
						</table>
					</form>

 -->
				</div>
				<div id="pages"><?php echo $pages;?></div>
			</div>
		</div>
	</div>
</div>

<!-- <script src="<?php echo WEB_PATH;?>statics/cy/js/sea.js"></script>
<script src="<?php echo WEB_PATH;?>statics/cy/js/sea_config.js"></script>
<script src="<?php echo WEB_PATH;?>statics/cy/js/seajs-css.js"></script> -->

<?php include template('content', 'footer'); ?>