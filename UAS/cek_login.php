<?php
// Mengaktifkan session pada PHP
session_start();

// Menghubungkan PHP dengan koneksi database
include 'koneksi.php';

// Cek apakah pengguna sudah login
if (isset($_SESSION['username'])) {
    // Jika sudah login, redirect ke halaman dashboard sesuai level
    if ($_SESSION['level'] == "admin") {
        header("location:index.php");
    } elseif ($_SESSION['level'] == "pegawai") {
        header("location:index.php");
    }
    exit(); // Hentikan eksekusi kode selanjutnya
}

// Cek apakah ada data yang dikirim dari form login
if (isset($_POST['username']) && isset($_POST['password'])) {
    // Tangkap data yang dikirim dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Seleksi data user dengan username dan password yang sesuai
    $login = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    // Menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($login);

    // Cek apakah username dan password ditemukan pada database
    if ($cek > 0) {
        $data = mysqli_fetch_assoc($login);

        // Buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = $data['level'];

        // Alihkan ke halaman dashboard sesuai level
        if ($data['level'] == "admin") {
            header("location:index.php");
        } elseif ($data['level'] == "pegawai") {
            header("location:index.php");
        }
        exit(); // Hentikan eksekusi kode selanjutnya
    } else {
        // Alihkan ke halaman login kembali jika login gagal
        header("location:login_view.php?pesan=gagal");
        exit(); // Hentikan eksekusi kode selanjutnya
    }
}

// Jika tidak ada data dari form login atau pengguna belum login, tampilkan halaman login
include 'login_view.php';
?>