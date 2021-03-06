<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Member Center</title>
<link href="/cl/tpl/commonFile/css/standard.css" rel="stylesheet" type="text/css" />
<link href="/cl/tpl/commonFile/css/jquery-ui/start/jquery-ui-1.8.21.custom.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
/*共用*/
input{
    padding-left:6px;
    padding-right:6px;
}
body{
    background-color:#FFFFFF;
}
.bodyStyle{
    background-color:#FFFFFF;
}
.skinbg{
    background-color:#FBE9AC;
}
/*會員中心*/
#MACenter #MALogo {
    float: left;
   /* background: url(/images/logo.png) top left no-repeat;*/
    display: inline;
    margin: 12px 0 0 30px;
    width: 170px;
    height: 80px;
}
/*忘記密碼*/
#forgetPwd{
    width:300px;
    margin:35px auto;
    font-size:12px;
    color:#000000;
}
#forgetPwd table{
    background-color:#401109;
}
#forgetPwd table thead,
#forgetPwd table tfoot{
    color:#FFFFFF;
    text-align:center;
}
#forgetPwd table tbody{
    background-color:#FFFFFF;
}
#forgetPwd table td.style1{
    text-align:right;
    text-indent: 1em;
    padding-right:5px;
    width:50%;
}
#bottom-text{
    text-align:left;
}
.error{
    color:#FF0000;
}

/*修改密碼、修改帳號共用*/
#memAccTable{
    border-collapse:collapse;
    text-align:center;
}
#memAccTable table{
    background-color:#401109;
    border-collapse:collapse;
    margin: 0 auto;
    text-align:left;
}
#memAccTable table tr td{
    border:1px solid #666666;
    height:30px;
}
#memAccTable table thead,
#memAccTable table tfoot{
    color:#FFFFFF;
    font-size:12px;
    padding-left:59px;
    height:37px;
    text-align:center;
}
#memAccTable table thead td{
    text-align:left;
    padding-left:59px;
}
#memAccTable table tbody{
    color:#000000;
    background-color:#FFFFFF;
    font-size:12px;
    text-align:left;
}
#memAccTable table .tipText{
    width:50%;
    text-align:right;
    padding-right:5px;
}
#memAccTable table .tipDwText{
    width:40%;
    text-align:right;
    padding-right:5px;
}
#memAccTable table .bottomTip{
    font-size:11px;
    text-align:center;
    background-color:#F7D539;
    height:40px;
}
#memAccTable table  .modifyProfileTitle{
    font-weight:normal;
    font-size:12px;
    text-align:center;
    padding-left:0;
}
a.chg_passwd_flag {
    color:#FFFFFF;
    text-decoration:none;
}
/*額度轉換、會員資料*/
#mainContent{
    font-size:12px;
    border:1px solid #707161;
}
#pageTitle{
    background-color:#616A74;
    color: #FFFFFF;
    padding: 4px 0 0 10px;
}
#tableWrap{
    background-color:#CBD1D4;
    border-width:0 1px 1px;
    border-color:#707161;
    border-style:solid;
    padding:1px 2px 2px;
}
.tableStyle01{
    border:1px solid #666666;
    margin: 0px auto;
    text-align:center;
    width:100%;
}
.tableStyle01 th{
    background-color:#999999;
    border:1px solid #666666;
    color:#000000;
    font-weight:normal;
    text-align:center;
    height: 23px;
    line-height: 23px;
}
.tableStyle01 td{
    background-color:#FFFFFF;
    border:1px solid #666666;
    padding:2px;
}
.tableStyle01 tr .gameLimit{
    background-color: #FBE9AC;
    color: #000000;
}
.za_button{
    font-size:12px;
}
/*下注狀況*/
.tableStyle01 .wagers th{
    background-color:#F1EFEF;
    text-align:center;
}
#pageTitle #pageTitleEx{
    float:right;
    color:#FF0000;
}
#pageTitle #pageTitleEx a{
    color:#CC0000;
    text-decoration:none;
    font-weight:bold;
}
.tableStyle01 .b_rig .amountGold{
    background-color:#CCCCCC;
    text-align:right;
}
.tableStyle01 .b_rig .awinGold{
    background-color:#990000;
    color:#FFFFFF;
    text-align:right;
}
.tableStyle01 .red_border {
    border: 2px solid #FF0000;
}
.tableStyle01 .b_rig_mor {
    background-color:#EDEDED;
    text-align:right;
}
.tableStyle01 .b_rig_mor td{
    background-color:#EDEDED;
}
.tableStyle01 .b_rig{
    background-color:#FFFFFF;
    text-align:right;
}
.b_cen{
    background-color:#FFFFFF;
    text-align:center;
    height:70px;
}

