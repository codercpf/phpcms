<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">	
	<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

	<title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
	<meta name="keywords" content="<?php echo $SEO['keyword'];?>">
	<meta name="description" content="<?php echo $SEO['description'];?>">





	<link href="<?php echo WEB_PATH;?>statics/cy/css/application-25c061b6812a335274613e0652c8ed2f.css" media="all" rel="stylesheet">
	<!-- <script src="<?php echo WEB_PATH;?>statics/cy/js/jweixin-1.0.0.js"></script> -->
	<script src="<?php echo WEB_PATH;?>statics/cy/js/application-b9bf4d65691ee1d3061d9563a2e7af31.js"></script>
	<!--[if lt IE 9]>
	<script src="https://kryptoners.b0.upaiyun.com/vender/html5shiv/dist/html5shiv.js"></script>
	<![endif]-->
</head>

<body style="padding-top: 0px;">
	<link rel="stylesheet" type="text/css" href="<?php echo WEB_PATH;?>statics/cy/css/header2.css">
	<link rel="stylesheet" type="text/css" href="<?php echo WEB_PATH;?>statics/cy/css/animate.min.css">

	<header class="common-header J_commonHeaderWrapper animated fadeInDown" data-stat-module="dingbudaohang" style="position: relative;">
		<div class="container">
			<a class="logo" href="#">
				<img src="<?php echo WEB_PATH;?>statics/cy/images/logo.png" alt="">
			</a>
			<nav>
				<ul class="J_navList">
							<li >
								<input type="text" style="width: 30px" visible="false" />
							</li>
					<li name="news" class="active">
						<a href="#">首页</a>
					</li>
							<li >
								<input type="text" style="width: 60px" visible="false" />
							</li>
					<li>
						<a href="javascript:void(0)" >
							创业者 <i class="headericon-arrow-drop-down"></i>
						</a>
						<div class="service-wrap pop-up">
							<div class="menu">
								<a href="#">我要融资</a>
								<a href="#">商业计划书</a>
								<a href="#">寻求报道</a>
								<a href="#">孵化器入驻</a>
								<!-- <a href="http://chuang.36kr.com/"class="mobile-hide"data-stat-click="chuangyefuwu">创业服务</a> -->
							</div>
						</div>
					</li>
							<li>
								<input type="text" style="width: 40px" visible="false" />
							</li>
					<li>
						<a href="javascript:void(0)">
							投资人 <i class="headericon-arrow-drop-down"></i>
						</a>
						<div class="service-wrap pop-up">
							<div class="menu">
								<a href="#">入驻平台</a>
								<a href="#">投资人物</a>
								<a href="#">看项目</a>
							</div>
						</div>
					</li>
							<li >
								<input type="text" style="width: 40px" visible="false" />
							</li>
					<li>
						<a href="javascript:void(0)">
							发现<i class="headericon-arrow-drop-down"></i>
						</a>
						<div class="service-wrap pop-up"style="right:-40px;">
							<div class="menu">
								<a href="#">创业公司</a>
								<a href="#">项目库</a>
								<a href="#">近期活动</a>
							</div>
						</div>
					</li>					
				</ul>
			</nav>

			<div class="right-col J_rightNavWrapper">
				<ul class="sub-nav">
					<li class="search-item">
						<a href="javascript:void(0)"data-stat-hover="sousuo">
							<i class="headericon-header-search"></i>
							搜索
						</a>
						<div class="search-wrap pop-up">
							<div class="searchbar">
