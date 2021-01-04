<?php 
/**
  * 
  */
 class Setting extends CI_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 		error_reporting(0);
 	}

 	function index()
 	{
 		$this->load->view('admin/setting');
 	}

 	function info()
 	{
 		$this->load->view('admin/appsinfo');
 	}
 } ?>