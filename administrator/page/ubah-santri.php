<?php 
$nisp = $_GET['nisp'];
$sql = $db->query("SELECT santri.*, komplek.*, penghasilan.*, pendidikan_formal.*, tahun_ajaran.*, pendidikan_wali.*, pekerjaan_wali.* FROM santri inner join komplek on santri.KD_KOMPLEK = komplek.KD_KOMPLEK inner join penghasilan on santri.KD_PENGHASILAN = penghasilan.KD_PENGHASILAN inner join pendidikan_formal on santri.KD_PENFORMAL = pendidikan_formal.KD_PENFORMAL inner join tahun_ajaran on santri.KD_THNAJARAN = tahun_ajaran.KD_THNAJARAN inner join pendidikan_wali on santri.PENDIDIKAN_AYAH = pendidikan_wali.KD_PNDWALI inner join pekerjaan_wali on santri.PEKERJAAN_AYAH = pekerjaan_wali.KD_PEKERJAAN WHERE md5(md5(md5(sha1(sha1(santri.NISP))))) = '$nisp' ");
$data = $sql->fetch(PDO::FETCH_ASSOC);
$jk = $data['JENIS_KELAMIN'];
if ($jk == 'Laki-laki') {
  $kjk = 'selected';
}elseif ($jk == 'Perempuan') {
  $kjk = 'selected';
}else{
  $kjk = NULL;
}
$GOL_DARAH = $data['GOL_DARAH'];
if ($GOL_DARAH == 'A') {
  $gd = 'selected';
}elseif ($GOL_DARAH == 'B') {
  $gd = 'selected';
}elseif ($GOL_DARAH == 'AB') {
  $gd = 'selected';
}elseif ($GOL_DARAH == 'O') {
  $gd = 'selected';
}else{
  $gd = NULL;
}

