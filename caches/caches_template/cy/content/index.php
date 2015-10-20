<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('content', 'header'); ?>
<link rel="stylesheet" href="<?php echo WEB_PATH;?>statics/cy/css/commen.css">
<link type="text/css" href="<?php echo WEB_PATH;?>statics/cy/css/index.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo WEB_PATH;?>statics/cy/js/jquery.min2.js"></script>

<div id="main" class="com-width mt90 clearfix">

	<div class="index-wrap fl">
		<div class="index-wrap-hd clearfix">

			<div id="index-slider" class="fr">
				<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=dcd1c47627b910509414b85662be50cc&action=position&posid=1&order=listorder+DESC&thumb=1&num=5\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'1','order'=>'listorder DESC','thumb'=>'1','limit'=>'5',));}?>
				<div class="slider-content has-dots" style="width: 890px; height: 350px; overflow: hidden;">
					<a href="javascript:;" class="slider-prev" style="opacity: 1;"></a>
					<a href="javascript:;" class="slider-next" style="opacity: 1;"></a>
					<ul style="position: relative; left: -200%; width: 600%; height: 350px;">
						<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
						<li class="slider-item" style="float: left;">
							<a href="<?php echo $r['url'];?>" target="_blank" >
								<img src="<?php echo thumb($r['thumb'],890,350);?>" alt="<?php echo $r['title'];?>" class="slider-img" title="">
								<span class="slider-info"><?php echo $r['title'];?></span>
							</a>
						</li>
						<?php $n++;}unset($n); ?>
					</ul>					
				</div>
				<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
			</div>

			<!-- 
				<div class="slide">
			<div class="FocusPic">
				<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=dcd1c47627b910509414b85662be50cc&action=position&posid=1&order=listorder+DESC&thumb=1&num=5\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'1','order'=>'listorder DESC','thumb'=>'1','limit'=>'5',));}?>
				<div class="content" id="main-slide">
					<div class="changeDiv">
						<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
						<a href="<?php echo $r['url'];?>" title="<?php echo str_cut($r['title'],30);?>">
							<img src="<?php echo thumb($r['thumb'],700,260);?>" alt="<?php echo $r['title'];?>" width="700" height="260" />
						</a>
						<?php $n++;}unset($n); ?>
					</div>
				</div>
				<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
			</div>
			<div class="bk10"></div>
		</div>
		-->
	</div>

	<!-- 
		<div class="news-hot" style="height:100px;">

	<div >
		<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=79d92623a8337007f1f3bcdd35d5f304&action=position&posid=2&order=listorder+DESC&num=4\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'2','order'=>'listorder DESC','limit'=>'4',));}?>
<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
		<h4 class="blue">
			<a href="<?php echo $r['url'];?>" title="<?php echo $r['title'];?>"><?php echo str_cut($r[title],36,'');?></a>
		</h4>
		<p>
			<img src="<?php echo thumb($r[thumb],90,60);?>" width="90" height="60"/>
			<?php echo str_cut($r[description],112);?>
		</p>
		<div class="bk20 hr">
			<hr/>
		</div>
		<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
	</div>
</div>
-->
<div class="index-wrap-content  mt20 clearfix">
	<!--首页中间-->
	<div id="content" class="index-content fr">
		<div id="content-list" class="cyzone-data">
			<div class="articles">
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=79d92623a8337007f1f3bcdd35d5f304&action=position&posid=2&order=listorder+DESC&num=4\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'2','order'=>'listorder DESC','limit'=>'4',));}?>
<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
				<div class="content-item clearfix" data-articleid="281798">
					<div class="item-img fl">
						<a href="<?php echo $r['url'];?>" target="_blank">
							<img src="<?php echo thumb($r[thumb],230,147);?>" alt="" title=""></a>
					</div>
					<div class="item-info fr">
						<h3 class="item-tit">
							<a href="<?php echo $r['url'];?>"><?php echo str_cut($r[title],36,'');?></a>
						</h3>
						<p class="item-intro"><?php echo str_cut($r[description],250);?></p>
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

	<div class="ui-more">
		<a href="javascript:;">
			<span class="cyzone-more-txt">加载更多</span>
		</a>
	</div>
</div>
</div>
</div>

<!--首页右侧-->
<div id="sidebar" class="sidebar fr">


<!-- 排行榜 -->
<link type="text/css" href="<?php echo WEB_PATH;?>statics/cy/css/style(1).css" rel="stylesheet">
<script type="text/javascript" src="<?php echo WEB_PATH;?>statics/cy/js/jquery.min2.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>statics/cy/js/jquery.idTabs.min.js"></script>

