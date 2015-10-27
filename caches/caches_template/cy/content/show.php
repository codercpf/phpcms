<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('content', 'header'); ?>

	<link rel="stylesheet" href="<?php echo WEB_PATH;?>statics/cy/css/commen.css">
	<link type="text/css" href="<?php echo WEB_PATH;?>statics/cy/css/article.css" rel="stylesheet">
	<!-- <link type="text/css"  href="<?php echo WEB_PATH;?>statics/cy/css/index.css" rel="stylesheet"> -->
	<script type="text/javascript" src="<?php echo WEB_PATH;?>statics/cy/js/jquery.min2.js"></script>

		<div id="main" class="com-width mt90 clearfix">

		<div class="list-wrap fl" style="width: 890px;/* margin-right:55px; */">

			<div id="article">
				<!--文章标题/摘要/作者/来源-->
				<div id="article-hd" class="clearfix">
					<h1 class="article-tit"><?php echo $title;?></h1>

					<div class="article-copyform clearfix">

						<div class="article-type fl"></div>
						<div class="article-author fl"><?php echo $copyfrom;?></div>
						<div class="article-time fl" data-time="" title=""><?php echo $inputtime;?></div>
						
					</div>
					<p class="article-introduction"><?php echo $description;?></p>
				</div>


				<!--文章主体内容-->
				<div id="article-content">
					<?php echo $content;?>
					<p style="text-align: right;">（编辑：Zoey)</p>
				</div>


				<!--文章标签-->
				<div id="article-tag" class="clearfix">
					<div class="article-tag-box fl">
						<span>标签:</span>
						<a href="#">通用</a>
						<a href="#">自动驾驶汽车</a>
					</div>


<!-- 文章分享 -->
					<div class="article-share fr" id="article-end-share">						

						<span id='favorite' class="article-pos-collect article-end-collect" data-modelid="9">
							<a href="javascript:;" onclick="add_favorite('<?php echo addslashes($title);?>');" class="t6">
								<i class="share-collect"></i><em>收藏</em>
							</a>
						</span>

						<span class="ly_share">
							<a class="lingying" onclick="postToWb();" ><em>腾讯微博</em></a>
							<script type="text/javascript">
								function postToWb(){
										var _t = encodeURI(document.title);
										var _url = encodeURIComponent(document.location);
										var _appkey = encodeURI("cba3558104094dbaa4148d8caa436a0b");
										var _pic = encodeURI('<?php echo $thumb;?>');
										var _site = '';
										var _u = 'http://v.t.qq.com/share/share.php?url='+_url+'&appkey='+_appkey+'&site='+_site+'&pic='+_pic+'&title='+_t;
										window.open( _u,'', 'width=700, height=680, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no' );
								}
							</script>
						</span>

						<span class="article-pos-weibo article-end-weibo">
							<a class="share-weibo" onclick="postToSina();"><i class="share-weibo"></i><em>新浪微博</em></a>
							<script type="text/javascript">
								function postToSina(){
									var _t = encodeURI(document.title);
									var _url = encodeURIComponent(document.location);
									// var _appkey = encodeURI("cba3558104094dbaa4148d8caa436a0b");
									var _appkey = '3172366919';

									var _pic = encodeURI('<?php echo $thumb;?>');
									var _site = '';

									var _u = 'http://v.t.sina.com.cn/share/share.php?url='+_url+'&appkey='+_appkey+'&title='+encodeURIComponent('<?php echo new_addslashes($title);?>');
									window.open( _u,'', 'width=700, height=680, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no' );
								}
							</script>							
						</span>

						<!-- 分享到微信 -->
<!-- 
						<span class="article-pos-weixin article-end-weixin" data-url="http://kuailiyu.cyzone.cn/article/15166.html">
							<i class="share-weixin"></i>
							<em>微信</em>
							<div class="share-weixin-dropdown" style="display: none;">
								<img class="QrCodeImg" alt="" src="./includefiles/qrcode.php">
							</div>
						</span>
-->						
						<!-- 微信分享结束 -->

					</div>
