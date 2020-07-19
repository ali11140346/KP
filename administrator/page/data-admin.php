<?php
require_once '../config/encrypt.php';
ini_set('display_errors','On');
error_reporting(E_ALL^E_NOTICE);
if (isset($_REQUEST['btnsimpan'])) {
    try {
      $ktp = $_REQUEST['ktp'];
      $nama = $_REQUEST['nama'];
      $username = $_REQUEST['username'];
      $stpass = $_REQUEST['password'];
      $password = encrypt($stpass);
      $level = $_REQUEST['level'];
      $alamat = $_REQUEST['alamat'];
      $nohp = $_REQUEST['nohp'];
      if ($level == '1') {
        $qi = $db->query("INSERT INTO `user`(`ID_USSER`, `USERNAME`, `PASSWORD`, `NAMA_USER`, `Alamat_user`, `Hp_user`, `LEVEL`) VALUES ('$ktp','$username','$password','$nama','$alamat','$nohp','$level')");
      }elseif ($level == '2') {
        $komplek = $_REQUEST['komplek'];
        $db->query("INSERT INTO `user`(`ID_USSER`, `KD_KOMPLEK`, `USERNAME`, `PASSWORD`, `NAMA_USER`, `Alamat_user`, `Hp_user`, `LEVEL`) VALUES ('$ktp','$komplek','$username','$password','$nama','$alamat','$nohp','$level')");
      }      
      echo '<div class="alert alert-success">
            <button class="close" data-dismiss="alert">×</button>
            <strong>Berhasil !</strong> Data Admin Berhasil Dibuat.
            </div>';
    } catch (PDOException $e) {
      echo '<div class="alert alert-danger">
            <button class="close" data-dismiss="alert">×</button>
            <strong>Gagal !</strong> Data Admin Gagal Dibuat.
            </div>';
    }
}elseif (isset($_REQUEST['hapus'])) {
    try {
       $idh = $_REQUEST['idh'];
    $db->query("DELETE from user where ID_USSER = '$idh'");
      echo "<script language='javascript'>alert('Data Admin Berhasil Dihapus')</script>";
    } catch (PDOException $e) {
      echo "<script language='javascript'>alert('Data Admin Gagal Dihapus')</script>";
    }
}elseif (isset($_REQUEST['ubah'])) {
    try {
       $idu = $_REQUEST['idu'];
    $idu1 = $_REQUEST['idu1'];
    $db->query("UPDATE 'user' SET `USERNAME`= '$username', `PASSWORD`= '$password', `NAMA_USER`= '$nama', `Alamat_user`='$alamat', `Hp_user`= '$nohp', `LEVEL` = '$level' where id_usser = '$idu' ");
      echo "<script language='javascript'>alert('Data Admin Berhasil Diubah')</script>";
    } catch (PDOException $e) {
      echo "<script language='javascript'>alert('Data Admin Gagal Diubah')</script>";
    }
}
?>
<?php 
if (isset($_POST['actubah'])) {
  $idu = $_POST['idu'];
  $qsu = $db->query("SELECT * from user WHERE ID_USSER = '$idu' ");
  $rs = $qsu->fetch(PDO::FETCH_ASSOC);
?>

<div class="row-fluid">
<div class="span12">
    <!-- BEGIN widget widget-->
    <div class="widget green">
        <div class="widget-title">
            <h4><i class="icon-reorder"></i> Ubah Data Admins</h4>
        </div>
        <div class="widget-body">
          <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
          <div class="control-group">
              <label class="control-label">No. KTP</label>
              <div class="controls">
                  <input type="number" name='nisp' placeholder="Nomor Induk Santri Pesantren" class="span6" value="<?php echo $rs['ID_USSER']; ?>" readonly />
              </div>
            </div>  
            <div class="control-group">
              <label class="control-label">Nama</label>
              <div class="controls">
                  <input type="text" name='nama' placeholder="Nomor Induk Kepegawaian" class="span8" value="<?php echo $rs['NAMA_USER']; ?>" />
              </div>
            </div>  
            <div class="control-group">
                <label class="control-label">Username</label>
                <div class="controls">
                    <input type="text" name='username' value="<?php echo $rs['USERNAME']; ?>" id="nama" class="span8" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Password</label>
                <div class="controls">
                    <input type="password" name='password' id="nama" class="span8" value="<?php echo $rs['PASSWORD']; ?>" />
                </div>
            </div>
            <div class="control-group">
                      <label class="control-label">Level User</label>
                      <div class="controls">
                        <label class="radio">
                        <input type="radio" name="level" id="rad1" value="1" class="rad" /> Super Admin
                        </label>
                        <label class="radio">
                        <input type="radio" name="level" id="rad2" value="2" class="rad" /> Admin Komplek
                        </label>
                      </div>
                  </div>
                  <div class="control-group" style="display:none" id="komplek">
                      <label class="control-label">Komplek</label>
                      <div class="controls">
                          <select class="span5" name="komplek" data-placeholder="Choose a Category" tabindex="1" >
                              <option value="">- Pilih Komplek Admin -</option>
                          <?php 
                          $qskom = $db->query("SELECT * from komplek WHERE KD_KOMPLEK != '0'");
                          while ($rsl2 = $qskom->fetch(PDO::FETCH_ASSOC)) {
                              echo '<option value="'.$rsl2["KD_KOMPLEK"].'">'.$rsl2["NAMA_KOMPLEK"].'</option>';
                          }
                          ?>
                          </select>
                      </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label">Alamat</label>
                      <div class="controls">
                          <textarea class="span8 ckeditor" name="alamat" rows="5" value="<?php echo $rs['Alamat_user']; ?>"></textarea>
                      </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label">No. HP</label>
                      <div class="controls">
                          <input type="number" name='nohp' class="span8" value="<?php echo $rs['Hp_user']; ?>" required />
                      </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label">Status User</label>
                      <div class="controls">
                          <select class="span2" name="status" data-placeholder="Choose a Category" tabindex="1" >
                              <option value="A">Aktif</option>
                              <option value="N">Suspend</option>
                          </select>
                      </div>
                  </div>
                <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
                <button type="submit" name="btnsimpan" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
    </div>
    <!-- END widget widget-->
</div>
</div>


<?php
}
?>


