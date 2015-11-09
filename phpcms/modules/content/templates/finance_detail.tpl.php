<?php
include $this->admin_tpl('header','admin');
?>


<div class="pad_10">
<form action="?m=content&c=content&a=financepreview&id=<?php echo $id; ?>" method="post" name="myform" id="myform">

<table cellpadding="2" cellspacing="1" class="table_form" style="margin-top: 20px;" width="100%">	
	<tr>
		<th width="25%"><?php echo '项目名称'?>：</th>
		<td><?php echo $itemName;?></td>
	</tr>
	<tr>
		<th width="25%"><?php echo '项目类型'?>：</th>
		<td><?php echo $itemType;?></td>
	</tr>
	<tr>
		<th width="25%"><?php echo '联系人'?>：</th>
		<td><?php echo $contactPerson;?></td>
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
		<th width="25%"><?php echo '通讯地址'?>：</th>
		<td><?php echo $contactAddr;?></td>
	</tr>
	<tr>
		<th width="25%"><?php echo '融资目的'?>：</th>
		<td><?php echo $financeAim;?></td>
	</tr>
	
	<tr>
		<th width="25%"><?php echo '市场规模'?>：</th>
		<td><?php echo $marketSize;?></td>
	</tr>
	<tr>
		<th width="25%"><?php echo '产品服务'?>：</th>
		<td><?php echo $proService;?></td>
	</tr>
	<tr>
		<th width="25%"><?php echo '融资金额'?>：</th>
		<td><?php echo $financeNum;?>万</td>
	</tr>
	<tr>
		<th width="25%"><?php echo '转让股权比例'?>：</th>
		<td><?php echo $financePercent;?></td>
	</tr>
	<tr>
		<th width="25%"><?php echo '附件'?>：</th>
		<td>
			<a href="<?php echo $busiplan;?>" title="下载附件" target="_blank"><?php echo $busiplan;?></a>
		</td>
	</tr>	
	<tr>
		<th width="25%"><?php echo '提交用户'?>：</th>
		<td><?php echo $username;?></td>
		<!-- <td><?php //echo "<a href='?m=member&c=member&a=memberinfo&username=".urlencode($username)."' >".$username."</a>";?></td> -->
	</tr>
 
	<tr>
		<th width="25%"><?php echo '通过审核'?>：</th>
		<td>
			<input name="financepassed" type="radio" value="是">&nbsp;是&nbsp;&nbsp;&nbsp;&nbsp;
			<!-- <input name="applypassed" type="radio" value="否">&nbsp;否 -->
		</td>
	</tr>

	<tr>
		<th></th>
		<td>
			<input type="hidden" name="forward" value="?m=content&c=content&a=financepreview">
			<input type="submit" name="dosubmit" id="dosubmit" class="dialog" value=" <?php echo L('submit')?> ">
		</td>
	</tr>

</table>
</form>
</div>
</body>
</html>

