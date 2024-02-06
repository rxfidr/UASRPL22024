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
                <h1 class="mt-4">Skill Hero</h1>
                <p class="lead">Setiap hero memiliki skill yang unik dan harus digunakan sesuai agar tingkat kemenangan
                    lebih tinggi.</p>
            </div>
            <div class="container-fluid my-3">
                <form class="d-flex" role="search" method="get">
                    <input class="form-control me-2" type="search" name="search" placeholder="Cari hero .."
                        aria-label="Search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                    <button class="btn btn-outline-dark" type="submit">Cari</button>
                </form>
            </div>

            <?php
            $json_data = file_get_contents('https://raw.githubusercontent.com/p3hndrx/MLBB-API/main/v1/hero-meta-final.json');
            $heroData = json_decode($json_data, true);

            // Filter heroes based on search query
            $searchQuery = isset($_GET['search']) ? strtolower($_GET['search']) : '';
            $filteredHeroes = array_filter($heroData['data'], function ($hero) use ($searchQuery) {
                return !empty($searchQuery) && strpos(strtolower($hero['hero_name']), $searchQuery) !== false;
            });

            // Display all heroes if no search query or if there are no matching heroes
            $heroesToDisplay = !empty($filteredHeroes) ? $filteredHeroes : $heroData['data'];

            foreach ($heroesToDisplay as $hero) {
                echo '<h1>' . $hero['hero_name'] . ' Skills</h1>';
                echo '<img class="custom-image img-thumbnail" src="' . $hero['portrait'] . '" alt="' . $hero['hero_name'] . '">';
                echo '<table class="table table-striped">';
                echo '<tr>
                        <th>Skill Name</th>
                        <th>Type</th>
                        <th>Cooldown</th>
                        <th>Mana Cost</th>
                        <th>Description</th>
                      </tr>';

                foreach ($hero['skills'] as $skill) {
                    echo '<tr>';
                    echo '<td>' . $skill['skill_name'] . '</td>';
                    echo '<td>' . $skill['type'] . '</td>';
                    echo '<td>' . $skill['cooldown'] . '</td>';
                    echo '<td>' . $skill['manacost'] . '</td>';
                    echo '<td>' . $skill['description'] . '</td>';
                    echo '</tr>';
                }

                echo '</table>';
            }
            ?>
        </div>
    </div>
</div>

<?php include('layout/footer.php'); ?>