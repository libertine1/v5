<?php

/*$m_auth = getAuth();


if(empty($m_auth)){
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE wxkey='$_GET[wxkey]'");

	if ($value=$_SGLOBAL['db']->fetch_array($query)){
		updatetable('space', array('wxkey'=>''), array('uid'=>$value['uid']));
	}
	wxshowmessage('login_failure_please_re_login',  'wx.php?do=bind&wxkey='.$_GET['wxkey']);
}
*/
if($_GET['cheak']!='1'){
include_once( 'weibo/config.php' );
require_once '../common.php';
require_once 'wx_common.php';
include_once( CONNECT_ROOT.'/saetv2.ex.class.php' );
require_once CONNECT_ROOT."/common/jtee.inc.php";
require_once CONNECT_ROOT."/common/siteUserRegister.class.php";
require_once('Weixin.class.php');
$rst = $_SGLOBAL['db']->query("SELECT * FROM ".tname('wxkey')." WHERE wxkey='$_GET[wxkey]'");
	$row = $_SGLOBAL['db']->fetch_array($rst);
	if($row){
		loaducenter();
		//include_once(S_ROOT.'./source/function_cp.php');
		//updateuserstat('hot');	
		$user = uc_get_user($row['uid'], 1); 
		uc_user_synlogin($row['uid']);
		$auth = setSession($user[0],$user[1]);
		$weixinuid=$_GET['uid'];
		$m_auth=rawurlencode($auth);
		$friendurl = "http://v5.home3d.cn/home/capi/cp.php?ac=friend&op=add&uid=$weixinuid&gid=0&addsubmit=true&note=微信用户关注&m_auth=$m_auth";
        $friend = file_get_contents($friendurl,0,null,null);
        $friend_output = json_decode($friend);
		
		
}else{
	//include_once(S_ROOT.'./source/function_cp.php');
	//updateuserstat('hot');
		$nextuid=$_GET['uid'];

		$d = get_obj_by_xiaoquid($nextuid);
		$info = $d->getNewWXUser();	
		$fakeid=$info['id'];
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE fakeid='$fakeid'");
		$value = $_SGLOBAL['db']->fetch_array($query);
		if($value){
		loaducenter();

		//include_once(S_ROOT.'./source/function_cp.php');
		//updateuserstat('hot');	
		$user = uc_get_user($value['uid'], 1); 
		uc_user_synlogin($value['uid']);
		$auth = setSession($user[0],$user[1]);
		$weixinuid=$_GET['uid'];
		$m_auth=rawurlencode($auth);
		$friendurl = "http://v5.home3d.cn/home/capi/cp.php?ac=friend&op=add&uid=$weixinuid&gid=0&addsubmit=true&note=微信用户关注&m_auth=$m_auth";
        $friend = file_get_contents($friendurl,0,null,null);
        $friend_output = json_decode($friend);
        inserttable("wxkey",array('wxkey'=>$_GET['wxkey'],'fakeid'=>$fakeid,'uid'=>$value['uid']));
        

	}else{
	$username = $_GET['wxkey'];
	$name = $_GET['wxkey'];
	$password = "weixin";
	$email = isemail($_REQUEST['email']) ? $_REQUEST['email'] : $username."@v5.com.cn";
	$data = array();
	 require_once CONNECT_ROOT."/common/siteUserRegister.class.php";
		 $regClass = new siteUserRegister();
		$uid = $regClass->reg($username, $email, $password);
		if (empty($uid))wxshowmessage("授权失败");
		$msg = '';
		switch($uid){
			case -1:
				$msg = '用户名无效';
				wxshowmessage($msg);
				break;
			case -2:
				$msg = '用户名包含敏感词';
				wxshowmessage($msg);
				break;
			case -3:
				$msg = '用户名已经存在';
				wxshowmessage($msg);
				break;
			case -4:
				$msg = '邮箱格式不正确';
				wxshowmessage($msg);
				break;
			case -5:
				$msg = '此网站邮箱注册受限';
				wxshowmessage($msg);
				break;
			case -6:
				$msg = '邮箱已经存在';
				wxshowmessage($msg);
				break;
			case -7:
				$msg = '发生未知错误';	
				wxshowmessage($msg);
				break;
			default:
				$sql = "SELECT * FROM ".tname('space')." WHERE `wxkey`='".$_GET['wxkey']."'";  
				$user = $_SGLOBAL['db']->fetch_array($_SGLOBAL['db']->query($sql));
				if($user){
					$sinauid=$uid_get['uid'];
					wxshowmessage("已绑定", "http://v5.home3d.cn/home/index.php");
					
				}
					$nextuid=$_GET['uid'];
					$d = get_obj_by_xiaoquid($nextuid);
					$info = $d->getNewWXUser();	
					$setarr = array(
						'name' => $info['nick_name'],
						'fakeid'=>$info['id'],
						'namestatus' => '1',
						'wxkey' => $_GET['wxkey'],
						'fatheruid'=>$nextuid
					);
					updatetable('space', $setarr, array('uid'=>$uid ));
				
				}
				loaducenter();
				
				$user = uc_get_user($uid, 1); 
				uc_user_synlogin($uid);
				$weixinuid=$_GET['uid'];
				$auth = setSession($user[0],$user[1]);
				$m_auth=rawurlencode($auth);
				$friendurl = "http://v5.home3d.cn/home/capi/cp.php?ac=friend&op=add&uid=$weixinuid&gid=0&addsubmit=true&note=微信用户关注&m_auth=$m_auth";
        		$friend = file_get_contents($friendurl,0,null,null);
        		$friend_output = json_decode($friend);
        		$row['uid']=$uid;

}	
}
}
$type=$_GET['type'];
$typeid=$type."id";
$field=$type."field";
$typepic=$type."pic";

