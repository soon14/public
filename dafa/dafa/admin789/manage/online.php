<?php
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

include_once("../class/admin.php");

include_once("../common/login_check.php"); 

include_once($C_Patch."/app/member/ip.php");
check_quanxian("管理员管理");

?>
<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>管理员列表</TITLE>
<link href="../Images/css1/css.css" rel="stylesheet" type="text/css">
 
<style type="text/css">
.STYLE2 {font-size: 12px}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
td{font:13px/120% "宋体";padding:3px;}
a{

	color:#F37605;

	text-decoration: none;

}
.t-title{background:url(../images/06.gif);height:24px;}
.t-tilte td{font-weight:800;}
.STYLE4 {
	color: #FF0000;
	font-size: 12px;
}
</STYLE>
</HEAD>

<body>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap class="bg_tr"><font >&nbsp;<span class="STYLE2">管理员管理：在线管理员</span></font></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="24" nowrap bgcolor="#FFFFFF">
    
<table width="100%" border="1" bgcolor="#FFFFFF" bordercolor="#ccc" cellspacing="0" cellpadding="0" style="border-collapse: collapse; color: #225d9c;" id=editProduct   idth="100%" >       <tr style="background-color: #EFE" class="bg_tr"  align="center" >
        <th height="20">管理员</th>
        <th>随机编号</th>
        <th>登陆时间</th>
		<th>浏览器</th>
        <th>IP</th>
		<th>地址</th>
        <th>操作</th>
          </td>
      </tr>
      <?php
if($uid){
	$sql	=	"select * from sys_manage_online";
	$query	=	$mysqli->query($sql);
	while($rows = $query->fetch_array()){
	  	$over	= "#EBEBEB";
		$out	= "#ffffff";
		$color	= "#FFFFFF";
      	?>
	        <tr align="center" onMouseOver="this.style.backgroundColor='<?=$over?>'" onMouseOut="this.style.backgroundColor='<?=$out?>'" style="background-color:<?=$color?>">
	          <td><a href="log.php?id=<?=$rows["id"]?>"><span style="color:#F37605;"><?=$rows["manage_name"]?></span></a></td>
	          <td><span style="color:#F37605;"><?=$rows["session_str"]?></span></td>
              <td><?=$rows["logintime"]?></td>
	          <td><?=$rows["loginbrowser"]?></td>
			  <td><?=$rows["loginip"]?></td>
			  <td><?=iconv("GB2312","UTF-8",convertip($rows["loginip"],'../'))?></td>
	          <td><a href="online_kick.php?admin=<?=$rows["manage_name"]?>&ssid=<?=$rows["session_str"]?>"><span style="color:#F37605;">踢线</span></a></td>
          </tr> 	
      	<?
      }
}
      ?>
    </table>
    </td>
  </tr>
</table>
</body>
</html>