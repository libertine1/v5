<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('./wx/template/feed', '1379414071', './wx/template/feed');?><!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"  />
<?php if($bac['moblieclicknum']=='1'||$bac['moblieclicknum']=='0') { ?>
<link rel = "stylesheet" type = "text/css" href = "template/css/main.css">
<link rel="stylesheet" href="template/css/mobiscroll.custom-2.5.4.min.css">
<?php } else { ?>
<link rel = "stylesheet" type = "text/css" href = "template/<?=$bac['moblieclicknum']?>/css/main.css">
<link rel="stylesheet" href="template/<?=$bac['moblieclicknum']?>/css/mobiscroll.custom-2.5.4.min.css">
<?php } ?>
<script src="template/js/jquery-v2.0.2.js"></script>
     	<script src="template/js/mobiscroll.custom-2.5.4.min.js"></script>
     	<script src="template/js/scrollbox.js"></script>
<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
    	<script src="template/js/mobiscroll.custom-2.5.4.min.js"></script>
     	<script src="template/js/js/jquery.query.js" type="text/javascript"></script>
     	<script type="text/javascript" src="template/js/jquery.tmpl.min.js"></script>
     	<script type="text/javascript" src="template/js/feed.js"></script><!-- 时间选择插件 -->
     	<?php if($bac['moblieclicknum']=='3'||$bac['moblieclicknum']=='4' ||$bac['moblieclicknum']=='5'||$bac['moblieclicknum']=='6') { ?>
     	<script id="detailTemplate" type="text/x-jquery-tmpl">
    	<li>
    			<?=BLOCK_TAG_START?>if askid<?=BLOCK_TAG_END?>
    			<a href = "wx.php?do=detail&id={{= id}}&uid={{= q_uid}}&idtype=<?=$_GET['idtype']?>id&type=<?=$_GET['idtype']?>&viewuid=<?=$uid?>&wxkey=<?=$_GET['wxkey']?>&moblieclicknum=<?=$bac['moblieclicknum']?>&cheak='1'">
    			<?=BLOCK_TAG_START?>else<?=BLOCK_TAG_END?>
<a href = "wx.php?do=detail&id={{= <?=$_GET['idtype']?>id}}&uid={{= uid}}&idtype=<?=$_GET['idtype']?>id&type=<?=$_GET['idtype']?>&viewuid=<?=$uid?>&wxkey=<?=$_GET['wxkey']?>&moblieclicknum=<?=$bac['moblieclicknum']?>&cheak='1'">
<?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
<div>
 <?=BLOCK_TAG_START?>if image1url<?=BLOCK_TAG_END?>
<img src = "{{= image1url}}" />
<?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
<h4>{{= subject}}</h4>
<span class = "info_span subtitle">{{= dateline}}</span>
</div>
</a>
</li>
</script>
     	<?php } else { ?>
     	<script id="detailTemplate" type="text/x-jquery-tmpl">
    	<li>
    			<?=BLOCK_TAG_START?>if askid<?=BLOCK_TAG_END?>
    			<a href = "wx.php?do=detail&id={{= id}}&uid={{= q_uid}}&idtype=<?=$_GET['idtype']?>id&type=<?=$_GET['idtype']?>&viewuid=<?=$uid?>&wxkey=<?=$_GET['wxkey']?>&moblieclicknum=<?=$bac['moblieclicknum']?>&cheak='1'">
    			<?=BLOCK_TAG_START?>else<?=BLOCK_TAG_END?>
<a href = "wx.php?do=detail&id={{= <?=$_GET['idtype']?>id}}&uid={{= uid}}&idtype=<?=$_GET['idtype']?>id&type=<?=$_GET['idtype']?>&viewuid=<?=$uid?>&wxkey=<?=$_GET['wxkey']?>&moblieclicknum=<?=$bac['moblieclicknum']?>&cheak='1'">
<?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
<div class="listOuter">
 <?=BLOCK_TAG_START?>if image1url<?=BLOCK_TAG_END?>
<img src = "{{= image1url}}" />
<?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
<div class="listInner">
<h4>{{= subject}}</h4>
</div>
<span class = "info_span subtitle">{{= dateline}}</span>
</div>
</a>
</li>
</script>
<?php } ?>
</head>
<body> 
<div class = "navigation">
<span><?=$appname?></span>
<?php if($bac['moblieclicknum']=='1'||$bac['moblieclicknum']=='0') { ?>
<a href = "#" id = "show" class = "menu_btn"><img src = "./template/img/menu_btn.png" id = "show" /></a>
<?php } else { ?>
<a href = "#" id = "show" class = "menu_btn"><img src = "./template/<?=$bac['moblieclicknum']?>/img/menu_btn.png" id = "show" /></a>

<?php } ?>
</div>
<ul class = "list mt55">
<div id="detail-panel"></div>	
</ul>
<input type = "button"  onclick="getComment($('#idtype').val(), $('#uid').val(), $('#page').val(), $('#perpage').val());" value = "更多" class = "more_button"  />
 	<input type="hidden" id="id" name="id" value="<?=$_GET['id']?>"/>
            <input type="hidden" id="idtype" name="idtype" value="<?=$_GET['idtype']?>"/>
            <input type="hidden" id="uid" name="uid" value="<?=$_GET['uid']?>"/>
            <input type="hidden" id="page" name="page" value="2"/>
            <input type="hidden" id="perpage" name="perpage" value="10"/>
<div style = "display: none;">
<select name="" id="demo" class="f-dd">
<option value="wx.php?do=home&uid=<?=$_GET['uid']?>">首页</option>
    <?php if(is_array($zhongwei)) { foreach($zhongwei as $value) { ?>
                <option value="wx.php?do=feed&uid=<?=$_GET['uid']?>&idtype=<?=$value['english']?>"><?=$value['subject']?></option>
                <?php } } ?>
                <?php if($zhongwei1) { ?>
                <?php if(is_array($zhongwei1)) { foreach($zhongwei1 as $value1) { ?>
                <option value="wx.php?do=feed&uid=<?=$_GET['uid']?>&idtype=<?=$value1['english']?>"><?=$value1['subject']?></option>
                <?php } } ?>
                <?php } ?>
</select>
</div>
</body>
</html><?php ob_out();?>