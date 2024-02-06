<?php
// Mengaktifkan session pada PHP
session_start();

// Cek apakah pengguna sudah login dan memiliki level admin
if (!isset($_SESSION['username']) || $_SESSION['level'] !== "admin") {
    // Jika tidak, redirect ke halaman login
    header("location:login_view.php");
    exit(); // Hentikan eksekusi kode selanjutnya
}
?>
<?php
// Menginclude file konfigurasi
include 'koneksi.php';

// Fungsi untuk menghindari serangan SQL Injection
function sanitize($data)
{
    global $koneksi;
    return mysqli_real_escape_string($koneksi, htmlspecialchars($data));
}

// Jika form edit disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = sanitize($_POST['id']);
    $nama = sanitize($_POST['nama']);
    $email = sanitize($_POST['email']);
    $id_ml = sanitize($_POST['id_ml']);
    $no_telp = sanitize($_POST['no_telp']);

    // Query untuk memperbarui data pengguna berdasarkan ID
    $update_sql = "UPDATE user SET nama='$nama', email='$email', id_ml='$id_ml', no_telp='$no_telp' WHERE id=$id";

    if ($koneksi->query($update_sql) === TRUE) {
        header("location:halaman_admin.php");
    } else {
        echo "Error: " . $update_sql . "<br>" . $koneksi->error;
    }
}

// Menutup koneksi
$koneksi->close();
?>