/*往來紀錄*/
#mainContent p.subject{
    width:82px;
    height:18px;
    line-height:18px;
    text-indent: 5px;
}
.Wdate{
    width:90px;
}
.BookTable td{
    padding:1px 0px;
}
#foot{
    text-align:left;
    color:#000000;
    font-size:12px;
    padding-left:10px;
}
#foot a{
    color:#CC0000;
    font-weight:bold;
    text-decoration:none;
}
/*線上存取款*/
#bank_body{
    background:#1C130E;
}
#bank_header{
    height:100px;
    margin:0px auto;
    width:800px;
    background:url(/cl/tpl/starball/ver1/image/rule_logo_bg.jpg) repeat-x ;
}
#bank_logo{
    width:250px;
    height:100px;
    background:url(/cl/tpl/starball/ver1/image/rule_logo.jpg) no-repeat ;
}
#bank_content {
    width:800px;
    margin:0px auto;
    background-color:#FFFFFF;
}
#bank_footer{
    margin:0px auto;
    width:800px;
    height:30px;
    color:#FFFFFF;
    font-size : 11px;
    line-height:30px;
    font-weight: normal;
    font-family: Verdana, Arial, Sans-serif,taipei;
    background:#250F0E;
}
#bank_footer font{
    color:#FFFFFF;
}
#pay_system_option a{
    color:#FF0000;
    text-decoration: none;
}/*會員註冊*/
#joinMember iframe{
    width: 730px;
    height: 1000px;
}
#memCash_body{
    background-color:transparent;
    color:#FFE4CA;
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
    border:3px solid #472E27;
    border-radius: 10px;
}
#memCash_body legend{
    color:#FC9;
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
    color:#A4845D;
}
#memCash_body .memCash_text{
    line-height: 15px;
    height: auto;
}
#myFORM input[type=text], #myFORM input[type=password], #myFORM select{
    border: 1px solid #ABADB3;
    -moz-border-radius:3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    box-shadow: 0 0 6px #CFD1D8;
    -moz-box-shadow: 0 0 6px #CFD1D8;
    -webkit-box-shadow: 0 0 6px #CFD1D8;
}
@charset "utf-8";
/*main*/
body {
    background: url(/cl/tpl/template/images/MCenter/orange/bg.jpg) top center no-repeat #272A31;
    padding-top: 4px;
    font-size: 12px;
}
#MACenter {
    margin: 0 auto;
    width: 1000px;
    font-size: 12px;
}
#MAContent {
    background: url(/cl/tpl/template/images/MCenter/orange/content_bg.jpg) top left repeat-y;
}
#MALeft {
    float: left;
    display: inline;
    margin-left: 1px;
    width: 220px;
}
#MAMain {
    float: left;
    width: 768px;
	    /* overflow: auto;
	        height: 363px;
	        overflow-x: hidden; */

}


#MAMain::-webkit-scrollbar  
{  
    width: 10px;  
    height: 10px;  
    background-color: #F5F5F5;  
}  
  
/*定义滚动条轨道 内阴影+圆角*/  
#MAMain::-webkit-scrollbar-track  
{  
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);  
    border-radius: 10px;  
    background-color: #F5F5F5;  
}  
  
