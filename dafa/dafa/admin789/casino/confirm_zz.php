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

$id = $_POST['id'];
$sql	 =	"select status from live_log where id='".intval($id)."' ";
$query	 =	$mysqli->query($sql);
$rows	 =	$query->fetch_array();
$status	 =	$rows['status'];

if($status == 4){
    $sql = "update live_log set status=0 where id='".intval($id)."' ";
    $query	 =	$mysqli->query($sql);
}
echo 1;

