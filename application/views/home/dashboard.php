<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="<?php echo base_url(); ?>">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keyword" content="Php, Hospital, Clinic, Management, Software, Php, CodeIgniter, Hms, Accounting">
        <link rel="shortcut icon" href="<?php echo $this->db->get('settings')->row()->logo; ?> ">
        <title><?php echo $this->db->get('settings')->row()->system_vendor; ?> </title>

        <!-- Button Style -->
        <link href="include/css/buttons.css" rel="stylesheet">
        <!-- Button Style -->

        <!-- Bootstrap core CSS -->
        <link href="include/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="include/bootstrap/css/bootstrap-reset.css" rel="stylesheet">
        <link href="include/bootstrap/css/bootstrap-grid.min.css" rel="stylesheet">
        <link href="include/bootstrap/css/bootstrap-reboot.min.css" rel="stylesheet">
        <!-- Bootstrap core CSS -->

        <!-- Bootstrap Date & Time Picker CSS -->        
        <link rel="stylesheet" href="include/bootstrap/bootstrap-datepicker/css/datepicker.css" />
        <link rel="stylesheet" type="text/css" href="include/bootstrap/bootstrap-timepicker/compiled/timepicker.css">
        <!-- Bootstrap Date & Time Picker CSS --> 

        <!-- Data-Table css-->
        <link href="include/assets/DataTables/datatables.min.css" rel="stylesheet" />
        <!-- Data-Table css--> 

        <!--Font Awsome CSS-->
        <link href="include/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="include/assets/fontawesome-free-5.8.2-web/css/all.min.css" rel="stylesheet" />        
        <link rel="stylesheet" type="text/css" href="include/assets/jquery-multi-select/css/multi-select.css" />
        <!--Font Awsome CSS-->

        <!-- Chart css-->
        <link href="include/chart.js/Chart.min.css" rel="stylesheet" />
        <!-- Chart css-->         

        <!-- Custom styles for this template -->
        <link href="include/css/style.css" rel="stylesheet">
        <link href="include/css/style-responsive.css" rel="stylesheet" />
        <link href="include/css/costum.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="include/assets/select2/css/select2.min.css"/>
        <!-- Custom styles for this template -->

        <!-- jQuery  for all page  -->
        <script src="include/js/jquery-3.4.1.min.js"></script>
        <!-- jQuery  for all page  -->



        <!-- Toastr Js & Css -->
        <link href="include/toastr/toastr.min.css" rel="stylesheet" />
        <script src="include/toastr/toastr.min.js"></script>
        <!-- Toastr Js & Css -->






        <style type="text/css">
            .navColor {
                background: <?php echo '#'. $this->db->get('sys_style')->row()->nav_color; ?>;
                color: #000;
                font-weight: bold;
            }
        </style>


    </head>

    <body>

        <section id="container" class="">
            <!--header start-->
            <header class="header white-bg" >
                <div class="sidebar-toggle-box">
                    <div data-original-title="Toggle Navigation" data-placement="right" class="fas fa-dedent fa-bars tooltips"></div>
                </div>
                <!--logo start-->

                <!-- System Name -->
                <?php
                $settings_title = $this->db->get('settings')->row()->system_vendor;
                $settings_title = explode(' ', $settings_title);
                ?>
                <!-- System Name -->



                <!-- Chat Option -->
                    <!-- <div class="msg_box" style="right:10px" rel="skp">
                        <div class="msg_head"><center>Chat </center></div>
                        <div class="msg_wrap" style="display: none;">
                            <div class="msg_body" id="msg_body">
                                <div class="msg_push"></div>
                            </div>
                            <div class="msg_footer">
                                    <input type="text" id="chat" class="msg_input" name="chat" placeholder="Type Your Massage" >
                                    <input type="submit" class="msg_submit" name="" value="send">
                            </div>
                        </div>
                        
                    </div> -->
                <!-- Chat Option -->




                <a href="" class="logo">
                    <strong>
                        <?php echo $settings_title[0]; ?>
                        <span>
                            <?php
                            if (!empty($settings_title[1])) {
                                echo $settings_title[1];
                            }
                            ?>
                        </span>
                    </strong>
                </a>
                <!--logo end-->



                <div class="nav notify-row" id="top_menu">

                    <!--  notification start -->
                    <ul class="nav top-menu">

                    <!--  Dynamic Gretings data from Database -->
                        <div class="dynamic_grettings">
                            <!-- Data from Database -->
                        </div>
                    <!--  Dynamic Gretings data from Database -->

                    </ul>
                </div>

                <div class="top-nav " >

                   <!-- Flash Message -->
                    <?php
                    $message = $this->session->flashdata('feedback');
                    if (!empty($message)) {
                        ?>
                        <div class="flashmessage pull-left"><i class="fas fa-check"></i> <?php echo $message; ?></div>
                    <?php } ?>
                   <!-- Flash Message --> 

                    <ul class="nav pull-right top-menu">

                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <img alt="" src="<?php echo $user_P->img_url?>" width="40" height="43">
                                <span style="font-size: 18px;" class="username">
                                     <?php echo  $user_P->ename;?>
                                </span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <div class="log-arrow-up"></div>
                                <?php if (!$this->ion_auth->in_group('admin')) { ?> 
                                    <li><a href=""><i class="fas fa-dashboard"></i> <?php echo lang('dashboard'); ?></a></li>
                                <?php } ?>
                                <li><a href="profile"><i class=" fas fa-suitcase"></i><?php echo lang('profile'); ?></a></li>
                                <?php if ($this->ion_auth->in_group('admin')) { ?> 
                                    <li><a href="settings"><i class="fas fa-cog"></i> <?php echo lang('settings'); ?></a></li>
                                <?php } ?>

                                <li><a><i class="fa fa-user"></i> <?php echo $this->ion_auth->get_users_groups()->row()->name ?></a></li>
                                <li><a href="auth/logout"><i class="fa fa-key"></i> <?php echo lang('log_out'); ?></a></li>
                            </ul>
                        </li>
                        <!-- user login dropdown start-->
                        
                    </ul>
                </div>

            <!-- Sever Development Notice -->
                <div class="server_dev_notice">
                    <h2 style="font-family: solaimanlipi;">
                        <!-- Data from database  --> 
                    </h2>
                </div>
            <!-- Sever Development Notice -->

            </header>
            <!--header end-->
            <!--sidebar start-->








            <!--sidebar start-->
            <aside>
                <div id="sidebar"  class="nav-collapse navColor">
                    <!-- sidebar menu start-->
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li class="navColor">
                            <a href=""> 
                                <i class="fa fa-home"></i>
                                <span><?php echo lang('dashboard'); ?></span>
                            </a>
                        </li>


                        <?php if ($this->ion_auth->in_group('admin')) { ?>
                            <li class="navColor">
                                <a href="department">
                                    <i class="fa fa-sitemap"></i>
                                    <span><?php echo lang('departments'); ?></span>
                                </a>
                            </li>
                        <?php } ?>


                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <li> <li class="sub-menu navColor">
                                <a href="" >
                                    <i class="fa fa-user-md"></i>
                                    <span><?php echo lang('doctor'); ?></span>
                                </a>
                                <ul class="sub">
                                    <li><a href="doctor"><i class="fa fa-user"></i><?php echo lang('list_of_doctors'); ?></a></li>
                                    
                                    <li><a href="doctor/drfee"><i class="fa fa-money"></i><?php echo lang('dr_fee'); ?></a></li>

                                    <li><a href="doctor/dr_spclty"><i class="fa fa-user"></i><?php echo 'Doctor Speciality'; ?></a></li>
                                    <li><a href="doctor/dr_chamber"><i class="fa fa-clock"></i>Chamber Time</a></li>
                                </ul>
                            </li>
                        <?php } ?>


                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <li> <li class="sub-menu navColor">
                                <a href="javascript:;" >
                                    <i class="fa fa-info-circle"></i>
                                    <span><?php echo lang('bed'); ?></span>
                                </a>
                                <ul class="sub">
                                    <li><a href="bed"><i class="fa fa-check"></i><?php echo lang('bed'); ?></a></li>
                                </ul>
                            </li>
                        <?php } ?>





                        <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Supervisor'))) { ?>
                            <li> <li class="sub-menu navColor">
                                <a href="javascript:;" >
                                    <i class="fa fa-wheelchair"></i> 
                                    <span><?php echo lang('patient'); ?></span>
                                </a>
                                <ul class="sub"> 
                                    <li><a href="patient"><i class="fa fa-user"></i><?php echo lang('patient_list'); ?></a></li>

                                    <li><a href="patient/admitreport"><i class="fa fa-file-alt"></i>Admission Report</a></li>
                                </ul>
                            </li>
                        <?php } ?>



                        <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Sr_Receptionist'))) { ?>
                            <li> <li class="sub-menu navColor">
                                <a href="javascript:;" >
                                    <i class="fa fa-info-circle"></i>
                                    <span><?php echo lang('reception'); ?></span>
                                </a>
                                <ul class="sub">

                        <?php if ($this->ion_auth->in_group(array('admin', 'Accountant'))) { ?>
                                    <li><a href="labrcv/addnew"><i class="fa fa-dollar"></i><?php echo lang('add').' '.lang('test'); ?></a></li>
                                    <li><a href="reception/allticket"><i class="fa fa-check"></i><?php echo lang('all').' '.lang('ticket'); ?></a></li>
                        <?php }?>
                        
                                    <li><a href="reception"><i class="fa fa-check"></i><?php echo lang('ticket'); ?></a></li>
                                    <li><a href="reception/print_total"><i class="fa fa-check"></i>Ticket Statement</a></li>

                        <?php if ($this->ion_auth->in_group(array('admin', 'Accountant'))) { ?>
                                    <li><a href="bill"><i class="fa fa-dollar"></i><?php echo lang('create').' '.lang('bill'); ?></a></li>
                            <?php } ?>

                                    <li><a href="bill/bill_receive"><i class="fa fa-search-dollar"></i><?php echo lang('receive').' '.lang('bill'); ?></a></li>

                                    <li><a href="bill/out_ser"><i class="fa fa-dollar"></i><?php echo lang('out').' '.lang('service').' '.lang('bill'); ?></a></li>

                                    <li><a href="bill/statmnt"><i class="fa fa-dollar"></i><?php echo lang('bill').' '.lang('statement'); ?></a></li>


                                </ul>
                            </li>
                        <?php } ?>



                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <li> <li class="sub-menu navColor">
                                <a href="javascript:;" >
                                    <i class="fa fa-users"></i>
                                    <span><?php echo lang('human_resources'); ?></span>
                                </a>
                                <ul class="sub">
                                    <li><a href="nurse"><i class="fa fa-user"></i><?php echo lang('emp'); ?></a></li>
                                    <li><a href="nurse/info"><i class="fa fa-info"></i><?php echo lang('empinfo'); ?></a></li>
                                    <li><a href="nurse/nursebnInfo"><i class="fa fa-money"></i>Bangla Entry</a></li>
                                    <li><a href="pharmacist/attnProcess"><i class="fa fa-spinner"></i>Attend Processing</a></li>
                                    <li><a href="pharmacist/alup"><i class="fa fa-upload"></i><?php echo lang('uploadattn'); ?></a></li>
                                    <li><a href="pharmacist"><i class="fa fa-th-list "></i><?php echo lang('attend'); ?></a></li>
                                    <li><a href="pharmacist/job_card"><i class="fa fa-align-justify"></i><?php echo lang('job_card'); ?></a></li>
                                    <li><a href="pharmacist/monthly"><i class="fa fa-arrows-alt"></i><?php echo lang('month_attn'); ?></a></li>
                                    <li><a href="pharmacist/salary"><i class="fa fa-money"></i><?php echo lang('sallary'); ?></a></li>
                                </ul>
                            </li>
                        <?php } ?>


                        <?php if ($this->ion_auth->in_group(array('admin', 'Accountant'))) { ?>
                            <li> <li class="sub-menu navColor">
                                <a href="javascript:;" >
                                    <i class="fa fa-money"></i>
                                    <span><?php echo lang('account'); ?></span>
                                </a>
                                <ul class="sub">
                                    <li><a href="cashier"><i class="fa fa-donate"></i><?php echo lang('income'); ?></a></li>
                                    <li><a href="cashier/expen"><i class="fa fa-file-invoice-dollar"></i><?php echo lang('expense'); ?></a></li>
                                    <li><a href="cashier/dailyst"><i class="fa fa-list-ol"></i><?php echo lang('diexpen'); ?></a></li>
                                    <li><a href="cashier/bank"><i class="fa fa-list"></i><?php echo lang('bstatement'); ?></a></li>
                                    <li><a href="cashier/miest"><i class="fa fa-bars"></i><?php echo lang('monthlystatement'); ?></a></li>
                                    <li><a href="cashier/particular"><i class="fa fa-list"></i><?php echo lang('add').' '.lang('income').' '.lang('category'); ?></a></li>
                                    <li><a href="cashier/exppart"><i class="fa fa-list"></i><?php echo lang('add').' '.lang('expense').' '.lang('category'); ?></a></li>
                                </ul>
                            </li>
                        <?php } ?>




                        <?php if ($this->ion_auth->in_group(array('admin', 'Laboratorist'))) { ?>
                            <li> <li class="sub-menu navColor">
                                <a href="javascript:;" >
                                    <i class="fa fa-flask "></i>
                                    <span><?php echo lang('pathology'); ?></span>
                                </a>
                                <ul class="sub">
                                    <li><a href="pathology"><i class="fa fa-vial"></i>Report Entry</a></li>
                                    <li><a href="pathology/printRepoView"><i class="fa fa-vial"></i>Report Print</a></li>
                                    <!-- <li><a href="pathology/test_rangeAdd"><i class="fa fa-temperature-high"></i>Test Range Add</a></li> -->
                                    <li><a href="pathology/addInvTests"><i class="fa fa-temperature-high"></i>Test Info</a></li>
                                    <li><a href="pathology/test_add"><i class="fa fa-thermometer-empty"></i>Test INV Info </a></li>
                                    <li><a href="pathology/grp_info"><i class="fa fa-temperature-high"></i>Test Group Info </a></li>
                                </ul>
                            </li>
                        <?php } ?>



                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <li> <li class="sub-menu navColor">
                                <a href="javascript:;" >
                                    <i class="fa fa-x-ray "></i>
                                    <span>X-RAY</span>
                                </a>
                                <ul class="sub">
                                    <li><a href="xray"><i class="fa fa-x-ray"></i>Index</a></li>
                                </ul>
                            </li>
                        <?php } ?>




                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <li> <li class="sub-menu navColor">
                                <a href="javascript:;" >
                                    <i class="fa fa-x-ray "></i>
                                    <span>USG</span>
                                </a>
                                <ul class="sub">
                                    <li><a href="usg"><i class="fa fa-hotel"></i>Add Patient Report</a></li>
                                    <li><a href="usg/print_repo"><i class="fa fa-hotel"></i>Print Report</a></li>
                                    <li><a href="usg/normal_test"><i class="fa fa-hotel"></i>Test Report</a></li>
                                </ul>
                            </li>
                        <?php } ?>





                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <li> <li class="sub-menu navColor">
                                <a href="javascript:;" >
                                    <i class="fa fa-user"></i>
                                    <span><?php echo lang('user_mgnt'); ?></span>
                                </a>
                                <ul class="sub">
                                    <li><a href="usermgnt"><i class="fa fa-user"></i><?php echo lang('user'); ?></a></li>
                                </ul>
                            </li>
                        <?php } ?>




                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>

                            <li> <li class="sub-menu navColor">
                                <a href="javascript:;" >
                                    <i class="fa fa-cogs"></i>
                                    <span><?php echo lang('settings'); ?></span>
                                </a>
                                <ul class="sub">
                                    <li><a href="settings"><i class="fa fa-gear"></i><?php echo lang('system_settings'); ?></a></li>
                                    <li><a href="settings/language"><i class="fa fa-wrench"></i><?php echo lang('language'); ?></a></li>
                                    <li><a href="settings/backups"><i class="fa fa-smile-o"></i><?php echo lang('backup_database'); ?></a></li>
                                </ul>
                            </li>
                        <?php } ?>


                    </ul>
                    <!-- sidebar menu end-->
                </div>
            </aside>
            <!--sidebar end-->