/*定义滑块 内阴影+圆角*/  
#MAMain::-webkit-scrollbar-thumb  
{  
    border-radius: 10px;  
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);  
    background-color: #EF9E04;
}

/*鼠标滑过滑动条*/
#MAMain::-webkit-scrollbar-thumb:hover{
	background-color:#7F3E08;
}  
	





#MACenterContent #MMainData {
    padding: 0 6px;
}

/*header*/
#MAHeader {
    position: relative;
    background: url(/cl/tpl/template/images/MCenter/orange/header_bg.jpg) top left no-repeat;
    width: 1000px;
    height: 100px;
}
#MATime {
    position: absolute;
    top: 0;
    right: 0;
    background: url(/cl/tpl/template/images/MCenter/orange/timezone_bg.jpg) top left no-repeat;
    width: 257px;
    height: 36px;
    font-family: 'Times New Roman';
}
#timepic {
    position: absolute;
    top: 7px;
    left: 20px;
    background: url(/cl/tpl/template/images/MCenter/orange/time.png) top left no-repeat;
    width: 22px;
    height: 22px;
}
#MATime #est_bg {
    padding-top: 7px;
    padding-left: 44px;
    width: 210px;
    height: 22px;
    line-height: 22px;
    -MS-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
    -moz-opacity: 1;
    opacity: 1;
    font-size: 12px;
    color: #FFF;
    text-align: left;
}
#MATime .time_text {
    background-color: transparent;
}
#MADeposit {
    position: absolute;
    top: 60px;
    right: 20px;
    background: url(/cl/tpl/template/images/MCenter/orange/btn01.png) top left no-repeat;
    padding-left: 34px;
    width: 96px;
    height: 28px;
    line-height: 28px;
    color: #fff;
    cursor: pointer;
}
#MADeposit:hover {
    color: #ccc;
}

/*left menual*/
#welcome {
    background: url(/cl/tpl/template/images/MCenter/orange/welcome.jpg) top left no-repeat;
    width: 220px;
    height: 48px;
    line-height: 48px;
    font-weight: bold;
       font-size: 16px;
    text-align: center;
    color: #FFf;
}
.sidebar {
    margin-bottom: 35px;
}
.sidebar div, .sidebar a {
    display: block;
    background: url(/cl/tpl/template/images/MCenter/orange/sideNav.jpg) top left no-repeat;
    padding-left: 40px;
    width: 180px;
    height: 32px;
    line-height: 32px;
    color: #ccc;
    text-decoration: none;
}
.sidebar #sidebar-mem {
    background: url(/cl/tpl/template/images/MCenter/orange/sideNav01.jpg) top left no-repeat;
    margin-bottom: 5px;
    height: 38px;
    line-height: 38px;
}
.sidebar #sidebar-msg {
    background: url(/cl/tpl/template/images/MCenter/orange/sideNav02.jpg) top left no-repeat;
    margin-bottom: 5px;
    height: 38px;
    line-height: 38px;
}
#MALeft a.mcurrent {
    background-position: bottom left;
    color: #000;
}

/*main menual*/
#MNav {
    background: url(/cl/tpl/template/images/MCenter/orange/nav_bg.jpg) top left repeat-x;
    position: relative;
    padding-left: 80px;
    width: 688px;
    height: 48px;
    font-family: 'Times New Roman';
}
#MNav .mbtn {
    float: left;
    display: block;
    width: 100px;
    height: 37px;
    line-height: 37px;
    text-align: center;
    font-weight: bold;
    color: #000;
}
#MNav .navSeparate {
    float: left;
    background: url(/cl/tpl/template/images/MCenter/orange/nav_img.jpg) top left no-repeat;
    margin-top: 2px;
    width: 2px;
    height: 34px;
}
#MNav span.mbtn, #MNav a.mbtn:hover {
    background: url(/cl/tpl/template/images/MCenter/orange/nav_hover.jpg) bottom left no-repeat;
}
#MNav a.mbtn {
    color: #000;
    text-decoration: none;
}
#MNav a.mbtn:hover {
    color: #000;
}
#MACenterContent h2.MSubTitle {
    position: relative;
    padding-left: 16px;
    height: 18px;
    color: #444;
}
#MACenterContent h3.MSubInfo {
    margin-bottom: 8px;
    padding-right: 8px;
    text-align: right;
    color: #851;
    font-weight: normal;
}

