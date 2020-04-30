
		<link rel="stylesheet" href="include/assets/css/extra_style.css">
	<body  class="account-page">

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<header class="header">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a class="navbar-brand logo">
							<img src="<?php echo $site_set->logo; ?>" class="img-fluid" width="70px" height="70px" >
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a class="menu-logo">
								<img src="<?php echo $site_set->logo; ?>" class="img-fluid" width="70px" height="70px" >
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li class="active">
								<a href="index-2.html">Home</a>
							</li>
							<li class="has-submenu">
								<a href="#">Doctors <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li><a href="doctor-dashboard.html">Doctor Dashboard</a></li>
									<li><a href="appointments.html">Appointments</a></li>
									<li><a href="schedule-timings.html">Schedule Timing</a></li>
									<li><a href="my-patients.html">Patients List</a></li>
									<li><a href="patient-profile.html">Patients Profile</a></li>
									<li><a href="chat-doctor.html">Chat</a></li>
									<li><a href="invoices.html">Invoices</a></li>
									<li><a href="doctor-profile-settings.html">Profile Settings</a></li>
									<li><a href="reviews.html">Reviews</a></li>
									<li><a href="doctor-register.html">Doctor Register</a></li>
								</ul>
							</li>	
							<li class="has-submenu">
								<a href="#">Patients <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li><a href="search.html">Search Doctor</a></li>
									<li><a href="doctor-profile.html">Doctor Profile</a></li>
									<li><a href="booking.html">Booking</a></li>
									<li><a href="checkout.html">Checkout</a></li>
									<li><a href="booking-success.html">Booking Success</a></li>
									<li><a href="patient-dashboard.html">Patient Dashboard</a></li>
									<li><a href="favourites.html">Favourites</a></li>
									<li><a href="chat.html">Chat</a></li>
									<li><a href="profile-settings.html">Profile Settings</a></li>
									<li><a href="change-password.html">Change Password</a></li>
								</ul>
							</li>	
							<li class="has-submenu">
								<a href="#">Pages <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li><a href="voice-call.html">Voice Call</a></li>
									<li><a href="video-call.html">Video Call</a></li>
									<li><a href="search.html">Search Doctors</a></li>
									<li><a href="calendar.html">Calendar</a></li>
									<li><a href="components.html">Components</a></li>
									<li class="has-submenu">
										<a href="invoices.html">Invoices</a>
										<ul class="submenu">
											<li><a href="invoices.html">Invoices</a></li>
											<li><a href="invoice-view.html">Invoice View</a></li>
										</ul>
									</li>
									<li><a href="blank-page.html">Starter Page</a></li>
									<li><a href="login.html">Login</a></li>
									<li><a href="register.html">Register</a></li>
									<li><a href="forgot-password.html">Forgot Password</a></li>
								</ul>
							</li>
							<li>
								<a href="admin/index.html" target="_blank">Patient reports</a>
							</li>
							<li class="login-link">
								<a href="front_view/log_in">Login</a>
							</li>
						</ul>		 
					</div>		 
					<ul class="nav header-navbar-rht">
						<li class="nav-item">
						    
							<div class="doctor_profile">
							    <!-- User Menu -->
							    <li class="nav-item dropdown has-arrow logged-item">
							        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							            <span class="user-img">
							                <img class="rounded-circle" src="assets/img/doctors/doctor-thumb-02.jpg" width="31" alt="Darren Elder">
							            </span>
							        </a>
							        <div class="dropdown-menu dropdown-menu-right">
							            <div class="user-header">
							                <div class="avatar avatar-sm">
							                    <img src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image" class="avatar-img rounded-circle">
							                </div>
							                <div class="user-text">
							                    <h6>Darren Elder</h6>
							                    <p class="text-muted mb-0">Doctor</p>
							                </div>
							            </div>
							            <a class="dropdown-item" href="doctor-dashboard.html">Dashboard</a>
							            <a class="dropdown-item" href="doctor-profile-settings.html">Profile Settings</a>
							            <a class="dropdown-item" href="login.html">Logout</a>
							        </div>
							    </li>
							    <!-- /User Menu -->
							</div>
						</li>
					</ul>
				</nav>
				<div class="Breadcrumb">
				    <!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Dashboard</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
				</div>
			</header>
			<!-- /Header -->
			
			
			
            
            
               <!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							
							<!-- Profile Sidebar -->
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<img src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3>Dr. Darren Elder</h3>
											
											<div class="patient-details">
												<h5 class="mb-0">BDS, MDS - Oral & Maxillofacial Surgery</h5>
											</div>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li class="active">
												<a href="doctor-dashboard.html">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<li>
												<a href="appointments.html">
													<i class="fas fa-calendar-check"></i>
													<span>Appointments</span>
												</a>
											</li>
											<li>
												<a href="my-patients.html">
													<i class="fas fa-user-injured"></i>
													<span>Admit Patients</span>
												</a>
											</li>
											
											<li>
												<a href="doctor-profile-settings.html">
													<i class="fas fa-user-cog"></i>
													<span>Profile Settings</span>
												</a>
											</li>
											<li>
												<a href="doctor-change-password.html">
													<i class="fas fa-lock"></i>
													<span>Change Password</span>
												</a>
											</li>
											<li>
												<a href="index-2.html">
													<i class="fas fa-sign-out-alt"></i>
													<span>Logout</span>
												</a>
											</li>
										</ul>
									</nav>
								</div>
							</div>
							<!-- /Profile Sidebar -->
							
						</div>
						
						                
			   
			
			
			
			