﻿<?php
header("content-type:text/html;charset:utf8");
session_start();

include_once("ptapi.php");
include_once("../newpt2/config.php");
unset($mysqli);
$mysqli	=	new MySQLi("127.0.0.1","root","root","aobet");
$mysqli->query("set names utf8");
$ptLoginStatus =2;
//$status = 0;
if(isset($_SESSION["username"]))
{
	$username =$_SESSION["username"];
    $status = 0;
	include_once("../app/member/class/user.php");
$uid	=	$_SESSION["userid"];
$loginid=	$_SESSION["uid"];


$userinfo		=	user::getinfo($uid);

$agpassword = $userinfo['user_pass_naked'];
	//include_once("../include/mysqli.php");

	$sql="select * from user_list where user_name='{$username}'";
	$result = $mysqli->query($sql);
	$row = $result->fetch_array();
	$ptusername = $row['pt_username'];
	$ptpassword = $row['pt_password'];

	if($ptusername==''){
		$ptusername= strtoupper($toppre.$username);
		$ptpassword = $agpassword;
		$result = PlayerCreate($ptusername,$ptpassword);
		$result1 = PlayerCreate($ptusername,$ptpassword);
			if($result||$result1){
				$sql = "update user_list set pt_username='{$ptusername}',pt_password='{$ptpassword}' where user_name='{$username}'";
				
				$mysqli->query($sql);
				$ptLoginStatus = 0;
			}
	}else{
		$ptLoginStatus = 0;//PlayerOnline($ptusername);
	}
	
}else {
    $status = 1;
}
session_write_close();
//$ptusername = strtoupper('HJpovl2211');
//$ptpassword = 'abc123';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dt">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title>宝马线上娱乐</title>

<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="css/jquery.min.js"></script>
<!-- 游戏 -->
<script type="text/javascript" src="../newpt2/js/newjquery/jquery.min.js"></script>
<script type="text/javascript" src="../newpt2/js/integration.conf.js"></script>
<script type="text/javascript" src="../newpt2/js/integration.js"></script>
<?php if($ptLoginStatus==0){ ?>
<script type="text/javascript">
    iapiSetCallout('Login', calloutLogin);
    iapiSetCallout('Logout', calloutLogout);
	
    function login() {
		/*var r_user = "<?PHP echo $_GET['ptusername'];?>";
		var r_pass = "<?PHP echo $_GET['$ptpassword'];?>";
		if((r_user!="")&&(r_pass!="")){

			iapiLogin(r_user, r_pass, '1', "CH");
		}else{*/
        iapiLogin('<?PHP echo $ptusername;?>', '<?PHP echo $ptpassword;?>', '1', "CH");
		//}
    }

    function logout(allSessions, realMode) {
        iapiLogout(allSessions, realMode);
    }

    function calloutLogin(response) {
		//alert(JSON.stringify(response));
        // errorCode=6错误在登录时可能会发生，但游戏可以正常进入。可以忽略
        var code = response.errorCode;
        if (code && code != 6) {

            alert("Login failed, " + response.errorText);
			return false;
        }
        else {
			return true;
            //alert("success");
			//window.location = "http://www.google.com/";
        }
    }

    function calloutLogout(response) {
        if (response.errorCode) {
            alert("Logout failed, " + response.errorCode);
        }
        else {
            delete_cookie();
        }
    }
</script>
<?php } ?>

</head>

<body  onload="blinklink()" onunload="stoptimer()"  >

 <div class="layout games-platform-wrap">
            <div class="games-panes clearfix">
                <!-- PT游戏厅 -->
                <div class="games-platform-item pt-item pr">
                    <ul class="games-sub-menu clearfix">
                       
                    </ul>
                    <div id="ptgame_list">
                        <div class="games-item clearfix">
                            <!-- 街机游戏 -->
															
															
<div class="main">
<div class="header">
<div class="header">
<div class="logo"></div>
<div class="serch"><font></font></div>
<input type="text" value="请输入游戏名称.." style="color:#ffcc5e;display:block;border:0;" onclick="if(this.value=='请输入游戏名称..'){this.value='';}" onblur="if(this.value=='') {this.value='请输入游戏名称..';}"   class="ert"  id="ot" onclick="showme()">

