<?php
if(!isset($_SESSION)){ session_start();}

header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
include "../../app/member/include/address.mem.php";
include "../../app/member/include/com_chk.php";
include "../../app/member/common/function.php";
include "../../app/member/utils/time_util.php";
include "../../app/member/class/six_lottery_odds.php";
include "../../app/member/class/six_lottery_schedule.php";
include "../../app/member/class/user_group.php";
$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/cache/ltConfig.php");
include_once($C_Patch."/app/member/cache/website.php");
include_once($C_Patch."/member/lt/lt_year_change.php");


$rType = $_GET["rtype"];
$rTypeN = $_GET["rtypeN"];
$showTableN = $_GET["showTableN"];
//echo "<script>alert(333)</script>";
//exit;

if($web_site['show_caipiao']=="1"){
    $showCaipiao = "";
}else{
    $showCaipiao = 'style="display: none;"';
}

include_once "../../member/lt/lt_util.php";

if($rType=="NAP"){
    $odds_NAP1 = six_lottery_odds::getOdds("NAP1");
    $odds_NAP2 = six_lottery_odds::getOdds("NAP2");
    $odds_NAP3 = six_lottery_odds::getOdds("NAP3");
    $odds_NAP4 = six_lottery_odds::getOdds("NAP4");
    $odds_NAP5 = six_lottery_odds::getOdds("NAP5");
    $odds_NAP6 = six_lottery_odds::getOdds("NAP6");
    include_once "pages/NAP.php";
}elseif($rType=="NX"){
    $odds_NX = six_lottery_odds::getOdds("NX");
    include_once "pages/NX.php";
}elseif($rType=="CH"){
    $odds_CH = six_lottery_odds::getOdds("CH");
    include_once "pages/CH.php";
}elseif($rType=="LX"){
    $odds_LX2 = six_lottery_odds::getOdds("LX2");
    $odds_LX3 = six_lottery_odds::getOdds("LX3");
    $odds_LX4 = six_lottery_odds::getOdds("LX4");
    $odds_LX5 = six_lottery_odds::getOdds("LX5");

    $odds_LF2 = six_lottery_odds::getOdds("LF2");
    $odds_LF3 = six_lottery_odds::getOdds("LF3");
    $odds_LF4 = six_lottery_odds::getOdds("LF4");
    $odds_LF5 = six_lottery_odds::getOdds("LF5");
    include_once "pages/LX.php";
}elseif($rType=="NI"){
    $odds_NI = six_lottery_odds::getOdds("NI");
    include_once "pages/NI.php";
}elseif($rType){
	//echo $rType;exit;
    echo getCommonPage($rType,$lowestMoney, getNowPlayPage($rType),$maxMoney,$showTableN,$showCaipiao,$zodiac);
}else{
    if($rType=="SPbside"){
        echo getCommonPage("SPbside",$lowestMoney, getNowPlayPage("SPbside"),$maxMoney,"0",$showCaipiao,$zodiac);
    }else{
        echo getCommonPage("SP",$lowestMoney, getNowPlayPage("SP"),$maxMoney,"0",$showCaipiao,$zodiac);
    }
}


function getCommonPage($rType,$lowestMoney,$nowPlayPage,$maxMoney,$showTableN="0",$showCaipiao='style="display: none;"',$zodiac){

    $page = '
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta content="telephone=no" name="format-detection" />
    <title>sk</title>
    <link rel="stylesheet" href="/style/member/pitaya.css?66341e7" />
    <link rel="stylesheet" href="/style/AlertBox.css?66341e7" />
    <link rel="stylesheet" href="/style/ConfirmBox.css?66341e7" />
    <link href="/TPL/C_TYPE_IPL/style/contextmenu.css?66341e7" rel="stylesheet" />
    <link href="/TPL/C_TYPE_IPL/style/View.css?66341e7" rel="stylesheet" />
    <link href="/TPL/C_TYPE_IPL/style/jquery.GoldUI.css?66341e7" rel="stylesheet" />
    <link href="/TPL/C_TYPE_IPL/style/tpl.css?66341e7" rel="stylesheet" />
    <link href="/TPL/C_TYPE_IPL/style/zindex.css?66341e2" rel="stylesheet" />
    <!--[if lte IE 6]>
    <link href="/style/member/ie6.css?66341e7" rel="stylesheet" />
    <![endif]-->
    <!--[if IE 7]>
    <link href="/style/member/ie7.css?66341e7" rel="stylesheet" />
    <![endif]-->
    <!--[if IE 8]>
    <link href="/style/member/ie8.css?66341e7" rel="stylesheet" />
    <script src="/js/ie8.js?66341e7"></script>
    <![endif]-->
    <!--[if IE 9]>
    <link href="/style/member/ie9.css?66341e7" rel="stylesheet" />
    <![endif]-->
    <script src="/js/marquee.js?66341e7"></script>
    <script src="/js/jquery-1.7.1.js?66341e7"></script>
    <script src="/js/jquery.contextmenu.js?66341e7"></script>
    <script src="/js/View.js?66341e7"></script>
    <script src="/js/mobileStyle.js?66341e7"></script>
    <script src="/js/C2R.js?66341e7"></script>
    <script src="/js/PC/ltOrder.js?66341e7"></script>
    <script src="/js/PC/lt_show.js?16341e9"></script>
    <!--正碼過關-->
    <script src="/js/PC/lt_nap_show.js?66341e7"></script>
    <!--連碼-->
    <script src="/js/PC/lt_ch_show.js?66341e8"></script>
    <!--合肖-->
    <script src="/js/PC/lt_nx_show.js?66341e7"></script>
    <!--連肖連尾-->
    <script src="/js/PC/lt_lx_show.js?66341e7"></script>
    <!--自選不中-->
    <script src="/js/PC/lt_ni_show.js?66341e7"></script>
    <!--alertBox-->
    <script src="/inte/js/AlertBox.js?66341e7"></script>
    <script src="/inte/js/ConfirmBox.js?66341e7"></script>
    <script src="/inte/js/overMenu.js?66341e7"></script>
    <script src="/inte/js/superfish.js?66341e7"></script>
    <script src="/inte/js/group_menu.js?66341e7"></script>
    <script src="/inte/js/jquery.GoldUI.js?66341e7"></script>
    <script src="/inte/js/timeclock.js?66341e7"></script>
    <script src="/inte/js/Lang.js?key=charset&amp;66341e7"></script>
    <script src="/inte/js/Lang/package.js?66341e7"></script>
    <script src="/inte/js/Lunar.js?66341e7"></script>
    <script src="/inte/js/memberCenter.js?66341e7"></script>
    <script src="/inte/js/zindexSort.js?66341e7"></script>
    <script src="/pt/assets/js/lib/sound.js?890f9dc"></script>
    <!--[if lte IE 8]>
    <script src="/js/html5.js?66341e7"></script>
    <script src="/inte/js/respond.src.js?66341e7"></script>
    <![endif]-->
    <!--[if IE 6]>
    <script src="/js/TouchView.js?66341e7"></script>
    <![endif]-->
    <script>
	
        <!--
        window.onload = function(){
            //self.zindexSort.test();
            ccMarquee("marquee");
            self.zindexSort.setup();
            $("#ui-btn-games > ul").superfish();
            $("#ui-btn-games > ul > li > a:not(.sf-no-ul)").bind("click", function () {return false;});
            //self.group_menu.install($("#wager_groups"));
            var _overMenu = new pitayaMenu();
            _overMenu.init([$("#wager_groups > a"),$("#wager_groups > nav, #wager_groups > dl"),null]);
            //ViewBox
            self.ViewBox.install($("ul#ui-btn-features > li > a:not(.logout), #game_result"));
            if (document.getElementById("content") && document.getElementById("rde-contextmenu")) {
                var _opt = [];
                $("#rde-contextmenu > a").each(function (i) {
                    var me = this;
                    var _action = function () {self.ViewBox.single(me)};
                    var _icon = (this.getAttribute("data-icon")) ? this.getAttribute("data-icon") : "/TPL/pitaya/images/wi0009-16.gif";
                    _opt.push({text: this.title, icon : _icon, alias: this.title, action : _action });
                });
                var _option = { width : 150, items : _opt };
                $("#content").contextmenu(_option);
            }
            var nx_array = {};
            var ary = {};
            var _menu = $("#wager_groups a,.second-nav  a"), _inner = document.getElementById("content_inner"), _title = $("#c_rtype"), _ad = $("#AD"), _ball = $("#Ball"), _grp = $("#GrpBtn"), _rule = $("#ShowRule2");
            //var _menu = null, _inner = document.getElementById("content_inner"), _title = $("#c_rtype"), _ad = $("#AD"), _ball = $("#Ball"), _grp = $("#GrpBtn"), _rule = $("#ShowRule2");
            var _type = "text";
            var json = {
                hall:0,
                menu:_menu,
                inner:_inner,
                title:_title,
                ad:_ad,
                ball:_ball,
                grp:_grp,
                rule:_rule ,
                tips : document.getElementById("Tips").style,
                '.$zodiac.'
                _number : _type
            };
            var _lt = self.ShowTable.instance(json);
            _lt.init("'.$rType.'","'.$showTableN.'");
            _lt.bindDisplay_closeTime(document.getElementById("FCDH"));//綁定顯示關盤倒數欄位
            _lt.setBetMode(1);
            _lt.run();
            var _rightBar = $("#RightBar2"), _ruleText = $("#RuleText2");
            _rightBar.bind("click", function () {
                if (this.parentNode.x != 1) {
                    _ruleText.show();
                    this.parentNode.style.width = "";
                    this.parentNode.x = 1;
                } else {
                    _ruleText.hide();
                    this.parentNode.style.width = "30px";
                    this.parentNode.x = 0;
                }
            });
            self.GoldUI.installDrag("betMove", self.betSpace.bet.onDragBet);
            self.timeclock.install(document.getElementById("HKTime"), document.getElementById("iTime"));
            $.ajax({
                url : "/member/select_lt.php",
                type : "GET",
                dataType : "script"
            });
        }
        //-->
    </script>
    <style>
    @media all and (min-width: 1025px) {
        #box_body {
            width:1024px;
            margin:0 auto;
        }
        body {
             
			heigh:10000px;
        }
        #AD {
            left:auto;
            right : 50%;
            margin-right:-500px;
        }
    }
    </style>
