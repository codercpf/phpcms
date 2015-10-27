<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('content', 'header'); ?>
<link rel="stylesheet" href="<?php echo WEB_PATH;?>statics/cy/css/commen.css">
<link type="text/css" href="<?php echo WEB_PATH;?>statics/cy/css/index.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo WEB_PATH;?>statics/cy/js/jquery.min2.js"></script>

<div id="main" class="com-width mt90 clearfix">

	<div class="index-wrap fl">
		<div class="index-wrap-hd clearfix">
			<div class="fr">
				<link rel="stylesheet" href="<?php echo WEB_PATH;?>statics/cy/css/slide.css">

				<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=dcd1c47627b910509414b85662be50cc&action=position&posid=1&order=listorder+DESC&thumb=1&num=5\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'1','order'=>'listorder DESC','thumb'=>'1','limit'=>'5',));}?>
				<div class="ck-slide">
				<ul class="ck-slide-wrapper">
					<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
							<li class="slider-item" style="float: left;">
								<a href="<?php echo $r['url'];?>" target="_blank" >
									<img src="<?php echo thumb($r['thumb'],890,350,0);?>" alt="<?php echo $r['title'];?>" title="">
									<span class="slider-info"><?php echo $r['title'];?></span>
								</a>
							</li>
					<?php $n++;}unset($n); ?>				
				</ul>
				<a href="javascript:;" class="ctrl-slide ck-prev">上一张</a> <a href="javascript:;" class="ctrl-slide ck-next">下一张</a>
	<!-- 
				<div class="ck-slidebox">
					<div class="slideWrap">
						<ul class="dot-wrap">
							<li class="current"><em>1</em></li>
							<li><em>2</em></li>
							<li><em>3</em></li>
							<li><em>4</em></li>
							<li><em>5</em></li>
						</ul>
					</div>
				</div>
	 -->			
				</div>
				<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

				<script src="<?php echo WEB_PATH;?>statics/cy/js/jquery-1.8.3.min.js"></script>
				<script src="<?php echo WEB_PATH;?>statics/cy/js/slide.js"></script>
				<script>
					$('.ck-slide').ckSlide({
						autoPlay: true,
						dir: 'x'
					});
				</script>
			</div>		
		</div>


		<div class="index-wrap-content  mt20 clearfix">
			<!--首页中间-->
			<div id="content" class="index-content fr">
				<div id="content-list" class="cyzone-data">
					<div class="articles">
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=d7c705469bc0f9c319026188694c33cc&action=position&posid=2&order=listorder+DESC&num=5\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'2','order'=>'listorder DESC','limit'=>'5',));}?>
<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
						<div class="content-item clearfix" >
							<div class="item-img fl">
								<a href="<?php echo $r['url'];?>" target="_blank">
									<img src="<?php echo thumb($r[thumb],230,147,0);?>" alt="" title="">
								</a>
							</div>
							<div class="item-info fr">
								<h3 class="item-tit">
									<a href="<?php echo $r['url'];?>" target="_blank"><?php echo $r['title'];?></a>
								</h3>
								<p class="item-intro"><?php echo str_cut($r[description],300);?></p>
								<!--
					<p class="item-other">
								<span class="author fl">Hepburn</span>
								<span class="time fr" data-time="1444878676" title="2015/10/15 上午11:11:16">17分钟前</span>
							</p>
							-->
						</div>
					</div>
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
				</div>
			</div>

			<!-- 
	<div class="ui-more">
			<a href="javascript:;">
				<span class="cyzone-more-txt">加载更多</span>
			</a>
		</div>
		-->
			</div>
		</div>
	</div>

<!--首页右侧-->
	<?php include template('content', 'rightside'); ?>
<!--首页右侧-->
</div>

<!-- <script src="<?php echo WEB_PATH;?>statics/cy/js/sea.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>statics/cy/js/sea_config.js"></script> -->
<?php include template('content', 'footer'); ?>