<?php 
	$host ='localhost';
	$username ='root';
	$password='';
	$dbname ='santri';
	
	try{
		$db = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	catch(PDOException $e){
		echo "Koneksi Gagal ".$e->getMessage();
		die();
	}

	// if(isset($db)){
 
 //     $db = null;
 
	// }
?>