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

<?php include('../layout/header_content.php'); ?>
<div class="container-fluid">
    <div class="jumbotron text-center">
        <h1 class="mt-4">Angela</h1>
        <p class="lead">Mage Support</p>
        <img src="https://static.wikia.nocookie.net/mobile-legends/images/6/6b/Hero551-portrait.png" alt="">
    </div>
    <div class="wrapper">
        <p class="text-center mt-3">Angela merupakan salah satu hero yang memiliki skill healing yang sangat berguna
            untuk rekan satu timnya. Akan tetapi, skill ini memiliki stack yang terbatas, jadi kamu harus bijaksana saat
            memberikan heal ke tim. Tidak hanya skill healing saja, Angela memiliki skill mematikan lainnya yang bisa
            membuat lawan takut untuk menyerangnya.

            Seperti skill 2-nya yang mengikat musuh sembari memberikan efek slow yang diakhiri dengan stun.

            Selain itu, Angela juga termasuk hero yang mobile dengan skill ultimate-nya yang bisa masuk ke hero core
            meski dari jarak yang jauh.

            Menariknya, selain masuk ke dalam tubuh hero core, ultimate Angela ini juga memberikan efek shield tambahan
            kepada core sambil mengeluarkan efek skill 1 dan 2 untuk mengontrol musuh saat terjadi war.

            Intinya, jika sudah terikat dengan Angela, musuh akan kesulitan bergerak dan hero core bisa menghabiskan
            musuh dengan cepat.
        </p>
    </div>
</div>
<?php include('../layout/footer.php'); ?>