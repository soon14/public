<?
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-cache, must-revalidate");      
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");
include "include/com_chk.php";
include "include/address.mem.php";
include "cache/website.php";

echo "<script>if(self == top) parent.location='".BROWSER_IP."'</script>\n";


include_once("cache/zqgq.php");
if(time()-$lasttime > 10){ //超时
	$zq_gq_count = 0;
}else{
	$zq_gq_count = count($zqgq);
}
include_once("cache/lqgq.php");
if(time()-$lasttime > 10){ //超时
	$lq_gq_count = 0;
}else{
	$lq_gq_count = count($lqgq);
}
	//$zq_gq_count = count($zqgq);
	//$lq_gq_count = count($lqgq);
	$tgq_count	=$zq_gq_count+$lq_gq_count;

	//足球-单式
	$sql_count	=	"SELECT count(*) as s FROM Bet_Match  WHERE Match_Type=1 AND Match_CoverDate>'".$et_time_now."' AND Match_Date='".date("m-d",$et_time)."' and Match_HalfId is not null";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$zq_ds_count=$rs_count['s'];

	//总入球
	$sql_count	=	"SELECT count(*) as s FROM Bet_Match  WHERE Match_Type=1 AND Match_IsShowt=1 and Match_Total01Pl>0 and Match_CoverDate>'".$et_time_now."' AND Match_Date='".date("m-d",$et_time)."'";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$zq_zrq_count=$rs_count['s'];

	//足球-波胆
	$sql_count	=	"SELECT count(*) as s FROM Bet_Match  WHERE Match_Type=1 AND Match_IsShowt=1 and Match_Bd21>0 and Match_CoverDate>'".$et_time_now."' ";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$zq_bd_count=$rs_count['s'];

	//足球-上半波胆
	$sql_count	=	"SELECT count(*) as s FROM Bet_Match  WHERE Match_Type=1 AND Match_IsShowt=1 and Match_Hr_Bd21>0 and Match_CoverDate>'".$et_time_now."' ";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$zq_hr_bd_count=$rs_count['s'];

	//足球-半全场
	$sql_count	=	"SELECT count(*) as s FROM Bet_Match  WHERE Match_Type=1 AND Match_BqMM>0 and Match_CoverDate>'".$et_time_now."' AND Match_Date='".date("m-d",$et_time)."'";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$zq_bqc_count=$rs_count['s'];


	//足球早餐-单式
	$sql_count	=	"SELECT count(*) as s FROM Bet_Match  WHERE Match_Type=0 AND Match_CoverDate>'".$et_time_now."' and match_date!='".date("m-d",$et_time)."' and Match_HalfId is not null" ;
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$zq_hds_count=$rs_count['s'];

	//足球早餐 总入球
	$sql_count	=	"SELECT count(*) as s FROM Bet_Match  WHERE Match_Type=0 AND Match_IsShowt=1 and Match_Total01Pl>0 and Match_CoverDate>'".$et_time_now."' ";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$zq_hzrq_count=$rs_count['s'];

	//足球早餐-波胆
	$sql_count	=	"SELECT count(*) as s FROM Bet_Match  WHERE Match_Type=0 AND Match_IsShowt=1 and Match_Bd21>0 and Match_CoverDate>'".$et_time_now."' ";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$zq_hbd_count=$rs_count['s'];

	//足球早餐-上半场波胆
	$sql_count	=	"SELECT count(*) as s FROM Bet_Match  WHERE Match_Type=0 AND Match_IsShowt=1 and Match_Hr_Bd21>0 and Match_CoverDate>'".$et_time_now."' ";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$zq_hr_hbd_count=$rs_count['s'];

	//足球早餐-半全场
	$sql_count	=	"SELECT count(*) as s FROM Bet_Match  WHERE Match_Type=0 AND Match_BqMM>0 and Match_CoverDate>'".$et_time_now."'";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$zq_hbqc_count=$rs_count['s'];

	//足球-冠军
	$sql_count	=	"SELECT count(*) as s FROM t_guanjun  WHERE game_type='FT' and match_type=1 and Match_CoverDate>'".$et_time_now."' AND x_result is null";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$zq_gj_count=$rs_count['s'];

	//足球-结果
	$sql_count	=	"SELECT count(*) as s FROM Bet_Match where match_Date='".date("m-d",$et_time)."' and (MB_Inball is not null or MB_Inball_HR is not NULL) and (match_js=1 or match_sbjs=1)";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$zq_r_count=$rs_count['s'];


	//-----------------------------------------

	//篮美-单式
	$sql	=	"SELECT count(*) as s FROM lq_match WHERE Match_CoverDate>'".$et_time_now."' AND Match_Date='".date("m-d",$et_time)."'";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$lm_ds	=	$rs['s'];
	
	//篮美-单节
	$sql	=	"SELECT count(*) as s FROM lq_match WHERE Match_Type=3 AND Match_CoverDate>='".$et_time_now."' AND Match_Date='".date("m-d",$et_time)."'";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$lm_dj	=	$rs['s'];
	
	//篮美-冠军
	$sql_count	=	"SELECT count(*) as s FROM t_guanjun  WHERE game_type='BK' and match_type=1 and Match_CoverDate>'".$et_time_now."' AND x_result is null";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$lm_gj=$rs_count['s'];

	//篮美-结果
	$sql	=	"SELECT count(*) as s FROM lq_match WHERE MB_Inball_OK is not null and  match_Date='".date("m-d",$et_time)."' and match_js=1";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$lm_jg	=	$rs['s'];
	
	
	//篮美早餐-单式
	$sql	=	"SELECT count(*) as s FROM lq_match WHERE Match_Type!=3 AND Match_CoverDate>'".$et_time_now."' AND Match_Date!='".date("m-d",$et_time)."'";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$lmzc_ds=	$rs['s'];
	
	//篮美早餐-单节
	$sql	=	"SELECT count(*) as s FROM lq_match WHERE Match_Type=3 AND Match_CoverDate>'".$et_time_now."' AND Match_Date!='".date("m-d",$et_time)."'";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$lmzc_dj=	$rs['s'];


	//-------------------------------------------------------------------------------------------------------------------------
	//网球-单式
	$sql	=	"SELECT count(*) as s FROM tennis_match WHERE Match_Type=1 AND Match_CoverDate>'".$et_time_now."' AND Match_Date='".date("m-d",$et_time)."'";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$wq_ds	=	$rs['s'];

	//网球早餐-单式
	$sql	=	"SELECT count(*) as s FROM tennis_match WHERE Match_Type=1 AND Match_CoverDate>'".$et_time_now."' AND Match_Date!='".date("m-d",$et_time)."'";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$wqzc_ds	=	$rs['s'];


	//网球-冠军
	$sql_count	=	"SELECT count(*) as s FROM t_guanjun  WHERE game_type='TN' and match_type=1 and Match_CoverDate>'".$et_time_now."' AND x_result is null";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$wq_gj=$rs_count['s'];


	//网球-结果
	$sql	=	"SELECT count(*) as s FROM tennis_match where MB_Inball is not null and  match_Date='".date("m-d",$et_time)."' and match_js=1";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$wq_jg	=	$rs['s'];


	//--------------------------------------------------------------------------------------------------------------------------------

	//排球-单式 
	$sql	=	"SELECT count(*) as s FROM  volleyball_match WHERE Match_Type=1 AND Match_CoverDate>'".$et_time_now."' AND Match_Date='".date("m-d",$et_time)."'";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$pq_ds	=	$rs['s'];

	//排球早餐-单式 
	$sql	=	"SELECT count(*) as s FROM  volleyball_match WHERE Match_Type=1 AND Match_CoverDate>'".$et_time_now."' AND Match_Date!='".date("m-d",$et_time)."'";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$pqzc_ds	=	$rs['s'];
	
	
	//排球-冠军
	$sql_count	=	"SELECT count(*) as s FROM t_guanjun  WHERE game_type='VB' and match_type=1 and Match_CoverDate>'".$et_time_now."' AND x_result is null";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$pq_gj=$rs_count['s'];

	//排球-结果
	$sql	=	"SELECT count(*) as s FROM volleyball_match where MB_Inball is not null and  match_Date='".date("m-d",$et_time)."' and match_js=1";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$pq_jg	=	$rs['s'];

	//---------------------------------------------------------------------------------------------------------------------------------

	//棒球-单式 
	$sql	=	"SELECT count(*) as s FROM baseball_match WHERE Match_Type=1 AND Match_CoverDate>'".$et_time_now."' 
	AND Match_Date='".date("m-d",$et_time)."'";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$bq_ds	=	$rs['s'];

	//棒球早餐-单式 
	$sql	=	"SELECT count(*) as s FROM baseball_match WHERE Match_Type=1 AND Match_CoverDate>'".$et_time_now."' 
	AND Match_Date!='".date("m-d",$et_time)."'";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$bqzc_ds	=	$rs['s'];

	//棒球-冠军
	$sql_count	=	"SELECT count(*) as s FROM t_guanjun  WHERE game_type='BS' and match_type=1 and Match_CoverDate>'".$et_time_now."' AND x_result is null";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$bq_gj=$rs_count['s'];

	
	//棒球-结果 
	$sql	=	"SELECT count(*) as s FROM baseball_match WHERE MB_Inball is not null and  match_Date='".date("m-d",$et_time)."' and match_js=1";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$bq_jg	=	$rs['s'];

	//--------------------------------------------------------------------------------------------------------------------
	//冠军-冠军 
	$sql	=	"SELECT count(*) as s FROM t_guanjun WHERE Match_CoverDate>'".$et_time_now."' and x_result is null and match_type=1";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$gj_gj	=	$rs['s'];
	
	//冠军-冠军结果 
	$sql	=	"SELECT count(*) as s FROM t_guanjun where x_result is not null and match_type=1 and match_date='".date("Y-m-d",$et_time)."'";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$gj_jg	=	$rs['s'];

	//-------------------------------------------------------------------------------------------------------------------------
	//其他-单式
	$sql	=	"SELECT count(*) as s FROM other_match WHERE Match_Type=1 AND Match_CoverDate>'".$et_time_now."' AND Match_Date='".date("m-d",$et_time)."'";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$qt_ds	=	$rs['s'];

	//其他早餐-单式
	$sql	=	"SELECT count(*) as s FROM other_match WHERE Match_Type=1 AND Match_CoverDate>'".$et_time_now."' AND Match_Date!='".date("m-d",$et_time)."'";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$qtzc_ds	=	$rs['s'];


	//其他-冠军
	$sql_count	=	"SELECT count(*) as s FROM t_guanjun  WHERE game_type='OP' and match_type=1 and Match_CoverDate>'".$et_time_now."' AND x_result is null";
	$query_count	=	$mysqli->query($sql_count);
	$rs_count		=	$query_count->fetch_array();
	$qt_gj=$rs_count['s'];


	//其他-结果
	$sql	=	"SELECT count(*) as s FROM other_match where MB_Inball is not null and  match_Date='".date("m-d",$et_time)."' and match_js=1";
	$query	=	$mysqli->query($sql);
	$rs		=	$query->fetch_array();
	$qt_jg	=	$rs['s'];


	//--------------------------------------------------------------------------------------------------------------------------------

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>left_sport</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="/cl/template/bbin/public/css/left.css" rel="stylesheet" type="text/css" />
	<script language="javascript" src="/cl/js/jquery-1.7.2.min.js"></script>
	<script language="javascript" src="/cl/js/pluging/jquery.form.js"></script>
	<script language="JavaScript" type="text/javascript" src="/cl/js/commJS/menu/menu.js"></script>
	<script type="text/javascript" language="javascript" src="/cl/js/sport/touzhu.js?v=36"></script>

	<script type="text/javascript" language="javascript" src="/cl/js/common.js"></script>
    <style type="text/css">
