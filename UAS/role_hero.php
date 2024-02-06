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
<style>
    /* CSS Tambahan untuk menyesuaikan ukuran gambar */
    .custom-image {
        width: 80px;
        /* Sesuaikan dengan lebar yang diinginkan */
        height: auto;
        /* Agar gambar tetap proporsional */
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="w-50 mx-auto">
            <div class="jumbotron text-center">
                <h1 class="mt-4">Role Hero</h1>
                <p class="lead">Setiap hero memiliki role-nya masing-masing agar hero bermain sesuai lane nya dengan
                    optimal.</p>
            </div>
            <div class="container-fluid my-3">
                <form class="d-flex" role="search" method="get">
                    <input class="form-control me-2" type="search" name="search" placeholder="Cari hero .."
                        aria-label="Search">
                    <button class="btn btn-outline-dark" type="submit">Cari</button>
                </form>
            </div>
            <?php
            // Ambil data JSON dari URL
            $json_data = file_get_contents('https://raw.githubusercontent.com/p3hndrx/MLBB-API/main/v1/hero-meta-final.json');

            // Decode data JSON menjadi array PHP
            $hero_data = json_decode($json_data, true);

            // Periksa apakah decoding berhasil dan array data ada
            if (json_last_error() == JSON_ERROR_NONE && isset($hero_data['data'])) {
                // Filter hero berdasarkan input pencarian
                $search = isset($_GET['search']) ? strtolower($_GET['search']) : '';
                $filtered_heroes = array_filter($hero_data['data'], function ($hero) use ($search) {
                    return empty($search) || (strpos(strtolower($hero['hero_name']), $search) !== false);
                });

                // Tampilkan data yang telah difilter dalam tabel
                echo '<table class="table table-striped">';
                echo "<tr><th>Nama Hero</th><th>Role</th><th>Gambar</th><th>Lane</th></tr>";
                foreach ($filtered_heroes as $hero) {
                    echo "<tr>";
                    echo "<td>" . $hero['hero_name'] . "</td>";
                    echo "<td>" . $hero['class'] . "</td>";
                    echo '<td><img class="custom-image img-fluid" src="' . $hero['portrait'] . '" alt="Portrait"></td>';
                    echo '<td>' . implode(', ', $hero['laning']) . '</td>';
                    echo "</tr>";
                }
                echo "</table>";

                // Tampilkan pesan jika hasil pencarian kosong
                if (empty($filtered_heroes)) {
                    echo "Tidak ada hasil yang cocok dengan pencarian.";
                }
            } else {
                // Tampilkan pesan error jika decoding gagal atau array data tidak ada
                echo "Error: Tidak dapat mendecode data JSON atau array 'data' tidak ada.";
            }
            ?>
        </div>
    </div>
</div>
<?php include('layout/footer.php'); ?>