<?php
$nisp = $_GET['nisp'];
$sql = $db->query("SELECT santri.*, komplek.*, penghasilan.*, pendidikan_formal.*, tahun_ajaran.*, pendidikan_wali.*, pekerjaan_wali.*, pendidikan_almunawir.* FROM santri inner join komplek on santri.KD_KOMPLEK = komplek.KD_KOMPLEK inner join penghasilan on santri.KD_PENGHASILAN = penghasilan.KD_PENGHASILAN inner join pendidikan_formal on santri.KD_PENFORMAL = pendidikan_formal.KD_PENFORMAL inner join tahun_ajaran on santri.KD_THNAJARAN = tahun_ajaran.KD_THNAJARAN inner join pendidikan_wali on santri.PENDIDIKAN_AYAH = pendidikan_wali.KD_PNDWALI inner join pekerjaan_wali on santri.PEKERJAAN_AYAH = pekerjaan_wali.KD_PEKERJAAN inner join pendidikan_almunawir on santri.PENDIDIKAN_ALMUNAWWIR = pendidikan_almunawir.KD_PNDALMUNAWIR WHERE md5(sha1(md5(sha1(sha1(santri.NISP))))) = '$nisp' ");
$data = $sql->fetch(PDO::FETCH_ASSOC);
$KD_PNDWALI = $data['PENDIDIKAN_IBU'];
    $KD_PEKERJAAN = $data['PEKERJAAN_IBU'];
    $TGL_LAHIR = $data['TGL_LAHIR'];
    $format = date('d F Y', strtotime($TGL_LAHIR));
    $LAUNDRY = $data['LAUNDRY'];
    if ($LAUNDRY == 1) {
      $lbl = 'Tidak Pernah';
    }elseif ($LAUNDRY == 2) {
      $lbl = 'Jarang';
    }elseif ($LAUNDRY == 3) {
      $lbl = 'Sering';
    }elseif ($LAUNDRY == 4) {
      $lbl = 'Sering Sekali';
    }

$sql2 = $db->query("SELECT pendidikan_wali.PENDIDIKAN_WALI, pekerjaan_wali.PEKERJAAN_WALI from santri inner join pendidikan_wali on santri.PENDIDIKAN_IBU = pendidikan_wali.KD_PNDWALI inner join pekerjaan_wali on santri.PEKERJAAN_IBU = pekerjaan_wali.KD_PEKERJAAN ");
$data2 = $sql2->fetch(PDO::FETCH_ASSOC);


?>