<!--
body {
	margin-left: 0px;
}
#subnav span.nav{ background:#FFECDE !important; }
#subnav span.nav a:hover{
	color: #783218 !important;
	background:#FFFFDE !important;
}
-->
</style>
<script type="text/javascript">
var M={'0':[],'1':[],'2':[],'3':[],'4':[],'5':[],'6':[],'7':[]};

//M['1']={'E':'508','T':'424','L':'6','E_1X2':'317','E_CS':'161','E_OETG':'342','E_HTFT':'161','E_FGLG':'161','T_1X2':'304','T_CS':'149','T_OETG':'314','T_HTFT':'149','T_FGLG':'149','P':'245','OT':'101','TV':'0','LP':'1','EP':'148'};
//足球 
//E 早盤  T 今日 L 滾球
//A:独赢&让球&大小,B:波胆,C:单 / 双 & 总入球,D:半场 / 全场,E:混合过关,F:冠軍,G:上半场波胆,R:赛果
M['1']={'E':'1','T':'1','L':'<?=$zq_gq_count?>','R':'<?=$zq_r_count;?>','E_A':'<?=$zq_hds_count;?>','E_B':'<?=$zq_hbd_count?>','E_C':'<?=$zq_hzrq_count?>','E_D':'<?=$zq_hbqc_count?>','E_E':'<?=$zq_hds_count;?>','E_F':'<?=$zq_gj_count;?>','E_G':'<?=$zq_hr_hbd_count;?>','T_A':'<?=$zq_ds_count;?>','T_B':'<?=$zq_bd_count?>','T_C':'<?=$zq_zrq_count?>','T_D':'<?=$zq_bqc_count?>','T_E':'<?=$zq_ds_count;?>','T_F':'<?=$zq_gj_count;?>','T_G':'<?=$zq_hr_bd_count?>'};
//籃球 
//E 早盤  T 今日 L 滾球
//A:让球&大小&单/双,B:混合过关,C:冠軍,R:赛果
M['2']={'E':'1','T':'1','L':'<?=$lq_gq_count?>','R':'<?=$lm_jg?>','E_A':'<?=$lmzc_ds?>','E_B':'<?=$lmzc_ds?>','E_C':'<?=$lm_gj?>','E_D':'<?=$lmzc_dj?>','T_A':'<?=$lm_ds?>','T_B':'<?=$lm_ds?>','T_C':'<?=$lm_gj?>','T_D':'<?=$lm_dj?>'};
//網球
//E 早盤  T 今日 L 滾球
//A:独赢&让盘&大小&单/双,B:赛盘投注,C:混合过关,D:冠軍,R:赛果
//M['3']={'E':'3','T':'33','L':'333','R':'30','E_A':'31','E_B':'32','E_C':'33','E_D':'34','T_A':'35','T_B':'36','T_C':'37','T_D':'38'};
M['3']={'E':'1','T':'1','R':'<?=$wq_jg?>','E_A':'<?=$wqzc_ds?>','E_D':'<?=$wq_gj?>','T_A':'<?=$wq_ds?>','T_D':'<?=$wq_gj?>'};
//排球
//E 早盤  T 今日 L 滾球
//A:独赢&让分&大小&单/双,B:赛盘投注,C:混合过关,D:冠軍,R:赛果
M['4']={'E':'1','T':'1','R':'<?=$pq_jg?>','E_A':'<?=$pqzc_ds?>','E_D':'<?=$pq_gj?>','T_A':'<?=$pq_ds?>','T_D':'<?=$pq_gj?>'};
//棒球
//E 早盤  T 今日 L 滾球
//A:独赢&让分&大小&单/双,B:混合过关,C:冠軍,R:赛果
M['5']={'E':'1','T':'1','R':'<?=$bq_jg?>','E_A':'<?=$bqzc_ds?>','E_C':'<?=$bq_gj?>','T_A':'<?=$bq_ds?>','T_C':'<?=$bq_gj?>'};
//冠军
//E 早盤  T 今日 L 滾球
//A:独赢&让球&大小&单/双,B:混合过关,C:冠軍,R:赛果
M['6']={'E':'1','T':'1','R':'<?=$gj_jg?>','E_A':'<?=$gj_gj?>','T_A':'<?=$gj_gj?>'};
//其他
//E 早盤  T 今日 L 滾球
//A:独赢&让盘&大小&单/双,B:赛盘投注,C:混合过关,D:冠軍,R:赛果
M['7']={'E':'1','T':'1','R':'<?=$qt_jg?>','E_A':'<?=$qtzc_ds?>','E_D':'<?=$qt_gj?>','T_A':'<?=$qt_ds?>','T_D':'<?=$qt_gj?>'};


