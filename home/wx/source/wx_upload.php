<?php
header("Content-Type:text/html;charset=utf-8");  
//购买执行代码
if($_POST['buy']){
	$username=$_POST['username'];
	$tel=$_POST['tel'];
	$place=$_POST['place'];
	$viewuid=$_POST['viewuid'];
	$number=$_POST['number'];
	$uid=$_SGLOBAL['supe_uid'];
	$gid=$_POST['gid'];
	$wxkey=$_POST['wxkey'];
/*	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('goodscod')." WHERE uid='$uid' and viewuid='$viewuid' and status='0'");
	$value = $_SGLOBAL['db']->fetch_array($query);
	if($value){
	updatetable("goodscod",array('username'=>$username,'dateline'=>$_SGLOBAL['timestamp'], 'gid'=>$gid,'tel'=>$tel,'place'=>$place,'number'=>$number),array('viewuid'=>$viewuid,'uid'=>$uid));
	}else{*/
	inserttable("goodscod",array('username'=>$username,'dateline'=>$_SGLOBAL['timestamp'], 'gid'=>$gid,'tel'=>$tel,'number'=>$number,'place'=>$place,'viewuid'=>$viewuid,'uid'=>$uid));
	include_once(S_ROOT.'./wx/wx_common.php');
	include_once(S_ROOT.'./wx/Weixin.class.php');
	$query1 = $_SGLOBAL['db']->query("SELECT * FROM ".tname('goods')." WHERE goodsid='$gid'");
	$value1 = $_SGLOBAL['db']->fetch_array($query1);
	$space=getspace($viewuid);
	$fakeid=$value1['push'];
	if($fakeid){
	$message="亲，你的商品$value1[subject]有人下单啦，<a href='http://v5.home3d.cn/home/wx/wx.php?do=detail&id=$gid&wxkey=$wxkey&uid=$viewuid&viewuid=$viewuid&idtype=goodsid&type=goods&moblieclicknum=$space[moblieclicknum]'>点我瞬间查看</a>";
	$d = get_obj_by_xiaoquid($viewuid);
	$info = $d->sendWXSingleMsg($fakeid,$message);
	}
/*	}*/
	
	/*echo '<script language="javascript">history.go(-1);</script>';*/
}

//查看密码执行代码
if($_POST['password1']){
	$password=trim($_POST['password']);
	$uid=$_POST['viewuid'];
	$gid=$_POST['gid'];
	$moblieclicknum=$_POST['moblieclicknum'];
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('goods')." WHERE uid='$uid' and goodsid='$gid'");
	$value = $_SGLOBAL['db']->fetch_array($query);
	$value['password']=trim($value['password']);
	if($value['password']==$password){
		$url_forward="$_SERVER[HTTP_REFERER]"."&zhong=1";
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: $url_forward");	

	}else{	
	echo '<script charset="utf8" type="text/javascript" language="javascript">alert("密码错误");</script>';
	echo '<script language="javascript">history.go(-1);</script>';	
	}
	
}

//确认收货执行代码
if($_POST['goodscodid']){
	$goodscodid=trim($_POST['goodscodid']);
	$uid=trim($_POST['uid']);
	$gid=trim($_POST['gid']);
	$wxkey=$_POST['wxkey'];
	$viewuid=trim($_POST['viewuid']);
	$space=getspace($uid);
	$space1=getspace($viewuid);
	$fakeid=$space['fakeid'];
	
	
	if($goodscodid){
		updatetable("goodscod",array('status'=>'1','dateline'=>$_SGLOBAL['timestamp']),array('id'=>$goodscodid));
		if($fakeid){
			$query1 = $_SGLOBAL['db']->query("SELECT * FROM ".tname('goods')." WHERE goodsid='$gid'");
	$value1 = $_SGLOBAL['db']->fetch_array($query1);
	$message="亲，你购买的商品$value1[subject]已经发货，请做好收货准备。<a href='http://v5.home3d.cn/home/wx/wx.php?do=detail&wxkey=$wxkey&id=$gid&uid=$viewuid&viewuid=$viewuid&idtype=goodsid&type=goods&moblieclicknum=$space1[moblieclicknum]'>点我瞬间查看</a>";
	$d = get_obj_by_xiaoquid($viewuid);
	$info = $d->sendWXSingleMsg($fakeid,$message);
	}
	echo '<script charset="utf8" language="javascript">alert("已发货确认成功");</script>';
	echo '<script language="javascript">history.go(-1);</script>';	
	}else{
		echo '<script charset="utf8" language="javascript">alert("获取id出错，请联系技术人员。");</script>';
	}
	
}
?>