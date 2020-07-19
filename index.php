<?php 
if (isset($_POST['login'])) {
	$user = $_REQUEST['username'];
	$pass = $_REQUEST['password'];

	$username1 = stripslashes($user);
	$password1 = stripslashes($pass);

	require_once 'config/koneksi.php';
	require_once 'config/encrypt.php';

	$password = encrypt($password1);

	$qs = $db->query("SELECT * from user WHERE USERNAME = '$username1' AND PASSWORD = '$password' AND STATUS_USER = 'A' ");
	$rs = $qs->fetch(PDO::FETCH_ASSOC);

	$akun = base64_encode($rs['USERNAME']."|".$rs['PASSWORD']);

	if ($username1 == $rs['USERNAME'] && $password == $rs['PASSWORD']) {
		session_start();
		$_SESSION['xyz'] = $akun;
		$_SESSION['lvl'] = $rs['LEVEL'];
		$_SESSION['kmp'] = $rs['KD_KOMPLEK'];
		echo '<META HTTP-EQUIV="Refresh" content="0; URL=administrator/dashboard">';
	}else{
		echo "<script language='javascript'> alert ('Username atau Password yang anda masukkan salah atau Status akun anda sedang Tidak Aktif, silahkan hubungi Administrator dan Login kembali !!!');</script>";
		echo '<META HTTP-EQUIV="Refresh" content="0; URL=index.php">';
	}
}
?>

<html>
	<head>
		<title>Form Login SI Santri</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="shortcut icon" href="asset/login/img/logoalmunawir.png"/>
		<link rel="stylesheet" href="asset/login/css/menu.css"/>
		<link rel="stylesheet" href="asset/login/css/main.css"/>
		<link rel="stylesheet" href="asset/login/css/font.css"/>
		<link rel="stylesheet" href="asset/login/css/font-awesome.min.css"/>
		<script type="text/javascript" src="asset/login/js/jquery-1.12.4.min.js"></script>
		<script type="text/javascript" src="asset/login/js/main.js"></script>
	</head>
<body>
	<div class="background"></div>
	<div class="backdrop"></div>
	<div class="login-form-container" id="login-form">
		<div class="login-form-content">
			<div class="login-form-header">
				<div class="logo">
					<img src="asset/login/img/logoalmunawir.png"/>
				</div>
				<h4><b>Login SIS Ponpes Al - Munawwir</b></h4>
			</div>
			<form method="post" action="" class="login-form">
				<div class="input-container">
					<i class="fa fa-user"></i>
					<input type="text" class="input" name="username" placeholder="Masukkan Username Anda"/>
				</div>
				<div class="input-container">
					<i class="fa fa-lock"></i>
					<input type="password"  id="login-password" class="input" name="password" placeholder="Masukkan Password Anda"/>
					<i id="show-password" class="fa fa-eye"></i>
				</div>
				<br>
				<input type="submit" name="login" value="Login" class="button"/>
			
			</form>
		</div>
	</div>
</body>
</html>