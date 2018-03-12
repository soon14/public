﻿<?php
header("content-type:text/html;charset=utf-8");
include_once($_SERVER['DOCUMENT_ROOT']."/app/member/include/config.inc.php");
class agapi
{
	private $agent = 'VL8uDPH9ZudFDTFcZFtpM9vXVt3uyKCg7aVh6TXFmwAQmUkVcXaAjpx6';
    private $apiAccount="NGtaiyang02";
	
	private $password_prefix = '';
	private $username_prefix = '';

   private $register_url = 'http://gm.dfapi.net/api/ag/register.ashx'; //新增会员url
    private $balance_url = 'http://gm.dfapi.net/api/ag/balance.ashx'; //查询余额url
    private $trans_in_url = 'http://gm.dfapi.net/api/ag/deposit.ashx'; //存款url
    private $trans_out_url = 'http://gm.dfapi.net/api/ag/withdrawal.ashx'; //取款url
    private $login_url = 'http://gm.dfapi.net/api/ag/login.ashx'; //游戏登录url
    private $credit_url = 'http://gm.dfapi.net/api/ag/credit.ashx'; //游戏登录url
    private $betrecord_url = 'http://gm.dfapi.net/api/ag/betrecord.ashx'; //huoqujilu

	function __construct()
    {
		
	}

    function credit(){
        $salt = strtolower(substr(md5($this->apiAccount),0,5));
        $code = $salt.md5($this->agent.$this->apiAccount.$salt);
        $post_data = array(
            'apiAccount'=>$this->apiAccount,
            'code'=>$code
        );
        $res = $this->docurl($this->credit_url, $post_data);
        return $res;

    }

    function betrecord($startDate,$endDate,$pageIndex,$pageSize){
		$salt = strtolower(substr(md5($this->apiAccount),0,5));
		$code = $salt.md5($this->agent.$this->apiAccount.$startDate.$endDate.$pageIndex.$pageSize.$salt);
		$post_data = array(
		'apiAccount'=>$this->apiAccount,
		'startDate'=>$startDate,
		'endDate'=>$endDate,
		'pageIndex'=>$pageIndex,
		'pageSize'=>$pageSize,
		'code'=>$code
		);
		
		$res = $this->docurl($this->betrecord_url, $post_data);
		return $res; 
	}
	
	function balance_one($username,$actype=1){
		$username = $this->username_prefix.$username;
		$password = substr(md5($this->password_prefix.$username),0,12);
		$salt = strtolower(substr(md5($this->password_prefix.$username),0,5));
		$isDemo=0;
		$code = $salt.md5($this->agent.$this->apiAccount.$username.$password.$isDemo.$salt);
		$post_data = array(
			'apiAccount'=>$this->apiAccount,
			'userName'=>$username,
			'password'=>$password,
			'isDemo'=>$isDemo,
			'code'=>$code
		);

		$res = $this->docurl($this->balance_url, $post_data);
		return $res;
		/*
		 *  成功：{“result”:true, amount: 100}  
           	失败：{“result”: true, “code”: “code”, “info”: “failed!”}  
           */ 
		
	}

    function trans_out($username,$credit,$billno){
        $username = $this->username_prefix.$username;
        $password = substr(md5($this->password_prefix.$username),0,12);
        $salt = strtolower(substr(md5($this->password_prefix.$username),0,5));
        $isDemo=0;
        $code = $salt.md5($this->agent.$this->apiAccount.$username.$password .$billno.$credit.$isDemo.$salt);
        $post_data = array(
            'apiAccount'=>$this->apiAccount,
            'userName'=>$username,
            'password'=>$password,
            'transSN'=>$billno,
            'amount'=>$credit,
            'isDemo'=>$isDemo,
            'code'=>$code
        );
        $res = $this->docurl($this->trans_out_url, $post_data);
        return $res;

        /*
         *  成功：{“result”:true, “code”: 0, “info”:”succeed!”}
         失败：{“result”: true, “code”: “code”, “info”: “failed!”}
         * */
    }

    function trans_in($username,$credit,$billno){
        $username = $this->username_prefix.$username;
        $password = substr(md5($this->password_prefix.$username),0,12);
        $salt = strtolower(substr(md5($this->password_prefix.$username),0,5));
        $isDemo=0;
        $code = $salt.md5($this->agent.$this->apiAccount.$username.$password .$billno.$credit.$isDemo.$salt);
        $post_data = array(
            'apiAccount'=>$this->apiAccount,
            'userName'=>$username,
            'password'=>$password,
            'transSN'=>$billno,
            'amount'=>$credit,
            'isDemo'=>$isDemo,
            'code'=>$code
        );
        $res = $this->docurl($this->trans_in_url, $post_data);
        return $res;

        /*
         *  成功：{“result”:true, “code”: 0, “info”:”succeed!”}
         失败：{“result”: true, “code”: “code”, “info”: “failed!”}
         * */

    }
	
