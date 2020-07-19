<?php
$qs = $db->query("SELECT * from prosentase_kelamin WHERE jenkel = 'Laki-laki'");
$rs = $qs->fetch(PDO::FETCH_ASSOC);

$qs2 = $db->query("SELECT * from total_santri");
$rs2 = $qs2->fetch(PDO::FETCH_ASSOC);

$qs3 = $db->query("SELECT count(*) AS jum_asrama from komplek WHERE KD_KOMPLEK != '0' ");
$rs3 = $qs3->fetch(PDO::FETCH_ASSOC);

$qs4 = $db->query("SELECT * from prosentase_kelamin WHERE jenkel = 'Perempuan'");
$rs4 = $qs4->fetch(PDO::FETCH_ASSOC);
?>
<!-- BEGIN INFO DATA SANTRI-->
        <div class="metro-nav">
            
            <div class="metro-nav-block nav-block-blue double" >
                <a data-original-title="" href="">
                    <i class="icon-home"></i>
                    <div class="info"><?php echo $rs3['jum_asrama']; ?></div>
                    <div class="status">Total Asrama</div>
                </a>
            </div>
            <div class="metro-nav-block nav-block-yellow">
                <a data-original-title="" href="">
                    <i class="icon-male"></i>
                    <div class="info"><?php echo $rs['jum_per_kelamin']; ?> </div>
                    <div class="status">Total Santriwan</div>
                </a>
            </div>
            <div class="metro-nav-block nav-block-red">
                <a data-original-title="" href="">
                    <i class="icon-female"></i>
                    <div class="info"><?php echo $rs4['jum_per_kelamin']; ?> </div>
                    <div class="status">Total Santriwati</div>
                </a>
            </div>
            <div class="metro-nav-block nav-block-purple double">
                <a data-original-title="" href="">
                    <i class="icon-group"></i>
                    <div class="info"><?php echo $rs2['Total']; ?> </div>
                    <div class="status">Total Santri</div>
                </a>
            </div>
        </div>
<!-- END INFO DATA SANTRI-->

        <!-- BEGIN BLANK PAGE PORTLET-->
        <div class="widget green">
            <div class="widget-title">
                <h4><i class="icon-home"></i> Dashboard</h4>
              <span class="tools">
                  <a href="javascript:;" class="icon-chevron-down"></a>
                  <a href="javascript:;" class="icon-remove"></a>
              </span>
            </div>
            <div class="widget-body">
            <center>
            <span class="photo"><img src="../asset/login/img/logoalmunawir.png" width="150px" height="150px" alt="Si SANTRI" /></span>
            </center>
              <h3><center><b>Assalamu'alaikum Wr. Wb. <?php echo $NAMA_USER; ?><br/> </b>
              Selamat Datang di halaman administrator <b>Sistem Informasi Santri Pondok Pesantren</b>, anda login sebagai <b>
              <?php
              if ($lvl == 1) {
                $kelola = '<li> Kelola Data Master Sistem</li>
                <li> Kelola Data Admin Komplek</li>
                <li> Kelola Data Santri</li>';
                echo $l;
              }elseif ($lvl == 2) {
                $kelola = '<li> Kelola Data Santri Komplek</li>';
                echo $l.' '.$NK;
              } 
                
              ?>
              </b><br><b> Pondok Pesantren "Al - Munawwir" Krapyak Yogyakarta</b></center></h3>
              <p align='justify'>
              Silahkan kelola data santri pondok pesantren :
              <ol>
              <?php echo $kelola; ?>
              </ol>
              </p>
              <?php
                include "../config/lib/fungsi_indotgl.php";
                include "../config/lib/library.php";
                                 echo "<p>&nbsp;</p>
                                <p align=right>Hari ini : $hari_ini, ";
                                  echo tgl_indo(date("Y m d"));
                                  echo " | ";
                                  echo date("H:i:s");
                                  echo " WIB</p>";
              ?>
            </div>
        </div>
        <!-- END BLANK PAGE PORTLET-->
