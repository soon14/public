<?php
error_reporting(1);
if(!isset($_SESSION)){ session_start();}
header("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/html; charset=utf-8");

echo "<script>if(self == top) parent.location='" . BROWSER_IP . "'</script>\n";

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/config.inc.php");
include_once($C_Patch."/app/member/common/function.php");
include_once($C_Patch."/app/member/utils/convert_name.php");
include_once($C_Patch."/app/member/class/sys_config.php");

include_once("../class/admin.php");
include_once("../common/login_check.php");

check_quanxian("查看注单");

//echo $_GET["type"];
//echo $_GET["status"];
$type=$_GET['type'];

$zf=$_GET['zf'];
if($zf==1)
{
    if($_GET['id'] > 0){
        $id	=	intval($_GET['id']);

        $sql	=	"SELECT o.user_id, o.order_num,o_sub.order_sub_num,
                    o_sub.bet_money,
                    u.money
                    FROM user_list u,six_lottery_order_sub o_sub, six_lottery_order o
                    WHERE o_sub.id='".$id."' and o.order_num=o_sub.order_num and u.user_id=o.user_id limit 0,1";
        $query	=	$mysqli->query($sql);
        if($query){
            $row    =	$query->fetch_array();
            $userid = $row["user_id"];
            $datereg = $row["order_sub_num"];
            $lottery_name = "六合彩";
            $bet_money_total = $row["bet_money"];
            $assets = $row["money"];
            $balance = $bet_money_total + $assets;
        }

        $sql =	"update user_list u,six_lottery_order_sub o_sub, six_lottery_order o
           set u.money=u.money+o_sub.bet_money, o_sub.status=3, o.status='3'
           where o_sub.id='".$id."' and o.order_num=o_sub.order_num and u.user_id=o.user_id  ";
        $mysqli->query($sql);

        //插入金钱记录
        $sql = "INSERT INTO `money_log` (`user_id`,`order_num`,`about`,`update_time`,`type`,`order_value`,`assets`,`balance`)
                        VALUES ('$userid','$datereg','$lottery_name',now(),'作废订单加钱','$bet_money_total','$assets','$balance');";
        $mysqli->query($sql) or die ("作废订单插入金钱记录失败!!!id=".$id);
        include_once("../class/admin.php");
        admin::insert_log($_SESSION["login_name"],get_ip(),$bj_time_now," 作废了彩票id=$id"."。理由是：".$_GET["cancel_reason"]."。",session_id(),"",$bj_time_now);
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

    function cancelOrder_lhc(id){
        var sResult=prompt("请在下面输入作废的理由", "");
        if(sResult!=null){
            window.location.href = "?js=0&zf=1&id="+id+"&cancel_reason="+sResult;
        }
    }

    function editContent_lhc(id,betInfo){
        var sResult=prompt("请在下面输入更改的内容", betInfo);
        if(sResult!=null){
            $.ajax({
                type: "POST",
                url: "editContent_lhc.php",
                data: {id:id, betInfo:sResult}
            }).done(function( msg ) {
                    document.location.reload();
                }).fail(function(error){
                    alert("修改失败");
                });
        }
    }
    function queryInfo_lhc(id){
        $.ajax({
            type: "GET",
            url: "getEditLog_lhc.php",
            data: {id:id}
        }).done(function( msg ) {
                alert(msg);
            }).fail(function(error){
                alert("记录错误，请联系管理员。");
            });
    }
</script>
<script language="JavaScript" src="/js/calendar.js"></script>
<body>
<div id="pageMain">
    <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="5">
        <tr>
            <td valign="top">
                <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="font12" bgcolor="#798EB9">
                    <form name="form1" method="get" action="<?=$_SERVER["REQUEST_URI"]?>" onSubmit="return check();">
                        <tr>
                            <td align="center" bgcolor="#FFFFFF">
                                <select name="js" id="js">
                                    <option value="0" style="color:#FF9900;" <?=$_GET['js']=='0' ? 'selected' : ''?>>未结算注单</option>
                                    <option value="1" style="color:#FF0000;" <?=$_GET['js']=='1' ? 'selected' : ''?>>已结算注单</option>
                                    <option value="2" style="color:#FF0000;" <?=$_GET['js']=='2' ? 'selected' : ''?>>已重算注单</option>
                                    <option value="3" style="color:#FF0000;" <?=$_GET['js']=='3' ? 'selected' : ''?>>作废注单</option>
                                    <option value="0,1,2,3" <?=$_GET['js']=='0,1,2,3' ? 'selected' : ''?>>全部注单</option>
                                </select>
                                &nbsp;&nbsp;
                                会员：<input name="username" type="text" id="username" value="<?=$_GET['username']?>" size="15">
                                &nbsp;&nbsp;
                                日期：<input name="s_time" type="text" id="s_time" value="<?=$_GET['s_time']?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
                                ~
                                <input name="e_time" type="text" id="e_time" value="<?=$_GET['e_time']?>" onClick="new Calendar(2008,2020).show(this);" size="10" maxlength="10" readonly="readonly" />
                                &nbsp;&nbsp;
                                订单号：<input name="tf_id" type="text" id="tf_id" value="<?=@$_GET['tf_id']?>" size="22">
                                &nbsp;&nbsp;
                                <input type="submit" name="Submit" value="搜索"></td>
                        </tr>
                    </form>
                </table>
                <table width="100%" border="0" cellpadding="5" cellspacing="1" class="font12" style="margin-top:5px;" bgcolor="#798EB9">
                    <tr style="background-color:#3C4D82; color:#FFF">
                        <td align="center"><strong>订单号</strong></td>
                        <td align="center"><strong>彩票类别</strong></td>
                        <td align="center"><strong>彩票期号</strong></td>
                        <td align="center"><strong>投注玩法</strong></td>
                        <td align="center"><strong>投注内容</strong></td>
                        <td align="center"><strong>投注金额</strong></td>
                        <td align="center"><strong>反水</strong></td>
                        <td align="center"><strong>赔率</strong></td>
                        <td align="center"><strong>可赢金额</strong></td>
                        <td align="center"><strong>输赢结果</strong></td>
                        <td align="center"><strong>投注时间</strong></td>
                        <td align="center"><strong>投注账号</strong></td>
                        <td align="center"><strong>状态</strong></td>
                        <td align="center"><strong>操作</strong></td>
                        <td height="25" align="center"><strong>查看记录</strong></td>
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

                    $sql	=	"select o_sub.id  from six_lottery_order o,six_lottery_order_sub o_sub
                                where o_sub.bet_money>0 AND o.order_num=o_sub.order_num";
                    if($_GET["uid"]) $uid = $_GET["uid"];
                    if($uid != '') $sql.=" and o.user_id=".$uid;
                    if($_GET["s_time"]) $sql.=" and o.bet_time>='".$_GET["s_time"]." 00:00:00'";
                    if($_GET["e_time"]) $sql.=" and o.bet_time<='".$_GET["e_time"]." 23:59:59'";
                    if(isset($_GET["js"]))  $sql.=" and o_sub.status in (".$_GET["js"].")";
                    if($_GET['tf_id']) $sql.=" and o_sub.order_sub_num='".$_GET['tf_id']."'";
                    $sql.=" order by o_sub.id desc ";

                    $query	=	$mysqli->query($sql);
                    $sum		=	$mysqli->affected_rows; //总页数
                    $thisPage	=	1;
                    $pagenum	=	50;
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
                        $sql	=	"SELECT o.lottery_number AS qishu,o.rtype_str,o.bet_time,o.order_num,
                                                o_sub.number,o_sub.bet_money AS bet_money_one,o_sub.fs,
                                                o_sub.bet_rate AS bet_rate_one,o_sub.is_win,o_sub.status,
                                                o_sub.id AS id,o_sub.win AS win_sub,o_sub.balance,o_sub.order_sub_num,
                                                u.user_name,u.money
                                      FROM six_lottery_order o,six_lottery_order_sub o_sub,user_list u
                                      WHERE o_sub.id in($bid) AND o.order_num=o_sub.order_num AND o.user_id=u.user_id
                                      order by o_sub.id desc";
                        $query	=	$mysqli->query($sql);

                        while ($rows = $query->fetch_array()) {
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
                                $out   = "#FFE1E1";
                                $over  = "#FFE1E1";
                            }

                            $bet_rate = $rows['bet_rate_one'];
                            if(strpos($bet_rate,",") !== false){
                                $temp_rate = 1;
                                $bet_rate_array = explode(",", $bet_rate);
                                foreach($bet_rate_array as $key => $value){
                                    $temp_rate = $temp_rate * $value;
                                }
                                $bet_rate = round($temp_rate,2);
                            }

//                            $order_num = $rows["order_sub_num"];
//                            $imagePath = $C_Patch."\\order\\".substr($order_num,0,8)."/$order_num.jpg";
//                            try{
//                                $im = file_get_contents($imagePath);
//                                $imData = base64_encode($im);
//                            }catch (Exception $e){
//                                $imData = "";
//                            }

                            $order_sub_num = $rows['order_sub_num'];
                            $image_path = "http://".$image_web."/".substr($order_sub_num,0,8)."/$order_sub_num.jpg";
                            ?>
                            <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>; line-height:20px;">
                                <td height="25" align="center" valign="middle"><?=$rows['order_sub_num']?></td>
                                <td align="center" valign="middle"><?="六合彩"?></td>
                                <td align="center" valign="middle"><?=$rows['qishu']?></td>
                                <td align="center" valign="middle"><?=$rows['rtype_str']?></td>
                                <td align="center" valign="middle"  style="max-width:115px"><?=$rows['number']?></td>
                                <td align="center" valign="middle"><?=$rows['bet_money_one']?></td>
                                <td align="center" valign="middle"><?=$rows['fs']?></td>
                                <td align="center" valign="middle"><?=$bet_rate?></td>
                                <td align="center" valign="middle"><?=$rows['win_sub']?></td>
                                <td align="center" valign="middle"><?=$money_result?></td>
                                <td  style="max-width: 100px;"><?=$rows['bet_time']?></td>
                                <td><a style="color: #F37605;"  href="orderlist_lhc.php?username=<?=$rows["user_name"]?>"><?=$rows["user_name"]?></a></td>
                                <td style="width:55px"><?php if($rows['status']==0){?><font color="#0000FF">未结算</font>--<br/><a onclick='cancelOrder_lhc("<?=$rows['id']?>")' title="作废该单"><font color="#ffcccc">作废</font></a><?php }?>
                                    <?php if($rows['status']==1){?><font color="#FF0000">已结算</font><?php }?>
                                    <?php if($rows['status']==2){?><font color="#FF0000">已重算</font><?php }?>
                                    <?php if($rows['status']==3){?><font color="#FFcccc">作废</font><?php }?>
                                </td>
                                <td align="center" valign="middle" style="width:85px"><a style="color: #F37605;"  onclick='editContent_lhc("<?=$rows['id']?>","<?=$rows['number']?>")' title="修改投注内容"><font>修改投注内容</font></a></td>
                                <td align="center" valign="middle"><a style="color: #F37605;"  onclick='queryInfo_lhc("<?=$rows['id']?>")' title="查看修改记录"><font>查看记录</font></a></td>
                            </tr>
                            <tr>
                                <td colspan="15" style="padding: 0px;">
                                    <img style="max-width: 100%;" src="<?=$image_path?>">
                                </td>
                            </tr>
                        <?php
                        }
                    }
                    ?>
                    <tr style="background-color:#FFFFFF;">
                        <td colspan="15" align="center" valign="middle">当前页总投注金额:<?=$t_allmoney?>元 &nbsp;&nbsp;   当前页赢取金额:<?=$t_allmoney - $t_sy?>元</td>
                    </tr>
                    <tr style="background-color:#FFFFFF;">
                        <td colspan="15" align="center" valign="middle"><?php echo $pageStr;?></td>
                    </tr>

                </table></td>
        </tr>
    </table>
</div>
</body>
</html>