<div class="row-fluid">
<div class="span12">
    <!-- BEGIN widget widget-->
    <div class="widget blue">
        <div class="widget-title">
            <h4><i class="icon-reorder"></i> Data Admin</h4>
            <div class="actions">
                <a href="#tamj" role="button" class="btn btn-primary" data-toggle="modal"><i class="icon-pencil icon-white"></i> Tambah Admin </a>
            </div>
        </div>

<!-- Modal Tambah admin -->
    <div id="tamj" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabelj" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabelj">Form Tambah Admin</h3>
            </div>
            <div class="modal-body">
                <form action="" class="form-horizontal" method="POST">
                  
                  <div class="control-group">
                      <label class="control-label">No. KTP</label>
                      <div class="controls">
                          <input type="number" name='ktp' class="span8" required />
                      </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label">Nama</label>
                      <div class="controls">
                          <input type="text" name='nama' class="span8" required />
                      </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label">Username</label>
                      <div class="controls">
                          <input type="text" name='username' class="span8" required />
                      </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label">Password</label>
                      <div class="controls">
                          <input type="password" name='password' class="span8" required />
                      </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label">Level User</label>
                      <div class="controls">
                        <label class="radio">
                        <input type="radio" name="level" id="rad1" value="1" class="rad" /> Super Admin
                        </label>
                        <label class="radio">
                        <input type="radio" name="level" id="rad2" value="2" class="rad" /> Admin Komplek
                        </label>
                      </div>
                  </div>
                  <div class="control-group" style="display:none" id="komplek">
                      <label class="control-label">Komplek</label>
                      <div class="controls">
                          <select class="span8" name="komplek" data-placeholder="Choose a Category" tabindex="1" >
                              <option value="">- Pilih Komplek Admin -</option>
                          <?php 
                          $qskom = $db->query("SELECT * from komplek WHERE KD_KOMPLEK != '0'");
                          while ($rsl2 = $qskom->fetch(PDO::FETCH_ASSOC)) {
                              echo '<option value="'.$rsl2["KD_KOMPLEK"].'">'.$rsl2["NAMA_KOMPLEK"].'</option>';
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
                      <label class="control-label">No. HP</label>
                      <div class="controls">
                          <input type="number" name='nohp' class="span8" required />
                      </div>
                  </div>

<script type="text/javascript" src="../asset/login/js/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
  $(function(){
    $(":radio.rad").click(function(){
      $("#komplek").hide()
      if($(this).val() == "1"){
        $("#komplek").hide();
      }else if ($(this).val() == "2"){
        $("#komplek").show();
      }else {
        $("#komplek").show();
      } 
    });
  });
</script>

            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
                <button type="submit" name="btnsimpan" class="btn btn-primary">Simpan</button>
            </div></form>
    </div>
<!-- End Modal -->

        <div class="widget-body">
            <table class="table table-bordered" >
                <thead>
                <tr>
                    
                    <th>No. KTP</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Level</th>
                    <th>Komplek</th>
                    <th>Status</th>
                    <th><center>Tools</center></th>
                </tr>
                </thead>
                <tbody>
                <?php 
                require_once '../config/decrypt.php';
                $qsj = $db->query("SELECT user.*, komplek.* FROM `user` inner join komplek on user.KD_KOMPLEK = komplek.KD_KOMPLEK ORDER BY user.LEVEL ASC");
                while ($rsj = $qsj->fetch(PDO::FETCH_ASSOC)) {
                    $idj = $rsj['ID_USSER'];
                    if ($rsj['LEVEL'] == 1) {
                      $lvl = '<span class="label label-success">Super Admin</span>';
                    }else{
                      $lvl = '<span class="label label-warning">Admin Komplek</span>';
                    }
                    if ($rsj['STATUS_USER'] == 'A') {
                      $st = '<span class="label label-info">Aktif</span>';
                    }else{
                      $st = '<span class="label label-important">Suspend</span>';
                    }
                    $password2 = decrypt($rsj["PASSWORD"]);
                    echo '
                        <tr>
                    
                    <td>'.$idj.'</td>
                    <td>'.$rsj["NAMA_USER"].'</td>
                    <td>'.$rsj["USERNAME"].'</td>
                    <td>'.$password2.'</td>
                    <td align="center"><center>'.$lvl.'</center></td>
                    <td>'.$rsj["NAMA_KOMPLEK"].'</td>
                    <td><center>'.$st.'</center></td>
                    <td><center>
<form action="" method="POST"><input type="hidden" name="idu" value="'.$idj.'"><button type="submit" name="actubah" class="btn btn-small btn-info"><i class="icon-edit icon-white"></i> Ubah </button> | <a href="#myModal1'.$idj.'" role="button" class="btn btn-small btn-danger" data-toggle="modal"><i class="icon-remove icon-white"></i> Hapus </a></form></center></td>
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
                          <input type="text" name="nj" value="'.$rsj["NAMA_USER"].'" class="span6" required />
                      </div>
                  </div>

                  <div class="control-group">
                      <label class="control-label">Penghasilan Wali</label>
                      <div class="controls">
                          <input type="text" name="nj" value="'.$rsj["NAMA_USER"].'" class="span6" required />
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
                                    Apakah anda yakin akan menghapus user '.$rsj["NAMA_USER"].' ?
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