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
                <h1 class="mt-4">Daftar Item dan Atributnya</h1>
                <p class="lead">Sesuaikan item anda agar musuh dapat ditaklukan dengan mudah.</p>
            </div>
            <?php
            $json_data = file_get_contents('https://raw.githubusercontent.com/p3hndrx/MLBB-API/main/v1/item-meta-final.json'); // Masukkan JSON data di sini
            
            $data = json_decode($json_data, true);

            echo '<table class="table table-striped">';
            echo '<tr><th>Item Name</th><th>Tier</th><th>Category</th><th>Cost</th><th>Summary</th><th>Build Path</th></tr>';

            foreach ($data['data'] as $item) {
                echo '<tr>';
                echo '<td>' . $item['item_name'] . '</td>';
                echo '<td>' . $item['item_tier'] . '</td>';
                echo '<td>' . $item['item_category'] . '</td>';
                echo '<td>' . $item['data'][0]['cost'] . '</td>';
                echo '<td>' . $item['data'][0]['summary'] . '</td>';

                // Build Path
                echo '<td>';
                foreach ($item['data'][0]['build_path'] as $buildItem) {
                    echo $buildItem['item_name'] . '<br>';
                }
                echo '</td>';

                echo '</tr>';
            }

            echo '</table>';
            ?>
        </div>
    </div>
</div>
<?php include('layout/footer.php'); ?>