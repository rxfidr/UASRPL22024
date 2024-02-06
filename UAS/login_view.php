<?php
// Mengaktifkan session pada PHP
session_start();

// Cek apakah pengguna sudah login
if (isset($_SESSION['username'])) {
	// Jika sudah login, redirect ke halaman dashboard sesuai level
	if ($_SESSION['level'] == "admin") {
		header("location:halaman_admin.php");
	} elseif ($_SESSION['level'] == "pegawai") {
		header("location:index.php");
	}
	exit(); // Hentikan eksekusi kode selanjutnya
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="https://i.pinimg.com/736x/8e/0d/46/8e0d462eef87f64eb590a5d9c848c0c1.jpg">
	<title>Login - Mobile Legend Guide</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div class="kotak_login">
		<p class="tulisan_login">Silahkan login</p>

		<form action="cek_login.php" method="post">
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username .." required="required">

			<label>Password</label>
			<input type="password" name="password" class="form_login" placeholder="Password .." required="required">

			<input type="submit" class="tombol_login" value="LOGIN">

			<br />
			<br />
			<center>
				<a class="link" href="register.php">Daftar</a>
			</center>
		</form>

	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
		crossorigin="anonymous"></script>

</body>

</html>