<?php if(!defined('IN_UCHOME')) exit('Access Denied');?><?php subtplcheck('./wx/template/goodscontent', '1379414136', './wx/template/goodscontent');?><!DOCTYPE html>
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
 <script src="template/js/jquery-v2.0.2.js"></script>
     	<script type="text/javascript" src="template/js/jquery.tmpl.min.js"></script>
     	<script type="text/javascript" src="template/js/detail.js"></script>
     <script id="detailTemplate" type="text/x-jquery-tmpl">
              <li>
                    <span style="padding-right:40px;">{{= username}}  </span>购买数:{{= number}}<p style="float:right;">{{= dateline}}</p><br/>
                    <?php if($_GET['zhong']=='1') { ?>
                    <span>购买物品:"{{= more.subject}}"</span>,<br/>
                    <span>地址:{{= place}}<br/></span>
                    <span>联系电话:{{= tel}}</span>
                    
                    <br/>
                    <form action="wx.php?do=upload" method="post"><input type="submit" class="add_btn" value="确认发货"> </input><input type="hidden" class="add_btn" name="goodscodid" value="{{= id}}"> </input><input type="hidden" class="add_btn" name="uid" value="{{= uid}}"> </input><input type="hidden" class="add_btn" name="gid" value="{{= gid}}"> </input><input type="hidden" class="add_btn" name="viewuid" value="{{= viewuid}}"> </input><input type="hidden" id="wxkey" name="wxkey" value="<?=$_GET['wxkey']?>"/></form>
                    <?php } ?> 
                   
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
            <img src="http://v5.home3d.cn/home/<?=$wei['imageurl']?>" style="width:100%;">
<h3><?=$wei['subject']?></h3>
            
<!-- <span class = "job_content_span subtitle">预约（87）</span> -->
<span class = "job_content_span subtitle" style="margin-top:5px;">评论（<?=$wei['replynum']?>）</span>
<span class = "job_content_span subtitle" style="margin-top:5px;">阅读（<?=$wei['viewnum']?>）</span>
<div class = "article_content">
                <span style = "display:block; padding-bottom: 8px;font-size:20px;" >
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
             <?php if($uidwxkey['weixinname']) { ?>
             <h3 style="font-size:14px;margin-bottom:-10px;">手机用户请关注微信公众账号：<?=$uidwxkey['weixinname']?></h3>
             <?php } ?>
         </div><!-- / -->
         	<?php if($wei['taobaourl']) { ?>
<input type = "button" onclick='gototaobao("<?=$wei['taobaourl']?>")' class = "dial_btn btn" value = "购买" />
<?php } ?>
<?php if($wei['goodscod']) { ?>
<input type = "button" id="buttonBuy"  class = "dial_btn btn" value = "货到付款" />
            <a href="wx.php?uid=<?=$_GET['viewuid']?>&do=feed&wxkey=<?=$_GET['wxkey']?>&idtype=goods"><input type = "button"  class = "dial_btn btn" value = "更多商品" /></a>
            <span style="font-size:12px;float:right;" id="buttonBuy1">点击输入密码查看订单详情</span>
            <?php } ?>
</div>
        <div class = "comment">
  
          <ul class = "comment_list">
            <div id="ajax"></div>
           <div id="detail-panel"></div>
            </ul>
        </div>
<input type="hidden" id="wxkey" name="wxkey" value="<?=$_GET['wxkey']?>"/>
    	<input type="hidden" id="id" name="id" value="<?=$_GET['id']?>"/>
    	<input type="hidden" id="idtype" name="idtype" value="<?=$_GET['idtype']?>"/>
    	<input type="hidden" id="type" name="type" value="<?=$_GET['type']?>"/>
    	<input type="hidden" id="uid" name="uid" value="<?=$_GET['viewuid']?>"/>
    	<input type="hidden" id="page" name="page" value="0"/>
    	<input type="hidden" id="perpage" name="perpage" value="5"/>
    
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

