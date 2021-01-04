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
$query=$this->db->get_where('karyawan', array('k_id' => $u_kid));
if ($query->num_rows()>0) {
	$row = $query->row_array();
	$k_nama = $row['k_nama'];
	$k_jabatan = $row['k_jabatan'];
}
$query=$this->db->get_where('jabatan', array('j_id' => $k_jabatan));
if ($query->num_rows()>0) {
	$row = $query->row_array();
	$j_nama = $row['j_nama'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Chat | Customer Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Helens Developer" name="author" />
	<link rel="icon" type="image/x-icon" href="<?=base_url('fav-icon.ico')?>"/>
	<link href="assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="/themes/assets/libs/owl.carousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="/themes/assets/libs/owl.carousel/assets/owl.theme.default.min.css">
	<link href="/themes/assets/css/bootstrap-dark.min.css" id="bootstrap-dark-style" rel="stylesheet" type="text/css" />
	<link href="/themes/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
	<link href="/themes/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<link href="/themes/assets/css/app-dark.min.css" id="app-dark-style" rel="stylesheet" type="text/css" />
	<link href="/themes/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="layout-wrapper d-lg-flex">
		<div class="side-menu flex-lg-column mr-lg-1">
			<div class="navbar-brand-box">
				<a href="" class="logo logo-dark">
					<span class="logo-sm">
						<img src="<?=base_url('fav-icon.ico')?>" alt="" height="30">
					</span>
				</a>
				<a href="" class="logo logo-light">
					<span class="logo-sm">
						<img src="<?=base_url('fav-icon.ico')?>" alt="" height="30">
					</span>
				</a>
			</div>
			<div class="flex-lg-column my-auto">
				<ul class="nav nav-pills side-menu-nav justify-content-center" role="tablist">
					<li class="nav-item" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="Profile">
						<a class="nav-link active" id="pills-user-tab" data-toggle="pill" href="#pills-user" role="tab">
							<i class="ri-user-2-line"></i>
						</a>
					</li>
					<li class="nav-item" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="Chats">
						<a class="nav-link" id="pills-chat-tab" data-toggle="pill" href="#pills-chat" role="tab">
							<i class="ri-message-3-line"></i>
						</a>
					</li>
					<li class="nav-item" data-toggle="tooltip" data-trigger="hover" data-placement="top" title="Settings">
						<a class="nav-link" id="pills-setting-tab" data-toggle="pill" href="#pills-setting" role="tab">
							<i class="ri-settings-2-line"></i>
						</a>
					</li>
					<li class="nav-item dropdown profile-user-dropdown d-inline-block d-lg-none">
						<a class="nav-link dropdown-toggle" href="javascript: void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img src="assets/images/users/avatar-1.jpg" alt="" class="profile-user rounded-circle">
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="#">Profile <i class="ri-profile-line float-right text-muted"></i></a>
							<a class="dropdown-item" href="#">Setting <i class="ri-settings-3-line float-right text-muted"></i></a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">Log out <i class="ri-logout-circle-r-line float-right text-muted"></i></a>
						</div>
					</li>
				</ul>
			</div>
			<div class="flex-lg-column d-none d-lg-block">
				<ul class="nav side-menu-nav justify-content-center">
					<li class="nav-item">
						<a class="nav-link" id="light-dark" href="#" data-toggle="tooltip" data-trigger="hover" data-placement="right" title="Dark / Light Mode">
							<i class="ri-sun-line theme-mode-icon"></i>
						</a>
					</li>

					<li class="nav-item btn-group dropup profile-user-dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img src="<?=base_url().'themes/img/'.$u_photo?>" alt="" class="profile-user rounded-circle">
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="#">Log out <i class="ri-logout-circle-r-line float-right text-muted"></i></a>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<div class="chat-leftsidebar mr-lg-1">
			<div class="tab-content">
				<div class="tab-pane fade show active" id="pills-user" role="tabpanel" aria-labelledby="pills-user-tab"><div>
					<div class="px-4 pt-4">
						<h4 class="mb-0">My Profile</h4>
					</div>
					<div class="text-center p-4 border-bottom">
						<div class="mb-4">
							<img src="<?=base_url().'themes/img/'.$u_photo?>" class="rounded-circle avatar-lg img-thumbnail" alt="">
						</div>
						<h5 class="font-size-16 mb-1 text-truncate"><?=ucwords($u_name)?></h5>
					</div>
					<div class="p-4 user-profile-desc" data-simplebar>
						<div id="profile-user-accordion-1" class="custom-accordion">
							<div class="card shadow-none border mb-2">
								<a href="#profile-user-collapseOne" class="text-dark" data-toggle="collapse" aria-expanded="true" aria-controls="profile-user-collapseOne">
									<div class="card-header" id="profile-user-headingOne">
										<h5 class="font-size-14 m-0">
											<i class="ri-user-2-line mr-2 align-middle d-inline-block"></i> About
											<i class="mdi mdi-chevron-up float-right accor-plus-icon"></i>
										</h5>
									</div>
								</a>
								<div id="profile-user-collapseOne" class="collapse show" aria-labelledby="profile-user-headingOne" data-parent="#profile-user-accordion-1">
									<div class="card-body">
										<div>
											<p class="text-muted mb-1">Name</p>
											<h5 class="font-size-14"><?=$k_nama?></h5>
										</div>
										<div class="mt-4">
											<p class="text-muted mb-1">Email</p>
											<h5 class="font-size-14"><?=$u_email?></h5>
										</div>
										<div class="mt-4">
											<p class="text-muted mb-1">Time</p>
											<h5 class="font-size-14" id="timestamp"></h5>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

			<!-- <div class="tab-pane" id="pills-chat" role="tabpanel" aria-labelledby="pills-chat-tab">
				<div>
					<div class="px-4 pt-4">
						<h4 class="mb-4">Chats</h4>
						<div class="search-box chat-search-box">
							<div class="input-group mb-3 bg-light  input-group-lg rounded-lg">
								<div class="input-group-prepend">
									<button class="btn btn-link text-muted pr-1 text-decoration-none" type="button">
										<i class="ri-search-line search-icon font-size-18"></i>
									</button>
								</div>
								<input type="text" class="form-control bg-light" placeholder="Search messages or users">
							</div>
						</div>
					</div>
					<div class="px-4 pb-4" dir="ltr">

						<div class="owl-carousel owl-theme" id="user-status-carousel">
							<div class="item">
								<a href="#" class="user-status-box">
									<div class="avatar-xs mx-auto d-block chat-user-img online">
										<img src="assets/images/users/avatar-2.jpg" alt="user-img" class="img-fluid rounded-circle">
										<span class="user-status"></span>
									</div>

									<h5 class="font-size-13 text-truncate mt-3 mb-1">Patrick</h5>
								</a>
							</div>
							<div class="item">
								<a href="#" class="user-status-box">
									<div class="avatar-xs mx-auto d-block chat-user-img online">
										<img src="assets/images/users/avatar-4.jpg" alt="user-img" class="img-fluid rounded-circle">
										<span class="user-status"></span>
									</div>

									<h5 class="font-size-13 text-truncate mt-3 mb-1">Doris</h5>
								</a>
							</div>

							<div class="item">
								<a href="#" class="user-status-box">
									<div class="avatar-xs mx-auto d-block chat-user-img online">
										<img src="assets/images/users/avatar-5.jpg" alt="user-img" class="img-fluid rounded-circle">
										<span class="user-status"></span>
									</div>

									<h5 class="font-size-13 text-truncate mt-3 mb-1">Emily</h5>
								</a>
							</div>

							<div class="item">
								<a href="#" class="user-status-box">
									<div class="avatar-xs mx-auto d-block chat-user-img online">
										<img src="assets/images/users/avatar-6.jpg" alt="user-img" class="img-fluid rounded-circle">
										<span class="user-status"></span>
									</div>

									<h5 class="font-size-13 text-truncate mt-3 mb-1">Steve</h5>
								</a>
							</div>

							<div class="item">
								<a href="#" class="user-status-box">
									<div class="avatar-xs mx-auto d-block chat-user-img online">
										<span class="avatar-title rounded-circle bg-soft-primary text-primary">
											T
										</span>
										<span class="user-status"></span>
									</div>

									<h5 class="font-size-13 text-truncate mt-3 mb-1">Teresa</h5>
								</a>
							</div>

						</div>
					</div>
					<div class="px-2">
						<h5 class="mb-3 px-3 font-size-16">Recent</h5>

						<div class="chat-message-list" data-simplebar>

							<ul class="list-unstyled chat-list chat-user-list">
								<li>
									<a href="#">
										<div class="media">

											<div class="chat-user-img online align-self-center mr-3">
												<img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-xs" alt="">
												<span class="user-status"></span>
											</div>

											<div class="media-body overflow-hidden">
												<h5 class="text-truncate font-size-15 mb-1">Patrick Hendricks</h5>
												<p class="chat-user-message text-truncate mb-0">Hey! there I'm available</p>
											</div>
											<div class="font-size-11">05 min</div>
										</div>
									</a>
								</li>

								<li class="unread">
									<a href="#">
										<div class="media">
											<div class="chat-user-img away align-self-center mr-3">
												<img src="assets/images/users/avatar-3.jpg" class="rounded-circle avatar-xs" alt="">
												<span class="user-status"></span>
											</div>
											<div class="media-body overflow-hidden">
												<h5 class="text-truncate font-size-15 mb-1">Mark Messer</h5>
												<p class="chat-user-message text-truncate mb-0"><i class="ri-image-fill align-middle mr-1"></i> Images</p>
											</div>
											<div class="font-size-11">12 min</div>

											<div class="unread-message">
												<span class="badge badge-soft-danger badge-pill">02</span>
											</div>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="media">
											<div class="chat-user-img align-self-center mr-3">
												<div class="avatar-xs">
													<span class="avatar-title rounded-circle bg-soft-primary text-primary">
														G
													</span>
												</div>
											</div>
											<div class="media-body overflow-hidden">
												<h5 class="text-truncate font-size-15 mb-1">General</h5>
												<p class="chat-user-message text-truncate mb-0">This theme is awesome!</p>
											</div>
											<div class="font-size-11">20 min</div>
										</div>
									</a>
								</li>

								<li class="active">
									<a href="#">
										<div class="media">
											<div class="chat-user-img online align-self-center mr-3">
												<img src="assets/images/users/avatar-4.jpg" class="rounded-circle avatar-xs" alt="">
												<span class="user-status"></span>
											</div>
											<div class="media-body overflow-hidden">
												<h5 class="text-truncate font-size-15 mb-1">Doris Brown</h5>
												<p class="chat-user-message text-truncate mb-0">Nice to meet you</p>
											</div>
											<div class="font-size-11">10:12 AM</div>

										</div>
									</a>
								</li>
								<li class="unread">
									<a href="#">
										<div class="media">
											<div class="chat-user-img align-self-center mr-3">
												<div class="avatar-xs">
													<span class="avatar-title rounded-circle bg-soft-primary text-primary">
														D
													</span>
												</div>
											</div>
											<div class="media-body overflow-hidden">
												<h5 class="text-truncate font-size-15 mb-1">Designer</h5>
												<p class="chat-user-message text-truncate mb-0">Next meeting tomorrow 10.00AM</p>
											</div>
											<div class="font-size-11">12:01 PM</div>
											<div class="unread-message">
												<span class="badge badge-soft-danger badge-pill">01</span>
											</div>
										</div>
									</a>
								</li>
								<li>
									<a href="#">
										<div class="media">
											<div class="chat-user-img away align-self-center mr-3">
												<img src="assets/images/users/avatar-6.jpg" class="rounded-circle avatar-xs" alt="">
												<span class="user-status"></span>
											</div>
											<div class="media-body overflow-hidden">
												<h5 class="text-truncate font-size-15 mb-1">Steve Walker</h5>
												<p class="chat-user-message text-truncate mb-0"><i class="ri-file-text-fill align-middle mr-1"></i> Admin-A.zip</p>
											</div>
											<div class="font-size-11">03:20 PM</div>

										</div>
									</a>
								</li>
								<li class="typing">
									<a href="#">
										<div class="media">
											<div class="chat-user-img align-self-center online mr-3">
												<div class="avatar-xs">
													<span class="avatar-title rounded-circle bg-soft-primary text-primary">
														A
													</span>
												</div>
												<span class="user-status"></span>
											</div>
											<div class="media-body overflow-hidden">
												<h5 class="text-truncate font-size-15 mb-1">Albert Rodarte</h5>
												<p class="chat-user-message text-truncate mb-0">typing<span class="animate-typing">
													<span class="dot"></span>
													<span class="dot"></span>
													<span class="dot"></span>
												</span>
											</p>
										</div>
										<div class="font-size-11">04:56 PM</div>
									</div>
								</a>
							</li>

							<li>
								<a href="#">
									<div class="media">
										<div class="chat-user-img align-self-center online mr-3">
											<div class="avatar-xs">
												<span class="avatar-title rounded-circle bg-soft-primary text-primary">
													M
												</span>
											</div>
											<span class="user-status"></span>
										</div>
										<div class="media-body overflow-hidden">
											<h5 class="text-truncate font-size-15 mb-1">Mirta George</h5>
											<p class="chat-user-message text-truncate mb-0">Yeah everything is fine</p>
										</div>
										<div class="font-size-11">12/07</div>

									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<div class="media">
										<div class="chat-user-img away align-self-center mr-3">
											<img src="assets/images/users/avatar-7.jpg" class="rounded-circle avatar-xs" alt="">
											<span class="user-status"></span>
										</div>
										<div class="media-body overflow-hidden">
											<h5 class="text-truncate font-size-15 mb-1">Paul Haynes</h5>
											<p class="chat-user-message text-truncate mb-0">Good morning</p>
										</div>
										<div class="font-size-11">12/07</div>

									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<div class="media">
										<div class="chat-user-img align-self-center online mr-3">
											<div class="avatar-xs">
												<span class="avatar-title rounded-circle bg-soft-primary text-primary">
													J
												</span>
											</div>
											<span class="user-status"></span>
										</div>
										<div class="media-body overflow-hidden">
											<h5 class="text-truncate font-size-15 mb-1">Jonathan Miller</h5>
											<p class="chat-user-message text-truncate mb-0">Hi, How are you?</p>
										</div>
										<div class="font-size-11">12/07</div>

									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<div class="media">
										<div class="chat-user-img away align-self-center mr-3">
											<img src="assets/images/users/avatar-8.jpg" class="rounded-circle avatar-xs" alt="">
											<span class="user-status"></span>
										</div>
										<div class="media-body overflow-hidden">
											<h5 class="text-truncate font-size-15 mb-1">Ossie Wilson</h5>
											<p class="chat-user-message text-truncate mb-0">I've finished it! See you so</p>
										</div>
										<div class="font-size-11">11/07</div>

									</div>
								</a>
							</li>
							<li>
								<a href="#">
									<div class="media">
										<div class="chat-user-img align-self-center online mr-3">
											<div class="avatar-xs">
												<span class="avatar-title rounded-circle bg-soft-primary text-primary">
													S
												</span>
											</div>
											<span class="user-status"></span>
										</div>
										<div class="media-body overflow-hidden">
											<h5 class="text-truncate font-size-15 mb-1">Sara Muller</h5>
											<p class="chat-user-message text-truncate mb-0">Wow that's great</p>
										</div>
										<div class="font-size-11">11/07</div>

									</div>
								</a>
							</li>


						</ul>
					</div>

				</div>
				<!-- End chat-message-list
			</div>
			Start chats content -->
		<!-- </div> -->
		<div class="tab-pane" id="pills-setting" role="tabpanel" aria-labelledby="pills-setting-tab"> <div>
			<div class="px-4 pt-4">
				<h4 class="mb-0">Settings</h4>
			</div>
			<div class="text-center border-bottom p-4">
				<div class="mb-4 profile-user">
					<img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-lg img-thumbnail" alt="">
					<button type="button" class="btn bg-light avatar-xs p-0 rounded-circle profile-photo-edit">
						<i class="ri-pencil-fill"></i>
					</button>
				</div>

				<h5 class="font-size-16 mb-1 text-truncate">Patricia Smith</h5>
				<div class="dropdown d-inline-block mb-1">
					<a class="text-muted dropdown-toggle pb-1 d-block" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Available <i class="mdi mdi-chevron-down"></i>
					</a>

					<div class="dropdown-menu">
						<a class="dropdown-item" href="#">Available</a>
						<a class="dropdown-item" href="#">Busy</a>
					</div>
				</div>
			</div>
			<!-- End profile user -->

			<!-- Start User profile description -->
			<div class="p-4 user-profile-desc" data-simplebar>

				<div id="profile-setting-accordion" class="custom-accordion">
					<div class="card shadow-none border mb-2">
						<a href="#profile-setting-personalinfocollapse" class="text-dark" data-toggle="collapse" aria-expanded="true" aria-controls="profile-setting-personalinfocollapse">
							<div class="card-header" id="profile-setting-personalinfoheading">
								<h5 class="font-size-14 m-0">
									Personal Info
									<i class="mdi mdi-chevron-up float-right accor-plus-icon"></i>
								</h5>
							</div>
						</a>

						<div id="profile-setting-personalinfocollapse" class="collapse show" aria-labelledby="profile-setting-personalinfoheading" data-parent="#profile-setting-accordion">
							<div class="card-body">

								<div class="float-right">
									<button type="button" class="btn btn-light btn-sm"><i class="ri-edit-fill mr-1 align-middle"></i> Edit</button>
								</div>

								<div>
									<p class="text-muted mb-1">Name</p>
									<h5 class="font-size-14">Patricia Smith</h5>
								</div>

								<div class="mt-4">
									<p class="text-muted mb-1">Email</p>
									<h5 class="font-size-14">adc@123.com</h5>
								</div>

								<div class="mt-4">
									<p class="text-muted mb-1">Time</p>
									<h5 class="font-size-14" id="timestamp"></h5>
								</div>

								<div class="mt-4">
									<p class="text-muted mb-1">Location</p>
									<h5 class="font-size-14 mb-0">California, USA</h5>
								</div>
							</div>
						</div>
					</div>
					<!-- end profile card -->
					<div class="card shadow-none border mb-2">
						<a href="#profile-setting-privacycollapse" class="text-dark collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="profile-setting-privacycollapse">
							<div class="card-header" id="profile-setting-privacyheading">
								<h5 class="font-size-14 m-0">
									Privacy
									<i class="mdi mdi-chevron-up float-right accor-plus-icon"></i>
								</h5>
							</div>
						</a>
						<div id="profile-setting-privacycollapse" class="collapse" aria-labelledby="profile-setting-privacyheading" data-parent="#profile-setting-accordion">
							<div class="card-body">
								<div class="py-3">
									<div class="media align-items-center">
										<div class="media-body overflow-hidden">
											<h5 class="font-size-13 mb-0 text-truncate">Profile photo</h5>

										</div>
										<div class="dropdown ml-2">
											<button class="btn btn-light btn-sm dropdown-toggle w-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Everyone <i class="mdi mdi-chevron-down"></i>
											</button>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Everyone</a>
												<a class="dropdown-item" href="#">selected</a>
												<a class="dropdown-item" href="#">Nobody</a>
											</div>
										</div>
									</div>
								</div>
								<div class="py-3 border-top">
									<div class="media align-items-center">
										<div class="media-body overflow-hidden">
											<h5 class="font-size-13 mb-0 text-truncate">Last seen</h5>

										</div>
										<div class="ml-2">
											<div class="custom-control custom-switch">
												<input type="checkbox" class="custom-control-input" id="privacy-lastseenSwitch" checked>
												<label class="custom-control-label" for="privacy-lastseenSwitch"></label>
											</div>
										</div>
									</div>
								</div>

								<div class="py-3 border-top">
									<div class="media align-items-center">
										<div class="media-body overflow-hidden">
											<h5 class="font-size-13 mb-0 text-truncate">Status</h5>

										</div>
										<div class="dropdown ml-2">
											<button class="btn btn-light btn-sm dropdown-toggle w-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Everyone <i class="mdi mdi-chevron-down"></i>
											</button>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Everyone</a>
												<a class="dropdown-item" href="#">selected</a>
												<a class="dropdown-item" href="#">Nobody</a>
											</div>
										</div>
									</div>
								</div>

								<div class="py-3 border-top">
									<div class="media align-items-center">
										<div class="media-body overflow-hidden">
											<h5 class="font-size-13 mb-0 text-truncate">Read receipts</h5>

										</div>
										<div class="ml-2">
											<div class="custom-control custom-switch">
												<input type="checkbox" class="custom-control-input" id="privacy-readreceiptSwitch" checked>
												<label class="custom-control-label" for="privacy-readreceiptSwitch"></label>
											</div>
										</div>
									</div>
								</div>

								<div class="py-3 border-top">
									<div class="media align-items-center">
										<div class="media-body overflow-hidden">
											<h5 class="font-size-13 mb-0 text-truncate">Groups</h5>

										</div>
										<div class="dropdown ml-2">
											<button class="btn btn-light btn-sm dropdown-toggle w-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Everyone <i class="mdi mdi-chevron-down"></i>
											</button>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Everyone</a>
												<a class="dropdown-item" href="#">selected</a>
												<a class="dropdown-item" href="#">Nobody</a>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
					<!-- end Privacy card -->

					<div class="card shadow-none border mb-2">
						<a href="#profile-setting-securitynoticollapse" class="text-dark collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="profile-setting-securitynoticollapse">
							<div class="card-header" id="profile-setting-securitynotiheading">
								<h5 class="font-size-14 m-0">
									Security
									<i class="mdi mdi-chevron-up float-right accor-plus-icon"></i>
								</h5>
							</div>
						</a>
						<div id="profile-setting-securitynoticollapse" class="collapse" aria-labelledby="profile-setting-securitynotiheading" data-parent="#profile-setting-accordion">
							<div class="card-body">

								<div>
									<div class="media align-items-center">
										<div class="media-body overflow-hidden">
											<h5 class="font-size-13 mb-0 text-truncate">Show security notification</h5>

										</div>
										<div class="ml-2">
											<div class="custom-control custom-switch">
												<input type="checkbox" class="custom-control-input" id="security-notificationswitch">
												<label class="custom-control-label" for="security-notificationswitch"></label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end Security card -->

					<div class="card shadow-none border mb-2">
						<a href="#profile-setting-helpcollapse" class="text-dark collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="profile-setting-helpcollapse">
							<div class="card-header" id="profile-setting-helpheading">
								<h5 class="font-size-14 m-0">
									Help
									<i class="mdi mdi-chevron-up float-right accor-plus-icon"></i>
								</h5>
							</div>
						</a>
						<div id="profile-setting-helpcollapse" class="collapse" aria-labelledby="profile-setting-helpheading" data-parent="#profile-setting-accordion">
							<div class="card-body">

								<div>
									<div class="py-3">
										<h5 class="font-size-13 mb-0"><a href="#" class="text-body d-block">FAQs</a></h5>
									</div>
									<div class="py-3 border-top">
										<h5 class="font-size-13 mb-0"><a href="#" class="text-body d-block">Contact</a></h5>
									</div>
									<div class="py-3 border-top">
										<h5 class="font-size-13 mb-0"><a href="#" class="text-body d-block">Terms & Privacy policy</a></h5>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end Help card -->
				</div>
				<!-- end profile-setting-accordion -->
			</div>
			<!-- End User profile description -->
		</div>
		<!-- Start Settings content -->
	</div>
	<!-- End settings tab-pane -->
</div>
<!-- end tab content -->

</div>
</div>

	<script src="/themes/assets/libs/jquery/jquery.min.js"></script>
	<script src="/themes/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="/themes/assets/libs/simplebar/simplebar.min.js"></script>
	<script src="/themes/assets/libs/node-waves/waves.min.js"></script>
	<script src="/themes/assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
	<script src="/themes/assets/libs/owl.carousel/owl.carousel.min.js"></script>
	<script src="/themes/assets/js/pages/index.init.js"></script>
	<script src="/themes/assets/js/app.js"></script>
	<script>
		function timestamp() {
			$.ajax({
				url: '/timestamp.php',
				success: function(data) {
					$('#timestamp').html(data);
				},
			});
		}
		$(function(){
			setInterval(timestamp, 200);
		});
	</script>
</body>
</html>