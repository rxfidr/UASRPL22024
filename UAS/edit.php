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
<?php include('layout/header.php'); ?>
<?php
// Menginclude file konfigurasi
include 'koneksi.php';

// Fungsi untuk menghindari serangan SQL Injection
function sanitize($data)
{
    global $koneksi;
    return mysqli_real_escape_string($koneksi, htmlspecialchars($data));
}

// Jika parameter id ada dan tidak kosong
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_edit = sanitize($_GET['id']);

    // Query untuk mendapatkan data pengguna berdasarkan ID
    $edit_sql = "SELECT * FROM user WHERE id = $id_edit";
    $edit_result = $koneksi->query($edit_sql);

    if ($edit_result->num_rows > 0) {
        $edit_data = $edit_result->fetch_assoc();
        ?>
        <div class="w-50 mx-auto">
            <div class="jumbotron text-center">
                <h1 class="mt-4 mb-4">Edit Data Pengguna</h1>
            </div>
        </div>
        <div class="wrapper w-50 mx-auto">
            <form action="update.php" method="post">
                <input class="form-control" type="hidden" name="id" value="<?php echo $edit_data['id']; ?>">
                <label for="nama">Nama Pengguna:</label>
                <input class="form-control" type="text" name="nama" value="<?php echo $edit_data['nama']; ?>" required><br>

                <label for="email">Email:</label>
                <input class="form-control" type="email" name="email" value="<?php echo $edit_data['email']; ?>" required><br>

                <label for="id_ml">ID ML:</label>
                <input class="form-control" type="text" name="id_ml" value="<?php echo $edit_data['id_ml']; ?>" required><br>

                <label for="no_telp">Nomor Telepon:</label>
                <input class="form-control" type="tel" name="no_telp" value="<?php echo $edit_data['no_telp']; ?>" required><br>

                <input class="btn btn-outline-dark" type="submit" value="Simpan">
                <button class="btn btn-outline-dark">Kembali</button>
            </form>
        </div>
        </div>
        <?php
    } else {
        echo "Data pengguna tidak ditemukan.";
    }
} else {
    echo "ID tidak valid.";
}
?>
<?php include('layout/footer.php'); ?>