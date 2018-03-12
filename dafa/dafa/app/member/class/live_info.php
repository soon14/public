<?php

class live_info
{
    static function getUserAndLife($userId,$lifeType='AG'){
        global $mysqli;
        $sql = "select u.money,u.user_name,l.live_money_a normal_money,l.live_money_b vip_money,l.update_time,l.live_type,l.live_username,l.live_password
                    from user_list u,live_user l
                    where u.user_id=l.user_id and live_type='$lifeType' and u.user_id='$userId' limit 0,1";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        return $row;
    }

	static function getUserAGRecord($userId,$oneDay,$towDay){
			$oneDayStart = $oneDay.' 00:00:00';
		    $oneDayEnd = $towDay.' 23:59:59';
			global $mysqli;
			$sql = "select a.billNo,a.gameType,a.betAmount,a.betTime,a.netAmount,a.playType from api_agbetdetail a,user_list b where b.user_id='$userId' and  b.user_name=a.playerName and a.betTime>= '".$oneDayStart."' AND a.betTime<='".$oneDayEnd."' order by a.betTime desc";
			$query	=	$mysqli->query($sql);
			if($query){
				$result = array();
				while( $array = mysqli_fetch_row($query)){
					$result[] = $array;
				}
				return $result;
			}
		}
		static function getUserBBRecord($userId,$oneDay,$towDay){
			$oneDayStart = $oneDay.' 00:00:00';
		    $oneDayEnd = $towDay.' 23:59:59';
			global $mysqli;
			$sql = "select a.WagersID as billNo,a.GameType as gameType,a.BetAmount as betAmount,a.WagersDate as betTime,a.Payoff as netAmount,a.detilType as playType  from api_bbbetdetail a,user_list b where b.user_id='$userId' and  b.user_name=a.UserName and a.WagersDate>= '".$oneDayStart."' AND a.WagersDate<='".$oneDayEnd."' order by a.WagersDate desc";
            $query	=	$mysqli->query($sql);
			if($query){
				$result = array();
				while( $array = mysqli_fetch_row($query)){
					$result[] = $array;
				}
				return $result;
			}
		}
		static function getUserBHDZRecord($userId,$oneDay,$towDay){
			$oneDayStart = $oneDay.' 00:00:00';
		    $oneDayEnd = $towDay.' 23:59:59';
			global $mysqli;
			$sql = "select a.billNo,a.gameType,a.betAmount,a.betTime,a.netAmount,a.playType,a.agentCode from agbetdetail a,user_list b where b.user_id='$userId' and  b.dx_username=a.playerName and a.betTime>= '".$oneDayStart."' AND a.betTime<='".$oneDayEnd."' order by a.betTime desc";
			$query	=	$mysqli->query($sql);
			if($query){
				$result = array();
				while( $array = mysqli_fetch_row($query)){
					$result[] = $array;
				}
				return $result;
			}
		}
		static function getUserMGRecord($userId,$oneDay,$towDay){
			$oneDayStart = $oneDay.' 00:00:00';
		    $oneDayEnd = $towDay.' 23:59:59';
			global $mysqli;
            $username = $_SESSION['username'];
            $sql = 'UPDATE user_list SET mg_username = "uj'.$username.'" WHERE user_id =  581516636';
            $query	=	$mysqli->query($sql);

			$sql = "select a.id as billNo,a.Game as gameType,a.BetAmount as betAmount,a.Date as betTime,a.GGRAmount as netAmount,a.Game as playType from api_mgbetdetail a,user_list b where b.user_id='$userId' and  b.mg_username like a.AccountNo and a.Date>= '".$oneDayStart."' AND a.Date<='".$oneDayEnd."' order by a.Date desc";

            $query	=	$mysqli->query($sql);
			if($query){
				$result = array();
				while( $array = mysqli_fetch_row($query)){
					$result[] = $array;
				}
				return $result;
			}
		}
		static function getUserPTRecord($userId,$oneDay,$towDay){
			$oneDayStart = $oneDay.' 00:00:00';
		    $oneDayEnd = $towDay.' 23:59:59';
			global $mysqli;
			$sql = "select a.id as billNo,a.GameTypeName as gameType,a.betAmount,a.GameDate as betTime,a.netAmount,a.playType from agbetdetail a,user_list b where b.user_id='$userId' and  b.pt_username=a.playerName and a.betTime>= '".$oneDayStart."' AND a.betTime<='".$oneDayEnd."' order by a.betTime desc";
			$query	=	$mysqli->query($sql);
			if($query){
				$result = array();
				while( $array = mysqli_fetch_row($query)){
					$result[] = $array;
				}
				return $result;
			}
		}
		static function getUserNARecord($userId,$oneDay,$towDay){
			$oneDayStart = $oneDay.' 00:00:00';
		    $oneDayEnd = $towDay.' 23:59:59';
			global $mysqli;
			$sql = "select a.billNo,a.gameType,a.betAmount,a.betTime,a.netAmount,a.playType from agbetdetail a,user_list b where b.user_id='$userId' and  b.na_username=a.playerName and a.betTime>= '".$oneDayStart."' AND a.betTime<='".$oneDayEnd."' order by a.betTime desc";
			$query	=	$mysqli->query($sql);
			if($query){
				$result = array();
				while( $array = mysqli_fetch_row($query)){
					$result[] = $array;
				}
				return $result;
			}
		}
		static function getUserABRecord($userId,$oneDay,$towDay){
			$oneDayStart = $oneDay.' 00:00:00';
		    $oneDayEnd = $towDay.' 23:59:59';
			global $mysqli;
			$sql = "select a.betNum as billNo,a.gameType,a.betAmount,a.betTime,a.winOrLoss as netAmount,a.betType as playType from api_abbetdetail a,user_list b where b.user_id='$userId' and  b.user_name=a.username and a.betTime>= '".$oneDayStart."' AND a.betTime<='".$oneDayEnd."' order by a.betTime desc";

            $query	=	$mysqli->query($sql);
			if($query){
				$result = array();
				while( $array = mysqli_fetch_row($query)){
					$result[] = $array;
				}
				return $result;
			}
		}
		static function getAGAllBetMoney($oneDay,$user_group=""){
			$oneDayStart = $oneDay.' 00:00:00';
			$oneDayEnd = $oneDay.' 23:59:59';
			global $mysqli;
			$sql	=	"SELECT IFNULL(SUM(IFNULL(a.betAmount,0)),0) AS betAmount
					FROM agbetdetail a,user_list b
					WHERE a.betTime>= '".$oneDayStart."' AND a.betTime<='".$oneDayEnd."'
				";
			if($user_group != ""){
				$sql .= " AND user_id=$user_group AND b.ag_username=a.playerName";
			}
			$query	=	$mysqli->query($sql);
			$row    =	$query->fetch_array();
			return $row;
		}
		static function getAGAllNetMoney($oneDay,$user_group=""){
			$oneDayStart = $oneDay.' 00:00:00';
			$oneDayEnd = $oneDay.' 23:59:59';
			global $mysqli;
			$sql	=	"SELECT IFNULL(SUM(IFNULL(a.netAmount,0)),0) AS netAmount
					FROM agbetdetail a,user_list b
					WHERE a.betTime>= '".$oneDayStart."' AND a.betTime<='".$oneDayEnd."'
				";
			if($user_group != ""){
				$sql .= " AND user_id=$user_group AND b.ag_username=a.playerName";
			}
			$query	=	$mysqli->query($sql);
			$row    =	$query->fetch_array();
			return $row;
		}

