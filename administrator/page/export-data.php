<?php
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=data-santri.xls");
?>
<h3>Data Santri Al Munawwir</h3>
    
<table border="1" cellpadding="5">
  <tr>
    <th>No</th>
    <th>NISP</th>
    <th>NIK</th>
    <th>Nama Santri</th>
    <th>Tempat, TGL LAHIR</th>
    <th>JENIS KELAMIN</th>
    <th>Pendidikan Formal yang Dijalani</th>
    <th>KOMPLEK</th>
    <th>KAMAR</th>
    <th>Bahasa yang dikuasai</th>
    <th>Keahlian</th>
    <th>Golongan Darah</th>
    <th>No HP Santri</th>
    <th>Hobi</th>
    <th>Tahun Ajaran</th>
    <th>Alasan masuk ponpes</th>
    <th>Pendidikan di Al-Munawwir</th>
    <th>Pendidikan non Formal</th>
    <th>Pendidikan Formal</th>
    <th>Prestasi yang diraih</th>
    <th>Nomor KK</th>
    <th>NIK Ayah/Wali Santri</th>
    <th>Nama Ayah/Wali Santri</th>
    <th>Pendidikan Ayah/Wali Santri</th>
    <th>Pekerjaan Ayah/Wali Santri</th>
    <th>NIK Ibu/Wali Santri</th>
    <th>Nama Ibu/Wali Santri</th>
    <th>Pendidikan Ibu/Wali Santri</th>
    <th>Pekerjaan Ibu/Wali Santri</th>
    <th>Alamat</th>
    <th>Jumlah Saudara Kandung</th>
    <th>Penghasilan Ayah/Ibu/Wali perbulan</th>
    <th>No HP Ayah/Ibu/Wali perbulan</th>
    <th>Bakat & Minat</th>
    <th>Nomor plat kendaraan</th>
    <th>Laundry Pakaian</th>
  </tr>
  <?php
  // Load file koneksi.php
  include "../../config/koneksi.php";
  
  // Buat query untuk menampilkan semua data santri
  $sql = $db->query("SELECT santri.*, komplek.*, penghasilan.*, pendidikan_formal.*, tahun_ajaran.*, pendidikan_wali.*, pekerjaan_wali.* FROM santri inner join komplek on santri.KD_KOMPLEK = komplek.KD_KOMPLEK inner join penghasilan on santri.KD_PENGHASILAN = penghasilan.KD_PENGHASILAN inner join pendidikan_formal on santri.KD_PENFORMAL = pendidikan_formal.KD_PENFORMAL inner join tahun_ajaran on santri.KD_THNAJARAN = tahun_ajaran.KD_THNAJARAN inner join pendidikan_wali on santri.PENDIDIKAN_AYAH = pendidikan_wali.KD_PNDWALI inner join pekerjaan_wali on santri.PEKERJAAN_AYAH = pekerjaan_wali.KD_PEKERJAAN inner join pendidikan_almunawir on santri.PENDIDIKAN_ALMUNAWWIR = pendidikan_almunawir.KD_PNDALMUNAWIR ");
  //$sql->execute(); // Eksekusi querynya
    
  $no = 1; // Untuk penomoran tabel, di awal set dengan 1
  while($data = $sql->fetch(PDO::FETCH_ASSOC)){ // Ambil semua data dari hasil eksekusi $sql
    $KD_PNDWALI = $data['PENDIDIKAN_IBU'];
    $KD_PEKERJAAN = $data['PEKERJAAN_IBU'];
    $TGL_LAHIR = $data['TGL_LAHIR'];
    $format = date('d F Y', strtotime($TGL_LAHIR));
    $LAUNDRY = $data['LAUNDRY'];
    if ($LAUNDRY == 1) {
      $lbl = 'Tidak Pernah';
    }elseif ($LAUNDRY == 2) {
      $lbl = 'Jarang';
    }elseif ($LAUNDRY == 3) {
      $lbl = 'Sering';
    }elseif ($LAUNDRY == 4) {
      $lbl = 'Sering Sekali';
    }

    $sql2 = $db->query("SELECT pendidikan_wali.PENDIDIKAN_WALI, pekerjaan_wali.PEKERJAAN_WALI from santri inner join pendidikan_wali on santri.PENDIDIKAN_IBU = pendidikan_wali.KD_PNDWALI inner join pekerjaan_wali on santri.PEKERJAAN_IBU = pekerjaan_wali.KD_PEKERJAAN ");
    $data2 = $sql2->fetch(PDO::FETCH_ASSOC);
    
    echo "<tr>";
    echo "<td>".$no."</td>";
    echo "<td>".$data['NISP']."</td>";
    echo "<td>".$data['NIK']."</td>";
    echo "<td>".$data['NAMA_SANTRI']."</td>";
    echo "<td>".$data['TEMPAT_LAHIR'].", ".$format."</td>";
    echo "<td>".$data['JENIS_KELAMIN']."</td>";
    echo "<td>".$data['PENDIDIKAN_FORMAL']."</td>";
    echo "<td>".$data['NAMA_KOMPLEK']."</td>";
    echo "<td>".$data['KAMAR']."</td>";
    echo "<td>".$data['BAHASA_SANTRI']."</td>";
    echo "<td>".$data['KEAHLIAN_SANTRI']."</td>";
    echo "<td>".$data['GOL_DARAH']."</td>";
    echo "<td>".$data['HP_SANTRI']."</td>";
    echo "<td>".$data['HOBI_SANTRI']."</td>";
    echo "<td>".$data['TAHUN_AJARAN']."</td>";
    echo "<td>".$data['ALASAN_MASUK']."</td>";
    echo "<td>".$data['RIWAYAT_PNDNONFORMAL']."</td>";
    echo "<td>".$data['RIWAYAT_PNDFORMAL']."</td>";
    
    echo "<td>".$data['PRESTASI_SANTRI']."</td>";
    echo "<td>".$data['NO_KK']."</td>";
    echo "<td>".$data['NIK_AYAH']."</td>";
    echo "<td>".$data['NAMA_AYAH']."</td>";
    echo "<td>".$data['PENDIDIKAN_WALI']."</td>";
    echo "<td>".$data['PEKERJAAN_WALI']."</td>";
    echo "<td>".$data['NIK_IBU']."</td>";
    echo "<td>".$data['NAMA_IBU']."</td>";
    echo "<td>".$data2['PENDIDIKAN_WALI']."</td>";
    echo "<td>".$data2['PEKERJAAN_WALI']."</td>";
    echo "<td>".$data['ALAMAT']."</td>";
    echo "<td>".$data['JML_SAUDARA']."</td>";
    echo "<td>".$data['PENGHASILAN']."</td>";
    echo "<td>".$data['HP_WALI']."</td>";
    echo "<td>".$data['MINAT_BAKAT']."</td>";
    echo "<td>".$data['NO_PLAT']."</td>";
    echo "<td>".$lbl."</td>";
    echo "</tr>";
    
    $no++; // Tambah 1 setiap kali looping
  }
  ?>
</table>