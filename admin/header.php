<?php
   include('connection.php');
  include('checksession.php');
?>
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Bluegrey Technologiess</title>
    <link rel="apple-touch-icon" sizes="60x60" href="app-assets/images/ico/apple-icon-60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="app-assets/images/ico/apple-icon-76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="app-assets/images/ico/apple-icon-152.png">
    <link rel="shortcut icon" type="image/x-icon" href="favicon/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="favicon/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/icomoon.css">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/pace.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END Custom CSS-->
    <script src="assets/ckeditor/ckeditor.js" type="text/javascript"></script>
   
    
  </head>
  <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">

    <!-- navbar-fixed-top-->
    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
            <li class="nav-item"><a class="navbar-brand nav-link"><img alt="branding logo" src="app-assets/images/logo/logo-light.png" data-expand="app-assets/images/logo/logo-light.png" data-collapse="app-assets/images/logo/logo-small.png" class="brand-logo"></a></li>
            <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content container-fluid">
          <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
            
            <ul class="nav navbar-nav float-xs-right">
              <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><i class="icon-user"></i><i></i></span><span class="user-name"><?php echo $Email?></span></a>
                <div class="dropdown-menu dropdown-menu-right"><a href="logout" class="dropdown-item"><i class="icon-power3"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

        <!-- main menu-->
    <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
      <!-- main menu header-->
      <!--div class="main-menu-header">
        <input type="text" placeholder="Search" class="menu-search form-control round"/>
      </div-->
      <!-- / main menu header-->
      <!-- main menu content-->
      <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
          <li class="nav-item">
            <a>
              <i class="icon-blogger"></i><span data-i18n="nav.dash.main" class="menu-title">Blog</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="insert_blog" data-i18n="nav.dash.main" class="menu-item"><i class="icon-plus"></i> Add a Blog</a>
              </li>
              <li>
              <li>
                <a href="blog_list" data-i18n="nav.dash.main" class="menu-item"><i class="icon-file-text2"></i>List of Blog </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a>
              <i class="icon-blogger"></i><span data-i18n="nav.dash.main" class="menu-title">Blog Image</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="insert_blogimage" data-i18n="nav.dash.main" class="menu-item"><i class="icon-plus"></i> Add a Blog Image </a>
              </li>
              <li>
                <a href="blogimage_list" data-i18n="nav.dash.main" class="menu-item"><i class="icon-file-text2"></i> List of Blog Image </a>
              </li>
            </ul>
          </li>
          <li class=" nav-item">
            <a>
              <i class="icon-briefcase"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Inquiry</span>
            </a>
            <ul class="menu-content">
            <li>
                <a href="inquiry_list" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-file-text2"></i>List of Inquiry Users</a>
              </li> 
              <li>
                <a href="career_list" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-file-text2"></i>List of Applied Users</a>
              </li> 
              <li>
                <a href="quoteinquiry_list" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-file-text2"></i> List of Quote Inquiry</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item">
            <a>
              <i class="icon-briefcase"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Job Category</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="intrestedtype_add" data-i18n="nav.page_layouts.1_column" class="menu-item"><i class="icon-plus"></i> Add a Job Category</a>
              </li>
              <li>
                <a href="intrestedtype_list" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-file-text2"></i> List of Job Category</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item">
            <a>
              <i class="icon-briefcase"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Job Post</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="jobpost_add" data-i18n="nav.page_layouts.1_column" class="menu-item"><i class="icon-plus"></i> Add a Job Post</a>
              </li>
              <li>
                <a href="jobpost_list" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-file-text2"></i>List of Job Post</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item">
            <a>
              <i class="icon-briefcase"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Portfolio</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="insert_portfolio" data-i18n="nav.page_layouts.1_column" class="menu-item"><i class="icon-plus"></i> Add a Portfolio</a>
              </li>
              <li>
                <a href="portfolio_list" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-file-text2"></i>List of Portfolio </a>
              </li>
            </ul>
          </li>
          <li class=" nav-item">
            <a>
              <i class="icon-briefcase"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Query</span>
            </a>
            <ul class="menu-content">
              <li>
                <a href="querytype_add" data-i18n="nav.page_layouts.1_column" class="menu-item"><i class="icon-plus"></i> Add a Query Type</a>
              </li>
              <li>
                <a href="querytype_list" data-i18n="nav.page_layouts.2_columns" class="menu-item"><i class="icon-file-text2"></i> List of Query Type</a>
              </li>
            </ul>
          </li>
          
         
          
        </ul>
      </div>
      <!-- /main menu content-->
      <!-- main menu footer-->
      <!-- include includes/menu-footer-->
      <!-- main menu footer-->
    </div>
    <!-- / main menu-->