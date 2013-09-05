<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('./wx/template/2/feedcontent', '1378364412', './wx/template/2/feedcontent');?><!DOCTYPE html>
<html>
<head>
<title><?=$appsubject['subject']?></title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"  />
<link rel="stylesheet" type="text/css" href="template/2/css/info_content.css" />
        <link rel="stylesheet" href="./template/css/base.css" />
        <link rel="stylesheet" href="./template/css/expressInfo.css" />
<script type="text/javascript" src="template/2/js/myAll.js"></script>
<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="template/js/jquery.tmpl.min.js"></script>
        <script type="text/javascript" src="template/js/detail.js"></script>
        <style type="text/css">
        #bg,#bg2{ display: none;  position: fixed;  top: 0%;  left: 0%;  width: 100%;  height: 100%;  background:url(./template/img/guide_bg.png);  z-index:1001;/*  -moz-opacity: 0.7;  opacity:.70;  filter: alpha(opacity=70);*/}
        </style>
      <script id="detailTemplate" type="text/x-jquery-tmpl">
 <header data-role="header" data-tap-toggle="false" data-theme="none">
<div class="title"><?=BLOCK_TAG_START?>if industry<?=BLOCK_TAG_END?>
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
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?></div>
<div class="time"><?=BLOCK_TAG_START?>if industry<?=BLOCK_TAG_END?>
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
                 <?=BLOCK_TAG_START?>/if<?=BLOCK_TAG_END?></div>
</header>
</script>
 <script id="commentTemplate" type="text/x-jquery-tmpl">
 <li>
<span class="name">{{= author}}:</span>
<span class="comment_content">
{{= message}}
</span>
</li>
<div class="split">
<br />
</div><!-- split -->
</script>
</head>

<body>
        <div id="bg" onclick="hideDiv();">
            <img src="./template/img/guide.png" alt="" style="position:fixed;top:0;right:16px;width:134px;height:97px;">
        </div>
        <div id="bg2" onclick="hideFriendDIv();">
            <img src="./template/img/guide_firend.png" alt="" style="position:fixed;top:0;right:16px;width:134px;height:97px;">
        </div> 
<div data-role="page">
<div id="detail-panel">

       </div>
       <div data-role="content">
                <div class="content_text">
           <div class="content_pic" style="font-size:14px!important;">
           
                              <?=$message?>
             </div>
            
                </div><!-- content_text -->
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


<div class="comment">
<div class="split">
<br />
</div><!-- split -->

<div class="comment_container">
<div class="comment_publish">
<div class="comment_text">
<textarea id="comment_text_box" placeholder="请写下你的评论..." name="" id="review"></textarea>
</div> <!-- comment_text --> 
<a href="#" onclick="cpComment($('#idtype').val(), $('#id').val(), $('#review').val())">发&nbsp表</a>
</div> <!-- comment_publish --> 
</div><!-- comment_container --> 

<div class="split">
<br />
</div><!-- split -->

<div class="comment_list">
<ul>
 <div id="comment-panel">

       </div>	

</ul>
</div><!-- comment_list -->

</div><!-- comment -->
 <input type="hidden" id="wxkey" name="wxkey" value="<?=$_GET['wxkey']?>"/>
    <input type="hidden" id="id" name="id" value="<?=$_GET['id']?>"/>
    <input type="hidden" id="idtype" name="idtype" value="<?=$_GET['idtype']?>"/>
    <input type="hidden" id="type" name="type" value="<?=$_GET['type']?>"/>
    <input type="hidden" id="uid" name="uid" value="<?=$_GET['uid']?>"/>
    <input type="hidden" id="page" name="page" value="0"/>
    <input type="hidden" id="perpage" name="perpage" value="5"/>
</div><!-- content -->
</div><!-- page -->
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
</html>
<?php ob_out();?>