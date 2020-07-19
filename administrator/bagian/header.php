<?php
//session_start();
// $kf = $_SESSION['filter'];
// $qs = $db->query("SELECT NAMAPRODI from prodi where KDPRODI = '$kf' ");
// $rs = mysqli_fetch_object($qs);
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<!-- Mirrored from thevectorlab.net/metrolab/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Jun 2015 12:52:18 GMT -->
<head>
   <meta charset="utf-8" />
   <title>SIS Al-Munawwir</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link rel="shortcut icon" href="../asset/img/almunawiravatar.png">
   <link href="../asset/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="../asset/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" /> 
   <!--<link href="../asset/assets/bootstrap-edit.min.css" rel="stylesheet" />
    <link href="../asset/assets/style-edit.css" rel="stylesheet" /> -->
   <link href="../asset/assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
   <link href="../asset/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="../asset/css/style.css" rel="stylesheet" />
   <link href="../asset/css/style-responsive.css" rel="stylesheet" />
   <link href="../asset/css/style-default.css" rel="stylesheet" id="style_color" />

   <link href="../asset/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="../asset/assets/uniform/css/uniform.default.css" /> 

   <link rel="stylesheet" type="text/css" href="../asset/assets/chosen-bootstrap/chosen/chosen.css" />
   <link rel="stylesheet" type="text/css" href="../asset/assets/jquery-tags-input/jquery.tagsinput.css" />
    
    <link rel="stylesheet" type="text/css" href="../asset/assets/jquery-tags-input/jquery.tagsinput.css" />
    <!-- <link rel="stylesheet" type="text/css" href="../asset/assets/clockface/css/clockface.css" /> -->
    <link rel="stylesheet" type="text/css" href="../asset/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="../asset/assets/bootstrap-datepicker/css/datepicker.css" />

 <!--    <link rel="stylesheet" href="../asset/assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" /> -->
    <link rel="stylesheet" href="../../code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    

<link rel="stylesheet" type="text/css" href="../asset/js/jquery.js" />
<script src="../asset/js/grafik/jquery.min.js" type="text/javascript"></script>
<script src="../asset/js/grafik/highcharts.js" type="text/javascript"></script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
   <!-- BEGIN HEADER -->
   <div id="header" class="navbar navbar-inverse navbar-fixed-top">
       <!-- BEGIN TOP NAVIGATION BAR -->
       <div class="navbar-inner">
           <div class="container-fluid">
               <!--BEGIN SIDEBAR TOGGLE-->
               <div class="sidebar-toggle-box hidden-phone">
                   <div class="icon-reorder tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
               </div>
               <!--END SIDEBAR TOGGLE-->
               <!-- BEGIN LOGO -->
               <a class="brand" href="dashboard">
                   <img src="../asset/img/logoemcorp.png" alt="SI Pemilu" />
               </a>
               <!-- END LOGO -->
               <!-- BEGIN RESPONSIVE MENU TOGGLER -->
               <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="arrow"></span>
               </a>
               <!-- END RESPONSIVE MENU TOGGLER -->
      
        <div class="top-nav ">
           <ul class="nav pull-right top-menu" >
             <!-- BEGIN SUPPORT -->
             <!-- <li class="dropdown mtop5">

               <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Chat">
                 <i class="icon-comments-alt"></i>
               </a>
             </li>
             <li class="dropdown mtop5">
               <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Help">
                 <i class="icon-headphones"></i>
               </a>
             </li> -->
             <!-- END SUPPORT -->
             <!-- BEGIN USER LOGIN DROPDOWN -->
             <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                 <img src="../asset/img/user-mini.png" alt="">
                 <span class="username"><?php echo $l; ?> </span>
                 <b class="caret"></b>
               </a>
               <ul class="dropdown-menu extended logout">
                 <li><a href="out"><i class="icon-key"></i> Log Out</a></li>
               </ul>
             </li>
             <!-- END USER LOGIN DROPDOWN -->
           </ul>
           <!-- END TOP NAVIGATION MENU -->
        </div>
      
           </div>
       
       </div>
       <!-- END TOP NAVIGATION BAR -->
     
   </div>
   <!-- END HEADER -->
