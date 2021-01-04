<?php
$user = $this->session->userdata('uid');
$query=$this->db->get_where('users', array('u_id' => $user));
if ($query->num_rows()>0) {
	$row = $query->row_array();
	$u_name = $row['u_name'];
	$u_email = $row['u_email'];
	$u_role = $row['u_role'];
	$u_kid = $row['u_kid'];
	$u_last = $row['u_last'];
	$u_ip = $row['u_ip'];
	$u_photo = $row['u_photo'];
}

$apps = 1;
$query=$this->db->get_where('apps', array('apps_id' => $apps));
if ($query->num_rows()>0) {
	$row = $query->row_array();
	$apps_api = $row['apps_api'];
	$apps_token = $row['apps_token'];
	$apps_devicekey = $row['apps_devicekey'];
	$apps_update = $row['apps_update'];
}
$api = file_get_contents('https://cintarest.helenscloud.web.id/apps?apps_id=4957124436');
foreach (json_decode($api, TRUE) as $key => $value)
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<title><?php echo APPS_NAME ?> - Apps Info </title>
	<link rel="icon" type="image/x-icon" href="<?=base_url('fav-icon.ico')?>"/>
	<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
	<link href="<?=base_url('themes/admin/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
	<link href="<?=base_url('themes/admin/assets/css/plugins.css')?>" rel="stylesheet" type="text/css" />
	<link href="<?=base_url('themes/admin/assets/css/users/user-profile.css')?>" rel="stylesheet" type="text/css" />
