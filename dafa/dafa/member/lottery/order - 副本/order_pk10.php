<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
@include_once($C_Patch."/app/member/include/address.mem.php");
@include_once($C_Patch."/app/member/include/com_chk.php");
@include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/utils/error_handle.php");
include_once($C_Patch."/app/member/utils/convert_name.php");
include_once($C_Patch."/app/member/utils/time_util.php");
include_once($C_Patch."/app/member/class/lottery_normal.php");
include_once($C_Patch."/app/member/class/lottery_schedule.php");
include_once($C_Patch."/app/member/class/user_group.php");
include_once($C_Patch."/app/member/cache/ltConfig.php");
$is_just_data = "true";
$_GET["game"] = "BJPK";
$gType = "BJPK";
include_once($C_Patch."/pt/mem/ajax/source.php");
include_once($C_Patch."/app/member/class/common_class.php");

$lottery_name = getZhPageTitle($gType);
//北京PK拾
$ball_name['name']		= '北京PK拾';
$ball_name['qiu_1']		= '冠军';
$ball_name['qiu_2']		= '亚军';
$ball_name['qiu_3']		= '第三名';
$ball_name['qiu_4']		= '第四名';
$ball_name['qiu_5']		= '第五名';
$ball_name['qiu_6']		= '第六名';
$ball_name['qiu_7']		= '第七名';
$ball_name['qiu_8']		= '第八名';
$ball_name['qiu_9']		= '第九名';
$ball_name['qiu_10']	= '第十名';
$ball_name['qiu_11']	= '冠亚军和';
$ball_name['ball_1'] 	= '1';
$ball_name['ball_2'] 	= '2';
$ball_name['ball_3'] 	= '3';
$ball_name['ball_4'] 	= '4';
$ball_name['ball_5'] 	= '5';
$ball_name['ball_6'] 	= '6';
$ball_name['ball_7'] 	= '7';
$ball_name['ball_8'] 	= '8';
$ball_name['ball_9'] 	= '9';
$ball_name['ball_10'] 	= '10';
$ball_name['ball_11'] 	= '大';
$ball_name['ball_12'] 	= '小';
$ball_name['ball_13'] 	= '单';
$ball_name['ball_14'] 	= '双';
$ball_name['ball_15'] 	= '龙';
$ball_name['ball_16'] 	= '虎';
$ball_name_h['ball_1']	= '3';
$ball_name_h['ball_2']	= '4';
$ball_name_h['ball_3']	= '5';
$ball_name_h['ball_4']	= '6';
$ball_name_h['ball_5']	= '7';
$ball_name_h['ball_6']	= '8';
$ball_name_h['ball_7']	= '9';
$ball_name_h['ball_8']	= '10';
$ball_name_h['ball_9']	= '11';
$ball_name_h['ball_10'] = '12';
$ball_name_h['ball_11']	= '13';
$ball_name_h['ball_12']	= '14';
$ball_name_h['ball_13']	= '15';
$ball_name_h['ball_14']	= '16';
$ball_name_h['ball_15']	= '17';
$ball_name_h['ball_16']	= '18';
$ball_name_h['ball_17']	= '19';
$ball_name_h['ball_18']	= '大';
$ball_name_h['ball_19']	= '小';
$ball_name_h['ball_20']	= '单';
$ball_name_h['ball_21']	= '双';

//清空所有POST数据为空的表单
//echo json_encode($_POST);exit;
$datas = array_filter($_POST);
//获取清空后的POST键名
$names = array_keys($datas);

$userid = $_SESSION["userid"];

//验证money_log是否存在错误
$sql = "select assets,balance,order_value from money_log where user_id='".$_SESSION["userid"]."' order by id desc limit 0,2";
$query	=	$mysqli->query($sql);
$rs = array();
while($row = $query->fetch_array()){
    $rs[] = $row;
}
/*if(count($rs)>1){
    if($rs[0]["assets"]!=$rs[1]["balance"]){
        echo '<script type="text/javascript">alert("账号金额异常，请联系管理人员。");</script>';
        exit;
    }
}*/

if(count($datas)<1){
    echo '<script type="text/javascript">alert("没有选择数据，请重新下注。");</script>';
    exit;
}