$("#buttonBuy1").click(function(){
                $(".expressInfo1").fadeIn();
                });

            //点击表格外的地方时消失
            $(".expressInfo1").click(function(){
                $(".expressInfo1").fadeOut();
                });
            
            $("#buttonSubmit").click(function(){
                $(".expressInfo").fadeOut();
                });
            //阻止事件冒泡
            $(".formContainer1").click(function(event){
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


      $(document).ready(function () {
    $("#submit").click(function () {
          $.ajax({
                 type: "POST",
                 url: "wx.php?do=upload",
                 data: "uid="+$('#uid').val()+"&gid="+$('#gid').val()+" &viewuid="+$('#viewuid').val()+" &moblieclicknum="+$('#moblieclicknum').val()+"&wxkey="+$('#wxkey').val()+"&username="+$('#username').val()+"&tel="+$('#tel').val()+"&number="+$('#number').val()+"&place="+$('#place').val()+"&buy=1",//提交表单，相当于CheckCorpID.ashx?ID=XXX
                  async: true,                    
                    success: function (data) {
                      $(".expressInfo").fadeOut();
                       $('#ajax').append("<li><span style='padding-right:40px;'>"+$('#username').val()+"</span>购买数:"+$('#number').val()+"<p style='float:right;'>现在</p><br/></li>");//输出提交的表表单
                    },  //操作成功后的操作！msg是后台传过来的值
                }); 
                 });
              });
  </script>

<div class="expressInfo">
<div class="formContainer bc tc">
<form method="post" action="wx.php?do=upload" name="buyform">
<h1 id="formTitle">邮寄信息</h1>
<input type="text" placeholder="姓名" id="username" name="username" value="<?=$wei1['username']?>" class="inputContainer" />
<br />
<input type="text" placeholder="电话"id="tel" name="tel" value="<?=$wei1['tel']?>" class="inputContainer" />
<br />
<input type="text" placeholder="购买数量" id="number" name="number" value="<?=$wei1['number']?>" class="inputContainer" />
<br />
<textarea  name="place" rows="3" class="inputContainer" id="place"  placeholder="地址" ><?=$wei1['place']?></textarea>
<br />

<input type="button" id="submit" class="buttonSubmit" value="提交">
            <input type="button" id="buttonSubmit"  class="buttonSubmit" value="取消">
<input type="hidden" id="uid" name="uid" value="<?=$_GET['uid']?>"/>
            <input type="hidden" id="gid" name="gid" value="<?=$_GET['id']?>"/>
<input type="hidden" id="viewuid" name="viewuid" value="<?=$_GET['viewuid']?>"/>
            <input type="hidden" name="buy" value="1">
            <input type="hidden" id="wxkey" name="wxkey" value="<?=$_GET['wxkey']?>"/>
</div> <!-- formContainer -->
</form> 
</div> <!-- expressInfo --> 

    <div class="expressInfo1">
        <div class="formContainer1 bc tc">
        <form method="post" action="wx.php?do=upload">
            <h1 id="formTitle">密码确认</h1>
            <input type="text" placeholder="密码" name="password"  class="inputContainer" />
            <br />

            <input type="submit" class="buttonSubmit" value="提交">
            <input type="hidden" id="uid" name="uid" value="<?=$_GET['uid']?>"/>
            <input type="hidden" id="gid" name="gid" value="<?=$_GET['id']?>"/>
            <input type="hidden" id="viewuid" name="viewuid" value="<?=$_GET['viewuid']?>"/>
            <input type="hidden" name="moblieclicknum" value="<?=$_GET['moblieclicknum']?>">
            <input type="hidden" name="password1" value="1">
            <input type="hidden" id="wxkey" name="wxkey" value="<?=$_GET['wxkey']?>"/>
        </div> <!-- formContainer -->
        </form> 
    </div> <!-- expressInfo --> 
</body>
</html><?php ob_out();?>