	function login($username,$gameType){
		$username = $this->username_prefix.$username;
		$password = substr(md5($this->password_prefix.$username),0,12);
		$salt = strtolower(substr(md5($this->password_prefix.$username),0,5));
		$lang='zh-CN';
		$isSpeed=0;
		$isDemo=0;
		$code = $salt.md5($this->agent.$this->apiAccount.$username.$password.$lang.$isSpeed.$isDemo.$salt);
		$post_data = array(
		'apiAccount'=>$this->apiAccount,
		'userName'=>$username,
		'password'=>$password,
		'lang'=>$lang,
		'gameType'=>$gameType,
		'isSpeed'=>$isSpeed,
		'isDemo'=>$isDemo,
		'code'=>$code
		);
		$res = $this->docurl($this->login_url, $post_data);
		$res['Data'] =str_replace('jack888.com:81','ven338.com',$res['Data']);
		return $res;
		/*
		 *  成功：{“result”:true, “url”: “http_url”, params: “parameters”, key: “key”}  
        	失败：{“result”: true, “code”: “error_code”, “info”: “failed!”}  
		 * */  
	}


    function register($username,$actype=1){
        global $mysqli;
        //参数 agent,username,password,key
        $u_name=$username;
        $username = $this->username_prefix.$username;
        $password = substr(md5($this->password_prefix.$username),0,12);
        $salt = strtolower(substr(md5($this->password_prefix.$username),0,5));
        $isDemo=0;
        $code = $salt.md5($this->agent.$this->apiAccount.$username.$password.$isDemo.$salt);
        $post_data = array(
            'apiAccount'=>$this->apiAccount,
            'userName'=>$username,
            'password'=>$password,
            'isDemo'=>$isDemo,
            'code'=>$code,
        );
        $res = $this->docurl($this->register_url, $post_data);

        if($res['Success'])
        {
            if($mysqli)
            {
                $sql="UPDATE `user_list` SET  `ag_username`='$username', `ag_password`='$password' WHERE (`user_name`='$u_name')";
                $mysqli->query($sql);
            }
            return $res;
        }else{
            //注册失败
            return array('code'=>-1,'info'=>'未知错误');
        }
    }

	private function docurl($url,$post_data=array(),$post=true){
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POST, $post);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		$res = curl_exec($ch);
		curl_close($ch);
		return json_decode($res,true);
	}
	
	function geterrorcode($code=''){
		
		$errorcode = array("10000"=>array("error info","查看具体的说明内容"),
"10016"=>array("Network error!","网络错误"),
"25004"=>array("The agent is not exist","代理商号不存在"),
"22011"=>array("The member is not exist","会员不存在"),
"44000"=>array("key error..","验证码错误或丢失"),
"44001"=>array("The parameters are not complete","参数不完整"));
		if($code){
			if(key_exists($code, $errorcode)){
				return $errorcode[$code][1];
			}else{
				return '服务器忙，请稍后重试';
			}
		}
		return $errorcode;
	}
	
	
	function logindianzi($username){
		$username = $this->username_prefix.$username;
		$password = substr(md5($this->password_prefix.$username),0,12);
		$salt = strtolower(substr(md5($this->password_prefix.$username),0,5));
		$lang='zh-CN';
		$isSpeed=0;
		$isDemo=0;
		$gameType=8;
		$code = $salt.md5($this->agent.$this->apiAccount.$username.$password.$lang.$isSpeed.$isDemo.$salt);
		$post_data = array(
		'apiAccount'=>$this->apiAccount,
		'userName'=>$username,
		'password'=>$password,
		'lang'=>$lang,
		'gameType'=>$gameType,
		'isSpeed'=>$isSpeed,
		'isDemo'=>$isDemo,
		'code'=>$code
		);
		//print_r($post_data);
		$res = $this->docurl($this->login_url, $post_data);
		$res['Data'] =str_replace('jack888.com:81','ven338.com',$res['Data']);
		//print_r($res);
		return $res;
		/*
		 *  成功：{“result”:true, “url”: “http_url”, params: “parameters”, key: “key”}  
        	失败：{“result”: true, “code”: “error_code”, “info”: “failed!”}  
		 * */  
	}	
	function loginbuyu($username){
		$username = $this->username_prefix.$username;
		$password = substr(md5($this->password_prefix.$username),0,12);
		$salt = strtolower(substr(md5($this->password_prefix.$username),0,5));
		$lang='zh-CN';
		$isSpeed=0;
		$isDemo=0;
		$gameType=6;
		$code = $salt.md5($this->agent.$this->apiAccount.$username.$password.$lang.$isSpeed.$isDemo.$salt);
		$post_data = array(
		'apiAccount'=>$this->apiAccount,
		'userName'=>$username,
		'password'=>$password,
		'lang'=>$lang,
		'gameType'=>$gameType,
		'isSpeed'=>$isSpeed,
		'isDemo'=>$isDemo,
		'code'=>$code
		);
		//print_r($post_data);
		$res = $this->docurl($this->login_url, $post_data);
		$res['Data'] =str_replace('jack888.com:81','ven338.com',$res['Data']);
		//print_r($res);
		return $res;
		/*
		 *  成功：{“result”:true, “url”: “http_url”, params: “parameters”, key: “key”}  
        	失败：{“result”: true, “code”: “error_code”, “info”: “failed!”}  
		 * */  
	}
}





