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
	<title><?php echo APPS_NAME ?> - Admin Profile </title>
	<link rel="icon" type="image/x-icon" href="<?=base_url('fav-icon.ico')?>"/>
	<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
	<link href="<?=base_url('themes/admin/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
	<link href="<?=base_url('themes/admin/assets/css/plugins.css')?>" rel="stylesheet" type="text/css" />
	<link href="<?=base_url('themes/admin/assets/css/users/user-profile.css')?>" rel="stylesheet" type="text/css" />
	<link href="/themes/admin/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/themes/admin/assets/css/forms/theme-checkbox-radio.css">
    <link href="/themes/admin/assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/themes/font-awesome/css/font-awesome.min.css">
</head>
<body class="sidebar-noneoverflow">
	<div class="header-container fixed-top">
		<header class="header navbar navbar-expand-sm">
			<ul class="navbar-item flex-row">
				<li class="nav-item align-self-center page-heading">
					<div class="page-header">
						<div class="page-title">
							<h3>Setting</h3>
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
				<div class="row layout-spacing">
					<div class="col-xl-12 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">
						<div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Update List</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-4">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th class="text-center">Status</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Server API</td>
                                                    <?php if ($apps_api != $value['apps_link']): ?>
                                                    	<td class="text-center"><span style="font-style: bold" class="text-danger"><b>Update Now</b></span></td>
                                                    	<?php else: ?>
                                                    		<td class="text-center"><span class="text-success"><b>Updated</b></span></td>
                                                    <?php endif ?>
                                                    <?php if ($apps_api != $value['apps_link']): ?>
                                                    	<td class="text-center"><a href="<?=base_url('update/ServerAPI')?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-ccw"><polyline points="1 4 1 10 7 10"></polyline><polyline points="23 20 23 14 17 14"></polyline><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path></svg></a></td>
                                                    	<?php else: ?>
                                                    		<td class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></td>
                                                    <?php endif ?>
                                                </tr>
                                                <tr>
                                                    <td>Server Token</td>
                                                    <?php if ($apps_token != NULL): ?>
                                                    	<td class="text-center"><span class="text-success"><b>Completed</b></span></td>
                                                    	<?php else: ?>
                                                    		<td class="text-center"><span class="text-danger"><b>In-Completed</b></span></td>
                                                    <?php endif ?>
                                                    <td class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></td>
                                                </tr>
                                                <tr>
                                                    <td>Server DeviceKey</td>
                                                    <?php if ($apps_devicekey != NULL): ?>
                                                    	<td class="text-center"><span class="text-success"><b>Completed</b></span></td>
                                                    	<?php else: ?>
                                                    		<td class="text-center"><span class="text-danger"><b>In-Completed</b></span></td>
                                                    <?php endif ?>
                                                    <td class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></td>
                                                </tr>
                                            </tbody>
                                        </table>
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