$uid=$_GET['uid'];
$id=$_GET['id'];
$viewuid=$_SGLOBAL['supe_uid'];
$query1 = $_SGLOBAL['db']->query("SELECT * FROM ".tname('menuset')." WHERE english='$type'");
$appsubject = $_SGLOBAL['db']->fetch_array($query1);
	if($_COOKIE["uchome_view_".$typeid]!= $typeid) {
include_once(S_ROOT.'./source/function_feed.php');
feed_publish($type, 'viewid',$viewuid,$uid,$id);
$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('credit')."  WHERE uid=$_SGLOBAL[supe_uid] AND fatheruid='$uid'");
$value = $_SGLOBAL['db']->fetch_array($query);
if($value){
	$value['credit']=$value['credit']+"10";
	updatetable("credit",array('credit'=>$value['credit']),array('uid'=>$_SGLOBAL['supe_uid'],'fatheruid'=>$uid));	
}else{
	inserttable("credit",array('credit'=>"10",'uid'=>$_SGLOBAL['supe_uid'],'fatheruid'=>$uid));
}
ssetcookie("view_$typeid",$typeid);
}

if($_GET['type']=="job"){
	$query = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname('job')." b LEFT JOIN ".tname('jobfield')." bf ON bf.jobid=b.jobid WHERE b.jobid='$id' AND b.uid='$uid'");
	$zhong = $_SGLOBAL['db']->fetch_array($query);
	require_once '../source/function_common.php';
	$uidwxkey=getspace($uid);
		include_once template("./wx/template/detailcontent");
}elseif($_GET['type']=="dialog"){
		require_once '../source/function_common.php';
		$uidwxkey=getspace($uid);
			if($uidwxkey['moblieclicknum']=="2"){
		include_once template("./wx/template/$uidwxkey[moblieclicknum]/dialogcontent");
	}else{
	include_once template("./wx/template/dialogcontent");
	}
}elseif($_GET['type']=="goods"){
	$query = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname($type)." b LEFT JOIN ".tname($field)." bf ON bf.$typeid=b.$typeid WHERE b.$typeid='$id' AND b.uid='$uid'");
	$wei = $_SGLOBAL['db']->fetch_array($query);
	$message=$wei['message1'];
	$message = preg_replace("'width[^>]*?;'si", "", $message);
	$message = preg_replace("'height[^>]*?;'si", "", $message);
	$query1 = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname('space')." b LEFT JOIN ".tname('spacefield')." bf ON bf.uid=b.uid WHERE  b.uid='$uid'");
	$space = $_SGLOBAL['db']->fetch_array($query1);
	require_once '../source/function_common.php';
	$uidwxkey=getspace($uid);
	$count2 = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('goodscod')."  WHERE viewuid='$uid'"),0);
	$query2 = $_SGLOBAL['db']->query("SELECT * FROM ".tname('goodscod')." WHERE viewuid='$uid'");
	while($value2=$_SGLOBAL['db']->fetch_array($query2)){
		$wei2[]=$value2;
	}
	$query1 = $_SGLOBAL['db']->query("SELECT * FROM ".tname('goodscod')." WHERE uid='$_SGLOBAL[supe_uid]'");
	$wei1 = $_SGLOBAL['db']->fetch_array($query1);
	if($_GET['moblieclicknum']=="2"){
		include_once template("./wx/template/$_GET[moblieclicknum]/goodscontent");
	}else{
	include_once template("./wx/template/goodscontent");
}

}else{
	$query = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname($type)." b LEFT JOIN ".tname($field)." bf ON bf.$typeid=b.$typeid WHERE b.$typeid='$id' AND b.uid='$uid'");
	$wei = $_SGLOBAL['db']->fetch_array($query);
	$message=$wei['message1'];
	$message = preg_replace("'width[^>]*?;'si", "", $message);
	$message = preg_replace("'height[^>]*?;'si", "", $message);
	if($wei['pic']){
	$typepic="<img src='../attachment/$wei[pic]'>";
}else{
	$typepic="";
}
require_once '../source/function_common.php';
$uidwxkey=getspace($uid);



if($_GET['moblieclicknum']=="2"){
		include_once template("./wx/template/$_GET[moblieclicknum]/feedcontent");
	}else{
	include_once template("./wx/template/feedcontent");
}
}

?>