
		<link rel="stylesheet" href="include/assets/css/custom_style.css">
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <div class="header">
			
				<!-- Logo -->
                <div class="header-left">
                    <a  class="logo">
						<img src="<?php echo $site_set->logo; ?>" alt="Logo">
					</a>
					<a  class="logo logo-small">
						<img src="<?php echo $site_set->logo; ?>" alt="Logo" width="20" height="20">
					</a>
                </div>
				<!-- /Logo -->
				
				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fe fe-text-align-left"></i>
				</a>
				
				<div class="top-nav-search">

				</div>
				
				<!-- Mobile Menu Toggle -->
				<a class="mobile_btn" id="mobile_btn">
					<i class="fa fa-bars"></i>
				</a>
				<!-- /Mobile Menu Toggle -->
				
				<!-- Header Right Menu -->
				<ul class="nav user-menu">

					
					<!-- User Menu -->
					<li class="nav-item dropdown has-arrow">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img class="rounded-circle" src="<?php echo $user_P->img_url;?>" width="31" alt="Ryan Taylor"></span>
						</a>
						<div class="dropdown-menu">
							<div class="user-header">
								<div class="avatar avatar-sm">
									<img src="<?php echo $user_P->img_url;?>" alt="User Image" class="avatar-img rounded-circle">
								</div>
								<div class="user-text">
									<h6><?php echo $user_P->ename;?></h6>
									<p class="text-muted mb-0"><?php echo $this->ion_auth->get_users_groups()->row()->name; ?></p>
								</div>
							</div>
							<a class="dropdown-item" href="">My Profile</a>
							<a class="dropdown-item" href="auth/logout">Logout</a>
						</div>
					</li>
					<!-- /User Menu -->
					
				</ul>
				<!-- /Header Right Menu -->
				
            </div>
			<!-- /Header -->
			



			<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li> 
								<a href="home">
									<i class="fe fe-home"></i> 
									<span>Dashboard</span>
								</a>
							</li>

                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                            <li>
                                <a href="department">
                                    <i class="fa fa-sitemap"></i>
                                    <span><?php echo lang('departments'); ?></span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if ($this->ion_auth->in_group('admin')) { ?>				<li class="submenu">
								<a class="submenu_a " href="#"><i class="fa fa-user-md"></i> <span>  Doctors </span> <span class="menu-arrow"></span></a>
								<ul class="submenu_ul " style="display: none; margin-left: 30px; ">
									<li><a href="doctor">Doctor List</a></li>
									<li><a href="doctor/drfee">Doctor Fee</a></li>
									<li><a href="doctor/dr_spclty">Doctor Speciality </a></li>
									<li><a href="doctor/dr_chamber">Chamber Time</a></li>
								</ul>
							</li>
                        <?php } ?>


                        <?php if ($this->ion_auth->in_group('admin')) { ?>				<li class="submenu">
								<a class="submenu_a " href="#"><i class="fa fa-bed"></i> <span> Bed </span> <span class="menu-arrow"></span></a>
								<ul class="submenu_ul " style="display: none; margin-left: 30px; ">
									<li><a href="bed">Bed List</a></li>
								</ul>
							</li>
                        <?php } ?>


                        <?php if ($this->ion_auth->in_group('admin')) { ?>				<li class="submenu">
								<a class="submenu_a " href="#"><i class="fa fa-user-injured"></i> <span> Patients </span> <span class="menu-arrow"></span></a>
								<ul class="submenu_ul " style="display: none; margin-left: 30px; ">
									<li><a href="patient"> Patients List </a></li>
									<li><a href="patient/admitreport"> Admition Report </a></li>
								</ul>
							</li>
                        <?php } ?>




                        <?php if ($this->ion_auth->in_group('admin')) { ?>				
                        	<li class="submenu">
								<a class="submenu_a " href="#"><i class="fa fa-desktop"></i> <span> Reception </span> <span class="menu-arrow"></span></a>
								<ul class="submenu_ul " style="display: none; margin-left: 30px; ">
									<li><a href="labrcv/addnew"> Add Test </a></li>
									<li><a href="reception"> Doctor Ticket </a></li>
									<li><a href="reception/ticketbydate"> Ticket by Date </a></li>
									<li><a href="reception/ticket_statement"> Ticket Statement </a></li>
									<li><a href="bill"> Create Bill </a></li>
									<li><a href="bill/bill_receive"> Receive Bill </a></li>
									<li><a href=""> Bill Statement </a></li>
								</ul>
							</li>
                        <?php } ?>


                        <?php if ($this->ion_auth->in_group('admin')) { ?>				
                        	<li class="submenu">
								<a class="submenu_a " href="#"><i class="fa fa-flask"></i> <span> Pathology </span> <span class="menu-arrow"></span></a>
								<ul class="submenu_ul " style="display: none; margin-left: 30px; ">
									<li><a href="pathology/grp_info"> Group Info </a></li>
								</ul>
							</li>
                        <?php } ?>


								</ul>
							</li>
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
			


			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
                <div class="content container-fluid">
					