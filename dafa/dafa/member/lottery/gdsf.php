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
include_once($C_Patch."/app/member/class/sys_announcement.php");
$msg = sys_announcement::getOneAnnouncement();

include_once($C_Patch."/app/member/cache/ltConfig.php");

$uid = $_SESSION['userid'];
if($Lottery_set['gdsf']['close']==1)
{
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title>广东十分暂停销售</title>
<link href="css/close.css" rel="stylesheet" type="text/css" />
<script src="/js/jquery-1.7.1.js"></script>
</head>
<body>
	<div class="xiuxi">
    	<div class="xx_time">
             <?=$Lottery_set['gdsf']['des']?>
       	</div>
    </div>
    <div class="button">
        	<ul>
            	<li class="kg"><a  href="/member/final/LT_result.php?gtype=GDSF" title="开奖结果" target="_blank" ></a></li>
                <li class="gz"><a  href="rule/Rule_Gdsf.html" title="游戏规则" target="_blank"></a></li>
            </ul>
    </div>
    <div style=" clear:both"></div>
</body>
<script type="text/javascript" language="javascript" src="/js/left_mouse.js"></script>
</html>

<?
exit;
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<script type="text/javascript" src="../../js/jquery-1.7.1.js"></script>
    <script type="text/javascript" src="../../js/jquery.ua.min.js"></script>
<script type="text/javascript" src="../../js/top.js"></script>
<script type="text/javascript" src="box/jquery.jBox-2.3.min.js"></script>
<script type="text/javascript" src="box/jquery.jBox-zh-CN.js"></script>
<script type="text/javascript" src="js/gxsf.js?v=1005"></script>
<script type="text/javascript" src="/cl/js/common.js"></script>
<link type="text/css" rel="stylesheet" href="css/jbox.css"/>
<link type="text/css" rel="stylesheet" href="css/ssc.css"/>
<style type="text/css">
body,td,th {
	font-size: 12px;
}
body {
    margin-left: 0px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
}
	.drpbg{width:60px;position:absolute; background:#021e37;text-align:center;top:25px;left:674px; height:42px; border:1px solid white; border-top:none;}
	.drpbg ul{margin:0px; padding:0px; height:42px; width:60px;}
	.drpbg li{margin:0px;text-align:center;width:60px; height:21px; line-height:20px;}
	.drpbg .ca{font-size:12px; color:White;text-decoration:none;}
	.drpbg .ca:hover{color:#ccc;}
</style>
</head>

    <script>

    $(window.parent.parent.document).find("#mainFrame").height(1035);

    </script>
<script language="JavaScript">

if(self==top){
	top.location='/index.php';
}

function myfun()
{
    if(document.body.clientWidth>1000){
        var left_blank = (document.body.clientWidth-1000)/2;
       /* $("#new_left").css('margin-left', left_blank.toString()+'px');
    }else{
        $("#new_left").css('margin-left', '0px');
    }*/
    browserCompatible();
}
/*用window.onload调用myfun()*/
window.onload=myfun;//不要括号

jQuery(window).resize(myfun);

$(window.parent.document).find("#mainFrame").height(1020);

function browserCompatible(){
    if($.ua().isIe7){
        $(".lottery_main").css('margin', '0px');
        $(".lottery_main").css('width', '800px');
    }
}
</script>
<body>
<link type="text/css" rel="stylesheet" href="css2/caipiao.css"/>
<div class="pagesbanner">
	<div class="gonggao">
	    <div class="w1000" id="memberLatestAnnouncement">
        	<marquee scrollamount="3" scrolldelay="100" direction="left" onclick="hotNewsHistory()" onmouseover="this.stop();" onmouseout="this.start();"><?=$msg;?></marquee>
		</div>
	</div>
</div>
    <div class="about_bg">
		     
	
		<style>

*{padding:0;margin:0;}.main_bg{width: 100%;height:277px;background: url(/imgs/bannerlottery.jpg)center -156px no-repeat;} 
.about_top{ width:100%; height:35px; background:url(/imgs/about_top.png) no-repeat center;margin-top: -35px;}
#img{width:100%;height:244px;background-image:url('caipiao.jpg');background-position:center;margin-top:40px;}
#img1{width:100%;height:331px;
background:url('about_top.png')no-repeat center;margin-top:-109px;z-index: 9999;position:relative;}
#img2{width: 100%;height: 90px;background: url('about_bg01.png')no-repeat center;margin-top:-180px} 
#bgs{width: 1010px;height:auto;background:#fff;margin:auto;border:1px solid #D69E15;min-height: 707px;border-radius:15px;margin: auto;}
    .about_bg{ width:100%;min-height:2000px;background:url(/cl/bg2.jpg);background-repeat: repeat-x; }
.bgs1{    width: 1130px;

    min-height: 38px;
    margin: -37px auto;
}
</style>
<style type="text/css">
body,td,th {
	font-size: 12px;
}
body {
    margin-left: 0px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
}
	.drpbg{width:60px;position:absolute; background:#021e37;text-align:center;top:25px;left:674px; height:42px; border:1px solid white; border-top:none;}
	.drpbg ul{margin:0px; padding:0px; height:42px; width:60px;}
	.drpbg li{margin:0px;text-align:center;width:60px; height:21px; line-height:20px;}
	.drpbg .ca{font-size:12px; color:White;text-decoration:none;}
	.drpbg .ca:hover{color:#ccc;}

#en0 a{ display:block;width:154px;height:40px; padding-left:26px;text-decoration:none;color:#ffffff;font-weight:bold;line-height:40px;font-size:13px;
    background:-moz-linear-gradient(top, #62300A, #2E0300);
    background:-webkit-linear-gradient(top, #62300A, #2E0300);
    background:-ms-linear-gradient(top, #62300A, #2E0300);
    background:linear-gradient(top, #62300A, #2E0300);
    -ms-filter:"progid:DXImageTransform.Microsoft.gradient (GradientType=0, startColorstr=#62300A, endColorstr=#2E0300)";
    +background:#522105;
}
#en0 a:hover{ display:block;width:154px;height:40px; padding-left:26px;text-decoration:none;color:#B52910;font-weight:bold;line-height:40px;font-size:13px;
    background:-moz-linear-gradient(top, #FFD94A, #A06129);
    background:-webkit-linear-gradient(top, #FFD94A, #A06129);
    background:-ms-linear-gradient(top, #FFD94A, #A06129);
    background:linear-gradient(top, #FFD94A, #A06129);
    -ms-filter:"progid:DXImageTransform.Microsoft.gradient (GradientType=0, startColorstr=#FFD94A, endColorstr=#A06129)";
    +background:#CD9835;
}
#left_1{
    font-size:24px;
    color:#A90404;
    text-align:center;
    line-height:40px;
    background:-moz-linear-gradient(top, #FFD94A, #A06129);
    background:-webkit-linear-gradient(top, #FFD94A, #A06129);
    background:-ms-linear-gradient(top, #FFD94A, #A06129);
    background:linear-gradient(top, #FFD94A, #A06129);
    -ms-filter:"progid:DXImageTransform.Microsoft.gradient (GradientType=0, startColorstr=#FFD94A, endColorstr=#A06129)";
    +background:#CD9835;
}
</style>
<style>
    
    #left_1{
    font-size:24px;
    color:#A90404;
    text-align:center;
    line-height:40px;
    background:-moz-linear-gradient(top, #FFD94A, #A06129);
    background:-webkit-linear-gradient(top, #FFD94A, #A06129);
    background:-ms-linear-gradient(top, #FFD94A, #A06129);
    background:linear-gradient(top, #FFD94A, #A06129);
    -ms-filter:"progid:DXImageTransform.Microsoft.gradient (GradientType=0, startColorstr=#FFD94A, endColorstr=#A06129)";
    +background:#CD9835;
}
</style>
<div id="bgs" style=" position:relative;top:10px;">
<!--内容开始-->
<div class="block" style="padding:0px 0px 20px 0px;">

<style>
#dhlm{width:1000px;margin:auto;}
#hahahaha{list-style:none;}
#hahahaha li{
float: left;
    width:78px;
    height: 32px;
    line-height: 32px;
    text-align: center;
    font-size: 13px;
    margin-left:5px;
    font-family: 微软雅黑;
    font-weight: bold;
    color: #455964;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    background-color: #000;


}
.xuanzeyangshi{
width: 87px !important;
    margin-top: -5px;
    height: 37px !important;
    line-height: 39px !important;
    font-size: 15px !important;
    background-color: #455964 !important;
    color: #ccc !important;
    font-family: 楷体 !important;

}
#hahahaha li a{text-decoration: none;
    color: #d63e35;}
.xuanzeyangshi a{text-decoration: none;
    color: #ccc !important;}

	#hahahaha li:hover{background:#bbb;}
</style>
<div id="dhlm">
        <div class="nav-icons fr">
                <a class="odfi" href="/member/final/LT_result.php?gtype=GDSF" title="历史开奖" target="_blank"><i class="icon icon-history"></i></a>
                <a class="odfi" href="rule/Rule_Gdsf.html" title="规则" target="_blank"><i class="icon icon-rule"></i></a>
        </div>
        <ul class="nav-items clearfix">
            <div id="nav" class="nav clearfix nav_bg">
                <ul class="nav-items clearfix">
                        <li id="nav4">
                            <span class="small">
                                    <em class="em">时时彩</em>
                                    <img class="hide sj_img" src="/pic/sj_img.png">
                                    <img src="/pic/img_left.png" class="img img_hide">
                            </span>
                            <span class="eventtext" style="display: none;">
                                    <a href="Cqssc.php" class="nav-item ">重庆时时彩 </a>
                                    <a href="tjssc.php" class="nav-item ">天津时时彩 </a>
                                    <a href="shssl.php" class="nav-item ">上海时时乐</a>
                                    <img src="/pic/img_left.png" class="img_lt">
                            </span>
                        </li>
                    <li id="nav4">
                                <span class="small">
                                        <em class="em">快乐彩</em>
                                        <img class="hide  sj_img" src="/pic/sj_img.png">
                                        <img src="/pic/img_left.png" class="img img_hide">
                                </span>

                                <span class="eventtext" style="display: none;">
                                     <a href="kl8.php" class="nav-item ">北京快乐8</a>
                                    <img src="/pic/img_left.png" class="img_lt">
                                </span>
                        </li>
                        
                        <li id="nav4">
                                <span class="small  selected btl">
                                        <em class="em">十分彩</em>
                                        <img class="sj_img" src="/pic/sj_img.png">
                                        <img src="/pic/img_left.png" class="img img_hide">
                                </span>

                                <span class="eventtext" >
                                        <a href="tjsf.php" class="nav-item ">天津十分彩</a>
                                        <a href="gxsf.php" class="nav-item ">广西十分彩</a>
                                        <a href="cqsf.php" class="nav-item ">重庆十分彩</a>
                                        <a href="gdsf.php" class="nav-item current">广东十分彩</a>
                                        <img src="/pic/img_left.png" class="img_lt">
                                </span>
                        </li>
                        <li id="nav4">
                            <span class="small btl">
                                    <em class="em">一般彩球</em>
                                    <img class="sj_img hide" src="/pic/sj_img.png">
                                    <img src="/pic/img_left.png" class="img img_hide">
                            </span>
                            <span class="eventtext" style="display: none;">
                                    <a href="3d.php" class="nav-item">福彩3D </a>
                                    <a href="javascript:void(0);" onclick="click_url('/member/lt/?rtype=SPbside',1)" class="nav-item ">六合彩 </a>
                                    <img src="/pic/img_left.png" class="img_lt">
                            </span>
			</li>
                        <li id="nav4">
                                <span class="small">
                                        <em class="em">北京彩 </em>
                                        <img class="hide sj_img" src="/pic/sj_img.png">
                                        <img src="/pic/img_left.png" class="img img_hide">
                                </span>
                                <span class="eventtext" style="display: none;">
                                        <a href="pk10.php" class="nav-item  ">北京赛车pk拾 </a>
                                       
                                        <img src="/pic/img_left.png" class="img_lt">
                                </span>
                        </li>
                        
                        <li id="nav4">
                                <span class="small">
                                        <em class="em">排列3</em>
                                        <img class="hide sj_img" src="/pic/sj_img.png">
                                        <img src="/pic/img_left.png" class="img img_hide">
                                </span>

                                <span class="eventtext" style="display: none;">
                                        <a href="pl3.php" class="nav-item ">排列3</a>
                                        <img src="/pic/img_left.png" class="img_lt">
                                </span>
                        </li>
                        <li id="nav4">
                                <span class="small">
                                        <em class="em">十一选五</em>
                                        <img class="hide sj_img" src="/pic/sj_img.png">
                                        <img src="/pic/img_left.png" class="img img_hide">
                                </span>

                                <span class="eventtext" style="display: none;">
                                        <a href="gd11.php" class="nav-item ">广东11选5 </a>
                                </span>
                        </li>
                        
                </ul>
            </div>

        </ul>
<script language="javascript" src="js/caipiao.js"></script>
</div>

<div class="lottery_main" style="width:1000px;">
<div class="ssc_right">
  <div id="auto_list"></div>
</div>
<div class="ssc_left" style="width:1000px;">
   <!--  <div class="flash" style="margin-left: 20px;width: 785px;">
      <div class="f_left">
        <a href="rule/Rule_Gdsf.html" title="游戏规则" target="_blank" class="laba" style="color:#FC0;font-size: 14px;">游戏规则</a>
        <div class="time minute">
          <span><img src='images/Time/0.png'></span><span><img src='images/Time/0.png'></span>
        </div>
        <div class="colon">
          <img src='images/Time/10.png'>
        </div>
        <div class="time second">
          <span><img src='images/Time/0.png'></span><span><img src='images/Time/0.png'></span>
        </div>
        <div class="qh">第 <span id="open_qihao">00000000-000</span> 期 </div>
      </div>
      <div class="f_right">
          <div class="tops">广东快乐十分<span>第 <font id='numbers' class="red number">00000000-000</font> 期</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href="/member/final/LT_result.php?gtype=GDSF" title="历史开奖" class="laba" style="color:#FC0" target="_blank">(历史开奖)</a></div>
          <div class="kick "><img src='images/open_1/x.png'></div>
          <div class="kick er"><img src='images/open_1/x.png'></div>
          <div class="kick san"><img src='images/open_1/x.png'></div>
          <div class="kick si"><img src='images/open_1/x.png'></div>
          <div class="kick wu"><img src='images/open_1/x.png'></div>
          <div class="kick liu"><img src='images/open_1/x.png'></div>
          <div class="kick qi"><img src='images/open_1/x.png'></div>
          <div class="kick ba"><img src='images/open_1/x.png'></div>
        <div class="fot" id="autoinfo">开奖数据获取中...</div>
      </div>
    </div> -->



	
 <style>
.jsq{color: #fff;width:1000px;height:32px;background:#455964;line-height: 34px;font-family: 微软雅黑;font-size: 13px;}
.jsqllk{width:1000px;height:60px;background-image:url('images/bg_result-814f17e.png');background-color: #000;background-repeat:  no-repeat;}
.kick{float:left;}
.kick img{       margin-right: 4px;
    margin-top: 19px;
    margin-left: 24px;}
.zxjg{width: 113px;text-align: center;height: 29px;line-height: 31px;}
.fot{  width: 191px;
    float: left;
    line-height: 26px;
    text-align: center;
    margin: 2px 16px;    margin-left: 75px;
    letter-spacing: 4px;
}
.sj{  position: absolute;
       right: 15px;
    top: 56px;
    width: 110px;
    height: 24px;
    font-weight: bold;
    font-size: 18px;
    text-align: center;
    border-radius: 20px;
    line-height: 24px;
    text-indent: 1em;}
</style>
   
<div class="summary" >
    <span id='cqc_sound' off='0'  class="icon1 sound-on fr"><img src='images/on.png' title='关闭/打开声音'/></span>
    <div class="summary-prev fr" id="pre-result">
        <span class="fl">广东十分彩</span>
        <span class="fl mr6"><b id="numbers">00000000-000</b>期结果</span>
        
         <div class="kick "><img src='images/open_1/x.png'></div>
          <div class="kick er"><img src='images/open_1/x.png'></div>
          <div class="kick san"><img src='images/open_1/x.png'></div>
          <div class="kick si"><img src='images/open_1/x.png'></div>
          <div class="kick wu"><img src='images/open_1/x.png'></div>
          <div class="kick liu"><img src='images/open_1/x.png'></div>
          <div class="kick qi"><img src='images/open_1/x.png'></div>
          <div class="kick ba"><img src='images/open_1/x.png'></div>

    

        

    </div>
   <div class="fot" id="autoinfo">开奖数据获取中...</div>
<!--    <span class="zh" id="autoinfo"><font></font></span>-->
    <span class="button-secondary-group">
        
    </span>
</div>  
   

<div class="clearfix top-bar" >
    <div class="fr"></div>
    <div class="fr removable"></div>
    <span>期数 <b class="box" id="open_qihao">00000000-000</b>期</span>
    <span>距离开奖
            <div class="sj box">
                    <div class="time minute" style="float:left">
			<span><img src='images/Time/0.png'></span>
                        <span><img src='images/Time/0.png'></span>
                    </div>

                    <div class="colon" style="float:left;width: 0px;">
                      <img src='images/Time/10.png' style="margin-left: -13px;">
                    </div>

                    <div class="time second" style="float:left">
                      <span><img src='images/Time/0.png'></span><span><img src='images/Time/0.png'></span>
                    </div>
            </div>
    </span>
</div>   



    <div class="touzhu">
<form name="orders" action="order/order_gdsf.php?1=1" method="post" target="OrderFrame">
<ul id="menu_hm">
    <li class="current" onclick="hm_odds(1)">第一球</li>
    <li class="current_n" onclick="hm_odds(2)">第二球</li>
    <li class="current_n" onclick="hm_odds(3)">第三球</li>
    <li class="current_n" onclick="hm_odds(4)">第四球</li>
    <li class="current_n" onclick="hm_odds(5)">第五球</li>
    <li class="current_n" onclick="hm_odds(6)">第六球</li>
    <li class="current_n" onclick="hm_odds(7)">第七球</li>
    <li class="current_n" onclick="hm_odds(8)">第八球</li>
</ul>
<table class="bian" border="0" cellpadding="0" cellspacing="1">
    <tr class="bian_tr_title">
        <td>号码</td>
        <td>赔率</td>
        <td width="70">金额</td>
        <td>号码</td>
        <td>赔率</td>
        <td width="70">金额</td>
        <td>号码</td>
        <td>赔率</td>
        <td width="70">金额</td>
        <td>号码</td>
        <td>赔率</td>
        <td width="70">金额</td>
        <td>号码</td>
        <td>赔率</td>
        <td width="70">金额</td>
    </tr>
    <tr class="bian_tr_txt">
        <td class="bian_td_qiu"><img src="images/ball_1/01.png" /></td>
        <td class="bian_td_odds" id="ball_1_h1" width="40"></td>
        <td class="bian_td_inp" id="ball_1_t1"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/02.png" /></td>
        <td class="bian_td_odds" id="ball_1_h2" width="40"></td>
        <td class="bian_td_inp" id="ball_1_t2"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/03.png" /></td>
        <td class="bian_td_odds" id="ball_1_h3" width="40"></td>
        <td class="bian_td_inp" id="ball_1_t3"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/04.png" /></td>
        <td class="bian_td_odds" id="ball_1_h4" width="40"></td>
        <td class="bian_td_inp" id="ball_1_t4"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/05.png" /></td>
        <td class="bian_td_odds" id="ball_1_h5" width="40"></td>
        <td class="bian_td_inp" id="ball_1_t5"></td>
    </tr>
    <tr class="bian_tr_txt">
        <td class="bian_td_qiu"><img src="images/ball_1/06.png" /></td>
        <td class="bian_td_odds" id="ball_1_h6" width="40"></td>
        <td class="bian_td_inp" id="ball_1_t6"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/07.png" /></td>
        <td class="bian_td_odds" id="ball_1_h7" width="40"></td>
        <td class="bian_td_inp" id="ball_1_t7"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/08.png" /></td>
        <td class="bian_td_odds" id="ball_1_h8" width="40"></td>
        <td class="bian_td_inp" id="ball_1_t8"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/09.png" /></td>
        <td class="bian_td_odds" id="ball_1_h9" width="40"></td>
        <td class="bian_td_inp" id="ball_1_t9"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/10.png" /></td>
        <td class="bian_td_odds" id="ball_1_h10" width="40"></td>
        <td class="bian_td_inp" id="ball_1_t10"></td>
    </tr>
    <tr class="bian_tr_txt">
        <td class="bian_td_qiu"><img src="images/ball_1/11.png" /></td>
        <td class="bian_td_odds" id="ball_1_h11"></td>
        <td class="bian_td_inp" id="ball_1_t11"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/12.png" /></td>
        <td class="bian_td_odds" id="ball_1_h12"></td>
        <td class="bian_td_inp" id="ball_1_t12"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/13.png" /></td>
        <td class="bian_td_odds" id="ball_1_h13"></td>
        <td class="bian_td_inp" id="ball_1_t13"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/14.png" /></td>
        <td class="bian_td_odds" id="ball_1_h14"></td>
        <td class="bian_td_inp" id="ball_1_t14"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/15.png" /></td>
        <td class="bian_td_odds" id="ball_1_h15">&nbsp;</td>
        <td class="bian_td_inp" id="ball_1_t15">&nbsp;</td>
    </tr>
    <tr class="bian_tr_txt">
        <td class="bian_td_qiu"><img src="images/ball_1/16.png" /></td>
        <td class="bian_td_odds" id="ball_1_h16"></td>
        <td class="bian_td_inp" id="ball_1_t16"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/17.png" /></td>
        <td class="bian_td_odds" id="ball_1_h17"></td>
        <td class="bian_td_inp" id="ball_1_t17"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/18.png" /></td>
        <td class="bian_td_odds" id="ball_1_h18"></td>
        <td class="bian_td_inp" id="ball_1_t18"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/19.png" /></td>
        <td class="bian_td_odds" id="ball_1_h19"></td>
        <td class="bian_td_inp" id="ball_1_t19"></td>
        <td class="bian_td_qiu"><img src="images/ball_1/20.png" /></td>
        <td class="bian_td_odds" id="ball_1_h20">&nbsp;</td>
        <td class="bian_td_inp" id="ball_1_t20">&nbsp;</td>
    </tr>
    <tr class="bian_tr_txt">
        <td class="bian_td_qiu">大</td>
        <td class="bian_td_odds" id="ball_1_h21"></td>
        <td class="bian_td_inp" id="ball_1_t21"></td>
        <td class="bian_td_qiu">小</td>
        <td class="bian_td_odds" id="ball_1_h22"></td>
        <td class="bian_td_inp" id="ball_1_t22"></td>
        <td class="bian_td_qiu">单</td>
        <td class="bian_td_odds" id="ball_1_h23"></td>
        <td class="bian_td_inp" id="ball_1_t23"></td>
        <td class="bian_td_qiu">双</td>
        <td class="bian_td_odds" id="ball_1_h24"></td>
        <td class="bian_td_inp" id="ball_1_t24"></td>
        <td colspan="3" class="bian_td_qiu">&nbsp;</td>
    </tr>
    <tr class="bian_tr_txt">
        <td class="bian_td_qiu">尾大</td>
        <td class="bian_td_odds" id="ball_1_h25"></td>
        <td class="bian_td_inp" id="ball_1_t25"></td>
        <td class="bian_td_qiu">尾小</td>
        <td class="bian_td_odds" id="ball_1_h26"></td>
        <td class="bian_td_inp" id="ball_1_t26"></td>
        <td class="bian_td_qiu">合单</td>
        <td class="bian_td_odds" id="ball_1_h27"></td>
        <td class="bian_td_inp" id="ball_1_t27"></td>
        <td class="bian_td_qiu">合双</td>
        <td class="bian_td_odds" id="ball_1_h28"></td>
        <td class="bian_td_inp" id="ball_1_t28"></td>
        <td colspan="3" class="bian_td_qiu">&nbsp;</td>
    </tr>
    <tr class="bian_tr_txt">
        <td class="bian_td_qiu">东</td>
        <td class="bian_td_odds" id="ball_1_h29"></td>
        <td class="bian_td_inp" id="ball_1_t29"></td>
        <td class="bian_td_qiu">南</td>
        <td class="bian_td_odds" id="ball_1_h30"></td>
        <td class="bian_td_inp" id="ball_1_t30"></td>
        <td class="bian_td_qiu">西</td>
        <td class="bian_td_odds" id="ball_1_h31"></td>
        <td class="bian_td_inp" id="ball_1_t31"></td>
        <td class="bian_td_qiu">北</td>
        <td class="bian_td_odds" id="ball_1_h32"></td>
        <td class="bian_td_inp" id="ball_1_t32"></td>
        <td colspan="3" class="bian_td_qiu">&nbsp;</td>
    </tr>
    <tr class="bian_tr_txt">
        <td class="bian_td_qiu">中</td>
        <td class="bian_td_odds" id="ball_1_h33"></td>
        <td class="bian_td_inp" id="ball_1_t33"></td>
        <td class="bian_td_qiu">发</td>
        <td class="bian_td_odds" id="ball_1_h34"></td>
        <td class="bian_td_inp" id="ball_1_t34"></td>
        <td class="bian_td_qiu">白</td>
        <td class="bian_td_odds" id="ball_1_h35"></td>
        <td class="bian_td_inp" id="ball_1_t35"></td>
        <td colspan="6" class="bian_td_qiu">&nbsp;</td>
    </tr>
</table>
    <ul id="menu_hm">
    <li class="current">总和 龙虎</li>
</ul> 
<table class="bian" border="0" cellpadding="0" cellspacing="1" style="margin-top:20px;">
    <tr class="bian_tr_title">
        <td>选项</td>
        <td>赔率</td>
        <td width="70">金额</td>
        <td>选项</td>
        <td>赔率</td>
        <td width="70">金额</td>
        <td>选项</td>
        <td>赔率</td>
        <td width="70">金额</td>
        <td>选项</td>
        <td>赔率</td>
        <td width="70">金额</td>
    </tr>
    <tr class="bian_tr_txt">
        <td width="60" class="bian_td_qiu">总和大</td>
        <td class="bian_td_odds" id="ball_9_h1"></td>
        <td width="70" class="bian_td_inp" id="ball_9_t1"></td>
        <td width="60" class="bian_td_qiu">总和小</td>
        <td class="bian_td_odds" id="ball_9_h2"></td>
        <td width="70" class="bian_td_inp" id="ball_9_t2"></td>
        <td width="60" class="bian_td_qiu">总和单</td>
        <td class="bian_td_odds" id="ball_9_h3"></td>
        <td width="70" class="bian_td_inp" id="ball_9_t3"></td>
        <td width="60" class="bian_td_qiu">总和双</td>
        <td class="bian_td_odds" id="ball_9_h4"></td>
        <td width="70" class="bian_td_inp" id="ball_9_t4"></td>
    </tr>
    <tr class="bian_tr_txt">
        <td width="60" class="bian_td_qiu">总和尾大</td>
        <td class="bian_td_odds" id="ball_9_h5"></td>
        <td width="70" class="bian_td_inp" id="ball_9_t5"></td>
        <td width="60" class="bian_td_qiu">总和尾小</td>
        <td class="bian_td_odds" id="ball_9_h6"></td>
        <td width="70" class="bian_td_inp" id="ball_9_t6"></td>
        <td width="60" class="bian_td_qiu">龙</td>
        <td class="bian_td_odds" id="ball_9_h7"></td>
        <td width="70" class="bian_td_inp" id="ball_9_t7"></td>
        <td width="60" class="bian_td_qiu">虎</td>
        <td class="bian_td_odds" id="ball_9_h8"></td>
        <td width="70" class="bian_td_inp" id="ball_9_t8"></td>
    </tr>
</table>
      <div class="button_body"><a onclick="reset()" class="button again" title="重填">重填</a>&nbsp;
	  <a class="button submit" onclick="order();" title="下注">下注</a></div>
      </form>
    </div>
    <div class="lottery_clear"></div>
</div>
</div>
<div class="lottery_clear"></div>
  </div>
  </div>
  
  </div>
  <div class="bgs1"></div>
<div id="endtime"></div>
<script type="text/javascript">loadinfo()</script>
<IFRAME id="OrderFrame" name="OrderFrame" border=0 marginWidth=0 frameSpacing=0 src="" frameBorder=0 noResize width=0 scrolling=AUTO height=0 vspale="0" style="display:none"></IFRAME>
<div style="display:none" id="look"></div>
</body>
</html>