</head>
<body class="sidebar-noneoverflow">
	<div class="header-container fixed-top">
		<header class="header navbar navbar-expand-sm">
			<ul class="navbar-item flex-row">
				<li class="nav-item align-self-center page-heading">
					<div class="page-header">
						<div class="page-title">
							<h3>Apps Info</h3>
						</div>
					</div>
				</li>
			</ul>
			<a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg></a>

			<ul class="navbar-item flex-row search-ul">
			</ul>
			<ul class="navbar-item flex-row navbar-dropdown">
				<li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
					<a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
					</a>
					<div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="userProfileDropdown">
						<div class="user-profile-section">
							<div class="media mx-auto">
								<img src="<?=base_url().'themes/img/'.$u_photo?>" class="img-fluid mr-2" alt="avatar">
								<div class="media-body">
									<h5><?=$u_name?></h5>
									<p>
										<?php if ($u_role == 1): ?>
											Admin
											<?php else: ?>
												Customer
										<?php endif ?>
									</p>
								</div>
							</div>
						</div>
						<?php $this->load->view('admin/profiledrop') ?>
					</div>
				</li>
			</ul>
		</header>
	</div>

	<div class="main-container" id="container">
		<div class="overlay"></div>
		<div class="cs-overlay"></div>
		<div class="search-overlay"></div>
		<div class="sidebar-wrapper sidebar-theme">
			<nav id="compactSidebar">
				<div class="theme-logo">
					<a href="<?=base_url('admin/dashboard')?>">
						<img src="<?=base_url('fav-icon.ico')?>" class="navbar-logo" alt="logo">
					</a>
				</div>
				<ul class="menu-categories">
					<li class="menu">
						<a href="#dashboard" data-active="false" class="menu-toggle">
							<div class="base-menu">
								<div class="base-icons">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
								</div>
							</div>
						</a>
						<div class="tooltip"><span>Dashboard</span></div>
					</li>

					<li class="menu">
						<a href="#app" data-active="false" class="menu-toggle">
							<div class="base-menu">
								<div class="base-icons">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
								</div>
							</div>
						</a>
						<div class="tooltip"><span>Apps</span></div>
					</li>
					<li class="menu">
						<a href="#forms" data-active="false" class="menu-toggle">
							<div class="base-menu">
								<div class="base-icons">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
								</div>
							</div>
						</a>
						<div class="tooltip"><span>Data Karyawan</span></div>
					</li>
					<li class="menu">
						<a href="#users" data-active="false" class="menu-toggle">
							<div class="base-menu">
								<div class="base-icons">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
								</div>
							</div>
						</a>
						<div class="tooltip"><span>Users</span></div>
					</li>
				</ul>
			</nav>

			<div id="compact_submenuSidebar" class="submenu-sidebar">
				<div class="theme-brand-name">
					<a href="<?=base_url('admin/dashboard')?>"><?php echo APPS_NAME ?></a>
				</div>
				<div class="submenu" id="dashboard">
					<div class="category-info">
						<h5>Dashboard</h5>
					</div>
					<ul class="submenu-list" data-parent-element="#dashboard"> 
						<li>
							<a href="<?=base_url('admin/dashboard')?>"> <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> Panel Admin</a>
						</li>
						<li>
							<a href="<?=base_url('cs/dashboard')?>"> <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> Panel CS</a>
						</li>
					</ul>
				</div>
				<div class="submenu" id="app">
					<div class="category-info">
						<h5>Apps</h5>
					</div>
					<ul class="submenu-list" data-parent-element="#app"> 
						<li>
							<a href="<?=base_url('admin/device')?>"> <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> Device</a>
						</li>
					</ul>
				</div>
				<div class="submenu" id="forms">
					<div class="category-info">
						<h5>Data Karyawan</h5>
					</div>
					<ul class="submenu-list" data-parent-element="#forms">
						<li>
							<a href="<?=base_url('admin/data=master')?>"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> Master Data</a>
						</li>
						<li>
							<a href="<?=base_url('admin/data=jabatan')?>"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> Jabatan</a>
						</li>
					</ul>
				</div>
				<div class="submenu" id="users">
					<div class="category-info">
						<h5>Users</h5>
					</div>
					<ul class="submenu-list" data-parent-element="#users">
						<li>
							<a href="<?=base_url('admin/data=users')?>"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> CS Users </a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div id="content" class="main-content">
			<div class="layout-px-spacing">
				<div class="row layout-spacing">
					<div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">
						<div class="user-profile layout-spacing">
							<div class="widget-content widget-content-area">
								<div class="d-flex justify-content-between">
									<h3 class="">Apps Info</h3>
									<a class="mt-2 edit-profile"></a>
								</div>
								<div class="text-center user-info">
									<img src="<?=base_url().'fav-icon.png'?>" width="50%" alt="avatar">
									<p class=""><?php echo APPS_NAME ?></p>
								</div>
								<div class="user-info-list">
									<div class="">
										<ul class="contacts-block list-unstyled">
											<li class="contacts-block__item">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-monitor"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg> Version <b style="color: red"><?php echo APPS_VERSI ?></b>
											</li>
											<li class="contacts-block__item">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg> APPS CODE <b style="color: red"><?php echo $value['apps_id'] ?></b>
											</li>
										</ul>
									</div>                                    
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">
						<div class="bio layout-spacing ">
							<div class="widget-content widget-content-area">
								<h3 class="">Bio</h3>
								<div class="bio-skill-box">
									<div class="row">
										<div class="col-12 col-xl-6 col-lg-12 mb-xl-5 mb-5 ">
											<div class="d-flex b-skills">
												<div>
												</div>
												<div class="">
													<h5>Apps API</h5>
													<p>
														<?php
														echo crypt($apps_api);
														?>
													</p>
													<span style="color: red"> Server Link Di-Enkripsi</span>
												</div>
											</div>
										</div>
										<div class="col-12 col-xl-6 col-lg-12 mb-xl-5 mb-5 ">
											<div class="d-flex b-skills">
												<div>
												</div>
												<div class="">
													<h5>Token Key</h5>
													<p>
														<?php
														echo crypt($apps_token);
														?>
													</p>
													<span style="color: red"> Token Anda Di-Enkripsi</span>
												</div>
											</div>
										</div>
										<div class="col-12 col-xl-6 col-lg-12 mb-xl-0 mb-5 ">
											<div class="d-flex b-skills">
												<div>
												</div>
												<div class="">
													<h5>Device Key</h5>
													<p>
														<?php
														echo crypt($apps_devicekey);
														?>
													</p>
													<span style="color: red"> Token Anda Di-Enkripsi</span>
												</div>
											</div>
										</div>
										<div class="col-12 col-xl-6 col-lg-12 mb-xl-0 mb-0 ">
											<div class="d-flex b-skills">
												<div>
												</div>
												<div class="">
													<h5>Last Update</h5>
													<p>
														<?php
														$hari = date ("D");
														switch($hari){
															case 'Sun':
															$hari_ini = "Minggu";
															break;

															case 'Mon':			
															$hari_ini = "Senin";
															break;

															case 'Tue':
															$hari_ini = "Selasa";
															break;

															case 'Wed':
															$hari_ini = "Rabu";
															break;

															case 'Thu':
															$hari_ini = "Kamis";
															break;

															case 'Fri':
															$hari_ini = "Jumat";
															break;

															case 'Sat':
															$hari_ini = "Sabtu";
															break;

															default:
															$hari_ini = "Tidak di ketahui";		
															break;
														} ?>
														<?php echo $hari_ini; ?>
														<?=date('d M Y - H:i:s',strtotime($apps_update))?>
													</p>
													<span style="color: red"> Update Terakhir</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>                                
						</div>
					</div>
				</div>
			</div>
			<?php $this->load->view('admin/footer') ?>
		</div>
	</div>
	<script src="<?=base_url('themes/admin/assets/js/libs/jquery-3.1.1.min.js')?>"></script>
	<script src="<?=base_url('themes/admin/bootstrap/js/popper.min.js')?>"></script>
	<script src="<?=base_url('themes/admin/bootstrap/js/bootstrap.min.js')?>"></script>
	<script src="<?=base_url('themes/admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js')?>"></script>
	<script src="<?=base_url('themes/admin/assets/js/app.js')?>"></script>

	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
	<script src="<?=base_url('themes/admin/assets/js/custom.js')?>"></script>
	<!-- END GLOBAL MANDATORY SCRIPTS -->
</body>
</html>