<?php 
/**
  * 
  */
 class Data_model extends CI_Model
 {
 	
 	function DataJabatan()
    {
        $result = $this->db->query("SELECT * FROM jabatan");
        return $result;
    }

    function DataMaster()
    {
        $result = $this->db->query("SELECT * FROM karyawan");
        return $result;
    }

    function DataUsers()
    {
        $result = $this->db->query("SELECT * FROM users");
        return $result;
    }

    function AddCS($user,$pass,$email,$photo,$id,$k_status)
    {
        $data = array(
            'u_name' => $user,
            'u_pass' => $pass,
            'u_email'=> $email,
            'u_role' => 2,
            'u_kid'  => $id,
            'u_last' => '0000-00-00 00:00:00',
            'u_ip'   => '',
            'u_stat' => $k_status,
            'u_photo'=> $photo
        );
        $this->db->insert('users', $data);
    }

    function AddKaryawan($k_nama,$k_jk,$k_phone,$k_kota,$k_lahir,$k_jabatan)
    {
        $data = array(
            'k_nama' => $k_nama,
            'k_jk' => $k_jk,
            'k_kota'=> $k_kota,
            'k_lahir' => $k_lahir,
            'k_jabatan'  => $k_jabatan,
            'k_phone' => $k_phone,
            'k_status'   => 1
        );
        $this->db->insert('karyawan', $data);
    }
 } ?>