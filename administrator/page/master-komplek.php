<?php
if (isset($_REQUEST['simpanj'])) {
    
    try {
      $kj = $_REQUEST['kj'];
      $nj = $_REQUEST['nj'];
      $db->query("insert into komplek (KD_KOMPLEK,NAMA_KOMPLEK) VALUES ('$kj','$nj')");
      echo "<script language='javascript'>alert('Data Komplek Berhasil Dibuat')</script>";
    } catch (PDOException $e) {
      echo "<script language='javascript'>alert('Data Komplek Gagal Dibuat')</script>";
    }
}elseif (isset($_REQUEST['hapus'])) {
    $idh = $_REQUEST['idh'];
    $db->query("DELETE from komplek where KD_KOMPLEK = '$idh'");
}elseif (isset($_REQUEST['ubah'])) {
    $kj = $_REQUEST['kj'];
    $nj = $_REQUEST['nj'];
    $db->query("UPDATE komplek SET NAMA_KOMPLEK = '$nj' where KD_KOMPLEK = '$kj' ");
}
?>

<div class="row-fluid">
<div class="span12">
    <!-- BEGIN widget widget-->
    <div class="widget blue">
        <div class="widget-title">
            <h4><i class="icon-reorder"></i> Data Komplek</h4>
            <div class="actions">
                <a href="#tamj" role="button" class="btn btn-primary" data-toggle="modal"><i class="icon-plus icon-white"></i> Tambah Komplek </a>
            </div>
        </div>

<!-- Modal Tambah Komplek -->
    <div id="tamj" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabelj" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabelj">Form Tambah Komplek</h3>
            </div>
            <div class="modal-body">
                <form action="" class="form-horizontal" method="POST">
                 
                  <div class="control-group">
                      <label class="control-label">Kode Komplek Baru</label>
                      <div class="controls">
                          <input type="text" name='kj' class="span4" required />
                      </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label">Nama Komplek</label>
                      <div class="controls">
                          <input type="text" name='nj' class="span8" required />
                      </div>
                  </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button type="submit" name="simpanj" class="btn btn-primary">Save</button>
            </div></form>
    </div>
<!-- End Modal -->

        <div class="widget-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    
                    <th>Kode Komplek</th>
                    <th>Nama Komplek</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php 
                
                $qsj = $db->query("SELECT * FROM `komplek` ORDER by KD_KOMPLEK ASC");
                while ($rsj = $qsj->fetch(PDO::FETCH_ASSOC)) {
                    $idj = $rsj['KD_KOMPLEK'];
                    echo '
                        <tr>
                    
                    <td>'.$rsj["KD_KOMPLEK"].'</td>
                    <td>'.$rsj["NAMA_KOMPLEK"].'</td>
                    <td><center>
                    <a href="#myModal2'.$idj.'" role="button" class="btn btn-small btn-info" data-toggle="modal"><i class="icon-edit icon-white"></i> Ubah </a> | 
                    <a href="#myModal1'.$idj.'" role="button" class="btn btn-small btn-danger" data-toggle="modal"><i class="icon-remove icon-white"></i> Hapus </a></center></td>
                    </tr>
<!-- Modal Ubah Data -->
    <div id="myModal2'.$idj.'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabelu" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabelu">Form Ubah Komplek</h3>
        </div>
        <div class="modal-body">
<form action="" class="form-horizontal" method="POST">
                 
                  <div class="control-group">
                      <label class="control-label">Kode Komplek</label>
                      <div class="controls">
                          <input type="text" name="kj" value="'.$idj.'" class="span3" readonly />
                      </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label">Nama Komplek</label>
                      <div class="controls">
                          <input type="text" name="nj" value="'.$rsj["NAMA_KOMPLEK"].'" class="span6" required />
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
                                    Apakah anda akan menghapus Komplek '.$rsj["NAMA_KOMPLEK"].' ?
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
