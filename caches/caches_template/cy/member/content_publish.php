<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('content', 'header'); ?>
<script type="text/javascript">
<!--
	var charset = '<?php echo CHARSET;?>';
	var uploadurl = '<?php echo pc_base::load_config('system','upload_url')?>';
//-->
</script>
<link href="<?php echo CSS_PATH;?>dialog.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH;?>dialog.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH;?>content_addtop.js"></script>


<!-- new added -->
<link rel="stylesheet" href="<?php echo WEB_PATH;?>statics/cy/css/commen.css">
<link rel="stylesheet" href="<?php echo WEB_PATH;?>statics/cy/css/member.css" />

<!-- Not sure -->
<!-- <script src="<?php echo WEB_PATH;?>statics/cy/js/jquery.min2.js"></script> -->
<!-- <script type="text/javascript" src="<?php echo JS_PATH;?>jquery.min.js"></script> -->

<script type="text/javascript" src="<?php echo JS_PATH;?>member_common.js"></script>
<?php if(isset($show_validator)) { ?>
<!-- Not sure -->
<!-- <script type="text/javascript" src="<?php echo JS_PATH;?>formvalidator.js" charset="UTF-8"></script> -->
<!-- <script type="text/javascript" src="<?php echo JS_PATH;?>formvalidatorregex.js" charset="UTF-8"></script> -->
<?php } ?>

<div id="main" class="com-width mt20 clearfix">
	<div id="member" class="clearfix">
		<?php include template('member','account_manage_left'); ?>

		<div id="member-content" class="member-content fr">

		<div class="member-content-hd">
			<span class="ui-tab-tit show-item">在线投稿</span>
		</div>

		<div class="cont">
				
			<form method="post" action="" id="myform" name="myform">
				<table width="100%" cellspacing="0" class="table_form">
				<?php if(ROUTE_A=='publish') { ?>
				<script language="JavaScript">
				<!--
					function c_c(catid) {
						location.href='index.php?m=member&c=content&a=publish&siteid=<?php echo $siteid;?>&catid='+catid;
					}
				//-->
				</script>
					<tr>
						<th>选择栏目：</th>
						<td><?php echo form::select_category('', $catid, 'name="info[catid]" class="duan1" onchange="javascript:c_c(this.value);"','','',0,1,$siteid,'1');?></td>
					</tr>
				<?php } else { ?>
					<tr>
						<th width="100"><font color="red">*</font><?php echo $forminfos['catid']['name'];?>：</th>
						<td><?php echo $forminfos['catid']['form'];?></td>
					</tr>
				<?php } ?>

					<tr>
						<th width="100"><font color="red">*</font><?php echo $forminfos['title']['name'];?>：</th>
						<td><?php echo $forminfos['title']['form'];?></td>						
					</tr>
					<tr>
						<th width="100"><?php echo $forminfos['keywords']['name'];?>：</th>
						<td><?php echo $forminfos['keywords']['form'];?><?php echo $forminfos['keywords']['tips'];?></td>						
					</tr>
					<tr>
						<th width="100"><?php echo $forminfos['description']['name'];?>：</th>
						<td><?php echo $forminfos['description']['form'];?></td>						
					</tr>
					<tr>
						<th width="100"><font color="red">*</font><?php echo $forminfos['content']['name'];?>：</th>
						<td><?php echo $forminfos['content']['form'];?><!-- <?php echo $forminfos['content']['tips'];?> --></td>						
					</tr>
					<tr>
						<th></th>
						<td>
							<input name="forward" type="hidden" value="<?php echo HTTP_REFERER;?>">
							<input name="id" type="hidden" value="<?php echo $id;?>">
							<input name="dosubmit" type="submit" id="dosubmit" value="提交" class="contribute-btn btn-orange">
						</td>
					</tr>
				</table>
			</form>		
		</div>
		<div class="clear"></div>
	</div>
	</div>
</div>
<script type="text/javascript"> 
<!--
//只能放到最下面
$(function(){
	$.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){window.top.art.dialog({content:msg,lock:true,width:'200',height:'50'}, 	function(){$(obj).focus();
	boxid = $(obj).attr('id');
	if($('#'+boxid).attr('boxid')!=undefined) {
		check_content(boxid);
	}
	})}});
	<?php echo $formValidator;?>
})
//-->
</script>

<script type="text/javascript" src="<?php echo WEB_PATH;?>statics/cy/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>statics/cy/js/Validform_v5.3.2.js"></script>

<script type="text/javascript">
    $(function(){
        var demo = $('form[name="myform"]').Validform({
            tiptype:3,
            showAllError:true,
            /*datatype:{
				"zh" : /^[\u4E00-\u9FA5\uf900-\ufa2d]$/
				},*/
            ajaxPost:false
        });
        demo.addRule([
        {
        	ele:"#title",
        	datatype:"*",
        	nullmsg:"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;请输入标题！"
        },
/*
        {
        	ele:"#keywords",
        	datatype:"*",
        	nullmsg:"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;关键字不能为空！"
        },
*/       
        {
        	ele:"#content",
        	datatype:"*",
        	nullmsg:"请输入内容！"
        },
        ]);
    });
</script>

<?php include template('content', 'footer'); ?>