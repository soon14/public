<?php
if(!isset($_SESSION)){ session_start();}
header ("Expires: Mon, 26 Jul 1970 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");

$C_Patch=$_SERVER['DOCUMENT_ROOT'];
include_once($C_Patch."/app/member/include/address.mem.php");
include_once($C_Patch."/app/member/include/com_chk.php");
include_once($C_Patch."/app/member/class/odds_sf.php");

$odds1 = odds_sf::getOddsByBall("广东十一选五","顺子杂六","ball_1");
$odds2 = odds_sf::getOddsByBall("广东十一选五","顺子杂六","ball_2");
$odds3 = odds_sf::getOddsByBall("广东十一选五","顺子杂六","ball_3");

echo '

<div id="locate-box">
    <table class="order-table" tabs-view="1">
        <caption>前三球</caption>
        <tr>
            <td class="choose">
                <font class="choose-name">顺子</font>
                <input type="text" value="'.$odds1["h1"].'" id="shunzi-ball_1-h1" />
            </td>
            <td class="choose">
                <font class="choose-name">半顺</font>
                <input type="text" value="'.$odds1["h2"].'" id="shunzi-ball_1-h2" />
            </td>
            <td class="choose">
                <font class="choose-name">杂六</font>
                <input type="text" value="'.$odds1["h3"].'" id="shunzi-ball_1-h3" />
            </td>
        </tr>
    </table>
    <table class="order-table" tabs-view="2">
        <caption>中三球</caption>
        <tr>
            <td class="choose">
                <font class="choose-name">顺子</font>
                <input type="text" value="'.$odds2["h1"].'" id="shunzi-ball_2-h1" />
            </td>
            <td class="choose">
                <font class="choose-name">半顺</font>
                <input type="text" value="'.$odds2["h2"].'" id="shunzi-ball_2-h2" />
            </td>
            <td class="choose">
                <font class="choose-name">杂六</font>
                <input type="text" value="'.$odds2["h3"].'" id="shunzi-ball_2-h3" />
            </td>
        </tr>
    </table>

    <table class="order-table" tabs-view="3">
        <caption>后三球</caption>
        <tr>
            <td class="choose">
                <font class="choose-name">顺子</font>
                <input type="text" value="'.$odds3["h1"].'" id="shunzi-ball_3-h1" />
            </td>
            <td class="choose">
                <font class="choose-name">半顺</font>
                <input type="text" value="'.$odds3["h2"].'" id="shunzi-ball_3-h2" />
            </td>
            <td class="choose">
                <font class="choose-name">杂六</font>
                <input type="text" value="'.$odds3["h3"].'" id="shunzi-ball_3-h3" />
            </td>
        </tr>
    </table>

</div>
';