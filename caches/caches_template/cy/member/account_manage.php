<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template('content', 'header'); ?>


<link rel="stylesheet" href="<?php echo WEB_PATH;?>statics/cy/css/commen.css">
<link rel="stylesheet" href="<?php echo WEB_PATH;?>statics/cy/css/member.css" />

<script src="<?php echo WEB_PATH;?>statics/cy/js/jquery.min2.js"></script>
<script src="<?php echo WEB_PATH;?>statics/js/member_common.js"></script>

<div id="main" class="com-width mt20 clearfix">
	<div id="member" class="clearfix">

		<?php include template('member','account_manage_left'); ?>

		<div id="member-content" class="member-content fr">
			<div class="member-account">
			<script>
				function display(n){
					for (i=1;i<=3;i++){
						if(n==i){
							$("#infobar"+i).addClass("show-item");
							$("#infocontent"+i).removeClass("hide");
						}else{
							$("#infobar"+i).removeClass("show-item");
							$("#infocontent"+i).addClass("hide");
						}
					}
				}
			</script>

				<div class="member-content-hd">
					<span class="ui-tab-tit show-item" onclick="display(1);" id="infobar1">基本资料</span>
					<span class="ui-tab-tit" onclick="display(2);" id="infobar2">修改头像</span>
					<span class="ui-tab-tit" onclick="display(3);" id="infobar3">修改密码</span>
				</div>

				<div class="member-bd mt20">

					<div class="member-account-manage-form show-item" id="infocontent1">
						<div class="form-item">
							<div class="form-item-txt"> <i>*</i>
								邮箱
							</div>
							<input type="text" name="email" placeholder="邮箱" value="<?php echo $memberinfo['email'];?>" disabled="disabled">
						</div>
						<form action="?m=member&c=index&a=account_manage_info" method="post" id="account-manage" name="accountForm">
							<div class="form-item">
								<div class="form-item-txt"> <i>*</i>昵称</div>
								<input type="text" name="nickname" value="<?php echo $memberinfo['nickname'];?>" placeholder="昵称" datatype="*1-16" nullmsg="请填写昵称">
							</div>
							<div class="form-item">
								<div class="form-item-txt">手机号码</div>
								<input type="text" value="<?php echo $memberinfo['mobile'];?>" name="mobile" placeholder="请输入11位手机号码" datatype="m" ignore="ignore">
							</div>
							<div class="form-item">
								<div class="form-item-txt">性别</div>
								<div class="fl sex">
									<input type="radio" value="0" name="sex" id="men" <?php if($memberinfo['sex']==0) { ?>checked="checked"<?php } ?> datatype="*" nullmsg="请选择性别">
									<label for="men">男</label>
									<input type="radio" value="1" name="sex" id="women" <?php if($memberinfo['sex']==1) { ?>checked="checked"<?php } ?>>
									<label for="women">女</label>
								</div>
							</div>

							<div class="form-item">
								<div class="form-item-txt">详细地址</div>
								<input type="text" style="width: 400px;" value="<?php echo $memberinfo['address'];?>" name="address"></div>
							<div class="form-item">
								<div class="form-item-txt">&nbsp;</div>
								<!-- <input type="hidden" value="1" name="dosubmit" /> -->
								<input type="submit" name="dosubmit01" class="form-btn btn-orange account-manage-btn" value="保存"></div>
						</form>
					</div>

					<div class="member-avatar-form hide"  id="infocontent2">
					<!-- <div class="member-avatar hide"  id="infocontent2"> -->
						<table>
							<tbody>
								<tr>
									<td valign="top" align="right">
										<script language="javascript" type="text/javascript" src="<?php echo $phpsso_api_url;?>/statics/js/swfobject.js"></script>
										<script type="text/javascript">
											var flashvars = {
												'upurl':"<?php echo $upurl;?>&callback=return_avatar&"
											}; 
											var params = {
												'align':'middle',
												'play':'true',
												'loop':'false',
												'scale':'showall',
												'wmode':'window',
												'devicefont':'true',
												'id':'Main',
												'bgcolor':'#ffffff',
												'name':'Main',
												'allowscriptaccess':'always'
											}; 
											var attributes = {
												
											}; 
											swfobject.embedSWF("<?php echo $phpsso_api_url;?>/statics/images/main.swf", "myContent", "490", "434", "9.0.0","<?php echo $phpsso_api_url;?>/statics/images/expressInstall.swf", flashvars, params, attributes);

											function return_avatar(data) {
												// alert(data);
												if(data == 1) {
													window.location.reload();
												} else {
													alert('failure');
												}
											}
										</script>

										<div id="myContent"></div>
									</td>
									<td valign="top">
										<ul class="col-right col-avatar" id="avatarlist" style="margin-left:50px;">
											  <?php $n=1; if(is_array($avatar)) foreach($avatar AS $k => $v) { ?>
												<li>
													<img src="<?php echo $v;?>" height="<?php echo $k;?>" width="<?php echo $k;?>" onerror="this.src='<?php echo $phpsso_api_url;?>/statics/images/member/nophoto.gif'"><br />
													<?php echo L('avatar');?><?php echo $k;?> x <?php echo $k;?>
												</li>
											  <?php $n++;}unset($n); ?>
										</ul>
									</td>
								</tr>
							</tbody>
						</table>
					</div>


					<div class="member-setpasswd-form hide"  id="infocontent3">
						<form action="?m=member&c=index&a=account_manage_info" id="myform" name="myform" method="post" id="account-manage-password">
							<div class="form-item">
								<div class="form-item-txt">当前密码</div>

								<input name="password" type="password" id="password" datatype="*" ajaxurl="?m=member&c=index&a=checkpwd_ajax">
								<!-- <input name="password" type="password" id="password" datatype="*"> -->
							</div>
							<div class="form-item">
								<div class="form-item-txt">新密码</div>
								<input name="newpassword" type="password" id="newpassword"  datatype="*6-16"></div>
							<div class="form-item">
								<div class="form-item-txt">确认新密码</div>
								<input name="renewpassword" type="password" id="renewpassword" datatype="*6-16" recheck="newpassword"></div>
							<div class="form-item">
								<div class="form-item-txt">&nbsp;</div>
								<!-- <input type="hidden" value="1" name="dosubmit" /> -->
								<input type="submit" name="dosubmit02" class="form-btn btn-orange" value="保存"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo WEB_PATH;?>statics/cy/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>statics/cy/js/Validform_v5.3.2.js"></script>

<script type="text/javascript">
    $(function(){
        var demo = $('form[name="accountForm"]').Validform({
            tiptype:3,
            // label:".label-control",
            showAllError:true,
            ajaxPost:false
        });
        var changPass = $('form[name="myform"]').Validform({
            tiptype:3,
            // label:".label-control",
            showAllError:true,
            ajaxPost:false
        });
    });
</script>

<?php include template('content', 'footer'); ?>