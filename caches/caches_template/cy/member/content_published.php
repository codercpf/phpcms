<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('content', 'header'); ?>


<link href="<?php echo CSS_PATH;?>dialog.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH;?>dialog.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH;?>content_addtop.js"></script>

<!-- new added -->
<link rel="stylesheet" href="<?php echo WEB_PATH;?>statics/cy/css/commen.css">
<link rel="stylesheet" href="<?php echo WEB_PATH;?>statics/cy/css/member.css" />

<script src="<?php echo WEB_PATH;?>statics/cy/js/jquery.min2.js"></script>
<script src="<?php echo WEB_PATH;?>statics/js/member_common.js"></script>

<div id="main" class="com-width mt20 clearfix">
	<div id="member" class="clearfix">
		<?php include template('member','account_manage_left'); ?>

		<div id="member-content" class="member-content fr">

		<div class="member-content-hd">
			<span class="ui-tab-tit show-item">已发布文章</span>
		</div>

		<div class="cont">

			<table width="100%" cellspacing="0"  class="table-list">
					<thead>
						<tr>
							<th width="10%">ID</th>
							<th>标题</th>
							<th width="15%">栏目</th>
							<th width="15%">投稿时间</th>
							<th width="15%">操作</th>
						</tr>
					</thead>

					<tbody>
						<?php $n=1;if(is_array($datas)) foreach($datas AS $info) { ?>
						<tr>
							<td style="text-align: center"><?php echo $info['id'];?></td>
							<td align="left">
								<a href="<?php echo $info['url'];?>" target="_blank" title="<?php echo $info['title'];?>"><?php echo str_cut($info['title'], 60);?></a>
								<?php if($info[status]==0) { ?> <font color="red"><?php echo L('reject_content');?></font>
								<?php } elseif ($info[status]!='99') { ?> <font color="#1D94C7">待审中</font>
								<?php } ?>
							</td>
							<td style="text-align: center">
								<a href="<?php if(strpos($CATEGORYS[$info['catid']][url],'http://')===false) { ?><?php echo $siteurl;?><?php } ?><?php echo $CATEGORYS[$info['catid']]['url'];?>" target="_blank"><?php echo $CATEGORYS[$info['catid']]['catname'];?></a>
							</td>
							<td style="text-align: center"><?php echo date('Y-m-d',$info['inputtime']);?></td>
							<td style="text-align: center">
								<?php if($info[status]==99) { ?>
								<font color="green">通过</font>
								<?php } elseif (!$info[flag]) { ?>
								<a href="index.php?m=member&c=content&a=edit&catid=<?php echo $info['catid'];?>&id=<?php echo $info['id'];?>">
									<font color="red">编辑</font>
								</a>
								|
								<a href="index.php?m=member&c=content&a=delete&catid=<?php echo $info['catid'];?>&id=<?php echo $info['id'];?>">删除</a>
								<?php } else { ?>
								<a href="index.php?m=member&c=content&a=edit&catid=<?php echo $info['catid'];?>&id=<?php echo $info['id'];?>">
									<font color="red">编辑</font>
								</a>
								|
								<a href="index.php?m=member&c=content&a=delete&catid=<?php echo $info['catid'];?>&id=<?php echo $info['id'];?>">删除</a>
								<?php } ?>
							</td>
						</tr>
						<?php $n++;}unset($n); ?>
					</tbody>
				</table>
				<div id="pages"><?php echo $pages;?></div>		
		</div>	

<div class="clear"></div>
	</div>
	</div>
	</div>

<script language="JavaScript">
<!--
	function c_c(catid) {
		location.href='index.php?m=member&c=content&a=published&siteid=<?php echo $siteid;?>&catid='+catid;
	}
//-->
</script>
<?php include template('content', 'footer'); ?>