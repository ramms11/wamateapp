<?php 
/**
  * 
  */
class Update extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Setting_model', 'setting_model');
		$this->load->model('Auth_model', 'auth_model');
		error_reporting(0);
	}

	function ServerAPI()
	{
		$data = 1;
		$api = file_get_contents('https://cintarest.helenscloud.web.id/apps?apps_id=4957124436');
		foreach (json_decode($api, TRUE) as $key => $value);
		$newlink = $value['apps_link'];
		$this->db->set('apps_api', $newlink);
		$this->db->where('apps_id', $data);
		$this->db->update('apps');
		$url = base_url().'admin/setting';
		redirect($url);
	}
} ?>