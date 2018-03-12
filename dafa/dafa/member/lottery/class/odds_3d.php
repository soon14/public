<?php
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/com_chk.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/utils/convert_name.php");
include_once($C_Patch."/app/member/utils/time_util.php");
include_once($C_Patch."/app/member/class/lottery_schedule.php");
include_once($C_Patch."/app/member/class/odds_lottery_normal.php");
include_once($C_Patch."/app/member/class/user_group.php");
include_once($C_Patch."/app/member/cache/ltConfig.php");
$gType = "D3";
include_once($C_Patch."/member/b3/b3_util.php");
//开始读取赔率
$sql		= "select * from odds_lottery_normal
            where lottery_type='3D彩' and sub_type in('佰定位','拾定位','个定位','总和龙虎和','3连','跨度')
            order by id asc";
$query		= $mysqli->query($sql);
//获取两面
$sql_sub		= "select * from odds_lottery_normal
            where lottery_type='3D彩' and sub_type='两面' ";
$query_sub 		=	$mysqli->query($sql_sub);
$rs_sub			=	$query_sub->fetch_array();
$list 		= array();
$s 			= 1;
while ($odds = $query->fetch_array()) {
	for($i = 1; $i<11; $i++){
        $list['ball'][$s][$i] = $odds['h'.($i-1)];
    }
    if($s<4){
        $ss = $s*6;
        $list['ball'][$s][11] = $rs_sub['h'.($ss-6)];
        $list['ball'][$s][12] = $rs_sub['h'.($ss-5)];
        $list['ball'][$s][13] = $rs_sub['h'.($ss-4)];
        $list['ball'][$s][14] = $rs_sub['h'.($ss-3)];
    }
	$s++;
}
//开始读取期数
$arr = array(
    'number' => $qishu,
	'endtime' => $differTime,
	'opentime' => $differTime+1800,
	'isopen' => $differTime>-10,
	'oddslist' => $list,
	'min_money' => $lowestMoney,
	'max_money' => $maxMoney,
);
$json_string = json_encode($arr);
echo $json_string;
$mysqli->close();