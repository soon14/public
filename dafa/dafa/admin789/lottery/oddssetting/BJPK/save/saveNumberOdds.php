<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/ip.php");
include_once("../../../../common/login_check.php");

$ball_1 = $_POST["ball_1"];
$ball_2 = $_POST["ball_2"];
$ball_3 = $_POST["ball_3"];
$ball_4 = $_POST["ball_4"];
$ball_5 = $_POST["ball_5"];
$ball_6 = $_POST["ball_6"];
$ball_7 = $_POST["ball_7"];
$ball_8 = $_POST["ball_8"];
$ball_9 = $_POST["ball_9"];
$ball_10 = $_POST["ball_10"];

if(strpos($quanxian,'修改彩票赔率')){
    global $mysqli;
    $sql	=	"UPDATE odds_lottery
    SET h1='$ball_1[0]', h2='$ball_1[1]', h3='$ball_1[2]', h4='$ball_1[3]',h5='$ball_1[4]',
      h6='$ball_1[5]', h7='$ball_1[6]', h8='$ball_1[7]', h9='$ball_1[8]', h10='$ball_1[9]'
                WHERE lottery_type='北京PK拾' AND sub_type='定位' AND ball_type='ball_1'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败,第一球。';
        exit;
    }
    global $mysqli;
    $sql	=	"UPDATE odds_lottery
    SET h1='$ball_2[0]', h2='$ball_2[1]', h3='$ball_2[2]', h4='$ball_2[3]',h5='$ball_2[4]',
      h6='$ball_2[5]', h7='$ball_2[6]', h8='$ball_2[7]', h9='$ball_2[8]', h10='$ball_2[9]'
                WHERE lottery_type='北京PK拾' AND sub_type='定位' AND ball_type='ball_2'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败,第二球。';
        exit;
    }
    global $mysqli;
    $sql	=	"UPDATE odds_lottery
    SET h1='$ball_3[0]', h2='$ball_3[1]', h3='$ball_3[2]', h4='$ball_3[3]',h5='$ball_3[4]',
      h6='$ball_3[5]', h7='$ball_3[6]', h8='$ball_3[7]', h9='$ball_3[8]', h10='$ball_3[9]'
                WHERE lottery_type='北京PK拾' AND sub_type='定位' AND ball_type='ball_3'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败,第三球。';
        exit;
    }
    global $mysqli;
    $sql	=	"UPDATE odds_lottery
    SET h1='$ball_4[0]', h2='$ball_4[1]', h3='$ball_4[2]', h4='$ball_4[3]',h5='$ball_4[4]',
      h6='$ball_4[5]', h7='$ball_4[6]', h8='$ball_4[7]', h9='$ball_4[8]', h10='$ball_4[9]'
                WHERE lottery_type='北京PK拾' AND sub_type='定位' AND ball_type='ball_4'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败,第四球。';
        exit;
    }
    global $mysqli;
    $sql	=	"UPDATE odds_lottery
    SET h1='$ball_5[0]', h2='$ball_5[1]', h3='$ball_5[2]', h4='$ball_5[3]',h5='$ball_5[4]',
      h6='$ball_5[5]', h7='$ball_5[6]', h8='$ball_5[7]', h9='$ball_5[8]', h10='$ball_5[9]'
                WHERE lottery_type='北京PK拾' AND sub_type='定位' AND ball_type='ball_5'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败,第五球。';
        exit;
    }
    global $mysqli;
    $sql	=	"UPDATE odds_lottery
    SET h1='$ball_6[0]', h2='$ball_6[1]', h3='$ball_6[2]', h4='$ball_6[3]',h5='$ball_6[4]',
      h6='$ball_6[5]', h7='$ball_6[6]', h8='$ball_6[7]', h9='$ball_6[8]', h10='$ball_6[9]'
                WHERE lottery_type='北京PK拾' AND sub_type='定位' AND ball_type='ball_6'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败,第六球。';
        exit;
    }
    global $mysqli;
    $sql	=	"UPDATE odds_lottery
    SET h1='$ball_7[0]', h2='$ball_7[1]', h3='$ball_7[2]', h4='$ball_7[3]',h5='$ball_7[4]',
      h6='$ball_7[5]', h7='$ball_7[6]', h8='$ball_7[7]', h9='$ball_7[8]', h10='$ball_7[9]'
                WHERE lottery_type='北京PK拾' AND sub_type='定位' AND ball_type='ball_7'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败,第七球。';
        exit;
    }
    global $mysqli;
    $sql	=	"UPDATE odds_lottery
    SET h1='$ball_8[0]', h2='$ball_8[1]', h3='$ball_8[2]', h4='$ball_8[3]',h5='$ball_8[4]',
      h6='$ball_8[5]', h7='$ball_8[6]', h8='$ball_8[7]', h9='$ball_8[8]', h10='$ball_8[9]'
                WHERE lottery_type='北京PK拾' AND sub_type='定位' AND ball_type='ball_8'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败,第八球。';
        exit;
    }
    global $mysqli;
    $sql	=	"UPDATE odds_lottery
    SET h1='$ball_9[0]', h2='$ball_9[1]', h3='$ball_9[2]', h4='$ball_9[3]',h5='$ball_9[4]',
      h6='$ball_9[5]', h7='$ball_9[6]', h8='$ball_9[7]', h9='$ball_9[8]', h10='$ball_9[9]'
                WHERE lottery_type='北京PK拾' AND sub_type='定位' AND ball_type='ball_9'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败,第九球。';
        exit;
    }
    global $mysqli;
    $sql	=	"UPDATE odds_lottery
    SET h1='$ball_10[0]', h2='$ball_10[1]', h3='$ball_10[2]', h4='$ball_10[3]',h5='$ball_10[4]',
      h6='$ball_10[5]', h7='$ball_10[6]', h8='$ball_10[7]', h9='$ball_10[8]', h10='$ball_10[9]'
                WHERE lottery_type='北京PK拾' AND sub_type='定位' AND ball_type='ball_10'";
    $result = $mysqli->query($sql);
    if(!$result){
        echo '保存失败,第十球。';
        exit;
    }

    echo '保存成功';
}