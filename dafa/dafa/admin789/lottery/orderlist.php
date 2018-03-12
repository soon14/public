<?php
error_reporting(1);
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
include_once($C_Patch."/app/member/utils/convert_name.php");
include_once($C_Patch."/app/member/class/sys_config.php");
include_once($C_Patch."/app/member/cache/website.php");

include_once("../class/admin.php");
include_once("../common/login_check.php");
include_once("getContentName.php");

check_quanxian("查看注单");

//echo $_GET["type"];
//echo $_GET["status"];
$type=$_GET['type'];
$type=='' ? $se1 = '#FF0' : $se1 = '#FFF';
$type=='六合彩' ? $se2 = '#FF0' : $se2 = '#FFF';
$type=='广东快乐十分' ? $se3 = '#FF0' : $se3 = '#FFF';
$type=='重庆时时彩' ? $se4 = '#FF0' : $se4 = '#FFF';
$type=='北京PK10' ? $se5 = '#FF0' : $se5 = '#FFF';
$type=='重庆幸运农场' ? $se6 = '#FF0' : $se6 = '#FFF';
$type=='北京快乐8' ? $se7 = '#FF0' : $se7 = '#FFF';

if(!$_GET["s_time"] && !$_GET['qishu']){
    $_GET["s_time"] = date('Y-m-d',strtotime('-6 day'));
}