/*table*/
table.MMain {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    text-align: left;
    font-size: 12px;
    color: #FFF;
}
table.MMain th {
    background: #DFDFDF;
    height: 1.8em;
    color: #333;
    font-weight: normal;
    text-align: center;
}
table.MMain td {
    background: #FFF;
    line-height: 1.5em;
    color: #666;
    padding: 6px 8px;
}
table.MMain, table.MMain th, table.MMain td {
    border: 1px solid #CCC;
}
table.MNoBorder, table.MNoBorder th, table.MNoBorder td {
    background: none;
    border: none;
}
table.MMain th.MContent, table.MMain td.MContent {
    text-align: left;
}
table.MMain td.MNumber {
    text-align: right;
}
table.MMain td.MNotice {
    color: #555;
}
table.MMain td.MBgcolor {
    background: #600;
    color: #FFF;
}
table.MMain td.MBgcolor2 {
    background: #006;
    color: #FFF;
}

/*表格奇偶數行設定*/
table.MMain tr.MColor1 {
    /*background: #FFF;*/
}
table.MMain tr.MColor2 {
    /*background: #CCC;*/
}

/*表格滑鼠滑入效果*/
table.MMain tbody td.mouseenter {
    color: #000;
}

/*次選單*/
#MNavLv2 {
    background: url(/cl/tpl/template/images/MCenter/orange/nav2_bg.jpg) center bottom no-repeat;
    margin-bottom: 8px;
    padding-left: 5px;
    line-height: 30px;
    color: #630;
}
#MACenterContent .MTitleName {
    float: left;
    /*background: url(/cl/tpl/template/images/MCenter/orange/game_main.jpg) top left repeat-x;*/
    padding-left: 30px;
    width: 106px;
    height: 37px;
    line-height: 37px;
    color: #FC0;
    font-weight: bold;
}
#MACenterContent .MGameType {
    padding: 0 2px;
    height: 24px;
    line-height: 24px;
    color: #630;
    cursor: pointer;
}
#MACenterContent .MGameType:hover, #MACenterContent .MCurrentType {
    color: #333;
}
#MACenterContent .MControlNav {
    margin-bottom: 8px;
    color: #333;
}

/*表單元件*/
#MACenterContent .MBtnStyle {
    background: url(/cl/tpl/template/images/MCenter/orange/btn02.jpg) top left no-repeat;
    width: 100px;
    height: 22px;
    line-height: 22px;
    border: none;
    color: #000;
    cursor: pointer;
}
#MACenterContent .MFormStyle {
    /*background: #000;
    color: #FFF;*/
}

/*會員中心個人信息*/
#general-msg .notRead,
#general-msg .notRead a,
#general-msg .notRead span {
    font-weight: bold;
    color: #333;
}
#general-msg .haveRead,
#general-msg .haveRead a,
#general-msg .haveRead span {
    color: #666;
}
#general-msg .msgcontent td{
    height: auto;
}
#msgfoot a.pagelink {
    margin-right: 8px;
    color: #12C;
    font-size: 16px;
    text-decoration: none;
}
#msgfoot a.pagelink:hover {
    text-decoration: underline;
}
#currentpage {
    margin-right: 8px;
    color: #333;
    font-size: 16px;
}
#general-msg .haveRead a.mouseenter, #general-msg .notRead a.mouseenter {
    color: #000;
}

