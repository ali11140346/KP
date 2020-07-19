<?php 
// $tanggal1 = new DateTime("01-02-2018");
// $tanggal2 = new DateTime();
// $perbedaan = $tanggal2->diff($tanggal1)->format("%a");
// echo $perbedaan;
ini_set('display_errors','On');
error_reporting(E_ALL^E_NOTICE);
if (isset($_POST['simpan'])) {

    require_once 'function/function.php';

    $nisp = $_POST['nisp'];
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
            <strong>Gagal !</strong> Data Santri Gagal Dibuat, Ukuran Foto Terlalu Besar.
            </div>';
        }elseif ($size_file == 0) {
            echo '<div class="alert alert-danger">
            <button class="close" data-dismiss="alert">×</button>
            <strong>Gagal !</strong> Data Santri Gagal Dibuat, Ukuran Foto Terlalu 0.
            </div>';
        }else{
            $file = $nama_file;
            $newfile = "Foto".$nisp.".".$file_ext;
            $folder     ="../asset/img/fotosantri/$newfile";
            //move_uploaded_file($lokasi_file,$folder);

             $file2='fotosantri'; //name pada inputan type file
             $dir='../asset/img/fotosantri/';
             $width = 354;//satuan dalam pixel / px
             UploadImageResize($newfile,$file2,$dir,$width);

             try {
                $qis = $db->query("INSERT INTO `santri`(`NISP`, `KD_PENFORMAL`, `KD_KOMPLEK`, `KD_PENGHASILAN`, `KD_THNAJARAN`, `NIK`, `NAMA_SANTRI`, `TEMPAT_LAHIR`, `TGL_LAHIR`, `JENIS_KELAMIN`, `KAMAR`, `KEAHLIAN_SANTRI`, `HOBI_SANTRI`, `BAHASA_SANTRI`, `HP_SANTRI`, `ALASAN_MASUK`, `GOL_DARAH`, `FOTO_SANTRI` , `RIWAYAT_PNDFORMAL`, `RIWAYAT_PNDNONFORMAL`, `PRESTASI_SANTRI`,  `PENDIDIKAN_ALMUNAWWIR`, `NO_KK`, `NIK_AYAH`, `NAMA_AYAH`, `NIK_IBU`, `NAMA_IBU`, `ALAMAT`, `JML_SAUDARA`, `HP_WALI`, `PENDIDIKAN_AYAH`, `PENDIDIKAN_IBU`, `PEKERJAAN_AYAH`, `PEKERJAAN_IBU`,`MINAT_BAKAT`, `NO_PLAT`, `LAUNDRY`) VALUES ('$nisp','$pendidikan_formal','$komplek','$penghasilan','$tahunajaran','$niksantri','$namasantri','$tempatlahir','$tanggallahir','$jeniskelamin','$kamar','$keahlian','$hobi','$bahasa','$nohp','$alasanmasuk','$golongandarah','$newfile','$pendidikanformalpondok','$pendidikannonformal','$prestasi','$pendidikan_almunawir','$kk','$nikayah','$namaayah','$nikibu','$namaibu','$alamat','$jumlah_saudara','$hpwali','$pendidikan_ayah','$pendidikan_ibu','$pekerjaan_ayah','$pekerjaan_ibu','$bakatminat','$noplat','$laundry')");
                // $qis = $db->prepare("INSERT INTO `santri`(`NISP`, `KD_PENFORMAL`, `KD_KOMPLEK`, `KD_PENGHASILAN`, `KD_THNAJARAN`, `NIK`, `NAMA_SANTRI`, `TEMPAT_LAHIR`, `TGL_LAHIR`, `JENIS_KELAMIN`, `KAMAR`, `KEAHLIAN_SANTRI`, `HOBI_SANTRI`, `BAHASA_SANTRI`, `HP_SANTRI`, `ALASAN_MASUK`, `GOL_DARAH`, `FOTO_SANTRI`, `RIWAYAT_PNDFORMAL`, `RIWAYAT_PNDNONFORMAL`, `PRESTASI_SANTRI`, `NO_KK`, `NIK_AYAH`, `NAMA_AYAH`, `NIK_IBU`, `NAMA_IBU`, `ALAMAT`, `JML_SAUDARA`, `HP_WALI`, `MINAT_BAKAT`, `NO_PLAT`, `LAUNDRY`, `PENDIDIKAN_ALMUNAWWIR`, `PENDIDIKAN_AYAH`, `PENDIDIKAN_IBU`, `PEKERJAAN_AYAH`, `PEKERJAAN_IBU`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                 
                //  $qis->bindParam(1, $nisp);
                //     $qis->bindParam(2, $pendidikan_formal);
                //     $qis->bindParam(3, $komplek);
                //     $qis->bindParam(4, $penghasilan);
                //     $qis->bindParam(5, $tahunajaran);
                //     $qis->bindParam(6, $niksantri);
                //     $qis->bindParam(7, $namasantri);
                //     $qis->bindParam(8, $tempatlahir);
                //     $qis->bindParam(9, $tanggallahir);
                //     $qis->bindParam(10, $jeniskelamin);
                //     $qis->bindParam(11, $kamar);
                //     $qis->bindParam(12, $keahlian);
                //     $qis->bindParam(13, $hobi);
                //     $qis->bindParam(14, $bahasa);
                //     $qis->bindParam(15, $nohp);
                //     $qis->bindParam(16, $alasanmasuk);
                //     $qis->bindParam(17, $golongandarah);
                //     $qis->bindParam(18, $newfile);
                //     $qis->bindParam(19, $pendidikanformalpondok);
                //     $qis->bindParam(20, $pendidikannonformal);
                //     $qis->bindParam(21, $prestasi);
                //     $qis->bindParam(22, $kk);
                //     $qis->bindParam(23, $nikayah);
                //     $qis->bindParam(24, $namaayah);
                //     $qis->bindParam(25, $nikibu);
                //     $qis->bindParam(26, $namaibu);
                //     $qis->bindParam(27, $alamat);
                //     $qis->bindParam(28, $jumlah_saudara);
                //     $qis->bindParam(29, $hpwali);
                //     $qis->bindParam(30, $bakatminat);
                //     $qis->bindParam(31, $noplat);
                //     $qis->bindParam(32, $laundry);
                //     $qis->bindParam(32, $pendidikan_almunawir);
                //     $qis->bindParam(34, $pendidikan_ayah);
                //     $qis->bindParam(35, $pendidikan_ibu);
                //     $qis->bindParam(36, $pekerjaan_ayah);
                //     $qis->bindParam(37, $pekerjaan_ibu);

                //     $qis->execute();
                    echo '<div class="alert alert-success">
                    <button class="close" data-dismiss="alert">×</button>
                    <strong>Sukses !</strong> Data Santri Berhasil Dibuat.
                    </div>';
             } catch (PDOException $e) {
                 echo '<div class="alert alert-danger">
                    <button class="close" data-dismiss="alert">×</button>
                    <strong>Gagal !</strong> Data Santri Gagal Dibuat, query insert bermasalah.
                    </div>';
             }
        }
    }else{
        echo '<div class="alert alert-danger">
            <button class="close" data-dismiss="alert">×</button>
            <strong>Gagal !</strong> Data Santri Gagal Dibuat, Ekstensi Foto Tidak Diijinkan.
            </div>';
    }


}
?>
<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid">
    <div class="span12">
        <div class="widget box blue">
            <div class="widget-title">
                <h4>
                    <i class="icon-plus"></i> Form Tambah Data Santri Baru</span>
                </h4>
            <span class="tools">
               <a href="javascript:;" class="icon-chevron-down"></a>
               <a href="javascript:;" class="icon-remove"></a>
            </span>
            </div>
            <div class="widget-body">
            <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
            <div class="btn-group">
            <p>
            
