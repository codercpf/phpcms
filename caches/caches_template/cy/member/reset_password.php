<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>创业平台 - <?php echo L('member','','member').L('manage_center');?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  
  <script src="<?php echo WEB_PATH;?>statics/cy/js/particles-2487832520b97bc9fd5fbb30a3d867a4.js"></script>
  <link href="<?php echo WEB_PATH;?>statics/cy/css/application-6b1bb0142b9a63dc1316029dc52a322c.css" media="all" rel="stylesheet">
  <script src="<?php echo WEB_PATH;?>statics/cy/js/application-0f03036a9b29b502f76a708417d09644.js"></script>
  <!-- <script src="https://res.wx.qq.com/connect/zh_CN/htmledition/js/wxLogin.js"></script>-->

  <style type="text/css" id="hot_style_patch">
      .main-wechat{ padding-top: 45px !important}
      .done, .alert { position: static !important}
  </style>
</head>

<body class="passwords-new ">
<!--[if lt IE 7]>
<p class="browsehappy">
  You are using an <strong>outdated</strong>
  browser. Please
  <a href="http://browsehappy.com/">upgrade your browser</a>
  to improve your experience.
</p>
<![endif]-->

<div id="particles-js">
  <canvas width="1920" height="928" style="width: 100%; height: 100%;"></canvas>
</div>

<section class="wrapper">
  <div class="card">
    <div class="front">
      <header class="header">

        <div class="header-logo">
          <a href="<?php echo APP_PATH;?>">
            <h1 class="header--logo__36kr">36kr</h1>
          </a>
          <p class="header--logo__slogan" id="slogan" data-default="重设密码">重设密码</p>
        </div>

        <div class="header-help">
          <a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=about" target="_blank" class="header-help__btn">帮助</a>
        </div>

      </header>

      <div class="main">

        <div class="main-login">
          <form accept-charset="UTF-8" action="<?php echo APP_PATH;?>index.php?m=member&c=index&a=public_updatepassword&code=<?php echo $getcode;?>" name="newpassForm" 
                  autocomplete="off" class="simple_form new_user" method="post">            
            <div class="form-group">
              <div>
              <input autocomplete="false" class="string required form-control" id="newPass" 
                  name="newPass" placeholder="请输入新密码" type="password" datatype="*6-18" nullmsg="请输入新密码" errormsg="密码至少6个字符,最多18个字符！">
              <p class="Validform_checktip"></p>
              </div>
              <div>
              <input autocomplete="false" class="password optional form-control" id="confirmPass" 
                    name="confirmPass" placeholder="确认密码" type="password"  datatype="*" recheck="newPass" nullmsg="请输入确认密码" errormsg="两次输入的密码不一致！" />
              <p class="Validform_checktip"></p>
              </div>
            </div>
            <div class="form-group" style="margin-bottom: 20px;">
              <input class="btn input-submit" id="dosubmit" name="dosubmit" type="submit" value="使用新密码">
            </div>
            <div style="display: none;">
              当前Code：<?php echo $getcode;?>
            </div>
          </form>
        </div>
      </div>
      <footer class="footer"></footer>
    </div>
  </div>
</section>

<script type="text/javascript" src="<?php echo WEB_PATH;?>statics/cy/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_PATH;?>statics/cy/js/Validform_v5.3.2.js"></script>

<script type="text/javascript">
    $(function(){
        var demo = $('form[name="newpassForm"]').Validform({
            tiptype:3,
            showAllError:true,
            ajaxPost:false
        });        
    });
</script>

</body>
</html>