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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
澳门永利
</title>
    <link href="/css/css_1.css" rel="stylesheet" type="text/css" />
    <link href="/cl/css/bcss.css" rel="stylesheet" type="text/css" />
    <script language="javascript" src="/js/jquery-1.7.1.js"></script>
    <script src="/cl/js/common.js"></script>
<style>
.fontcolor {
	float: left;
	background: url(/images/yes.jpg) no-repeat left;
	line-height: 25px;
	width: 360px;
	padding: 0 0 0 26px;
	height: 25px;
	color: #000;
}
.zhuce_03 {
	float: left;
	background: url(/images/no.jpg) no-repeat left;
	line-height: 25px;
	width: 360px;
	padding: 0 0 0 26px;
	height: 25px;
	color: #000;
}
ul.mtab-menual{
	margin:20px 0px;
    float: left!important;
    *float:none!important;
    *float:none;
    list-style: none outside none;
    width: 100%;
	
}
ul.mtab-menual li{
	float:left;
    width:96px;
    height:22px;
    line-height:22px;
    margin-right:4px;
    color: #FFF;
    border:1px #FFF solid;
    text-align:center;
    list-style-type:none;
    cursor: pointer;
    background: #404040;
}
ul.mtab-menual li:hover{
    background-color:#996600;
 }
ul.mtab-menual li.mtab{
    background-color:#996600;
 }
</style>
</head>
<script language="javascript">
function HotNewsHistory(){
window.open('/app/member/help/noticle.php','newwindow','menubar=no,status=yes,scrollbars=yes,top=150,left=408,toolbar=no,width=575,height=550');
}
</script>
<script language="javascript">
if(self==top){
	top.location='/index.php';
}
function menu_click(id){
	parent.topFrame.document.getElementById("textGlitter"+id).click();
	}
function page_click(id){
	window.parent.document.getElementById(id).click();
	}

$(window).ready(function(){
	$(window.parent.parent.document).find("#mainFrame").height( $(document.body).height() );
});

