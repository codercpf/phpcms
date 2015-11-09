<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><ul class="other"><?php if($_username) { ?>
    <li class="navbar-text"><?php echo L('hellow',array(),'member');?> <?php echo get_nickname();?></li>
    <li><a href="<?php echo APP_PATH;?>index.php?m=member&siteid=<?php echo $siteid;?>" target="_blank"><?php echo L('member_center',array(),'member');?></a></li>
    <li><a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=logout&forward=<?php echo urlencode($_GET['forward']);?>&siteid=<?php echo $siteid;?>" target="_top"><?php echo L('logout',array(),'member');?></a></li><?php } else { ?>
    <li><a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=register&siteid=<?php echo $siteid;?>" target="_blank"><?php echo L('register',array(),'member');?></a></li>
    <li><a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=login&forward=<?php echo urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);?>&siteid=<?php echo $siteid;?>" target="_top"><?php echo L('login',array(),'member');?></a></li><?php } ?>
</ul>