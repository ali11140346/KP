<?php
if (isset($_REQUEST['simpanj'])) {
    $qskd= $db->query("SELECT MAX(KD_PNDWALI) as KD FROM `pendidikan_wali` ");
    $rskd = $qskd->fetch(PDO::FETCH_ASSOC);
    $KD = $rskd['KD'] + 1;
    try {
      $nj = $_REQUEST['nj'];
      $st = $_REQUEST['st'];
      $db->query("insert into pendidikan_wali (KD_PNDWALI,PENDIDIKAN_WALI,ST_PNDWALI) VALUES ('$KD','$nj','$st')");
      echo '<div class="alert alert-success">
            <button class="close" data-dismiss="alert">×</button>
            <strong>Berhasil !</strong> Data Pendidikan Formal Wali Berhasil Dibuat.
            </div>';
      
    } catch (PDOException $e) {
      echo '<div class="alert alert-danger">
            <button class="close" data-dismiss="alert">×</button>
            <strong>Gagal !</strong> Data Pendidikan Formal Wali Gagal Dibuat.
            </div>';
    }
}elseif (isset($_REQUEST['hapus'])) {
    try {
       $idh = $_REQUEST['idh'];
    $db->query("DELETE from pendidikan_wali where KD_PNDWALI = '$idh'");
      echo "<script language='javascript'>alert('Data Pendidikan Formal Wali Berhasil Dihapus')</script>";
    } catch (PDOException $e) {
      echo "<script language='javascript'>alert('Data Pendidikan Formal Wali Gagal Dihapus')</script>";
    }
}elseif (isset($_REQUEST['ubah'])) {
    try {
       $kj = $_REQUEST['kj'];
    $nj = $_REQUEST['nj'];
    $db->query("UPDATE pendidikan_wali SET pendidikan_wali = '$nj' where KD_PNDWALI = '$kj' ");
      echo "<script language='javascript'>alert('Data Pendidikan Formal Wali Berhasil Diubah')</script>";
    } catch (PDOException $e) {
      echo "<script language='javascript'>alert('Data Pendidikan Formal Wali Gagal Diubah')</script>";
    }
}
?>

<div class="row-fluid">
<div class="span12">
    <!-- BEGIN widget widget-->
    <div class="widget blue">
        <div class="widget-title">
            <h4><i class="icon-reorder"></i> Data Pendidikan Formal Wali</h4>
            <div class="actions">
                <a href="#tamj" role="button" class="btn btn-primary" data-toggle="modal"><i class="icon-plus icon-white"></i> Tambah Pendidikan Formal Wali </a>
            </div>
        </div>

<!-- Modal Tambah Pendidikan Formal Wali -->
    <div id="tamj" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabelj" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabelj">Form Tambah Pendidikan Formal Wali</h3>
            </div>
            <div class="modal-body">
                <form action="" class="form-horizontal" method="POST">
                 
                  <div class="control-group">
                      <label class="control-label">Pendidikan Formal Wali</label>
                      <div class="controls">
                          <input type="text" name='nj' class="span8" required />
                      </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label">Pendidikan Formal Wali</label>
                      <div class="controls">
                          <input type="number" name='st' class="span8" required />
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
            <table class="table table-bordered">
                <thead>
                <tr>
                    
                    <th>Kode Pendidikan Formal</th>
                    <th>Pendidikan Formal Wali</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php 
                
                $qsj = $db->query("SELECT * FROM `pendidikan_wali` ORDER by KD_PNDWALI ASC");
                while ($rsj = $qsj->fetch(PDO::FETCH_ASSOC)) {
                    $idj = $rsj['KD_PNDWALI'];
                    echo '
                        <tr>
                    
                    <td>'.$idj.'</td>
                    <td>'.$rsj["PENDIDIKAN_WALI"].'</td>
                    <td><center>
                    <a href="#myModal2'.$idj.'" role="button" class="btn btn-small btn-info" data-toggle="modal"><i class="icon-edit icon-white"></i> Ubah </a> | 
                    <a href="#myModal1'.$idj.'" role="button" class="btn btn-small btn-danger" data-toggle="modal"><i class="icon-remove icon-white"></i> Hapus </a></center></td>
                    </tr>
<!-- Modal Ubah Data -->
    <div id="myModal2'.$idj.'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabelu" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabelu">Form Ubah Pendidikan Formal Wali</h3>
        </div>
        <div class="modal-body">
<form action="" class="form-horizontal" method="POST">
                 
                  <div class="control-group">
                      
                      <div class="controls">
                          <input type="hidden" name="kj" value="'.$idj.'" class="span3" readonly />
                      </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label">Pendidikan Formal Wali</label>
                      <div class="controls">
                          <input type="text" name="nj" value="'.$rsj["PENDIDIKAN_WALI"].'" class="span6" required />
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
                                    Apakah anda yakin akan menghapus Pendidikan Formal Wali '.$rsj["PENDIDIKAN_WALI"].' ?
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