M['0']={'TV':'0','TotalLive':'<?=$tgq_count?>','TotalToday':'1','TotalEarly':'1'};
//TotalLive滾球 

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//--------Site Const---------------
var SiteMode = 2;
var UserLang = "cn";
var IsLogin = false;
//--------Odds Display---------------
var DisplayMode = '3';
//--------Menu---------------
var LastSelectedSport = -1;//-1;
var LastSelectedMArket = null;
var LastSelectedMenu=0; // Default All
//--------Racing---------------
var CanSeeHorse=false;
var CanSeeGreyhounds=false;
var CanSeeHarness=false;
//--------Number Game---------------
var CanSeeNumberGame=true;
//--------SitePermission--------
var IsCssControl=false;
var IsNewDropdownList=false;
//--------Virtual sport------------
var CanSeeVirtualSports=false;
var CanBetVirtualSports=false;
var CanSeeSportStreaming=false;

var imgSrc = '/cl/template/bbin/cs/images/before/';




//足球
//独赢&让球&大小
var LINK_1_A="";
//波膽
var LINK_1_B="";
//单 / 双 & 总入球
var LINK_1_C="";
//半场 / 全场
var LINK_1_D="";
//混合过关
var LINK_1_E="";
//冠軍
var LINK_1_F="";
//上半场波膽
var LINK_1_G="";
//結果
var LINK_1_R="";


//篮球
//让球&大小&单/双
var LINK_2_A="";
//混合过关
var LINK_2_B="";
//冠军
var LINK_2_C="";
//单节
var LINK_2_D="";
//结果
var LINK_2_R="";


//网球
//独赢&让盘&大小&单/双
var LINK_3_A="";
//冠军
var LINK_3_D="";
//结果
var LINK_3_R="";

//排球
//独赢&让盘&大小&单/双
var LINK_4_A="";
//冠军
var LINK_4_D="";
//结果
var LINK_4_R="";

//棒球
//独赢&让盘&大小&单/双
var LINK_5_A="";
//冠军
var LINK_5_C="";
//结果
var LINK_5_R="";

//冠军
//
var LINK_6_A="";
//结果
var LINK_6_R="";

//其他
//独赢&让盘&大小&单/双
var LINK_7_A="";
//冠军
var LINK_7_D="";
//结果
var LINK_7_R="";


//足球滚球
var LINK_L_1="<?=BROWSER_IP?>/app/member/show/FT_1_0.html";
//篮球滚球
var LINK_L_2="<?=BROWSER_IP?>/app/member/show/BK_1_0.html";