</head>
<body>

<div id="ui-marquee">
    <div class="marquee"><span id="Msg">~欢迎光临~ </span></div>
</div>
<div id="box_body" class="bg2yellow">
<link type="text/css" rel="stylesheet" href="lt.css"/>
<script type="text/javascript" src="/cl/js/common.js"></script>
<script language="javascript" src="/member/lottery/js/caipiao.js"></script>
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
                                   <a href="javascript:void(0);" onclick="click_url(\'/member/lottery/Cqssc.php\')" class="nav-item ">重庆时时彩 </a>
                                    <a href="javascript:void(0);" onclick="click_url(\'/member/lottery/tjssc.php\')" class="nav-item ">天津时时彩 </a>
                                   <a href="javascript:void(0);" onclick="click_url(\'/member/lottery/shssl.php\')" class="nav-item ">上海时时乐</a>
                                    <img src="/pic/img_left.png" class="img_lt">
                            </span>
                    </li>
                    <li id="nav4">
                                <span class="small">
                                        <em class="em">快乐彩</em>
                                        <img class="hide sj_img" src="/pic/sj_img.png">
                                        <img src="/pic/img_left.png" class="img img_hide">
                                </span>
                                <span class="eventtext" style="display: none;">
                                        <a href="javascript:void(0);" onclick="click_url(\'/member/lottery/kl8.php\')" class="nav-item ">北京快乐8</a>
                                        <img src="/pic/img_left.png" class="img_lt">
                                </span>
                        </li>
                    <li id="nav4">
                                <span class="small">
                                        <em class="em">十分彩</em>
                                        <img class="hide sj_img" src="/pic/sj_img.png">
                                        <img src="/pic/img_left.png" class="img img_hide">
                                </span>

                                <span class="eventtext" style="display: none;">
                                       <a href="javascript:void(0);" onclick="click_url(\'/member/lottery/tjsf.php\')" class="nav-item ">天津十分彩</a>
                                        <a href="javascript:void(0);" onclick="click_url(\'/member/lottery/gxsf.php\')" class="nav-item ">广西十分彩</a>
                                       <a href="javascript:void(0);" onclick="click_url(\'/member/lottery/cqsf.php\')" class="nav-item ">重庆十分彩</a>
                                       <a href="javascript:void(0);" onclick="click_url(\'/member/lottery/gdsf.php\')" class="nav-item ">广东十分彩</a>
                                        <img src="/pic/img_left.png" class="img_lt">
                                </span>
                        </li>
                    <li id="nav4">
                        <span class="small selected btl">
                            <em class="em">一般彩球</em>
                            <img class="sj_img" src="/pic/sj_img.png">
                            <img src="/pic/img_left.png" class="img img_hide hide">
                        </span>

                        <span class="eventtext">
                            <a href="javascript:void(0);" onclick="click_url(\'/member/lottery/3d.php\')" class="nav-item ">福彩3D </a>
                            <a href="javascript:void(0);" onclick="click_url(\'/member/lt/?rtype=SPbside\',1,\'\',false)" class="nav-item current">六合彩 </a>
                            <img src="/pic/img_left.png" class="img_lt">
                        </span>
                    </li>
                        <li id="nav4">
                                <span class="small">
                                        <em class="em">北京彩</em>
                                        <img class="hide sj_img" src="/pic/sj_img.png">
                                        <img src="/pic/img_left.png" class="img img_hide">
                                </span>

                                <span class="eventtext" style="display: none;">
                                    <a href="javascript:void(0);" onclick="click_url(\'/member/lottery/pk10.php\')" class="nav-item ">北京赛车pk拾 </a>
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
                                       <a href="javascript:void(0);" onclick="click_url(\'/member/lottery/pl3.php\')" class="nav-item ">排列3</a>
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
                                    <a href="javascript:void(0);" onclick="click_url(\'/member/lottery/gd11.php\')" class="nav-item ">广东11选5 </a>
                                    <img src="/pic/img_left.png" class="img_lt">
                            </span>
                        </li>
                        
                </ul>
            </div>
        </ul>

<div id="box_range">
<div id="header">
    <h1>sk</h1>
    <div class="game-nav">
	<li class="layer1-li" style="background:url(/TPL/C_TYPE_IPL/images/yellow/btn_bg.jpg) no-repeat left top;list-style: none;">
                    <a class="layer1-a sf-no-ul" href="/member/lt/" style="padding-right: 1em;
    font-weight: bold;
    text-shadow: 0px 0px 1px black, -1px -1px 1px black;
    height: 28px;
    line-height: 28px;
    display: block;
    padding-left: 32px;
    border-left: 1px;
    border-right: 1px;
    color: white;">
                        <b></b>
                        六合彩
                    </a>
                </li>
        <div id="ui-btn-games" style="left:120px">
            <ul class="layer1 sf-menu bg2yellow">
                <li class="layer1-li" style="display:none;">
                    <a class="layer1-a sf-no-ul" href="/member/lt/">
                        <b></b>
                        六合彩
                    </a>
                </li>
                <li '.$showCaipiao.' class="layer1-li" style="display:none;">
                    <a class="layer1-a" href="#NORMAL">
                        <b></b>
                        一般彩票
                    </a>
                    <ul class="layer2" style="display:none">
                        <li >
                            <a href="/member/b3/b3.php?gtype=D3&rtype=W1">3D彩</a>
                        </li>
                        <li >
                            <a href="/member/b3/b3.php?gtype=P3&rtype=W1">排列3</a>
                        </li>
                    </ul>
                </li>
                <li '.$showCaipiao.' class="layer1-li" style="display:none;">
                    <a class="layer1-a" href="#TT">
                        <b></b>
                        时时彩
                    </a>
                    <ul class="layer2" style="display:none">
                        <li >
                            <a href="/member/b3/b3.php?gtype=T3&rtype=W1">上海时时乐</a>
                        </li>
                        <li >
                            <a href="/member/b5/b5.php?gtype=CQ&rtype=605">重庆时时彩</a>
                        </li>
                        <li >
                            <a href="/member/b5/b5.php?gtype=TJ&rtype=605">天津时时彩</a>
                        </li>
                        <li >
                            <a href="/member/b5/b5.php?gtype=JX&rtype=605">江西时时彩</a>
                        </li>
                    </ul>
                </li>
                <li '.$showCaipiao.' class="layer1-li" style="display:none;">
                    <a class="layer1-a" href="#FF">
                        <b></b>
                        分分彩
                    </a>
                    <ul class="layer2" style="display:none">
                        <li >
                            <a href="/pt/mem/order/GXSF">广西十分彩</a>
                        </li>
                        <li >
                            <a href="/pt/mem/order/GDSF">广东十分彩</a>
                        </li>
                        <li >
                            <a href="/pt/mem/order/TJSF">天津十分彩</a>
                        </li>
                        <li >
                            <a href="/pt/mem/order/GD11">广东十一选五</a>
                        </li>
                        <li >
                            <a href="/pt/mem/order/BJPK">北京PK拾</a>
                        </li>
                    </ul>
                </li>
                <li '.$showCaipiao.' class="layer1-li" style="display:none;">
                    <a class="layer1-a" href="#KENO">
                        <b></b>
                        KENO
                    </a>
                    <ul class="layer2" style="display:none">
                        <li >
                            <a href="/pt/mem/order/BJKN">北京快乐8</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <nav id="NORMAL">
                <a data-gtype="LT_Content" href="/member/lt/">六合彩</a>
                <a data-gtype="D3_Content" href="/member/b3/b3.php?gtype=D3&amp;rtype=W1">3D彩</a>
                <a class="last" data-gtype="P3_Content" href="/member/b3/b3.php?gtype=P3&amp;rtype=W1">排列三</a>
            </nav>
            <nav id="TT">
                <a data-gtype="BT_Content" href="/member/b3/b3.php?gtype=BT&amp;rtype=W1">BB3D</a>
                <a data-gtype="T3_Content" href="/member/b3/b3.php?gtype=T3&amp;rtype=W1">上海时时乐</a>
                <a data-gtype="CQ_Content" href="/member/b5/b5.php?gtype=CQ&amp;rtype=605">重庆时时彩</a>
                <a data-gtype="JX_Content" href="/member/b5/b5.php?gtype=JX&amp;rtype=605">江西时时彩</a>
                <a class="last" data-gtype="TJ_Content" href="/member/b5/b5.php?gtype=TJ&amp;rtype=605">天津时时彩</a>
            </nav>
            <nav id="SF">
                <a href="/pt/mem/order/GXSF">广西十分彩</a>
            </nav>
            <nav id="KN">
                <a href="/pt/mem/order/BJKN">北京快乐8</a>
                <a href="/pt/mem/order/CAKN">加拿大卑斯</a>
                <a href="/pt/mem/order/AUKN">澳洲首都商业区</a>
                <a href="/pt/mem/order/BBKN">BB快乐彩</a>
            </nav>
            <nav id="S5"></nav>
        </div>
    </div>
    <ul id="ui-btn-features">
        <li style="color:yellow;font-weight:bold;padding-top:4px;font-size:12px;">功能:</li>
        <li>
        <a style="padding-top: 4px;" data-callback="self.memberCenter.history" title="下注状况"
           data-url="/member/today/today_wagers.php?gtype=LT">
           <span style="color: white;">下注状况</span>
        </a>
    </li>
    <li>
        <a style="padding-top: 4px;" data-callback="self.memberCenter.historyCount" title="帐户历史"
           data-url="/member/history/history_count.php?gtype=LT">
            <span style="color: white;">下注历史</span>
        </a>
    </li>
    <li>
        <a style="padding-top: 4px;" data-callback="self.memberCenter.rule" title="规则说明"
           data-url="/member/roul_lt_tw.php?gtype=LT">
            <span style="color: white;">规则</span>
        </a>
    </li>
    <li>
        <a style="padding-top: 4px;" data-callback="self.memberCenter.gameResult" title="开奖结果"
           data-url="/member/final/LT_result.php?gtype=T3">
            <span style="color: white;">开奖</span>
        </a>
    </li>
    <li>
        <a style="padding-top: 4px;" title="系统公告" data-url="/member/msg_log.php?gtype=LT">
            <span style="color: white;">公告</span>
        </a>
    </li>
    <li>
        <a style="padding-top: 4px;" data-callback="self.memberCenter.quickGold" title="快选金额"
           data-url="/member/account/QuickGold.php?gtype=LT">
            <span style="color: white;font-weight: normal;">快选金额</span>
        </a>
    </li>
    </ul>      </div>