<!-- 
								<form action="" class="J_searchForm">
									<input type="text" placeholder="搜索" ng-model="keyword">
									<button class="headericon-header-search search-icon" type="submit" data-stat-click="sousuo"></button>
									<button class="headericon-close close-icon" type="button" data-stat-click="guanbisousuo"></button>
								</form>
 -->
								<form action="<?php echo APP_PATH;?>index.php" class="J_searchForm" method="get" target="_blank">
									<input type="hidden" name="m" value="search"/>
									<input type="hidden" name="c" value="index"/>
									<input type="hidden" name="a" value="init"/>
									<input type="hidden" name="typeid" value="<?php echo $typeid;?>" id="typeid"/>
									<input type="hidden" name="siteid" value="<?php echo $siteid;?>" id="siteid"/>
					                <input type="text" class="text" name="q" id="q" placeholder="搜索"/>
					                <button class="headericon-header-search search-icon" type="submit" data-stat-click="sousuo"></button>
					                <!-- <input type="submit" value="搜 索" class="button" /> 源文件-->
					            </form>
							</div>
						</div>	


<!-- 
						<div class="search fr show-search clearfix" id="search" style="width: 32px;">
							<form action="http://www.cyzone.cn/index.php" class="search-form fl" name="search-myform" method="get" style="display: none;">
								<input type="hidden" name="m" value="search">
								<input type="hidden" name="c" value="index">
								<input type="hidden" name="a" value="init">
								<input type="hidden" name="typeid" value="" id="typeid">
								<input type="hidden" name="siteid" value="1" id="siteid">
								<input type="text" name="wd" class="search-input" placeholder="创业">
								<input type="submit" class="hide">
							</form>
							<i class="search-show FontAwesome fl"></i>
						</div>
 -->
					</li>

							<li><input type="text" style="width: 50px" visible="false" /></li>

<!-- 未登录 -->
					<li class="login-actions">
						<a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=login" target="_blank" class="login-link J_login" >
							<i class="headericon-header-user"></i>
							登录
						</a>
					</li>
					

<!-- 已登录 -->
					<li class="user-menu" style="display: none;">
						<a href="http://www.cyzone.cn/index.php?m=member&c=index&a=account_manage" class="head-avatar" data-stat-hover="touxiang">
							<img src="<?php echo WEB_PATH;?>statics/cy/images/noavatar.png" alt="">
						</a>
						<div class="menu-wrap pop-up">
							<div class="menu">
								<a href="http://www.cyzone.cn/index.php?m=member&c=index&a=favorite" class="ico-collect" target="_blank">
									<i class="ico"></i>收藏</a>
								<a href="http://www.cyzone.cn/index.php?m=member&c=index&a=comment" class="ico-comment" target="_blank">
									<i class="ico"></i>评论</a>
								<a href="http://www.cyzone.cn/contribute" class="ico-contributors" target="_blank">
									<i class="ico"></i>投稿</a>
								<a href="http://www.cyzone.cn/index.php?m=member&c=index&a=account_manage" class="ico-setting" target="_blank">
									<i class="ico"></i>设置</a>
								<a href="http://www.cyzone.cn/index.php?m=member&c=index&a=logout" class="ico-logout">
									<i class="ico"></i>退出</a>
							</div>
						</div>
					</li>
<!-- 用户中心结束 -->

				</ul>
			</div>
		</div>
	</header>

	<link href="<?php echo WEB_PATH;?>statics/cy/css/index-932be206bfa4e2a7cc01f4393c3ae2b6.css" media="all" rel="stylesheet">
	<div class="index-wrap">
		<div class="main-section" style="position: relative;">
			<div class="news-list J_articleListWrap" data-stat-module="Zhufeed">
				<div class="article-list">
					<div class="articles J_articleList">
						<article>
							<a class="pic info_flow_news_image badge-o2o before-fade-in after-fade-in" href="http://36kr.com/p/5038152.html" style="background-image: url(http://b.36krcnd.com/nil_class/87cb5372-e098-431f-8fed-21ad866fd916/yestone_HD_1120926847.jpg!feature);">
								<span class="mask-tags" data-type="o2o">O2O</span>
							</a>
							<div class="desc">
								<a class="title info_flow_news_title" href="http://36kr.com/p/5038152.html" target="_blank">高频打低频？玩坏了的逻辑</a>
								<div class="author">
									<a href="http://36kr.com/posts/guest">
										<span class="avatar before-fade-in after-fade-in" style="background-image: url(http://krid-assets.b0.upaiyun.com/uploads/user/avatar/2690/3e922614-54c6-4d81-8a20-f88964647dda.jpg!320x320);"></span>
										<span class="name">guest</span>
									</a>
									<span class="time">
										&nbsp;•&nbsp;
										<time class="timeago" title="2015-10-08 14:12:10 +0800" datetime="2015-10-08 14:12:10 +0800">21 小时前</time>
									</span>
								</div>
								<div class="brief">
									餐饮行业食材供应链 B2B 市场里面，在生鲜蔬菜供应链和调料粮油等标品供应链的整合可能性的判断上。
								</div>
							</div>
						</article>
