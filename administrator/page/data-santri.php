<div class="span12">
<?php 

if (isset($_POST['hapus'])) {
    $nisp = $_POST['id'];
    $foto = $_POST['foto'];
    try {
        $db->query("DELETE from santri WHERE NISP = '$nisp'");
        $gambar = "../asset/img/fotosantri/$foto";
        unlink("$gambar");
        echo '<div class="alert alert-success">
                    <button class="close" data-dismiss="alert">×</button>
                    <strong>Sukses !</strong> Data Santri Berhasil Dihapus.
                    </div>';
    } catch (PDOException $e) {
        echo '<div class="alert alert-danger">
                    <button class="close" data-dismiss="alert">×</button>
                    <strong>Gagal !</strong> Data Santri Gagal Dihapus.
                    </div>';
    }
}
?>
    <!-- BEGIN BASIC PORTLET-->
    <div class="widget green">
        <div class="widget-title">
            <h4><i class="icon-reorder"></i> Data Santri PonPes</h4>
        </div>
        <div class="widget-body">

        <div class="clearfix">
         <div class="btn-group">
            <p>
            <a href="tambah-santri"> <button id="editable-sample_new" class="btn btn-primary"> <i class="icon-plus"></i> Tambah Santri Baru </button></a><span class="help-inline"></span>
            <a href="data-santri"><button class="btn  btn-warning" type="button"><i class="icon-refresh"></i> Lihat Semua Data</button></a> <span class="help-inline"></span>
            <a href="page/export-data.php"><button class="btn  btn-info" type="button"><i class="icon-save"></i> Simpan Excel</button></a>
            </p>
         </div>
         <?php 
         if ($lvl == 1) {
         ?>
         <div class="btn-group pull-right">
            <form action="" method="POST" class="hidden-phone">
                   <div class="input-append search-input-area">
                       <select class="span9" name="komplek" data-placeholder="Choose a Category" tabindex="1">
                            <option value="">- Cari Komplek -</option>
                            <?php 
                            $qskom = $db->query("SELECT * from komplek");
                            while ($rsl2 = $qskom->fetch(PDO::FETCH_ASSOC)) {
                                echo '<option value="'.$rsl2["KD_KOMPLEK"].'">'.$rsl2["NAMA_KOMPLEK"].'</option>';
                            }
                            ?>
                        </select> 
                        <span class="help-inline"></span>
                       <button class="btn" type="submit" name="btncari"><i class="icon-search"></i> </button>
                   </div>
               </form>
         </div>
         <?php 
     }elseif ($lvl == 2) {
         echo NULL;
     }
         ?>
         </div>
         <div class="space15"></div>
            <table class="table table-striped table-bordered" id="sample_1" >
                <thead>
                <tr>
                    <th>No</th>
					<th>NISP</th>
                    <th>Nama Santri</th>
                    <th class="hidden-phone">Jenis Kelamin</th>
                    <th class="hidden-phone">Tempat, Tanggal Lahir</th>
                    <th class="hidden-phone">Komplek</th>
					<th class="hidden-phone">Kamar</th>
                    <th class="hidden-phone">No Hp</th>
					<!-- <th class="hidden-phone">Alamat</th> -->
                    <th class="hidden-phone"><center>Tools</center></th>
                </tr>
                </thead>

                <tbody>
                <?php 
                if (isset($_POST['btncari'])) {
                    $key = $_POST['komplek'];
                    $qs = $db->query("SELECT komplek.*, santri.* from santri inner join komplek on santri.KD_KOMPLEK = komplek.KD_KOMPLEK WHERE santri.KD_KOMPLEK = '$key' ");
                }else{
                    if ($lvl == 1) {
                        $qs = $db->query("SELECT komplek.*, santri.* from santri inner join komplek on santri.KD_KOMPLEK = komplek.KD_KOMPLEK");
                    }elseif ($lvl == 2) {
                        $qs = $db->query("SELECT komplek.*, santri.* from santri inner join komplek on santri.KD_KOMPLEK = komplek.KD_KOMPLEK WHERE santri.KD_KOMPLEK = '$kmp'");
                    }
                    
                }
                
                $no = 1;
                while ($rs = $qs->fetch(PDO::FETCH_ASSOC)) {
                    $id = $rs['NISP'];
                    $TGL_LAHIR = $rs['TGL_LAHIR'];
                    $format = date('d F Y', strtotime($TGL_LAHIR));

                ?>
                    <tr>
                    <td><?php  echo $no; ?></td>
                    <td><?php  echo $rs['NISP']; ?></td>
					<td><?php  echo $rs['NAMA_SANTRI']; ?></td>
					<td class="hidden-phone"><?php  echo $rs['JENIS_KELAMIN']; ?></td>
                    <td class="hidden-phone"><?php  echo $rs['TEMPAT_LAHIR'].', '.$format; ?></td>
                    <td class="hidden-phone"><?php  echo $rs['NAMA_KOMPLEK']; ?></td>
                    <td class="hidden-phone"><?php  echo $rs['KAMAR']; ?></td>
                    <td class="hidden-phone"><?php  echo $rs['HP_SANTRI']; ?></td>
                    <!-- <td class="hidden-phone"><?php  echo $rs['ALAMAT']; ?></td> -->
					<td class="hidden-phone"><center> 
					<a href="index.php?page=detail-santri&nisp=<?php echo md5(sha1(md5(sha1(sha1($id))))); ?>" class="btn btn-small btn-info tooltips"  data-placement="bottom" data-original-title="Detail Data"><i class="icon-th-list icon-white"></i>  </a>
                    <a href="index.php?page=ubah-santri&nisp=<?php echo md5(md5(md5(sha1(sha1($id))))); ?>" class="btn btn-small btn-success tooltips"  data-placement="bottom" data-original-title="Ubah Data"><i class="icon-pencil icon-white"></i>  </a> 
                    <a href="page/cetak-data.php?nisp=<?php echo md5(md5(sha1(sha1(md5($id)))));  ?>" target="_blank" class="btn btn-small btn-default tooltips"  data-placement="bottom" data-original-title="Cetak Data Santri"><i class="icon-print icon-white"></i>  </a> 
                    <a href="#myModal3<?php echo $id; ?>" role="button" class="btn btn-small btn-danger tooltips"  data-placement="bottom" data-original-title="Hapus Data" data-toggle="modal"><i class="icon-trash icon-white"></i>  </a></center></td>

<!-- Modal Hapus Data -->
        <div id="myModal3<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel1">Konfirmasi Hapus Data Santri</h3>
            </div>
            <div class="modal-body">
                <p align="center"><b>Perhatian ! Jika Anda Menghapus Data ini, maka semua informasi data akan hilang.</b></p>
                <p align="center">Apakah anda yakin akan menghapus data santri atas nama <?php  echo $rs['NAMA_SANTRI']; ?> ?</p>

            </div>
            <div class="modal-footer">
            <form action="" method="POST">
            <input type="hidden" name="foto" value="<?php echo $rs['FOTO_SANTRI']; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
                <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
            </form>
            </div>
        </div>
<!-- End Modal Hapus Data -->

					</tr>
                <?php $no++; } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END BASIC PORTLET-->
</div>
