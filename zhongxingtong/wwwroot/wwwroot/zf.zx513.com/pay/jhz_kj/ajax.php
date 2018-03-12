<?php
include "inc.php";
use WY\app\model\Handleorder;


include "./getSign.php";
include "./getData.php";
$url = "http://zf.szjhzxxkj.com/ownPay/pay";
$ch = curl_init($url);
$timeout = 6000;
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HEADER,0 );
curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//这个是重点。

$merKey = "005ffa93e0c2494181738927fae5f908";
$data = array(
	'memberId' => '500007452153',//商户用户ID
	'time' => time(),//时间戳
	'payMethod' => '6006';
	'orderNo' => time(),//商户订单号
	'idType' => '1',//证件类型
	'idCard' => $_POST['sfz'],//身份证号码
	'memberName' => $_POST['name'],//姓名
	'mobile' => $_POST['tel'],//手机号码
	'bankNo' => $_POST['yhk'],//银行卡号
	'cardType' => '1'//银行卡类型
);
$data['sign'] = getSign($data,$merKey);
$encode_data = getData($data,$merKey);
$post_data = array(
	'merAccount' => '7ebb41f796694e878f44b4dd61bd0dcc',//商户标识
	'data' => $encode_data
);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
// $ret = curl_exec($ch);


	
 // curl_close($ch);


	$ret	='{"data":{"orderNo":"1516289838","contractId":"541650f4b48f4ccd8700df10f69ee937","cardType":"1"},"code":"000000","msg":"成功"}';


	$data	=json_decode($ret);


	//print_r($data);
  

	$code	=	$data->code;

	if ($code=="000000"){
	
		$orderNo	=	$data->data->orderNo;	//dingdan
		$contractId	=	$data->data->contractId;


		

		$handle=@new Handleorder("123456",5.00);
		$fanhui	= $handle->add_xieyi($_POST['yhk'],$orderNo,$contractId);

		



	}
	else if($code=="101002"){
	
		
	}





$url = "https://api.fzmanba.com/paygateway/quickPay/order/v1";
$ch = curl_init($url);
$timeout = 6000;
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HEADER,0 );
curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//这个是重点。

$data = array(
	'merAccount' => '7ebb41f796694e878f44b4dd61bd0dcc',//商户标识
	'merNo' => '10001133',//商户编号
	'time' => time(),//时间戳
	'orderId' => time(),//订单号
	'amount' => '1000',//交易金额
	'productType' => '01',//商品编号
	'product' => '手机',//商品
	'userIp' => '192.168.1.1',//用户ip
	'memberId' => '000002',//商户用户id
	'contractId' => $fanhui,//协议号
	'returnUrl' => 'http://xxxxx.com',
	'notifyUrl' => 'http://xxxxx.com'//后台回调地址
);
$data['sign'] = getSign($data,$merKey);
$encode_data = getData($data,$merKey);
$post_data = array(
	'merAccount' => '7ebb41f796694e878f44b4dd61bd0dcc',//商户标识
	'data' => $encode_data
);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
 $ret = curl_exec($ch);
  curl_close($ch);
  echo $ret;



?>