<!-- 分享结束 -->
				</div>



				<!--相关文章 相关产品-->
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=59d3146c936b0bbb61d83c4d89437c20&action=relation&relation=%24relation&id=%24id&catid=%24catid&num=5&keywords=%24rs%5Bkeywords%5D\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'relation')) {$data = $content_tag->relation(array('relation'=>$relation,'id'=>$id,'catid'=>$catid,'keywords'=>$rs[keywords],'limit'=>'5',));}?>
<?php if($data) { ?>				
				<div class="article-related">
					<div class="related-hd">
						<span class="ui-tab-tit  show-item">相关文章</span>
					</div>
					<div class="related-bd">
						<ul class="related-item show-item" style="display: block;">
<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
							<li>
								<p>
									<a href="<?php echo $r['url'];?>" target="_blank" class="related-article-tit fl"><?php echo $r['title'];?></a>
									<span class="fr related-article-time" data-time="<?php echo $r['inputtime'];?>" title="<?php echo $r['inputtime'];?>">(<?php echo date('Y-m-d',$r[inputtime]);?>)</span>
								</p>
								<p></p>
							</li>
<?php $n++;}unset($n); ?>		
						</ul>
					</div>
				</div>
<?php } ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
			</div>

<!-- 文章评论 -->
	<?php if($allow_comment && module_exists('comment')) { ?>
      <iframe src="<?php echo APP_PATH;?>index.php?m=comment&c=index&a=init&commentid=<?php echo id_encode("content_$catid",$id,$siteid);?>&iframe=1" width="100%" height="100%" id="comment_iframe" frameborder="0" scrolling="no"></iframe>
      <div class="box">
        		<h5>评论排行</h5>
				 <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"comment\" data=\"op=comment&tag_md5=3b0aeba1105ec7aa9840a5d146f34036&action=bang&siteid=%24siteid&cache=60\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$tag_cache_name = md5(implode('&',array('siteid'=>$siteid,)).'3b0aeba1105ec7aa9840a5d146f34036');if(!$data = tpl_cache($tag_cache_name,60)){$comment_tag = pc_base::load_app_class("comment_tag", "comment");if (method_exists($comment_tag, 'bang')) {$data = $comment_tag->bang(array('siteid'=>$siteid,'limit'=>'20',));}if(!empty($data)){setcache($tag_cache_name, $data, 'tpl_data');}}?>
            	<ul class="content list blue f14 row-2">
				<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                	<li>·<a href="<?php echo $r['url'];?>" target="_blank"><?php echo str_cut($r[title], 40);?></a>
                		<span>(<?php echo $r['total'];?>)</span>
                		<span><?php echo $r['commentid'];?></span>
                	</li>
				<?php $n++;}unset($n); ?>
                </ul>
				<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </div>
    <?php } ?>
<!-- 评论结束 -->

		</div>
	</div>


<script type="text/javascript">
/*
	function show_ajax(obj) {
		var keywords = $(obj).text();
		var offset = $(obj).offset();
		var jsonitem = '';
		$.getJSON("<?php echo APP_PATH;?>index.php?m=content&c=index&a=json_list&type=keyword&modelid=<?php echo $modelid;?>&id=<?php echo $id;?>&keywords="+encodeURIComponent(keywords),
				function(data){
				var j = 1;
				var string = "<div class='point key-float'><div style='position:relative'><div class='arro'></div>";
				string += "<a href='JavaScript:;' onclick='$(this).parent().parent().remove();' hidefocus='true' class='close'><span>关闭</span></a><div class='contents f12'>";
				if(data!=0) {
				  $.each(data, function(i,item){
					j = i+1;
					jsonitem += "<a href='"+item.url+"' target='_blank'>"+j+"、"+item.title+"</a><BR>";
					
				  });
					string += jsonitem;
				} else {
					string += '没有找到相关的信息！';
				}
					string += "</div><span class='o1'></span><span class='o2'></span><span class='o3'></span><span class='o4'></span></div></div>";		
					$(obj).after(string);
					$('.key-float').mouseover(
						function (){
							$(this).siblings().css({"z-index":0})
							$(this).css({"z-index":1001});
						}
					)
					$(obj).next().css({ "left": +offset.left-100, "top": +offset.top+$(obj).height()+12});
				});
	}
*/

	function add_favorite(title)
	{
		$.getJSON('<?php echo APP_PATH;?>api.php?op=add_favorite&title='+encodeURIComponent(title)+'&url='+encodeURIComponent(location.href)+'&'+Math.random()+'&callback=?', function(data){
			if(data.status==1)	{
				$("#favorite").html('收藏成功');
			} else {
				alert('请登录');
			}
		});
	}
</script>

<script language="JavaScript" src="<?php echo APP_PATH;?>api.php?op=count&id=<?php echo $id;?>&modelid=<?php echo $modelid;?>"></script>

<?php include template('content', 'footer'); ?>