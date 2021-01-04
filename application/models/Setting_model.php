<?php 
/**
  * 
  */
class Setting_model extends CI_Model
{
	function apps(){
		$query = $this->db->get('apps');
		return $query;
	}
} ?>