<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('./wx/template/bind', '1377965653', './wx/template/bind');?><!DOCTYPE HTML>
<html>
<HEAD>
<TITLE>FamilyDay，让一家人团聚</TITLE>
<META name=keywords content=main>
<META name=description content=main>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<META content=no-cache http-equiv=Cache-Control>
<meta charset="utf-8">
<meta name="viewport" content="width=320, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="format-detection" content="telephone=no">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<link rel="stylesheet" href="template/js/jquery.mobile-1.3.0-beta.1.min.css " />
<link rel="stylesheet" href="template/css/jquery.mobile-1.2.0.min.css" />
<link rel="stylesheet"  href="template/css/styles.min.css">
     <link rel="stylesheet" href="template/css/mobiscroll.custom-2.5.4.min.css"><!-- 时间选择插件 -->
     <link rel="stylesheet" type="text/css" href="template/css/style.css">
<script type="text/javascript" src="template/js/cls.js"></script>
<script type="text/javascript">
<?=DOLLOR_TAG?>CLS.script("template/js/jquery-1.8.2.min.js").wait()
      .script("template/js/jquery.mobile-1.3.0-beta.1.min.js")
      .script("template/js/jquery.retina.js");
</script>



</head>

<body>
<div data-role="page">
        <header data-role="header" data-tap-toggle="false" data-theme="none" class="header">
            <span class="menu_title"><b>绑定</b></span>
           
        </header><!-- header end -->
        <div data-role="content">
 <?php if($result==1) { ?>
      <div class="tips">绑定成功
      </div>
    <?php } elseif($result==-1) { ?>     
      <div class="tips">未能将您的微信和我家账号实现绑定<br/>
              原因可能是：<br/>
              —检查您输入的账号密码是否正确<br/>
              —您还没有注册我家的账号
      </div>
      <div class="publish-btn2"><a href="wx.php?do=bind&wxkey=<?=$_GET['wxkey']?>" data-ajax="false" data-role="button">重新绑定</a></div>
      <?php if($os=="ios6") { ?>
      <div class="publish-btn2"><a href="wx.php?do=reg&wxkey=<?=$_GET['wxkey']?>" data-ajax="false" data-role="button">注册一个我家的帐号</a></div>
      <?php } ?>
    <?php } else { ?>

      <div class="tips"> 将微信绑定到微伍<br/><span class="tips2">通过微信在家庭圈分享</span></div>

      <form action="wx.php?do=bind&op=add&wxkey=<?=$_GET['wxkey']?>" method="post" data-ajax="false" id="callAjaxForm">
        <div class="input-field"><input id="username" name="username" placeholder="登录名" value="" type="text" /></div>
        <div class="input-field"><input id="password" name="password" placeholder="请输入你在微伍的登录密码" value="" type="password" /></div>
        <input id="wxkey" type="hidden" name="wxkey" value="<?=$_GET['wxkey']?>" />
        <div class="publish-btn"><button type="submit" id="submit" name="submit" value="submit" data-theme="a">确定</button></div>
      </form>

    <?php } ?>
        

        </div>
        <footer data-role="footer" data-tap-toggle="false" data-theme="none"></footer>
  
    </div>
</body>
</html><?php ob_out();?>