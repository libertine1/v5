<?php

$do = $_REQUEST['op'];
$dialogid = $_REQUEST['dialog'];

if($do == "delete"){
	if(submitcheck('deletesubmit')) {
		include_once(S_ROOT.'./source/function_delete.php');
		if(deletedialog($dialogid)) {
			showmessage('do_success', "space.php?do=communicate");
		} else {
			showmessage('failed_to_delete_operation');
		}
	}	
	
	include_once template("cp_dialog");
}elseif($do == "ask"){
	
		$subject = $_REQUEST['subject'];
		$detail = $_REQUEST['message'];
		$askid =  $_REQUEST['askid'];
		$question['subject'] = $subject;
		$question['detail']  = $detail;
		$question['q_uid']   = $space['uid'];
		$question['askid']   = $askid;
		$question['q_dateline'] = time();
		//var_dump($question);
		inserttable("questions",$question);
		echo "ok";
		
	//include_once template("cp_dialog");
}
else{

	$uid = $_REQUEST['uid'];
	$rid = $_REQUEST['rid'];
	$mes = $_REQUEST['message'];
	$dialogid = $_REQUEST['dialogid'];
	$dateline = time();
	
	$ip = getonlineip();
	
	
	$dialogArr['uid'] = $uid;
	$dialogArr['rid'] = $rid;
	$dialogArr['message'] = $mes;
	$dialogArr['dialogid'] = $dialogid;
	$dialogArr['dialog_dateline'] = $dateline;
	$dialogArr['ip'] = $ip;
	//echo "string";
	inserttable("dialog",$dialogArr);
}
?>