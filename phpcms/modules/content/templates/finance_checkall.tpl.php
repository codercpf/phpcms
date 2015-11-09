<?php
defined('IN_ADMIN') or exit('No permission resources.');
$show_dialog = 1;
include $this->admin_tpl('header', 'admin');
?>
<div class="pad-lr-10">

<form name="myform" id="myform" action="" method="post" >
<div class="table-list">
<table width="100%" cellspacing="0">
	<thead>
		<tr>
            <th width="60px">ID</th>
			<th><?php echo '项目名称';?></th>
			<th width="150"><?php echo '项目类型';?></th>			
			<th width="150"><?php echo '联系人';?></th>			
			<th width="150"><?php echo '联系电话';?></th>

			<th width="100"><?php echo '融资金额';?></th>
			<th width="100"><?php echo '转让股权比例';?></th>
			
            <th width="150"><?php echo '提交时间';?></th>            
			<th width="12%"><?php echo '管理操作';?></th>
        </tr>
	</thead>
<tbody>
<?php
if(is_array($infos)){
	foreach($infos as $info){
		?>
	<tr>
		<td align="center" width="60px"><?php echo $info['id'];?></td>
		<td align="left"><?php echo $info['itemName'];?></td>
		<td align="center" width="150"><?php echo $info['itemType'];?></td>
		<td align="center" width="150"><?php echo $info['contactPerson'];?></td>		
		<td align="center" width="150"><?php echo $info['contactTel'];?></td>

		<td align="center" width="100"><?php echo $info['financeNum'];?>万</td>
		<td align="center" width="100"><?php echo $info['financePercent'];?></td>
		<td align="center" width="150"><?php echo format::date($info['inputtime'],1);?></td>

		<td align="center" width="12%"><a href="###"
			onclick="edit(<?php echo $info['id']?>, '<?php echo new_addslashes(new_html_special_chars($info['companyName']))?>')"
			title="<?php echo '详情';?>"><?php echo '查看';?></a> |  <a
			href='?m=content&c=content&a=finance_delete&id=<?php echo $info['id']?>'
			onClick="return confirm('<?php echo L('confirm', array('message' => new_addslashes(new_html_special_chars($info['companyName']))))?>')"><?php echo L('delete')?></a> 
		</td>
	</tr>
	<?php
	}
}
?>
</tbody>
</table>
</div>

<div id="pages"><?php echo $pages?></div>
</form>
</div>
<script type="text/javascript">
	function edit(id, name) {
		window.top.art.dialog({id:'edit'}).close();
		window.top.art.dialog({title:'<?php echo '查看';?> '+name+' ',id:'edit',iframe:'?m=content&c=content&a=financepreview&id='+id,width:'700',height:'450'}, function(){var d = window.top.art.dialog({id:'edit'}).data.iframe;var form = d.document.getElementById('dosubmit');form.click();return false;}, function(){window.top.art.dialog({id:'edit'}).close()});
	}
</script>
</body>
</html>
