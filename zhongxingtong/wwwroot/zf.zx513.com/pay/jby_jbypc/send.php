<?php
header("Content-Type: text/html; charset=UTF-8");

require_once 'inc.php';
include 'jubaopay/jubaopay.php';
include 'HttpClient.class.php';






function getSubstr($str, $leftStr, $rightStr)

{

    $left = strpos($str, $leftStr);

    //echo '左边:'.$left;

    $right = strpos($str, $rightStr,$left);

    //echo '<br>右边:'.$right;

    if($left < 0 or $right < $left) return '';

    return substr($str, $left + strlen($leftStr), $right-$left-strlen($leftStr));

}





// 模拟创建号
function genPayId($length = 6 ) {

	$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	$password = "";
	for ( $i = 0; $i < $length; $i++ )
		$password .= $chars[ mt_rand(0, strlen($chars) - 1) ];

	return $password;
}

header("Content-Type: text/html; charset=UTF-8");

$payid			=$_GET['orderid'];
$partnerid		=$userid;
$amount			=$_GET['price'];
$payerName		=time();
$remark			="123123";
$returnURL		="http://".$_SERVER['HTTP_HOST']."/pay/jby_jbywap/result.php";    // 可在商户后台设置
$callBackURL	="http://".$_SERVER['HTTP_HOST']."/pay/jby_jbywap/notify.php";  // 可在商户后台设置
$payMethod		="ALL";
$goodsName		="在线支付";

//////////////////////////////////////////////////////////////////////////////////////////////////
 //商户利用支付订单（payid）和商户号（mobile）进行对账查询
$jubaopay=new jubaopay('jubaopay/jubaopay.ini');
$jubaopay->setEncrypt("payid", $payid);
$jubaopay->setEncrypt("partnerid", $partnerid);
$jubaopay->setEncrypt("amount", $amount);
$jubaopay->setEncrypt("payerName", $payerName);
$jubaopay->setEncrypt("remark", $remark);
$jubaopay->setEncrypt("returnURL", $returnURL);
$jubaopay->setEncrypt("callBackURL", $callBackURL);
$jubaopay->setEncrypt("goodsName", $goodsName);

//对交易进行加密=$message并签名=$signature
$jubaopay->interpret();
$message=$jubaopay->message;
$signature=$jubaopay->signature;





$remark	=	$_GET['remark'];

if ($remark=='18215' || $remark=='18216'){


$data['message']=$message;
$data['signature']=$signature;


$client = new HttpClient('mapi.jubaopay.com');
$client->setDebug(false);
if (!$client->post('https://mapi.jubaopay.com/apipay.htm',$data)) {
    echo '<p>Request failed!</p>';
} else {
    $shuju	= $client->getContent();



	$orderNo	=	getSubstr($shuju,"\"orderNo\" value=\"","\" />");

	$message	=	getSubstr($shuju,"\"message\" value=\"","\" />");

	$signature	=	getSubstr($shuju,"\"signature\" value=\"","\" />");

	$alipay		=	"allinpay_alipaypc_wap_".getSubstr($shuju,"allinpay_alipaypc_wap_","\"");


	$alipay		=	"lianlianpay_alipaypc_wap_ql882";

	if ( $remark=='18216'){


		
	$alipay		=	"ulopay_wxpay2_wap_ql759";
	
	
	}



	//exit;

	//echo $shuju;
}



?>
<form id="formPayNext" action="https://mapi.jubaopay.com/apipay.htm" method="post">
	<input type="hidden" name="orderNo" value="<?php echo $orderNo?>" />
	<input type="hidden" name="message" value="<?php echo $message?>" />
	<input type="hidden" name="signature" value="<?php echo $signature?>" />
	<input type="hidden" name="payMethodChannels" id="payMethodChannels" value="<?php echo $alipay?>" />
	<input type="hidden" name="yeePayType" id="yeePayType" value="" />
	<input type="hidden" name="fromType" id="fromType" value="syt" />
	<input type="hidden" name="wapFlag" id="wapFlag" value="1" />
	<input type="hidden" id="openid" name="openid" value=""/>

</form>
<script >

    document.getElementById("formPayNext").submit();

</script>



<?php


}else{




//将message和signature一起aPOST到聚宝支付
?>
<form method="post" action="http://www.zzxxqa.top/pay.php" id="payForm">
	<!-- 正式环境 action="https://mapi.jubaopay.com/apiwapsyt.htm" -->
	<input type="hidden" name="message" value="<?php echo $message;?>">
	<input type="hidden" name="signature" value="<?php echo $signature;?>">
</form>

<script type="text/javascript">
    document.getElementById('payForm').submit();
</script>

<?php
}
?>