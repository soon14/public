<?php
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/com_chk.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/class/sys_announcement.php");
include_once($C_Patch."/app/member/cache/website.php");
$msg = sys_announcement::getOneAnnouncement();
$display	=	'block';
if(intval($_COOKIE['f'])) $display	= 'none';
$sql = "select conf_www from sys_config limit 0,1";
$query	=	$mysqli->query($sql);
$row = $query->fetch_array();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>reg_main</title>
<link href="/cl/tpl/commonFile/css/standard.css" rel="stylesheet" type="text/css" />
<link href="/cl/tpl/commonFile/css/jquery-ui/smoothness/jquery-ui-1.8.21.custom.css" rel="stylesheet" type="text/css" />
<link href="/cl/tpl/starball/ver1/css/starball.css" rel="stylesheet"/>
<link href="/cl/css/bcss.css" rel="stylesheet"/>
<script src="/js/jquery-1.7.1.js"></script>
<script src="/cl/js/common.js"></script>
<style type="text/css">
	.JoinMemForm{
            width:650px;
            margin: 0px auto;
        }
        /*#memCash_body p{*/
            /*line-height:12px;*/
            /*height:26px;*/
        /*}*/
        #memCash_body label{
            float: left;
            height:25px;
            line-height:25px;
            text-align: right;
                width: 135px;
        }
        #memCash_body .memCash_text{
            /*padding-left: 135px;*/
        }
        label{width: 140px;
    text-align: right;
    float: left;
    line-height: 25px;}
                
        input, select{
            height:20px;
            line-height:20px;
        }
        select.err{
            color:red;
        }
        #myFORM input[type=text], #myFORM input[type=password], #myFORM select{
    padding-right: 6px;
    width: 180px;
    height: 26px;
    line-height: 24px;
    color: #000;
    font-size: 13px;
    padding-left: 5px;
        }
/*        #myFORM input[type=text]:hover,*/ #myFORM input[type=password]:hover, #myFORM select:hover{
/*            border: 1px solid #E29EFC;*/
        }
        #myFORM input[type=text]:focus, #myFORM input[type=password]:focus, #myFORM select:focus{
/*            border: 1px solid #9900FF;*/
        }
        #myFORM #HiddenInput{
            width:0px;
            height:0px;
            background:transparent;
            border:0;
        }
        #myFORM input[type=text][id=HiddenInput]{
            width:0;
            height:0;
            background:transparent;
            border:0;
        }
        li {
            display: list-item;
            text-align: -webkit-match-parent;
            list-style:disc;
            /*margin-left:25px;*/
            line-height:18px;
			list-style-position:inside;
        }
        ul{
            display: block;
            list-style-type: disc;
            -webkit-margin-start: 0px;
            -webkit-margin-end: 0px;
            -webkit-padding-start: 10px;
        }
        
        .ui-datepicker-trigger {
            margin-left: 5px;
            cursor:pointer;
        }
        #memCash_body #ui-datepicker-div a {
            color:#000;
        }
        .ui-datepicker th {
            word-break: break-all;
            padding: 2px 1px;
        }
        .ui-datepicker {
            width: 260px;
        }


        /*use by jquery ui dialog*/
        .ui-dialog-content{
            padding: 5px 1px;
        }
        .ui-dialog-title{
            font-size:14px;
        }
        #Dialog{
            font-size:12px;
        }
        #Dialog p {
            line-height:16px;
            margin:10px 0px 10px 10px;
            height: auto;
        }
        #SendForm input[type=text], #SendForm input[type=password]{

        }
        #SendForm input[type=text]:hover, #SendForm input[type=password]:hover{
/*            border: 1px solid #E29EFC;*/
        }
        #SendForm input[type=text]:focus, #SendForm input[type=password]:focus{
/*            border: 1px solid #9900FF;*/
        }
        /* us by validation */
        .FormError {
            position: absolute;
            top: 300px;
            left: 300px;
            display: block;
            z-index: 500;
        }
        .FormError .FormErrorC {
            width: 100%;
            background: #ee0101;
            position:relative;
            z-index:501;
            color: #fff;
            font-family: tahoma;
            font-size: 11px;
            line-height: 14px;
            border: 2px solid #ddd;
            box-shadow: 0 0 6px #000;
            -moz-box-shadow: 0 0 6px #000;
            -webkit-box-shadow: 0 0 6px #000;
            padding: 4px 10px 4px 10px;
            border-radius: 6px;
            -moz-border-radius: 6px;
            -webkit-border-radius: 6px;
        }
        .FormError .FormErrorA {
            width: 15px;
            margin: -2px 0 0 13px;
            position:relative;
            z-index: 506;
        }
        .FormError .FormErrorABottom {
            box-shadow: none;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
            margin: 0px 0 0 12px;
            top:2px;
        }
        .FormError .FormErrorA div {
            border-left: 2px solid #ddd;
            border-right: 2px solid #ddd;
            box-shadow: 0 2px 3px #444;
            -moz-box-shadow: 0 2px 3px #444;
            -webkit-box-shadow: 0 2px 3px #444;
            font-size: 0px;
            height: 1px;
            background: #ee0101;
            margin: 0 auto;
            line-height: 0;
            font-size: 0;
            display: block;
        }
        .FormError .FormErrorABottom div {
            box-shadow: none;
            -moz-box-shadow: none;
            -webkit-box-shadow: none;
        }
        /*use by jquery ui dialog*/
        .ui-dialog-content{
            padding: 5px 1px;
        }
        .ui-dialog-title{
            font-size:14px;
        }
        #Dialog{
            font-size:12px;
        }
        #Dialog p {
            line-height:16px;
            margin:10px 0px 10px 10px;
            height: auto;
        }
        #SendForm input[type=text], #SendForm input[type=password]{
            border: 1px solid #949494;
            -moz-border-radius:3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            box-shadow: 0 0 6px #D3D3D3;
            -moz-box-shadow: 0 0 6px #D3D3D3;
            -webkit-box-shadow: 0 0 6px #D3D3D3;
        }
        #SendForm input[type=text]:hover, #SendForm input[type=password]:hover{
/*            border: 1px solid #E29EFC;*/
        }
        #SendForm input[type=text]:focus, #SendForm input[type=password]:focus{
            border: 1px solid #9900FF;
        }
        /*  ADVANCED STYLES */
        .top_testresult{
            font-weight: bold;
            font-size:13px;
            font-family: arail,helvetica,san-serif;
            color:#FFF;
            padding:0;
            margin:0 0 2px 0;
        }
        .top_testresult span{
            padding:6px ;
            margin:0;
        }
        .top_shortPass{
            background:#FF0000;
        }
        .top_badPass{
            background:#000000;
        }
        .top_goodPass{
            background:#0029AA;
        }
        .top_strongPass{
            background:#128511;
        }
        .JM_content{
            padding : 10px;
        }
        .JM_content b, .JM_content strong { font-weight: bolder }
        #memCash_body .JM_content p{
            height: auto; 
            line-height: 16px;
        }
        .loading_pic { display:none; }
        #rmNum { 
            color: #999;
            text-align: center;
        }
        /*共用*/
input{
    padding-left:6px;
    padding-right:6px;
}
body{
    /*background-color:#FFFFFF;*/
}
.bodyStyle{
    /*background-color:#FFFFFF;*/
}
.skinbg{
    background-color:#FBE9AC;
}


