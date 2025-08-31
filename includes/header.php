<?php 
session_start();
include('config.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.png">
    <title>Non Brokerage</title>

   <!-- all lib files includes  -->
    <!-- Fontawesome Files  -->
    <link rel="stylesheet" type="text/css" href="assets/lib/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/lib/fontawesome/css/solid.min.css">
    <link rel="stylesheet" type="text/css" href="assets/lib/fontawesome/css/regular.min.css">
    <link rel="stylesheet" type="text/css" href="assets/lib/fontawesome/css/brands.min.css">

    <!-- Fontawesome Files  -->
    <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap/css/bootstrap.min.css">
    <!-- PrettyPhotos Files  -->
    <link rel="stylesheet" type="text/css" href="assets/lib/pretty-photo/css/prettyPhoto.css">
    <!-- Slick Files  -->
    <link rel="stylesheet" type="text/css" href="assets/lib/slick/slick.css">
    <!-- Fonts Files  -->
    <link rel="stylesheet" type="text/css" href="assets/css/realestate-font-family.css">
    <!-- Select2 Files  -->
    <link rel="stylesheet" type="text/css" href="assets/lib/select2/select2.min.css">

    <!-- Realestate main file  -->
    <link rel="stylesheet" type="text/css" href="assets/css/realestate-header.css?v=12345">
    <link rel="stylesheet" type="text/css" href="assets/css/realestate-element.css?v=123456">
    <!-- loop property style 1 -->
    <link rel="stylesheet" type="text/css" href="assets/css/loop/property/style-1.css">
    <link rel="stylesheet" type="text/css" href="assets/css/loop/agent/style-1.css">
    <link rel="stylesheet" type="text/css" href="assets/css/loop/agency/style-1.css">
    <!-- Blog loop  style 1 -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css?v=12345567">
    <link rel="stylesheet" type="text/css" href="assets/css/realestate-styles.css?v=12345678">
    <link rel="stylesheet" type="text/css" href="assets/css/realestate-footer.css">
    <link rel="stylesheet" type="text/css" href="assets/css/loop/property/style-1.css">
    <link rel="stylesheet" type="text/css" href="assets/css/single2.css">
    <link rel="stylesheet" type="text/css" href="assets/css/loop/property/style-6.css"> 
    <link rel="stylesheet" type="text/css" href="assets/css/single-agent.css">
    <!-- Include SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!--font-family-->
   
    <style>
        ul.realestate-navigation-nav-menus a {
    color: black;
}
.realestate-navigation-nav-menus .sub-menu {
    top: 44px;
    left: 0;
}
 .big{
     color:white;
     background-color: #f22b68;
    padding: 1px 10px;
    border-radius: 10px;
  
 }
 .realestate-header.home2 .realestate-header-container {
    padding: 8px 0px;
}
.marquee-text {
  box-sizing: border-box;
  -webkit-box-align: center;
  -moz-box-align: center;
  -o-box-align: center;
  -ms-flex-align: center;
  -webkit-align-items: center;
  align-items: center;
  overflow: hidden;
  background: #000;
}
.marquee-text .top-info-bar {
  font-size: 12px;
  width: 200%;
  display: flex;
  -webkit-animation: marquee 25s linear infinite running;
  -moz-animation: marquee 25s linear infinite running;
  -o-animation: marquee 25s linear infinite running;
  -ms-animation: marquee 25s linear infinite running;
  animation: marquee 25s linear infinite running;
}

.marquee-text .top-info-bar:hover {
  -webkit-animation-play-state: paused;
  -moz-animation-play-state: paused;
  -o-animation-play-state: paused;
  -ms-animation-play-state: paused;
  animation-play-state: paused;
}

.marquee-text .top-info-bar .info-text {
  padding: 10px 30px;
  white-space: nowrap;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  -webkit-transition: all 0.2s ease;
  transition: all 0.2s ease;
}

.marquee-text .top-info-bar a {
  color: #ffffff;
  text-decoration: none;
}

@-moz-keyframes marquee {
  0% {
    -webkit-transform: translateX(0);
    -moz-transform: translateX(0);
    -o-transform: translateX(0);
    -ms-transform: translateX(0);
    transform: translateX(0);
  }

  100% {
    -webkit-transform: translate(-50%);
    -moz-transform: translate(-50%);
    -o-transform: translate(-50%);
    -ms-transform: translate(-50%);
    transform: translate(-50%);
  }
}

@-webkit-keyframes marquee {
  0% {
    -webkit-transform: translateX(0);
    -moz-transform: translateX(0);
    -o-transform: translateX(0);
    -ms-transform: translateX(0);
    transform: translateX(0);
  }

  100% {
    -webkit-transform: translate(-50%);
    -moz-transform: translate(-50%);
    -o-transform: translate(-50%);
    -ms-transform: translate(-50%);
    transform: translate(-50%);
  }
}

@-o-keyframes marquee {
  0% {
    -webkit-transform: translateX(0);
    -moz-transform: translateX(0);
    -o-transform: translateX(0);
    -ms-transform: translateX(0);
    transform: translateX(0);
  }

  100% {
    -webkit-transform: translate(-50%);
    -moz-transform: translate(-50%);
    -o-transform: translate(-50%);
    -ms-transform: translate(-50%);
    transform: translate(-50%);
  }
}

@keyframes marquee {
  0% {
    -webkit-transform: translateX(0);
    -moz-transform: translateX(0);
    -o-transform: translateX(0);
    -ms-transform: translateX(0);
    transform: translateX(0);
  }

  100% {
    -webkit-transform: translate(-50%);
    -moz-transform: translate(-50%);
    -o-transform: translate(-50%);
    -ms-transform: translate(-50%);
    transform: translate(-50%);
  }
}



    </style>

</head>

<body id="realestate-content">
    <div id="content" class="site-content">
        <header class="realestate-header home2">

<!--Topbar-->
<div class="marquee-text">
  <div class="top-info-bar">
    <div class="fl-1 info-text">
      <a href="#;">Non-Brokerage Real Estate Solutions Powered by T Soft Tech</a>
    </div>
    <div class="fl-1 info-text">
      <a href="#;">Non-Brokerage Real Estate Solutions Powered by T Soft Tech</a>
    </div>
    <div class="fl-1 info-text">
      <a href="#;">Non-Brokerage Real Estate Solutions Powered by T Soft Tech</a>
    </div>
    <div class="fl-1 info-text">
      <a href="#;">Non-Brokerage Real Estate Solutions Powered by T Soft Tech</a>
    </div>
    <div class="fl-1 info-text">
      <a href="#;">Non-Brokerage Real Estate Solutions Powered by T Soft Tech</a>
    </div>
    <div class="fl-1 info-text">
      <a href="#;">Non-Brokerage Real Estate Solutions Powered by T Soft Tech</a>
    </div>
    <div class="fl-1 info-text">
      <a href="#;">Non-Brokerage Real Estate Solutions Powered by T Soft Tech</a>
    </div>
    <div class="fl-1 info-text">
      <a href="#;">Non-Brokerage Real Estate Solutions Powered by T Soft Tech</a>
    </div>
    <div class="fl-1 info-text">
      <a href="#;">Non-Brokerage Real Estate Solutions Powered by T Soft Tech</a>
    </div>
  </div>
</div>
<!--End Topbar-->



<!-- Your existing script -->
<script type="text/javascript" src="http://static.websimages.com/static/global/js/webs/usersites/escort.js"></script> 


            <div class="realestate-header-container">
                <div class="container-fluid hny-px-5">
                    <div class="realestate-header-top-bar">
                        <div class="realestate-header-logo">
                            <a href="index.php">
                                <img loading="lazy" src="assets/images/main_logo.png" alt="realestate-logo">
                            </a>
                        </div>
                        <button class="realestate-not-filled-btn d-flex d-lg-none realestate-offcanvas-menu-btn"
                            data-bs-toggle="offcanvas" data-bs-target="#realestate-offcanvas-navigation">
                            <i class="fa-solid fa-bars-staggered"></i>
                        </button>
                        <div class="realestate-navigation-nav  d-none d-lg-block">
                            <ul class="realestate-navigation-nav-menus">
                                <li><a href="index.php">Home </a> </li>
                                <li><a href="about.php">About </a> </li>
                                <li><a href="listing.php"> Property </a> </li>
                                <li><a href="app-download.php">Download App <span class="app_free__download">Free</span></a></li>
                                <!--<li><a href="agents.php">Our Agents </a> </li>-->
                                <li><a href="contact.php">Contact Us</a></li>
                                
                            </ul>
                           
                        </div>
                        
                        <div class="realestate-navigation-quick realestate-submission-btn-container d-lg-flex align-items-center">

                            <div class="realestate-navigation-quick-login">
                            <?php 
                            if (isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] === true) {
                            ?>
                          
                                 
                             <ul class="realestate-navigation-nav-menus">
                                <li><a href="javascript:;"><?= $_SESSION['fullname'];?> <i class="fa-solid fa-caret-down"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="user/index.php">Dashboard</a></li>
                                        <li><a href="javascript:;" onclick="userLogout2()">Sign Out</a></li>
                                    </ul> 
                                </li>
                            </ul>
                       
                            <?php
                            } else {
                            ?>
                                <a href="account.php" class="realestate-not-filled-btn-login realestate-offcanvas-menu-btn">
                                    Login
                                </a>
                            <?php
                            }
                            ?>

                            </div>
                            
                            <?php 
                            if (isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] === true) {
                            ?>
                            
                            <div class="realestate-navigation-quick realestate-user-menu-container mx-1 hny_none">
                                <a href="payrent.php" class="realestate-filled-btn realestate-submission-btn">
                                    <i class="fa fa-credit-card-alt"></i>Pay Rent
                                </a>
                            </div>
                            <?php
                            } else {
                            ?>
                            <div class="realestate-navigation-quick realestate-user-menu-container mx-1 hny_none">
                                <a href="account.php" class="realestate-filled-btn realestate-submission-btn">
                                    <i class="fa fa-credit-card-alt"></i>Pay Rent
                                </a>
                            </div>
                            <?php
                            }
                            ?>
                            
                            <div class="realestate-navigation-quick realestate-user-menu-container hny_none">
                            <?php 
                            if (isset($_SESSION['userLoginStatus']) && $_SESSION['userLoginStatus'] === true) {
                            ?>
                                <a href="user/add_property.php" class="realestate-filled-btn realestate-submission-btn">
                                    <i class="fa-solid fa-plus"></i> List Your Property
                                </a>
                                
                            <?php
                            } else {
                            ?>
                                <a href="account.php" class="realestate-filled-btn realestate-submission-btn hny_none">
                                    <i class="fa-solid fa-plus"></i> List Your Property
                                </a>
                            <?php
                            }
                            ?>
                                
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end header code  -->
            </div>
        </header>