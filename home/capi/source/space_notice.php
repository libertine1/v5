<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: space_notice.php 12880 2009-07-24 07:20:24Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

//分页
$perpage = $_REQUEST['perpage']?$_REQUEST['perpage']:30;
$perpage = mob_perpage($perpage);

$page = empty($_REQUEST['page'])?0:intval($_REQUEST['page']);
$dateline = empty($_REQUEST['dateline'])?0:intval($_REQUEST['dateline']);
if($page<1) $page = 1;
$start = ($page-1)*$perpage;

//检查开始数
ckstart($start, $perpage);

$list = array();
$count = 0;
$multi = '';
	
$view = (!empty($_REQUEST['view']) && in_array($_REQUEST['view'], array('userapp')))?$_REQUEST['view']:'notice';
$actives = array($view=>' class="active"');

if($view == 'userapp') {
	
	if($_REQUEST['op'] == 'del') {
		$appid = intval($_REQUEST['appid']);
		$_SGLOBAL['db']->query("DELETE FROM ".tname('myinvite')." WHERE appid='$appid' AND touid='$_SGLOBAL[supe_uid]'");
		
		capi_showmessage_by_data('do_success', 0);
	}
	
	$start = empty($_REQUEST['start'])?0:intval($_REQUEST['start']);
	$filtrate = $start ? intval($start) : 0;
	$type = intval($_REQUEST['type']);
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('myinvite')." WHERE touid='$_SGLOBAL[supe_uid]' ORDER BY dateline DESC");
	while ($value = $_SGLOBAL['db']->fetch_array($query)) {
		$key = md5($value['typename'].$value['type']);
		$apparr[$key][] = $value;
		if($filtrate) {
			$filtrate--;
		} else {
			if($count < $perpage) {
				if($type && $value['appid'] == $type) {
					$list[$key][] = $value;
					$count++;
				} elseif(!$type) {
					$list[$key][] = $value;
					$count++;
				}
			}
		}
	}
	
	//统计更新
	$myinvitenum = getcount('myinvite', array('touid'=>$space['uid']));
	if($myinvitenum != $space['myinvitenum']) {
		updatetable('space', array('myinvitenum'=>$myinvitenum), array('uid'=>$space['uid']));
	}

	//分页
	$multi = smulti($start, $perpage, $count, "space.php?do=$do&view=userapp");
	
} else {
	
	if(!empty($_REQUEST['ignore'])) {
		updatetable('notification', array('new'=>'0'), array('new'=>'1', 'uid'=>$_SGLOBAL['supe_uid']));
		updatetable('space', array('notenum'=>0), array('uid'=>$_SGLOBAL['supe_uid']));
		$space['notenum'] = 0;
	}
	
	//通知类型
	$noticetypes = array(
		//'wall' => lang('wall'),
		//'piccomment' => lang('pic_comment'),
		//'blogcomment' => lang('blog_comment'),
		//'clickblog' => lang('clickblog'),
		//'clickpic' => lang('clickpic'),
		//'clickthread' => lang('clickthread'),
		//'sharecomment' => lang('share_comment'),
		//'sharenotice' => lang('share_notice'),
		//'doing' => lang('doing_comment'),
		//'friend' => lang('friend_notice'),
		//'post' => lang('thread_comment'),
		'credit' => lang('credit'),
		//'mtag' => lang('mtag'),
		//'event' => lang('event'),
		//'eventcomment' => lang('event_comment'),
		//'eventmember' => lang('event_member'),
		//'eventmemberstatus' => lang('event_memberstatus'),
		//'poll' => lang('poll'),
		//'pollcomment' => lang('poll_comment'),
		//'pollinvite' => lang('poll_invite'),
		'quiz' => lang('quiz'),
		'quizcomment' => lang('quiz_comment'),
		'quizinvite' => lang('quiz_invite'),
		'clickquiz' => lang('clickquiz'),
		'quizwin' => lang('quizwin'),
		'quizlost' => lang('quizlost'),
		'quizinvalid' => lang('quizinvalid')
	);
	
	$type = trim($_REQUEST['type']);
	$typesql = $type?"AND type='$type' ":' ';

	if ($dateline){
		if ($_REQUEST['queryop'] == "up"){
			$typesql .= " AND dateline>".$dateline." ";
		}else{
			$typesql .= " AND dateline<".$dateline." ";
		}

	}
	
	$newids = array();
	$count = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('notification')." WHERE uid='$_SGLOBAL[supe_uid]' $typesql"), 0);
	if($count) {
		$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('notification')." WHERE uid='$_SGLOBAL[supe_uid]' $typesql ORDER BY dateline DESC LIMIT $start,$perpage");
		while ($value = $_SGLOBAL['db']->fetch_array($query)) {
			if($value['authorid']) {
				realname_set($value['authorid'], $value['author']);
				$value['author'] = capi_realname($value['authorid']);
				if($value['authorid']!=$space['uid'] && $space['friends'] && !in_array($value['authorid'], $space['friends'])) {
					$value['isfriend'] = 0;
				} else {
					$value['isfriend'] = 1;
				}
			}
			if($value['new']) {
				$newids[] = $value['id'];
				$value['style'] = 'color:#000;font-weight:bold;';
			} else {
				$value['style'] = '';
			}
			// 取消HTML
			$value["note"] = $value["note"];
			$value["avatar"]  = capi_avatar($value["authorid"]);
			$value["avatarisonline"]  = capi_isonline($value["authorid"]);
			$list[] = $value;
		}
		//分页
		$multi = multi($count, $perpage, $page, "space.php?do=$do");
	}

	
	//更新状态为已看
	if($newids) {
		$_SGLOBAL['db']->query("UPDATE ".tname('notification')." SET new='0' WHERE id IN (".simplode($newids).")");
		
		//更新未读的
		$newcount = $_SGLOBAL['db']->result($_SGLOBAL['db']->query("SELECT COUNT(*) FROM ".tname('notification')." WHERE uid='$_SGLOBAL[supe_uid]' AND new='1'"), 0);
		$space['notenum'] = $newcount = intval($newcount);
		updatetable('space', array('notenum'=>$newcount), array('uid'=>$_SGLOBAL['supe_uid']));
	}
	 
	$newnum = 0;
	$space['pmnum'] = $_SGLOBAL['member']['newpm'];
	foreach (array('notenum','pokenum','addfriendnum','mtaginvitenum','eventinvitenum','myinvitenum') as $value) {
		$newnum = $newnum + $space[$value];
	}
	
	$_SGLOBAL['member']['notenum'] = $space['notenum'];
	$_SGLOBAL['member']['allnotenum'] = $newnum;
	
	realname_get();
}

capi_showmessage_by_data("rest_success", 0, array('notices'=>$list, 'count'=>count($list)));
?>
