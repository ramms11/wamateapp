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
    <title><?php echo APPS_NAME ?> - Master Data </title>
    <link rel="icon" type="image/x-icon" href="<?=base_url('fav-icon.ico')?>"/>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="/themes/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/themes/admin/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="/themes/admin/plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/themes/admin/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="/themes/admin/plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="/themes/admin/plugins/table/datatable/dt-global_style.css">
    <link href="/themes/admin/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="/themes/admin/assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" /><link rel="stylesheet" href="/themes/font-awesome/css/font-awesome.min.css">
</head>
<body class="sidebar-noneoverflow">
	<div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-item flex-row">
                <li class="nav-item align-self-center page-heading">
                    <div class="page-header">
                        <div class="page-title">
                            <h3>Master Data</h3>
                        </div>
                    </div>
                </li>
            </ul>
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg></a>

            <ul class="navbar-item flex-row search-ul"></ul>

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
                        <a href="#forms" data-active="true" class="menu-toggle">
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
                        <h5>Jabatan</h5>
                    </div>
                    <ul class="submenu-list" data-parent-element="#forms">
                        <li class="active">
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
            	<div class="row layout-top-spacing" id="cancel-row">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <a data-toggle="modal" data-target="#AddKaryawan" class="btn btn-dark btn-lg"> + Add</a>
                        <div class="widget-content widget-content-area br-6">
                            <div class="table-responsive mb-4 mt-4">
                                <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Jenis Kelamin</th>
                                            <th>TTL</th>
                                            <th>Status</th>
                                            <th>IS Users</th>
                                            <th>Avatar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($DataMaster->result() as $dm): ?>
                                            <tr>
                                                <td><?=$dm->k_nama?></td>
                                                <td>
                                                    <?php 
                                                    $query=$this->db->get_where('jabatan', array('j_id' => $dm->k_jabatan));
                                                    if ($query->num_rows()>0) {
                                                        $row = $query->row_array();
                                                        echo $row['j_nama'];
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php if ($dm->k_jk != 1): ?>
                                                        Perempuan
                                                        <?php else: ?>
                                                            Laki - Laki
                                                    <?php endif ?>
                                                </td>
                                                <td>
                                                    <?=$dm->k_kota?>, <?=date('d-M-Y',strtotime($dm->k_lahir))?>
                                                </td>
                                                <td>
                                                    <?php if ($dm->k_status != 1): ?>
                                                        <span style="color: red">Non-Aktif</span>
                                                        <?php else: ?>
                                                            <span style="color: green">Aktif</span>
                                                    <?php endif ?>
                                                </td>
                                                <td>
                                                    <?php 
                                                    $query=$this->db->get_where('users', array('u_kid' => $dm->k_id));
                                                    if ($query->num_rows()>0) { ?>
                                                        <span title="Memiliki Users Login CS" style="color: green"><i class="fa fa-check" aria-hidden="true"></i></span>
                                                    <?php } else { ?>
                                                        <span title="Tidak Memiliki Users Login CS" style="color: red"><i class="fa fa-times" aria-hidden="true"></i></span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <?php  
                                                    $query=$this->db->get_where('users', array('u_kid' => $dm->k_id));
                                                    if ($query->num_rows()>0) {
                                                        $row = $query->row_array();
                                                        $photo = $row['u_photo'];
                                                    }else{
                                                        if ($dm->k_jk != '1') {
                                                            $photo = "pr.png";
                                                        }else{
                                                            $photo = "lk.png";
                                                        }
                                                    }
                                                    ?>
                                                    <div class="d-flex">
                                                        <div class="usr-img-frame mr-2 rounded-circle">
                                                            <img alt="avatar" class="img-fluid rounded-circle" src="<?=base_url().'themes/img/'.$photo?>">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-dark btn-sm">Actions</button>
                                                        <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
                                                            <?php if ($dm->k_status != 1): ?>
                                                                <a class="dropdown-item" href="<?=base_url().'admin/data/enable_id='.$dm->k_id?>">Aktifkan</a>
                                                                <?php else: ?>
                                                                    <a class="dropdown-item" href="<?=base_url().'admin/data/disable_id='.$dm->k_id?>">Nonaktifkan</a>
                                                            <?php endif ?>
                                                            <a class="dropdown-item" href="#">Hapus Data</a>
                                                            <a class="dropdown-item" href="#">Edit Data</a>
                                                            <div class="dropdown-divider"></div>
                                                            <?php
                                                            $query=$this->db->get_where('users', array('u_kid' => $dm->k_id));
                                                            if ($query->num_rows()>0) { ?>
                                                                <a class="dropdown-item" href="<?=base_url().'admin/data/DelCS='.$dm->k_id?>">Hapus CS</a>
                                                            <?php }else{?>
                                                                <a class="dropdown-item" data-toggle="modal" data-target="#AddCS<?=$dm->k_id?>">Jadikan CS</a>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                        <?php foreach($DataMaster->result() as $dm): ?>
                                            <div class="modal fade" id="AddCS<?=$dm->k_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Jadikan <?=$dm->k_nama?> CS?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                            </button>
                                                        </div>
                                                        <form action="<?=base_url().'admin/data/AddCS='.$dm->k_id?>" method="POST" autocomplete="off">
                                                            <div class="modal-body">
                                                                <input type="text" placeholder="Input Email" name="email" class="form-control">
                                                                <span>Mohon Masukan Email Yang Valid <span style="color: red"> Data Login Akan Dikirim melalui email</span></span>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('admin/footer') ?>
        </div>
        <div class="modal fade" id="AddKaryawan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Karyawan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </button>
                    </div>
                    <form action="<?=base_url('admin/data/inputKaryawan')?>" method="POST" autocomplete="off">
                        <div class="modal-body">
                            <div class="form-group">
                                <p>Nama Lengkap</p>
                                <input id="p-text" type="text" name="k_nama" placeholder="Nama Lengkap" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <p>Jenis Kelamin</p>
                                <select class="form-control" required name="k_jk">
                                    <option>-- Pilih Jenis Kelamin --</option>
                                    <option value="1">Laki - Laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <p>Phone Number</p>
                                <input id="p-text" type="number" name="k_phone" placeholder="Nomer Handphone" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <p>Tempat Lahir</p>
                                <input id="p-text" type="text" name="k_kota" placeholder="Tempat Lahir" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <p>Tanggal Lahir</p>
                                <input id="p-text" type="date" name="k_lahir" placeholder="Tempat Lahir" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <p>Jabatan</p>
                                <select class="form-control" required name="k_jabatan">
                                    <option>-- Pilih Jabatan --</option>
                                    <?php foreach($DataJabatan->result() as $dj): ?>
                                        <option value="<?=$dj->j_id?>"><?=$dj->j_nama?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="/themes/admin/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="/themes/admin/bootstrap/js/popper.min.js"></script>
    <script src="/themes/admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="/themes/admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/themes/admin/assets/js/app.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="/themes/admin/assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="/themes/admin/plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="/themes/admin/plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="/themes/admin/plugins/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="/themes/admin/plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="/themes/admin/plugins/table/datatable/button-ext/buttons.print.min.js"></script>
    <script>
        $('#html5-extension').DataTable( {
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            buttons: {
                buttons: [
                    { extend: 'copy', className: 'btn' },
                    { extend: 'csv', className: 'btn' },
                    { extend: 'excel', className: 'btn' },
                    { extend: 'print', className: 'btn' }
                ]
            },
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7 
        } );
    </script>
</body>
</html>