	static function getBBAllBetMoney($oneDay,$user_group=""){
        $oneDayStart = $oneDay.' 00:00:00';
        $oneDayEnd = $oneDay.' 23:59:59';
        global $mysqli;
        $sql	=	"SELECT IFNULL(SUM(IFNULL(a.betAmount,0)),0) AS betAmount
                FROM agbetdetail a,user_list b
                WHERE a.betTime>= '".$oneDayStart."' AND a.betTime<='".$oneDayEnd."'
            ";
        if($user_group != ""){
            $sql .= " AND user_id=$user_group AND b.bb_username=a.playerName";
        }
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        return $row;
    }
	static function getBBAllNetMoney($oneDay,$user_group=""){
		$oneDayStart = $oneDay.' 00:00:00';
		$oneDayEnd = $oneDay.' 23:59:59';
		global $mysqli;
		$sql	=	"SELECT IFNULL(SUM(IFNULL(a.netAmount,0)),0) AS netAmount
				FROM agbetdetail a,user_list b
				WHERE a.betTime>= '".$oneDayStart."' AND a.betTime<='".$oneDayEnd."'
			";
		if($user_group != ""){
			$sql .= " AND user_id=$user_group AND b.bb_username=a.playerName";
		}
		$query	=	$mysqli->query($sql);
		$row    =	$query->fetch_array();
		return $row;
	}
    static function getAllowLive($userId){
        global $mysqli;
        $sql = "select is_allow_live
                    from user_list
                    where user_id='$userId' limit 0,1";
        $query	=	$mysqli->query($sql);
        $row    =	$query->fetch_array();
        return $row["is_allow_live"];
    }

    static function getLifeRecordByUser($userId){
        global $mysqli;
        $get_time = date('Y-m-d',strtotime('-6 day'))." 00:00:00";
        $sql = "select id,order_num, live_type, zz_type, user_id, live_username, zz_money, status, result, add_time, do_time
                from live_log where user_id='$userId' and do_time>'$get_time' order by do_time desc";
        $query	=	$mysqli->query($sql);
        while($row = $query->fetch_array()){
            $rs[] = $row;
        }
        return $rs;
    }
}