<!-- 更多，即下一页 -->
						<a class="load-more J_listLoadMore" href="http://36kr.com/?b_url_code=5038140&d=next" id="info_flows_next_link"></a>
					</div>
				</div>
			</div>

<!-- 侧边栏 -->
			<div class="index-side">
				<div class="fast-section J_fastSection mobile-hide">
					<div class="list J_fastSectionList">
						<div class="tabs J_fastSectionNavBar">
							<a class="active newsflashes_nav" href="http://36kr.com/#" name="fast">快讯</a>
							<a class="next_nav" href="http://36kr.com/#" name="next">NEXT</a>
							<a href="http://36kr.com/#" name="feed">创业动态</a>
						</div>
						<div class="wrap ps-container" style="height: 719px;">
							<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;">
								<div class="ps-scrollbar-x" style="left: 0px; width: 0px;">									
								</div>
							</div>
							<div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; height: 463px;">
								<div class="ps-scrollbar-y" style="top: 0px; height: 0px;">									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="common-footer">
		<div class="sections" data-stat-module="dibu">
			<section class="link-section">
				<h3>36氪 让创业更简单</h3>

				<div class="links">
					<a href="http://36kr.com/about" >关于36氪</a>
					|
					<a href="http://space.36kr.com/" >氪空间</a>
					|
					<a href="http://36kr.com/hire" >加入我们</a>
					|
					<a href="http://report.36kr.com/" >寻求报道</a>
				</div>

				<div class="feedback">
					反馈建议：
					<a ref="nofollow" href="mailto:service@36kr.com" >service@36kr.com</a>
				</div>
				<div class="contact">
					客服电话：
					<a href="tel:010-59974050">010-59974050</a>
				</div>
			</section>
			<section class="partner-section">
				<h3>合作伙伴</h3>

				<ul class="footer-partner">
					<li>
						<a ref="nofollow" href="http://www.aliyun.com/?from=36kr" class="external" target="_blank">
							<img src="<?php echo WEB_PATH;?>statics/cy/images/aly.png" height="16px"></a>
					</li>
					<li>
						<a ref="nofollow" href="http://qcloud.com/?from=36kr" class="external" target="_blank">
							<img src="<?php echo WEB_PATH;?>statics/cy/images/txy.png" alt="" height="21px" style="margin-top:-8px"></a>
					</li>
					<li>
						<a ref="nofollow" href="http://qingcloud.com/?from=36kr" class="external" target="_blank">
							<img src="<?php echo WEB_PATH;?>statics/cy/images/qy.png" alt="" height="21px" style="margin-top:-8px"></a>
					</li>
					<li>
						<a ref="nofollow" href="https://www.yunpian.com/?ref=36krx2015" class="external" target="_blank">
							<img src="<?php echo WEB_PATH;?>statics/cy/images/yp.png" alt="" height="17px"></a>
					</li>
					<li>
						<a ref="nofollow" href="http://upyun.com/?from=36kr" class="external" target="_blank">
							<img src="<?php echo WEB_PATH;?>statics/cy/images/upy.png" alt="" height="11px"></a>
					</li>
					<li>
						<a ref="nofollow" href="http://qiniu.com/?from=36kr" class="external" target="_blank">
							<img src="<?php echo WEB_PATH;?>statics/cy/images/qny.png" alt="" height="17px"></a>
					</li>
					<li>
						<a ref="nofollow" href="http://dnspod.cn/?from=36kr" class="external" target="_blank">
							<img src="<?php echo WEB_PATH;?>statics/cy/images/dp.png" alt="" height="10px"></a>
					</li>
					<li>
						<a ref="nofollow" href="http://getui.com/?from=36kr" class="external" target="_blank">
							<img src="<?php echo WEB_PATH;?>statics/cy/images/getui.png" height="22px" style="margin-top:-8px"></a>
					</li>
				</ul>
			</section>
			<section class="qr-section">
				<img class="qr" src="<?php echo WEB_PATH;?>statics/cy/images/qr.png" alt="">
				<div>扫码关注微信公众平台</div>
			</section>
		</div>
		<div class="bottom">
			<div class="container">
				<div class="copyright">
					<span class="mobile-hide">
						本站由
						<a href="http://qingcloud.com/">QingCloud</a>
						提供云计算服务
					</span>
					<span class="law">
						© 2011-2015 36氪  |  京ICP备12031756号
						<span class="mobile-hide">|  京ICP证150143号</span>
						<span class="mobile-hide">|  京公网安备11010802012285号</span>
					</span>
				</div>
				<div class="share">
					<a ref="nofollow" class="icon-weibo" href="http://weibo.com/wow36kr"></a>
					<a ref="nofollow" class="icon-twitter" href="https://twitter.com/36kr"></a>
					<a ref="nofollow" class="icon-facebook" href="http://www.facebook.com/X36Kr"></a>
					<a ref="nofollow" class="icon-rss" href="http://36kr.com/feed"></a>
				</div>
			</div>
		</div>
	</footer>

	<div class="fixed-tools J_fixedTools" data-stat-module="dingbudaohang">
		<a class="icon-qr J_qrEnter" data-stat-hover="erweima.hover" href="javascript:void(0)"></a>
		<div class="qr J_qrWrapper">
			<div class="qr-min active">
				<img alt="" src="<?php echo WEB_PATH;?>statics/cy/images/qr.png">
				<a class="btn" href="javascript:void(0)">更多公众账号</a>
			</div>
			<div class="qr-group">
				<div class="tabs">
					<a class="tab active" href="javascript:void(0)">36氪</a>
					<a class="tab" href="javascript:void(0)">36氪股权投资</a>
					<a class="tab" href="javascript:void(0)">36氪融资</a>
					<a class="tab" href="javascript:void(0)">氪空间</a>
				</div>
				<div class="panels">
					<div class="panel active">
						<div class="img">
							<img alt="" src="<?php echo WEB_PATH;?>statics/cy/images/qr.png">
							<span class="id">36氪</span>
						</div>
						<div class="desc">
							<p>为你推送和解读最前沿、最有料的科技创投资讯</p>
						</div>
					</div>
					<div class="panel">
						<div class="img">
							<img alt="" src="<?php echo WEB_PATH;?>statics/cy/images/qr-zhong.jpg">
							<span class="id">36Kr股权投资</span>
						</div>
						<div class="desc">
							<p>汇集行业内最优质创业项目的股权投资平台</p>
						</div>
					</div>
					<div class="panel">
						<div class="img">
							<img alt="" src="<?php echo WEB_PATH;?>statics/cy/images/qr-rong.jpg">
							<span class="id">36kr融资</span>
						</div>
						<div class="desc">
							<p>聚集15家顶级投资机构的专业互联网融资平台</p>
						</div>
					</div>
					<div class="panel">
						<div class="img">
							<img alt="" src="<?php echo WEB_PATH;?>statics/cy/images/qr_krspace.jpg">
							<span class="id">氪空间</span>
						</div>
						<div class="desc">
							<p>聚集全球最优秀的创业者，项目融资率接近97%，领跑行业</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<a class="icon-arrow-up J_up" data-stat-click="up.click" href="javascript:void(0)"></a>
	</div>
</body>
</html>