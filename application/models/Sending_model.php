<?php 
/**
  * 
  */
 class Sending_model extends CI_Model
 {
 	
 	function email($email,$subject,$content)
 	{
 		$id = '1';
		$CekEmail = $this->db->get_where('smtp_settings', ['id' => $id])->row_array();
		$smtp_protocol	= $CekEmail['smtp_protocol'];
        $smtp_host	= $CekEmail['smtp_host'];
        $smtp_email	= $CekEmail['smtp_email'];
        $smtp_password	= $CekEmail['smtp_password'];
        $smtp_secure	= $CekEmail['smtp_secure'];
        $port_no	= $CekEmail['port_no'];
        
        $config = array(
			'protocol' 	=> $smtp_protocol, 
			'smtp_host' => $smtp_secure.'://'.$smtp_host, 
			'smtp_port' => $port_no, 
			'smtp_user' => $smtp_email, 
			'smtp_pass' => $smtp_password, 
			'mailtype' 	=> 'html', 
			'charset' 	=> 'utf-8' 
		);

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from($smtp_user, 'Chat Integrated Whatsapp');
		$this->email->to($email);
		$this->email->subject($subject);
		$this->email->message($content);
		$this->email->send();
 	}
 } ?>