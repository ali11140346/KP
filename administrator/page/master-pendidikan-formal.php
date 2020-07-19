<?php
if (isset($_REQUEST['simpanj'])) {
    $qskd= $db->query("SELECT MAX(KD_PENFORMAL) as KD FROM `pendidikan_formal` ");
    $rskd = $qskd->fetch(PDO::FETCH_ASSOC);
    $KD = $rskd['KD'] + 1;
    try {
      $nj = $_REQUEST['nj'];
      $db->query("insert into pendidikan_formal (KD_PENFORMAL,PENDIDIKAN_FORMAL) VALUES ('$KD','$nj')");
      echo "<script language='javascript'>alert('Data Pendidikan Formal Santri Berhasil Dibuat')</script>";
    } catch (PDOException $e) {
      echo "<script language='javascript'>alert('Data Pendidikan Formal Santri Gagal Dibuat')</script>";
    }
}elseif (isset($_REQUEST['hapus'])) {
    $idh = $_REQUEST['idh'];
    $db->query("DELETE from pendidikan_formal where KD_PENFORMAL = '$idh'");
}elseif (isset($_REQUEST['ubah'])) {
    $kj = $_REQUEST['kj'];
    $nj = $_REQUEST['nj'];
    $db->query("UPDATE pendidikan_formal SET PENDIDIKAN_FORMAL = '$nj' where KD_PENFORMAL = '$kj' ");
}
?>

<div class="row-fluid">
<div class="span12">
    <!-- BEGIN widget widget-->
    <div class="widget blue">
        <div class="widget-title">
            <h4><i class="icon-reorder"></i> Data Pendidikan Formal Santri</h4>
            <div class="actions">
                <a href="#tamj" role="button" class="btn btn-primary" data-toggle="modal"><i class="icon-plus icon-white"></i> Tambah Pendidikan Formal Santri </a>
            </div>
        </div>

<!-- Modal Tambah Pendidikan Formal Santri -->
    <div id="tamj" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabelj" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabelj">Form Tambah Pendidikan Formal Santri</h3>
            </div>
            <div class="modal-body">
                <form action="" class="form-horizontal" method="POST">
                 
                  <div class="control-group">
                      <label class="control-label">Pendidikan Formal Santri</label>
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
                    
                    <th>Kode Pendidikan Formal</th>
                    <th>Pendidikan Formal Santri</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php 
                
                $qsj = $db->query("SELECT * FROM `pendidikan_formal` ORDER by KD_PENFORMAL ASC");
                while ($rsj = $qsj->fetch(PDO::FETCH_ASSOC)) {
                    $idj = $rsj['KD_PENFORMAL'];
                    echo '
                        <tr>
                    
                    <td>'.$idj.'</td>
                    <td>'.$rsj["PENDIDIKAN_FORMAL"].'</td>
                    <td><center>
                    <a href="#myModal2'.$idj.'" role="button" class="btn btn-small btn-info" data-toggle="modal"><i class="icon-edit icon-white"></i> Ubah </a> | 
                    <a href="#myModal1'.$idj.'" role="button" class="btn btn-small btn-danger" data-toggle="modal"><i class="icon-remove icon-white"></i> Hapus </a></center></td>
                    </tr>
<!-- Modal Ubah Data -->
    <div id="myModal2'.$idj.'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabelu" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabelu">Form Ubah Pendidikan Formal Santri</h3>
        </div>
        <div class="modal-body">
<form action="" class="form-horizontal" method="POST">
                 
                  <div class="control-group">
                      <label class="control-label">Kode Pendidikan Formal Santri</label>
                      <div class="controls">
                          <input type="text" name="kj" value="'.$idj.'" class="span3" readonly />
                      </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label">Nama Pendidikan Formal Santri</label>
                      <div class="controls">
                          <input type="text" name="nj" value="'.$rsj["PENDIDIKAN_FORMAL"].'" class="span6" required />
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
                                    Apakah anda akan menghapus Pendidikan Formal Santri '.$rsj["PENDIDIKAN_FORMAL"].' ?
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
