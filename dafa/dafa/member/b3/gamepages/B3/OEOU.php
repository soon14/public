<?php

$odds = odds_lottery_normal::getOdds($lottery_name,"两面");

echo '
document.getElementById("Game").innerHTML = "  <form id=\"formB3\" name=\"D3_021\" action=\"/member/quickB3_act.php\" method=\"post\" onsubmit=\"return false\">      <input type=\"hidden\" name=\"gid\" value=\"344926\" />      <input type=\"hidden\" name=\"MyRtype\" value=\"OEOU\" />      <input type=\"hidden\" name=\"gtype\" value=\"'.$gType.'\" />                 <input type=\"hidden\" name=\"gold_gmax\" class=\"CUPC\" value=\"'.$maxMoney.'\" />      <input type=\"hidden\" name=\"gold_gmin\" class=\"CUPC\" value=\"'.$lowestMoney.'\" />      <input type=\"hidden\" name=\"SC\" class=\"CUPC\" value=\"50000\" />      <input type=\"hidden\" name=\"SO\" class=\"CUPC\" value=\"5000\" />             <input type=\"hidden\" name=\"gold_gmax\" class=\"CUOE\" value=\"5000\" />      <input type=\"hidden\" name=\"gold_gmin\" class=\"CUOE\" value=\"1\" />      <input type=\"hidden\" name=\"SC\" class=\"CUOE\" value=\"50000\" />      <input type=\"hidden\" name=\"SO\" class=\"CUOE\" value=\"5000\" />             <input type=\"hidden\" name=\"gold_gmax\" class=\"MCPC\" value=\"5000\" />      <input type=\"hidden\" name=\"gold_gmin\" class=\"MCPC\" value=\"1\" />      <input type=\"hidden\" name=\"SC\" class=\"MCPC\" value=\"50000\" />      <input type=\"hidden\" name=\"SO\" class=\"MCPC\" value=\"5000\" />             <input type=\"hidden\" name=\"gold_gmax\" class=\"UPC\" value=\"5000\" />      <input type=\"hidden\" name=\"gold_gmin\" class=\"UPC\" value=\"1\" />      <input type=\"hidden\" name=\"SC\" class=\"UPC\" value=\"50000\" />      <input type=\"hidden\" name=\"SO\" class=\"UPC\" value=\"5000\" />             <input type=\"hidden\" name=\"gold_gmax\" class=\"COU\" value=\"5000\" />      <input type=\"hidden\" name=\"gold_gmin\" class=\"COU\" value=\"1\" />      <input type=\"hidden\" name=\"SC\" class=\"COU\" value=\"50000\" />      <input type=\"hidden\" name=\"SO\" class=\"COU\" value=\"5000\" />             <input type=\"hidden\" name=\"gold_gmax\" class=\"MUOE\" value=\"5000\" />      <input type=\"hidden\" name=\"gold_gmin\" class=\"MUOE\" value=\"1\" />      <input type=\"hidden\" name=\"SC\" class=\"MUOE\" value=\"50000\" />      <input type=\"hidden\" name=\"SO\" class=\"MUOE\" value=\"5000\" />             <input type=\"hidden\" name=\"gold_gmax\" class=\"MPC\" value=\"5000\" />      <input type=\"hidden\" name=\"gold_gmin\" class=\"MPC\" value=\"1\" />      <input type=\"hidden\" name=\"SC\" class=\"MPC\" value=\"50000\" />      <input type=\"hidden\" name=\"SO\" class=\"MPC\" value=\"5000\" />             <input type=\"hidden\" name=\"gold_gmax\" class=\"CUOU\" value=\"5000\" />      <input type=\"hidden\" name=\"gold_gmin\" class=\"CUOU\" value=\"1\" />      <input type=\"hidden\" name=\"SC\" class=\"CUOU\" value=\"50000\" />      <input type=\"hidden\" name=\"SO\" class=\"CUOU\" value=\"5000\" />             <input type=\"hidden\" name=\"gold_gmax\" class=\"MUOU\" value=\"5000\" />      <input type=\"hidden\" name=\"gold_gmin\" class=\"MUOU\" value=\"1\" />      <input type=\"hidden\" name=\"SC\" class=\"MUOU\" value=\"50000\" />      <input type=\"hidden\" name=\"SO\" class=\"MUOU\" value=\"5000\" />             <input type=\"hidden\" name=\"gold_gmax\" class=\"MUPC\" value=\"5000\" />      <input type=\"hidden\" name=\"gold_gmin\" class=\"MUPC\" value=\"1\" />      <input type=\"hidden\" name=\"SC\" class=\"MUPC\" value=\"50000\" />      <input type=\"hidden\" name=\"SO\" class=\"MUPC\" value=\"5000\" />             <input type=\"hidden\" name=\"gold_gmax\" class=\"MCUOU\" value=\"5000\" />      <input type=\"hidden\" name=\"gold_gmin\" class=\"MCUOU\" value=\"1\" />      <input type=\"hidden\" name=\"SC\" class=\"MCUOU\" value=\"50000\" />      <input type=\"hidden\" name=\"SO\" class=\"MCUOU\" value=\"5000\" />             <input type=\"hidden\" name=\"gold_gmax\" class=\"MCOE\" value=\"5000\" />      <input type=\"hidden\" name=\"gold_gmin\" class=\"MCOE\" value=\"1\" />      <input type=\"hidden\" name=\"SC\" class=\"MCOE\" value=\"50000\" />      <input type=\"hidden\" name=\"SO\" class=\"MCOE\" value=\"5000\" />             <input type=\"hidden\" name=\"gold_gmax\" class=\"UOE\" value=\"5000\" />      <input type=\"hidden\" name=\"gold_gmin\" class=\"UOE\" value=\"1\" />      <input type=\"hidden\" name=\"SC\" class=\"UOE\" value=\"50000\" />      <input type=\"hidden\" name=\"SO\" class=\"UOE\" value=\"5000\" />             <input type=\"hidden\" name=\"gold_gmax\" class=\"MOU\" value=\"5000\" />      <input type=\"hidden\" name=\"gold_gmin\" class=\"MOU\" value=\"1\" />      <input type=\"hidden\" name=\"SC\" class=\"MOU\" value=\"50000\" />      <input type=\"hidden\" name=\"SO\" class=\"MOU\" value=\"5000\" />             <input type=\"hidden\" name=\"gold_gmax\" class=\"CPC\" value=\"5000\" />      <input type=\"hidden\" name=\"gold_gmin\" class=\"CPC\" value=\"1\" />      <input type=\"hidden\" name=\"SC\" class=\"CPC\" value=\"50000\" />      <input type=\"hidden\" name=\"SO\" class=\"CPC\" value=\"5000\" />             <input type=\"hidden\" name=\"gold_gmax\" class=\"MCUOE\" value=\"5000\" />      <input type=\"hidden\" name=\"gold_gmin\" class=\"MCUOE\" value=\"1\" />      <input type=\"hidden\" name=\"SC\" class=\"MCUOE\" value=\"50000\" />      <input type=\"hidden\" name=\"SO\" class=\"MCUOE\" value=\"5000\" />             <input type=\"hidden\" name=\"gold_gmax\" class=\"UOU\" value=\"5000\" />      <input type=\"hidden\" name=\"gold_gmin\" class=\"UOU\" value=\"1\" />      <input type=\"hidden\" name=\"SC\" class=\"UOU\" value=\"50000\" />      <input type=\"hidden\" name=\"SO\" class=\"UOU\" value=\"5000\" />             <input type=\"hidden\" name=\"gold_gmax\" class=\"MCUPC\" value=\"5000\" />      <input type=\"hidden\" name=\"gold_gmin\" class=\"MCUPC\" value=\"1\" />      <input type=\"hidden\" name=\"SC\" class=\"MCUPC\" value=\"50000\" />      <input type=\"hidden\" name=\"SO\" class=\"MCUPC\" value=\"5000\" />             <input type=\"hidden\" name=\"gold_gmax\" class=\"COE\" value=\"5000\" />      <input type=\"hidden\" name=\"gold_gmin\" class=\"COE\" value=\"1\" />      <input type=\"hidden\" name=\"SC\" class=\"COE\" value=\"50000\" />      <input type=\"hidden\" name=\"SO\" class=\"COE\" value=\"5000\" />             <input type=\"hidden\" name=\"gold_gmax\" class=\"MOE\" value=\"5000\" />      <input type=\"hidden\" name=\"gold_gmin\" class=\"MOE\" value=\"1\" />      <input type=\"hidden\" name=\"SC\" class=\"MOE\" value=\"50000\" />      <input type=\"hidden\" name=\"SO\" class=\"MOE\" value=\"5000\" />             <input type=\"hidden\" name=\"gold_gmax\" class=\"MCOU\" value=\"5000\" />      <input type=\"hidden\" name=\"gold_gmin\" class=\"MCOU\" value=\"1\" />      <input type=\"hidden\" name=\"SC\" class=\"MCOU\" value=\"50000\" />      <input type=\"hidden\" name=\"SO\" class=\"MCOU\" value=\"5000\" />              <input type=\"hidden\" name=\"Maxcredit\" value=\"'.$userMoney.'\" />      <input type=\"hidden\" id=\"D3type\" name=\"D3type\" value=\"A\" />      <div class=\"InfoBar\">        <div class=\"Range\" style=\"display:none\">          <span  class=\"On\"><input type=\"radio\" name=\"jjomj\" value=\"0\" checked=\"checked\"/> 000~199</span>          <span ><input type=\"radio\" name=\"jjomj\" value=\"2\"/>200~399</span>          <span ><input type=\"radio\" name=\"jjomj\" value=\"4\"/>400~599</span>          <span ><input type=\"radio\" name=\"jjomj\" value=\"6\"/>600~799</span>          <span ><input type=\"radio\" name=\"jjomj\" value=\"8\"/>800~999</span>        </div>        <input type=\"hidden\" name=\"Start\" value=\"0\" />      </div>           <div class=\"round-table\" style=\"margin-top:20px\">      <table class=\"GameTable\">        <tr class=\"title_line\">          <td>组合</td>          <td>单</td>          <td>双</td>          <td>大</td>          <td>小</td>          <td>质</td>          <td>合</td>        </tr>        <tr>                                <td class=\"num\">佰</td>                  <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"M_ODD\" />           <label for=\"M_ODD\" class=\"odds\">                        '.$odds["h0"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h0"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"M_ODD\"  />          </td>                                        <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"M_EVEN\" />           <label for=\"M_EVEN\" class=\"odds\">                        '.$odds["h1"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h1"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"M_EVEN\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"M_OVER\" />           <label for=\"M_OVER\" class=\"odds\">                        '.$odds["h2"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h2"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"M_OVER\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"M_UNDER\" />           <label for=\"M_UNDER\" class=\"odds\">                        '.$odds["h3"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h3"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"M_UNDER\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"M_PRIME\" />           <label for=\"M_PRIME\" class=\"odds\">                        '.$odds["h4"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h4"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"M_PRIME\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"M_COMPO\" />           <label for=\"M_COMPO\" class=\"odds\">                        '.$odds["h5"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h5"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"M_COMPO\"  />          </td>                </tr>        <tr>                                        <td class=\"num\">拾</td>                  <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"C_ODD\" />           <label for=\"C_ODD\" class=\"odds\">                        '.$odds["h6"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h6"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"C_ODD\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"C_EVEN\" />           <label for=\"C_EVEN\" class=\"odds\">                        '.$odds["h7"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h7"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"C_EVEN\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"C_OVER\" />           <label for=\"C_OVER\" class=\"odds\">                        '.$odds["h8"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h8"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"C_OVER\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"C_UNDER\" />           <label for=\"C_UNDER\" class=\"odds\">                        '.$odds["h9"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h9"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"C_UNDER\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"C_PRIME\" />           <label for=\"C_PRIME\" class=\"odds\">                        '.$odds["h10"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h10"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"C_PRIME\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"C_COMPO\" />           <label for=\"C_COMPO\" class=\"odds\">                        '.$odds["h11"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h11"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"C_COMPO\"  />          </td>                </tr>        <tr>                                        <td class=\"num\">个</td>                  <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"U_ODD\" />           <label for=\"U_ODD\" class=\"odds\">                        '.$odds["h12"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h12"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"U_ODD\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"U_EVEN\" />           <label for=\"U_EVEN\" class=\"odds\">                        '.$odds["h13"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h13"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"U_EVEN\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"U_OVER\" />           <label for=\"U_OVER\" class=\"odds\">                        '.$odds["h14"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h14"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"U_OVER\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"U_UNDER\" />           <label for=\"U_UNDER\" class=\"odds\">                        '.$odds["h15"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h15"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"U_UNDER\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"U_PRIME\" />           <label for=\"U_PRIME\" class=\"odds\">                        '.$odds["h16"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h16"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"U_PRIME\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"U_COMPO\" />           <label for=\"U_COMPO\" class=\"odds\">                        '.$odds["h17"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h17"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"U_COMPO\"  />          </td>                </tr>        <tr>                                        <td class=\"num\">佰拾</td>                  <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"MC_ODD\" />           <label for=\"MC_ODD\" class=\"odds\">                        '.$odds["h18"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h18"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"MC_ODD\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"MC_EVEN\" />           <label for=\"MC_EVEN\" class=\"odds\">                        '.$odds["h19"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h19"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"MC_EVEN\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"MC_OVER\" />           <label for=\"MC_OVER\" class=\"odds\">                        '.$odds["h20"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h20"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"MC_OVER\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"MC_UNDER\" />           <label for=\"MC_UNDER\" class=\"odds\">                        '.$odds["h21"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h21"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"MC_UNDER\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"MC_PRIME\" />           <label for=\"MC_PRIME\" class=\"odds\">                        '.$odds["h22"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h22"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"MC_PRIME\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"MC_COMPO\" />           <label for=\"MC_COMPO\" class=\"odds\">                        '.$odds["h23"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h23"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"MC_COMPO\"  />          </td>                </tr>        <tr>                                        <td class=\"num\">佰个</td>                  <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"MU_ODD\" />           <label for=\"MU_ODD\" class=\"odds\">                        '.$odds["h24"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h24"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"MU_ODD\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"MU_EVEN\" />           <label for=\"MU_EVEN\" class=\"odds\">                        '.$odds["h25"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h25"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"MU_EVEN\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"MU_OVER\" />           <label for=\"MU_OVER\" class=\"odds\">                        '.$odds["h26"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h26"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"MU_OVER\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"MU_UNDER\" />           <label for=\"MU_UNDER\" class=\"odds\">                        '.$odds["h27"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h27"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"MU_UNDER\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"MU_PRIME\" />           <label for=\"MU_PRIME\" class=\"odds\">                        '.$odds["h28"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h28"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"MU_PRIME\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"MU_COMPO\" />           <label for=\"MU_COMPO\" class=\"odds\">                        '.$odds["h29"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h29"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"MU_COMPO\"  />          </td>                </tr>        <tr>                                        <td class=\"num\">拾个</td>                  <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"CU_ODD\" />           <label for=\"CU_ODD\" class=\"odds\">                        '.$odds["h30"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h30"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"CU_ODD\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"CU_EVEN\" />           <label for=\"CU_EVEN\" class=\"odds\">                        '.$odds["h31"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h31"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"CU_EVEN\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"CU_OVER\" />           <label for=\"CU_OVER\" class=\"odds\">                        '.$odds["h32"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h32"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"CU_OVER\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"CU_UNDER\" />           <label for=\"CU_UNDER\" class=\"odds\">                        '.$odds["h33"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h33"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"CU_UNDER\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"CU_PRIME\" />           <label for=\"CU_PRIME\" class=\"odds\">                        '.$odds["h34"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h34"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"CU_PRIME\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"CU_COMPO\" />           <label for=\"CU_COMPO\" class=\"odds\">                        '.$odds["h35"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h35"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"CU_COMPO\"  />          </td>                </tr>        <tr>                                        <td class=\"num\">佰拾个</td>                  <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"MCU_ODD\" />           <label for=\"MCU_ODD\" class=\"odds\">                        '.$odds["h36"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h36"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"MCU_ODD\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"MCU_EVEN\" />           <label for=\"MCU_EVEN\" class=\"odds\">                        '.$odds["h37"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h37"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"MCU_EVEN\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"MCU_OVER\" />           <label for=\"MCU_OVER\" class=\"odds\">                        '.$odds["h38"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h38"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"MCU_OVER\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"MCU_UNDER\" />           <label for=\"MCU_UNDER\" class=\"odds\">                        '.$odds["h39"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h39"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"MCU_UNDER\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"MCU_PRIME\" />           <label for=\"MCU_PRIME\" class=\"odds\">                        '.$odds["h40"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h40"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"MCU_PRIME\"  />          </td>                                <td>           <input type=\"hidden\" name=\"aConcede[]\" value=\"MCU_COMPO\" />           <label for=\"MCU_COMPO\" class=\"odds\">                        '.$odds["h41"].'                      </label>           <input type=\"hidden\" name=\"aOdds[]\" value=\"'.$odds["h41"].'\" />           <input type=\"text\" min=\"0\" max=\"99999999\" class=\"G\" name=\"gold[]\" id=\"MCU_COMPO\"  />          </td>                              </tr>      </table>      </div>          <div id=\"SendB3\">        <span class=\"credit\">下注金额:<b id=\"total_bet\">0.00</b></span>        <input type=\"button\" name=\"Cancel\" value=\"取消\" class=\"cancel_cen\" />&nbsp;&nbsp;        <input type=\"button\" name=\"SubmitA\" value=\"确定\" class=\"order\" />      </div>      <div id=\"BetInfo\">                  </div>    </form>  ";
document.getElementById("c_rtype").innerHTML = "两面";
document.getElementById("sRtype").value = "OEOU";
if (document.getElementById("memberTop")) {
var h1 = document.getElementById("memberTop").getElementsByTagName("h1")[0];
h1.innerHTML = "两面";
}
$("#YearNum").text("'.$qishu.'");
(self.GameB3.install) && self.GameB3.install();
';