var game_type = "T";
function ins_url()
{
	if(game_type=="T")//今日賽事
	{
		
		//独赢&让球&大小
		LINK_1_A="<?=BROWSER_IP?>/app/member/show/FT_1_1.html";
		//波膽
		LINK_1_B="<?=BROWSER_IP?>/app/member/show/FT_1_4.html";
		//单 / 双 & 总入球
		LINK_1_C="<?=BROWSER_IP?>/app/member/show/FT_1_2.html";
		//半场 / 全场
		LINK_1_D="<?=BROWSER_IP?>/app/member/show/FT_1_3.html";
		//混合过关
		LINK_1_E="<?=BROWSER_IP?>/app/member/show/FT_1_1.html";
		//冠軍
		LINK_1_F="<?=BROWSER_IP?>/app/member/show/champion_FT.html";
		//上半场波膽
		LINK_1_G="<?=BROWSER_IP?>/app/member/show/FT_1_5.html";
		//結果
		LINK_1_R="<?=BROWSER_IP?>/app/member/show/result/football.php";

		//篮球
		//让球&大小&单/双
		LINK_2_A="<?=BROWSER_IP?>/app/member/show/bk_1_1.html";
		//混合过关
		LINK_2_B="<?=BROWSER_IP?>/app/member/show/bk_1_1.html";
		//冠军
		LINK_2_C="<?=BROWSER_IP?>/app/member/show/champion_bk.html";
		//单节
		LINK_2_D="<?=BROWSER_IP?>/app/member/show/bk_1_2.html";
		//结果
		LINK_2_R="<?=BROWSER_IP?>/app/member/show/result/basketball.php";

		//网球
		//独赢&让盘&大小&单/双
		LINK_3_A="<?=BROWSER_IP?>/app/member/show/tennis.html";
		//冠军
		LINK_3_D="<?=BROWSER_IP?>/app/member/show/champion_TN.html";
		//结果
		LINK_3_R="<?=BROWSER_IP?>/app/member/show/result/tennis.php";

		//排球
		//独赢&让盘&大小&单/双
		LINK_4_A="<?=BROWSER_IP?>/app/member/show/VolleyBall.html";
		//冠军
		LINK_4_D="<?=BROWSER_IP?>/app/member/show/champion_VB.html";
		//结果
		LINK_4_R="<?=BROWSER_IP?>/app/member/show/result/VolleyBall.php";

		//棒球
		//独赢&让盘&大小&单/双
		LINK_5_A="<?=BROWSER_IP?>/app/member/show/BaseBall.html";
		//冠军
		LINK_5_C="<?=BROWSER_IP?>/app/member/show/champion_BS.html";
		//结果
		LINK_5_R="<?=BROWSER_IP?>/app/member/show/result/BaseBall.php";

		//冠军
		//独赢&让盘&大小&单/双
		LINK_6_A="<?=BROWSER_IP?>/app/member/show/Champion.html";
		//结果
		LINK_6_R="<?=BROWSER_IP?>/app/member/show/result/Champion.php";

		//其他
		//独赢&让盘&大小&单/双
		LINK_7_A="<?=BROWSER_IP?>/app/member/show/other.html";
		//冠军
		LINK_7_D="<?=BROWSER_IP?>/app/member/show/champion_OP.html";
		//结果
		LINK_7_R="<?=BROWSER_IP?>/app/member/show/result/other.php";

	}
	if(game_type=="E")//早盤
	{
		//独赢&让球&大小
		LINK_1_A="<?=BROWSER_IP?>/app/member/show/FT_2_1.html";
		//波膽
		LINK_1_B="<?=BROWSER_IP?>/app/member/show/FT_2_4.html";
		//单 / 双 & 总入球
		LINK_1_C="<?=BROWSER_IP?>/app/member/show/FT_2_2.html";
		//半场 / 全场
		LINK_1_D="<?=BROWSER_IP?>/app/member/show/FT_2_3.html";
		//混合过关
		LINK_1_E="<?=BROWSER_IP?>/app/member/show/FT_2_1.html";
		//冠軍
		LINK_1_F="<?=BROWSER_IP?>/app/member/show/champion_FT.html";
		//上半场波膽
		LINK_1_G="<?=BROWSER_IP?>/app/member/show/FT_2_5.html";
		//結果
		LINK_1_R="<?=BROWSER_IP?>/app/member/show/result/football.php";


		//篮球
		//让球&大小&单/双
		LINK_2_A="<?=BROWSER_IP?>/app/member/show/bk_2_1.html";
		//混合过关
		LINK_2_B="<?=BROWSER_IP?>/app/member/show/bk_2_1.html";
		//冠军
		LINK_2_C="<?=BROWSER_IP?>/app/member/show/champion_bk.html";
		//单节
		LINK_2_D="<?=BROWSER_IP?>/app/member/show/bk_2_2.html";
		//结果
		LINK_2_R="<?=BROWSER_IP?>/app/member/show/result/basketball.php";


		//网球
		//独赢&让盘&大小&单/双
		LINK_3_A="<?=BROWSER_IP?>/app/member/show/tennis_2.html";
		//冠军
		LINK_3_D="<?=BROWSER_IP?>/app/member/show/champion_TN.html";
		//结果
		LINK_3_R="<?=BROWSER_IP?>/app/member/show/result/tennis.php";


		//排球
		//独赢&让盘&大小&单/双
		LINK_4_A="<?=BROWSER_IP?>/app/member/show/VolleyBall_2.html";
		//冠军
		LINK_4_D="<?=BROWSER_IP?>/app/member/show/champion_VB.html";
		//结果
		LINK_4_R="<?=BROWSER_IP?>/app/member/show/result/VolleyBall.php";

		//棒球
		//独赢&让盘&大小&单/双
		LINK_5_A="<?=BROWSER_IP?>/app/member/show/BaseBall_2.html";
		//冠军
		LINK_5_C="<?=BROWSER_IP?>/app/member/show/champion_BS.html";
		//结果
		LINK_5_R="<?=BROWSER_IP?>/app/member/show/result/BaseBall.php";

		//冠军
		//独赢&让盘&大小&单/双
		LINK_6_A="<?=BROWSER_IP?>/app/member/show/Champion.html";
		//结果
		LINK_6_R="<?=BROWSER_IP?>/app/member/show/result/Champion.php";


		//网球
		//独赢&让盘&大小&单/双
		LINK_7_A="<?=BROWSER_IP?>/app/member/show/other_2.html";
		//冠军
		LINK_7_D="<?=BROWSER_IP?>/app/member/show/champion_OP.html";
		//结果
		LINK_7_R="<?=BROWSER_IP?>/app/member/show/result/other.php";
		
	}
	//alert(game_type + r);
	 
}
var touzhutype=0; //交易类型,是单式还是串关,0是单式 1是串关
function go_url(r,t)
{
	quxiao_bet();
	touzhutype=t;
	$("#touzhutype").val(t);
	window.parent.open(r,"bodyFrame"); 
}

