<?php
if($_POST['buy']){
	$username=$_POST['username'];
	$tel=$_POST['tel'];
	$place=$_POST['place'];
	$viewuid=$_POST['viewuid'];
	$number=$_POST['number'];
	$uid=$_SGLOBAL['supe_uid'];
	$query = $_SGLOBAL['db']->query("SELECT * FROM ".tname('goodscod')." WHERE uid='$uid' AND viewuid='$viewuid'");
	$value = $_SGLOBAL['db']->fetch_array($query);
	if($value){
	updatetable("goodscod",array('username'=>$username,'tel'=>$tel,'place'=>$place,'number'=>$number),array('viewuid'=>$viewuid,'uid'=>$uid));
	}else{
	inserttable("goodscod",array('username'=>$username,'tel'=>$tel,'number'=>$number,'place'=>$place,'viewuid'=>$viewuid,'uid'=>$uid));
	}
	echo '<script language="javascript">alert("提交成功,我们会尽快为你发货。");</script>';
	echo '<script language="javascript">history.go(-1);</script>';
}
?>