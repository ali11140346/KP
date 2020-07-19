<?php
 session_start();
 include '../config/koneksi.php';
if (isset($_SESSION['xyz'])) {
  $kunci = base64_decode($_SESSION['xyz']);
  $ahy = explode("|",$kunci);
  $lvl = $_SESSION['lvl'];
  if ($lvl == '1') {
    $l = 'Super Admin';
  }else{
    $l = 'Admin Komplek';
  }
  $kmp = $_SESSION['kmp'];
   $u = $ahy[0];
   $p = $ahy[1];
  $qscek = $db->query("SELECT user.*, komplek.* from user inner join komplek on user.KD_KOMPLEK = komplek.KD_KOMPLEK WHERE user.USERNAME = '$u' AND user.PASSWORD = '$p' AND user.STATUS_USER = 'A'");
  $row = $qscek->fetch(PDO::FETCH_ASSOC);
  if ($u == $row['USERNAME'] AND $p == $row['PASSWORD']) {
  $NAMA_USER = $row['NAMA_USER'];
  $NK = $row['NAMA_KOMPLEK'];
?>

<?php include'bagian/header.php'; ?>
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
      <?php include 'bagian/sidebar.php'; ?>
      <!-- BEGIN PAGE -->
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                   <h3 class="page-title">
                     <center>Halaman Administrator Sistem Informasi Santri Pondok Pesantren</center>
                   </h3>
                   <!-- <ul class="breadcrumb">
                       <li>
                           <a href="#">Home</a>
                           <span class="divider">/</span>
                       </li>
                       <li>
                           <a href="#">Sample Pages</a>
                           <span class="divider">/</span>
                       </li>
                       <li class="active">
                           Blank
                       </li>
                       <li class="pull-right search-wrap">
                           <form action="http://thevectorlab.net/metrolab/search_result.html" class="hidden-phone">
                               <div class="input-append search-input-area">
                                   <input class="" id="appendedInputButton" type="text">
                                   <button class="btn" type="button"><i class="icon-search"></i> </button>
                               </div>
                           </form>
                       </li>
                   </ul> -->
                   <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
                <div class="span12">
            <?php
            $page = (isset($_REQUEST['page'])&& $_REQUEST['page'] != NULL)?$_REQUEST['page']:'';
        if(file_exists("page/".$page.".php"))
        {
          include("page/".$page.".php");
        }else{
          include("page/home.php");
        }
            ?>
            <!-- END PAGE CONTENT-->
                </div>
            </div>
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->
   </div>
   <!-- END CONTAINER -->
   <?php include 'bagian/footer.php'; ?>

<?php
  }else{
    echo '<META HTTP-EQUIV="Refresh" content="0; URL=../index.php">';
  }
}else{
  echo '<META HTTP-EQUIV="Refresh" content="0; URL=../index.php">';
}
?>  