<div id="main">
<div id="left">
    <div id="clock" style="display:none"><b></b><span id="HKTime"></span></div>
    <div id="user_info" style="display:none">
        <dl class="block">
            <dt><span class="icon"></span>会员资料</dt>
            <dd>帐号 <span id="login-username"></span></dd>
            <dd>额度 <span id="bet-credit"></span></dd>
            <input type="hidden" id="gold_gmin" value="'.$lowestMoney.'" />
            <input type="hidden" id="gold_gmax" value="'.$maxMoney.'" />
            <dd class="footer"></dd>
        </dl>
    </div>
    <div id="message_box" style="display:none">
        <div class="inner"></div>
        <div class="footer"></div>
    </div>
    <div id="left-div">
        <ul>
<li ><a href="#"><img src="/images/b002.jpg"/></a></li>
<li style="background:url(/images/left_4.jpg) no-repeat;height: 24px;"><a href="/member/lt/"><span style="font-size: 12px;margin-left: 60px;">特别号A面</span></a></li>
<li style="background:url(/images/left_4.jpg) no-repeat;height: 24px;"><a href="/member/lt/?rtype=SPbside"><span style="font-size: 12px;margin-left: 60px;">特别号B面</span></a></li>
<li style="background:url(/images/left_4.jpg) no-repeat;height: 24px;"><a href="/member/lt/?rtype=OEOU"><span style="font-size: 12px;margin-left: 60px;">两面</span></a></li>
<li style="background:url(/images/left_4.jpg) no-repeat;height: 24px;"><a href="/member/lt/?rtype=NA"><span style="font-size: 12px;margin-left: 60px;">正码</span></a></li>
<li style="background:url(/images/left_4.jpg) no-repeat;height: 24px;"><a href="/member/lt/?rtype=NAS&amp;rtypeN=N1"><span style="font-size: 12px;margin-left: 60px;">正码特</span></a></li>
<li style="background:url(/images/left_4.jpg) no-repeat;height: 24px;"><a href="/member/lt/?rtype=NO"><span style="font-size: 12px;margin-left: 60px;">正码1-6</span></a></li>
<li style="background:url(/images/left_4.jpg) no-repeat;height: 24px;"><a href="/member/lt/?rtype=NAP"><span style="font-size: 12px;margin-left: 60px;">正码过关</span></a></li>
<li style="background:url(/images/left_4.jpg) no-repeat;height: 24px;"><a href="/member/lt/?rtype=CH"><span style="font-size: 12px;margin-left: 60px;">连码</span></a></li>
<li style="background:url(/images/left_4.jpg) no-repeat;height: 24px;"><a href="/member/lt/?rtype=LX"><span style="font-size: 12px;margin-left: 60px;">连肖</span></a></li>
<li style="background:url(/images/left_4.jpg) no-repeat;height: 24px;"><a href="/member/lt/?rtype=LX"><span style="font-size: 12px;margin-left: 60px;">连尾</span></a></li>
<li style="background:url(/images/left_4.jpg) no-repeat;height: 24px;"><a href="/member/lt/?rtype=NI"><span style="font-size: 12px;margin-left: 60px;">自选不中</span></a></li>
<li style="background:url(/images/left_4.jpg) no-repeat;height: 24px;"><a href="/member/lt/?rtype=SPA&showTableN=1"><span style="font-size: 12px;margin-left: 60px;">特码生肖</span></a></li>
<li style="background:url(/images/left_4.jpg) no-repeat;height: 24px;"><a href="/member/lt/?rtype=C7&showTableN=1"><span style="font-size: 12px;margin-left: 60px;">正肖</span></a></li>
<li style="background:url(/images/left_4.jpg) no-repeat;height: 24px;"><a href="/member/lt/?rtype=SPB&showTableN=1"><span style="font-size: 12px;margin-left: 60px;">一肖</span></a></li>
<li style="background:url(/images/left_4.jpg) no-repeat;height: 24px;"><a href="/member/lt/?rtype=NX"><span style="font-size: 12px;margin-left: 60px;">合肖</span></a></li>
<li style="background:url(/images/left_4.jpg) no-repeat;height: 24px;"><a href="/member/lt/?rtype=SPB&showTableN=3"><span style="font-size: 12px;margin-left: 60px;">总肖</span></a></li>
<li style="background:url(/images/left_4.jpg) no-repeat;height: 24px;"><a href="/member/lt/?rtype=SPA&showTableN=2"><span style="font-size: 12px;margin-left: 60px;">色波</span></a></li>
<li style="background:url(/images/left_4.jpg) no-repeat;height: 24px;"><a href="/member/lt/?rtype=HB&showTableN=1"><span style="font-size: 12px;margin-left: 60px;">半波</span></a></li>
<li style="background:url(/images/left_4.jpg) no-repeat;height: 24px;"><a href="/member/lt/?rtype=HB&showTableN=2"><span style="font-size: 12px;margin-left: 60px;">半半波</span></a></li>
<li style="background:url(/images/left_4.jpg) no-repeat;height: 24px;"><a href="/member/lt/?rtype=C7&showTableN=2"><span style="font-size: 12px;margin-left: 60px;">七色波</span></a></li>
<li style="background:url(/images/left_4.jpg) no-repeat;height: 24px;"><a href="/member/lt/?rtype=SPA&showTableN=3"><span style="font-size: 12px;margin-left: 60px;">头尾数</span></a></li>
<li style="background:url(/images/left_4.jpg) no-repeat;height: 24px;"><a href="/member/lt/?rtype=SPB&showTableN=2"><span style="font-size: 12px;margin-left: 60px;">平特尾数</span></a></li>
        </ul>
    </div>
</div>
<div id="content">
<h2>
    <b></b>
    <span>六合彩</span>
</h2>
<div id="content_inner">
<div style="display: none;" id="c_rtype"></div>
<div>
<div id="game_info">
    期数: <span style="font-weight:bold;" id="gNumber"></span> &nbsp;&nbsp;
    <b>开奖日期:</b><span id="gametime">&nbsp;</span>&nbsp;&nbsp;&nbsp;
                <span id="ui-countdown">
                  <span id="FCDH" style="font-weight:bold;"></span>
                  <span id="close_msg" style="display:none;">&nbsp;</span>
                </span>
</div>
'.$nowPlayPage.'
<div id="randomball" class="round-table" style="display:none">
    <table>
        <tr class="title_tr">
            <td>正码一</td>
            <td>正码二</td>
            <td>正码三</td>
            <td>正码四</td>
            <td>正码五</td>
            <td>正码六</td>
            <td>特别号</td>
        </tr>
        <tr class="BallTr">
            <td id="bal0"></td>
            <td id="bal1"></td>
            <td id="bal2"></td>
            <td id="bal3"></td>
            <td id="bal4"></td>
            <td id="bal5"></td>
            <td id="bal6"></td>
        </tr>
        <tr class="BallTr">
            <td id="bal0a"></td>
            <td id="bal1a"></td>
            <td id="bal2a"></td>
            <td id="bal3a"></td>
            <td id="bal4a"></td>
            <td id="bal5a"></td>
            <td id="bal6a"></td>
        </tr>
    </table>              </div>
<div id="GrpBtn" style="">
    <input type="hidden" name="NowBet" id="NowBet" value="'.$rType.'" />
    <div id="QuickMenu">
        <p class="grp-title"><i></i>群组选项<b>▼</b></p>
        <div>
            下注金额 :
            <input type="text" min="0" id="BetGold" name="BetGold" class="GoldQQ" />
            <label><input type="checkbox" name="replaceGold" id="replaceGold" />取代金額</label>
        </div>
        <fieldset class="ball49">
            <legend>彩球号码</legend>
            <p>
                <a class="b01">01</a> <a class="b02">02</a> <a class="b03">03</a> <a class="b04">04</a> <a class="b05">05</a>
                <a class="b06">06</a> <a class="b07">07</a> <a class="b08">08</a> <a class="b09">09</a> <a class="b10">10</a>
                <a class="b11">11</a> <a class="b12">12</a> <a class="b13">13</a> <a class="b14">14</a> <a class="b15">15</a>
                <a class="b16">16</a> <a class="b17">17</a> <a class="b18">18</a> <a class="b19">19</a> <a class="b20">20</a>
            </p>
            <p>
                <a class="b21">21</a> <a class="b22">22</a> <a class="b23">23</a> <a class="b24">24</a> <a class="b25">25</a>
                <a class="b26">26</a> <a class="b27">27</a> <a class="b28">28</a> <a class="b29">29</a> <a class="b30">30</a>
                <a class="b31">31</a> <a class="b32">32</a> <a class="b33">33</a> <a class="b34">34</a> <a class="b35">35</a>
                <a class="b36">36</a> <a class="b37">37</a> <a class="b38">38</a> <a class="b39">39</a> <a class="b40">40</a>
            </p>
            <p>
                <a class="b41">41</a> <a class="b42">42</a> <a class="b43">43</a> <a class="b44">44</a> <a class="b45">45</a>
                <a class="b46">46</a> <a class="b47">47</a> <a class="b48">48</a> <a class="b49">49</a>
            </p>
        </fieldset>
        <fieldset>
            <legend>单双大小</legend>
            <p>
                <a>单</a>
                <a>双</a>
                <a>大</a>
                <a>小</a>
                <a>和单</a>
                <a>和双</a>
                <a>和大</a>
                <a>和小</a>
            </p>
        </fieldset>
        <fieldset>
            <legend>色波</legend>
            <p>
                <a class="RED">红波</a>
                <a class="BLUE">蓝波</a>
                <a class="GREEN">绿波</a>
            </p>
        </fieldset>
        <fieldset class="HB">
            <legend>半波</legend>
            <p>
                <a class="RED">红单</a>
                <a class="RED">红双</a>
                <a class="RED">红大</a>
                <a class="RED">红小</a>
                <a class="BLUE">蓝单</a>
                <a class="BLUE">蓝双</a>
                <a class="BLUE">蓝大</a>
                <a class="BLUE">蓝小</a>
                <a class="GREEN">绿单</a>
                <a class="GREEN">绿双</a>
                <a class="GREEN">绿大</a>
                <a class="GREEN">绿小</a>
            </p>
        </fieldset>
        <fieldset>
            <legend>头</legend>
            <p>
                <a>0</a>
                <a>1</a>
                <a>2</a>
                <a>3</a>
                <a>4</a>
            </p>
        </fieldset>
        <fieldset>
            <legend>尾</legend>
            <p>
                <a>0</a>
                <a>1</a>
                <a>2</a>
                <a>3</a>
                <a>4</a>
                <a>5</a>
                <a>6</a>
                <a>7</a>
                <a>8</a>
                <a>9</a>
            </p>
        </fieldset>
        <fieldset class="SPA">
            <legend>生肖</legend>
            <p>
                <a>鼠</a>
                <a>牛</a>
                <a>虎</a>
                <a>兔</a>
                <a>龙</a>
                <a>蛇</a>
                <a>马</a>
                <a>羊</a>
                <a>猴</a>
                <a>鸡</a>
                <a>狗</a>
                <a>猪</a>
            </p>
        </fieldset>
        <p style="clear:both">
            <input class="cancel" type="button" onclick="document.newForm.reset();" value="取消" />&nbsp;
            <input id="QuickSubmit" type="button" value="确定" />
        </p>
    </div>
