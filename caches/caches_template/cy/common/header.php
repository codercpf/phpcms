<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!-- 网站头部 -->
<div class="header">
    <!-- 导航栏 -->
    <div class="navbar">
        <div>
            <div class="container">
                <div class="logo"><a href="#"><img src="" alt="创咖zu"></a></div>
                <div class="fixed">
                    <ul class="separate"><?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b43f1459ac702900c8d44c91a5e796dd&action=category&catid=0&num=25&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'0','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'25',));}?>
                        <li class="active"><a href="/">主页</a></li><?php $n=1; if(is_array($data)) foreach($data AS $k => $v) { ?>
                        <li<?php if($v[arrchildid]) { ?> class="menu"<?php } ?>>
                            <a href="<?php if($v[arrchildid]) { ?>#<?php } else { ?><?php echo $v['url'];?><?php } ?>"><?php echo $v['catname'];?></a><?php if($v[arrchildid]) { ?>
                            <ul><?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=050b6fa64652ce6258bc9e7d61f5b7cc&action=category&catid=%24k&num=10&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>$k,'siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'10',));}?><?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                                <li><a href="<?php echo $r['url'];?>"><?php echo $r['catname'];?></a></li><?php $n++;}unset($n); ?><?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                            </ul><?php } ?>
                        </li><?php $n++;}unset($n); ?><?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                    </ul>
                    <?php include template("member","mini"); ?>
                </div>
            </div>
        </div>
        <!--
        <div id="notice" class="notice">
            <div class="container">公告提示：某某某某网全线升级，由此给您带来的不便请谅解。如在浏览和操作过程中有任何问题或建议欢迎指出，客服电话：0000-00000000</div>
            <div class="close"></div>
        </div>
        -->
    </div>
</div>