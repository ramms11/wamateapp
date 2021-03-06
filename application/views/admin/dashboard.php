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
$api = file_get_contents('https://cintarest.helenscloud.web.id/apps?apps_id=4957124436');
foreach (json_decode($api, TRUE) as $key => $value)
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<title><?php echo APPS_NAME ?> - Admin Dashboard </title>
	<link rel="icon" type="image/x-icon" href="<?=base_url('fav-icon.ico')?>"/>
	<link href="<?=base_url('themes/admin/assets/css/loader.css')?>" rel="stylesheet" type="text/css" />
	<script src="<?=base_url('themes/admin/assets/js/loader.js')?>"></script>
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
	<link href="<?=base_url('themes/admin/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
	<link href="<?=base_url('themes/admin/assets/css/plugins.css')?>" rel="stylesheet" type="text/css" />
	<link href="<?=base_url('themes/admin/plugins/apex/apexcharts.css')?>" rel="stylesheet" type="text/css">
	<link href="<?=base_url('themes/admin/assets/css/dashboard/dash_2.css')?>" rel="stylesheet" type="text/css" class="dashboard-sales" />
</head>
<body class="sidebar-noneoverflow dashboard-sales">
	<div id="load_screen">
		<div class="loader">
			<div class="loader-content">
				<div class="spinner-grow align-self-center"></div>
			</div>
		</div>
	</div>
	<div class="header-container fixed-top">
		<header class="header navbar navbar-expand-sm">
			<ul class="navbar-item flex-row">
				<li class="nav-item align-self-center page-heading">
					<div class="page-header">
						<div class="page-title">
							<h3>Dashboard Admin</h3>
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
		<div class="search-overlay"></div>
		<div class="sidebar-wrapper sidebar-theme">
			<nav id="compactSidebar">
				<div class="theme-logo">
					<a href="<?=base_url('admin/dashboard')?>">
						<img src="<?=base_url('fav-icon.ico')?>" class="navbar-logo" alt="logo">
					</a>
				</div>
				<ul class="menu-categories">
					<li class="menu active">
						<a href="#dashboard" data-active="true" class="menu-toggle">
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
					<a href="index.html"><?php echo APPS_NAME ?></a>
				</div>
				<div class="submenu" id="dashboard">
					<div class="category-info">
						<h5>Dashboard</h5>
					</div>
					<ul class="submenu-list" data-parent-element="#dashboard"> 
						<li class="active">
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
						<li>
							<a href="<?=base_url('admin/qrcode')?>"> <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> QrCode</a>
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
						<li>
							<a href="<?=base_url('admin/data=add')?>"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> Make CS Users</a>
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
				<div class="row layout-top-spacing">
					<div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
						<div class="widget widget-account-invoice-one">
							<div class="widget-heading">
								<h5 class="">Website Info</h5>
							</div>
							<div class="widget-content">
								<div class="invoice-box">
									<div class="acc-total-info">
										<h5>Nama Perusahaan</h5>
										<p class="acc-amount"><?=$apps_corp?></p>
									</div>

									<div class="inv-detail">                                    
										<div class="info-detail-1">
											<p>Company email</p>
											<p><?=$apps_email?></p>
										</div>
										<div class="info-detail-2">
											<p>APPS Name</p>
											<p><?php echo APPS_NAME ?></p>
										</div>
										<div class="info-detail-2">
											<p>APPS Version</p>
											<p><?php echo APPS_VERSI ?></p>
										</div>
									</div>
									<div class="inv-detail">
										<div class="acc-total-info">
											<h5>Apps Detail</h5>
										</div>
										<div class="info-detail-2">
											<p>APPS Code</p>
											<p><?php echo $value['apps_id'] ?></p>
										</div>
										<div class="info-detail-2">
											<p>APPS Version</p>
											<p><?php echo $value['apps_version'] ?></p>
										</div>
									</div>

									<div class="inv-action">
										<a href="" class="btn btn-outline-dark">Summary</a>
										<?php if (APPS_VERSI < $value['apps_version']): ?>
											
											<a href="" class="btn btn-success">Update</a>
										<?php endif ?>
									</div>
								</div>
							</div>

						</div>
					</div>
					<div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
						<div class="widget widget-table-two">
							<div class="widget-heading">
								<h5 class="">Recent Users</h5>
							</div>
							<div class="widget-content">
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th><div class="th-content">Customer</div></th>
												<th><div class="th-content">Username</div></th>
												<th><div class="th-content">Status</div></th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($DataUsers->result() as $du): ?>
												<tr>
													<?php 
                                                    $query=$this->db->get_where('karyawan', array('k_id' => $du->u_kid));
                                                    if ($query->num_rows()>0) {
                                                        $row = $query->row_array();
                                                        $nama = $row['k_nama'];
                                                    }
                                                    ?>
													<td><div class="td-content customer-name"><img src="<?=base_url().'themes/img/'.$du->u_photo?>" alt="avatar"><?=$nama?></div></td>
													<td><div class="td-content product-brand"><?=$du->u_name?></div></td>
													<?php if ($du->u_stat != 1): ?>
														<td><div class="td-content"><span class="badge outline-badge-danger">Deactive</span></div></td>
														<?php else: ?>
															<td><div class="td-content"><span class="badge outline-badge-success">Active</span></div></td>
													<?php endif ?>
												</tr>
											<?php endforeach;?>
										</tbody>
									</table>
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

	<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
	<script src="<?=base_url('themes/admin/plugins/apex/apexcharts.min.js')?>"></script>
	<script src="<?=base_url('themes/admin/assets/js/dashboard/dash_2.js')?>"></script>    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>