<?php
if (isset($_REQUEST['simpanj'])) {
    $qskd= $db->query("SELECT MAX(KD_PENGHASILAN) as KD FROM `penghasilan` ");
    $rskd = $qskd->fetch(PDO::FETCH_ASSOC);
    $KD = $rskd['KD'] + 1;
    try {
      $nj = $_REQUEST['nj'];
      $db->query("insert into penghasilan (KD_PENGHASILAN,PENGHASILAN) VALUES ('$KD','$nj')");
      echo '<div class="alert alert-success">
            <button class="close" data-dismiss="alert">×</button>
            <strong>Berhasil !</strong> Data Penghasilan Wali Berhasil Dibuat.
            </div>';
      
    } catch (PDOException $e) {
      echo '<div class="alert alert-danger">
            <button class="close" data-dismiss="alert">×</button>
            <strong>Gagal !</strong> Data Penghasilan Wali Gagal Dibuat.
            </div>';
    }
}elseif (isset($_REQUEST['hapus'])) {
    try {
       $idh = $_REQUEST['idh'];
    $db->query("DELETE from penghasilan where KD_PENGHASILAN = '$idh'");
      echo "<script language='javascript'>alert('Data Penghasilan Wali Berhasil Dihapus')</script>";
    } catch (PDOException $e) {
      echo "<script language='javascript'>alert('Data Penghasilan Wali Gagal Dihapus')</script>";
    }
}elseif (isset($_REQUEST['ubah'])) {
    try {
       $kj = $_REQUEST['kj'];
    $nj = $_REQUEST['nj'];
    $db->query("UPDATE penghasilan SET PENGHASILAN = '$nj' where KD_PENGHASILAN = '$kj' ");
      echo "<script language='javascript'>alert('Data Penghasilan Wali Berhasil Diubah')</script>";
    } catch (PDOException $e) {
      echo "<script language='javascript'>alert('Data Penghasilan Wali Gagal Diubah')</script>";
    }
}
?>

<div class="row-fluid">
<div class="span12">
    <!-- BEGIN widget widget-->
    <div class="widget blue">
        <div class="widget-title">
            <h4><i class="icon-reorder"></i> Data Penghasilan Wali</h4>
            <div class="actions">
                <a href="#tamj" role="button" class="btn btn-primary" data-toggle="modal"><i class="icon-plus icon-white"></i> Tambah Penghasilan Wali </a>
            </div>
        </div>

<!-- Modal Tambah Penghasilan Wali -->
    <div id="tamj" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabelj" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabelj">Form Tambah Penghasilan Wali</h3>
            </div>
            <div class="modal-body">
                <form action="" class="form-horizontal" method="POST">
                 
                  <div class="control-group">
                      <label class="control-label">Penghasilan Wali</label>
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
            <table class="table table-bordered" >
                <thead>
                <tr>
                    
                    <th>Kode Penghasilan</th>
                    <th>Penghasilan Wali</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php 
                
                $qsj = $db->query("SELECT * FROM `penghasilan` ORDER by KD_PENGHASILAN ASC");
                while ($rsj = $qsj->fetch(PDO::FETCH_ASSOC)) {
                    $idj = $rsj['KD_PENGHASILAN'];
                    echo '
                        <tr>
                    
                    <td>'.$idj.'</td>
                    <td>'.$rsj["PENGHASILAN"].'</td>
                    <td><center>
                    <a href="#myModal2'.$idj.'" role="button" class="btn btn-small btn-info" data-toggle="modal"><i class="icon-edit icon-white"></i> Ubah </a> | 
                    <a href="#myModal1'.$idj.'" role="button" class="btn btn-small btn-danger" data-toggle="modal"><i class="icon-remove icon-white"></i> Hapus </a></center></td>
                    </tr>
<!-- Modal Ubah Data -->
    <div id="myModal2'.$idj.'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabelu" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabelu">Form Ubah Penghasilan Wali</h3>
        </div>
        <div class="modal-body">
<form action="" class="form-horizontal" method="POST">
                 
                  <div class="control-group">
                      
                      <div class="controls">
                          <input type="hidden" name="kj" value="'.$idj.'" class="span3" readonly />
                      </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label">Penghasilan Wali</label>
                      <div class="controls">
                          <input type="text" name="nj" value="'.$rsj["PENGHASILAN"].'" class="span6" required />
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
                                    Apakah anda yakin akan menghapus Penghasilan Wali '.$rsj["PENGHASILAN"].' ?
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
