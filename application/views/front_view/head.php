<!doctype html>
<html class="no-js " lang="en">

<!-- Mirrored from thememakker.com/templates/oreo/hospital/front/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Nov 2019 09:40:37 GMT -->
<head>    
    <base href="<?php echo base_url(); ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $site_set->title; ?></title>
    <link rel="icon" href="<?php echo $site_set->logo; ?>">
    <!-- start linking -->
    <link rel="stylesheet" href="include/front_style/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="include/front_style/plugins/aos/aos.min.css">
    <link rel="stylesheet" href="include/front_style/css/main.css">

    <link rel="stylesheet" href="include/front_style/owlcarousel/docs.theme.min.css">

    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="include/front_style/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="include/front_style/owlcarousel/assets/owl.theme.default.min.css">

    <script src="include/front_style/js/jquery-3.4.1.min.js"></script>    



















</head>
<body>

<div id="loading" class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30">
            <img class="zmdi-hc-spin" src="<?php echo $site_set->logo; ?>" width="90" height="90" alt="SHH">
        </div>
        <p>Please wait...</p>        
    </div>
</div>

<div class="wrapper">
    <!-- start loading -->    
    <div class="main_header">
    <!-- 
        <section id="top-nav">
            <div class="container">
                <div class="top">
                    <div class="row">
                        <div class="col-lg-6 col-md-7">
                            <div class="left">
                                <ul class="list-unstyled m-b-0">
                                    <li><a href="#" class="btn btn-link"><i class="zmdi zmdi-email m-r-5"></i>info@example.com</a>
                                        <a href="#" class="btn btn-link"><i class="zmdi zmdi-phone m-r-5"></i>+
                                            202-555-0191</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-5">
                            <div class="text-right d-none d-md-block">
                                <ul class="list-unstyled m-b-0">
                                    <li><a href="javascript:void(0);" class="btn btn-link">Sign in</a> <a href="javascript:void(0);" class="btn btn-link">sign
                                        up</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
     -->
        <header id="header">
            <div class="container">
                <div class="head">
                    <div class="row">
                        <div class="col-lg-5 col-sm-5">
                            <div class="left">
                                <a class="navbar-brand">
                                    <img class="zmdi-hc-spin" src="<?php echo $site_set->logo; ?>" style="width: 60px; height: 60px;" alt="logo">
                                    <span style="font-size: 38px; font-weight: bold; color: white; margin-left: 20px; font-family: times new roman;"><?php echo $site_set->system_vendor; ?></span>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-sm-7">
                            <div class="text-right d-none d-md-block">
                                <p class="col-white m-b-0 p-t-5"><i class="zmdi zmdi-pin"></i> <?php echo $site_set->address; ?> </p>
                                <p class="col-white m-b-0"><i class="zmdi zmdi-phone"></i> <?php echo $site_set->phone; ?> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div id="navbar" data-aos="fade-down">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse"
                            data-target="#navbarMenu" aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarMenu">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="front_view">
                                    Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="front_view/department">
                                    Departments
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="front_view/doctor_list">
                                    Doctors
                                </a>
                            </li>

                        <!-- Drop Down Menu
                             <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="pageMenuLink"
                                   data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    Dropdown Menu
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="blog.html">
                                        Sub Menu
                                    </a>
                                    <a class="dropdown-item" href="blog-detail.html">
                                        Sub Menu
                                    </a>
                                </div>
                            </li> 
                        -->

                        </ul>
                    <!-- Search -->
                    <!--
                         <form class="form-inline my-2 my-lg-0 d-none d-lg-inline-block">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        </form>
                    -->
                    <!-- Search -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