<div class="R-mainbox1 mar-b20">
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
		<li class="title-li"> <i class="q-number s-1">1</i>
			<a href="http://www.woshipm.com/zhichang/219994.html" title="为什么你昨天的去哪儿产品经理面试挂了？" class="wpp-post-title" target="_blank">为什么你昨天的去哪儿产品经理面试挂了？</a>
		</li>
		<li class="title-li">
			<i class="q-number s-2">2</i>
			<a href="http://www.woshipm.com/pd/156698.html" title="【干货】H5页面制作免费工具大集合" class="wpp-post-title" target="_blank">【干货】H5页面制作免费工具大集合</a>
		</li>
		<li class="title-li">
			<i class="q-number s-3">3</i>
			<a href="http://www.woshipm.com/operate/219947.html" title="O2O运营中的几个关键环节" class="wpp-post-title" target="_blank">O2O运营中的几个关键环节</a>
		</li>
		<li class="title-li">
			<i class="q-number s-4">4</i>
			<a href="http://www.woshipm.com/operate/220049.html" title="不会数据分析的产品不是一个好运营" class="wpp-post-title" target="_blank">不会数据分析的产品不是一个好运营</a>
		</li>
		<li class="title-li">
			<i class="q-number s-5">5</i>
			<a href="http://www.woshipm.com/rp/39203.html" title="Axure教程 axure新手入门基础（1）" class="wpp-post-title" target="_blank">Axure教程 axure新手入门基础（1）</a>
		</li>
		<li class="title-li">
			<i class="q-number s-6">6</i>
			<a href="http://www.woshipm.com/it/219463.html" title="从产品经理的角度算一算，做一个app需要多少钱" class="wpp-post-title" target="_blank">从产品经理的角度算一算，做一个app需要多少钱</a>
		</li>
		<li class="title-li">
			<i class="q-number s-7">7</i>
			<a href="http://www.woshipm.com/it/220079.html" title="2015年第42周干货精选：为烂产品做运营是怎样一种体验？" class="wpp-post-title" target="_blank">2015年第42周干货精选：为烂产品做运营是怎样一种体验？</a>
		</li>
		<li class="title-li">
			<i class="q-number s-8">8</i>
			<a href="http://www.woshipm.com/ucd/219942.html" title="毕业生问：怎么样成为一名及格的设计师？" class="wpp-post-title" target="_blank">毕业生问：怎么样成为一名及格的设计师？</a>
		</li>
		<li class="title-li">
			<i class="q-number s-9">9</i>
			<a href="http://www.woshipm.com/operate/220179.html" title="不懂放权给用户？活该忙成狗—类类教你如何四两拨千斤！" class="wpp-post-title" target="_blank">不懂放权给用户？活该忙成狗—类类教你如何四两拨千斤！</a>
		</li>
		<li class="title-li">
			<i class="q-number s-10">10</i>
			<a href="http://www.woshipm.com/pmd/220030.html" title="0岁产品经理：如何写需求文档" class="wpp-post-title" target="_blank">0岁产品经理：如何写需求文档</a>
		</li>

	</ul>
</div>
<div id="top-list-2" style="display: none;">
	<ul class="wpp-list item">
		<li class="title-li">
			<i class="q-number s-1">1</i>
			<a href="http://www.woshipm.com/rp/39203.html" title="Axure教程 axure新手入门基础（1）" class="wpp-post-title" target="_blank">Axure教程 axure新手入门基础（1）</a>
		</li>
		<li class="title-li">
			<i class="q-number s-2">2</i>
			<a href="http://www.woshipm.com/pd/156698.html" title="【干货】H5页面制作免费工具大集合" class="wpp-post-title" target="_blank">【干货】H5页面制作免费工具大集合</a>
		</li>
		<li class="title-li">
			<i class="q-number s-3">3</i>
			<a href="http://www.woshipm.com/operate/216106.html" title="APP推广 | 这应该是最完整的地推方案了" class="wpp-post-title" target="_blank">APP推广 | 这应该是最完整的地推方案了</a>
		</li>
		<li class="title-li">
			<i class="q-number s-4">4</i>
			<a href="http://www.woshipm.com/pmd/216870.html" title="产品小白，是如何准备成为一名产品经理的" class="wpp-post-title" target="_blank">产品小白，是如何准备成为一名产品经理的</a>
		</li>
		<li class="title-li">
			<i class="q-number s-5">5</i>
			<a href="http://www.woshipm.com/pmd/217105.html" title="求职产品助理的一个月感想" class="wpp-post-title" target="_blank">求职产品助理的一个月感想</a>
		</li>
		<li class="title-li">
			<i class="q-number s-6">6</i>
			<a href="http://www.woshipm.com/rp/211554.html" title="Word产品需求文档，已经过时了" class="wpp-post-title" target="_blank">Word产品需求文档，已经过时了</a>
		</li>
		<li class="title-li">
			<i class="q-number s-7">7</i>
			<a href="http://www.woshipm.com/operate/218403.html" title="通杀互联网、实体店的6大营销策略，附带18个真实小案例！" class="wpp-post-title" target="_blank">通杀互联网、实体店的6大营销策略，附带18个真实小案例！</a>
		</li>
		<li class="title-li">
			<i class="q-number s-8">8</i>
			<a href="http://www.woshipm.com/rp/39208.html" title="Axure教程 axure新手入门基础（2）" class="wpp-post-title" target="_blank">Axure教程 axure新手入门基础（2）</a>
		</li>
		<li class="title-li">
			<i class="q-number s-9">9</i>
			<a href="http://www.woshipm.com/operate/217629.html" title="如何规划设计一个月加粉10万的微信互动原型？" class="wpp-post-title" target="_blank">如何规划设计一个月加粉10万的微信互动原型？</a>
		</li>
		<li class="title-li">
			<i class="q-number s-10">10</i>
			<a href="http://www.woshipm.com/pd/216882.html" title="减少改稿15招！从开发角度聊聊如何洞悉隐性需求？" class="wpp-post-title" target="_blank">减少改稿15招！从开发角度聊聊如何洞悉隐性需求？</a>
		</li>

	</ul>