/*會員中心其它*/
table.MMain td a.pagelink {
    color: #004892;
    font-weight: bold;
}
table.MMain td span.MImportant, table.MMain td span.MCashNeg, table.MMain td span#MSwitchResult {
    color: #922;
    font-weight: bold;
}
#MBlockImg {
    background: url(/cl/tpl/template/images/loading/ajax-loader-white.gif) center no-repeat;
    margin: 0 auto;
    width: 32px;
    height: 32px;
}

/*會員中心彩票帳戶歷史細項*/
table.MMain span.g-type {

}
table.MMain span.g-serial {

}
table.MMain span.g-result {

}
table.MMain span.g-order-type, table.MMain span.g-real-type, table.MMain span.g-odds {
    color: #922;
}
/*footer*/
#MAContentBottom {
    background: url(/cl/tpl/template/images/MCenter/orange/footer_nav.jpg) top left no-repeat;
    width: 1000px;
    height: 30px;
}
#MAFoot {
    background: url(/cl/tpl/template/images/MCenter/orange/footer_bg.jpg) top left no-repeat;
    padding-top: 20px;
    padding-right: 40px;
    width: 960px;
    height: 50px;
    text-align: right;
    color: #000;
}
/*其它*/
.clear {
    margin: 0;
    padding: 0;
    clear: both;
}
a{
    outline: none; /* for Firefox Google Chrome  */
    behavior:expression(this.onFocus=this.blur()); /* for IE */
}    -->
	/* #Mask{width: 100%;
	    height: 100%;
	    background-color: #6A8A8C;
	    position: fixed;
	    z-index: 99999;
	    opacity: 0.1;} */
</style>
</head>
<body>
<!-- <div id="Mask"></div> -->
<div id="MACenter">
    <div id="MAHeader">
        <div id="MALogo">
            
           <!--  <embed src="logo.swf" autoplay="true" flashvars="prizeResult=3" allowscriptaccess="always" wmode="transparent" menu="false" quality="high" style=" width: 262px;margin-top: -32px;" type="application/x-shockwave-flash" pluginspage="http://get.adobe.com/cn/flashplayer/" name="FlashZhuan"> -->
		   <img src="/pic/logo.png">
        </div>
        <div id="MATime"><div id="timepic"></div><div id="est_bg" class="time_text">北京时间：<span id="EST_reciprocal"></span></div>
            <style type="text/css">
                .time_text{
                    width:200px;
                    height:20px;
                    line-height:20px;
                    /* For IE 8 */   -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
                    /* For IE 5-7 */ *filter:alpha(opacity=80);
                    /* For W3C */    opacity:0.80;
                    font-size:12px;
                    color:#000;
                    text-align:center;
                    background-color:#FFF;
                }
            </style>
            <script>
                var estObj = {
                    now: (new Date()).valueOf() || 0,
                    pre0: function(num){
                        if (num < 10) {num = '0' + num;}
                        return num;
                    },
                    /* 即時時間顯示 */
                    dispTime: function() {
                        var nowNew = (estObj.now += 1000),
                            dateObj = new Date(nowNew),
                            p0 = estObj.pre0,
                            Y  = dateObj.getFullYear(),
                            Mh = dateObj.getMonth() + 1,
                            D  = p0(dateObj.getDate()),
                            H  = p0(dateObj.getHours()),
                            M  = p0(dateObj.getMinutes()),
                            S  = p0(dateObj.getSeconds());

                        if(Mh > 12) {Mh = 01;}
                        else if(Mh < 10) {Mh = '0'+Mh;}

                        document.getElementById('EST_reciprocal').innerHTML = Y+'/'+Mh+'/'+D+' - '+H+':'+M+':'+S;
                    }
                };
                (function() {setInterval(estObj.dispTime, 1000);}() );
            </script>
        </div>
        <div id="MADeposit" onmouseover="mover(this);" onmouseout="mout(this);" onclick="f_com.MChgPager({method: 'bankSavings'});">线上存款</div>
    </div>
    <div id="MAContent">
        <div id="MALeft">
            <div id="welcome">会员中心</div>
            <div class="sidebar">
                <div id="sidebar-mem">会员专区</div>
                <a href="javascript: f_com.MChgPager({method: 'memberData'});" <?php  if($other=="memberData"){?>class="mcurrent"<?php  }?> >．&nbsp;我的帐户</a>
                <a href="javascript: f_com.MChgPager({method: 'gameSwitch'}, {type: 'banktrans'});" <?php  if(in_array($other,array("moneyView","bankSavings","bankTake"))){?>class="mcurrent"<?php  }?> id="banktrans" >．&nbsp;银行交易</a>
                <a href="javascript: f_com.MChgPager({method: 'gameSwitch'}, {type: 'betrecord'});" <?php  if($other=="ballRecord"){?>class="mcurrent"<?php  }?> >．&nbsp;投注记录</a>
            </div>
            <div class="sidebar">
                <div id="sidebar-msg">信息公告</div>
                <a href="javascript: f_com.MChgPager({method: 'hotNews'});" >．&nbsp;最新信息</a>
                <a href="javascript: f_com.MChgPager({method: 'msg'});" <?php  if($other=="msg"){?>class="mcurrent"<?php  }?> >．&nbsp;个人信息</a>
            </div>
        </div>
        <div id="MAMain">
            <div id="MACenter-content"></div>
        </div>
        <div class="clear"></div>
    </div>
    <div id="MAContentBottom"></div>
    <div id="MAFoot">Copyright &copy; 申博太阳城 Reserved</div>