<a href="twoa.php"><div class="buttona">ENTER</div></a>


</div>
<div class="de">

<ul>
<li  class="two"><a href="one.php" class="one"  id="blink">热门游戏</a></li>


<li><a href="three.php" class="onec">老 虎 机</a></li>

<li><a href="twoa.php" >视频扑克</a></li>

<li><a href="eight.php">现场庄家</a></li>

<script>


</script>



</ul>

</div>

<div class="ee">


<ul >
<div class="fe"></div>









																	
																
			<li href="javascript:void(0);"class="" >
			<a >
			<img  class="aa" src="./icon/gtsgme.png"    >
                                   <em class="kfp"></em>
                               
                               <div class="game-rollover clearfix"><a href="javascript:void(0);" class="real-play"><span  style="margin-top:5px;">六福兽</span></a></div></a>
                               <a  href=""class="dask"></a> </li>


								
			<li >
			<a >
			<img  class="ab" src="./icon/donq.png"   >
                                    <em class="qnw"></em>
                               
                               <div class="game-rollover clearfix"><a href="javascript:void(0);" class="real-play"><span  style="margin-top:5px;">权杖女王</span></a></div></a>
                               <a  href=""class="dask"></a> </li>

							   			<li >
			<a >
			<img class="ac"src="./icon/23.png" style="width:303px;height:160px;" >
                                    <em class="jqw"></em>
                               
                               <div class="game-rollover clearfix"><a href="javascript:void(0);" class="real-play"><span  style="margin-top:5px;">金钱蛙</span></a></div></a>
                               <a  href=""class="dask"></a> </li>


<div  class="fa"></div>

							   			<li >
			<a >
			<img class="ae"src="./icon/gtsir.png"style="width:303px;height:160px;" >
                                    <em class="gtsrng"></em>
                               
                               <div class="game-rollover clearfix"><a href="javascript:void(0);" class="real-play"><span  style="margin-top:5px;">ROME AND GLORY</span></a></div></a>
                               <a  href=""class="dask"></a> </li>


							   			<li >
			<a >
			<img class="af"src="./icon/gtsfj.png" style="width:303px;height:160px;" >
                                    <em class="ashfta"></em>
                               
                               <div class="game-rollover clearfix"><a href="javascript:void(0);" class="real-play"><span  style="margin-top:5px;">FALREST OF THEM ALL</span></a></div></a>
                               <a  href=""class="dask"></a> </li>
							   							   			<li >
			<a >
			<img class="ag"src="./icon/nian_k.png" style="width:303px;height:160px;" >
                                    <em class="ashbob"></em>
                               
                               <div class="game-rollover clearfix"><a href="javascript:void(0);" class="real-play"><span  style="margin-top:5px;">BOUNTY OF THE BEANSTALK</span></a></div></a>
                               <a  href=""class="dask"></a> </li>





<div class="fa"></div>

				   							   			<li >
			<a >
			<img class="ai" src="./icon/bld.png" style="width:303px;height:160px;" >
                                    <em class="ashvrth"></em>
                               
                               <div class="game-rollover clearfix"><a href="javascript:void(0);" class="real-play"><span  style="margin-top:5px;">VIRTUAL HORSES</span></a></div></a>
                               <a  href=""class="dask"></a> </li>
			<li >
			 <a>
			<img class="aj"src="./icon/bob.png" style="width:303px;height:160px;" >
                  <em class="gtsflzt"></em>
                         <div class="game-rollover clearfix"><a href="javascript:void(0);" class="real-play"><span  style="margin-top:5px;">飞龙在天</span></a></div></a>
                              <a  href=""class="dask"></a> </li>
							  
							  			<li >
			 <a>
			<img img class="ah"src="./icon/ct.png" style="width:303px;height:160px;" >
                  <em class="frtf"></em>
                         <div class="game-rollover clearfix"><a href="javascript:void(0);" class="real-play"><span  style="margin-top:5px;">海盗船长</span></a></div></a>
                              <a  href=""class="dask"></a> </li>






<div class="fa"></div>












</ul>







<script type="text/javascript" src="css/a.js"></script>