</div>
<div id="top-list-3" style="display: none;">
	<ul class="wpp-list item">
		<li class="title-li">
			<i class="q-number s-1">1</i>
			<a href="http://www.woshipm.com/pd/156698.html" title="【干货】H5页面制作免费工具大集合" class="wpp-post-title" target="_blank">【干货】H5页面制作免费工具大集合</a>
		</li>
		<li class="title-li">
			<i class="q-number s-2">2</i>
			<a href="http://www.woshipm.com/rp/39203.html" title="Axure教程 axure新手入门基础（1）" class="wpp-post-title" target="_blank">Axure教程 axure新手入门基础（1）</a>
		</li>
		<li class="title-li">
			<i class="q-number s-3">3</i>
			<a href="http://www.woshipm.com/rp/211554.html" title="Word产品需求文档，已经过时了" class="wpp-post-title" target="_blank">Word产品需求文档，已经过时了</a>
		</li>
		<li class="title-li">
			<i class="q-number s-4">4</i>
			<a href="http://www.woshipm.com/rp/39208.html" title="Axure教程 axure新手入门基础（2）" class="wpp-post-title" target="_blank">Axure教程 axure新手入门基础（2）</a>
		</li>
		<li class="title-li">
			<i class="q-number s-5">5</i>
			<a href="http://www.woshipm.com/pmd/121796.html" title="如何写一份风投喜欢的商业计划书（二）" class="wpp-post-title" target="_blank">如何写一份风投喜欢的商业计划书（二）</a>
		</li>
		<li class="title-li">
			<i class="q-number s-6">6</i>
			<a href="http://www.woshipm.com/rp/39224.html" title="Axure教程 axure新手入门基础（3）" class="wpp-post-title" target="_blank">Axure教程 axure新手入门基础（3）</a>
		</li>
		<li class="title-li">
			<i class="q-number s-7">7</i>
			<a href="http://www.woshipm.com/pd/215213.html" title="三种常见「产品流程图」是如何思考与绘制出来的？" class="wpp-post-title" target="_blank">三种常见「产品流程图」是如何思考与绘制出来的？</a>
		</li>
		<li class="title-li">
			<i class="q-number s-8">8</i>
			<a href="http://www.woshipm.com/pmd/211482.html" title="产品经理思维框架 | 三维思考模型" class="wpp-post-title" target="_blank">产品经理思维框架 | 三维思考模型</a>
		</li>
		<li class="title-li">
			<i class="q-number s-9">9</i>
			<a href="http://www.woshipm.com/operate/216106.html" title="APP推广 | 这应该是最完整的地推方案了" class="wpp-post-title" target="_blank">APP推广 | 这应该是最完整的地推方案了</a>
		</li>
		<li class="title-li">
			<i class="q-number s-10">10</i>
			<a href="http://www.woshipm.com/rp/64741.html" title="15款优秀移动APP产品原型设计工具" class="wpp-post-title" target="_blank">15款优秀移动APP产品原型设计工具</a>
		</li>
	</ul>
</div>
</div>
</div>

<script>
      jQuery(document).ready(function($) {
        $(".top-list ul").idTabs();
      });
    </script>

<!-- 排行榜结束 -->

</div>
</div>

<script src="<?php echo WEB_PATH;?>statics/cy/js/sea.js"></script>
<!-- <script src="<?php echo WEB_PATH;?>statics/cy/cyimages/seajs-css.js"></script>
-->
<script type="text/javascript" src="<?php echo WEB_PATH;?>statics/cy/js/sea_config.js"></script>
<?php include template('content', 'footer'); ?>