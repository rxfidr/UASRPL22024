<?php
// Mengaktifkan session pada PHP
session_start();

// Cek apakah pengguna sudah login dan memiliki level pegawai atau admin
if (!isset($_SESSION['username']) || ($_SESSION['level'] !== "pegawai" && $_SESSION['level'] !== "admin")) {
    // Jika tidak, redirect ke halaman login
    header("location:login_view.php");
    exit(); // Hentikan eksekusi kode selanjutnya
}
?>
<?php include('layout/header.php'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="w-50 mx-auto">
            <div class="jumbotron text-center">
                <h1 class="mt-4">Hero Power Terkini</h1>
                <p class="lead">Gunakan hero dengan power yang lebih kuat dari lawan agar memperbesar kesempatan untung
                    menang.</p>
            </div>
            <?php
            // Menginclude file konfigurasi
            include 'koneksi.php';

            // Query untuk mendapatkan data dari tabel hero
            $sql = "SELECT nama_hero, role_hero, jenis_hero, deskripsi, image FROM heropower";
            $result = $koneksi->query($sql);

            if ($result->num_rows > 0) {
                // Menampilkan tabel
                echo '<table class="table table-striped">
            <tr>
            <th>Gambar</th>
                <th>Nama Hero</th>
                <th>Role Hero</th>
                <th>Jenis Hero</th>
                <th>Deskripsi</th>
            </tr>';
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td><img src='" . $row["image"] . "' alt='Hero Image' width='100'></td>
                <td>" . $row["nama_hero"] . "</td>
                <td>" . $row["role_hero"] . "</td>
                <td>" . $row["jenis_hero"] . "</td>
                <td>" . $row["deskripsi"] . "</td>
            </tr>";
                }
                echo "</table>";
            } else {
                echo "Tidak ada data hero.";
            }

            // Menutup koneksi
            $koneksi->close();
            ?>
        </div>
    </div>
</div>
<?php include('layout/footer.php'); ?>