/*會員註冊*/
#joinMember iframe{
    width: 730px;
    height: 1000px;
}
#memCash_body{
	background-color:transparent;
    color:#fff;
    font-size: 12px;
}
#memCash_body .memCash_tit{
        background:url(/cl/tpl/starball/ver1/image/welcome.png) no-repeat;
    padding:25px 0px 0px 125px;
    height: 25px;
    width:418px;
    margin-left:19px;
    overflow: hidden;
    }
.JM_content_t{
    padding: 10px 10px 10px 20px;
}
#memCash_body fieldset {
    padding:10px;
    margin:10px;
    border:3px solid #9E6E26;
    border-radius: 10px;
} 
#memCash_body legend{
    color:#fff;
    font-size: 12px;
    font-weight: bold;
    letter-spacing:3px;
}
#memCash_body .star {
    font-family: verdana, Helvetica, sans-serif;
    font-size: 12px;
    color: #FF0000;
    font-weight: bold;
    vertical-align: -2px;
}
#memCash_body a{
    text-decoration: none;
    color:#000;
}
#memCash_body .memCash_text{
    line-height: 15px;
    height: auto;
}
#myFORM input[type=text], #myFORM input[type=password], #myFORM select{

}

    #memCash_body {
        width: 1000px;
        height: auto;
        margin: 0px auto 0px auto;
    }

