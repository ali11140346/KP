<?php
$idk = $_SESSION['idkpu'];
	//function totsuara(){
		require("../../../config/koneksi.php");
		$qsj = $db->query("SELECT SUM(JumlahSuara) AS Seluruh FROM `prosentase` WHERE IDKPU = '$idk'");
		$rsj = mysqli_fetch_object($qsj);
		echo $rsj->Seluruh;
	//}

	echo totsuara();
	
?>