ini_set('display_errors','On');
error_reporting(E_ALL^E_NOTICE);
if (isset($_POST['ubah'])) {

    require_once 'function/function.php';
    $nisp = $_GET['nisp'];
    $nispa = $_POST['nisp'];
    $niksantri = $_POST['niksantri'];
    $namasantri = $_POST['namasantri'];
    $tempatlahir = $_POST['tempatlahir'];
    $tanggallahir = $_POST['tanggallahir'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $pendidikan_formal = $_POST['pendidikan_formal'];
    $kamar = $_POST['kamar'];
    $bahasa = $_POST['bahasa'];
    $keahlian = $_POST['keahlian'];
    $golongandarah = $_POST['golongandarah'];
    $nohp = $_POST['nohp'];
    $hobi = $_POST['hobi'];
    $tahunajaran = $_POST['tahunajaran'];
    $alasanmasuk = $_POST['alasanmasuk'];
    $pendidikan_almunawir = $_POST['pendidikan_almunawir'];
    $pendidikannonformal = $_POST['pendidikannonformal'];
    $pendidikanformalpondok = $_POST['pendidikanformalpondok'];
    $prestasi = $_POST['prestasi'];
    $kk = $_POST['kk'];
    $nikayah = $_POST['nikayah'];
    $namaayah = $_POST['namaayah'];
    $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
    $pendidikan_ayah = $_POST['pendidikan_ayah'];
    $nikibu = $_POST['nikibu'];
    $namaibu = $_POST['namaibu'];
    $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
    $pendidikan_ibu = $_POST['pendidikan_ibu'];
    $penghasilan = $_POST['penghasilan'];
    $bakatminat = $_POST['bakatminat'];
    $noplat = $_POST['noplat'];
    $alamat = $_POST['alamat'];
    $hpwali = $_POST['hpwali'];
    $laundry = $_POST['laundry'];
    $jumlah_saudara = $_POST['jumlah_saudara'];
    if ($lvl == 1) {
        $komplek = $_POST['komplek'];
    }elseif ($lvl == 2) {
        $komplek = $kmp;
    }

    $lokasi_file= $_FILES['fotosantri']['tmp_name'];
    $nama_file  = $_FILES['fotosantri']['name'];
    $size_file  = $_FILES['fotosantri']['size'];
    //$file_ext   = strtolower(end(explode('.', $nama_file)));
    $value = explode(".", $nama_file);
    $file_ext   = strtolower(array_pop($value));
    $file_type  = array('jpg','png');
    $max_size   = 5000000;//500kb

    if (in_array($file_ext, $file_type) === TRUE) {
        if ($size_file > $max_size) {
            echo '<div class="alert alert-danger">
            <button class="close" data-dismiss="alert">×</button>
            <strong>Gagal !</strong> Data Santri Gagal Diubah, Ukuran Foto Terlalu Besar.
            </div>';
        }elseif ($size_file == 0) {
            echo '<div class="alert alert-danger">
            <button class="close" data-dismiss="alert">×</button>
            <strong>Gagal !</strong> Data Santri Gagal Diubah, Ukuran Foto Terlalu 0.
            </div>';
        }else{
            $file = $nama_file;
            $newfile = "Foto".$nispa.".".$file_ext;
            $folder     ="../asset/img/fotosantri/$newfile";
            //move_uploaded_file($lokasi_file,$folder);

             $file2='fotosantri'; //name pada inputan type file
             $dir='../asset/img/fotosantri/';
             $width = 500;//satuan dalam pixel / px
             UploadImageResize($newfile,$file2,$dir,$width);

             try {
                $qis = $db->query("UPDATE `santri` SET `KD_PENFORMAL`='$pendidikan_formal',`KD_KOMPLEK`='$komplek',`KD_PENGHASILAN`='$penghasilan',`KD_THNAJARAN`='$tahunajaran',`NIK`='$niksantri',`NAMA_SANTRI`='$namasantri',`TEMPAT_LAHIR`='$tempatlahir',`TGL_LAHIR`='$tanggallahir',`JENIS_KELAMIN`='$jeniskelamin',`KAMAR`='$kamar',`KEAHLIAN_SANTRI`='$keahlian',`HOBI_SANTRI`='$hobi',`BAHASA_SANTRI`='$bahasa',`HP_SANTRI`='$nohp',`ALASAN_MASUK`='$alasanmasuk',`GOL_DARAH`='$golongandarah',`FOTO_SANTRI`='$newfile',`RIWAYAT_PNDFORMAL`='$pendidikanformalpondok',`RIWAYAT_PNDNONFORMAL`='$pendidikannonformal',`PRESTASI_SANTRI`='$prestasi',`NO_KK`='$kk',`NIK_AYAH`='$nikayah',`NAMA_AYAH`='$namaayah',`NIK_IBU`='$nikibu',`NAMA_IBU`='$namaibu',`ALAMAT`='$alamat',`JML_SAUDARA`='$jumlah_saudara',`HP_WALI`='$hpwali',`MINAT_BAKAT`='$bakatminat',`NO_PLAT`='$noplat',`LAUNDRY`='$laundry',`PENDIDIKAN_ALMUNAWWIR`='$pendidikan_almunawir',`PENDIDIKAN_AYAH`='$pendidikan_ayah',`PENDIDIKAN_IBU`='$pendidikan_ibu',`PEKERJAAN_AYAH`='$pekerjaan_ayah',`PEKERJAAN_IBU`='$pekerjaan_ibu' WHERE md5(md5(md5(sha1(sha1(`NISP`))))) = '$nisp' ");
                    echo "<script language='javascript'> alert ('Data Santri Berhasil Diubah');</script>";
                    echo '<META HTTP-EQUIV="Refresh" content="0; URL=data-santri">';
             } catch (PDOException $e) {
                 echo '<div class="alert alert-danger">
                    <button class="close" data-dismiss="alert">×</button>
                    <strong>Gagal !</strong> Data Santri Gagal Diubah, query update bermasalah.
                    </div>';
             }
        }
    }else{
        echo '<div class="alert alert-danger">
            <button class="close" data-dismiss="alert">×</button>
            <strong>Gagal !</strong> Data Santri Gagal Diubah, Ekstensi Foto Tidak Diijinkan.
            </div>';
    }


}
?>

<!-- BEGIN BLANK PAGE PORTLET-->
<div class="widget green">
    <div class="widget-title">
        <h4><i class="icon-pencil"></i> Ubah Data Santri</h4>
      <span class="tools">
          <a href="javascript:;" class="icon-chevron-down"></a>
          <a href="javascript:;" class="icon-remove"></a>
      </span>
    </div>
    <div class="widget-body">
    
      <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal"> 
        <div class="control-group">
          <label class="control-label">NISP</label>
          <div class="controls">
              <input type="number" name='nisp' value="<?php echo $data['NISP']; ?>" class="span8" readonly />
          </div>
        </div>  
        <div class="control-group">
          <label class="control-label">NIK</label>
          <div class="controls">
              <input type="number" name='niksantri' value="<?php echo $data['NIK']; ?>" class="span8"  />
          </div>
        </div>  
        <div class="control-group">
            <label class="control-label">Nama Santri</label>
            <div class="controls">
                <input type="text" name='namasantri' id="nama" class="span8" value="<?php echo $data['NAMA_SANTRI']; ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Tempat Tanggal Lahir</label>
            <div class="controls">
                <input type="text" name='tempatlahir' id="nama" class="span5" value="<?php echo $data['TEMPAT_LAHIR']; ?>" />
                <input type="date" name='tanggallahir' id="nama" class="span3" value="<?php echo $data['TGL_LAHIR']; ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Jenis Kelamin</label>
            <div class="controls">
                <select class="span3" name="jeniskelamin" data-placeholder="Choose a Category" tabindex="1">
                    <option value="">- Pilih Jenis Kelamin -</option>
                    <option value="Laki-laki" <?php echo $kjk; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php echo $kjk; ?>>Perempuan</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Pendidikan Formal yang Dijalani</label>
            <div class="controls">
                <select class="span3" name="pendidikan_formal" data-placeholder="Choose a Category" tabindex="1">
                <option value="">- Pilih Pendidikan -</option>
                <?php 
                $qspf = $db->query("SELECT * from pendidikan_formal");
                while ($rsl = $qspf->fetch(PDO::FETCH_ASSOC)) {
                   $KD_PENFORMAL = $data['KD_PENFORMAL'];
                    if ($KD_PENFORMAL == $rsl['KD_PENFORMAL']) {
                      $pnf = 'selected';
                    }else{
                      $pnf = NULL;
                    }
                    echo '<option value="'.$rsl["KD_PENFORMAL"].'" '.$pnf.'>'.$rsl["KD_PENFORMAL"].' '.$rsl["PENDIDIKAN_FORMAL"].'</option>';
                }
                ?>
                </select>
            </div>
        </div>
        <?php 
        if ($lvl == 1) {
        ?>
        <div class="control-group">
            <label class="control-label">Komplek</label>
            <div class="controls">
                <select class="span3" name="komplek" data-placeholder="Choose a Category" tabindex="1">
                    <option value="">- Pilih Komplek -</option>
                <?php 
                $qskom = $db->query("SELECT * from komplek");
                while ($rsl2 = $qskom->fetch(PDO::FETCH_ASSOC)) {
                   $KD_KOMPLEK = $data['KD_KOMPLEK'];
                    if ($KD_KOMPLEK == $rsl2['KD_KOMPLEK']) {
                      $kk = 'selected';
                    }else{
                      $kk = NULL;
                    }
                    echo '<option value="'.$rsl2["KD_KOMPLEK"].'" '.$kk.'>'.$rsl2["KD_KOMPLEK"].' '.$rsl2["NAMA_KOMPLEK"].'</option>';
                }
                ?>
                </select>
            </div>
        </div>
        <?php 
      }else{
        echo NULL;
      } ?>
        <div class="control-group">
            <label class="control-label">Kamar</label>
            <div class="controls">
                <input type="text" name='kamar' id="nama" class="span8" value="<?php echo $data['KAMAR']; ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Bahasa yang dikuasai</label>
            <div class="controls">
                <input type="text" name='bahasa' id="nama" class="span8" value="<?php echo $data['BAHASA_SANTRI']; ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Keahlian</label>
            <div class="controls">
                <input type="text" name='keahlian' id="nama" class="span8" value="<?php echo $data['KEAHLIAN_SANTRI']; ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Golongan Darah</label>
            <div class="controls">
                <select class="span3" name="golongandarah" data-placeholder="Choose a Category" tabindex="1">
                    <option value="">- Pilih Golongan Darah -</option>
                    <option value="A" <?php echo $gd; ?>>A</option>
                    <option value="B" <?php echo $gd; ?>>B</option>
                    <option value="AB" <?php echo $gd; ?>>AB</option>
                    <option value="O" <?php echo $gd; ?>>O</option>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">No HP Santri</label>
            <div class="controls">
                <input type="number" name='nohp' id="nama" class="span6" value="<?php echo $data['HP_SANTRI']; ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Hobi</label>
            <div class="controls">
                <input type="text" name='hobi' id="nama" class="span8" value="<?php echo $data['HOBI_SANTRI']; ?>" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Tahun Ajaran</label>
            <div class="controls">
                <select class="span3" name="tahunajaran" data-placeholder="Choose a Category" tabindex="1">
                    <option value="">- Pilih Tahun Ajaran -</option>
                <?php 
                $qsthn = $db->query("SELECT * from tahun_ajaran");
                while ($rsl3 = $qsthn->fetch(PDO::FETCH_ASSOC)) {
                   $KD_THNAJARAN = $data['KD_THNAJARAN'];
                    if ($KD_THNAJARAN == $rsl3['KD_THNAJARAN']) {
                      $ta = 'selected';
                    }else{
                      $ta = NULL;
                    }
                    echo '<option value="'.$rsl3["KD_THNAJARAN"].'" '.$ta.'>'.$rsl3["KD_THNAJARAN"].' '.$rsl3["TAHUN_AJARAN"].'</option>';
                }
                ?>
                </select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Alasan Masuk Ponpes Al-Munawwir</label>
            <div class="controls">
                <textarea class="span8 ckeditor" name="alasanmasuk" rows="5"><?php echo $data['ALASAN_MASUK']; ?></textarea>
            </div>
        </div>
    <div class="control-group">
    <label class="control-label">Foto Santri</label>
    <div class="controls">
    <div data-provides="fileupload" class="fileupload fileupload-new">
    <div style="width: 200px; height: 150px;" class="fileupload-new thumbnail">
    <img alt="" src="../asset/img/fotosantri/<?php echo $data['FOTO_SANTRI']; ?>">
    </div>
    <div style="max-width: 200px; max-height: 150px; line-height: 20px;" class="fileupload-preview fileupload-exists thumbnail"></div>
    <div>
    <span class="btn btn-file"><span class="fileupload-new">Select image</span>
    <span class="fileupload-exists">Change</span>
    <input type="file" name="fotosantri" class="default" required value="<?php echo $data['FOTO_SANTRI']; ?>"></span>
    <a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Remove</a>
    </div>
    </div>
    <span class="label label-important">NOTE!</span>
    <span>
    Ukuran maksimal foto <= 500 Kb, ekstensi foto berupa: Jpg dan Png.
    </span>
    </div>
    </div>
    
                            <div class="control-group">
                                <label class="control-label">Pendidikan Al Munawwir</label>
                                <div class="controls">
                                    <select class="span6" name="pendidikan_almunawir" data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">- Pilih Pendidikan -</option>
                                        <?php 
                                        $qspndal = $db->query("SELECT * from pendidikan_almunawir");
                                        while ($rsl9 = $qspndal->fetch(PDO::FETCH_ASSOC)) {
                                           $PENDIDIKAN_ALMUNAWWIR = $data['PENDIDIKAN_ALMUNAWWIR'];
                                        if ($PENDIDIKAN_ALMUNAWWIR == $rsl9['KD_PNDALMUNAWIR']) {
                                          $pna = 'selected';
                                        }else{
                                          $pna = NULL;
                                        }
                                            echo '<option value="'.$rsl9['KD_PNDALMUNAWIR'].'" '.$pna.'>'.$rsl9['PENDIDIKAN_ALMUNAWIR'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Pendidikan non Formal</label>
                                <div class="controls">
                                    <textarea class="span8 ckeditor" name="pendidikannonformal" rows="5"><?php echo $data['RIWAYAT_PNDNONFORMAL']; ?></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Pendidikan Formal</label>
                                <div class="controls">
                                    <textarea class="span8 ckeditor" name="pendidikanformalpondok" rows="5"><?php echo $data['RIWAYAT_PNDFORMAL']; ?></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Prestasi yang pernah diraih</label>
                                <div class="controls">
                                    <textarea class="span8 ckeditor" name="prestasi" rows="5"><?php echo $data['PRESTASI_SANTRI']; ?></textarea>
                                </div>
                            </div>


                            <hr>
                            <div class="control-group">
                              <label class="control-label">Nomor KK</label>
                              <div class="controls">
                                  <input type="number" name='kk' value="<?php echo $data['NO_KK']; ?>" class="span8"  />
                              </div>
                            </div>  
                            <div class="control-group">
                              <label class="control-label">NIK Ayah/Wali Santri</label>
                              <div class="controls">
                                  <input type="number" name='nikayah' value="<?php echo $data['NIK_AYAH']; ?>" class="span8"  />
                              </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label">Nama Ayah/Wali Santri</label>
                              <div class="controls">
                                  <input type="text" name='namaayah' value="<?php echo $data['NAMA_AYAH']; ?>" class="span8"  />
                              </div>
                            </div>    
                            <div class="control-group">
                                <label class="control-label">Pendidikan Ayah/Wali Santri</label>
                                <div class="controls">
                                    <select class="span3" name="pendidikan_ayah" data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">- Pilih Pendidikan -</option>
                                        <?php 
                                        $qspndwali = $db->query("SELECT * from pendidikan_wali");
                                        while ($rsl4 = $qspndwali->fetch(PDO::FETCH_ASSOC)) {
                                           $PENDIDIKAN_AYAH = $data['PENDIDIKAN_AYAH'];
                                        if ($PENDIDIKAN_AYAH == $rsl4['KD_PNDWALI']) {
                                          $pna = 'selected';
                                        }else{
                                          $pna = NULL;
                                        }
                                            echo '<option value="'.$rsl4['KD_PNDWALI'].'" '.$pna.'>'.$rsl4['PENDIDIKAN_WALI'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Pekerjaan Ayah/Wali Santri</label>
                                <div class="controls">
                                    <select class="span3" name="pekerjaan_ayah" data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">- Pilih Pekerjaan -</option>
                                        <?php 
                                        $qspekerjaan = $db->query("SELECT * from pekerjaan_wali");
                                        while ($rsl5 = $qspekerjaan->fetch(PDO::FETCH_ASSOC)) {
                                           $PEKERJAAN_AYAH = $data['PEKERJAAN_AYAH'];
                                        if ($PEKERJAAN_AYAH == $rsl5['KD_PEKERJAAN']) {
                                          $pka = 'selected';
                                        }else{
                                          $pka = NULL;
                                        }
                                            echo '<option value="'.$rsl5['KD_PEKERJAAN'].'" '.$pka.'>'.$rsl5['PEKERJAAN_WALI'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label">NIK Ibu/Wali Santri</label>
                              <div class="controls">
                                  <input type="number" name='nikibu' class="span8" value="<?php echo $data['NIK_IBU']; ?>" />
                              </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label">Nama Ibu/Wali Santri</label>
                              <div class="controls">
                                  <input type="text" name='namaibu' class="span8" value="<?php echo $data['NAMA_IBU']; ?>" />
                              </div>
                            </div>    
                            <div class="control-group">
                                <label class="control-label">Pendidikan Ibu/Wali Santri</label>
                                <div class="controls">
                                    <select class="span3" name="pendidikan_ibu" data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">- Pilih Pendidikan -</option>
                                        <?php 
                                        $qspndwali2 = $db->query("SELECT * from pendidikan_wali");
                                        while ($rsl6 = $qspndwali2->fetch(PDO::FETCH_ASSOC)) {
                                           $PENDIDIKAN_IBU = $data['PENDIDIKAN_IBU'];
                                        if ($PENDIDIKAN_IBU == $rsl6['KD_PNDWALI']) {
                                          $pni = 'selected';
                                        }else{
                                          $pni = NULL;
                                        }
                                            echo '<option value="'.$rsl6['KD_PNDWALI'].'" '.$pni.'>'.$rsl6['PENDIDIKAN_WALI'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Pekerjaan Ibu/Wali Santri</label>
                                <div class="controls">
                                    <select class="span3" name="pekerjaan_ibu" data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">- Pilih Pekerjaan -</option>
                                        <?php 
                                        $qspekerjaan2 = $db->query("SELECT * from pekerjaan_wali");
                                        while ($rsl7 = $qspekerjaan2->fetch(PDO::FETCH_ASSOC)) {
                                          $PEKERJAAN_IBU = $data['PEKERJAAN_IBU'];
                                        if ($PEKERJAAN_IBU == $rsl7['KD_PEKERJAAN']) {
                                          $pki = 'selected';
                                        }else{
                                          $pki = NULL;
                                        }
                                            
                                            echo '<option value="'.$rsl7['KD_PEKERJAAN'].'" '.$pki.'>'.$rsl7['PEKERJAAN_WALI'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Alamat</label>
                                <div class="controls">
                                    <textarea class="span8 ckeditor" name="alamat" rows="5"><?php echo $data['ALAMAT']; ?></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label">Jumlah Saudara Kandung</label>
                              <div class="controls">
                                  <input type="number" name='jumlah_saudara' class="span3" value="<?php echo $data['JML_SAUDARA']; ?>"  />
                              </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Penghasilan Ayah/Ibu/Wali Santri</label>
                                <div class="controls">
                                    <select class="span3" name="penghasilan" data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">- Pilih Penghasilan -</option>
                                        <?php 
                                        $qspenghasilan = $db->query("SELECT * from penghasilan");
                                        while ($rsl8 = $qspenghasilan->fetch(PDO::FETCH_ASSOC)) {
                                          $KD_PENGHASILAN = $data['KD_PENGHASILAN'];
                                        if ($KD_PENGHASILAN == $rsl8['KD_PENGHASILAN']) {
                                          $png = 'selected';
                                        }else{
                                          $png = NULL;
                                        }
                                            echo '<option value="'.$rsl8['KD_PENGHASILAN'].'" '.$png.'>'.$rsl8['PENGHASILAN'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label">No HP Ayah/Ibu/Wali Santri</label>
                              <div class="controls">
                                  <input type="number" name='hpwali' class="span6" value="<?php echo $data['HP_WALI']; ?>" />
                              </div>
                            </div>
                            <hr>
        <div class="control-group">
                                <label class="control-label">Bakat & Minat</label>
                                <div class="controls">
                                    <textarea class="span8 ckeditor" name="bakatminat" rows="5"><?php echo $data['MINAT_BAKAT']; ?></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label">Nomor plat kendaraan <i>jika tidak ada silahkan diisi (-)</i> </label>
                              <div class="controls">
                                  <input type="text" name='noplat' class="span3" value="<?php echo $data['NO_PLAT']; ?>" />
                              </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Laundry Pakaian</label>
                                <div class="controls">
                                    <select class="span3" name="laundry" data-placeholder="Choose a Category" tabindex="1">
                                        <option value="0">Tidak Pernah</option>
                                        <option value="1">Jarang</option>
                                        <option value="2">Sering</option>
                                        <option value="3">Sering Sekali</option>
                                    </select>
                                </div>
                            </div>
<div class="text-center">
    <button class="btn btn-large btn-info" type="submit" name="ubah">Ubah Data Santri</button>
</div>
</form>
    </div>
</div>
<!-- END BLANK PAGE PORTLET-->
