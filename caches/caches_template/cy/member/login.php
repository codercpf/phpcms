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

<body class="sessions-new ">
<!--[if lt IE 7]>
<p class="browsehappy">
  You are using an <strong>outdated</strong>
  browser. Please
  <a href="http://browsehappy.com/">upgrade your browser</a>
  to improve your experience.
</p>
<![endif]-->

<div id="particles-js">
  <canvas width="1726" height="811" style="width: 100%; height: 100%;"></canvas>
</div>

<section class="wrapper">
  <div class="card">
    <div class="front">
      <header class="header">

        <div class="header-logo">
          <a href="<?php echo APP_PATH;?>">
            <h1 class="header--logo__36kr">36kr</h1>
          </a>
          <p class="header--logo__slogan" id="slogan" data-default="让创业更简单">让创业更简单</p>
        </div>

        <div class="header-help">
          <a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=public_about" target="_blank" class="header-help__btn">帮助</a>
        </div>

      </header>

      <div class="main">

        <div class="alert-tip"></div>

        <div class="main-login">
          <form accept-charset="UTF-8" action="<?php echo APP_PATH;?>index.php?m=member&c=index&a=login" autocomplete="off" 
                class="simple_form new_user" method="post">

            <div class="form-group">
              <input aria-required="true" autocomplete="false" class="string required form-control" id="userAccount" 
                    name="userAccount" placeholder="请输入邮箱" required="required" type="email">
              <input autocomplete="false" class="password optional form-control" id="userPass" 
                    name="userPass" placeholder="请输入密码，不少于6位" required="required" type="password">
              <p class="error-msg" style="display: none"></p>
            </div> 
            <div class="form-group">
              <input class="btn input-submit" type="submit" name="dosubmit" id="dosubmit" value="登录">
            </div>            

            <div class="actions cf">                        
              <a class="reg" href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=register" id="reg">注册</a>                                   
              <a class="forget" href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=public_getpassword" id="forgot_password">忘记密码</a>  
            </div>
          </form>
        </div>

        <div class="form-group third-part-login">
          <h5>第三方帐号登录</h5>
          <div class="login-way">
            <a data-height="400" data-src="/users/auth/weibo?extra%5Bskip_improve%5D=" data-toggle="popup" data-width="500" href="javascript:">
              <img alt="Wb" class="icon" height="60" src="<?php echo WEB_PATH;?>statics/cy/images/wb-a5eec91830d6b2fa5a9f6f7d8b1ef834.png" width="60"></a>
            <a data-height="500" data-src="/users/auth/open_wechat?extra%5Bskip_improve%5D=" data-toggle="popup" data-top="100" data-width="400" href="javascript:">
              <img alt="Wx" class="icon wx" src="<?php echo WEB_PATH;?>statics/cy/images/wx-f9c1d1aae2be15904703384185770cb5.png" width="60x60"></a>
            <a data-height="400" data-src="/users/auth/qq_connect?extra%5Bskip_improve%5D=" data-toggle="popup" data-width="500" href="javascript:">
              <img alt="Qq" class="icon" height="60" src="<?php echo WEB_PATH;?>statics/cy/images/qq-275386e3bd94f7f29e776c2ea31cd76d.png" width="60"></a>
          </div>
        </div>

      </div>
      <footer class="footer"></footer>
    </div>
  </div>
</section>

</body>
</html>