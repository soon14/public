<?php
session_start();
$uid = $_SESSION['uid'];
$loginid = $_SESSION['user_login_id'];
$username = $_SESSION['username'];
include_once("../newmg2/mgapi.php");
$mgapi = new mgapi();

$gameName=$_GET["gameName"];

$mgRet = $mgapi->loginSlot($username,$gameName);
if($mgRet['Code'] == 4){
	$qGuid='';
	//{'time':guid}
	$guids = $_SESSION["userGUID"];
	if('' == $guids){
		$mgguid = $mgapi->getGUID();
		$qGuid =$mgguid['Data'];
		$guids = array(time(),$qGuid);
		$_SESSION["userGUID"]= $guids;
	}else{
		$keys = array_keys($guids);
		$curTime = time();
		$guidTime = $guids[$keys[0]];
		if($curTime-$guidTime > 3000){
			$mgguid = $mgapi->getGUID();
			$qGuid = $mgguid['Data'];
			$guids = array(time(),$qGuid);
			$_SESSION["userGUID"]= $guids;
		}
		$qGuid = $guids[$keys[1]];
	}
	$mgapi->create($username,$qGuid);
	$mgRet = $mgapi->loginSlot($username);
	if($mgRet['Code'] == 6){
		$mgguid = $mgapi->getGUID();
		$qGuid =$mgguid['Data'];
		$guids = array(time(),$qGuid);
		$_SESSION["userGUID"]= $guids;
		$mgRet = $mgapi->loginSlot($username);
	}
}
$url = $mgRet['Data'];
echo("<script> window.location.href= '{$url}' </script> ");
?>