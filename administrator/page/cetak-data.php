<?php
 // Define relative path from this script to mPDF
session_start();
date_default_timezone_set('Asia/Jakarta');
 $nisp = $_GET['nisp'];
 $tgl = date("d-m-Y");
  // include "../../config/function/fungsi_indotgl.php";
  // include "../../config/function/library.php";
   include "../../config/koneksi.php";
$qsn = $db->query("SELECT NISP from santri WHERE md5(md5(sha1(sha1(md5(NISP))))) = '$nisp' ");
$rsn = $qsn->fetch(PDO::FETCH_ASSOC);
$nama_dokumen='Data-santri'.''.$rsn["NISP"].' '.$tgl; //Beri nama file PDF hasil.
define('_MPDF_PATH','../../asset/plugin/mpdf60/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF("utf-8", "A4-P", "12", "", "2", "2", "2", "2","","","P"); // Create new mPDF Document

//Beginning Buffer to save PHP variables and HTML tags
ob_start();
?>
<!--sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak masalah.-->
<!--CONTOH Code START-->

<!DOCTYPE html>
<html>
<head>
  <title></title>
    <style type="text/css">
    table, th, td {
            border-collapse: collapse;
            border-spacing: 25px;
            font-family: Calibri;
            font-size: 15px;
            text-align: left;
        }            
        th,td {
            padding: 4px;
        }

      .img-responsive{
      display: block;
      margin-left: auto;
      margin-right: auto;

    }
    .nisp{
          font-size: 22px;
          color: black;
          text-align: center;
          font-weight: bold;
          font-family: sans-serif;
        }
    .judul{
          font-size: 19px;
          color: black;
          text-align: center;
          font-weight: bold;
          font-family: Arial;
        }
    .data{
      font-size: 15px;
      color: black;
      font-family: Calibri;
    }
    </style>
</head>
<body>
<?php 
$sql = $db->query("SELECT santri.*, komplek.*, penghasilan.*, pendidikan_formal.*, tahun_ajaran.*, pendidikan_wali.*, pekerjaan_wali.*, pendidikan_almunawir.* FROM santri inner join komplek on santri.KD_KOMPLEK = komplek.KD_KOMPLEK inner join penghasilan on santri.KD_PENGHASILAN = penghasilan.KD_PENGHASILAN inner join pendidikan_formal on santri.KD_PENFORMAL = pendidikan_formal.KD_PENFORMAL inner join tahun_ajaran on santri.KD_THNAJARAN = tahun_ajaran.KD_THNAJARAN inner join pendidikan_wali on santri.PENDIDIKAN_AYAH = pendidikan_wali.KD_PNDWALI inner join pekerjaan_wali on santri.PEKERJAAN_AYAH = pekerjaan_wali.KD_PEKERJAAN inner join pendidikan_almunawir on santri.PENDIDIKAN_ALMUNAWWIR = pendidikan_almunawir.KD_PNDALMUNAWIR WHERE md5(md5(sha1(sha1(md5(santri.NISP))))) = '$nisp' ");
$data = $sql->fetch(PDO::FETCH_ASSOC);
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
?>
<!-- <div id="main"></div> -->
<img src="../../asset/img/header-data.png" class="img-responsive">
<!-- <p>O</p> -->
<br>
<p class="nisp"> Nomor NISP : <?php echo $data['NISP']; ?></p>
<hr>
<p class="judul">I.  Data Umum Santri </p>
<table align="center" border="1" width="100%">
  <tbody>
    <tr>
      <th>Nama Santri</th>
      <td colspan="2"> : <?php echo $data['NAMA_SANTRI']; ?></td>
      <td align="center" rowspan="4"><img width="150px" height="200px" src="../../asset/img/fotosantri/<?php echo $data['FOTO_SANTRI'] ?>"></td>
    </tr>
    <tr>
      <th>NIK</th>
      <td colspan="2"> : <?php echo $data['NIK']; ?></td>
    </tr>
    <tr>
      <th>Tempat, Tanggal Lahir</th>
      <td colspan="2"> : <?php echo $data['TEMPAT_LAHIR']; ?>, <?php echo $format; ?></td>
      
      
    </tr>
    <tr>
      <th>Jenis Kelamin</th>
      <td colspan="2"> : <?php echo $data['JENIS_KELAMIN']; ?></td>
      
    </tr>
    <tr>
      <th>Pendidikan Formal </th>
      <td colspan="3"> : <?php echo $data['PENDIDIKAN_FORMAL']; ?></td>
    </tr>
    <tr>
      <th>Komplek </th>
      <td colspan="3"> : <?php echo $data['NAMA_KOMPLEK']; ?></td>
    </tr>
    <tr>
      <th>Kamar </th>
      <td colspan="3"> : <?php echo $data['KAMAR']; ?></td>
    </tr>
    <tr>
      <th>Bahasa yang dikuasai </th>
      <td colspan="3"> : <?php echo $data['BAHASA_SANTRI']; ?></td>
    </tr>
    <tr>
      <th>Keahlian </th>
      <td colspan="3"> : <?php echo $data['KEAHLIAN_SANTRI']; ?></td>
    </tr>
    <tr>
      <th>Golongan Darah </th>
      <td colspan="3"> : <?php echo $data['GOL_DARAH']; ?></td>
    </tr>
    <tr>
      <th>No. HP Santri </th>
      <td colspan="3"> : <?php echo $data['HP_SANTRI']; ?></td>
    </tr>
    <tr>
      <th>Hobi </th>
      <td colspan="3"> : <?php echo $data['HOBI_SANTRI']; ?></td>
    </tr>
    <tr>
      <th>Tahun Ajaran </th>
      <td colspan="3"> : <?php echo $data['TAHUN_AJARAN']; ?></td>
    </tr>
    <tr>
      <th>Alasan Masuk </th>
      <td colspan="3"> : <?php echo $data['ALASAN_MASUK']; ?></td>
    </tr>
</tbody>
</table>
<hr>
<p class="judul">II. Riwayat Pendidikan Santri</p>
<table align="center" border="1" width="100%">
  <tbody>
    <tr>
      <td><b>Pendidikan Al Munawwir </b></td>
      <td>  <?php echo $data['PENDIDIKAN_ALMUNAWIR']; ?></td>
    </tr>
    <tr>
      <td><b>Pendidikan Non Formal </b></td>
      <td>  <?php echo $data['RIWAYAT_PNDNONFORMAL']; ?></td>
    </tr>
    <tr>
      <td><b>Pendidikan Formal </b></td>
      <td>  <?php echo $data['RIWAYAT_PNDFORMAL']; ?></td>
    </tr>
    <tr>
      <td><b>Prestasi </b></td>
      <td>  <?php echo $data['PRESTASI_SANTRI']; ?></td>
    </tr>
  </tbody>
</table>
<!-- <p class="data"><b>Pendidikan Al Munawwir </b> : <?php echo $data['PENDIDIKAN_ALMUNAWIR']; ?><br>
<b>Pendidikan Non Formal </b> : <?php echo $data['RIWAYAT_PNDNONFORMAL']; ?><br>
<b>Pendidikan Formal </b> : <?php echo $data['RIWAYAT_PNDFORMAL']; ?><br>
<b>Prestasi </b> : <?php echo $data['PRESTASI_SANTRI']; ?><br>
</p> -->
<hr>
<p class="judul">III. Data Orang Tua / Wali Santri</p>
<table align="center" border="1" width="100%">
<tbody>
  <tr>
    <td><b>No. KK </b></td>
    <td> : <?php echo $data['NO_KK']; ?></td>
  </tr>
  <tr>
    <td><b>NIK Ayah </b></td>
    <td> : <?php echo $data['NIK_AYAH']; ?></td>
  </tr>
  <tr>
    <td><b>Nama Ayah </b></td>
    <td> : <?php echo $data['NAMA_AYAH']; ?></td>
  </tr>
  <tr>
    <td><b>Pendidikan Ayah </b></td>
    <td> : <?php echo $data['PENDIDIKAN_WALI']; ?></td>
  </tr>
  <tr>
    <td><b>Pekerjaan Ayah </b></td>
    <td> : <?php echo $data['PEKERJAAN_WALI']; ?></td>
  </tr>
  <tr>
    <td><b>NIK Ibu </b></td>
    <td> : <?php echo $data['NIK_IBU']; ?></td>
  </tr>
  <tr>
    <td><b>Nama Ibu </b></td>
    <td> : <?php echo $data['NAMA_IBU']; ?></td>
  </tr>
  <tr>
    <td><b>Pendidikan Ibu </b></td>
    <td> : <?php echo $data2['PENDIDIKAN_WALI']; ?></td>
  </tr>
  <tr>
    <td><b>Pekerjaan Ibu </b></td>
    <td> : <?php echo $data2['PEKERJAAN_WALI']; ?></td>
  </tr>
  <tr>
    <td><b>Penghasilan Wali </b></td>
    <td> : <?php echo $data['PENGHASILAN']; ?></td>
  </tr>
  <tr>
    <td><b>Alamat Wali </b></td>
    <td> : <?php echo $data['ALAMAT']; ?></td>
  </tr>
  <tr>
    <td><b>Jumlah Saudara Kandung </b></td>
    <td> : <?php echo $data['JML_SAUDARA']; ?></td>
  </tr>
  <tr>
    <td><b>No. HP Wali </b></td>
    <td> : <?php echo $data['HP_WALI']; ?></td>
  </tr>
</tbody>
</table>
<!-- <p class="data"><b>No. KK </b> : <?php echo $data['NO_KK']; ?><br>
<b>NIK Ayah </b> : <?php echo $data['NIK_AYAH']; ?><br>
<b>Nama Ayah </b> : <?php echo $data['NAMA_AYAH']; ?><br>
<b>Pendidikan Ayah </b> : <?php echo $data['PENDIDIKAN_WALI']; ?><br>
<b>Pekerjaan Ayah </b> : <?php echo $data['PEKERJAAN_WALI']; ?><br>
<b>NIK Ibu </b> : <?php echo $data['NIK_IBU']; ?><br>
<b>Nama Ibu </b> : <?php echo $data['NAMA_IBU']; ?><br>
<b>Pendidikan Ibu </b> : <?php echo $data2['PENDIDIKAN_WALI']; ?><br>
<b>Pekerjaan Ibu </b> : <?php echo $data2['PEKERJAAN_WALI']; ?><br>
<b>Alamat Wali </b> : <?php echo $data['ALAMAT']; ?><br>
<b>Penghasilan Wali  </b> : <?php echo $data['PENGHASILAN']; ?><br>
<b>Jumlah Saudara Kandung  </b> : <?php echo $data['JML_SAUDARA']; ?><br>
<b>No. HP Wali  </b> : <?php echo $data['HP_WALI']; ?><br>
</p> -->
<hr>
<p class="judul">IV. Data Lain-lain</p>

<table align="center" border="1" width="100%">
<tbody>
  <tr>
    <td><b>Bakat dan Minat </b></td>
    <td> : <?php echo $data['MINAT_BAKAT']; ?></td>
  </tr>
  <tr>
    <td><b>No. Plat Kendaraan </b></td>
    <td> : <?php echo $data['NO_PLAT']; ?></td>
  </tr>
  <tr>
    <td><b>Laundry Pakaian </b></td>
    <td> : <?php echo $lbl; ?></td>
  </tr>
</tbody>
</table>
<!-- <p class="data"><b>Bakat dan Minat </b> : <?php echo $data['MINAT_BAKAT']; ?><br>
<b>No. Plat Kendaraan </b> : <?php echo $data['NO_PLAT']; ?><br>
<b>Laundry Pakaian </b> : <?php echo $lbl; ?><br>
</p> -->
</body>
</html>
<?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>