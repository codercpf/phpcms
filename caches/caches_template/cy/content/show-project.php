<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html lang="zh">
<head>
<?php include template("common","meta"); ?>
<title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
<?php include template("common","style"); ?>
<?php include template("common","javascript"); ?>
<style type="text/css">
/* 项目内容 */
.project{overflow: hidden;}
.project > div{ float: left;}
.project > div.image{width:260px; height: 260px;}
.project > div.image > img{display: block; width: 100%; height: 100%;}
@media screen and (max-width: 1600px) {.project > div.content{position: absolute; right: 10px; left: 280px;}}
.project > div.content{min-width: 260px;}
.project > div.content > .title{line-height:32px;}
.project > div.content > div.status{width:6em; line-height:32px; text-align:center; border-radius:16px; background-color: rgb(255,0,0); color: rgb(255,255,255);}
.project > div.content > div.raising{padding-top:24px; line-height: 24px}
.project > div.content > div.raising > strong{font-size:2em;}
.project > div.content > div.hint{line-height:24px;}
.project > div.content > div.hint > strong{color:rgb(225,65,65);}
.project > div.content > div.schedule{line-height:24px;}
.project > div.content > div.schedule > span{margin-left:2em;}
.project > div.content > div.schedule > span:first-child{margin-left:0;}
.project > div.content > div.influence{float: right; line-height: 24px; padding-right:10px; margin-top:8px;}
.project > div.content > div.influence > a{margin-right: 1em; margin-left: 2em;}
.project > div.content > div.influence > a:first-child{margin-left:0;}

/* 项目相关 */
.wrapper > div.content{min-height:10em;}
.wrapper .title.bg{background-color: rgb(65,105,225); color: rgb(255,255,255);}
.team > div.content > ul > li{float:left; width: 50%;}
.team > div.content > ul > li > a,.wrapper > div.content > ul > li > a > img{display:block;}
.team > div.content > ul > li > a{overflow: hidden; padding-top:0.5em; padding-bottom:0.5em; position: relative;}
.team > div.content > ul > li:nth-child(odd) > a{padding-right:0.5em;}
.team > div.content > ul > li:nth-child(even) > a{padding-left: 0.5em;}
.team > div.content > ul > li > a > img{width: 10em; height: 10em; border-radius: 50%; position: absolute; top:0.5em; left:0;}
.team > div.content > ul > li > a > div.info{height:10em; margin-left: 11em;}
.team > div.content > ul > li > a > div.info > h6{line-height:1em;}
.team > div.content > ul > li > a > div.info > div.level{color:rgb(64,64,64); line-height: 2em;}
.team > div.content > ul > li > a > div.info > div.brief{line-height:1em; height:7em; overflow: hidden;}
.schedule > div.content > ul > li > div.time{margin-left:1em; line-height: 2em;}
.schedule > div.content > ul > li > div.time:after{width:0.5em; height:0.5em; background-color: rgb(255,0,0); border-radius: 50%; content:""; position: absolute; left:-1.2em; top:0.65em;}
.schedule > div.content > ul > li > div.time:before{width:1.0em; height:1.0em; border:0.2em solid rgb(255,0,0); border-radius: 50%; content:""; position: absolute; left:-1.65em; top:0.25em;}
.discuss > div.content > form{display: block; overflow: hidden;}
.discuss > div.content > form > textarea{width:100%; height:10em; box-sizing: border-box; display: block;}
.discuss > div.content > form > button{display: block;}
</style>
</head>
<body>
<div class="site">
    <?php include template("common","header"); ?>
    <div class="content">
        <div class="container hidden margin-bottom">
            <div class="nav margin-top">
                <div class="project bg border padding">
                    <div class="image"><img src="<?php echo $thumb;?>"></div>
                    <div class="content bg">
                        <h4 class="title"><?php echo $title;?></h4>
                        <div class="status"><?php echo $state;?></div>
                        <div class="raising">已筹集：<strong>￥<?php echo number_format($funds);?></strong></div>
                        <div class="hint dark">此项目需筹集 <strong>￥<?php echo number_format($financing);?></strong> 资金</div>
                        <div class="meter border hidden"><span style="width: <?php echo floor($funds/$financing*100);?>%"></span></div>
                        <div class="schedule margin-top"><span>进度：<?php echo floor($funds/$financing*100);?>%</span></div>
                        <div><span>剩余时间：364天23小时59分59秒</span></div>
                        <div class="influence"><a class="dark" href="#">支持</a><span class="dark">9999</span><a class="dark" href="#">关注</a><span class="dark">99999</span></div>
                    </div>
                </div>
            </div>
            <div class="main margin-top">
                <div class="wrapper border explain">
                    <div class="title bg padding">
                        <h5>项目介绍</h5>
                    </div>
                    <div class="content bg padding"><?php echo $content;?></div>
                </div>
                <div class="wrapper border margin-top team">
                    <div class="title bg padding">
                        <h5>团队成员</h5>
                    </div>
                    <div class="content bg padding hidden">
                        <ul>
                            <li>
                                <a href="#" target="_blank">
                                    <img src="">
                                    <div class="info">
                                        <h5>某某某</h5>
                                        <div class="level">CEO</div>
                                        <div class="brief dark">这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <img src="">
                                    <div class="info">
                                        <h5>某某某</h5>
                                        <div class="level">CEO</div>
                                        <div class="brief dark">这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <img src="">
                                    <div class="info">
                                        <h5>某某某</h5>
                                        <div class="level">CEO</div>
                                        <div class="brief dark">这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！这是一段个人描述内容！</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="wrapper border margin-top schedule">
                    <div class="title bg padding">
                        <h5>项目进度</h5>
                    </div>
                    <div class="content bg padding">
                        <ul class="padding">
                            <li>
                                <div class="time dark">2015-10-21</div>
                                <div class="border-left">
                                    <div class="contene margin-left">这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！</div>
                                </div>
                            </li>
                            <li>
                                <div class="time dark">2015-10-20</div>
                                <div class="border-left">
                                    <div class="contene margin-left">这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！</div>
                                </div>
                            </li>
                            <li>
                                <div class="time dark">2015-10-11</div>
                                <div class="border-left">
                                    <div class="contene margin-left">这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！</div>
                                </div>
                            </li>
                            <li>
                                <div class="time dark">2015-10-09</div>
                                <div class="border-left">
                                    <div class="contene margin-left">这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！</div>
                                </div>
                            </li>
                            <li>
                                <div class="time dark">2015-10-01</div>
                                <div class="border-left">
                                    <div class="contene margin-left">这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！这是一段项目进度内容！</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="wrapper border margin-top discuss">
                    <div class="title bg padding">
                        <h5>话题讨论</h5>
                    </div>
                    <div class="content bg padding hidden">
                        <form>
                            <textarea class="margin-bottom"></textarea>
                            <button class="right">发布</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php include template("content","sidebar"); ?>
        </div>
    </div>
    <?php include template("common","footer"); ?>
</div>
</body>
</html>