<!-- BEGIN BLANK PAGE PORTLET-->
<div class="widget blue">
    <div class="widget-title">
        <h4><i class="icon-th-list"></i> Detail Data Santri</h4>
      <span class="tools">
          <a href="javascript:;" class="icon-chevron-down"></a>
          <a href="javascript:;" class="icon-remove"></a>
      </span>
    </div>
    <div class="widget-body">
      <div class="row-fluid">
           <div class="span12">
               <div class="text-center">
                <span class="photo">
                   <img alt="Foto Santri" src="../asset/img/fotosantri/<?php echo $data['FOTO_SANTRI']; ?>" width="250px" height="370px" ></span>
               </div>
           </div>
           <div class="bs-docs-example">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a data-toggle="tab" href="#home">Data Umum Santri</a></li>
                    <li><a data-toggle="tab" href="#riwayat">Riwayat Pendidikan Santri</a></li>
                    <li><a data-toggle="tab" href="#wali">Data Orang Tua / Wali</a></li>
                    <li><a data-toggle="tab" href="#more">Data Lain-lain</a></li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div id="home" class="tab-pane fade in active">
                        <dl class="dl-horizontal">
                            <dt>NISP</dt>
                            <dd><?php echo $data['NISP']; ?></dd>
                            <dt>NIK</dt>
                            <dd><?php echo $data['NIK']; ?></dd>
                            <dt>Nama Santri</dt>
                            <dd><?php echo $data['NAMA_SANTRI']; ?></dd>
                            <dt>Tempat, Tanggal Lahir</dt>
                            <dd><?php echo $data['TEMPAT_LAHIR']; ?>, <?php echo $format; ?></dd>
                            <dt>Jenis Kelamin</dt>
                            <dd><?php echo $data['JENIS_KELAMIN']; ?></dd>
                            <dt>Pendidikan Formal</dt>
                            <dd><?php echo $data['PENDIDIKAN_FORMAL']; ?></dd>
                            <dt>Komplek</dt>
                            <dd><?php echo $data['NAMA_KOMPLEK']; ?></dd>
                            <dt>Kamar</dt>
                            <dd><?php echo $data['KAMAR']; ?></dd>
                            <dt>Bahasa yang Dikuasai</dt>
                            <dd><?php echo $data['BAHASA_SANTRI']; ?></dd>
                            <dt>Keahlian</dt>
                            <dd><?php echo $data['KEAHLIAN_SANTRI']; ?></dd>
                            <dt>Golongan Darah</dt>
                            <dd><?php echo $data['GOL_DARAH']; ?></dd>
                            <dt>No. HP Santri</dt>
                            <dd><?php echo $data['HP_SANTRI']; ?></dd>
                            <dt>Hobi</dt>
                            <dd><?php echo $data['HOBI_SANTRI']; ?></dd>
                            <dt>Tahun Ajaran</dt>
                            <dd><?php echo $data['TAHUN_AJARAN']; ?></dd>
                            <dt>Alasan Masuk</dt>
                            <dd><?php echo $data['ALASAN_MASUK']; ?></dd>
                        </dl>

                    </div>
                    <div id="riwayat" class="tab-pane fade">
                        <dl class="dl-horizontal">
                            <dt>Pendidikan Al Munawwir</dt>
                            <dd><?php echo $data['PENDIDIKAN_ALMUNAWIR']; ?></dd>
                            <dt>Pendidikan non formal</dt>
                            <dd><?php echo $data['RIWAYAT_PNDNONFORMAL']; ?></dd>
                            <dt>Pendidikan formal</dt>
                            <dd><?php echo $data['RIWAYAT_PNDFORMAL']; ?></dd>
                            <dt>Prestasi yang diraih</dt>
                            <dd><?php echo $data['PRESTASI_SANTRI']; ?></dd>
                        </dl>
                    </div>
                    <div id="wali" class="tab-pane fade">
                        <dl class="dl-horizontal">
                            <dt>No. KK</dt>
                            <dd><?php echo $data['NO_KK']; ?></dd>
                            <dt>NIK Ayah</dt>
                            <dd><?php echo $data['NIK_AYAH']; ?></dd>
                            <dt>Nama Ayah</dt>
                            <dd><?php echo $data['NAMA_AYAH']; ?></dd>
                            <dt>Pendidikan Ayah</dt>
                            <dd><?php echo $data['PENDIDIKAN_WALI']; ?></dd>
                            <dt>Pekerjaan Ayah</dt>
                            <dd><?php echo $data['PEKERJAAN_WALI']; ?></dd>
                            <dt>NIK Ibu</dt>
                            <dd><?php echo $data['NIK_IBU']; ?></dd>
                            <dt>Nama Ibu</dt>
                            <dd><?php echo $data['NAMA_IBU']; ?></dd>
                            <dt>Pendidikan Ibu</dt>
                            <dd><?php echo $data2['PENDIDIKAN_WALI']; ?></dd>
                            <dt>Pekerjaan Ibu</dt>
                            <dd><?php echo $data2['PEKERJAAN_WALI']; ?></dd>
                            <dt>Alamat</dt>
                            <dd><?php echo $data['ALAMAT']; ?></dd>
                            <dt>Jumlah Saudara</dt>
                            <dd><?php echo $data['JML_SAUDARA']; ?></dd>
                            <dt>Penghasilan Wali</dt>
                            <dd><?php echo $data['PENGHASILAN']; ?></dd>
                            <dt>No. HP Wali</dt>
                            <dd><?php echo $data['HP_WALI']; ?></dd>
                        </dl>
                    </div>
                    <div id="more" class="tab-pane fade">
                        <dl class="dl-horizontal">
                            <dt>Bakat dan Minat</dt>
                            <dd><?php echo $data['MINAT_BAKAT']; ?></dd>
                            <dt>No. Plat Kendaraan</dt>
                            <dd><?php echo $data['NO_PLAT']; ?></dd>
                            <dt>Laundry Pakaian</dt>
                            <dd><?php echo $lbl; ?></dd>
                        </dl>
                    </div>
                </div>
            </div>
            <hr>
       </div>
    </div>
</div>
<!-- END BLANK PAGE PORTLET-->