<a href="data-santri"><button class="btn btn-danger"><i class="icon-mail-reply icon-white"></i> Kembali</button></a><br/>
            </p>
         </div>
                    <div id="tabsleft" class="tabbable tabs-left">
                    <ul>
                        <li><a href="#tabsleft-tab1" data-toggle="tab"><span class="strong">Step 1</span> <span class="muted">Input Data Santri</span></a></li>
                        <li><a href="#tabsleft-tab2" data-toggle="tab"><span class="strong">Step 2</span> <span class="muted">Riwayat Pendidikan Santri</span></a></a></li>
                        <li><a href="#tabsleft-tab3" data-toggle="tab"><span class="strong">Step 3</span> <span class="muted">Data Orang Tua / Wali</span></a></a></li>
                        <li><a href="#tabsleft-tab4" data-toggle="tab"><span class="strong">Step 4</span> <span class="muted">Data Lain-lain</span></a></a></li>
                    </ul>
                    <div class="progress progress-info progress-striped">
                        <div class="bar"></div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane" id="tabsleft-tab1">
                            <h3>Input Data Santri</h3>
                            <div class="control-group">
                              <label class="control-label">NISP</label>
                              <div class="controls">
                                  <input type="number" name='nisp' placeholder="Nomor Induk Santri Pesantren" class="span8"  />
                              </div>
                            </div>  
                            <div class="control-group">
                              <label class="control-label">NIK</label>
                              <div class="controls">
                                  <input type="number" name='niksantri' placeholder="Nomor Induk Kependudukan" class="span8"  />
                              </div>
                            </div>  
                            <div class="control-group">
                                <label class="control-label">Nama Santri</label>
                                <div class="controls">
                                    <input type="text" name='namasantri' id="nama" class="span8" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Tempat Tanggal Lahir</label>
                                <div class="controls">
                                    <input type="text" name='tempatlahir' id="nama" class="span5" />
                                    <input type="date" name='tanggallahir' id="nama" class="span3" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Jenis Kelamin</label>
                                <div class="controls">
                                    <select class="span3" name="jeniskelamin" data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">- Pilih Jenis Kelamain -</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
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
                                        echo '<option value="'.$rsl["KD_PENFORMAL"].'">'.$rsl["PENDIDIKAN_FORMAL"].'</option>';
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
                                        echo '<option value="'.$rsl2["KD_KOMPLEK"].'">'.$rsl2["NAMA_KOMPLEK"].'</option>';
                                    }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <?php
                            }elseif ($lvl == 2) {
                                echo NULL;
                            }
                            ?>
                            <div class="control-group">
                                <label class="control-label">Kamar</label>
                                <div class="controls">
                                    <input type="text" name='kamar' id="nama" class="span8" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Bahasa yang dikuasai</label>
                                <div class="controls">
                                    <input type="text" name='bahasa' id="nama" class="span8" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Keahlian</label>
                                <div class="controls">
                                    <input type="text" name='keahlian' id="nama" class="span8" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Golongan Darah</label>
                                <div class="controls">
                                    <select class="span3" name="golongandarah" data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">- Pilih Golongan Darah -</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="AB">AB</option>
                                        <option value="O">O</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">No HP Santri</label>
                                <div class="controls">
                                    <input type="number" name='nohp' id="nama" class="span6" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Hobi</label>
                                <div class="controls">
                                    <input type="text" name='hobi' id="nama" class="span8" />
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
                                        echo '<option value="'.$rsl3["KD_THNAJARAN"].'">'.$rsl3["TAHUN_AJARAN"].'</option>';
                                    }
                                    ?>
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Alasan Masuk Ponpes Al-Munawwir</label>
                                <div class="controls">
                                    <textarea class="span8 ckeditor" name="alasanmasuk" rows="5"></textarea>
                                </div>
                            </div>
          <div class="control-group">
            <label class="control-label">Foto Santri</label>
            <div class="controls">
                <div data-provides="fileupload" class="fileupload fileupload-new">
                    <div style="width: 200px; height: 150px;" class="fileupload-new thumbnail">
                        <img alt="" src="../asset/img/nopic.jpg">
                    </div>
                    <div style="max-width: 200px; max-height: 150px; line-height: 20px;" class="fileupload-preview fileupload-exists thumbnail"></div>
                    <div>
                       <span class="btn btn-file"><span class="fileupload-new">Select image</span>
                       <span class="fileupload-exists">Change</span>
                       <input type="file" name="fotosantri" class="default" ></span>
                        <a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Remove</a>
                    </div>
                </div>
                <span class="label label-important">NOTE!</span>
                 <span>
                 Ukuran maksimal foto <= 500 Kb, ekstensi foto berupa: Jpg dan Png.
                 </span>
            </div>
          </div>
                        </div>
                        <div class="tab-pane" id="tabsleft-tab2">
                            <h3>Riwayat Pendidikan Santri</h3>
                            <div class="control-group">
                                <label class="control-label">Pendidikan Al Munawwir</label>
                                <div class="controls">
                                    <select class="span6" name="pendidikan_almunawir" data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">- Pilih Pendidikan -</option>
                                    <?php 
                                    $qsmun = $db->query("SELECT * from pendidikan_almunawir");
                                    while ($rsmun = $qsmun->fetch(PDO::FETCH_ASSOC)) {
                                        echo '<option value="'.$rsmun["KD_PNDALMUNAWIR"].'">'.$rsmun["PENDIDIKAN_ALMUNAWIR"].'</option>';
                                    }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Pendidikan non Formal</label>
                                <div class="controls">
                                    <textarea class="span8 ckeditor" name="pendidikannonformal" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Pendidikan Formal</label>
                                <div class="controls">
                                    <textarea class="span8 ckeditor" name="pendidikanformalpondok" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Prestasi yang pernah diraih</label>
                                <div class="controls">
                                    <textarea class="span8 ckeditor" name="prestasi" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabsleft-tab3">
                            <h3>Data Orang Tua / Wali</h3>
                            <div class="control-group">
                              <label class="control-label">Nomor KK</label>
                              <div class="controls">
                                  <input type="number" name='kk' placeholder="Nomor Kartu Keluarga" class="span8"  />
                              </div>
                            </div>  
                            <div class="control-group">
                              <label class="control-label">NIK Ayah/Wali Santri</label>
                              <div class="controls">
                                  <input type="number" name='nikayah' placeholder="Nomor Induk Kepegawaian" class="span8"  />
                              </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label">Nama Ayah/Wali Santri</label>
                              <div class="controls">
                                  <input type="text" name="namaayah" class="span8"  />
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
                                            echo '<option value="'.$rsl4['KD_PNDWALI'].'">'.$rsl4['PENDIDIKAN_WALI'].'</option>';
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
                                            echo '<option value="'.$rsl5['KD_PEKERJAAN'].'">'.$rsl5['PEKERJAAN_WALI'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label">NIK Ibu/Wali Santri</label>
                              <div class="controls">
                                  <input type="number" name="nikibu" placeholder="Nomor Induk Kepegawaian" class="span8"  />
                              </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label">Nama Ibu/Wali Santri</label>
                              <div class="controls">
                                  <input type="text" name="namaibu" class="span8"  />
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
                                            echo '<option value="'.$rsl6['KD_PNDWALI'].'">'.$rsl6['PENDIDIKAN_WALI'].'</option>';
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
                                            echo '<option value="'.$rsl7['KD_PEKERJAAN'].'">'.$rsl7['PEKERJAAN_WALI'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Alamat</label>
                                <div class="controls">
                                    <textarea class="span8 ckeditor" name="alamat" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label">Jumlah Saudara Kandung</label>
                              <div class="controls">
                                  <input type="number" name='jumlah_saudara' class="span3"  />
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
                                            echo '<option value="'.$rsl8['KD_PENGHASILAN'].'">'.$rsl8['PENGHASILAN'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label">No HP Ayah/Ibu/Wali Santri</label>
                              <div class="controls">
                                  <input type="number" name='hpwali' class="span6"  />
                              </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabsleft-tab4">
                            <h3>Data Lain-lain</h3>
                            <div class="control-group">
                                <label class="control-label">Bakat & Minat</label>
                                <div class="controls">
                                    <textarea class="span8 ckeditor" name="bakatminat" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                              <label class="control-label">Nomor plat kendaraan <i>jika tidak ada silahkan diisi (-)</i> </label>
                              <div class="controls">
                                  <input type="text" name='noplat' class="span3"  />
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
                        </div>
                        <ul class="pager wizard">
                            <li class="previous first"><a href="javascript:;">Awal</a></li>
                            <li class="previous"><a href="javascript:;">Kembali</a></li>
                            <li class="next last"><a href="javascript:;">Akhir</a></li>
                            <li class="next"><a href="javascript:;">Selanjutnya</a></li>
                        <li class="next finish"><button class="btn btn-large btn-info" type="submit" name="simpan" >Simpan Data</button></li> 
                        </ul>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT-->