</div>
<script type="text/javascript" src="/cl/js/jquery-1.7.2.min.js?_=171"></script>
<script type="text/javascript" src="/cl/js/jquery-ui-1.8.21.custom.min.js?_=171"></script>
<script type="text/javascript" src="/cl/js/pluging/jquery.blockUI.min.js?_=171"></script>
<script type="text/javascript" src="/cl/js/common.js?_=171"></script>
<script type="text/javascript" src="/cl/js/pluging/jquery.cookie.js?_=171"></script>
<script type="text/javascript" src="/cl/index.js"></script>
<script type="text/javascript">
    var lang = "zh-cn";
    if(lang == 'th') {
        var estText = document.getElementById('est_bg');
        if(estText) {
            estText.childNodes[0].nodeValue = "E.S.T：";
        }
    }

    //遮罩背景色
    f_com.SetOptions('maskColor', '#333');
    f_com.SetOptions('blockId', '#MACenter');

    f_com.MChgPager({method: "<?=$other?>"});
    $(".MMain tbody tr").live({
        mouseenter: function() {
            $("td", this).addClass("mouseenter");
        },
        mouseleave: function() {
            $("td", this).removeClass("mouseenter");
        }
    });
    $("#MALeft a").click(function() {
        if(!$(this).hasClass('mcurrent')) {
            $("#MALeft a").removeClass('mcurrent');
            $(this).addClass('mcurrent');
        };
    });
    $("#MADeposit").click(function(){
        var _bankBTN = $("#banktrans");
        if(!_bankBTN.hasClass('mcurrent')) {
            $("#MALeft a").removeClass('mcurrent');
            _bankBTN.addClass('mcurrent');
            console.log(123);
        }
    })

    function mover(o){
        o.style.backgroundPosition='0 bottom';
    }

    function mout(o){
        o.style.backgroundPosition='0 top';
    }
    //setInterval(function() {
    //    if($.cookie('SESSION_ID') == 'guest' || $.cookie('SESSION_ID') == '' || !$.cookie('SESSION_ID')) {
    //        alert("你被登出!!");
    //        window.opener=null; window.close();
    //    }
    //}, 5000);

    //鎖右鍵
    function cancelMouse(){ return false; }
    document.oncontextmenu = cancelMouse;
</script>
<!--[if IE 6]>
<script type="text/javascript">
    document.execCommand("BackgroundImageCache", false, true);
</script>
<![endif]-->
</body>
</html>