</div>

<ul class="footer">
<a href="one.php"><li>首页</li></a>
<a href=""><li>上一页</li></a>
<a href="" class="ry"><li>PAGE:1</li></a>
<a href="onea.php"><li>下一页</li></a>
<a href="oneb.php"><li>尾页</li></a>
<a href=""><li>共3页</li></a>


</ul>

</div>


</div>
</div>
</div>
</div>
</div>

        <script type="text/javascript">
$(document).ready(function(){
    setInterval(function(){
        var t = new Date().getTime()+"";
        var k = parseInt(t.substr(t.length-9,9) * 4.3);
        k = k/100;
        k = parseFloat(k).toLocaleString();
        $("#je").html(k);
    },600);


    $(".games-sub-menu").find("li").click(function(){
        if(!$(this).hasClass("tab7")){
            $(".tab7").hide();
        }
		if($(this).attr('id')=='pfx'||$(this).parent().attr('id')=='pfxs'){return false;}
        $(".games-sub-menu").find(".current").removeClass("current");
        var index = $(this).attr("class").replace("tab",'');
        index = parseInt(index)-1;
        $(this).addClass("current");
        $(".games-item:visible").find("ul").addClass("hide");
        $(".games-item:visible").find("ul:eq("+index+")").removeClass("hide");
		//window.parent.document.ptframe.height=document.body.scrollHeight;
        $('#ptframe', window.parent.document).height(document.body.scrollHeight);
    });
    $("#ptgame_list li").hover(function(){
        $(this).toggleClass("hover");
        });
    $('#ptgame_list li').bind('click',function(){
        var gameId = $(this).find("em").attr("class").replace('game_','');
		//alert(gameId);return false;
		ptLoginStatus = <?php echo $ptLoginStatus;?>;
		if(ptLoginStatus==0){
			if(login()){
				ptLoginStatus =1;
			}
					
		}		
			load_pt(<?php echo $status;?>,gameId);
		        
    });
    $('#keyword').keypress(function (e) {
        var key = e.which;
        if (key == 13) {gsearch();} 
    }); 

    $(".games-sub-menu").find("li").eq(0).trigger('click');

});

                    function load_pt(status, gameId) {
                        var flag = gameNotify(status);
                        if (flag) {
                            var gameurl = 'http://cache.download.banner.greenjade88.com/casinoclient.html';
                            if(gameId){gameurl += "?game="+gameId+"&language=zh-cn&nolobby=1";}
                           		
								window.open(gameurl,'','menubar=no,status=yes,scrollbars=yes,top=150,left=100,toolbar=no,width=1041,height=837');
    
                            }
                        }                  
                
                        function gameNotify(status, type) {
                            var flag = false;
                            switch (status) {
                                case 0:
                                    flag = true;
                                    break;
                                case 1:
                                    alert('请先登录');
                                    break;
                                case 2:
                                    notify('当前系统已关闭改平台，详情请询问客服。');
                                    break;
                                default :
                                    break;
                            }
                            return flag;
                        }

function gsearch(){
    var b = [];
    var k = $("#keyword").val();
    if(k=="")return;
    $(".tab7").show().click();
    $("#searchresult").html('');
    $(".game-name").each(function(){
        if($(this).html().indexOf(k)!=-1){
            $("#searchresult").append('<li>'+$(this).parent().html()+'</li>');
        }
    });
    $('#searchresult li').bind('click',function(){
         var gameId = $(this).parent().parent().find("em").attr("class").replace('game_','');
    load_pt('451819984711',1,gameId);
    });
}
function lhjsearch(a){
	 var b = [];
    $(".tab7").show().click();
    $("#searchresult").html('');
    $(".game-name").each(function(){
        if($(this).parent().attr('class')=='lhj pf'+a){
            $("#searchresult").append('<li>'+$(this).parent().html()+'</li>');
        }
    });
    $('#searchresult li').bind('click',function(){
        var gameId = $(this).parent().parent().find("em").attr("class").replace('game_','');
    load_pt('451819984711',1,gameId);
    });
	
}
$("#pfx").click(function(){$("#pfx>.pfx").toggle();})
</script>
        
</body>
</html>