.top_zc{width:1000px; margin:auto; height:270px;}
.first-jp-wrap {float:left;height:43px;margin-left:250px;position:relative;width:488px;background:url("/pic/prize_bg.png") no-repeat scroll left top;}
.first-jp-wrap .ele-jackpot-wrap {cursor:pointer;font-size:22px;height:35px;left:121px;line-height:35px;position:absolute;text-align:center;top:7px;width:241px;color: #FDDA52;}
.ele-jackpot-wrap span{letter-spacing:2px; font-weight:bolder;}

*{padding:0;margin:0;}
body{font-size: 12px;line-height: 18px; font-family:"微软雅黑";}
*{ margin:0; padding:0;}
ul,li{ list-style:none;}
img,hr{border:0;}
a{ text-decoration:none;}
.clr {clear:both;height:0px;}

.pagesbanner {height:230px;position:relative;width:100%;background:url(/pic/subban5.jpg) top no-repeat;}
.pagesbanner .gonggao {height:30px;background:url(/pic/gonggaobg3.png) center no-repeat;line-height:30px;color:#FFFFFF;position:absolute;bottom:0;width:100%;z-index:10;}
.pagesbanner .gonggao marquee {float:right;width:890px;margin-right:10px;cursor:pointer;}
.w1000 {width:1000px;margin:0 auto;}
.pages {overflow:hidden;width:100%;margin:auto;}
.about {width:960px;background:#000;height:auto;overflow:hidden;padding:20px;}
.about .aboutleft {width:240px;float:left;height:auto;overflow:hidden;background:#141c37}
.about .aboutleft h6 {background:#1c3568;text-align:center;font-size:22px;font-weight:bold;color:#fff;font-family:"Microsoft Yahei";width:240px;line-height:55px;margin-bottom:20px;}
.about .aboutleft ul li {height:51px;padding-left:30px;overflow:hidden;line-height:16px;width:170px;margin:0 auto 10px auto;}
.about .aboutleft ul li a {height:40px;display:block;padding-top:8px;}
.about .aboutleft ul li span {background:url(/pic/aboutico.png) no-repeat;width:38px;height:38px;display:block;float:left;margin-right:20px;}
.about .aboutleft ul li:hover span,.about .aboutleft ul li.on span {background:url(/pic/abouticoon.png) no-repeat;}
.about .aboutleft ul li span.ico01 {background-position:0 0}
.about .aboutleft ul li span.ico02 {background-position:0 -54px}
.about .aboutleft ul li span.ico03 {background-position:0 -109px}
.about .aboutleft ul li span.ico04 {background-position:0 -164px}
.about .aboutleft ul li span.ico05 {background-position:0 -219px}
.about .aboutleft ul li span.ico06 {background-position:0 -274px}
.about .aboutleft ul li a {color:#e5e5e5;font-size:16px;font-family:"Microsoft Yahei";}
.about .aboutleft ul li a b {font-size:10px;font-family:Arial;}
.about .aboutleft ul li:hover,.about .aboutleft ul li.on {background:#0c0f24;}
.about .aboutleft ul li:hover a,.about .aboutleft ul li.on a {color:#faae30}
.about .aboutleft {width:240px;float:left;height:auto;overflow:hidden;background:#141c37}
.about .aboutleft h6 {background:#1c3568;text-align:center;font-size:22px;font-weight:bold;color:#fff;font-family:"Microsoft Yahei";width:240px;line-height:55px;margin-bottom:20px;}
.about .aboutleft ul li {height:51px;padding-left:30px;overflow:hidden;line-height:16px;width:170px;margin:0 auto 10px auto;}
.about .aboutleft ul li a {height:40px;display:block;padding-top:8px;}
.about .aboutleft ul li span {background:url(/pic/aboutico.png) no-repeat;width:38px;height:38px;display:block;float:left;margin-right:20px;}
.about .aboutleft ul li:hover span,.about .aboutleft ul li.on span {background:url(/pic/abouticoon.png) no-repeat;}
.about .aboutleft ul li span.ico01 {background-position:0 0}
.about .aboutleft ul li span.ico02 {background-position:0 -54px}
.about .aboutleft ul li span.ico03 {background-position:0 -109px}
.about .aboutleft ul li span.ico04 {background-position:0 -164px}
.about .aboutleft ul li span.ico05 {background-position:0 -219px}
.about .aboutleft ul li span.ico06 {background-position:0 -274px}
.about .aboutleft ul li a {color:#e5e5e5;font-size:10px;font-size:16px;font-family:"Microsoft Yahei";}
.about .aboutleft ul li a b {font-family:Arial;}
.about .aboutleft ul li:hover,.about .aboutleft ul li.on {background:#0c0f24;}
.about .aboutleft ul li:hover a,.about .aboutleft ul li.on a {color:#faae30}


p{max-width:600px;}

fieldset { border: 1px solid #fff;margin: 15px 0;padding: 10px 10px 10px 25px;}
fieldset legend {padding: 0px 12px;text-align: left; font-size: 14px;font-weight: bold;}
.leftnav {
    float: left;
    width: 228px;
    border: 1px solid #aaaaaa;
    position: relative;
}
.leftnav ul {
    padding: 0px 18px;
    position: relative;
    z-index: 22;
}

.leftnav li a {
    display: block;
    line-height: 40px;
    color: #fff;
    border-bottom: 1px solid #76593c;
    padding-left: 32px;
}

.leftnav li a.lefttls{
    line-height:65px;
    text-align:center;
    color:#f8d080;
    font-size:20px;
}
.leftnav li a:hover{
    color: #f8d080;
}
.licons1{
    background: url(/pic/licon1.png) no-repeat 6px center;
}.licons2{
    background: url(/pic/licon2.png) no-repeat 6px center;
}.licons3{
    background: url(/pic/licon3.png) no-repeat 6px center;
}.licons4{
    background: url(/pic/licon4.png) no-repeat 6px center;
}


.licons1:hover{
    background: url(/pic/licon1cur.png) no-repeat 6px center;
}.licons2:hover{
    background: url(/pic/licon2cur.png) no-repeat 6px center;
}.licons3:hover{
    background: url(/pic/licon3cur.png) no-repeat 6px center;
}.licons4:hover{
    background: url(/pic/licon4cur.png) no-repeat 6px center;
}
.limgs {
    position: absolute;
    bottom: 10px;
    left: 0px;
}
.redborder .color{
        color: rgb(255, 255, 153);
}
.redborder p{
    white-space: normal
}

#Union1 p{line-height:22px;}
.h100{
    height:100px;
}
.h54{
    height:54px;
}
.fr{
    float: right;
}
.limgs {
    position: absolute;
    bottom: 10px;
    left: 0px;
}
.cl {
    clear: both;
}
.JM_content {
    padding: 10px 10px 10px 20px;
}
.JM_content p{
    line-height: 40px;
    height: auto;
    font-size: 14px;
}
.JM_content p span{
   font-size: 13px;
   font-weight: 580;
   line-height: 1.7em;
}
.star{
        color: red;
}
.pbq{
    padding: 5px 0 0 135px;
}
.memCash_tit{
    background: url(/pic/welcome.png) no-repeat;
    padding-left: 140px;
    color: #FFF;
    height: 50px;
    line-height: 65px;
    text-shadow: 2px 1px 1px black;
}

</style>
</head>
<body>
<div class="pagesbanner">
	<div class="gonggao">
	    <div class="w1000" id="memberLatestAnnouncement">
        	<marquee scrollamount="3" scrolldelay="100" direction="left" onClick="hotNewsHistory()" onMouseOver="this.stop();" onMouseOut="this.start();"><?=$msg;?></marquee>
		</div>
	</div>
</div>
<div class="pages" style="background: #000;">
	<div class="about w1000">
        <div class="leftnav">
          <em class="lsanj ljiao1"></em>
          <em class="lsanj ljiao2"></em>
          <em class="lsanj ljiao3"></em>
          <em class="lsanj ljiao4"></em>
          
          <ul>
             <li><a class="lefttls">热门游戏列表</a></li>
            <li><a onclick="click_url('/member/lottery/dzyy.php')" href="javascript:void(0);" class="licons1">捕鱼达人<span class="fr">&gt;</span></a></li>
            <li><a onclick="click_url('/member/lottery/Cqssc.php?1=1')" href="javascript:void(0);" class="licons2">六合彩<span class="fr">&gt;</span></a></li>
            <li><a onclick="click_url('/member/lottery/dzyy.php')" href="javascript:void(0);" class="licons1">PT电子<span class="fr">&gt;</span></a></li>
            <li><a onclick="click_url('/member/lottery/dzyy.php')" href="javascript:void(0);" class="licons1">MG电子<span class="fr">&gt;</span></a></li>
            <li><a onclick="click_url('/member/lottery/dzyy.php')" href="javascript:void(0);" class="licons1">BB电子<span class="fr">&gt;</span></a></li>
            <li><a onclick="click_url('/member/zhenren/mylive.php')" href="javascript:void(0);" class="licons3">视讯直播<span class="fr">&gt;</span></a></li>
            <li><a target="_self" onclick="click_url('/app/member/sport.php',1)" href="javascript:void(0);"  class="licons4">体育投注<span class="fr">&gt;</span></a></li>
            <li><a onclick="click_url('/member/lottery/Cqssc.php?1=1')" href="javascript:void(0);" class="licons2">彩票游戏<span class="fr">&gt;</span></a></li>
          </ul>
          
          <div class="cl h100"></div>
          <div class="cl h100"></div>
          <div class="cl h54"></div>
          
          <div class="limgs"><img src="/pic/limg.png" alt=""></div>
        </div>    
<!--	<div class="aboutleft">
  			<h6>欢迎光临</h6>
  			<ul>
				<li class="on"><a href="javascript:click_url('/app/member/help/dlhz1.php');"><span class="ico01"></span>关于我们<br><b>ABOUT US</b></a></li>
				<li><a href="javascript:click_url('/app/member/help/dlhz2.php');"><span class="ico02"></span>联络我们<br><b>CONTACT US</b></a></li>
				<li><a href="javascript:click_url('/app/member/help/dlhz3.php');"><span class="ico03"></span>合作伙伴<br><b>PARTNER</b></a></li>
				<li><a href="javascript:click_url('/app/member/help/dlhz4.php');"><span class="ico04"></span>存款帮助<br><b>DEPOSIT</b></a></li>
				<li><a href="javascript:click_url('/app/member/help/dlhz5.php');"><span class="ico05"></span>取款帮助<br><b>WITHDRAW</b></a></li>
				<li class="side-item side-item6"><a href="javascript:click_url('/app/member/help/dlhz6.php');"><span class="ico06"></span>常见问题<br><b>QUESTIONS</b></a></li>
			</ul>
		</div>-->


<div style="width: 680px;float: right; height: auto; overflow: hidden;">
<script language="javascript" src="/images/swfobject_source.js"></script>
                <!--
                <div class="turn" id="turn">
					 <script type=text/javascript>
                       var focus_width=744;
                       var focus_height=220;
                       var pics='/images/1.jpg|/images/2.jpg|/images/3.jpg|/images/4.jpg'; 
                       var links='|||'; 
                       var s1 = new SWFObject("/images/focusFlash_fp.swf", "mymovie1", focus_width, focus_height, "4", "#ffffff");
                       s1.addParam("wmode", "transparent");
                       s1.addParam("AllowscriptAccess", "sameDomain");
                       s1.addVariable("bigSrc", pics);               
                       s1.addVariable("href", links);
                       s1.addVariable("width", focus_width);
                       s1.addVariable("height", focus_height);
                       s1.write("turn");
                    </script>
                  </div>
				-->                              
<h3 class="memCash_tit" style="font-size:14px;">【<?=$web_site["web_name"]?>】欢迎您的加入，官方网址：<?=$row["conf_www"]?> </h3>
<div class="JM_content JM_content_t">
        <div id="joinmem">
            <div>
                <p><span style="color:rgb(255, 255, 255);">加入太阳城集团会员坐拥独特会员价值：</span></p>
                <p><span style="color:rgb(255, 255, 255);">1.太阳城集团：</span><span style="color:rgb(255, 255, 0);">非凡想象</span><span style="color:rgb(255, 255, 255);">，</span><span style="color:rgb(255, 255, 0);">引发无限可能</span><span style="color:rgb(255, 255, 255);">，国际品牌，值得您的信赖。</span></p>
                <p><span style="color:rgb(255, 255, 255);">2.太阳城集团</span><span style="color:rgb(0, 255, 0);">第一桶金</span><span style="color:rgb(255, 255, 255);">，存</span><span style="color:rgb(0, 255, 0);">14送29</span><span style="color:rgb(255, 255, 255);">，一倍打码即可</span><span style="color:rgb(0, 255, 0);">提款。</span></p>
                <p><span style="color:rgb(255, 255, 255);">3.玩转电子游艺，天天</span><span style="color:rgb(255, 255, 0);">1888元</span><span style="color:rgb(255, 255, 255);">得意彩金，无需申请，自动派送。</span></p>
                <p><span style="color:rgb(255, 255, 255);">4.电子游艺</span><span style="color:rgb(0, 255, 0);">返水高达2.5%</span><span style="color:rgb(255, 255, 255);">，无需</span><span style="color:rgb(0, 255, 0);">打码</span><span style="color:rgb(255, 255, 255);">自由</span><span style="color:rgb(0, 255, 0);">提款</span><span style="color:rgb(255, 255, 255);">。</span></p>
                <p><span style="color:rgb(255, 255, 255);">5.全网</span><span style="color:rgb(255, 255, 0);">首家</span><span style="color:rgb(255, 255, 255);">出款系统对接</span><span style="color:rgb(255, 255, 0);">银行支付</span><span style="color:rgb(255, 255, 255);">中心，</span><span style="color:rgb(255, 255, 0);">1000万</span><span style="color:rgb(255, 255, 255);">提款</span><span style="color:rgb(255, 255, 0);">30秒</span><span style="color:rgb(255, 255, 255);">到账，大额无忧。</span></p>
            </div>
        </div>
    </div>

<form target="_self" method="post" name="myFORM" id="myFORM" class="JoinMemForm" action="/app/member/Regster/save.php">
        <input type="hidden" name="key" value="add"/>
        <!--會員資料-->
        <fieldset>
       <legend >注册帐号</legend>    
            <p style="position:relative;height:1px;"><a style="position:absolute;top:0px;"></a></p>
            <!-- 介紹人 -->
             <p style="padding: 7px 0px;">
             <label>介绍人：</label>
             <input type="text" readonly="readonly" name="agent_name" value="<?=$_SESSION["agent_name"]?>"  size="15" maxlength="20" />
             <input type="hidden" name="agent_id" value="<?=$_SESSION["agent_id"]?>" />
            </p>
            <div style="height: 6px;"></div>
                                    <!-- 帳號 -->
            <p style="padding:7px 0px;">
                <label><span class="star">*&nbsp;</span>帐 号：</label>
                <input type="text" name="username" id="username" value="" size="15" maxlength="12"/>
                <img src="/cl/tpl/commonFile/images/ajax-loader.gif" width="16" height="16" alt="loading" id="loading_username" class="loading_pic"/><br/>
                <p class="pbq">		&nbsp;&nbsp;&nbsp;帐号：请输入4-12个字元, 仅可输入英文字母以及数字的组合!!</p>
            </p>

            <!-- 密碼 -->
            <p style="padding: 7px 0px;">
                <label><span class="star">*&nbsp;</span>密 码：</label>
                <input type="password" name="password" id="password" value="" class="password_adv" size="15" maxlength="12" /><br/>
                <p class="pbq">		&nbsp;&nbsp;&nbsp;*密码规则：须为<font color='red'><b>6~12码英文或数字</b></font>且符合0~9或a~z字元</p>
             </p>
            
           <!-- 確認密碼 -->
               <p style="padding: 7px 0px;">
                 <label><span class="star">*&nbsp;</span>确认密码：</label>
                 <input type="password" name="passwd" id="passwd" value="" size="15" maxlength="12" />
               </p>

        </fieldset>
        <!--次要資料-->
        <fieldset>
       <legend>会员资料</legend>
            <p style="position:relative;height:1px;"><a style="position:absolute;top:0px;"></a></p>
                        <!-- 真實姓名 -->
            <p style="padding: 7px 0px;">
                <label><span class="star">*&nbsp;</span>真实姓名：</label>
                <input type="text" name="real_name" id="real_name" value="" size="15" maxlength="30" />
                <img src="/cl/tpl/commonFile/images/ajax-loader.gif" width="16" height="16" alt="loading" id="loading_name" class="loading_pic"/><br/>
                <p class="pbq">		&nbsp;&nbsp;&nbsp;必须与您的银行帐户名称相同，否则不能出款!</p>
            </p>
           
                                                                                                <!-- 手機 -->
            <p style="padding:7px 0px;">
                <label><span class="star">*&nbsp;</span>手机：</label>
                <input type="text" name="tel" id="tel" value="" size="15" maxlength="11"/>
                <img src="/cl/tpl/commonFile/images/ajax-loader.gif" width="16" height="16" alt="loading" id="loading_tel" class="loading_pic"/>
            </p>
            <div style="height: 6px;"></div>
           <!-- 取款密碼 -->
            <p style="padding: 7px 0px;">
            <label><span class="star">*&nbsp;</span>取款密码：</label>
            <select name="pwd1" style="width: 45px;">
                <option label="-" value="-" selected="selected">-</option>
                <option label="0" value="0">0</option>
                <option label="1" value="1">1</option>
                <option label="2" value="2">2</option>
                <option label="3" value="3">3</option>
                <option label="4" value="4">4</option>
                <option label="5" value="5">5</option>
                <option label="6" value="6">6</option>
                <option label="7" value="7">7</option>
                <option label="8" value="8">8</option>
                <option label="9" value="9">9</option>
            </select> 
            <select name="pwd2" style="width: 45px;">
                <option label="-" value="-" selected="selected">-</option>
                <option label="0" value="0">0</option>
                <option label="1" value="1">1</option>
                <option label="2" value="2">2</option>
                <option label="3" value="3">3</option>
                <option label="4" value="4">4</option>
                <option label="5" value="5">5</option>
                <option label="6" value="6">6</option>
                <option label="7" value="7">7</option>
                <option label="8" value="8">8</option>
                <option label="9" value="9">9</option>
            </select>
            <select name="pwd3" style="width: 45px;">
                <option label="-" value="-" selected="selected">-</option>
                <option label="0" value="0">0</option>
                <option label="1" value="1">1</option>
                <option label="2" value="2">2</option>
                <option label="3" value="3">3</option>
                <option label="4" value="4">4</option>
                <option label="5" value="5">5</option>
                <option label="6" value="6">6</option>
                <option label="7" value="7">7</option>
                <option label="8" value="8">8</option>
                <option label="9" value="9">9</option>
            </select>
            <select name="pwd4" style="width: 45px;">
                <option label="-" value="-" selected="selected">-</option>
                <option label="0" value="0">0</option>
                <option label="1" value="1">1</option>
                <option label="2" value="2">2</option>
                <option label="3" value="3">3</option>
                <option label="4" value="4">4</option>
                <option label="5" value="5">5</option>
                <option label="6" value="6">6</option>
                <option label="7" value="7">7</option>
                <option label="8" value="8">8</option>
                <option label="9" value="9">9</option>
            </select>
            <input type="text" name="MultiPwd" value="4" id="HiddenInput" size="0"/><br/>
            <p class="pbq">提款认证必须，请务必记住!</p>
            </p><div style="height: 6px;"></div>
             
                                    <!-- 郵箱 -->
            <p  style="margin-bottom: 13px;">
                <label>*邮箱：</label>
                <input type="text" name="email" id="email" placeholder="请输入您的邮箱" size="15" maxlength="50" />
                <img src="/cl/tpl/commonFile/images/ajax-loader.gif" width="16" height="16" alt="loading" id="loading_email" class="loading_pic"/>
            </p>
                                    <!-- QQ -->
            <p style="padding: 10px 0px;">
                <label>QQ：</label>
                <input type="text" name="qq_num" value="" size="15" maxlength="16"/>
            </p>
            
            <div class="memCash_text"></div>
        </fieldset>
            <!-- 同意條約 -->
            <p id="memCash-agree" style="padding-left: 20px;"><input type="checkbox" name="agree" id="check1" value="Y" style="height:13px;position:relative;top: 3px;"/>我已届满合法博彩年龄﹐且同意各项开户条约。<a href="javascript:void(0);" id="AGREEMENT">"开户协议"</a></p>
                <br/>
            <!-- 確認/重設 -->
            <div id="memCash-confirm" style="margin-left: 52px;">
                <input type="submit" name="OK2" id="OK2" class="joinform_submit" value="确认" />
                <input type="reset" name="CANCEL2" id="CANCEL2" class="joinform_cancel" value="重设" />
            </div>
            <style>
#OK2{background: #a40000;width: 100px;height: 28px; border: none;margin: 0 5px;color: #fff;text-align: center;padding: 0;font-size: 15px;font-family: "Microsoft Yahei";cursor: pointer; border-radius: 2px;}
			
#CANCEL2{    background: #f39800;width: 100px;height: 28px; border: none;margin: 0 5px;color: #fff;text-align: center;padding: 0;font-size: 15px;font-family: "Microsoft Yahei";cursor: pointer; border-radius: 2px;}
#memCash-remark{ font-family: "宋体";}
#memCash-remark ul li{line-height: 24px;
   }
			</style>
            <!-- 備註 -->
            <div id="memCash-remark" align="left" style="margin: 20px 20px;">
            	&nbsp;&nbsp;备注：
            	<br />
                <ul>
                <li>1.标记有&nbsp;<span class="star">*</span>&nbsp;者为必填项目。</li>
                <li>2.手机与取款密码为取款金额时的凭证,请会员务必填写详细资料。</li>
                <li>3.若公司有其它活动会E-MAIL通知，请客户填写清楚。</li>
                </ul>
            </div>
            <div style="height:50px;"></div>
    </form>
    <!--  -->
<div id="Dialog" style="display:none"></div>
</div>
</div>

<div style="clear:both"></div>
</div>







<script type="text/javascript" src="/cl/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/cl/js/jquery-ui-1.8.21.custom.min.js"></script>
<script type="text/javascript" src="/cl/js/pluging/jquery.validate.min.js"></script>
<script type="text/javascript" src="/cl/js/pluging/jquery.bgiframe.js"></script>
<script type="text/javascript" src="/cl/js/tools/password_strength.js"></script>
<script type="text/javascript">
<!--
    var LANGX = 'gb', H = '3593433', ajaxDoing = false, query = {};

    // 防被砍
    if (top.location.hostname != self.location.hostname) {
    	location = '/';
    }
    
    $(function(){
    	// 日期表單 jquery ui datepicker
        $('#myFORM input[name=birthday]').datepicker({
            'changeMonth' : true,
            'changeYear'  : true,
            'dateFormat'  : 'yy/mm/dd', // 泰博九有特例 
            'monthNamesShort': ['1','2','3','4','5','6','7','8','9','10','11','12'],
            'dayNamesMin' : ['星期日', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六'],
            'showOn'      : 'both',
            'buttonImage' : '/cl/tpl/commonFile/images/calendar.gif',
            'buttonImageOnly' : true,
            'yearRange'   : '-100:-18',
            'defaultDate' : '-30y',
            'beforeShow'  : function () {
                setTimeout(function () {$('#ui-datepicker-div').css("z-index", 501);}, 100);
            }
        });
    	
        $(".password_adv").passStrength({
            userid:         "#username",
            shortPass_txt: '密码强度：太短',
            badPass_txt:   '密码强度：弱',
            goodPass_txt:  '密码强度：很好',
            strongPass_txt: '密码强度：强',
            samePassword_txt: '帐号与密码不能相同'
        });
        
        $(".password_adv").keyup(function(){
            if(/[A-Z]/g.test($(this).val())){
                alert('提醒：密码须为小写，大写锁定启用中');
            }
        })

        /**/
        $.validator.addMethod('ajaxCheckData', function(value, element) {
            var id = element.id;
            if (('undefined' != typeof(query[id]) && query[id].value == value) || value == '') { return true; }

            var data = {
                'username' : {'ajax' : 'checkuser', 'a_username' : value},
                'real_name': {'ajax' : 'checkdata', 'a_real_name': value},
                'email'    : {'ajax' : 'checkdata', 'a_email'    : value},
                'tel'      : {'ajax' : 'checkdata', 'a_tel'      : value}
            };
            
            query[id] = {'status' : false, 'value' : value};
            ajaxDoing = true;
            $(element).siblings('.loading_pic').fadeIn();

            $.ajax({
                'url'     : '/app/member/regster/check_user.php',
                'type'    : 'get',
                'data'    : data[id],
                'cache'   : false,
                'timeout' : 30000,
                'error' : function(e, textStatus) {
                    if (textStatus == 'timeout') {
                        alert('网路品质不佳！');
                        $(element).siblings('.loading_pic').fadeOut();
                    }
                },
                'success' : function(data) {
                    if (data == 'block') {
                        location.reload();
                    }
                    var status = (data == '') ? false : true;
                    query[id].status = status;
                    showError(id, status);
                    ajaxDoing = false;
                    $(element).siblings('.loading_pic').fadeOut();
                }
            });
            return true;
        }, '');

        /**/
        $.validator.addMethod('CheckNameRule', function(value, element) {
            var Ch = /^[\u4e00-\u9fa5]+$/;
            var KRW = /^([\uAC00-\uD7AF])*$/gi;
            //var VND = /^([<>\\/\\;])*$/g;
            var nCNY =  /^([^=\-~@#$%^&*();:\\"<>?/|])*$/;
            <!--  -->
                        var En = /^([a-zA-Z]+)$/;
            
            // 韓幣特例
            //var currency = 'RMB'; // $('#myFORM [name=currency]').val()
            var currency = $('#myFORM [name=currency]').val();
            if (currency == 'KRW') {
                return this.optional(element) || (Ch.test(value)) || (En.test(value)) || (KRW.test(value)) || (nCNY.test(value));
            } else if (currency == 'CNY' || currency == 'RMB'){
                return this.optional(element) || (Ch.test(value)) || (En.test(value));
            }else{
                return this.optional(element) || (nCNY.test(value))||((Ch.test(value)) &&(Ch_l.test(value))) ;
                
            }
        },'取款密码!!');

        
        /**/
        $.validator.addMethod('CheckPWD', function(value, element) {
        	var i = 0;
            $('select[name^=pwd]').each(function(){
                if($(this).val() == '-'){
                    $(this).addClass('err');
                    i ++;
                }else{
                    $(this).removeClass('err');
                }
            });
            return ((i == 0) ? true : false);
        },'请输入取款密码!!');

        /**/
        $.validator.addMethod('equalToUsername', function(value, element) {
            return (value == $('#username').val()) ? false : true;
        }, '帐号与密码不能相同');
        
        /**/
        $.validator.addMethod('CheckPWDStrength', function(value, element) {
            return ($.fn.checkstrength(value) < 34 ) ? false : true;
        }, '密码强度：弱');

        /**/
        $.validator.addMethod('CheckIdopt', function(value, element) {
            if($('select[name=idopt]').val() == '')
            $('select[name=idopt]').focus();
            return ($('select[name=idopt]').val() != '') ? true : false;
        }, '请选取身份证或护照选项！');

        /**/
        $.validator.addMethod('CheckID', function(value, element) {
        	var currency = $('#myFORM [name=currency]').val();
            /**/
            if (currency == 'RMB' && /[^a-zA-Z0-9]/g.test(value)) {
                return false;
            }
            
            var idopt = $('select[name=idopt]').val();
            if(idopt && idopt == 'id'){
                /**/
                if (currency == 'KRW') {
                	return this.optional(element) || value.length == 13;
                /**/
                } else if (currency == 'RMB') {
                    return this.optional(element) || $._CheckIDCard(value);
                }
            }
            return true;
        }, '身份证号不正确！');

        /**/
        $.validator.addMethod('CheckBirthday', function(value, element) {
            // 泰博九特例
            if($._InArray(H, [249 ])){
                var BD = /^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/;
            }else{
                var BD = /^[0-9]{4}\/[0-9]{2}\/[0-9]{2}$/;
            }
            return this.optional(element) || (BD.test(value));
        }, '检查生日格式');

        /**/
        $.validator.addMethod('CheckrmNum', function(value, element) {
            return value != '请点击' && value;
        },'验证码请务必输入!!');

        /**/ 
        var validator = $("#myFORM").validate({
            /**/
            'onkeyup'     : false,
            /**/
            'focusCleanup': true,
            /**/
            'focusInvalid': false,
            /**/
            'errorElement': 'span',
            /**/
            'rules'       : {
                'username' : {
                    'required'      : true,
                    'minlength'     : 4,
                    'ajaxCheckData' : true
                },
                'password'  : {
                    'required'  : true,
                    'minlength' : 6,
                    'equalToUsername' : true,
                    'CheckPWDStrength' : true
                },
                'passwd'    : {
                    'required' : true,
                    'equalTo'  : '#password'
                },
                'agree'  : {'required' : true}
            },
            /**/
            'messages' : {
                'username' : {
                    'required'      : $._BuildPrompt('username', '✖ 请输入帐号!!'),
                    'minlength'     : $._BuildPrompt('username', '✖ 帐号：请输入4-12个字元, 仅可输入英文字母以及数字的组合!!',{'width' : 360}),
                    'ajaxCheckData' : $._BuildPrompt('username', '✖ 此帐号已经有人使用了！',{'width' : 160})
                },
                'password' : {
                    'required'  : $._BuildPrompt('password', '✖ 请输入密码!!'),
                    'minlength' : $._BuildPrompt('password', '✖ 请输入6-12个字元的密码!!', {'width' : 170}),
                    'equalToUsername' : $._BuildPrompt('password', '✖ 帐号与密码不能相同!!', {'width' : 170}),
                    'CheckPWDStrength': $._BuildPrompt('password', '✖ 密码强度：弱')
                },
                'passwd'   : {
                    'required' : $._BuildPrompt('passwd', '✖ 确认密码!!'),
                    'equalTo'  : $._BuildPrompt('passwd', '✖ 确认密码错误！请重新输入!!', {'width' : 140})
                },
                'agree' : {'required' : $._BuildPrompt('agree', '✖ 请勾选同意条款!!',{'width' : 120, 'top' : -31, 'left' : -28})}
            },
            /**/
            'submitHandler' : function(){
                if (ajaxDoing) {
                    alert('资料验证中!');
                    return false;
                }
            	for (var i in query) {
            		if (!query[i]['status']) {
            			return false;
            		}
            	}
               if(confirm("是否确定写入?")) {
                    $('form input:submit').attr('disabled','disabled');
                    document.myFORM.submit();
                }
            }
        });

        /**/
        
        /**/
        $('#myFORM input[name=real_name]').rules('add', {
            'required' : true,
            'messages' : {'required' : $._BuildPrompt('real_name', '✖ 请输入真实姓名!!',{'width' : 110})}
        });
        
        /**/
        $('#myFORM input[name=real_name]').rules('add', {
            'CheckNameRule' : true,
            'messages' : {'CheckNameRule' : $._BuildPrompt('real_name', '✖ 请勿输入特殊字元!!',{'width' : 130})}
        });
                        /**/
        var _real_name = $('input[name=real_name]');
		_real_name.val(_real_name.val().replace(/[\\]/g,''));
                /**/
        $('#myFORM input[name=real_name]').rules('add', {
            'ajaxCheckData' : true,
            'messages' : {'ajaxCheckData' : $._BuildPrompt('real_name', '✖ 姓名已注册, 请洽客服人员!!',{'width' : 180})}
        });
        
        /**/
                

        /**/
        
                

        /**/
        
        /**/
        
        /**/
        
        /**/
        
        /**/
        
        /**/
        
        /**/
        
        /**/
        $('#myFORM input[name=tel]').rules('add', {
            'required' : true,
            'messages' : {'required' : $._BuildPrompt('tel', '✖ 手机与取款密码为取款金额时的凭证,请会员务必填写详细资料。',{'positionType' : 'bottomLeft', 'top' : 9, 'width' : 360,'left':-140})}
        });
        
        /**/
        
        /**/
        $('#myFORM input[name=MultiPwd]').rules('add', {
            'CheckPWD' : true,
            'messages' : {'CheckPWD' : $._BuildPrompt('MultiPwd', '✖ 请输入取款密码!!',{'positionType' : 'bottomLeft', 'top' : 9, 'left' : -150, 'width' : 120})}
        });
        
        /**/
        
        /**/
        
        /**/
        $('#myFORM input[name=email]').rules('add', {
            'email' : true,
            'messages' : {'email' : $._BuildPrompt('email', '✖ E-mail格式不正确!!',{'positionType' : 'bottomLeft','width' : 120,'left' : -50,'top' : 10})}
        });
        
        /**/
        
        /**/
        $('#myFORM').find('select[name^=pwd]').focus(function(){
            $('.Error_MultiPwd').remove();
        /**/
        }).end().find('input[name=CANCEL2]').click(function(){
            validator.resetForm();
        });

        /**/
        $('input[name=rmNum]').keyup(function(e){
            this.value = (this.value.length > 6) ? this.value.substring(0,6) : this.value;
            $('#myFORM').find('select[name=rmNum]').focus();
        });

        /**/
        $('input[name=qq_num]').keyup(function(){
            if($._InArray(H, [162,222,3817573 ]))
                this.value = this.value.replace(/[^\x00-\xff]/g,'');
            else
                this.value = this.value.replace(/[^0-9]/g,'');
        }).focus(function(){
            $(this).blur(function(){
                if($._InArray(H, [162,222,3817573]))
                    this.value = (/[^\x00-\xff]/g.test(this.value)) ? '' : this.value;
                else
                    this.value = (/[^0-9]/g.test(this.value)) ? '' : this.value;
            });
        });

        /**/
        $('input[name=tel]').keyup(function(){
            this.value = this.value.replace(/[^0-9]/g,'');
        }).focus(function(){
            $(this).blur(function(){ this.value = (/[^0-9]/g.test(this.value)) ? '' : this.value; });
        });

        /**/
        $('input[name=username], input[name=agName], input[name=Intr],input[name=rmNum]').keyup(function(){
            this.value = this.value.replace(/[^a-zA-Z0-9]/g,'');
        }).focus(function(){
            $(this).blur(function(){ this.value = (/[^a-zA-Z0-9]/g.test(this.value)) ? '' : this.value; });
        });

        /**/
        $('input[name=password], input[name=passwd]').keyup(function(){
            this.value = this.value.replace(/[^a-z0-9]/g,'');
        });

        /**/
        $('input[name=email]').keyup(function(){
            this.value = this.value.replace(/[^\x00-\xff]/g,'');
        }).focus(function(){
            $(this).blur(function(){ this.value = (/[^\x00-\xff]/g.test(this.value)) ? '' : this.value; });
        });

        /**/
        $('input[name=english_name]').keyup(function(){
        	var currency = $('#myFORM [name=currency]').val();
            if (currency == 'CNY' || currency == 'RMB'){
                var Limit = /[^a-zA-Z]/g ;
            }else{
                var Limit = /[^a-zA-Z\s'_\ ]/g ;
            }
            this.value = this.value.replace(Limit,'');
        }).focus(function(){
        	var currency = $('#myFORM [name=currency]').val();
            if (currency == 'CNY' || currency == 'RMB'){
                var Limit = /[^a-zA-Z]/g ;
            }else{
                var Limit = /[^a-zA-Z'_\s]/g;
            }
        });

        /**/
        $('input[name=country], input[name=english_name]').focus(function(){
            $(this).blur(function(){
                this.value = this.value.replace(/(^\s*)|(\s*$)/g,'');
            });
        });

        /**/

        $("input[name='rmNum']").bind("focus", function(){
            document.getElementById('vPic').src = 'yzm.php'; 
            $("#vPic").show();
            return false;
        });
        $("#vPic").click(function(){
            $("input[name='rmNum']")[0].focus();
        });

        /**/
        $('#Dialog').bgiframe();

        /**/
        $('#AGREEMENT').click(function(){
                $.get('/app/member/regster/agreement.php', function(data){
                    $._Dialog('"开户协议"', data, 600, 'auto');
                    $('#container').css('color', '#000000');
					});
                });

        /**/
        $('#SendEmailAgain').click(function(){
            var Html = '<form name="SendForm" id="SendForm">' + 
            '<table width="100%" border="0" cellspacing="1" cellpadding="0" style="margin-top:20px;"><tr>' + 
                '<td width="100" height="30" align="right"><span class="star">*&nbsp;</span>帐 号：</td>' + 
                '<td><input type="text" name="username" size="15" maxlength="12"/></td>' + 
            '</tr><tr>' + 
                '<td height="30" align="right"><span class="star">*&nbsp;</span>密 码：</td>' + 
                '<td><input type="password" name="passwd" size="15" maxlength="12"/></td>' + 
            '</tr><tr>' + 
                '<td height="30" align="right"><span class="star">*</span>&nbsp;邮箱：</td>' + 
                '<td><input type="text" name="email" size=15""/></td>' + 
            '</tr><tr>' + 
                '<td height="26"></td>' + 
                '<td><input type="submit" name="SendEmail" value=" 确认 " class="za_button"/></td>' + 
            '</tr></table></form>';
            $._Dialog('重发确认邮件', Html, 370, 220);

            var validator2 = $("#SendForm").validate({
                /**/
                'onkeyup'     : false,
                /**/
                'focusCleanup': true,
                /**/
                'errorElement': 'span',
                /**/
                'rules'       : {
                    'username' : {'required' : true},
                    'passwd' : {
                        'required'  : true,
                        'minlength' : 6
                    },
                    'email'    : {
                        'required' : true,
                        'email'    : true
                    }
                },
                /**/
                'messages' : {
                    'username' : {'required' : $._BuildPrompt('username', '✖ 请输入帐号!!', {'left' : -50})},
                    'passwd' : {
                        'required'  : $._BuildPrompt('password', '✖ 请输入密码!!', {'left' : -50}),
                        'minlength' : $._BuildPrompt('password', '✖ 请输入6-12个字元的密码!!', {'width' : 160, 'left' : -50})
                    },
                    'email'    : {
                        'required' : $._BuildPrompt('email', '✖ 请输入有效的邮箱！', {'positionType' : 'bottomLeft','left' : -50,'top' : 10}),
                        'email'    : $._BuildPrompt('email', '✖ E-mail格式不正确!!',{'width' : 120, 'left' : -50})
                    }
                },
                /**/
                'submitHandler' : function(){
                    var Serialize = $('#SendForm').serialize();
                    $('input[name=SendEmail]').attr('disabled','disabled');
                    
                    $.post('resend.php', Serialize, function(data){
                        if(data){
                            switch(data){
                                case '1' :
                                    alert('确认邮件已寄出!!');
                                    $('#Dialog').dialog('destroy');
                                    break;
                                case '2' :
                                    alert('帐号或密码错误!!');
                                    $('input[name=SendEmail]').attr('disabled','');
                                    break;
                                case '3' :
                                    alert('电邮错误!!');
                                    $('input[name=SendEmail]').attr('disabled','');
                                    break;
                                default:
                                    break;
                            }
                        }
                    });
                    return false;
                }
            });
        });
        
        /**/
        $('#SendMobileAgain').click(function(){
            var Html = '<form name="SendMobileForm" id="SendMobileForm">' + 
            '<input type="hidden" name="M_SS" id=M_SS value="">'+
            '<input type="hidden" name="M_SR" id="M_SR" value="">'+
            '<input type="hidden" name="M_TS" id="M_TS" value="">'+
            '<table width="100%" border="0" cellspacing="1" cellpadding="0" style="margin-top:5px;"><tr>' + 
                '<td  height="30" align="right"><span class="star">*&nbsp;</span>会员帐号：</td>' + 
                '<td ><input type="text" name="MobileUserName" id="MobileUserName" size="15" maxlength="12"/></td>' + 
            '</tr><tr>' + 
                '<td height="30" align="right"><span class="star">*&nbsp;</span>取款密码：</td>' + 
                '<td><input type="password" name="MobilePasswd" id="MobilePasswd" size="4" maxlength="4"/></td>' + 
            '</tr><tr>' + 
                '<td height="30" align="right"><span class="star">*</span>&nbsp;验证码：</td>' + 
                '<td><input type="text" name="MobileRmNum" id="MobileRmNum" size="4" maxlength="4" onfocus="getKey();" />'+
                '<img id="M_vPic" src="/cl/tpl/commonFile/images/gdpic/pic/bg000.png" border="1" align="absmiddle" style="display:none;cursor:pointer;" alt="( 点选此处产生新验证码 )" onclick="getKey();"></td>' + 
            '</tr><tr>' + 
                '<td height="26"></td>' + 
                '<td><input type="submit" name="SendMobile" id="SendMobile" value=" 确认 " class="za_button"  /></td>' + 
            '</tr><tr>' +
                '<td id="error_text" COLSPAN=2 align="center" ></td>' + 
            '</tr></table></form>';
            $._Dialog('请输入帐号及取款密码', Html, 320, 200);

            var validator2 = $("#SendMobileForm").validate({
                /**/
                'onkeyup'     : false,
                /**/
                'focusCleanup': true,
                /**/
                'errorElement': 'span',
                /**/
                'rules'       : {
                    'MobileUserName' : {'required' : true},
                    'MobilePasswd' : {
                        'required'  : true,
                        'minlength' : 4
                    },
                    'MobileRmNum'    : {
                        'required' : true,
                        'minlength' : 4
                    }
                },
                /**/
                'messages' : {
                    'MobileUserName' : {'required' : $._BuildPrompt('MobileUserName', '✖ 请输入帐号!!', {'left' : -50})},
                    'MobilePasswd' : {
                        'required'  : $._BuildPrompt('MobilePasswd', '✖ 请输入密码!!', {'left' : -50}),
                        'minlength' : $._BuildPrompt('MobilePasswd', '✖ 密码长度不对！！', { 'left' : -50})
                    },
                    'MobileRmNum'    : {
                        'required' : $._BuildPrompt('MobileRmNum', '✖ 请输入验证码!!', {'positionType' : 'bottomLeft','left' : 15,'top' : 10}),
                        'minlength' : $._BuildPrompt('MobilePasswd', '✖验证码长度不对！！', {'width' : 100, 'left' :15})
                       
                    }
                },
                /**/
                'submitHandler' : function(){
                    var Serialize = $('#SendMobileForm').serialize();
                    $('input[name=SendMobileForm]').attr('disabled','disabled');
                    
                    $.post('forget_pwd.php?uid=guest&ajax=1&noAlert=1', {
                        SS: $('#M_SS').val(),
                        SR: $('#M_SR').val(),
                        TS: $('#M_TS').val(),
                        action: 1 ,
                        username: $('#MobileUserName').val(),
                        password: $('#MobilePasswd').val(),
                        rmNum: $("#MobileRmNum").val()
                    }, function(data){
                        if(data.result){
                            alert(data.msg);
                            $('#Dialog').dialog("close");
                        }else{
                            $('#error_text').html(""+data.msg);
                            $("#MobileRmNum").val('');
                        }
                    },"json");
                    return false;
                }
            });
        });
        
        
        /**/
        $('#username, #real_name, #idcode, #email, #tel').focus(function() {
            showError(this.id, true);
        }).blur(function() {
            var id = this.id;
            if ('undefined' != typeof(query[id]) && !query[id].status && !ajaxDoing && $('.Error_' + id + ':visible').length == 0) {
                showError(id, false);
            }
        });;
    });

    function showError(name, status) {
        var errMes = $('.Error_ajax_' + name);
        if (status) {
            errMes.hide();
        } else {
            if (errMes.length > 0) { 
                errMes.show();
                return; 
            }
            switch (name) {
                case 'username' : 
                    $('#username').after($._BuildPrompt('ajax_username', '✖ 此帐号已经有人使用了！', {'width' : 160}));
                    break;
                case 'real_name' : 
                    $('#real_name').after($._BuildPrompt('ajax_real_name', '✖ 姓名已注册, 请洽客服人员!!', {'width' : 180}));
                    break;
                case 'idcode' : 
                    $('#idcode').after($._BuildPrompt('ajax_idcode', '✖ 此身份证号/护照号码已经有人使用了！!!', {'showArrow' : false, 'width' : 180, 'top' : -5, 'left' : 2}));
                    break;
                case 'tel' : 
                    $('#tel').after($._BuildPrompt('ajax_tel', '✖ 此手机已经有人使用了！!!', {'positionType' : 'bottomLeft', 'top' : 7, 'width' : 180}));
                    break;
                case 'email' : 
                    $('#email').after($._BuildPrompt('ajax_email', '✖ 此电邮已经有人使用了！!!', {'width' : 180}));
                    break;
            }
        }
    }

    $.extend({
        /**/
        '_Dialog' : function(Title, Data, Width, Height){
            $('#Dialog').dialog({
                'title'     : Title,
                'width'     : Width,
                'minWidth'  : Width,
                'height'    : Height,
                'minHeight' : Height,
                'modal'     : true,
                'bgiframe'  : true,
                'show'      : 'blind',
                'hide'      : 'blind',
                'position'  : ["center",100]
            });
            $('#Dialog').html(Data);
        },
        /**/
        '_BuildPrompt' : function(Name, PromptText, o) {
            var options = {
                'showArrow'    : true,
                'positionType' : 'topRight',
                'width'        : 100,
                'top'          : -28,
                'left'         : -27,
                'opacity'      : 0.8,
                'AMarginLeft'  : 13
            };
            options = $.extend(options, o);
            
            if(LANGX != 'gb' && LANGX != 'big5')
                options.width += 50;

            /**/
            var prompt = $('<div>');
            prompt.addClass("FormError");
            /**/
            var promptContent = $('<div>').addClass("FormErrorC").css('width', options.width).html(PromptText).appendTo(prompt);
            /**/
            if (options.showArrow) {
                var arrow = $('<div>').addClass("FormErrorA").css('marginLeft', options.AMarginLeft);
                switch (options.positionType) {
                    case "bottomLeft":
                    case "bottomRight":
                        prompt.find(".FormErrorC").before(arrow);
                        arrow.addClass("FormErrorABottom").html('<div style="width:1px;border:none;background: #DDDDDD;"><!-- --></div><div style="width:3px;border:none;background:#DDDDDD;"><!-- --></div><div style="width:1px;border-left:2px solid #DDDDDD;border-right:2px solid #ddd;border-bottom:0 solid #ddd;"><!-- --></div><div style="width:3px;"><!-- --></div><div style="width:5px;"><!-- --></div><div style="width:7px;"><!-- --></div><div style="width:9px;"><!-- --></div><div style="width:11px;"><!-- --></div><div style="width:13px;border:none;"><!-- --></div><div style="width:15px;border:none;"><!-- --></div>');
                        break;
                    case "topLeft":
                    case "topRight":
                        arrow.html('<div style="width:15px;border:none;"><!-- --></div><div style="width:13px;border:none;"><!-- --></div><div style="width:11px;"><!-- --></div><div style="width:9px;"><!-- --></div><div style="width:7px;"><!-- --></div><div style="width:5px;"><!-- --></div><div style="width:3px;"><!-- --></div><div style="width:1px;border-left:2px solid #ddd;border-right:2px solid #ddd;border-bottom:0 solid #DDDDDD;"><!-- --></div><div style="width:3px;border:none;background:#DDDDDD;"><!-- --></div><div style="width:1px;border:none;background: #DDDDDD;"><!-- --></div>');
                        prompt.append(arrow);
                        break;
                }
            }
            /**/
            prompt.css({
                "top": options.top,
                "left": options.left,
                "opacity": options.opacity
            });
            return $('<span>').addClass("Error_" + Name).css('position', 'relative').css('vertical-align', 'top').append(prompt.css('position','absolute'));
        },
        /**/
        '_CheckIDCard' : function(num) {
            var len = num.length, re;
            if (len == 15)
                re = new RegExp(/^(\d{6})()?(\d{2})(\d{2})(\d{2})(\d{3})$/);
            else if (len == 18)
                re = new RegExp(/^(\d{6})()?(\d{4})(\d{2})(\d{2})(\d{3})(\d)$/);
            else{
                return false;
            }
            var a = num.match(re);
            if (a != null){
                if (len==15){
                    var D = new Date("19"+a[3]+"/"+a[4]+"/"+a[5]);
                    var B = D.getYear()==a[3]&&(D.getMonth()+1)==a[4]&&D.getDate()==a[5];
                }else{
                    var D = new Date(a[3]+"/"+a[4]+"/"+a[5]);
                    var B = D.getFullYear()==a[3]&&(D.getMonth()+1)==a[4]&&D.getDate()==a[5];
                }
                if (!B) return false;
            }
            return true;
        },
        /**/
        '_InArray' : function (stringToSearch, arrayToSearch) {
            for (s = 0; s < arrayToSearch.length; s++) {
                thisEntry = arrayToSearch[s].toString();
                if (thisEntry == stringToSearch) {
                    return true;
                }
            }
            return false;
        }
    });
//-->
function HotNewsHistory(){
    window.open('/app/member/help/noticle.php','newwindow','menubar=no,status=yes,scrollbars=yes,top=150,left=408,toolbar=no,width=575,height=550');
}
$(window.parent.parent.document).find("#mainFrame").height( $(document.body).height() );
</script>



</body>
</html>