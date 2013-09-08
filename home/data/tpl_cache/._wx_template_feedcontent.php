<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('./wx/template/feedcontent', '1378533999', './wx/template/feedcontent');?><!DOCTYPE html>
<html>
    <head>
    <title><?=$wei['subject']?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"  />
        <?php if($_GET['moblieclicknum']=='1'||$_GET['moblieclicknum']=='0') { ?>
        <link rel = "stylesheet" type = "text/css" href = "./template/css/main.css">
        <?php } else { ?>
        <link rel = "stylesheet" type = "text/css" href = "./template/<?=$_GET['moblieclicknum']?>/css/main.css">
        <?php } ?>
        <style type="text/css">
        #bg,#bg2{ display: none;  position: fixed;  top: 0%;  left: 0%;  width: 100%;  height: 100%;  background:url(./template/img/guide_bg.png);  z-index:1001;/*  -moz-opacity: 0.7;  opacity:.70;  filter: alpha(opacity=70);*/}
        </style>
<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
     	<script type="text/javascript" src="template/js/jquery.tmpl.min.js"></script>
     	<script type="text/javascript" src="template/js/detail.js"></script>
     	<script id="detailTemplate" type="text/x-jquery-tmpl">
     	<h3>
     			<?=BLOCK_TAG_START?>if industry<?=BLOCK_TAG_END?>
                 <p> {{= industry.subject}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                  <?=BLOCK_TAG_START?>if branch<?=BLOCK_TAG_END?>
                 <p> {{= branch.subject}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                    <?=BLOCK_TAG_START?>if development<?=BLOCK_TAG_END?>
                 <p> {{= development.subject}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                 <?=BLOCK_TAG_START?>if product<?=BLOCK_TAG_END?>
                 <p> {{= product.subject}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                 <?=BLOCK_TAG_START?>if introduce<?=BLOCK_TAG_END?>
                 <p> {{= introduce.subject}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                 <?=BLOCK_TAG_START?>if cases<?=BLOCK_TAG_END?>
                 <p> {{= cases.subject}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                 <?=BLOCK_TAG_START?>if talk<?=BLOCK_TAG_END?>
                 <p> {{= branch.subject}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                 <?=BLOCK_TAG_START?>if job<?=BLOCK_TAG_END?>
                 <p> {{= job.subject}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                 <?=BLOCK_TAG_START?>if goods<?=BLOCK_TAG_END?>
                 <p> {{= goods.subject}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                 </h3>
<span class = "info_content_span subtitle">
<?=BLOCK_TAG_START?>if industry<?=BLOCK_TAG_END?>
                 <p> {{= industry.dateline}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                  <?=BLOCK_TAG_START?>if branch<?=BLOCK_TAG_END?>
                 <p> {{= branch.dateline}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                    <?=BLOCK_TAG_START?>if development<?=BLOCK_TAG_END?>
                 <p> {{= development.dateline}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                 <?=BLOCK_TAG_START?>if product<?=BLOCK_TAG_END?>
                 <p> {{= product.dateline}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                 <?=BLOCK_TAG_START?>if introduce<?=BLOCK_TAG_END?>
                 <p> {{= introduce.dateline}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                 <?=BLOCK_TAG_START?>if cases<?=BLOCK_TAG_END?>
                 <p> {{= cases.dateline}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                 <?=BLOCK_TAG_START?>if talk<?=BLOCK_TAG_END?>
                 <p> {{= branch.dateline}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                 <?=BLOCK_TAG_START?>if job<?=BLOCK_TAG_END?>
                 <p> {{= job.dateline}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?>
                 <?=BLOCK_TAG_START?>if goods<?=BLOCK_TAG_END?>
                 <p> {{= goods.dateline}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?></span>
     	</script>
     	  <script id="commentTemplate" type="text/x-jquery-tmpl">
     	  <li>
<span>{{= author}}: </span>
{{= message}}
</li>            
</script>
</head>
<body>
        <div id="bg" onclick="hideDiv();">
            <img src="./template/img/guide.png" alt="" style="position:fixed;top:0;right:16px;width:134px;height:97px;">
        </div>
        <div id="bg2" onclick="hideFriendDIv();">
            <img src="./template/img/guide_firend.png" alt="" style="position:fixed;top:0;right:16px;width:134px;height:97px;">
        </div> 
<div class = "article">
<div id="detail-panel">

       		</div>
<div class = "article_content">
<?=$message?>
</div>
            <div id="friend" class="friend_wrapper">
             <a id="" class="friend_btn" style="" onclick="showDIv()">
                       <img src="./template/img/repost_icon.png" alt="">
                       <span>发送给朋友</span>
             </a>
             <a id="" class="friend_btn" style="margin-left:20px;" onclick="showFriendDIv()">
                       <img src="./template/img/friend_circle.png" alt="">
                       <span>分享到朋友圈</span>
             </a>
             <h3 style="font-size:14px;margin-bottom:-10px;">安卓用户请点击：</h3>
             <a id="" class="add_btn" href="weixin://addfriend/<?=$uidwxkey['wxkey']?>">
                 <span>关注</span>
             </a>
             <h3 style="font-size:14px;margin-bottom:-10px;">iOS用户请订阅：</h3><br>
             <?php if($uidwxkey['wxkey']) { ?>
             <h3 style="font-size:14px;">1、搜索微信号：<?=$uidwxkey['wxkey']?></h3>
             <?php } ?>
              <?php if($uidwxkey['weixinname']) { ?>
             <h3 style="font-size:14px;">2、关注微信公众账号：<?=$uidwxkey['weixinname']?></h3>
             <?php } ?>
         </div><!-- / -->
</div>
<div class = "comment">
<div class = "comment_add">
<textarea placeholder = "写下你的评论..." class = "comment_area" id="review"></textarea>
<input type = "button" class = "submit_btn btn" value = "发表" onclick="cpComment($('#idtype').val(), $('#id').val(), $('#review').val())"/>
</div>
<ul class = "comment_list">
   <div id="comment-panel">

       		</div>
</ul>
</div>
 <input type="hidden" id="wxkey" name="wxkey" value="<?=$_GET['wxkey']?>"/>
    	<input type="hidden" id="id" name="id" value="<?=$_GET['id']?>"/>
    	<input type="hidden" id="idtype" name="idtype" value="<?=$_GET['idtype']?>"/>
    	<input type="hidden" id="type" name="type" value="<?=$_GET['type']?>"/>
    	<input type="hidden" id="uid" name="uid" value="<?=$_GET['uid']?>"/>
    	<input type="hidden" id="page" name="page" value="0"/>
    	<input type="hidden" id="perpage" name="perpage" value="5"/>
</body>
         <script type="text/javascript" charset="utf-8">
         function showDIv(){
        document.getElementById('bg').style.display = "block";
        }
        function hideDiv(){
         document.getElementById('bg').style.display = "none";
        }
        function showFriendDIv(){
        document.getElementById('bg2').style.display = "block";
        }
         function hideFriendDIv(){
        document.getElementById('bg2').style.display = "none";
        }
  </script>
</html><?php ob_out();?>