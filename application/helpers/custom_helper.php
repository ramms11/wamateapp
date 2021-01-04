<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('cek_sesi')) {
	function cek_sesi() {
		$CI =& get_instance();
		$sesi = $CI->session->userdata('logged');
		if ($sesi != 'true') {
			redirect('');
		}
	}
}

if (!function_exists('cek_sesi_login')) {
	function cek_sesi_login() {
		$CI =& get_instance();
		$sesi = $CI->session->userdata('logged');
		if ($sesi == 'true') {
			redirect('auth/ceksesi');
		}
	}
}

function generate($input, $strength = 16) {
	$input_length = strlen($input);
	$random_string = '';
	for($i = 0; $i < $strength; $i++) {
		$random_character = $input[mt_rand(0, $input_length - 1)];
		$random_string .= $random_character;
	}

	return $random_string;
}

if (!function_exists('rupiah')) {
	function rupiah($angka){
		$hasil_rupiah = number_format($angka,0,',','.');
		return $hasil_rupiah;
	}
}
?>