</script>
<link rel="stylesheet" href="css/myleft.css" type="text/css" />
</head>
<body onload="initialMenu();">

	<div id="head_top">
		<div class="head_left">
		<?php
			if(!isset($_SESSION)){ session_start();}
			$uid = isset($_SESSION['uid'])? $_SESSION['uid'] : '';
			if( $uid ){
		?>	
			<p>您好，<?=$_SESSION["username"]?></p>
		<?php  }else{  ?>
			<p>您好，游客</p>
		<?php  } ?>
			<p id="todayTime">2016年 08月 12日 23:51</p>
		</div>
		<div class="head_right">
			
			
			<a href="javascript:;" class="bigtab" onclick="openMenu('cs'); LoadMenuData('L'); go_url(LINK_L_1,0);">滚球</a>
			<a href="javascript:;" class="active bigtab" onclick="openMenu('cs'); LoadMenuData('T'); go_url(LINK_1_A,0);">今日赛事</a>
			<a href="javascript:;" class="bigtab" onclick="openMenu('cs'); LoadMenuData('E'); go_url(LINK_1_A,0);">早盘</a>
			<!-- <a href="javascript:click_url('/member/zhenren/mylive.php');">视讯直播</a>
			<a href="javascript:click_url('/member/lottery/dzyy.php');">电子游艺</a>
			<a href="javascript:click_url('/member/lottery/Cqssc.php?1=1');">彩票游戏</a> -->
		</div>
	</div>

	<div id="head_bottom">
		<div class="money_reload">
			人民币 <span><?php
				$sql="SELECT money from user_list where user_name='".$_SESSION["username"]."'";
				$query_money=$mysqli->query($sql);
				$row=$query_money->fetch_array();
				if($row['money'])
					echo $row['money'];
				else 
					echo '0.00';
			?></span><span class="reload" onclick="location.reload();"></span>
		</div>

		<div class="bisai active"> <!-- 早盘 -->
			<div class="bisai_top">
				<a href="javascript:go_url(LINK_1_A,0);" class="active">足球<span id="1_Cnt"
                            class="tabcontor"></span></a>&nbsp;&nbsp;|
				<a href="javascript:go_url(LINK_2_A,0);">蓝球<span id="2_Cnt" class="tabcontor"></span></a>&nbsp;&nbsp;|
				<a href="javascript:go_url(LINK_3_A,0);">网球<span id="3_Cnt" class="tabcontor"></span></a>&nbsp;&nbsp;|
				<a href="javascript:go_url(LINK_4_A,0);">排球<span id="4_Cnt" class="tabcontor"></span></a>&nbsp;&nbsp;|
				<a href="javascript:go_url(LINK_5_A,0);">棒球<span id="5_Cnt" class="tabcontor"></span></a>&nbsp;&nbsp;|
				<a href="javascript:go_url(LINK_7_A,0);">其他<span id="7_Cnt" class="tabcontor"></span></a>&nbsp;&nbsp;|
				<a href="javascript:go_url(LINK_6_A,0);">冠军<span id="6_Cnt" class="tabcontor"></span></a>
			</div>

			<div class="bisai_bottom active"> <!-- 足球 -->
				<a href="javascript:go_url(LINK_1_A,0);" class="active">独赢&让球&大小<span id="1_A_Cnt" class="contor"></span></a>&nbsp;|&nbsp;
				<a href="javascript:go_url(LINK_1_B,0);">波胆<span id="1_B_Cnt" class="contor">20</span></a>&nbsp;&nbsp;|
				<a href="javascript:go_url(LINK_1_G,0);">上半场波胆<span id="1_G_Cnt" class="contor">20</span></a>&nbsp;&nbsp;|
				<a href="javascript:go_url(LINK_1_C,0);">总入球<span id="1_C_Cnt" class="contor">20</span></a>&nbsp;&nbsp;|
				<a href="javascript:go_url(LINK_1_D,0);">半场 / 全场<span id="1_D_Cnt" class="contor">20</span></a>&nbsp;&nbsp;|
				<a href="javascript:go_url(LINK_1_E,1);">混合过关<span id="1_E_Cnt" class="contor">20</span></a>&nbsp;&nbsp;|
				<a href="javascript:go_url(LINK_1_F,0);">优胜冠军<span id="1_F_Cnt" class="contor">0</span></a>
				<a href="javascript:go_url(LINK_1_R,0);">赛果<span id="1_R_Cnt" class="contor">0</span></a>
			</div> <!-- end 足球 -->

			<div class="bisai_bottom"> <!-- 篮球 -->
				<a href="javascript:go_url(LINK_2_A,0);" class="active">让球&大小&单/双<span id="2_A_Cnt" class="contor"></span></a>&nbsp;|&nbsp;
				<a href="javascript:go_url(LINK_2_D,0);">单节<span id="2_D_Cnt" class="contor"></span></a>&nbsp;&nbsp;|
				<a href="javascript:go_url(LINK_2_B,1);">混合过关<span id="2_B_Cnt" class="contor"></span></a>&nbsp;&nbsp;|
				<a href="javascript:go_url(LINK_2_C,0);">优胜冠军<span id="2_C_Cnt" class="contor"></span></a>
				<a href="javascript:go_url(LINK_2_R,0);">赛果<span id="2_R_Cnt" class="contor"></span></a>
			</div> <!-- end篮球 -->

			<div class="bisai_bottom"> <!-- 网球 -->
				<a href="javascript:go_url(LINK_3_A,0);" class="active">独赢&让盘&大小&单/双<span id="3_A_Cnt" class="contor"></span></a>&nbsp;|&nbsp;
				<a href="javascript:go_url(LINK_3_D,0);">优胜冠军<span id="3_D_Cnt" class="contor"></span></a>
				<a href="javascript:go_url(LINK_3_R,0);">赛果<span id="3_R_Cnt" class="contor"></span></a>
			</div> <!-- end网球 -->

			<div class="bisai_bottom"> <!-- 排球 -->
				<a href="javascript:go_url(LINK_4_A,0);" class="active">独赢&让分&大小&单/双<span id="4_A_Cnt" class="contor"></span></a>&nbsp;|&nbsp;
				<a href="javascript:go_url(LINK_4_D,0);">优胜冠军<span id="4_D_Cnt" class="contor"></span></a>
				<a href="javascript:go_url(LINK_4_R,0);">赛果<span id="4_R_Cnt" class="contor"></span></a>
			</div> <!-- end排球 -->

			<div class="bisai_bottom"> <!-- 棒球 -->
				<a href="javascript:go_url(LINK_5_A,0);" class="active">独赢&让分&大小&单/双<span id="5_A_Cnt" class="contor"></span></a>&nbsp;|&nbsp;
				<a href="javascript:go_url(LINK_5_C,0);">优胜冠军<span id="5_C_Cnt" class="contor"></span></a>
				<a href="javascript:go_url(LINK_5_R,0);">赛果<span id="5_R_Cnt" class="contor"></span></a>
			</div> <!-- end棒球 -->

			<div class="bisai_bottom"> <!-- 其他 -->
				<a href="javascript:go_url(LINK_7_A,0);" class="active">独赢&让分&大小&单/双<span id="7_A_Cnt" class="contor"></span></a>&nbsp;|&nbsp;
				<a href="javascript:go_url(LINK_7_D,0);">优胜冠军<span id="7_D_Cnt" class="contor"></span></a>
				<a href="javascript:go_url(LINK_7_R,0);">赛果<span id="7_R_Cnt" class="contor"></span></a>
			</div> <!-- end其他 -->

			<div class="bisai_bottom"> <!-- 冠军 -->
				<a href="javascript:go_url(LINK_6_A,0);" class="active">综合冠军<span id="6_A_Cnt" class="contor"></span></a>&nbsp;|&nbsp;
				<a href="javascript:go_url(LINK_6_R,0);">冠军赛果<span id="6_R_Cnt" class="contor"></span></a>
				<a href="javascript:;"></a>
			</div> <!-- end冠军 -->

		</div><!-- end 早盘 -->

	

		<div class="bisai"><!-- 滚球 -->
			<div class="bisai_top active">
				<a href="javascript:go_url(LINK_L_1,0);" class="active">足球</a><span id="L_1_Cnt" class="tabcontor"></span>&nbsp;&nbsp;|
				<a href="javascript:go_url(LINK_L_2,0);">蓝球</a><span id="L_2_Cnt" class="tabcontor"></span>
			</div>
		</div><!-- end 滚球 -->

	</div>
	<script type="text/javascript" src="js/myleft.js"></script>




	<div id="bet_div"  style=" display:none; margin:0">
		<div id="left" class="bet_div">
			<div class="match_bet">体育快速交易</div>
			<div id="left_ids"></div>
			
			<div class="touzhu_2" id="usersid">
			<div class="touzhu_3">会员帐号：<?=$username?></div>
			<div class="touzhu_3">可用额度：<span class="red" id="user_money">0</span></div>
			</div>
			<form action="bet.php" name="form1" id="form1" method="post" onsubmit="if($('#cg_msg').css('display')!='none') {if (parseInt($('#cg_num').html(),10)>=3) {return check_bet();}else{alert('投注失败，请至少选择三场比赛后再进行投注！');return false;}}else{return check_bet();}" style="margin:0 0 0 0;">
			<input type="hidden" name="touzhutype" id="touzhutype" value="0" />
			<div class="touzhu_4" id="cg_msg" style="display:none;">已选择<span id="cg_num"></span>场赛事</div>
			
			  
			<div id="touzhudiv" style="display:block;"></div>
			<div id="orderok"></div>
			<div id="post_s" style="display:none;color:#FF0000; text-align:center;" >正在提交数据...</div>   
			<div>
			<div id="okclose" style="display:block;">
			<div class="touzhu_3">交易金额：<input type="text" class="tou_input" name="bet_money" id="bet_money" autocomplete="off" maxlength="8" onkeypress="if((event.keyCode<48 || event.keyCode>57))event.returnValue=false"  onkeydown="if(event.keyCode==13)return check_bet();" onpaste="return false" oncontextmenu="return false" oncopy="return false" oncut="return false" size="8"/></div>
			<div class="touzhu_3">可赢金额：<span id="win_span" class="tou_red2">0.00</span><input type="hidden" value="0" name="bet_win" id="bet_win"  /></div>
			<div class="touzhu_3">最低限额：<span id="min_point_span">0</span></div>
				<div id="istz" style="color:#FF0000; text-align:center;">
					可赢金额：<span id="win_span1">0.00</span><br>是否确定交易？
				</div>        
			</div>
			</div>
			<br>
			<div style="display:block;text-align:center;margin-bottom: 8px;" id="okbtn">
			<input 	name="" style="background-color: red;color:#ffffff;" type="button" onclick="quxiao_bet()" value="取消"/>　　
			<input id="submit_from" name="submit_from" style="background-color: #2a509f;color:#ffffff;" type="submit" value="确认交易"/>
			</div>
			<div style="display:none;text-align:center;" id="closebtn">
			<input class="toua_3"	name="" type="button" onclick="quxiao_bet()" value=""/>　　
			</div>

			</form>
		</div>
		<br>
		<br>
	 </div>
    <!--sport menu-->
    <style>	
		#subnav_head{ display: none !important; }
    </style>
    <div class="item" id="subnav_head" style="background:url(/imgs/div_left_16.gif) center center repeat-x !important; width:100% !important;margin-top:5px; " >
        <table width="100%">
            <tr>
                <td class="itemrdon" id="market_E_head">
                    <a href="javascript:;" onclick="openMenu('cs'); LoadMenuData('E'); go_url(LINK_1_A,0);"><span id="market_E_text" style="color:#000;">
                        早餐</span></a>
                </td>
                <td width="2" class="sub_itemline">
                </td>
                <td class="itemrd" id="market_T_head">
                    <a href="javascript:;" onclick="openMenu('cs'); LoadMenuData('T'); go_url(LINK_1_A,0);"><span id="market_T_text">
                        今日</span></a>
                </td>
                <td width="2" class="sub_itemline">
                </td>
                <td class="itemrd" id="market_L_head">
                    <a href="javascript:;" onclick="openMenu('cs'); LoadMenuData('L'); go_url(LINK_L_1,0);">
                        <span id="market_L_text" style="color:#000;">滚球</span><span id="market_L_head_Cnt"></span></a>
                </td>
            </tr>
        </table>
    </div>
    <!--Today and Early-->
    <div id="subnav" style="width:100% !important;display: none;">
        <table id="market_body" width="100%" style='display: none'>
            <!-- BEGIN MenuDetail -->
            
            <!--Soccer-->
            <tbody id='1_head'>
                <tr>
                    <td>
                        <span class="nav"><a href="JavaScript:SwitchSport('','1')">足球 <span id="1_Cnt"
                            class="tabcontor"></span>
                            <img id="img_1_LV" src="/cl/template/bbin/public/images/layout/icon_live.gif" width="30" height="12"
                                border="0" style="position: absolute; left: 140px; margin-top: 6px;" />
                        </a></span>
                    </td>
                </tr>
            </tbody>
            <tbody id='1_body'>
                <tr id="1_A">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a target="_self" onclick="go_url(LINK_1_A,0);" href="javascript:void(0);"><span class="submenu" style="cursor:pointer;">独赢&让球&大小</span>
                                <span id="1_A_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
                <tr id="1_B">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a target="_self" onclick="go_url(LINK_1_B,0);" href="javascript:void(0);"><span class="submenu" style="cursor:pointer;">波胆</span>
                                <span id="1_B_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
				<tr id="1_G">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a target="_self" onclick="go_url(LINK_1_G,0);" href="javascript:void(0);"><span class="submenu" style="cursor:pointer;">上半场波胆</span>
                                <span id="1_G_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
                <tr id="1_C">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a target="_self" onclick="go_url(LINK_1_C,0);" href="javascript:void(0);"><span class="submenu" style="cursor:pointer;">总入球</span>
                                <span id="1_C_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
                <tr id="1_D">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a target="_self" onclick="go_url(LINK_1_D,0);" href="javascript:void(0);"><span class="submenu" style="cursor:pointer;">半场 / 全场</span>
                                <span id="1_D_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
                <tr id="1_E">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a target="_self" onclick="go_url(LINK_1_E,1);" href="javascript:void(0);"><span class="submenu" style="cursor:pointer;">混合过关</span>
                                <span id="1_E_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
                <tr id="1_F">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a target="_self" onclick="go_url(LINK_1_F,0);" href="javascript:void(0);"><span class="submenu" style="cursor:pointer;">优胜冠军</span>
                                <span id="1_F_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
				<tr id="1_R">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a target="_self" onclick="go_url(LINK_1_R,0);" href="javascript:void(0);"><span class="submenu" style="cursor:pointer;">赛果</span>
                                <span id="1_R_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
            </tbody>
            <!--Basketball-->
            <tbody id='2_head'>
                <tr>
                    <td>
                        <span class="nav"><a href="JavaScript:SwitchSport('','2')">篮球 <span
                            id="2_Cnt" class="tabcontor"></span>
                            <img id="img_2_LV" src="/cl/template/bbin/public/images/layout/icon_live.gif" width="30" height="12"
                                border="0" style="position: absolute; left: 140px; margin-top: 6px;" />
                        </a></span>
                    </td>
                </tr>
            </tbody>
            <tbody id='2_body'>
                <tr id="2_A">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a target="_self" onclick="go_url(LINK_2_A,0);" href="javascript:void(0);"><span class="submenu" style="cursor:pointer;">让球&大小&单/双</span> <span
                                id="2_A_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
				<tr id="2_D">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a target="_self" onclick="go_url(LINK_2_D,0);" href="javascript:void(0);"><span class="submenu" style="cursor:pointer;">单节</span> <span
                                id="2_D_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
                <tr id="2_B">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a target="_self" onclick="go_url(LINK_2_B,1);" href="javascript:void(0);"><span class="submenu" style="cursor:pointer;">混合过关</span> <span
                                id="2_B_Cnt" class="contor"></span>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr id="2_C">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a target="_self" onclick="go_url(LINK_2_C,0);" href="javascript:void(0);"><span class="submenu" style="cursor:pointer;">优胜冠军</span>
                                <span id="2_C_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
				<tr id="2_R">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a target="_self" onclick="go_url(LINK_2_R,0);" href="javascript:void(0);"><span class="submenu" style="cursor:pointer;">赛果</span>
                                <span id="2_R_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
            </tbody>
            <!--Tennis-->
            <tbody id='3_head'>
                <tr>
                    <td>
                        <span class="nav"><a href="JavaScript:SwitchSport('','3')">网球 <span id="3_Cnt"
                            class="tabcontor"></span>
                        </a></span>
                    </td>
                </tr>
            </tbody>
            <tbody id='3_body'>
                <tr id="3_A">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a target="_self" onclick="go_url(LINK_3_A,0);" href="javascript:void(0);"><span class="submenu" style="cursor:pointer;">独赢&让盘&大小&单/双</span> <span
                                id="3_A_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
				<!---
                <tr id="3_B">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('P','5')"><span class="submenu" style="cursor:pointer;">赛盘投注</span> <span
                                id="3_B_Cnt" class="contor"></span>
                            </a>
                        </div>
                    </td>
                </tr>
				<tr id="3_C">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('OT','5')"><span class="submenu" style="cursor:pointer;">综合过关</span>
                                <span id="3_C_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
				--->
                <tr id="3_D">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a target="_self" onclick="go_url(LINK_3_D,0);" href="javascript:void(0);"><span class="submenu" style="cursor:pointer;">优胜冠军</span>
                                <span id="3_D_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
				<tr id="3_R">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a target="_self" onclick="go_url(LINK_3_R,0);" href="javascript:void(0);"><span class="submenu" style="cursor:pointer;">赛果</span>
                                <span id="3_R_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
            </tbody>
            <!--Volleyball-->
            <tbody id='4_head'>
                <tr>
                    <td>
                        <span class="nav"><a href="JavaScript:SwitchSport('','4')">排球 <span
                            id="4_Cnt" class="tabcontor"></span>
                        </a></span>
                    </td>
                </tr>
            </tbody>
            <tbody id='4_body'>
                <tr id="4_A">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a target="_self" onclick="go_url(LINK_4_A,0);" href="javascript:void(0);"><span class="submenu" style="cursor:pointer;">独赢&让分&大小&单/双</span> <span
                                id="4_A_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
				<!---
                <tr id="4_B">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('P','5')"><span class="submenu" style="cursor:pointer;">赛盘投注</span> <span
                                id="4_B_Cnt" class="contor"></span>
                            </a>
                        </div>
                    </td>
                </tr>
				<tr id="4_C">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('OT','5')"><span class="submenu" style="cursor:pointer;">综合过关</span>
                                <span id="4_C_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
				--->
                <tr id="4_D">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a target="_self" onclick="go_url(LINK_4_D,0);" href="javascript:void(0);"><span class="submenu" style="cursor:pointer;">优胜冠军</span>
                                <span id="4_D_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
				<tr id="4_R">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a target="_self" onclick="go_url(LINK_4_R,0);" href="javascript:void(0);"><span class="submenu" style="cursor:pointer;">赛果</span>
                                <span id="4_R_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
            </tbody>
           
            <!--Baseball-->
            <tbody id='5_head'>
                <tr>
                    <td>
                        <span class="nav"><a href="JavaScript:SwitchSport('','5')">棒球 <span
                            id="5_Cnt" class="tabcontor"></span>
                        </a></span>
                    </td>
                </tr>
            </tbody>
            <tbody id='5_body'>
                <tr id="5_A">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a target="_self" onclick="go_url(LINK_5_A,0);" href="javascript:void(0);"><span class="submenu" style="cursor:pointer;">独赢&让分&大小&单/双</span> <span
                                id="5_A_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
				<!---
				<tr id="5_B">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('OT','5')"><span class="submenu" style="cursor:pointer;">综合过关</span>
                                <span id="5_B_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
				--->
				<tr id="5_C">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a target="_self" onclick="go_url(LINK_5_C,0);" href="javascript:void(0);"><span class="submenu" style="cursor:pointer;">优胜冠军</span>
                                <span id="5_C_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
				<tr id="5_R">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a target="_self" onclick="go_url(LINK_5_R,0);" href="javascript:void(0);"><span class="submenu" style="cursor:pointer;">赛果</span>
                                <span id="5_R_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
            </tbody>
			<!--Other-->
            <tbody id='7_head'>
                <tr>
                    <td>
                        <span class="nav"><a href="JavaScript:SwitchSport('','7')">其他 <span id="7_Cnt"
                            class="tabcontor"></span>
                        </a></span>
                    </td>
                </tr>
            </tbody>
            <tbody id='7_body'>
                <tr id="7_A">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a target="_self" onclick="go_url(LINK_7_A,0);" href="javascript:void(0);"><span class="submenu" style="cursor:pointer;">独赢&让盘&大小&单/双</span> <span
                                id="7_A_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
				
                <tr id="7_D">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a target="_self" onclick="go_url(LINK_7_D,0);" href="javascript:void(0);"><span class="submenu" style="cursor:pointer;">优胜冠军</span>
                                <span id="7_D_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
				<tr id="7_R">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a target="_self" onclick="go_url(LINK_7_R,0);" href="javascript:void(0);"><span class="submenu" style="cursor:pointer;">赛果</span>
                                <span id="7_R_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
            </tbody>
            <!--gj-->
            <tbody id='6_head'>
                <tr>
                    <td>
                        <span class="nav"><a href="JavaScript:SwitchSport('','6')">冠军 <span
                            id="6_Cnt" class="tabcontor"></span>
                        </a></span>
                    </td>
                </tr>
            </tbody>
            <tbody id='6_body'>
                <tr id="6_A">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a target="_self" onclick="go_url(LINK_6_A,0);" href="javascript:void(0);"><span class="submenu" style="cursor:pointer;">综合冠军</span> <span
                                id="6_A_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
				<!---
				<tr id="6_B">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('OT','5')"><span class="submenu" style="cursor:pointer;">综合过关</span>
                                <span id="6_B_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>

				<tr id="6_C">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a href="JavaScript:ShowOdds('OT','5')"><span class="submenu" style="cursor:pointer;">优胜冠军</span>
                                <span id="6_C_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
                --->
				<tr id="6_R">
                    <td>
                        <div class="subnav-link" style="display: block;">
                            <a target="_self" onclick="go_url(LINK_6_R,0);" href="javascript:void(0);"><span class="submenu" style="cursor:pointer;">冠军赛果</span>
                                <span id="6_R_Cnt" class="contor"></span></a>
                        </div>
                    </td>
                </tr>
            </tbody>

        </table>
    </div>
    <!--Live滾球-->
    <div id="subnav">
        <table id="market_L_body" width="100%" style="display: none">
            <tr id='L_1_head'>
                <td>
                    <span class="livelist">
					<a target="_self" onclick="go_url(LINK_L_1,0);" href="javascript:void(0);"><span class="tabsportLive"  style="cursor:pointer;">足球</span>
                    <span id="L_1_Cnt" class="tabcontor"></span>
					<img id="img_1_LV" src="/cl/template/bbin/public/images/layout/icon_live.gif" width="30" height="12" border="0" style="position: absolute; left: 140px; margin-top: 6px;" />
					</a>
					</span>
                </td>
            </tr>

			<tr id='L_2_head'>
                <td>
                    <span class="livelist">
					<a target="_self" onclick="go_url(LINK_L_2,0);" href="javascript:void(0);"><span class="tabsportLive"  style="cursor:pointer;">篮球</span>
                    <span id="L_2_Cnt" class="tabcontor"></span>
					<img id="img_2_LV" src="/cl/template/bbin/public/images/layout/icon_live.gif" width="30" height="12" border="0" style="position: absolute; left: 140px; margin-top: 6px;" />
					</a>
					</span>
                </td>
            </tr>
