<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('./wx/template/2/home', '1377794881', './wx/template/2/home');?><!DOCTYPE html>
<html>
<head>
<title></title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"  />
<link rel="stylesheet" type="text/css" href="./template/2/css/home.css" />
</head>

<body>
<div data-role="page">
<header data-role="header" data-tap-toggle="false" data-theme="none"></header>

<div data-role="content">
<div class="banner">
<img src="http://v5.home3d.cn/home/<?=$home1['imageurl']?>" id="banner_pic" />
<div class="banner_text">
<span>
<?=$home1['subject']?>
</span>
</div>
</div><!-- banner -->

<div class="menu">

<div class="menu_row" id="row1">
<?php if($zhongwei['0']['subject']) { ?>
<a href="wx.php?do=feed&uid=<?=$_GET['uid']?>&idtype=<?=$zhongwei['0']['english']?>">
<div class="menu_item" id="one">
<img src="./template/2/img/arrow_right_double.png" />
<span><?=$zhongwei['0']['subject']?></span>
</div>
</a>
<?php } ?>
<?php if($zhongwei['1']['subject']) { ?>
<a href="wx.php?do=feed&uid=<?=$_GET['uid']?>&idtype=<?=$zhongwei['1']['english']?>">
<div class="menu_item" id="two">
<img src="./template/2/img/arrow_right_double.png" />
<span><?=$zhongwei['1']['subject']?></span>
</div>
</a>
<?php } ?>
</div>

<div class="menu_row" id="row2">
<?php if($zhongwei['2']['subject']) { ?>
<a href="wx.php?do=feed&uid=<?=$_GET['uid']?>&idtype=<?=$zhongwei['2']['english']?>">
<div class="menu_item" id="three">
<img src="./template/2/img/arrow_right_double.png" />
<span><?=$zhongwei['2']['subject']?></span>
</div>
</a>
<?php } ?>
<?php if($zhongwei['3']['subject']) { ?>
<a href="wx.php?do=feed&uid=<?=$_GET['uid']?>&idtype=<?=$zhongwei['3']['english']?>">
<div class="menu_item" id="four">
<img src="./template/2/img/arrow_right_double.png" />
<span><?=$zhongwei['3']['subject']?></span>
</div>
</a>
<?php } ?>
</div>

<div class="menu_row" id="row3">
<?php if($zhongwei['4']['subject']) { ?>
<a href="wx.php?do=feed&uid=<?=$_GET['uid']?>&idtype=<?=$zhongwei['4']['english']?>">
<div class="menu_item" id="five">
<img src="./template/2/img/arrow_right_double.png" />
<span><?=$zhongwei['4']['subject']?></span>
</div>
</a>
<?php } ?>
<?php if($zhongwei['5']['subject']) { ?>
<a href="wx.php?do=feed&uid=<?=$_GET['uid']?>&idtype=<?=$zhongwei['5']['english']?>">
<div class="menu_item" id="six">
<img src="./template/2/img/arrow_right_double.png" />
<span><?=$zhongwei['5']['subject']?></span>
</div>
</a>
<?php } ?>
</div>

<div class="menu_row" id="row4">
<?php if($zhongwei['6']['subject']) { ?>
<a href="wx.php?do=feed&uid=<?=$_GET['uid']?>&idtype=<?=$zhongwei['6']['english']?>">
<div class="menu_item" id="seven">
<img src="./template/2/img/arrow_right_double.png" />
<span><?=$zhongwei['6']['subject']?></span>
</div>
</a>
<?php } ?>
<?php if($zhongwei['7']['subject']) { ?>
<a href="wx.php?do=feed&uid=<?=$_GET['uid']?>&idtype=<?=$zhongwei['7']['english']?>">
<div class="menu_item" id="eight">
<img src="./template/2/img/arrow_right_double.png" />
<span><?=$zhongwei['7']['subject']?></span>
</div>
</a>
<?php } ?>
   <?php if($zhongwei1) { ?>
        				<?php if(is_array($zhongwei1)) { foreach($zhongwei1 as $value1) { ?>
        				<a href="wx.php?do=feed&uid=<?=$_GET['uid']?>&idtype=<?=$value1['english']?>">
<div class="menu_item" id="night">
<img src="./template/2/img/arrow_right_double.png" />
<span><?=$value1['subject']?></span>
</div>
</a>
        
        <?php } } ?>
<?php } ?>
</div>



</div><!-- page -->
</body>
<footer data-role="footer"></footer>
</html>
<?php ob_out();?>