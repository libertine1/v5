<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('./wx/template/goodscontent', '1378533017', './wx/template/goodscontent');?><!DOCTYPE html>
<html>
    <head>
    	<title><?=$wei['subject']?></title>
<meta charset = "utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"  />
 <?php if($_GET['moblieclicknum']=='1'||$_GET['moblieclicknum']=='0') { ?>
        <link rel = "stylesheet" type = "text/css" href = "./template/css/main.css">
        <link rel="stylesheet" href="./template/css/base.css" />
<link rel="stylesheet" href="./template/css/expressInfo.css" />
        <?php } else { ?>
        <link rel = "stylesheet" type = "text/css" href = "./template/<?=$_GET['moblieclicknum']?>/css/main.css">
        <link rel="stylesheet" href="./template/<?=$_GET['moblieclicknum']?>/css/base.css" />
<link rel="stylesheet" href="./template/<?=$_GET['moblieclicknum']?>/css/expressInfo.css" />
        <?php } ?>
        <style type="text/css">
        #bg,#bg2{ display: none;  position: fixed;  top: 0%;  left: 0%;  width: 100%;  height: 100%;  background:url(./template/img/guide_bg.png);  z-index:1001;/*  -moz-opacity: 0.7;  opacity:.70;  filter: alpha(opacity=70);*/}
        </style>
<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
     	<script type="text/javascript" src="template/js/jquery.tmpl.min.js"></script>
     	<script type="text/javascript" src="template/js/detail.js"></script>
     <script id="detailTemplate" type="text/x-jquery-tmpl">
  			<h3><?=BLOCK_TAG_START?>if goods<?=BLOCK_TAG_END?>
                 <p> {{= goods.subject}}</p>
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?></h3>
<span class = "info_content_span subtitle"> <?=BLOCK_TAG_START?>if goods<?=BLOCK_TAG_END?>
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
<!-- <span class = "job_content_span subtitle">预约（87）</span> -->
<span class = "job_content_span subtitle">评论（<?=$wei['replynum']?>）</span>
<span class = "job_content_span subtitle">阅读（<?=$wei['viewnum']?>）</span>
<div class = "article_content">
                <span style = "display:block; padding-bottom: 8px;" >
                	<span>价    格:<b class="colour"> <?=$wei['curprice']?>元</b></span><br />
                	
                </span>
                <p>
                     <?=$message?>
                </p>
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
         	<?php if($wei['taobaourl']) { ?>
<input type = "button" onclick='gototaobao("<?=$wei['taobaourl']?>")' class = "dial_btn btn" value = "购买" />
<?php } ?>
<?php if($wei['goodscod']) { ?>
<input type = "button" id="buttonBuy"  class = "dial_btn btn" value = "货到付款" />
<?php } ?>
</div>
<div class = "comment">
<div class = "comment_add">
<textarea placeholder = "写下你的评论..." class = "comment_area" id="review"></textarea>
<input type = "button" onclick="cpComment($('#idtype').val(), $('#id').val(), $('#review').val())" class = "submit_btn btn" value = "发表" />
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
    	<input type="hidden" id="uid" name="uid" value="<?=$_GET['viewuid']?>"/>
    	<input type="hidden" id="page" name="page" value="0"/>
    	<input type="hidden" id="perpage" name="perpage" value="5"/>
    	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    	<script type="text/javascript">
$(document).ready(function(){
$("#buttonBuy").click(function(){
$(".expressInfo").fadeIn();
});

//点击表格外的地方时消失
$(".expressInfo").click(function(){
$(".expressInfo").fadeOut();
});

//阻止事件冒泡
$(".formContainer").click(function(event){
event.stopPropagation();
});

});

</script>
<script>

function gototaobao(url){
  window.open(url);
}
</script>
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
<div class="expressInfo">
<div class="formContainer bc tc">
<form method="post" action="wx.php?do=upload">
<h1 id="formTitle">邮寄信息</h1>
<input type="text" placeholder="姓名" name="username" value="<?=$wei1['username']?>" class="inputContainer" />
<br />
<input type="text" placeholder="电话" name="tel" value="<?=$wei1['tel']?>" class="inputContainer" />
<br />
<input type="text" placeholder="购买数量" name="number" value="<?=$wei1['number']?>" class="inputContainer" />
<br />
<textarea id="inputTextarea" name="place" rows="3" class="inputContainer"  placeholder="地址" ><?=$wei1['place']?></textarea>
<br />

<input type="submit" class="buttonSubmit" value="提交">
<input type="hidden" id="uid" name="uid" value="<?=$_GET['uid']?>"/>
            <input type="hidden" id="gid" name="gid" value="<?=$_GET['id']?>"/>
<input type="hidden" id="viewuid" name="viewuid" value="<?=$_GET['viewuid']?>"/>
            <input type="hidden" name="buy" value="1">
</div> <!-- formContainer -->
</form> 
</div> <!-- expressInfo --> 
</body>
</html><?php ob_out();?>