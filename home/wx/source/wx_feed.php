<?php
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
 $m_auth = getAuth();

 	$uid=$_GET['uid'];
	$table=$_GET['idtype'];

$query1 = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname('appset')." bf 
				LEFT JOIN ".tname('menuset')." b ON bf.num=b.menusetid
				WHERE b.english='$table' and bf.uid='$uid'");
			$value1 = $_SGLOBAL['db']->fetch_array($query1);
			if($value1['newname']){
			$appname=$value1['newname'];
			}else{
			$appname=$value1['subject'];

			}
	
$zhong = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname('appset')." bf 
				LEFT JOIN ".tname('menuset')." b ON bf.num=b.menusetid
				WHERE bf.uid='$uid' and bf.appstatus='1' and b.style='1'
				ORDER BY bf.orderid ASC ");
while ($wei = $_SGLOBAL['db']->fetch_array($zhong)) {
	if($wei['newname']){
		$wei['subject']=$wei['newname'];
	}
	$zhongwei[]=$wei;

}
$zhong1 = $_SGLOBAL['db']->query("SELECT bf.*, b.* FROM ".tname('appset')." bf 
				LEFT JOIN ".tname('menuset')." b ON bf.num=b.menusetid
				WHERE bf.uid='$uid' and bf.appstatus='1' and b.english='goods' and b.style='2'
				ORDER BY bf.orderid ASC ");
while ($wei1 = $_SGLOBAL['db']->fetch_array($zhong1)) {
	if($wei1['newname']){
		$wei1['subject']=$wei1['newname'];
	}
	$zhongwei1[]=$wei1;

}	
	if($table=="dialog"){
		$zhongwei2=="1";
		$abc = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE uid='$uid'");
		$bac = $_SGLOBAL['db']->fetch_array($abc);
		if($bac['moblieclicknum']=="2"){
		include_once template("./wx/template/$bac[moblieclicknum]/dialog");
		}else{
		include_once template("./wx/template/dialog");
	}
	}else{
	$abc = $_SGLOBAL['db']->query("SELECT * FROM ".tname('space')." WHERE uid='$uid'");
	$bac = $_SGLOBAL['db']->fetch_array($abc);
	if($bac['moblieclicknum']=="2"){
		include_once template("./wx/template/$bac[moblieclicknum]/feed");
	}else{
	include_once template("./wx/template/feed");
}
}
?>