</div>                            <!--游戏区块-->
<div id="Game">
    <form name="newForm" id="newForm" action="/member/Grp/grpOrder.php" method="post">
        <!--正码1-6选择-->
        <div id="tab" style="display:none;">
            <ul>
                <li data-rtypeN="N1" class="onTagClick"><span><b>正码特 1</b></span></li>
                <li data-rtypeN="N2" class="unTagClick"><span><b>正码特 2</b></span></li>
                <li data-rtypeN="N3" class="unTagClick"><span><b>正码特 3</b></span></li>
                <li data-rtypeN="N4" class="unTagClick"><span><b>正码特 4</b></span></li>
                <li data-rtypeN="N5" class="unTagClick"><span><b>正码特 5</b></span></li>
                <li data-rtypeN="N6" class="unTagClick"><span><b>正码特 6</b></span></li>
                <li id="space" style="width:15px;"></li>
            </ul>
        </div>
        <div class="round-table"><table id="table1"></table></div>
        <div class="round-table"><table id="table2"></table></div>
        <div class="round-table"><table id="table3"></table></div>
        <div class="round-table"><table id="table4"></table></div>
        <div class="SendLT Send">
            <span class="credit">下注金额:<b id="total_bet">0.00</b></span>
            <input class="no" type="reset" value="取消"/>
            <input class="yes" type="button" name="btnBet" value="确定"/>
        </div>
        <input type="hidden" name="gid" id="gid" />
        <input type="hidden" name="Line" id="Line" value="" />
    </form>
</div>
<div id="ding"></ding>
</div>
</div>
<input type="hidden" name="iTime" id="iTime" value="" />
</div>
</div>
</div>
</div>
<div id="ShowRule2" style="display:none;width:30px;">
    <div id="RuleText2" style="display: none;">
        <ol>
            <li><b>对碰:</b>依照二全中·二中特·特串 此3种玩法规则,依任两组`生肖`或`尾数`来组合下注的号码</li>
            <li><b>肖串尾数:</b>选择一主肖，可拖0~9尾的球，以二全中的肖串尾数为例：选择鼠(07,19,31,43)当主肖并拖3尾数，因尾数中43已在主肖内将不列入组合，因此共可组出16组(一个主肖+四个尾数)。</li>
            <li style="display: none;"><b>交叉碰:</b><br />二星玩法：可选2柱~49柱，每柱1~48号码，使每柱串连，已选择号码不能重覆<br />三星玩法：可选3柱~48柱，每柱1~47号码，使每柱串连，已选择号码不能重覆<br />四星玩法：可选4柱~49柱，每柱1~46号码，使每柱串连，已选择号码不能重覆</li>
            <li><b>胆拖:</b>(N胆M拖)<br />选N个号码为胆，M个号码为拖。则有N*M个组合数。<br />(二星) 最多选3胆码，可拖49-(所选的胆码)个号码<br />(三星) 最多选2胆码，可拖49--(所选的胆码)个号码<br />(四星) 最多选3胆码，可拖49--(所选的胆码)个号码</li>
            <li style="display: none;"><b>胆拖色波:</b>(N胆拖色波)<br />选N个号码为胆，可选红蓝绿波的球号为拖。则有N*色波球号个组合数。<br />(二星) 最多选3胆码，可拖(所选色波号码-所选胆码)个号码<br />(三星) 最多选2胆码，可拖(所选色波号码-所选胆码)个号码<br />(四星) 最多选3胆码，可拖(所选色波号码-所选胆码)个号码</li>
            <li style="display: none;"><b>胆拖生肖:</b>(N胆拖生肖)<br />选N个号码为胆，可选生肖的球号为拖。则有N*生肖球号个组合数。<br />(二星) 最多选3胆码，可拖(所选生肖号码-所选胆码)个号码<br />(三星) 最多选2胆码，可拖(所选生肖号码-所选胆码)个号码<br />(四星) 最多选3胆码，可拖(所选生肖号码-所选胆码)个号码</li>
        </ol>
    </div>
    <div id="RightBar2">
        <div class="aa">+</div>
        <div class="bb">操作方法</div>
    </div>
</div>
<div id="ShowRule">
    <div id="RuleText" style="display: none;">
    </div>
    <div id="RightBar">
        <div class="aa">+</div>
        <div class="bb">规则说明</div>
    </div>
</div>  <div id="Tips" style="display:none;"><b class="before"></b>当用鼠标压住要下注的球号时，版面右方会出现下注的金额区块，可直接将要下注的号码拉到下注的金额上面下注<b class="after"></b></div>
<form action="../lt_order_tmp.php" method="post" name="BetForm" ><input type="hidden" name="Line" /><input type="hidden" name="gold" /> <input type="hidden" name="gid" /> <input type="hidden" name="concede" /> <input type="hidden" name="ioradio" /> </form>
<div id="AD" style="display:none" >
    <div id="ShowBall">
        <h2>組合窗口</h2>
        <div id="Ball">
            <p><span style="background-color:rgb(0,255,0);">&nbsp;&nbsp;&nbsp;</span></p>
        </div>
    </div>
</div>
</body>
</html>
    ';

    return $page;
}

