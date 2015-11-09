<?php
include $this->admin_tpl('header','admin');
?>


<div class="pad_10">
<form action="?m=content&c=content&a=settledpreview&id=<?php echo $id; ?>" method="post" name="myform" id="myform">

<table cellpadding="2" cellspacing="1" class="table_form" style="margin-top: 20px;" width="100%">	
	<tr>
		<th width="25%"><?php echo '公司名称'?>：</th>
		<td><?php echo $companyName;?></td>
	</tr>
	<tr>
		<th width="25%"><?php echo '联系人'?>：</th>
		<td><?php echo $contactPerson;?></td>
	</tr>
	<tr>
		<th width="25%"><?php echo '联系人职务'?>：</th>
		<td><?php echo $contactPost;?></td>
	</tr>
	<tr>
		<th width="25%"><?php echo '联系电话'?>：</th>
		<td><?php echo $contactTel;?></td>
	</tr>
	<tr>
		<th width="25%"><?php echo 'E-mail'?>：</th>
		<td><?php echo $contactEmail;?></td>
	</tr>
	<tr>
		<th width="25%"><?php echo '联系地址'?>：</th>
		<td><?php echo $contactAddr;?></td>
	</tr>
	<tr>
		<th width="25%"><?php echo '公司网址'?>：</th>
		<td>			
			<a href="<?php echo $companyWeb;?>" title="访问网站" target="_blank"><?php echo $companyWeb;?></a>
		</td>
	</tr>
	<tr>
		<th width="25%"><?php echo '项目类型'?>：</th>
		<td><?php echo $itemType;?></td>
	</tr>
	<tr>
		<th width="25%"><?php echo '团队人数'?>：</th>
		<td><?php echo $teamNum;?></td>
	</tr>
	<tr>
		<th width="25%"><?php echo '项目现状'?>：</th>
		<td><?php echo $itemStatus;?></td>
	</tr>
	<tr>
		<th width="25%"><?php echo '附件'?>：</th>
		<td>
			<a href="<?php echo $attachment;?>" title="下载附件" target="_blank"><?php echo $attachment;?></a>
		</td>
	</tr>
	
	<tr>
		<th width="25%"><?php echo '提交用户'?>：</th>
		<td><?php echo $username;?></td>
		<!-- <td><?php //echo "<a href='?m=member&c=member&a=memberinfo&username=".urlencode($username)."' >".$username."</a>";?></td> -->
	</tr>	

	<tr>
		<th></th>
		<td>
			<input type="hidden" name="forward" value="?m=content&c=content&a=settledpreview">
			<input type="submit" name="dosubmit" id="dosubmit" class="dialog" value=" <?php echo L('submit')?> ">
		</td>
	</tr>

</table>
</form>
</div>
</body>
</html>

