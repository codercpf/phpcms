<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
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
	<link rel="stylesheet" type="text/css" href="<?php echo WEB_PATH;?>statics/cy/css/header.css">
	<link rel="stylesheet" type="text/css" href="<?php echo WEB_PATH;?>statics/cy/css/animate.min.css">

	<header class="common-header J_commonHeaderWrapper animated fadeInDown" data-stat-module="dingbudaohang" style="position: relative;">
		<div class="container">
			<a class="logo" href="<?php echo APP_PATH;?>">
				<img src="<?php echo WEB_PATH;?>statics/cy/images/logo.png" alt="">
			</a>
			<nav>
				<ul class="J_navList">							
					<li name="news" class="active" style="padding-right: 40px">
						<a href="<?php echo APP_PATH;?>">首页</a>
					</li>
					
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=ad981eb984593a881cc18d6ad2c6a0da&action=category&siteid=1&catid=0&num=5&return=info\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$info = $content_tag->category(array('siteid'=>'1','catid'=>'0','limit'=>'5',));}?>
<?php $n=1;if(is_array($info)) foreach($info AS $v) { ?>
					<li>
						<!-- <a href="<?php echo $v['url'];?>" ><?php echo $v['catname'];?><i class="headericon-arrow-drop-down"></i></a> -->
						<a><?php echo $v['catname'];?><i class="headericon-arrow-drop-down"></i></a>
						<div class="service-wrap pop-up" >

							<div class="menu">
							<?php $n=1;if(is_array(subcat($v['catid']))) foreach(subcat($v['catid']) AS $vv) { ?>
								<a href="<?php echo $vv['url'];?>"><?php echo $vv['catname'];?></a>
							<?php $n++;}unset($n); ?>
							</div>
						</div>
					</li>
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
				</ul>
			</nav>

			<div class="right-col J_rightNavWrapper">
				<ul class="sub-nav">
					<li class="search-item" style="padding-right: 40px;">
						<a href="javascript:void(0)"data-stat-hover="sousuo">
							<i class="headericon-header-search"></i>
							搜索
						</a>
						<div class="search-wrap pop-up">
							<div class="searchbar">

								<form action="<?php echo APP_PATH;?>index.php" class="J_searchForm" method="get" target="_blank">
									<input type="hidden" name="m" value="search"/>
									<input type="hidden" name="c" value="index"/>
									<input type="hidden" name="a" value="init"/>
									<input type="hidden" name="typeid" value="1" id="typeid"/>
									<input type="hidden" name="siteid" value="1" id="siteid"/>
					                <input type="text" class="text" name="q" id="q" placeholder="搜索" required/>
					                <button class="headericon-header-search search-icon" type="submit"></button>
					            </form>				            
							</div>
						</div>
					</li>						

<?php if($_username) { ?>
<!-- 已登录 -->
					<li class="user-menu" style="display: block;">
						<a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=account_manage" class="head-avatar" data-stat-hover="touxiang">
							<img src="<?php echo $touxiang;?>" width="60" height="60" onerror="this.src='<?php echo WEB_PATH;?>statics/cy/images/noavatar.png'">
						</a>
						<div class="menu-wrap pop-up">
							<div class="menu">
								<a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=favorite" class="ico-collect" target="_blank">
									<i class="ico"></i>收藏</a>
								<!-- <a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=comment" class="ico-comment" target="_blank">
									<i class="ico"></i>评论</a> -->
								<a href="<?php echo APP_PATH;?>index.php?m=member&c=content&a=publish" class="ico-contributors" target="_blank">
									<i class="ico"></i>投稿</a>
								<a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=account_manage" class="ico-setting" target="_blank">
									<i class="ico"></i>设置</a>
								<a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=logout" class="ico-logout">
									<i class="ico"></i>退出</a>
							</div>
						</div>
					</li>
<?php } else { ?>
<!-- 未登录 -->
					<li class="login-actions">
						<a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=login" target="_blank" class="login-link J_login" >
							<i class="headericon-header-user"></i>
							登录
						</a>
					</li>
<?php } ?>

<!-- 用户中心结束 -->

				</ul>
			</div>
		</div>
	</header>