$zf=$_GET['zf'];
if($zf==1)
{
    if($_GET['id'] > 0){
        $id	=	intval($_GET['id']);

        $sql	=	"SELECT o.user_id, o.order_num, o.Gtype,o_sub.order_sub_num,
                    o_sub.bet_money,
                    u.money
                    FROM user_list u,order_lottery_sub o_sub, order_lottery o
                    WHERE o_sub.id='".$id."' and o.order_num=o_sub.order_num and u.user_id=o.user_id limit 0,1";
        $query	=	$mysqli->query($sql);
        if($query){
            $row    =	$query->fetch_array();
            $userid = $row["user_id"];
            $datereg = $row["order_sub_num"];
            $lottery_name = getZhPageTitle($row["Gtype"]);
            $bet_money_total = $row["bet_money"];
            $assets = $row["money"];
            $balance = $bet_money_total + $assets;
        }

        

		$sql	=	"SELECT count(id) m_count_id
                    FROM `money_log` where `order_num`='$datereg' ";
        $query	=	$mysqli->query($sql);
        if($query){
            $row    =	$query->fetch_array();
            if($row && $row["m_count_id"]=='0'){

				$sql =	"update user_list u,order_lottery_sub o_sub, order_lottery o
				   set u.money=u.money+o_sub.bet_money, o_sub.status=3
				   where o_sub.id='".$id."' and o.order_num=o_sub.order_num and u.user_id=o.user_id  ";
				$mysqli->query($sql);

				$sql	=	"SELECT count(id) count_id
							FROM order_lottery_sub where order_num=(select order_num from order_lottery_sub where id='".$id."') AND STATUS!='3' ";
				$query	=	$mysqli->query($sql);
				if($query){
					$row    =	$query->fetch_array();
					if($row && $row["count_id"]=='0'){
						$sql =	"update user_list u,order_lottery_sub o_sub, order_lottery o
					   set o.status='3'
					   where o_sub.id='".$id."' and o.order_num=o_sub.order_num and u.user_id=o.user_id  ";
						$mysqli->query($sql);
					}
				}

				//插入金钱记录
				$sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`)
								VALUES ('$userid','$datereg','$lottery_name',now(),'作废订单加钱','$bet_money_total','$assets','$balance');";
				$mysqli->query($sql) or die ("作废订单插入金钱记录失败!!!id=".$id);

				$sql	=	"SELECT count(id) count_id_2
							FROM `money_log` where `order_num`='$datereg' and `user_id`='$userid' ";
				$query	=	$mysqli->query($sql);
				$row    =	$query->fetch_array();
				if($row && $row["count_id_2"]=='0'){
					$sql =	"update user_list u,order_lottery_sub o_sub, order_lottery o
					   set u.money=u.money-o_sub.bet_money, o_sub.status=0
					   where o_sub.id='".$id."' and o.order_num=o_sub.order_num and u.user_id=o.user_id  ";
					$mysqli->query($sql);


					$sql =	"update user_list u,order_lottery_sub o_sub, order_lottery o
					   set o.status='0'
					   where o_sub.id='".$id."' and o.order_num=o_sub.order_num and u.user_id=o.user_id  ";
					$mysqli->query($sql);
				}else{
					include_once("../class/admin.php");
					admin::insert_log($_SESSION["login_name"],get_ip(),$bj_time_now," 作废了彩票id=$id"."。理由是：".$_GET["cancel_reason"]."。",session_id(),"",$bj_time_now);
				}
			}
		}
    }

}
?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Welcome</title>
    <link rel="stylesheet" href="../images/css/admin_style_1.css" type="text/css" media="all" />
</head>
<script type="text/javascript" charset="utf-8" src="../js/jquery-1.7.2.min.js" ></script>
<script language="javascript">
    function go(value){
        if(value != "") location.href=value;
        else return false;
    }

    function check(){
        if($("#tf_id").val().length > 5){
            $("#status").val("0,1");
        }
        return true;
    }

    function ckall(){
        for (var i=0;i<document.form2.elements.length;i++){
            var e = document.form2.elements[i];
            if (e.name != 'checkall') e.checked = document.form2.checkall.checked;
        }
		alert('只能选中当前页');
    }

    function cancelOrder_lottery(id){
        var sResult=prompt("请在下面输入作废的理由", "");
        if(sResult!=null){
            window.location.href = "?js=0&zf=1&id="+id+"&cancel_reason="+sResult;
        }
    }

    function cancelOrder_all(){
        var len = document.form2.elements.length;
        var num = false;
        for(var i=0;i<len;i++){
            var e = document.form2.elements[i];
            if(e.checked && e.name=='uid[]'){
                num = true;
                break;
            }
        }
        if(num){
            var sResult=prompt("请在下面输入作废的理由", "");
            if(sResult!=null){
                document.form2.action="cancelorderlist.php?cancel_reason="+sResult;
                document.form2.submit();
            }
        }else{
            alert("您未选中任何复选框");
            return false;
        }
    }
	function deleteOrder_all(){
        var len = document.form2.elements.length;
        var num = false;
        for(var i=0;i<len;i++){
            var e = document.form2.elements[i];
            if(e.checked && e.name=='uid[]'){
                num = true;
                break;
            }
        }
        if(num){
            var sResult=confirm("确定删除?");
            if(sResult){
                document.form2.action="cancelorderlist.php?action=delete";
                document.form2.submit();
            }
        }else{
            alert("您未选中任何复选框");
            return false;
        }
    }
	
    function myfun(){
        $(".img-img").each(function(){ if($(this)[0].scrollWidth>800) $(this).css({"width":"800px"}); });
        setInterval(function(){
            $("form[name='form1']").submit();
        },<?=intval($web_site['caipiao_auto_time'])>0?$web_site['caipiao_auto_time']*1000:30000?>);
    }
    <?
        if($web_site['caipiao_auto']==1) {
    ?>
    window.onload=myfun;//不要括号
    <?
        }
    ?>

</script>
<style type="text/css">
    .STYLE2 {font-size: 14px}
    body {
        margin-left: 0px;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 0px;
    }
    td{font:13px/120% "宋体";padding:3px;}
</STYLE>
<script language="JavaScript" src="/js/calendar.js"></script>
<body>
<div>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
        <tr>
            <td height="24" nowrap class="bg_tr"><font ><span class="STYLE2">彩票注单查询（<a href="../webconfig/index.php" style="color: #F37605;font-size: 14px;" target="main">设置页面属性</a>）</span></font></td>
        </tr>
        <tr>
            <td height="24" align="center" nowrap bgcolor="#FFFFFF">
                <table width="100%">
                    <form name="form1" method="get" action="<?=$_SERVER["REQUEST_URI"]?>" onSubmit="return check();">
                        <tr>
                            <td align="center" bgcolor="#FFFFFF">
                                <select name="type" id="type">
                                    <option value="ALL_LOTTERY" <?=$_GET['type']=='ALL_LOTTERY' ? 'selected' : ''?>>全部彩票</option>
                                    <option value="CQ"    <?=$_GET['type']=='CQ' ? 'selected' :   ''?>>重庆时时彩</option>
									<!-- <option value="JX"    <?=$_GET['type']=='JX' ? 'selected' :   ''?>>江西时时彩</option> -->
                                    <option value="TJ"    <?=$_GET['type']=='TJ' ? 'selected' :   ''?>>天津时时彩</option>
                                    <option value="GDSF"  <?=$_GET['type']=='GDSF' ? 'selected' : ''?>>广东十分彩</option>
                                    <option value="GXSF"  <?=$_GET['type']=='GXSF' ? 'selected' : ''?>>广西十分彩</option>
                                    <option value="TJSF"  <?=$_GET['type']=='TJSF' ? 'selected' : ''?>>天津十分彩</option>
                                    <option value="CQSF"  <?=$_GET['type']=='CQSF' ? 'selected' : ''?>>重庆十分彩</option>
                                    <option value="BJKN"  <?=$_GET['type']=='BJKN' ? 'selected' : ''?>>北京快乐8</option>
                                    <option value="BJPK"  <?=$_GET['type']=='BJPK' ? 'selected' : ''?>>北京PK拾</option>
									<option value="GD11"  <?=$_GET['type']=='GD11' ? 'selected' : ''?>>广东11选5</option>
                                    <option value="D3"    <?=$_GET['type']=='D3' ? 'selected' :   ''?>>3D彩</option>
                                    <option value="P3"    <?=$_GET['type']=='P3' ? 'selected' :   ''?>>排列三</option>
                                   <option value="T3"     <?=$_GET['type']=='T3' ? 'selected' :   ''?>>上海时时乐</option>

                                </select>
                                <select name="js" id="js">
                                    <option value="0" style="color:#FF9900;" <?=$_GET['js']=='0' ? 'selected' : ''?>>未结算注单</option>
                                    <option value="1" style="color:#FF0000;" <?=$_GET['js']=='1' ? 'selected' : ''?>>已结算注单</option>
                                    <option value="2" style="color:#FF0000;" <?=$_GET['js']=='2' ? 'selected' : ''?>>已重算注单</option>
                                    <option value="3" style="color:#FF0000;" <?=$_GET['js']=='3' ? 'selected' : ''?>>作废注单</option>
                                    <option value="0,1,2,3" <?=$_GET['js']=='0,1,2,3' ? 'selected' : ''?>>全部注单</option>
                                </select>
                                会员：<input name="username" type="text" id="username" value="<?=$_GET['username']?>" size="12">
                                日期：<input name="s_time" type="text" id="s_time" value="<?=$_GET['s_time']?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
                                ~
                                <input name="e_time" type="text" id="e_time" value="<?=$_GET['e_time']?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
                                期数：<input name="qishu" type="text" id="qishu" value="<?=$_GET['qishu']?>" size="12">
                                订单号：<input name="tf_id" type="text" id="tf_id" value="<?=@$_GET['tf_id']?>" size="12">
                                &nbsp;
                                <input type="submit" name="Submit" value="搜索"></td>
                        </tr>
                    </form>
                </table>
                <form name="form2" method="post" action="<?=$_SERVER["REQUEST_URI"]?>">
                <table width="100%" border="0" cellpadding="5" cellspacing="1" class="font12" style="margin-top:5px;" bgcolor="#ccc">
                    <tr style="background-color:#5a5a5a; color:#FFF">
                        <th>订单号</th>
                        <th>彩票类别</th>
                        <th>彩票期号</th>
                        <th>投注玩法</th>
                        <th>投注内容</th>
                        <th>投注金额</th>
                        <th>反水</th>
                        <th>赔率</th>
                        <th>可赢金额</th>
                        <th>输赢结果</th>
                        <th>投注时间</th>
                        <th>投注账号</th>
                        <th>状态<input name="checkall" type="checkbox" id="checkall" onClick="return ckall();" />
						<div style="margin:4px 0;">
                            <input type="button" value="批量作废" onclick='cancelOrder_all()'>
							<input type="button" value="批量删除" onclick='cancelOrder_all()'>
						</div>
                        </th>
                    </tr>
                    <?php
                    include("../../include/pager.class.php");

                    $image_web = sys_config::getImagePath();

                    $t_allmoney=0;
                    $t_sy=0;
                    $uid	=	'';
                    if($_GET['username']){
                        $sql		=	"select user_id from user_list where user_name='".$_GET['username']."' limit 0,1";
                        $query	=	$mysqli->query($sql);
                        if($rows	=	$query->fetch_array()){
                            $uid=	$rows['user_id'];
                        }else{
                            $uid=	"0";
                        }
                    }

                    $sql	=	"select o_sub.id  from order_lottery o,order_lottery_sub o_sub
                                where o_sub.bet_money>0 AND o.order_num=o_sub.order_num";
                    if($_GET["type"] != "ALL_LOTTERY" && $_GET["type"]) $sql.=" and o.Gtype='".$_GET["type"]."'";
                    if($_GET["uid"]) $uid = $_GET["uid"];
                    if($uid != '') $sql.=" and o.user_id=".$uid;
                    if($_GET["s_time"]) $sql.=" and o.bet_time>='".$_GET["s_time"]." 00:00:00'";
                    if($_GET["e_time"]) $sql.=" and o.bet_time<='".$_GET["e_time"]." 23:59:59'";
                    if($_GET["qishu"]) $sql.=" and o.lottery_number='".$_GET["qishu"]."'";
                    if(isset($_GET["js"]))  $sql.=" and o_sub.status in (".$_GET["js"].")";
                    if($_GET['tf_id']) $sql.=" and o_sub.order_sub_num='".$_GET['tf_id']."'";
                    $sql.=" order by o_sub.id desc ";
					
                    $query	=	$mysqli->query($sql);
                    $sum		=	$mysqli->affected_rows; //总页数
                    $thisPage	=	1;
                    $pagenum	=	intval($web_site['caipiao_show_row'])>0?$web_site['caipiao_show_row']:100;
                    if($_GET['page']){
                        $thisPage	=	$_GET['page'];
                    }
                    $CurrentPage=isset($_GET['page'])?$_GET['page']:1;
                    $myPage=new pager($sum,intval($CurrentPage),$pagenum);
                    $pageStr= $myPage->GetPagerContent();

                    $bid		=	'';
                    $i		=	1; //记录 bid 数
                    $start	=	($thisPage-1)*$pagenum+1;
                    $end		=	$thisPage*$pagenum;
                    while($row = $query->fetch_array()){
                        if($i >= $start && $i <= $end){
                            $bid .=	$row['id'].',';
                        }
                        if($i > $end) break;
                        $i++;
                    }
					
                    if($bid){
                        $bid	=	rtrim($bid,',');
                        $sql	=	"SELECT o.Gtype,o.lottery_number AS qishu,o.rtype_str,o.bet_time,o.order_num,o_sub.quick_type,
                                                o_sub.number,o_sub.bet_money AS bet_money_one,o_sub.fs,o.user_id,
                                                o_sub.bet_rate AS bet_rate_one,o_sub.is_win,o_sub.status,
                                                o_sub.id AS id,o_sub.win AS win_sub,o_sub.balance,o_sub.order_sub_num
                                      FROM order_lottery o,order_lottery_sub o_sub
                                      WHERE o_sub.id in($bid) AND o.order_num=o_sub.order_num
                                      order by o_sub.id desc";
                        $query	=	$mysqli->query($sql);

                        while ($rows = $query->fetch_array()) {
                            $sql_user = "select user_name from user_list where user_id='".$rows['user_id']."'";
                            $query_user	=	$mysqli->query($sql_user);
                            $row_user = $query_user->fetch_array();

                            $color = "#FFFFFF";
                            $over	 = "#EBEBEB";
                            $out	 = "#ffffff";
                            $t_allmoney+=$rows['bet_money_one'];

                            $money_result = 0;
                            if($rows['is_win']=="1"){
                                $t_sy= $t_sy + $rows['win_sub'] + $rows['fs'];
                                $money_result = $rows['win_sub'] + $rows['fs'];
                            }elseif($rows['is_win']=="2"){
                                $t_sy+=$rows['bet_money_one'];
                                $money_result = $rows['bet_money_one'];
                            }elseif($rows['is_win']=="0" && $rows['fs']>0){
                                $t_sy+=$rows['fs'];
                                $money_result = $rows['fs'];
                            }

                            if($rows['is_win']==1 || $rows['is_win']=="2"){
                                $color = "#FFE1E1";
                                $over  = "#FFE1E1";
                                $out   = "#FFE1E1";
                            }

                            $contentName = getName($rows['number'],$rows['Gtype'],$rows['rtype_str'],$rows['quick_type']);

                            $bet_rate = $rows['bet_rate_one'];
                            if(strpos($bet_rate,",") !== false){
                                $bet_rate_array = explode(",", $bet_rate);
                                $bet_rate = $bet_rate_array[0];
                            }
                            $order_sub_num = $rows['order_sub_num'];
							if($rows['Gtype']=='重庆时时彩')
								$a='cq_ssc';
							else if($rows['Gtype']=='重庆十分彩')
								$a='cqsf';
							else if($rows['Gtype']=='天津十分彩')
								$a='tjsf';
							else if($rows['Gtype']=='广西十分彩')
								$a='gxsf';
							else if($rows['Gtype']=='广东十分彩')
								$a='gdsf';
							else if($rows['Gtype']=='天津时时彩')
								$a='tj_ssc';
							else if($rows['Gtype']=='北京PK拾')
								$a='pk10';
							else if($rows['Gtype']=='上海时时乐')
								$a='shssl';
							else if($rows['Gtype']=='北京快乐8')
								$a='kl8';
							else if($rows['Gtype']=='广东11选5')
								$a='gd11';
							else if($rows['Gtype']=='排列三')
								$a='pl3';
							else if($rows['Gtype']=='3D彩')
								$a='3d';
                            $image_path = "/order/order_".$a."/".substr($order_sub_num,0,8)."/$order_sub_num.jpg";
                            ?>
                            <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>; line-height:20px;">
                                <td height="25" align="center" valign="middle"><?=$rows['order_sub_num']?></td>
                                <td align="center" valign="middle"><?=getZhPageTitle($rows['Gtype'])?></td>
                                <td align="center" valign="middle"><?=$rows['qishu']?></td>
                                <td align="center" valign="middle"><?=$rows['rtype_str']?></td>
                                <td align="center" valign="middle"><?=$contentName?></td>
                                <td align="center" valign="middle"><?=$rows['bet_money_one']?></td>
                                <td align="center" valign="middle"><?=$rows['fs']?></td>
                                <td align="center" valign="middle"><?=$bet_rate?></td>
                                <td align="center" valign="middle"><?=$rows['win_sub']?></td>
                                <td align="center" valign="middle"><?=$money_result?></td>
                                <td><?=substr($rows['bet_time'],5)?></td>
                                <td><a style="color: #F37605;" href="orderlist.php?username=<?=$row_user["user_name"]?>&type=<?=$_GET["type"]?>&e_time=<?=$_GET["e_time"]?>&s_time=<?=$_GET["s_time"]?>&qishu=<?=$_GET["qishu"]?>&js=<?=$_GET["js"]?>"><?=$row_user["user_name"]?></a></td>
                                <td><?php if($rows['status']==0){?><font color="#0000FF">
                                        未结算</font>--<a onclick='cancelOrder_lottery("<?=$rows['id']?>")' title="作废该单"><font color="#ffcccc">作废</font></a>
                                        <input name="uid[]" type="checkbox" id="uid[]" value="<?=$rows["id"]?>" />
                                    <?php }?>
                                    <?php if($rows['status']==1){?><font color="#FF0000">已结算</font><?php }?>
                                    <?php if($rows['status']==2){?><font color="#FF0000">已重算</font><?php }?>
                                    <?php if($rows['status']==3){?><font color="#FFcccc">作废</font><?php }?></td>
                            </tr>
							<tr >
                                <td colspan="13" style="padding: 0px;"><img class="img-img" src="<?=$image_path?>">
                                </td>
                            </tr>

                        <?php
                        }
                    }
                    ?>
                    <tr style="background-color:#FFFFFF;">
                        <td colspan="13" align="center" valign="middle">当前页总投注金额:<?=$t_allmoney?>元 &nbsp;&nbsp;   当前页赢取金额:<?=$t_allmoney - $t_sy?>元</td>
                    </tr>
                    <tr style="background-color:#FFFFFF;">
                        <td colspan="13" align="center" valign="middle"><?php echo $pageStr;?></td>
                    </tr>

                </table>
                </form>
            </td>
        </tr>
    </table>
</div>
</body>
</html>

<?
$mysqli->close();
?>