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
<div class="container-fluid">
    <div class="w-50 mx-auto">
        <div class="jumbotron text-center">
            <h1 class="mt-4">Tambah Hero Power</h1>
            <p class="lead">Jangan lupa selalu update mengenai Mobile Legend.</p>
        </div>

        <?php
        // Pastikan sesuai dengan konfigurasi database Anda
        include 'koneksi.php';

        // Cek koneksi
        if ($koneksi->connect_error) {
            die("Connection failed: " . $koneksi->connect_error);
        }

        // Tangkap data dari form jika form disubmit
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama_hero = $_POST['nama_hero'];
            $role_hero = $_POST['role_hero'];
            $jenis_hero = $_POST['jenis_hero'];
            $deskripsi = $_POST['deskripsi'];
            $image = $_POST['image'];

            // Query untuk menambahkan hero ke dalam tabel heropower
            $sql = "INSERT INTO heropower (nama_hero, role_hero, jenis_hero, deskripsi, image) VALUES ('$nama_hero', '$role_hero', '$jenis_hero', '$deskripsi', '$image')";

            if ($koneksi->query($sql) === TRUE) {
                echo "Hero berhasil ditambahkan.";
            } else {
                echo "Error: " . $sql . "<br>" . $koneksi->error;
            }
        }
        // Tutup koneksi
        $koneksi->close();
        ?>

        <h2>Tambah Hero</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
            enctype="multipart/form-data">
            <label>Nama Hero:</label>
            <input type="text" name="nama_hero" required><br>

            <label>Role Hero:</label>
            <input type="text" name="role_hero" required><br>

            <label>Jenis Hero:</label>
            <input type="text" name="jenis_hero" required><br>

            <label>Deskripsi:</label>
            <textarea name="deskripsi" required></textarea><br>

            <label>Image:</label>
            <input type="text" name="image" required><br>

            <input class="btn btn-outline-dark" type="submit" value="Tambah Hero">
        </form>
    </div>
</div>
<?php include('layout/footer.php'); ?>