<!-- BEGIN SIDEBAR -->
<div class="sidebar-scroll">
    <div id="sidebar" class="nav-collapse collapse">

        <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
        <div class="navbar-inverse">
            <form class="navbar-search visible-phone">
                <input type="text" class="search-query" placeholder="Search" />
            </form>
        </div>
        <!-- END RESPONSIVE QUICK SEARCH FORM -->
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="sidebar-menu">
            <li class="sub-menu <?php $aktif = $_GET['page']=="home"?"active":""; echo $aktif;?>">
                <a class="" href="dashboard">
                    <i class="icon-dashboard"></i>
                    <span>Beranda</span>
                </a>
            </li>
            <?php 
            if ($lvl == 1) {
            ?>

            <li class="sub-menu <?php if ($_GET['page'] == "master-komplek" OR $_GET['page']=="master-pendidikan-formal" OR $_GET['page']=="master-tahun-ajaran" OR $_GET['page']=="master-pendidikan-wali" OR $_GET['page']=="master-pendidikan-almunawwir" OR $_GET['page']=="master-penghasilan" OR $_GET['page'] == "master-pekerjaan" OR $_GET['page'] == "data-adminl") { echo "active"; } else{ echo NULL;}?>">
              <a href="javascript:;" class="">
                  <i class="icon-book"></i>
                  <span>Data Master Sistem</span>
                  <span class="arrow"></span>
              </a>
              <ul class="sub">
                  <li><a class="<?php $aktif = $_GET['page']=="master-pendidikan-formal"?"active":""; echo $aktif;?>" href="master-pendidikan-formal">Pendidikan Formal</a></li>
                  <li><a class="<?php $aktif = $_GET['page']=="master-komplek"?"active":""; echo $aktif;?>" href="master-komplek">Komplek</a></li>
                  <li><a class="<?php $aktif = $_GET['page']=="master-tahun-ajaran"?"active":""; echo $aktif;?>" href="master-tahun-ajaran">Tahun Ajaran</a></li>
                  <!-- <li class="active"><a class="" href="form_component.html">Bahasa</a></li> -->
                  <li><a class="<?php $aktif = $_GET['page']=="master-pendidikan-almunawwir"?"active":""; echo $aktif;?>" href="master-pendidikan-almunawwir">Pendidikan Al Munawwir</a></li>
                  <li><a class="<?php $aktif = $_GET['page']=="master-pendidikan-wali"?"active":""; echo $aktif;?>" href="master-pendidikan-wali">Pendidikan Wali</a></li>
                  <li><a class="<?php $aktif = $_GET['page']=="master-pekerjaan"?"active":""; echo $aktif;?>" href="master-pekerjaan">Pekerjaan Wali</a></li>
                  <li><a class="<?php $aktif = $_GET['page']=="master-penghasilan"?"active":""; echo $aktif;?>" href="master-penghasilan">Penghasilan Wali</a></li>
                  <!-- <li><a class="" href="dropzone.html">Minat</a></li> -->
              </ul>
            </li>
            <li class="sub-menu <?php $aktif = $_GET['page']=="data-admin"?"active":""; echo $aktif;?>">
                <a class="" href="data-admin">
                    <i class="icon-user"></i>
                    <span>Data Admin Komplek</span>
                </a>
            </li>
            
            <?php
            }elseif ($lvl == 2) {
              echo NULL;
            }
            ?>
            
            <li class="sub-menu <?php $aktif = $_GET['page']=="data-santri"?"active":""; echo $aktif;?>">
                <a class="" href="data-santri">
                    <i class="icon-group"></i>
                    <span>Data Santri</span>
                </a>
            </li>
            <li class="sub-menu <?php $aktif = $_GET['page']=="grafik-jumlah-santri"?"active":""; echo $aktif;?>">
                <a class="" href="grafik-santri">
                    <i class="icon-bar-chart"></i>
                    <span>Grafik Santri</span>
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
<!-- END SIDEBAR -->
