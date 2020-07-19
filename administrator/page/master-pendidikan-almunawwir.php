<?php
if (isset($_REQUEST['simpanj'])) {
    $qskd= $db->query("SELECT MAX(KD_PNDALMUNAWIR) as KD FROM `pendidikan_almunawir` ");
    $rskd = $qskd->fetch(PDO::FETCH_ASSOC);
    $KD = $rskd['KD'] + 1;
    try {
      $nj = $_REQUEST['nj'];
      $db->query("insert into pendidikan_almunawir (KD_PNDALMUNAWIR,PENDIDIKAN_ALMUNAWIR) VALUES ('$KD','$nj')");
      echo '<div class="alert alert-success">
            <button class="close" data-dismiss="alert">×</button>
            <strong>Berhasil !</strong> Data Pendidikan Al Munawwir Berhasil Dibuat.
            </div>';
      
    } catch (PDOException $e) {
      echo '<div class="alert alert-danger">
            <button class="close" data-dismiss="alert">×</button>
            <strong>Gagal !</strong> Data Pendidikan Al Munawwir Gagal Dibuat.
            </div>';
    }
}elseif (isset($_REQUEST['hapus'])) {
    try {
       $idh = $_REQUEST['idh'];
    $db->query("DELETE from pendidikan_almunawir where KD_PNDALMUNAWIR = '$idh'");
      echo "<script language='javascript'>alert('Data Pendidikan Al Munawwir Berhasil Dihapus')</script>";
    } catch (PDOException $e) {
      echo "<script language='javascript'>alert('Data Pendidikan Al Munawwir Gagal Dihapus')</script>";
    }
}elseif (isset($_REQUEST['ubah'])) {
    try {
       $kj = $_REQUEST['kj'];
    $nj = $_REQUEST['nj'];
    $db->query("UPDATE pendidikan_almunawir SET PENDIDIKAN_ALMUNAWIR = '$nj' where KD_PNDALMUNAWIR = '$kj' ");
      echo "<script language='javascript'>alert('Data Pendidikan Al Munawwir Berhasil Diubah')</script>";
    } catch (PDOException $e) {
      echo "<script language='javascript'>alert('Data Pendidikan Al Munawwir Gagal Diubah')</script>";
    }
}
?>

<div class="row-fluid">
<div class="span12">
    <!-- BEGIN widget widget-->
    <div class="widget blue">
        <div class="widget-title">
            <h4><i class="icon-reorder"></i> Data Pendidikan Al Munawwir</h4>
            <div class="actions">
                <a href="#tamj" role="button" class="btn btn-primary" data-toggle="modal"><i class="icon-plus icon-white"></i> Tambah Pendidikan Al Munawwir </a>
            </div>
        </div>

<!-- Modal Tambah Pendidikan Al Munawwir -->
    <div id="tamj" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabelj" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabelj">Form Tambah Pendidikan Al Munawwir</h3>
            </div>
            <div class="modal-body">
                <form action="" class="form-horizontal" method="POST">
                 
                  <div class="control-group">
                      <label class="control-label">Pendidikan Al Munawwir</label>
                      <div class="controls">
                          <input type="text" name='nj' class="span8" required />
                      </div>
                  </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
                <button type="submit" name="simpanj" class="btn btn-primary">Simpan</button>
            </div></form>
    </div>
<!-- End Modal -->

        <div class="widget-body">
            <table class="table table-striped table-bordered" id="sample_1" >
                <thead>
                <tr>
                    
                    <th>Kode Pendidikan Al Munawwir</th>
                    <th>Pendidikan Al Munawwir</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php 
                
                $qsj = $db->query("SELECT * FROM `pendidikan_almunawir` ORDER by KD_PNDALMUNAWIR ASC");
                while ($rsj = $qsj->fetch(PDO::FETCH_ASSOC)) {
                    $idj = $rsj['KD_PNDALMUNAWIR'];
                    echo '
                        <tr>
                    
                    <td>'.$idj.'</td>
                    <td>'.$rsj["PENDIDIKAN_ALMUNAWIR"].'</td>
                    <td><center>
                    <a href="#myModal2'.$idj.'" role="button" class="btn btn-small btn-info" data-toggle="modal"><i class="icon-edit icon-white"></i> Ubah </a> | 
                    <a href="#myModal1'.$idj.'" role="button" class="btn btn-small btn-danger" data-toggle="modal"><i class="icon-remove icon-white"></i> Hapus </a></center></td>
                    </tr>
<!-- Modal Ubah Data -->
    <div id="myModal2'.$idj.'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabelu" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabelu">Form Ubah Pendidikan Al Munawwir</h3>
        </div>
        <div class="modal-body">
<form action="" class="form-horizontal" method="POST">
                 
                  <div class="control-group">
                      
                      <div class="controls">
                          <input type="hidden" name="kj" value="'.$idj.'" class="span3" readonly />
                      </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label">Pendidikan Al Munawwir</label>
                      <div class="controls">
                          <input type="text" name="nj" value="'.$rsj["PENDIDIKAN_ALMUNAWIR"].'" class="span6" required />
                      </div>
                  </div>
                 
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
            <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
        </div></form>
    </div>
<!-- End Modal Ubah Data -->

                    
                    <!-- Modal Hapus Data -->
                            <div id="myModal1'.$idj.'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabelh" aria-hidden="true">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h3 id="myModalLabelh">Konfirmasi Pengahapusan</h3>
                                </div>
                                <div class="modal-body">
                                <form action="" method="POST">
                                <input type="hidden" name="idh" value="'.$idj.'">
                                    Apakah anda yakin akan menghapus Pendidikan Al Munawwir '.$rsj["PENDIDIKAN_ALMUNAWIR"].' ?
                                </div>
                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
                                    <button type="submit" name="hapus" class="btn btn-primary">Hapus</button>
                                </div></from>
                            </div>
                    <!-- End Modal Hapus Data -->
                    ';
                    
                }
                ?>
                    
                </tbody>
            </table>
        </div>
    </div>
    <!-- END widget widget-->
</div>
</div>
