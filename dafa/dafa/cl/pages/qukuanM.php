<?php 
if(!isset($_SESSION)){ session_start();}
if(!isset($_SESSION["uid"]) || !isset($_SESSION["username"])){
	header("Location:/login/login.php");
	exit();
}
if(!isset($_SESSION)){ session_start();}
if($_SESSION["username"]==''){
	header("Location: /login/login.php");
	exit;
}

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/utils/login_check.php");


$sql	=	"select pay_name,pay_bank from user_list where user_id='".$_SESSION["userid"]."' limit 1";
$query	=	$mysqli->query($sql);
$rs		=	$query->fetch_array();
if($rs['pay_bank'] == ""){
	echo "<script> alert('您还未绑定银行卡，请先绑定银行卡。');</script>";
	$get_pay_name = $rs["pay_name"];
	include_once($C_Patch."../app/member/user/set_cardM.php");
	exit();
}else{
	include_once($C_Patch."../app/member/money/tikuanM.php");
	exit();
}
