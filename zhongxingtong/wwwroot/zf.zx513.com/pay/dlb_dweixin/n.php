<?php
include "incc.php";
require_once "pay.php";

$requestNum	=	$_GET["requestNum"];
$orderNum	=	$_GET["orderNum"];
$orderAmount=	$_GET["orderAmount"];
$status		=	$_GET["status"];
$completeTime=	$_GET["completeTime"];

$head=getallheaders();




if ($head["Token"]){

$token		=$head["Token"];
$timestamp	=$head["Timestamp"];

}else{

$token		=$head["token"];
$timestamp	=$head["timestamp"];

}





use WY\app\model\Handleorder;
if ($status=='SUCCESS'){

	


		$pay		= new pay();


	    $PayConfig	= $pay->config('dlbpay');


		$jiami		= "secretKey=". $PayConfig['dlb_secret_key'] ."&timestamp=".$timestamp;

		$jieguo		= strtoupper( sha1($jiami));
		if ($token==$jieguo){
		
		
					
					$handle=@new Handleorder($requestNum,$orderAmount);
					$handle->updateUncard();
					echo "SUCCESS";
		
		
		}
       
}

?>