<!--
			<tr id='L_3_head'>
                <td>
                    <span class="livelist">
					<a href="JavaScript:ShowOdds('FGLG','1')"><span class="tabsportLive"  style="cursor:pointer;">网球</span>
                    <span id="L_3_Cnt" class="tabcontor"></span>
					<img id="img_3_LV" src="/cl/template/bbin/public/images/layout/icon_live.gif" width="30" height="12" border="0" style="position: absolute; left: 140px; margin-top: 6px;" />
					</a>
					</span>
                </td>
            </tr>

			<tr id='L_4_head'>
                <td>
                    <span class="livelist">
					<a href="JavaScript:ShowOdds('FGLG','1')"><span class="tabsportLive"  style="cursor:pointer;">排球</span>
                    <span id="L_4_Cnt" class="tabcontor"></span>
					<img id="img_4_LV" src="/cl/template/bbin/public/images/layout/icon_live.gif" width="30" height="12" border="0" style="position: absolute; left: 140px; margin-top: 6px;" />
					</a>
					</span>
                </td>
            </tr>

			<tr id='L_5_head'>
                <td>
                    <span class="livelist">
					<a href="JavaScript:ShowOdds('FGLG','1')"><span class="tabsportLive"  style="cursor:pointer;">棒球</span>
                    <span id="L_5_Cnt" class="tabcontor"></span>
					<img id="img_5_LV" src="/cl/template/bbin/public/images/layout/icon_live.gif" width="30" height="12" border="0" style="position: absolute; left: 140px; margin-top: 6px;" />
					</a>
					</span>
                </td>
            </tr>

			<tr id='L_6_head'>
                <td>
                    <span class="livelist">
					<a href="JavaScript:ShowOdds('FGLG','1')"><span class="tabsportLive"  style="cursor:pointer;">其他</span>
                    <span id="L_6_Cnt" class="tabcontor"></span>
					<img id="img_6_LV" src="/cl/template/bbin/public/images/layout/icon_live.gif" width="30" height="12" border="0" style="position: absolute; left: 140px; margin-top: 6px;" />
					</a>
					</span>
                </td>
            </tr>

			-->
        </table>
    </div>
    <style>	
		#subnav-foot{ display: none !important; } 
    </style>
    <div id="subnav-foot">
        <img src="/cl/template/bbin/public/images/layout/spacer.gif" width="1" height="1" /></div>
    <span id='tmplEnd'></span>

	
</body>
</html>