</script>
<script language="javascript" src="/js/xhr.js"></script>
<script language="javascript" src="/js/zhuce.js"></script>
<style>
#sub{width:1000px;}
.first-jp-wrap {float:left;height:43px;margin-left:250px;position:relative;width:488px;background:url("/pic/prize_bg.png") no-repeat scroll left top;}
.first-jp-wrap .ele-jackpot-wrap {cursor:pointer;font-size:22px;height:35px;left:121px;line-height:35px;position:absolute;text-align:center;top:7px;width:241px;color: #FDDA52;}
.ele-jackpot-wrap span{letter-spacing:2px; font-weight:bolder;}

#articles h3{background: url("/pic/page_body_top.png") no-repeat scroll center top; height:85px;margin:85px 0 0 0;}
.redborder{ color:#FFF; }
.main_bg{ width:100%; height:287px; background:url(/imgs/about_wel.png) repeat-x center -20px; }
.about_bg{ width:100%; background:url(/imgs/about_bg.png) repeat-x; }
.about_main_w{ width:1080px; margin:0 auto; position:relative; padding-top:65px; }
.about_main_w .about_top{ width:1080px; height:240px; background:url(/imgs/about_top.png) no-repeat center top; position:absolute; top:-100px; }
.about_main_w .about_main{ width:1080px; background:url(/imgs/about_bg02.png) repeat-y center top; }

.about_left{
	float: left;
    width: 200px;
    height: 580px;
    padding: 0 0 0 10px;
    background: url(/imgs/about_left.png) no-repeat center 0px;
}
.left_list{
	padding:139px 0 0 75px;
}
.left_list a{
	display:block;
	height: 30px;
    line-height: 30px;
    margin-bottom: 9px;
    font-weight: bold;
    color: #311c00;
    font-size:12px;
}
.left_list a:hover{
	color:#F00;
}
.icos:hover{
	color:#fff;
}
</style>
<body>
<!--
<div class="sidebar">
        <div class="sideba">
            <ul id="sideba_all">
                <li>
                    <img alt="" src="/images/shouquan.gif"></li>
                <li><a class="htm_sidbar_lottory" onclick="click_url('/member/lottery/Cqssc.php?1=1')" href="javascript:void(0);">
                    <img alt="" src="/images/cp.jpg"></a></li>
                <li><a class="htm_sidbar_delar" onclick="click_url('/member/zhenren/mylive.php')" href="javascript:void(0);">
                    <img alt="" src="/images/zr.jpg"></a></li>
                <li><a class="htm_sidbar_SportsBook" onclick="click_url('/app/member/sport.php')" href="javascript:void(0);">
                    <img alt="" src="/images/ty.jpg"></a></li>
                <li><a onclick="click_url('/member/lt/')" href="javascript:void(0);">
                    <img alt="" src="/images/yh.jpg"></a></li>
            </ul>
        </div>
</div>
-->   
<div class="main_bg"></div>
<div class="about_bg">
    <div class="about_main_w">
        <div class="about_top">
            <div style="clear: both;width:620px; height:30px; position:absolute; left:265px;top:130px; overflow:hidden;"><div style="padding: 10px auto; height: 25px; float: left; width: 100px; text-align: center; color: yellow; line-height: 25px;vertical-align: middle;"></div><div style="float: left; width: 900px; height: 25px; line-height: 25px;vertical-align: middle;color:#fff;"><marquee onclick="HotNewsHistory();" style="cursor:pointer;" scrollamount="2"><?=$msg;?></marquee></div></div>
        </div>
        <div class="about_main">
            <div style="width:100%;height:89px;background:url(/imgs/about_bg01.png) no-repeat center top">
                
            </div>
            <div style="height:8px;"></div>
            <div style="width:1000px;margin:0 auto;">
                <div style="width: 1000px;overflow:hidden;">
				<div class="about_left">
					<div class="left_list">
						<a href="javascript:click_url('/app/member/help/dlhz1.php');">公司简介</a>
						<a href="javascript:void(0);" onclick="click_url('/cl/reg.php')" >免费开户</a>
						<a onclick="click_url('/member/lottery/Cqssc1.php')" href="javascript:void(0);">手机投注</a>
						<a href="javascript:click_url('/app/member/help/dlhz2.php');">联络我们</a>
						<a href="javascript:click_url('/app/member/help/dlhz4.php');">存款帮助</a>
						<a href="javascript:click_url('/app/member/help/dlhz5.php');">取款帮助</a>
						<a href="javascript:click_url('/app/member/help/dlhz3.php');">加盟代理</a>
					</div>
				</div>
			<div id="sub">
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
			  <div id="direction">
			    <div id="articles">
			      
			      <div id="Union" class="redborder">
			        <ul class="mtab-menual">
			          <li id="#Union1" class="mtab">联盟方案</li>
			          <li id="#Union2">联盟协议</li>
					  <li><a class="icos" href="http://<?=$row["conf_www"]?>/agent/agent_login.php" target="_blank">代理登陆</a></li>
			        </ul>
			        <div id="Union1">
			         

			<font face="微软雅黑"><strong>代理方案 </strong></font>
								<p><font face="微软雅黑">
								提供高额合作回报率，加入澳门永利公司合作伙伴计划无需任何费用，不需承担任何风险。只要您介绍会员到本公司，您就可以获得我们净赢利的回报。 
								本公司有着强大的工作团队与您携手共创双赢未来。</font></p>
								<p><font face="微软雅黑">1．我们提供顶级产品：体育、真人娱乐城、电子游戏、快乐彩、彩票等多游戏种类。</font></p>
								<p><font face="微软雅黑">2．我们的市场策略保证大量客户和高回报。</font></p>
								<p><font face="微软雅黑">3．您可以获得更多佣金，佣金比率高达50%。</font></p>
								<p><font face="微软雅黑">4．我们提供的优质软件可以统计您的表现。</font></p>
								<p><font face="微软雅黑">5．我们有受过良好训练的合作伙伴队伍满足您任何需求。</font></p>
								<font face="微软雅黑"><strong>注册申请 </strong></font>
								<p><font face="微软雅黑">
								[代理注册]请联系代理专员提出申请，并确实填写各项资料。澳门永利娱乐城会评估审核联盟申请讯息，由专员与您联系开通，并提供您的注册帐号、密码及推广链接。</font></p>
																<table style="width: 680px; height: 261px" border="1" cellSpacing="1" cellPadding="1">
																	<tr>
																		<td style="text-align: center; background-color: #996600" rowspan="2" width="166">
																		<font face="微软雅黑">
																		<span style="color: rgb(0, 0, 0)">
																		<strong>当月营利</strong></span></font></td>
																		<td style="text-align: center; background-color: #996600" rowspan="2" width="152">
																		<font face="微软雅黑">
																		<span style="color: rgb(0, 0, 0)">
																		<strong>当月最低有效会员</strong></span></font></td>
																		<td style="text-align: center; background-color: #996600" width="334" colspan="3">
																		<font face="微软雅黑">
																		<span style="color: rgb(0, 0, 0)">
																		<strong>当月退佣比例</strong></span></font></td>
																	</tr>
																	<tr>
																		<td style="text-align: center; background-color: #996600" width="113">
																		<font face="微软雅黑">
																		<span style="color: rgb(0, 0, 0)">
																		<strong>视讯、电子</strong></span></font></td>
																		<td style="text-align: center; background-color: #996600" width="121">
																		<font face="微软雅黑">
																		<span style="color: rgb(0, 0, 0)">
																		<strong>彩票(有效投注)</strong></span></font></td>
																		<td style="text-align: center; background-color: #996600" width="100">
																		<font face="微软雅黑">
																		<span style="color: rgb(0, 0, 0)">
																		<strong>体育投注</strong></span></font></td>
																	</tr>
																	<tr>
																		<td style="text-align: center" width="166">
																		<font face="微软雅黑">
																		1~50000</font></td>
																		<td style="text-align: center" width="152">
																		<font face="微软雅黑">
																		5或以上</font></td>
																		<td style="text-align: center" width="113">
																		<font face="微软雅黑">
																		30%</font></td>
																		<td style="text-align: center" width="121">
																		<font face="微软雅黑">
																		0.1%</font></td>
																		<td style="text-align: center" width="100">
																		<font face="微软雅黑">
																		10%</font></td>
																	</tr>
																	<tr>
																		<td style="text-align: center" width="166">
																		<font face="微软雅黑">
																		50001~300000</font></td>
																		<td style="text-align: center" width="152">
																		<font face="微软雅黑">
																		10或以上</font></td>
																		<td style="text-align: center" width="113">
																		<font face="微软雅黑">
																		35%</font></td>
																		<td style="text-align: center" width="121">
																		<font face="微软雅黑">
																		0.2%</font></td>
																		<td style="text-align: center" width="100">
																		<font face="微软雅黑">
																		15%</font></td>
																	</tr>
																	<tr>
																		<td style="text-align: center" width="166">
																		<font face="微软雅黑">
																		300001~800000</font></td>
																		<td style="text-align: center" width="152">
																		<font face="微软雅黑">
																		50或以上</font></td>
																		<td style="text-align: center" width="113">
																		<font face="微软雅黑">
																		40%</font></td>
																		<td style="text-align: center" width="121">
																		<font face="微软雅黑">
																		0.3%</font></td>
																		<td style="text-align: center" width="100">
																		<font face="微软雅黑">
																		20%</font></td>
																	</tr>
																	<tr>
																		<td style="text-align: center" width="166">
																		<font face="微软雅黑">
																		800001~1200000</font></td>
																		<td style="text-align: center" width="152">
																		<font face="微软雅黑">
																		100或以上</font></td>
																		<td style="text-align: center" width="113">
																		<font face="微软雅黑">
																		45%</font></td>
																		<td style="text-align: center" width="121">
																		<font face="微软雅黑">
																		0.4%</font></td>
																		<td style="text-align: center" width="100">
																		<font face="微软雅黑">
																		25%</font></td>
																	</tr>
																	<tr>
																		<td style="text-align: center" width="166">
																		<font face="微软雅黑">
																		1200001以上</font></td>
																		<td style="text-align: center" width="152">
																		<font face="微软雅黑">
																		200或以上</font></td>
																		<td style="text-align: center" width="113">
																		<font face="微软雅黑">
																		50%</font></td>
																		<td style="text-align: center" width="121">
																		<font face="微软雅黑">
																		0.5%</font></td>
																		<td style="text-align: center" width="100">
																		<font face="微软雅黑">
																		30%</font></td>
																	</tr>
																	<tr>
																		<td colSpan="5">
																		<font face="微软雅黑">
																		注：澳门永利娱乐城保留上述条例之最终更改权！<br>
																		　　请谨记任何使用不诚实方法以骗取佣金将会永久冻结账户，佣金一律不予发还！</font></td>
																	</tr>
																</table>
																<p><font face="微软雅黑">代理专员QQ 
																：710115599</font></p>
																<p><font face="微软雅黑">
																代理专员邮箱：710115599@qq.com</font></p>
																<p><font face="微软雅黑">
																<strong>■ 回馈/佣金计算</strong></font></p>
																<p><font face="微软雅黑">● 請注意：</font></p>
																<p><font face="微软雅黑">
																　视讯、球类、机率等项目，以报表中【派彩】字段，扣除相应费用后，依照上表门坎 
																X 佣金百分比。</font></p>
																<p><font face="微软雅黑">
																　彩票项目以报表中【实际投注】字段，扣除相应费用后 X 
																0.1% 佣金百分比。</font></p>
																<p><font face="微软雅黑">● 
																当月联盟体系以：视讯、球类、机率、彩票等项目的【派彩/投注量/总额公点金额】扣除相应费用后产生退佣总计，成以相应退佣百分比後。</font></p>
																<p><font face="微软雅黑">● 
																相应费用包括：会员各项优惠、存/取款相应手续费(请留意：澳门永利会员重复出款￥手续费/未达100%投注出款的手续费由会员吸收，不纳入计算)。</font></p>
																<p><font face="微软雅黑">
																<strong>■ 回馈/佣金支付</strong></font></p>
																<p><font face="微软雅黑">
																联盟佣金计算，结算区间为本月第一个礼拜一至下月第一个礼拜一前的周日，将会员盈利，以联盟方案分红公式计算，佣金由承办客服于每个月的第一个礼拜三开始与代理确认金额后，在5个工作天内将佣金直接汇入代理联盟登记之银行账号。</font>
														
								<p>



			        </div>
			        
			        <div id="Union2" style="display:none;">
			          <p> <strong>联盟协议</strong></p>
			          <p> <strong>一、澳门永利对代理联盟的权利与义务</strong></p>
			          <ol>
			            <li> 澳门永利的客服部会登记联盟的会员并会观察他们的投注状况。联盟及会员必须同意并遵守澳门永利的会员条例，政策及操作程式。澳门永利保留拒绝或冻结联盟/会员帐户权利</li>
			            <li> 代理联盟可随时登入界面观察旗下会员的下注状况及会员在网站的活动概况。澳门永利的客服部会根据代理联盟旗下的会员计算所得的佣金。</li>
			            <li> 澳门永利保留可以修改合约书上的任何条例，包括: 现有的佣金范围、佣金计划、付款程式、及参考计划条例的权力，澳门永利会以电邮、网站公告等方法通知代理联盟。 代理联盟对于所做的修改有异议，代理联盟可选择终止合约，或洽客服人员反映意见。 如修改后代理联盟无任何异议，便视作默认合约修改，代理联盟必须遵守更改后的相关规定。</li>
			          </ol>
			          <p> <strong>二、代理联盟对澳门永利的权力及义务</strong></p>
			          <ol>
			            <li> 代理联盟应尽其所能，广泛地宣传、销售及推广澳门永利，使代理本身及澳门永利的利润最大化。代理联盟可在不违反法律下，以正面形象宣传、销售及推广澳门永利，并有责任义务告知旗下会员所有澳门永利的相关优惠条件及产品。</li>
			            <li> 代理联盟选择的澳门永利推广手法若需付费，则代理应承担该费用。</li>
			            <li> 任何澳门永利相关资讯包括: 标志、报表、游戏画面、图样、文案等，代理联盟不得私自复制、公开、分发有关材料，澳门永利保留法律追诉权。 如代理在做业务推广有相关需要，请随时洽澳门永利。</li>
			          </ol>
			          <p> <strong>三、规则条款</strong></p>
			          <ol>
			            <li> 各阶层代理联盟不可在未经澳门永利许可情况下开设双/多个的代理帐号，也不可从澳门永利帐户或相关人士赚取佣金。请谨记任何阶层代理不能用代理帐户下注，澳门永利有权终止并封存帐号及所有在游戏中赚取的佣金。</li>
			            <li> 为确保所有澳门永利会员账号隐私与权益，澳门永利不会提供任何会员密码，或会员个人资料。各阶层代理联盟亦不得以任何方式取得会员资料，或任意登入下层会员账号，如发现代理联盟有侵害澳门永利会员隐私行为，澳门永利有权取消代理联盟红利，并取消代理联盟账号。</li>
			            <li> 代理联盟旗下的会员不得开设多于一个的帐户。澳门永利有权要求会员提供有效的身份证明以验证会员的身份，并保留以IP判定是否重复会员的权利。如违反上述事项，澳门永利有权终止玩家进行游戏并封存帐号及所有于游戏中赚取的佣金</li>
			            <li> 代理联盟不可为自己或其他联盟下的有效投注会员,只能是公司直属下的有效投注会员,代理每月需有5个下线有效投注（有效投注为每月至少上线5次进行正常投注），如有违反联盟协议澳门永利有权终止并封存帐号及所有在游戏中赚取的佣金。</li>
			            <li> 如代理联盟旗下的会员因为违反条例而被禁止享用澳门永利的游戏，或澳门永利退回存款给会员，澳门永利将不会分配相应的佣金给代理联盟。如代理联盟旗下会员存款用的信用卡、银行资料须经审核，澳门永利保留相关佣金直至审核完成。</li>
			            <li> 合约内的条件会以澳门永利通知接受代理联盟加入后开始执行。澳门永利及代理联盟可随时终止此合约，在任何情况下，代理联盟如果想终止合约，都必须以书面/电邮方式提早于七日内通知澳门永利。 代理联盟的表现会3个月审核一次，如代理联盟已不是现有的合作成员则本合约书可以在任何时间终止。如合作伙伴违反合约条例，澳门永利有权立即终止合约。</li>
			            <li> 在没有澳门永利许可下，代理联盟不能透露及授权澳门永利相关保密资料，包括代理联盟所获得的回馈、佣金报表、计算等;代理联盟有义务在合约终止后仍执行机密档及资料的保密。</li>
			            <li> 在合约终止后，代理联盟及澳门永利将不须要履行双方的权利及义务。终止合约并不会解除代理联盟于终止合约前应履行的义务。</li>
			          </ol>
			        </div>
			      </div>
			      <p>&nbsp; </p>
			    </div>
			  </div>
			  <div style="clear:both"></div>
			</div>
                </div>
            </div>
            <div style="clear:both;height:18px;"></div>
            <div style="width:1080px;height:38px;margin:0 auto;background:url(/imgs/about_bg03.png) no-repeat center top;"></div>
        </div>
    </div>
</div>


<div style="clear:both"></div>
</div>
</div>
<script language="javascript">
/**
*  無動畫切換
*/
$.fn.mtab2 = function(){
    var area = this;
    $.each(area.find('li[id^=#]'),function(i){
    	if(i!=0){
    		area.find(this.id)[0].style.display = 'none';
    	}
    });
    area.find('li[id^=#]').click(function(){
        var self = this;
        $.each(area.find('li[id^=#]'),function(i){
            if(self.id != this.id){
                area.find(this.id)[0].style.display = 'none';
                $(this)[0].style.backgroundPosition = 'top';
                $(this).removeClass('mtab');
            }else{
                area.find(this.id)[0].style.display = 'block';
                $(this)[0].style.backgroundPosition = 'bottom';
                $(this).addClass('mtab');
            }
        });
    });
};

//一般文案用
	$(document).ready(function(){
		var MtabUl = $('#Union').children('ul');
		MtabUl.addClass("mtab-menual");
//					var PartnerLink = "<li onclick=\"menu_click(11);return false;\">代理注册</li>";
//						MtabUl.children('li:last').after(PartnerLink);
				$('#Union').mtab2();
	});	
</script>

</body>
</html>
