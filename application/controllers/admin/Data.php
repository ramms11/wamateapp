<?php 
/**
  * 
  */
class Data extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Data_model', 'data_model');
		$this->load->model('Sending_model', 'sending_model');
	}

	function jabatan()
	{
		$data['DataJabatan'] = $this->data_model->DataJabatan();
		$this->load->view('admin/jabatan',$data);
	}

	function master()
	{
		cek_sesi();
		$data['DataMaster'] = $this->data_model->DataMaster();
		$data['DataJabatan'] = $this->data_model->DataJabatan();
		$this->load->view('admin/master',$data);
	}

	function inputjabatan()
	{
		$jabatan 	  = ucwords($this->input->post('jabatan'));
		$data = array(
			'j_nama' => $jabatan
		);
		$this->db->insert('jabatan', $data);
		$url=base_url('admin/data/jabatan');
		redirect($url);
	}

	function inputKaryawan()
	{
		$k_nama   = ucwords($this->input->post('k_nama'));
		$k_jk 	  = $this->input->post('k_jk');
		$k_phone  = $this->input->post('k_phone');
		$k_kota   = $this->input->post('k_kota');
		$k_lahir  = $this->input->post('k_lahir');
		$k_jabatan= $this->input->post('k_jabatan');
		$this->data_model->AddKaryawan($k_nama,$k_jk,$k_phone,$k_kota,$k_lahir,$k_jabatan);
		$url = base_url().'admin/data=master';
		redirect($url);
	}

	function disable($id)
	{
		$query = $this->db->get_where('karyawan', array('k_id' => $id));
		if($query->num_rows() > 0){
			$query = $this->db->get_where('users', array('u_kid' => $id));
			if($query->num_rows() > 0){
				$row = $query->row_array();
				$uid = $row['u_id'];
				$this->db->set('u_stat', 0);
				$this->db->where('u_id', $uid);
				$this->db->update('users');

				$this->db->set('k_status', 0);
				$this->db->where('k_id', $id);
				$this->db->update('karyawan');
				$url = base_url().'admin/data=master';
				redirect($url);
			}else{
				$this->db->set('k_status', 0);
				$this->db->where('k_id', $id);
				$this->db->update('karyawan');
				$url = base_url().'admin/data=master';
				redirect($url);
			}
		}else{
			$url = base_url().'admin/data=master';
			redirect($url);
		}
	}

	function enable($id)
	{
		$query = $this->db->get_where('karyawan', array('k_id' => $id));
		if($query->num_rows() > 0){
			$query = $this->db->get_where('users', array('u_kid' => $id));
			if($query->num_rows() > 0){
				$row = $query->row_array();
				$uid = $row['u_id'];
				$this->db->set('u_stat', 1);
				$this->db->where('u_id', $uid);
				$this->db->update('users');

				$this->db->set('k_status', 1);
				$this->db->where('k_id', $id);
				$this->db->update('karyawan');
				$url = base_url().'admin/data=master';
				redirect($url);
			}else{
				$this->db->set('k_status', 1);
				$this->db->where('k_id', $id);
				$this->db->update('karyawan');
				$url = base_url().'admin/data=master';
				redirect($url);
			}
		}else{
			$url = base_url().'admin/data=master';
			redirect($url);
		}
	}
	
	function AddCS($id)
	{
		$baseurl = base_url('');
		$email = $this->input->post('email');
		$query = $this->db->get_where('karyawan', array('k_id' => $id));
		if($query->num_rows() > 0){
			$row = $query->row_array();
			$k_nama = $row['k_nama'];
			$k_lahir = $row['k_lahir'];
			$k_jk = $row['k_jk'];
			$k_status = $row['k_status'];
			if ($k_jk != 1) {
				$photo = "pr.png";
			}else{
				$photo = "lk.png";
			}
			$lahir = date('d',strtotime($k_lahir));
			$newtext = strtolower(str_replace(' ', '', $k_nama));
			$sub = substr($newtext, 0, 8);
			$user = $sub.$lahir;
			$pass = base64_encode(md5('123456'));
			$subject = "Berhasil : Akun Customer Anda Telah Dibuat";
			$content = '<!DOCTYPE html>
			<html>
			<head>
			<title></title>
			</head>
			<body>
			<h3>Dear '.$k_nama.'</h3>
			<p>Akun Customer Anda Telah Berhasil Dibuat, Berikut Rincian Akun Anda:</p>
			<br>
			<h3>Detail Customer</h3>
			<hr>
			<p><b>Username : '.$user.'</b></p>
			<p><b>Password : 123456</b></p>
			<p><b>Email : '.$email.'</b></p>
			<br>
			<h3>Link Login</h3>
			<hr>
			<p>Anda Dapat Login Pada <a href="'.$baseurl.'" class="btn btn-primary">klik di sini</a></p>
			</body>
			</html>';
			$this->data_model->AddCS($user,$pass,$email,$photo,$id,$k_status);
			$this->sending_model->email($email,$subject,$content);
			$url = base_url().'admin/data=master';
			redirect($url);
		}else{
			$url = base_url().'admin/data=master';
			redirect($url);
		}
	}

	function DelCS($id)
	{
		$this->db->where('u_kid', $id);
		$this->db->delete('users');
		$url = base_url().'admin/data=master';
		redirect($url);
	}
} ?>