$bet_money_total = 0;
$win_money_total = 0;
for ($i = 0; $i < count($datas); $i++){
    $bet_money_temp = $datas[''.$names[$i].''];
    if(is_numeric($bet_money_temp) && is_int($bet_money_temp*1) && intval($bet_money_temp)>0){
        $bet_money_total += $bet_money_temp;
    }else{
        echo '<script type="text/javascript">alert("数据格式出错，请重新下注。");</script>';
        exit;
    }
}
//校验
$balance	=	0;//投注后
$assets		=	0;//投注前
$sql		= 	"select money from user_list where user_id='$userid' limit 1";
$query 		=	$mysqli->query($sql);
$rs			=	$query->fetch_array();
if($rs['money']){
    $assets	=	round($rs['money'],2);
    $balance=	$assets-$bet_money_total;
}else{
    echo '<script type="text/javascript">alert("账户异常,请联系客服!");</script>';
    exit;
}
if($balance<0){ //投注后，用户余额不能小于0
    echo '<script type="text/javascript">alert("账户余额不足!");</script>';
    exit;
}
if(date("Y-m-d H:i:s",$fengpanTime) <= $bj_time_now && $bj_time_now <= date("Y-m-d H:i:s",$kaijiangTime) || $is_close == "true"){
    echo '<script type="text/javascript">alert("改投注已过时,请重新下注。");</script>';
    exit;
}

$max_money = common_class::getMaxMoney($userid);
$max_money_already = common_class::getMaxMoneyAlready($userid,$gType,$qishu);

if($max_money > 0 && ($max_money_already+$bet_money_total)>$max_money){
    echo '<script type="text/javascript">alert("超过当期下注最大金额，请联系管理人员。");</script>';
    exit;
}

//生成主单以及一些信息
//生成图片
function str_leng($str){ //取字符串长度
    mb_internal_encoding("UTF-8");
    return mb_strlen($str)*12;
}

$lottery_number = $qishu;
$sql	=	"insert into order_lottery(user_id,Gtype,rtype_str,rtype,bet_info,bet_money,win,lottery_number,bet_time)
                    values ('$userid','$gType','快速-北京PK拾','761','bet_info','$bet_money_total','0','$lottery_number','$bj_time_now')"; //新增一个投注项
$mysqli->query($sql);
$q1		=	$mysqli->affected_rows;
if($q1!=1){
    return false;
}
$id 	=	$mysqli->insert_id;
$datereg=	date("YmdHis").$id;

$sql		= 	"select money from user_list where user_id='$userid' limit 0,1";
$query 		=	$mysqli->query($sql);
$rs			=	$query->fetch_array();
$assets = $rs["money"];
$balance = $assets-$bet_money_total;

$sql	=	"update user_list set money=$balance where money>=$bet_money_total and $balance>=0 and user_id='$userid'";//扣钱
$mysqli->query($sql);
$q3		=	$mysqli->affected_rows;
if($q3!=1){
    $sql	=	"delete from order_lottery where id=$id";//操作失败，删除订单
    $mysqli->query($sql);
    return false;
}

$sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`) VALUES ('$userid','$datereg','$lottery_name',now(),'彩票下注','$bet_money_total','$assets','$balance');";
$mysqli->query($sql);
$q8		=	$mysqli->affected_rows;
$money_log_id		=	$mysqli->insert_id;
if($q8!=1){
    $sql	=	"delete from order_lottery where id=$id";//操作失败，删除订单
    $mysqli->query($sql);
    $sql	=	"update user_list set money=money+$bet_money_total where user_id='$userid'";//操作失败，还原客户资金
    $mysqli->query($sql);
    return false;
}

$sql	=	"update `order_lottery` set `order_num`='$datereg' where id='$id'"; //更新订单号
$mysqli->query($sql);
$q2		=	$mysqli->affected_rows;
if($q2!=1){
    $sql	=	"delete from order_lottery where id=$id";//操作失败，删除订单
    $mysqli->query($sql);
    $sql = "DROP TRIGGER BeforeDeleteUserList;";
    $mysqli->query($sql);
    $sql	=	"delete from money_log where id=$money_log_id";//操作失败，删除金钱记录
    $mysqli->query($sql);
    $sql = "
            CREATE TRIGGER `BeforeDeleteMoneyLog` BEFORE delete ON `money_log`
              FOR EACH ROW BEGIN
                insert into money_log(id) values (old.id);
              END;
            ";
    $mysqli->query($sql);
    $sql	=	"update user_list set money=money+$bet_money_total where user_id='$userid'";//操作失败，还原客户资金
    $mysqli->query($sql);
    return false;
}
$sql_sub		= "select * from odds_lottery
            where lottery_type='北京PK拾' and sub_type='主盘势' order by id asc";
$query_sub 		=	$mysqli->query($sql_sub);
$s 			= 1;
while ($odds_sub = $query_sub->fetch_array()) {
    $rs_sub[$s] = $odds_sub;
    $s++;
}
$sql		= "select * from odds_lottery
            where lottery_type='北京PK拾' and sub_type in('定位','冠亚军和-快速') order by id asc";
$query		= $mysqli->query($sql);
$list 		= array();
$s 			= 1;
while ($odds = $query->fetch_array()) {
    for($i = 1; $i<22; $i++){
        $list[$s][$i] = $odds['h'.$i];
    }
    if($s<11){
        $list[$s][11] = $rs_sub[$s]['h1'];
        $list[$s][12] = $rs_sub[$s]['h2'];
        $list[$s][13] = $rs_sub[$s]['h3'];
        $list[$s][14] = $rs_sub[$s]['h4'];
        $list[$s][15] = $rs_sub[$s]['h5'];
        $list[$s][16] = $rs_sub[$s]['h6'];
    }
    $s++;
}
for ($i = 0; $i < count($datas); $i++){
    //分割键名，取ball_后的数字，来判断属于第几球
    $qiu	= explode("_",$names[$i]);
    $qiuhao = $ball_name['qiu_'.$qiu[1]];
    if( $qiu[1] == 11 ){
        $wanfa	= $ball_name_h['ball_'.$qiu[2].''];
        $number = $wanfa;
    }else{
        $wanfa	= $ball_name['ball_'.$qiu[2].''];
        $number = $wanfa;
    }
    $money	= $datas[''.$names[$i].''];
    $odds = $list[$qiu[1]][$qiu[2]];

    $bet_rate = $odds;
    $bet_money_one = $money;
    $win_money = $bet_money_one*$odds;
    $win_money_total += $win_money;
    $fs_money = 0;

    //获取反水
    $sql   =	"select g.* from user_group g,user_list u
                                where u.user_id='$userid' and g.group_id=u.group_id limit 0,1";
    $query = $mysqli->query($sql);
    $fsRow   =	$query->fetch_array();
    if($bet_money_one >= $fsRow[strtolower($gType).'_bet']){
        $fs_money = $bet_money_one*$fsRow[strtolower($gType).'_bet_reb'];
    }

    $sql	=	"insert into order_lottery_sub (order_num,quick_type,number,bet_rate,bet_money,win,fs,balance)
                                 value ('$datereg','$qiuhao','$number','$bet_rate','$bet_money_one','$win_money','$fs_money','$balance')";
	$sub_sql = $sql;
    $mysqli->query($sql);
    $q4		=	$mysqli->affected_rows;
    $id_sub 	=	$mysqli->insert_id;
    $datereg_sub=	date("YmdHis").$id_sub;

    $sql	=	"update `order_lottery_sub` set `order_sub_num`='$datereg_sub' where id='$id_sub'"; //更新订单号
    $mysqli->query($sql);
    $q2		=	$mysqli->affected_rows;
    if($q4!=1 || $q2!=1){
        $sql	=	"delete from order_lottery_sub where order_num='$datereg'";//操作失败，删除子订单
        $mysqli->query($sql);
        $sql	=	"delete from order_lottery where id=$id";//操作失败，删除订单
        $mysqli->query($sql);
        $sql = "DROP TRIGGER BeforeDeleteUserList;";
        $mysqli->query($sql);
        $sql	=	"delete from money_log where id=$money_log_id";//操作失败，删除金钱记录
        $mysqli->query($sql);
        $sql = "
            CREATE TRIGGER `BeforeDeleteMoneyLog` BEFORE delete ON `money_log`
              FOR EACH ROW BEGIN
                insert into money_log(id) values (old.id);
              END;
            ";
        $mysqli->query($sql);
        $sql	=	"update user_list set money=money+$bet_money_total where user_id='$userid'";//操作失败，还原客户资金
        $mysqli->query($sql);
        return false;
    }else{
        $C_Patch=$_SERVER['DOCUMENT_ROOT'];
        include_once($C_Patch."/app/member/utils/convert_name.php");
        include_once($C_Patch."/resource/lottery/getContentName.php");
        $tm=date("Y-m-d H:i:s",time());
        $height	=	26; //高
        $gTypeZhName = getZhPageTitle($gType);
        $betInfoIm = getName($number,$gType);
        $width	=	str_leng($gTypeZhName.'='.$lottery_number.'='.$qiuhao.'='.$betInfoIm.'='.$bet_money_one.'='.$fs_money.'='.$bet_rate.'='.$tm); //宽
        $im		=	imagecreate($width,$height);
        $bkg	=	imagecolorallocate($im,255,255,255); //背景色
        $font	=	imagecolorallocate($im,150,182,151); //边框色
        $sort_c	=	imagecolorallocate($im,0,0,0); //字体色
        $name_c	=	imagecolorallocate($im,243,118,5); //字体色
        $guest_c=	imagecolorallocate($im,34,93,156); //字体色
        $info_c	=	imagecolorallocate($im,51,102,0); //字体色
        $money_c=	imagecolorallocate($im,255,0,0); //字体色
        $tm_c=	imagecolorallocate($im,0,0,0); //字体色
        $fnt	=	$C_Patch."/app/member/ttf/simhei.ttf";

        imagettftext($im,10,0,7,18,$sort_c,$fnt,$gTypeZhName); //彩票类别
        imagettftext($im,10,0,str_leng($gTypeZhName.'=='),18,$name_c,$fnt,$lottery_number); //彩票期号
        imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.'==='),18,$guest_c,$fnt,$qiuhao); //投注玩法
        imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$qiuhao.'===='),18,$info_c,$fnt,$betInfoIm); //投注内容
        imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$qiuhao.$betInfoIm.'====='),18,$info_c,$fnt,$bet_money_one); //交易金额
        imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$qiuhao.$betInfoIm.$bet_money_one.'======'),18,$money_c,$fnt,$fs_money); //反水
        imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$qiuhao.$betInfoIm.$bet_money_one.$fs_money.'======='),18,$money_c,$fnt,$bet_rate); //赔率
        imagettftext($im,10,0,str_leng($gTypeZhName.$lottery_number.$qiuhao.$betInfoIm.$bet_money_one.$fs_money.$bet_rate.'========'),18,$tm_c,$fnt,$tm); //交易时间
        imagerectangle($im,0,0,$width-1,$height-1,$font); //画边框
        if(!is_dir($C_Patch."\\../order/".substr($datereg_sub,0,8))) mkdir($C_Patch."\\../order/".substr($datereg_sub,0,8));
        imagejpeg($im,$C_Patch."\\../order/".substr($datereg_sub,0,8)."/$datereg_sub.jpg"); //生成图片
        imagedestroy($im);
    }
}
$sql	=	"update `order_lottery` set `win`='$win_money_total' where id='$id'"; //更新订单号
$mysqli->query($sql);

$sql	=	"select id from `order_lottery_sub` where `order_num`='$datereg'"; //验证子订单是否有存在
$query = $mysqli->query($sql);
$q_sub   =	$query->fetch_array();
if(!($q_sub && $q_sub["id"])){
    $sql	=	"delete from order_lottery where id=$id";//操作失败，删除订单
    $mysqli->query($sql);
    $sql = "DROP TRIGGER BeforeDeleteUserList;";
    $mysqli->query($sql);
    $sql	=	"delete from money_log where id=$money_log_id";//操作失败，删除金钱记录
    $mysqli->query($sql);
    $sql = "
            CREATE TRIGGER `BeforeDeleteMoneyLog` BEFORE delete ON `money_log`
              FOR EACH ROW BEGIN
                insert into money_log(id) values (old.id);
              END;
            ";
    $mysqli->query($sql);
    $sql	=	"update user_list set money=money+$bet_money_total where user_id='$userid'";//操作失败，还原客户资金
    $mysqli->query($sql);
    return false;
}

$mysqli->close();
echo '<script type="text/javascript">alert("操作成功。");</script>';
exit;