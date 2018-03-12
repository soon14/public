<?php
if(!isset($_SESSION)){ session_start();}
header ("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
include "../include/config.inc.php";
include "../include/address.mem.php";
include_once("../ip.php");
include_once("../common/function.php");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/class/user.php");

//保存用戶，寫入數據庫
if($_POST["username"] && $_POST["password"])
{
	$user_name	=	$_POST["username"];
	$user_pass	=	md5($_POST["password"]);
	$user_pass_naked	= $_POST["password"];
	$qk_pass	=	md5($_POST["pwd1"].$_POST["pwd2"].$_POST["pwd3"].$_POST["pwd4"]);
	$pay_name	=	strip_tags($_POST["real_name"]);
	$tel		=	strip_tags($_POST["tel"]);
	$qq_num		=	strip_tags($_POST["qq_num"]);
	$email		=	strip_tags($_POST["email"]);
	$top_id		=	strip_tags($_POST["agent_id"]);
	if($top_id==""){
		$top_id=0;
	}


	$sql		=	"select user_name from user_list where user_name='".$user_name."' limit 1";
	$query		=	$mysqli->query($sql);
	$rs			=	$query->fetch_array();
	if($rs['user_name']){
		message('抱歉!数据库中已存在该会员账户,请您更换注册账户!');
	}


	//以下這些字段註冊時候未填寫
	$ask	=	"";
	$answer	=	"";
	$sex	=	"未知";
	$birthday	=	"";
	$othercon	=	"";
	$country	=	"";
	$province	=	"";
	$city		=	"";
	$address	=	"";
	$pay_address=	"";
	$pay_num	=	"";
	$pay_bank	=	"";
	$remark		=	"";
	$loginip	=	"";
	$logintime	=	"";
	$loginaddress=	"";

	//以下是新用戶默認參數
	$user_id=get_user_id();
	$online	=	"否";
	$lognum	=	0;
	$money	=	0;
	$total_bets	=	0;
	$Oid	=	"";
	$status	=	"正常";
	$regip	=	get_ip();
	$regaddress = iconv("GB2312","UTF-8",convertip($regip));   //取出IP所在地
	$regtime	=	date('Y-m-d H:i:s',time());
	$regurl		=	BROWSER_IP;

	$sql		=	"select group_id from user_group where default_group='是' limit 1";
	$query		=	$mysqli->query($sql);
	$rs			=	$query->fetch_array();
	if($rs['group_id']){
		$group_id	=	$rs['group_id'];
	}else
	{
		message('抱歉!系统默认会员组错误,暂时无法注册!');
	}

    $sql		=	"select id from user_list where regip='".$regip."' and tel='$tel' and pay_name='$pay_name' limit 1";
    $query		=	$mysqli->query($sql);
    $rs			=	$query->fetch_array();
    if($rs['id']){
        message('抱歉!该名字已注册,请您更换名字!');
    }

    $sql		=	"select id from user_list where pay_name='$pay_name' limit 1";
    $query		=	$mysqli->query($sql);
    $rs			=	$query->fetch_array();
    if($rs['id']){
        //message('抱歉!该名字已注册,请您更换名字!');
    }

    $s_time = date('Y-m-d');
    $sql		=	"select count(id) today_count from user_list where regip='".$regip."' and logintime>='".$s_time." 00:00:00' and logintime<='".$s_time." 23:59:59' limit 0,1";
    $query		=	$mysqli->query($sql);
    $rs			=	$query->fetch_array();
    if($rs['today_count'] && $rs['today_count']>9){
        message('抱歉!请不要频繁注册用户。请联系管理员');
    }

$sql		=	"insert into user_list(user_id,Oid,user_name,user_pass,user_pass_naked,qk_pass,top_id,money,total_bets,ask,answer,loginip,logintime,loginaddress,regtime,regip,regaddress,logouttime,online,lognum,status,group_id,sex,birthday,tel,email,qq,othercon,country,province,city,address,pay_name,pay_address,pay_num,pay_bank,remark,loginurl,regurl) values ($user_id,'$Oid','$user_name','$user_pass','$user_pass_naked','$qk_pass','$top_id',$money,$total_bets,'$ask','$answer','$loginip','$logintime','$loginaddress','$regtime','$regip','$regaddress','$logouttime','$online',$lognum,'$status',$group_id,'$sex','$birthday','$tel','$email','$qq_num','$othercon','$country','$province','$city','$address','$pay_name','$pay_address','$pay_num','$pay_bank','$remark','$loginurl','$regurl')";


echo $sql; exit;
$mysqli->autocommit(FALSE);
$mysqli->query("BEGIN"); //事务开始
try{
	$mysqli->query($sql);
	$q1		=	$mysqli->affected_rows;
	$id 	=	$mysqli->insert_id;
	if($q1 == 1 ){
		$mysqli->commit(); //事务提交

        $sql	=	"select parameter_key,parameter_value from config_p where `parameter_key`='REGSTER_ENABLE' or `parameter_key`='REGSTER_TITLE' or `parameter_key`='REGSTER_CONTENT'";
        $query	=	$mysqli->query($sql);
	
		if($query){
	        while($rows = $query->fetch_array()){
	            if($rows['parameter_key']=="REGSTER_ENABLE"){
	                $enable = $rows['parameter_value'];
	            }elseif($rows['parameter_key']=="REGSTER_TITLE"){
	                $title = $rows['parameter_value'];
	            }elseif($rows['parameter_key']=="REGSTER_CONTENT"){
	                $content = $rows['parameter_value'];
	            }
	        }
	        if($enable=="enable_true"){
	            user::msg_add($user_id,"",$title,$content);
	        }
		}


		header("Content-type: text/html; charset=utf-8");
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		echo "<script>alert(\"恭喜您，注册成功。\");</script>";
		
		//$shouji = $_POST['phone']
		
			/*echo "<script>window.top.location = 'http://www.hg66g.com/login/login.php';</script>";*/
	
			header("Location:login/login.php");
	
		
		
		exit();
	}else{
		$mysqli->rollback(); //数据回滚
		message("由于网络堵塞，本次注册失败。\\n请您稍候再试，或联系在线客服。");
	}
}catch(Exception $e){
	$mysqli->rollback(); //数据回滚
	message("由于网络堵塞，本次注册失败。\\n请您稍候再试，或联系在线客服。");
}

	
}

//獲取一個未使用的 用戶ID
function get_user_id()
{
	$user_id=rand(10000,999999999);
	while(check_user_id($user_id))
	{
		$user_id=rand(10000,999999999);
	}
	return $user_id;
}

//檢查 用戶ID 是否存在
function check_user_id($val)
{
	global $mysqli;
	$sql		=	"select user_id from user_list where user_id=$val limit 1";
	$query		=	$mysqli->query($sql);
	$rs			=	$query->fetch_array();

	if($rs['user_id'])
	{
		return true;
	}else
	{
		return false;
	}
}

?>