function getNowPlayPage($rType){
    $nowPlayPage = "";
    if($rType=="SP"){
        $nowPlayPage = '
        <div id="wager_groups" class="LT">
            <a href="#NAVPLAY" id="allplay">玩法</a>
            <a href="/member/lt/?rtype=OEOU">两面</a>
            <a class="NowPlay" href="#NAVSP">特别号</a>
            <a href="#NAVNA">正码</a>
            <a href="#NAVCH">连码</a>
            <a href="#NAVSPA">生肖</a>
            <a href="#NAVSPC">色波</a>
            <a href="#NAVHF">头尾数</a>
            <dl id="NAVPLAY">
              <dd><a href="/member/lt/?rtype=OEOU">两面</a> </dd>
              <dd><a href="/member/lt/?rtype=C7&showTableN=1">正肖</a> </dd>
              <dd><a class="NowPlay" href="/member/lt/">特别号A面</a> </dd>
              <dd><a href="/member/lt/?rtype=SPbside">特别号B面</a> </dd>
              <dd><a href="/member/lt/?rtype=SPB&showTableN=1">一肖</a> </dd>
              <dd><a href="/member/lt/?rtype=NA">正码</a> </dd>
              <dd><a href="/member/lt/?rtype=NX">合肖</a> </dd>
              <dd><a href="/member/lt/?rtype=NAS&amp;rtypeN=N1">正码特</a> </dd>
              <dd><a href="/member/lt/?rtype=SPB&showTableN=3">总肖 </a> </dd>
              <dd><a href="/member/lt/?rtype=NO">正码1-6</a> </dd>
              <dd><a href="/member/lt/?rtype=SPA&showTableN=2">色波 </a> </dd>
              <dd><a href="/member/lt/?rtype=NAP">正码过关</a> </dd>
              <dd><a href="/member/lt/?rtype=HB&showTableN=1">半波 </a> </dd>
              <dd><a href="/member/lt/?rtype=CH">连码</a> </dd>
              <dd><a href="/member/lt/?rtype=HB&showTableN=2">半半波 </a> </dd>
              <dd><a href="/member/lt/?rtype=LX">连肖</a> </dd>
              <dd><a href="/member/lt/?rtype=C7&showTableN=2">七色波</a> </dd>
              <dd><a href="/member/lt/?rtype=LX">连尾</a> </dd>
              <dd><a href="/member/lt/?rtype=SPA&showTableN=3">头尾数 </a> </dd>
              <dd><a href="/member/lt/?rtype=NI">自选不中</a> </dd>
              <dd><a href="/member/lt/?rtype=SPB&showTableN=2">平特尾数 </a> </dd>
              <dd><a href="/member/lt/?rtype=SPA&showTableN=1">特码生肖 </a> </dd>
            </dl>
            <nav id="NAVSP">
              <a href="/member/lt/">特别号A面</a>
            <a href="/member/lt/?rtype=SPbside">特别号B面</a>
            </nav>
            <nav id="NAVNA">
              <a href="/member/lt/?rtype=NA">正码</a>
              <a href="/member/lt/?rtype=NAS&amp;rtypeN=N1">正码特</a>
              <a href="/member/lt/?rtype=NO">正码1-6</a>
              <a href="/member/lt/?rtype=NAP">正码过关</a>
            </nav>
            <nav id="NAVCH">
              <a href="/member/lt/?rtype=CH">连码</a>
              <a href="/member/lt/?rtype=LX">连肖</a>
              <a href="/member/lt/?rtype=LX">连尾</a>
              <a href="/member/lt/?rtype=NI">自选不中</a>
            </nav>
            <nav id="NAVSPA">
              <a href="/member/lt/?rtype=SPA&showTableN=1">特码生肖</a>
              <a href="/member/lt/?rtype=C7&showTableN=1">正肖</a>
              <a href="/member/lt/?rtype=SPB&showTableN=1">一肖</a>
              <a href="/member/lt/?rtype=NX">合肖</a>
              <a href="/member/lt/?rtype=SPB&showTableN=3">总肖</a>
            </nav>
            <nav id="NAVSPC">
              <a href="/member/lt/?rtype=SPA&showTableN=1">色波</a>
              <a href="/member/lt/?rtype=HB&showTableN=2">半波</a>
              <a href="/member/lt/?rtype=HB&showTableN=2">半半波</a>
              <a href="/member/lt/?rtype=C7&showTableN=2">七色波</a>
            </nav>
            <nav id="NAVHF">
              <a href="/member/lt/?rtype=SPA&showTableN=3">头尾数</a>
              <a href="/member/lt/?rtype=SPB&showTableN=2">平特尾数</a>
            </nav>
        </div>
        ';
    }elseif($rType=="SPbside"){
        $nowPlayPage = '
        <div id="wager_groups" class="LT">
            <a href="#NAVPLAY" id="allplay">玩法</a>
            <a href="/member/lt/?rtype=OEOU">两面</a>
            <a class="NowPlay" href="#NAVSP">特别号</a>
            <a href="#NAVNA">正码</a>
            <a href="#NAVCH">连码</a>
            <a href="#NAVSPA">生肖</a>
            <a href="#NAVSPC">色波</a>
            <a href="#NAVHF">头尾数</a>
            <dl id="NAVPLAY">
              <dd><a href="/member/lt/?rtype=OEOU">两面</a> </dd>
              <dd><a href="/member/lt/?rtype=C7&showTableN=1">正肖</a> </dd>
              <dd><a href="/member/lt/">特别号A面</a> </dd>
              <dd><a class="NowPlay" href="/member/lt/?rtype=SPbside">特别号B面</a> </dd>
              <dd><a href="/member/lt/?rtype=SPB&showTableN=1">一肖</a> </dd>
              <dd><a href="/member/lt/?rtype=NA">正码</a> </dd>
              <dd><a href="/member/lt/?rtype=NX">合肖</a> </dd>
              <dd><a href="/member/lt/?rtype=NAS&amp;rtypeN=N1">正码特</a> </dd>
              <dd><a href="/member/lt/?rtype=SPB&showTableN=3">总肖 </a> </dd>
              <dd><a href="/member/lt/?rtype=NO">正码1-6</a> </dd>
              <dd><a href="/member/lt/?rtype=SPA&showTableN=2">色波 </a> </dd>
              <dd><a href="/member/lt/?rtype=NAP">正码过关</a> </dd>
              <dd><a href="/member/lt/?rtype=HB&showTableN=1">半波 </a> </dd>
              <dd><a href="/member/lt/?rtype=CH">连码</a> </dd>
              <dd><a href="/member/lt/?rtype=HB&showTableN=2">半半波 </a> </dd>
              <dd><a href="/member/lt/?rtype=LX">连肖</a> </dd>
              <dd><a href="/member/lt/?rtype=C7&showTableN=2">七色波</a> </dd>
              <dd><a href="/member/lt/?rtype=LX">连尾</a> </dd>
              <dd><a href="/member/lt/?rtype=SPA&showTableN=3">头尾数 </a> </dd>
              <dd><a href="/member/lt/?rtype=NI">自选不中</a> </dd>
              <dd><a href="/member/lt/?rtype=SPB&showTableN=2">平特尾数 </a> </dd>
              <dd><a href="/member/lt/?rtype=SPA&showTableN=1">特码生肖 </a> </dd>
            </dl>
            <nav id="NAVSP">
              <a href="/member/lt/">特别号A面</a>
              <a href="/member/lt/?rtype=SPbside">特别号B面</a>
            </nav>
            <nav id="NAVNA">
              <a href="/member/lt/?rtype=NA">正码</a>
              <a href="/member/lt/?rtype=NAS&amp;rtypeN=N1">正码特</a>
              <a href="/member/lt/?rtype=NO">正码1-6</a>
              <a href="/member/lt/?rtype=NAP">正码过关</a>
            </nav>
            <nav id="NAVCH">
              <a href="/member/lt/?rtype=CH">连码</a>
              <a href="/member/lt/?rtype=LX">连肖</a>
              <a href="/member/lt/?rtype=LX">连尾</a>
              <a href="/member/lt/?rtype=NI">自选不中</a>
            </nav>
            <nav id="NAVSPA">
              <a href="/member/lt/?rtype=SPA&showTableN=1">特码生肖</a>
              <a href="/member/lt/?rtype=C7&showTableN=1">正肖</a>
              <a href="/member/lt/?rtype=SPB&showTableN=1">一肖</a>
              <a href="/member/lt/?rtype=NX">合肖</a>
              <a href="/member/lt/?rtype=SPB&showTableN=3">总肖</a>
            </nav>
            <nav id="NAVSPC">
              <a href="/member/lt/?rtype=SPA&showTableN=2">色波</a>
              <a href="/member/lt/?rtype=HB&showTableN=1">半波</a>
              <a href="/member/lt/?rtype=HB&showTableN=2">半半波</a>
              <a href="/member/lt/?rtype=C7&showTableN=2">七色波</a>
            </nav>
            <nav id="NAVHF">
              <a href="/member/lt/?rtype=SPA&showTableN=3">头尾数</a>
              <a href="/member/lt/?rtype=SPB&showTableN=2">平特尾数</a>
            </nav>
        </div>
        ';
    }elseif($rType=="OEOU"){
        $nowPlayPage = '
        <div id="wager_groups" class="LT">
<a href="#NAVPLAY" id="allplay">玩法</a>
<a class="NowPlay" href="/member/lt/?rtype=OEOU">两面</a>
<a href="#NAVSP">特别号</a>
<a href="#NAVNA">正码</a>
<a href="#NAVCH">连码</a>
<a href="#NAVSPA">生肖</a>
<a href="#NAVSPC">色波</a>
<a href="#NAVHF">头尾数</a>
<dl id="NAVPLAY">
  <dd><a class="NowPlay" href="/member/lt/?rtype=OEOU">两面</a> </dd>
  <dd><a href="/member/lt/?rtype=C7&showTableN=1">正肖</a> </dd>
  <dd><a href="/member/lt/">特别号A面</a> </dd>
  <dd><a href="/member/lt/?rtype=SPbside">特别号B面</a> </dd>
  <dd><a href="/member/lt/?rtype=SPB&showTableN=1">一肖</a> </dd>
  <dd><a href="/member/lt/?rtype=NA">正码</a> </dd>
  <dd><a href="/member/lt/?rtype=NX">合肖</a> </dd>
  <dd><a href="/member/lt/?rtype=NAS&amp;rtypeN=N1">正码特</a> </dd>
  <dd><a href="/member/lt/?rtype=SPB&showTableN=3">总肖 </a> </dd>
  <dd><a href="/member/lt/?rtype=NO">正码1-6</a> </dd>
  <dd><a href="/member/lt/?rtype=SPA&showTableN=2">色波 </a> </dd>
  <dd><a href="/member/lt/?rtype=NAP">正码过关</a> </dd>
  <dd><a href="/member/lt/?rtype=HB&showTableN=1">半波 </a> </dd>
  <dd><a href="/member/lt/?rtype=CH">连码</a> </dd>
  <dd><a href="/member/lt/?rtype=HB&showTableN=2">半半波 </a> </dd>
  <dd><a href="/member/lt/?rtype=LX">连肖</a> </dd>
  <dd><a href="/member/lt/?rtype=C7&showTableN=2">七色波</a> </dd>
  <dd><a href="/member/lt/?rtype=LX">连尾</a> </dd>
  <dd><a href="/member/lt/?rtype=SPA&showTableN=3">头尾数 </a> </dd>
  <dd><a href="/member/lt/?rtype=NI">自选不中</a> </dd>
  <dd><a href="/member/lt/?rtype=SPB&showTableN=2">平特尾数 </a> </dd>
  <dd><a href="/member/lt/?rtype=SPA&showTableN=1">特码生肖 </a> </dd>
</dl>
<nav id="NAVSP">
  <a href="/member/lt/">特别号A面</a>
  <a href="/member/lt/?rtype=SPbside">特别号B面</a>
</nav>
<nav id="NAVNA">
  <a href="/member/lt/?rtype=NA">正码</a>
  <a href="/member/lt/?rtype=NAS&amp;rtypeN=N1">正码特</a>
  <a href="/member/lt/?rtype=NO">正码1-6</a>
  <a href="/member/lt/?rtype=NAP">正码过关</a>
</nav>
<nav id="NAVCH">
  <a href="/member/lt/?rtype=CH">连码</a>
  <a href="/member/lt/?rtype=LX">连肖</a>
  <a href="/member/lt/?rtype=LX">连尾</a>
  <a href="/member/lt/?rtype=NI">自选不中</a>
</nav>
<nav id="NAVSPA">
  <a href="/member/lt/?rtype=SPA&showTableN=1">特码生肖</a>
  <a href="/member/lt/?rtype=C7&showTableN=1">正肖</a>
  <a href="/member/lt/?rtype=SPB&showTableN=1">一肖</a>
  <a href="/member/lt/?rtype=NX">合肖</a>
  <a href="/member/lt/?rtype=SPB&showTableN=3">总肖</a>
</nav>
<nav id="NAVSPC">
  <a href="/member/lt/?rtype=SPA&showTableN=2">色波</a>
  <a href="/member/lt/?rtype=HB&showTableN=1">半波</a>
  <a href="/member/lt/?rtype=HB&showTableN=2">半半波</a>
  <a href="/member/lt/?rtype=C7&showTableN=2">七色波</a>
</nav>
<nav id="NAVHF">
  <a href="/member/lt/?rtype=SPA&showTableN=3">头尾数</a>
  <a href="/member/lt/?rtype=SPB&showTableN=2">平特尾数</a>
</nav>
              </div>
        ';
    }elseif($rType=="NA"){
        $nowPlayPage = '
        <div id="wager_groups" class="LT">
<a href="#NAVPLAY" id="allplay">玩法</a>
<a href="/member/lt/?rtype=OEOU">两面</a>
<a href="#NAVSP">特别号</a>
<a href="#NAVNA" class="NowPlay">正码</a>
<a href="#NAVCH">连码</a>
<a href="#NAVSPA">生肖</a>
<a href="#NAVSPC">色波</a>
<a href="#NAVHF">头尾数</a>
<dl id="NAVPLAY">
  <dd><a href="/member/lt/?rtype=OEOU">两面</a> </dd>
  <dd><a href="/member/lt/?rtype=C7&showTableN=1">正肖</a> </dd>
  <dd><a href="/member/lt/">特别号A面</a> </dd>
  <dd><a href="/member/lt/?rtype=SPbside">特别号B面</a> </dd>
  <dd><a href="/member/lt/?rtype=SPB&showTableN=1">一肖</a> </dd>
  <dd><a class="NowPlay" href="/member/lt/?rtype=NA">正码</a> </dd>
  <dd><a href="/member/lt/?rtype=NX">合肖</a> </dd>
  <dd><a href="/member/lt/?rtype=NAS&amp;rtypeN=N1">正码特</a> </dd>
  <dd><a href="/member/lt/?rtype=SPB&showTableN=3">总肖 </a> </dd>
  <dd><a href="/member/lt/?rtype=NO">正码1-6</a> </dd>
  <dd><a href="/member/lt/?rtype=SPA&showTableN=2">色波 </a> </dd>
  <dd><a href="/member/lt/?rtype=NAP">正码过关</a> </dd>
  <dd><a href="/member/lt/?rtype=HB&showTableN=1">半波 </a> </dd>
  <dd><a href="/member/lt/?rtype=CH">连码</a> </dd>
  <dd><a href="/member/lt/?rtype=HB&showTableN=2">半半波 </a> </dd>
  <dd><a href="/member/lt/?rtype=LX">连肖</a> </dd>
  <dd><a href="/member/lt/?rtype=C7&showTableN=2">七色波</a> </dd>
  <dd><a href="/member/lt/?rtype=LX">连尾</a> </dd>
  <dd><a href="/member/lt/?rtype=SPA&showTableN=3">头尾数 </a> </dd>
  <dd><a href="/member/lt/?rtype=NI">自选不中</a> </dd>
  <dd><a href="/member/lt/?rtype=SPB&showTableN=2">平特尾数 </a> </dd>
  <dd><a href="/member/lt/?rtype=SPA&showTableN=1">特码生肖 </a> </dd>
</dl>
<nav id="NAVSP">
  <a href="/member/lt/">特别号A面</a>
  <a href="/member/lt/?rtype=SPbside">特别号B面</a>
</nav>
<nav id="NAVNA">
  <a href="/member/lt/?rtype=NA">正码</a>
  <a href="/member/lt/?rtype=NAS&amp;rtypeN=N1">正码特</a>
  <a href="/member/lt/?rtype=NO">正码1-6</a>
  <a href="/member/lt/?rtype=NAP">正码过关</a>
</nav>
<nav id="NAVCH">
  <a href="/member/lt/?rtype=CH">连码</a>
  <a href="/member/lt/?rtype=LX">连肖</a>
  <a href="/member/lt/?rtype=LX">连尾</a>
  <a href="/member/lt/?rtype=NI">自选不中</a>
</nav>
<nav id="NAVSPA">
  <a href="/member/lt/?rtype=SPA&showTableN=1">特码生肖</a>
  <a href="/member/lt/?rtype=C7&showTableN=1">正肖</a>
  <a href="/member/lt/?rtype=SPB&showTableN=1">一肖</a>
  <a href="/member/lt/?rtype=NX">合肖</a>
  <a href="/member/lt/?rtype=SPB&showTableN=3">总肖</a>
</nav>
<nav id="NAVSPC">
  <a href="/member/lt/?rtype=SPA&showTableN=2">色波</a>
  <a href="/member/lt/?rtype=HB&showTableN=1">半波</a>
  <a href="/member/lt/?rtype=HB&showTableN=2">半半波</a>
  <a href="/member/lt/?rtype=C7&showTableN=2">七色波</a>
</nav>
<nav id="NAVHF">
  <a href="/member/lt/?rtype=SPA&showTableN=3">头尾数</a>
  <a href="/member/lt/?rtype=SPB&showTableN=2">平特尾数</a>
</nav>
              </div>
        ';
    }elseif($rType=="NAS"){
        $nowPlayPage = '
<div id="wager_groups" class="LT">
<a href="#NAVPLAY" id="allplay">玩法</a>
<a href="/member/lt/?rtype=OEOU">两面</a>
<a href="#NAVSP">特别号</a>
<a href="#NAVNA" class="NowPlay">正码</a>
<a href="#NAVCH">连码</a>
<a href="#NAVSPA">生肖</a>
<a href="#NAVSPC">色波</a>
<a href="#NAVHF">头尾数</a>
<dl id="NAVPLAY">
  <dd><a href="/member/lt/?rtype=OEOU">两面</a> </dd>
  <dd><a href="/member/lt/?rtype=C7&showTableN=1">正肖</a> </dd>
  <dd><a href="/member/lt/">特别号A面</a> </dd>
  <dd><a href="/member/lt/?rtype=SPbside">特别号B面</a> </dd>
  <dd><a href="/member/lt/?rtype=SPB&showTableN=1">一肖</a> </dd>
  <dd><a href="/member/lt/?rtype=NA">正码</a> </dd>
  <dd><a href="/member/lt/?rtype=NX">合肖</a> </dd>
  <dd><a class="NowPlay" href="/member/lt/?rtype=NAS&amp;rtypeN=N1">正码特</a> </dd>
  <dd><a href="/member/lt/?rtype=SPB&showTableN=3">总肖 </a> </dd>
  <dd><a href="/member/lt/?rtype=NO">正码1-6</a> </dd>
  <dd><a href="/member/lt/?rtype=SPA&showTableN=2">色波 </a> </dd>
  <dd><a href="/member/lt/?rtype=NAP">正码过关</a> </dd>
  <dd><a href="/member/lt/?rtype=HB&showTableN=1">半波 </a> </dd>
  <dd><a href="/member/lt/?rtype=CH">连码</a> </dd>
  <dd><a href="/member/lt/?rtype=HB&showTableN=2">半半波 </a> </dd>
  <dd><a href="/member/lt/?rtype=LX">连肖</a> </dd>
  <dd><a href="/member/lt/?rtype=C7&showTableN=2">七色波</a> </dd>
  <dd><a href="/member/lt/?rtype=LX">连尾</a> </dd>
  <dd><a href="/member/lt/?rtype=SPA&showTableN=3">头尾数 </a> </dd>
  <dd><a href="/member/lt/?rtype=NI">自选不中</a> </dd>
  <dd><a href="/member/lt/?rtype=SPB&showTableN=2">平特尾数 </a> </dd>
  <dd><a href="/member/lt/?rtype=SPA&showTableN=1">特码生肖 </a> </dd>
</dl>
<nav id="NAVSP">
  <a href="/member/lt/">特别号A面</a>
  <a href="/member/lt/?rtype=SPbside">特别号B面</a>
</nav>
<nav id="NAVNA">
  <a href="/member/lt/?rtype=NA">正码</a>
  <a href="/member/lt/?rtype=NAS&amp;rtypeN=N1">正码特</a>
  <a href="/member/lt/?rtype=NO">正码1-6</a>
  <a href="/member/lt/?rtype=NAP">正码过关</a>
</nav>
<nav id="NAVCH">
  <a href="/member/lt/?rtype=CH">连码</a>
  <a href="/member/lt/?rtype=LX">连肖</a>
  <a href="/member/lt/?rtype=LX">连尾</a>
  <a href="/member/lt/?rtype=NI">自选不中</a>
</nav>
<nav id="NAVSPA">
  <a href="/member/lt/?rtype=SPA&showTableN=1">特码生肖</a>
  <a href="/member/lt/?rtype=C7&showTableN=1">正肖</a>
  <a href="/member/lt/?rtype=SPB&showTableN=1">一肖</a>
  <a href="/member/lt/?rtype=NX">合肖</a>
  <a href="/member/lt/?rtype=SPB&showTableN=3">总肖</a>
</nav>
<nav id="NAVSPC">
  <a href="/member/lt/?rtype=SPA&showTableN=2">色波</a>
  <a href="/member/lt/?rtype=HB&showTableN=1">半波</a>
  <a href="/member/lt/?rtype=HB&showTableN=2">半半波</a>
  <a href="/member/lt/?rtype=C7&showTableN=2">七色波</a>
</nav>
<nav id="NAVHF">
  <a href="/member/lt/?rtype=SPA&showTableN=3">头尾数</a>
  <a href="/member/lt/?rtype=SPB&showTableN=2">平特尾数</a>
</nav>
              </div>
        ';
    }elseif($rType=="NO"){
        $nowPlayPage = '
<div id="wager_groups" class="LT">
<a href="#NAVPLAY" id="allplay">玩法</a>
<a href="/member/lt/?rtype=OEOU">两面</a>
<a href="#NAVSP">特别号</a>
<a href="#NAVNA" class="NowPlay">正码</a>
<a href="#NAVCH">连码</a>
<a href="#NAVSPA">生肖</a>
<a href="#NAVSPC">色波</a>
<a href="#NAVHF">头尾数</a>
<dl id="NAVPLAY">
  <dd><a href="/member/lt/?rtype=OEOU">两面</a> </dd>
  <dd><a href="/member/lt/?rtype=C7&showTableN=1">正肖</a> </dd>
  <dd><a href="/member/lt/">特别号A面</a> </dd>
  <dd><a href="/member/lt/?rtype=SPbside">特别号B面</a> </dd>
  <dd><a href="/member/lt/?rtype=SPB&showTableN=1">一肖</a> </dd>
  <dd><a href="/member/lt/?rtype=NA">正码</a> </dd>
  <dd><a href="/member/lt/?rtype=NX">合肖</a> </dd>
  <dd><a href="/member/lt/?rtype=NAS&amp;rtypeN=N1">正码特</a> </dd>
  <dd><a href="/member/lt/?rtype=SPB&showTableN=3">总肖 </a> </dd>
  <dd><a class="NowPlay" href="/member/lt/?rtype=NO">正码1-6</a> </dd>
  <dd><a href="/member/lt/?rtype=SPA&showTableN=2">色波 </a> </dd>
  <dd><a href="/member/lt/?rtype=NAP">正码过关</a> </dd>
  <dd><a href="/member/lt/?rtype=HB&showTableN=1">半波 </a> </dd>
  <dd><a href="/member/lt/?rtype=CH">连码</a> </dd>
  <dd><a href="/member/lt/?rtype=HB&showTableN=2">半半波 </a> </dd>
  <dd><a href="/member/lt/?rtype=LX">连肖</a> </dd>
  <dd><a href="/member/lt/?rtype=C7&showTableN=2">七色波</a> </dd>
  <dd><a href="/member/lt/?rtype=LX">连尾</a> </dd>
  <dd><a href="/member/lt/?rtype=SPA&showTableN=3">头尾数 </a> </dd>
  <dd><a href="/member/lt/?rtype=NI">自选不中</a> </dd>
  <dd><a href="/member/lt/?rtype=SPB&showTableN=2">平特尾数 </a> </dd>
  <dd><a href="/member/lt/?rtype=SPA&showTableN=1">特码生肖 </a> </dd>
</dl>
<nav id="NAVSP">
  <a href="/member/lt/">特别号A面</a>
  <a href="/member/lt/?rtype=SPbside">特别号B面</a>
</nav>
<nav id="NAVNA">
  <a href="/member/lt/?rtype=NA">正码</a>
  <a href="/member/lt/?rtype=NAS&amp;rtypeN=N1">正码特</a>
  <a href="/member/lt/?rtype=NO">正码1-6</a>
  <a href="/member/lt/?rtype=NAP">正码过关</a>
</nav>
<nav id="NAVCH">
  <a href="/member/lt/?rtype=CH">连码</a>
  <a href="/member/lt/?rtype=LX">连肖</a>
  <a href="/member/lt/?rtype=LX">连尾</a>
  <a href="/member/lt/?rtype=NI">自选不中</a>
</nav>
<nav id="NAVSPA">
  <a href="/member/lt/?rtype=SPA&showTableN=1">特码生肖</a>
  <a href="/member/lt/?rtype=C7&showTableN=1">正肖</a>
  <a href="/member/lt/?rtype=SPB&showTableN=1">一肖</a>
  <a href="/member/lt/?rtype=NX">合肖</a>
  <a href="/member/lt/?rtype=SPB&showTableN=3">总肖</a>
</nav>
<nav id="NAVSPC">
  <a href="/member/lt/?rtype=SPA&showTableN=2">色波</a>
  <a href="/member/lt/?rtype=HB&showTableN=1">半波</a>
  <a href="/member/lt/?rtype=HB&showTableN=2">半半波</a>
  <a href="/member/lt/?rtype=C7&showTableN=2">七色波</a>
</nav>
<nav id="NAVHF">
  <a href="/member/lt/?rtype=SPA&showTableN=3">头尾数</a>
  <a href="/member/lt/?rtype=SPB&showTableN=2">平特尾数</a>
</nav>
              </div>
        ';
    }elseif($rType=="SPA"){
        $nowPlayPage = '
<div id="wager_groups" class="LT">
<a href="#NAVPLAY" id="allplay">玩法</a>
<a href="/member/lt/?rtype=OEOU">两面</a>
<a href="#NAVSP">特别号</a>
<a href="#NAVNA">正码</a>
<a href="#NAVCH">连码</a>
<a href="#NAVSPA">生肖</a>
<a href="#NAVSPC">色波</a>
<a href="#NAVHF">头尾数</a>
<dl id="NAVPLAY">
  <dd><a href="/member/lt/?rtype=OEOU">两面</a> </dd>
  <dd><a href="/member/lt/?rtype=C7&showTableN=1">正肖</a> </dd>
  <dd><a href="/member/lt/">特别号A面</a> </dd>
  <dd><a href="/member/lt/?rtype=SPbside">特别号B面</a> </dd>
  <dd><a href="/member/lt/?rtype=SPB&showTableN=1">一肖</a> </dd>
  <dd><a href="/member/lt/?rtype=NA">正码</a> </dd>
  <dd><a href="/member/lt/?rtype=NX">合肖</a> </dd>
  <dd><a href="/member/lt/?rtype=NAS&amp;rtypeN=N1">正码特</a> </dd>
  <dd><a href="/member/lt/?rtype=SPB&showTableN=3">总肖 </a> </dd>
  <dd><a href="/member/lt/?rtype=NO">正码1-6</a> </dd>
  <dd><a class="NowPlay" href="/member/lt/?rtype=SPA&showTableN=2">色波 </a> </dd>
  <dd><a href="/member/lt/?rtype=NAP">正码过关</a> </dd>
  <dd><a href="/member/lt/?rtype=HB&showTableN=1">半波 </a> </dd>
  <dd><a href="/member/lt/?rtype=CH">连码</a> </dd>
  <dd><a href="/member/lt/?rtype=HB&showTableN=2">半半波 </a> </dd>
  <dd><a href="/member/lt/?rtype=LX">连肖</a> </dd>
  <dd><a href="/member/lt/?rtype=C7&showTableN=2">七色波</a> </dd>
  <dd><a href="/member/lt/?rtype=LX">连尾</a> </dd>
  <dd><a class="NowPlay" href="/member/lt/?rtype=SPA&showTableN=3">头尾数 </a> </dd>
  <dd><a href="/member/lt/?rtype=NI">自选不中</a> </dd>
  <dd><a href="/member/lt/?rtype=SPB&showTableN=2">平特尾数 </a> </dd>
  <dd><a class="NowPlay" href="/member/lt/?rtype=SPA&showTableN=1">特码生肖 </a> </dd>
</dl>
<nav id="NAVSP">
  <a href="/member/lt/">特别号A面</a>
  <a href="/member/lt/?rtype=SPbside">特别号B面</a>
</nav>
<nav id="NAVNA">
  <a href="/member/lt/?rtype=NA">正码</a>
  <a href="/member/lt/?rtype=NAS&amp;rtypeN=N1">正码特</a>
  <a href="/member/lt/?rtype=NO">正码1-6</a>
  <a href="/member/lt/?rtype=NAP">正码过关</a>
</nav>
<nav id="NAVCH">
  <a href="/member/lt/?rtype=CH">连码</a>
  <a href="/member/lt/?rtype=LX">连肖</a>
  <a href="/member/lt/?rtype=LX">连尾</a>
  <a href="/member/lt/?rtype=NI">自选不中</a>
</nav>
<nav id="NAVSPA">
  <a href="/member/lt/?rtype=SPA&showTableN=1">特码生肖</a>
  <a href="/member/lt/?rtype=C7&showTableN=1">正肖</a>
  <a href="/member/lt/?rtype=SPB&showTableN=1">一肖</a>
  <a href="/member/lt/?rtype=NX">合肖</a>
  <a href="/member/lt/?rtype=SPB&showTableN=3">总肖</a>
</nav>
<nav id="NAVSPC">
  <a href="/member/lt/?rtype=SPA&showTableN=2">色波</a>
  <a href="/member/lt/?rtype=HB&showTableN=1">半波</a>
  <a href="/member/lt/?rtype=HB&showTableN=2">半半波</a>
  <a href="/member/lt/?rtype=C7&showTableN=2">七色波</a>
</nav>
<nav id="NAVHF">
  <a href="/member/lt/?rtype=SPA&showTableN=3">头尾数</a>
  <a href="/member/lt/?rtype=SPB&showTableN=2">平特尾数</a>
</nav>
              </div>
        ';
    }elseif($rType=="C7"){
        $nowPlayPage = '
<div id="wager_groups" class="LT">
<a href="#NAVPLAY" id="allplay">玩法</a>
<a href="/member/lt/?rtype=OEOU">两面</a>
<a href="#NAVSP">特别号</a>
<a href="#NAVNA">正码</a>
<a href="#NAVCH">连码</a>
<a href="#NAVSPA">生肖</a>
<a href="#NAVSPC">色波</a>
<a href="#NAVHF">头尾数</a>
<dl id="NAVPLAY">
  <dd><a href="/member/lt/?rtype=OEOU">两面</a> </dd>
  <dd><a class="NowPlay" href="/member/lt/?rtype=C7&showTableN=1">正肖</a> </dd>
  <dd><a href="/member/lt/">特别号A面</a> </dd>
  <dd><a href="/member/lt/?rtype=SPbside">特别号B面</a> </dd>
  <dd><a href="/member/lt/?rtype=SPB&showTableN=1">一肖</a> </dd>
  <dd><a href="/member/lt/?rtype=NA">正码</a> </dd>
  <dd><a href="/member/lt/?rtype=NX">合肖</a> </dd>
  <dd><a href="/member/lt/?rtype=NAS&amp;rtypeN=N1">正码特</a> </dd>
  <dd><a href="/member/lt/?rtype=SPB&showTableN=3">总肖 </a> </dd>
  <dd><a href="/member/lt/?rtype=NO">正码1-6</a> </dd>
  <dd><a href="/member/lt/?rtype=SPA&showTableN=2">色波 </a> </dd>
  <dd><a href="/member/lt/?rtype=NAP">正码过关</a> </dd>
  <dd><a href="/member/lt/?rtype=HB&showTableN=1">半波 </a> </dd>
  <dd><a href="/member/lt/?rtype=CH">连码</a> </dd>
  <dd><a href="/member/lt/?rtype=HB&showTableN=2">半半波 </a> </dd>
  <dd><a href="/member/lt/?rtype=LX">连肖</a> </dd>
  <dd><a class="NowPlay" href="/member/lt/?rtype=C7&showTableN=2">七色波</a> </dd>
  <dd><a href="/member/lt/?rtype=LX">连尾</a> </dd>
  <dd><a href="/member/lt/?rtype=SPA&showTableN=3">头尾数 </a> </dd>
  <dd><a href="/member/lt/?rtype=NI">自选不中</a> </dd>
  <dd><a href="/member/lt/?rtype=SPB&showTableN=2">平特尾数 </a> </dd>
  <dd><a href="/member/lt/?rtype=SPA&showTableN=1">特码生肖 </a> </dd>
</dl>
<nav id="NAVSP">
  <a href="/member/lt/">特别号A面</a>
  <a href="/member/lt/?rtype=SPbside">特别号B面</a>
</nav>
<nav id="NAVNA">
  <a href="/member/lt/?rtype=NA">正码</a>
  <a href="/member/lt/?rtype=NAS&amp;rtypeN=N1">正码特</a>
  <a href="/member/lt/?rtype=NO">正码1-6</a>
  <a href="/member/lt/?rtype=NAP">正码过关</a>
</nav>
<nav id="NAVCH">
  <a href="/member/lt/?rtype=CH">连码</a>
  <a href="/member/lt/?rtype=LX">连肖</a>
  <a href="/member/lt/?rtype=LX">连尾</a>
  <a href="/member/lt/?rtype=NI">自选不中</a>
</nav>
<nav id="NAVSPA">
  <a href="/member/lt/?rtype=SPA&showTableN=1">特码生肖</a>
  <a href="/member/lt/?rtype=C7&showTableN=1">正肖</a>
  <a href="/member/lt/?rtype=SPB&showTableN=1">一肖</a>
  <a href="/member/lt/?rtype=NX">合肖</a>
  <a href="/member/lt/?rtype=SPB&showTableN=3">总肖</a>
</nav>
<nav id="NAVSPC">
  <a href="/member/lt/?rtype=SPA&showTableN=2">色波</a>
  <a href="/member/lt/?rtype=HB&showTableN=1">半波</a>
  <a href="/member/lt/?rtype=HB&showTableN=2">半半波</a>
  <a href="/member/lt/?rtype=C7&showTableN=2">七色波</a>
</nav>
<nav id="NAVHF">
  <a href="/member/lt/?rtype=SPA&showTableN=3">头尾数</a>
  <a href="/member/lt/?rtype=SPB&showTableN=2">平特尾数</a>
</nav>
              </div>
        ';
    }elseif($rType=="SPB"){
        $nowPlayPage = '
<div id="wager_groups" class="LT">
<a href="#NAVPLAY" id="allplay">玩法</a>
<a href="/member/lt/?rtype=OEOU">两面</a>
<a href="#NAVSP">特别号</a>
<a href="#NAVNA">正码</a>
<a href="#NAVCH">连码</a>
<a href="#NAVSPA">生肖</a>
<a href="#NAVSPC">色波</a>
<a href="#NAVHF">头尾数</a>
<dl id="NAVPLAY">
  <dd><a href="/member/lt/?rtype=OEOU">两面</a> </dd>
  <dd><a href="/member/lt/?rtype=C7&showTableN=1">正肖</a> </dd>
  <dd><a href="/member/lt/">特别号A面</a> </dd>
  <dd><a href="/member/lt/?rtype=SPbside">特别号B面</a> </dd>
  <dd><a class="NowPlay" href="/member/lt/?rtype=SPB&showTableN=1">一肖</a> </dd>
  <dd><a href="/member/lt/?rtype=NA">正码</a> </dd>
  <dd><a href="/member/lt/?rtype=NX">合肖</a> </dd>
  <dd><a href="/member/lt/?rtype=NAS&amp;rtypeN=N1">正码特</a> </dd>
  <dd><a class="NowPlay" href="/member/lt/?rtype=SPB&showTableN=3">总肖 </a> </dd>
  <dd><a href="/member/lt/?rtype=NO">正码1-6</a> </dd>
  <dd><a href="/member/lt/?rtype=SPA&showTableN=2">色波 </a> </dd>
  <dd><a href="/member/lt/?rtype=NAP">正码过关</a> </dd>
  <dd><a href="/member/lt/?rtype=HB&showTableN=1">半波 </a> </dd>
  <dd><a href="/member/lt/?rtype=CH">连码</a> </dd>
  <dd><a href="/member/lt/?rtype=HB&showTableN=2">半半波 </a> </dd>
  <dd><a href="/member/lt/?rtype=LX">连肖</a> </dd>
  <dd><a href="/member/lt/?rtype=C7&showTableN=2">七色波</a> </dd>
  <dd><a href="/member/lt/?rtype=LX">连尾</a> </dd>
  <dd><a href="/member/lt/?rtype=SPA&showTableN=3">头尾数 </a> </dd>
  <dd><a href="/member/lt/?rtype=NI">自选不中</a> </dd>
  <dd><a class="NowPlay" href="/member/lt/?rtype=SPB&showTableN=2">平特尾数 </a> </dd>
  <dd><a href="/member/lt/?rtype=SPA&showTableN=1">特码生肖 </a> </dd>
</dl>
<nav id="NAVSP">
  <a href="/member/lt/">特别号A面</a>
  <a href="/member/lt/?rtype=SPbside">特别号B面</a>
</nav>
<nav id="NAVNA">
  <a href="/member/lt/?rtype=NA">正码</a>
  <a href="/member/lt/?rtype=NAS&amp;rtypeN=N1">正码特</a>
  <a href="/member/lt/?rtype=NO">正码1-6</a>
  <a href="/member/lt/?rtype=NAP">正码过关</a>
</nav>
<nav id="NAVCH">
  <a href="/member/lt/?rtype=CH">连码</a>
  <a href="/member/lt/?rtype=LX">连肖</a>
  <a href="/member/lt/?rtype=LX">连尾</a>
  <a href="/member/lt/?rtype=NI">自选不中</a>
</nav>
<nav id="NAVSPA">
  <a href="/member/lt/?rtype=SPA&showTableN=1">特码生肖</a>
  <a href="/member/lt/?rtype=C7&showTableN=1">正肖</a>
  <a href="/member/lt/?rtype=SPB&showTableN=1">一肖</a>
  <a href="/member/lt/?rtype=NX">合肖</a>
  <a href="/member/lt/?rtype=SPB&showTableN=3">总肖</a>
</nav>
<nav id="NAVSPC">
  <a href="/member/lt/?rtype=SPA&showTableN=2">色波</a>
  <a href="/member/lt/?rtype=HB&showTableN=1">半波</a>
  <a href="/member/lt/?rtype=HB&showTableN=2">半半波</a>
  <a href="/member/lt/?rtype=C7&showTableN=2">七色波</a>
</nav>
<nav id="NAVHF">
  <a href="/member/lt/?rtype=SPA&showTableN=3">头尾数</a>
  <a href="/member/lt/?rtype=SPB&showTableN=2">平特尾数</a>
</nav>
              </div>
        ';
    }elseif($rType=="HB"){
        $nowPlayPage = '
<div id="wager_groups" class="LT">
<a href="#NAVPLAY" id="allplay">玩法</a>
<a href="/member/lt/?rtype=OEOU">两面</a>
<a href="#NAVSP">特别号</a>
<a href="#NAVNA">正码</a>
<a href="#NAVCH">连码</a>
<a href="#NAVSPA">生肖</a>
<a href="#NAVSPC">色波</a>
<a href="#NAVHF">头尾数</a>
<dl id="NAVPLAY">
  <dd><a href="/member/lt/?rtype=OEOU">两面</a> </dd>
  <dd><a href="/member/lt/?rtype=C7&showTableN=1">正肖</a> </dd>
  <dd><a href="/member/lt/">特别号A面</a> </dd>
  <dd><a href="/member/lt/?rtype=SPbside">特别号B面</a> </dd>
  <dd><a href="/member/lt/?rtype=SPB&showTableN=1">一肖</a> </dd>
  <dd><a href="/member/lt/?rtype=NA">正码</a> </dd>
  <dd><a href="/member/lt/?rtype=NX">合肖</a> </dd>
  <dd><a href="/member/lt/?rtype=NAS&amp;rtypeN=N1">正码特</a> </dd>
  <dd><a href="/member/lt/?rtype=SPB&showTableN=3">总肖 </a> </dd>
  <dd><a href="/member/lt/?rtype=NO">正码1-6</a> </dd>
  <dd><a href="/member/lt/?rtype=SPA&showTableN=2">色波 </a> </dd>
  <dd><a href="/member/lt/?rtype=NAP">正码过关</a> </dd>
  <dd><a class="NowPlay" href="/member/lt/?rtype=HB&showTableN=1">半波 </a> </dd>
  <dd><a href="/member/lt/?rtype=CH">连码</a> </dd>
  <dd><a class="NowPlay" href="/member/lt/?rtype=HB&showTableN=2">半半波 </a> </dd>
  <dd><a href="/member/lt/?rtype=LX">连肖</a> </dd>
  <dd><a href="/member/lt/?rtype=C7&showTableN=2">七色波</a> </dd>
  <dd><a href="/member/lt/?rtype=LX">连尾</a> </dd>
  <dd><a href="/member/lt/?rtype=SPA&showTableN=3">头尾数 </a> </dd>
  <dd><a href="/member/lt/?rtype=NI">自选不中</a> </dd>
  <dd><a href="/member/lt/?rtype=SPB&showTableN=2">平特尾数 </a> </dd>
  <dd><a href="/member/lt/?rtype=SPA&showTableN=1">特码生肖 </a> </dd>
</dl>
<nav id="NAVSP">
  <a href="/member/lt/">特别号A面</a>
  <a href="/member/lt/?rtype=SPbside">特别号B面</a>
</nav>
<nav id="NAVNA">
  <a href="/member/lt/?rtype=NA">正码</a>
  <a href="/member/lt/?rtype=NAS&amp;rtypeN=N1">正码特</a>
  <a href="/member/lt/?rtype=NO">正码1-6</a>
  <a href="/member/lt/?rtype=NAP">正码过关</a>
</nav>
<nav id="NAVCH">
  <a href="/member/lt/?rtype=CH">连码</a>
  <a href="/member/lt/?rtype=LX">连肖</a>
  <a href="/member/lt/?rtype=LX">连尾</a>
  <a href="/member/lt/?rtype=NI">自选不中</a>
</nav>
<nav id="NAVSPA">
  <a href="/member/lt/?rtype=SPA&showTableN=1">特码生肖</a>
  <a href="/member/lt/?rtype=C7&showTableN=1">正肖</a>
  <a href="/member/lt/?rtype=SPB&showTableN=1">一肖</a>
  <a href="/member/lt/?rtype=NX">合肖</a>
  <a href="/member/lt/?rtype=SPB&showTableN=3">总肖</a>
</nav>
<nav id="NAVSPC">
  <a href="/member/lt/?rtype=SPA&showTableN=2">色波</a>
  <a href="/member/lt/?rtype=HB&showTableN=1">半波</a>
  <a href="/member/lt/?rtype=HB&showTableN=2">半半波</a>
  <a href="/member/lt/?rtype=C7&showTableN=2">七色波</a>
</nav>
<nav id="NAVHF">
  <a href="/member/lt/?rtype=SPA&showTableN=3">头尾数</a>
  <a href="/member/lt/?rtype=SPB&showTableN=2">平特尾数</a>
</nav>
              </div>


        ';
    }
    return $nowPlayPage;
}

$mysqli->close();