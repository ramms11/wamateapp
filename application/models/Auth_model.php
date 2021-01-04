<?php 
/**
  * 
  */
 class Auth_model extends CI_Model
 {
 	public function cek_login($username,$enkrip)
    {
    	$result = $this->db->query("SELECT * FROM users WHERE u_name='$username' AND u_pass='$enkrip' LIMIT 1");
        return $result;
    }

    function getClientIP()
 	{
 		if (isset($_SERVER)) {
 			if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
 				return $_SERVER["HTTP_X_FORWARDED_FOR"];
 			if (isset($_SERVER["HTTP_CLIENT_IP"]))
 				return $_SERVER["HTTP_CLIENT_IP"];
 			return $_SERVER["REMOTE_ADDR"];
 		}
 		if (getenv('HTTP_X_FORWARDED_FOR'))
 			return getenv('HTTP_X_FORWARDED_FOR');
 		if (getenv('HTTP_CLIENT_IP'))
 			return getenv('HTTP_CLIENT_IP');
 		return getenv('REMOTE_ADDR');
 	}

 	function lastlogin($username,$dtime,$ip)
    {
        $this->db->set('u_last', $dtime);
        $this->db->set('u_ip', $ip);
        $this->db->where('u_name', $username);
        $this->db->update('users');
    }
 } ?>