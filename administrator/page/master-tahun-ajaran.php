<?php
if (isset($_POST['btntambah'])) {
    $qskd= $db->query("SELECT MAX(KD_THNAJARAN) as KD FROM `tahun_ajaran`");
    $rskd = $qskd->fetch(PDO::FETCH_ASSOC);
    $KD = $rskd['KD'] + 1;
    try {
      $nj = $_REQUEST['nj'];
      $db->query("insert into tahun_ajaran (KD_THNAJARAN,TAHUN_AJARAN) VALUES ('$KD','$nj')");
       echo "<script language='javascript'>alert('Data Tahun Ajaran  Berhasil Dibuat')</script>";
    } catch (PDOException $e) {
       echo "<script language='javascript'>alert('Data Tahun Ajaran  Gagal Dibuat')</script>";
    }
}elseif (isset($_REQUEST['hapus'])) {
    $idh = $_REQUEST['idh'];
    $db->query("DELETE from tahun_ajaran where KD_THNAJARAN = '$idh'");
}elseif (isset($_REQUEST['ubah'])) {
    $kj = $_REQUEST['kj'];
    $nj = $_REQUEST['nj'];
    $db->query("UPDATE tahun_ajaran SET TAHUN_AJARAN = '$nj' where KD_THNAJARAN = '$kj' ");
}
?>

<div class="pesansukses"></div>
<div class="row-fluid">
<div class="span12">
    <!-- BEGIN widget widget-->
    <div class="widget blue">
        <div class="widget-title">
            <h4><i class="icon-reorder"></i> Data Tahun Ajaran </h4>
            <div class="actions">
                <a href="#tamj" role="button" class="btn btn-primary" data-toggle="modal"><i class="icon-plus icon-white"></i> Tambah Tahun Ajaran  </a>
            </div>
        </div>

<!-- Modal Tambah Tahun Ajaran  -->
    <div id="tamj" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabelj" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabelj">Form Tambah Tahun Ajaran </h3>
            </div>
            <div class="modal-body">
                <form action="" class="form-horizontal" id="tambah-tahun" method="POST">
                 
                  <div class="control-group">
                      <label class="control-label">Tahun Ajaran </label>
                      <div class="controls">
                          <input type="text" name='nj' class="span8" required />
                      </div>
                  </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
                <button type="submit" id="simpan-tahun" name="btntambah" class="btn btn-primary" class="tombol-simpan">Simpan</button>
            </div></form>
    </div>
<!-- End Modal -->

        <div class="widget-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    
                    <th>Kode Tahun Ajaran</th>
                    <th>Tahun Ajaran </th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php 
                
                $qsj = $db->query("SELECT * FROM `tahun_ajaran` ORDER by KD_THNAJARAN ASC");
                while ($rsj = $qsj->fetch(PDO::FETCH_ASSOC)) {
                    $idj = $rsj['KD_THNAJARAN'];
                    echo '
                        <tr>
                    
                    <td>'.$idj.'</td>
                    <td>'.$rsj["TAHUN_AJARAN"].'</td>
                    <td><center>
                    <a href="#myModal2'.$idj.'" role="button" class="btn btn-small btn-info" data-toggle="modal"><i class="icon-edit icon-white"></i> Ubah </a> | 
                    <a href="#myModal1'.$idj.'" role="button" class="btn btn-small btn-danger" data-toggle="modal"><i class="icon-remove icon-white"></i> Hapus </a></center></td>
                    </tr>
<!-- Modal Ubah Data -->
    <div id="myModal2'.$idj.'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabelu" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabelu">Form Ubah Tahun Ajaran </h3>
        </div>
        <div class="modal-body">
<form action="" class="form-horizontal" method="POST">
                 
                  <div class="control-group">
                      <label class="control-label">Kode Tahun Ajaran </label>
                      <div class="controls">
                          <input type="text" name="kj" value="'.$idj.'" class="span3" readonly />
                      </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label">Nama Tahun Ajaran </label>
                      <div class="controls">
                          <input type="text" name="nj" value="'.$rsj["TAHUN_AJARAN"].'" class="span6" required />
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
                                    Apakah anda akan menghapus Tahun Ajaran  '.$rsj["TAHUN_AJARAN"].' ?
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
<script type="text/javascript">
$(document).ready(function(){
    $("#simpan-tahun").click(function(){
        var data = $('#tambah-tahun').serialize();
        $.ajax({
            type: 'POST',
            url: "page/aksi.php",
            data: data,
            success: function() {
                $('.pesansukses').load("page/pesan-sukses.php");
            }
        });
    });
});
</script>