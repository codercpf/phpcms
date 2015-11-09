<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header','admin');
?>
<div class="pad-10" style="width: 80%">

<form name="myform" id="myform" action="" method="post" >
<div class="table-list">
    <table width="100%">
        <thead>
            <tr>
            <th width="60px">ID</th>
			<th><?php echo '公司名称';?></th> 
			<th width="20%"><?php echo '所属行业';?></th> 
            <th width="150"><?php echo '审核时间';?></th>
            <th width="150"><?php echo '用户名';?></th>
			<th width="50"><?php echo '管理操作';?></th>
            </tr>
        </thead>
<tbody>
    <?php
	$model_cache = getcache('model','commons');
	foreach ($datas as $r) {
	?>
        <tr>
		<td align='center' width="60px"><?php echo $r['id'];?></td>
		<td align='left'><a href="javascript:;" onclick='change_color(this);window.open("?m=content&c=content&a=report_detail&reportid=<?php echo $r['id']?>&pc_hash=<?php echo $_SESSION['pc_hash'];?>","manage")'><?php echo $r['companyName'];?></a></td>
		<td align='center' width="20%"><?php echo $r['companyRealm'];?></td>
		<td align='center' width="150"><?php echo format::date($r['updatetime'],1);?></td>
		<td align='center' width="150">
		<?php 
			echo "<a href='?m=member&c=member&a=memberinfo&username=".urlencode($r['username'])."' >".$r['username']."</a>";
		?></td>
		<td align='center'  width="50" ><a href="javascript:;" onclick='change_color(this);window.open("?m=content&c=content&a=report_detail&reportid=<?php echo $r['id']?>&pc_hash=<?php echo $_SESSION['pc_hash'];?>","manage")'><?php echo '查看';?></a></td>
	</tr>
     <?php }?>
</tbody>
     </table>
 <div id="pages"><?php echo $pages?></div>
</div>
</form>
</div>
<script type="text/javascript"> 
<!--
window.top.$("#current_pos_attr").html('<?php echo '已审核内容';?>');
function change_color(obj) {
	$(obj).css('color','red');
}
//-->
</script>
</body>
</html>