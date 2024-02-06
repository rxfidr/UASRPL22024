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
			<h1 class="mt-4">Dashboard Admin</h1>
			<p class="lead">Jangan lupa selalu update mengenai Mobile Legend.</p>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<p>Daftar Pengguna</p>
			<?php
			// Menginclude file konfigurasi
			include 'koneksi.php';

			// Fungsi untuk menghindari serangan SQL Injection
			function sanitize($data)
			{
				global $koneksi;
				return mysqli_real_escape_string($koneksi, htmlspecialchars($data));
			}

			// Jika parameter id_hapus ada dan tidak kosong
			if (isset($_GET['id_hapus']) && !empty($_GET['id_hapus'])) {
				$id_hapus = sanitize($_GET['id_hapus']);

				// Query untuk menghapus data berdasarkan ID
				$hapus_sql = "DELETE FROM user WHERE id = $id_hapus";
				if ($koneksi->query($hapus_sql) === TRUE) {
					echo "Data berhasil dihapus.";
				} else {
					echo "Error: " . $hapus_sql . "<br>" . $koneksi->error;
				}
			}

			// Query untuk mendapatkan data dari tabel user
			$sql = "SELECT id, nama, email, id_ml, no_telp FROM user";
			$result = $koneksi->query($sql);

			if ($result->num_rows > 0) {
				// Menampilkan tabel
				echo '<table class="table table-striped mt-3">
    <tr>
        <th>Nama Pengguna</th>
        <th>Email</th>
        <th>ID ML</th>
        <th>Nomor Telepon</th>
        <th>Aksi</th>
    </tr>';
				while ($row = $result->fetch_assoc()) {
					echo "<tr>
        <td>" . $row["nama"] . "</td>
        <td>" . $row["email"] . "</td>
        <td>" . $row["id_ml"] . "</td>
        <td>" . $row["no_telp"] . '</td>
        <td>
            <a href="edit.php?id=' . $row["id"] . '">Edit</a>
            <a href="?id_hapus=' . $row["id"] . '">Hapus</a>
        </td>
    </tr>';
				}
				echo "</table>";
			} else {
				echo "Tidak ada data user.";
			}

			// Menutup koneksi
			$koneksi->close();
			?>


		</div>
		<div class="col-sm-6">
			<p>Hero Power Terkini</p>
			<a href="tambah_hero.php" class="btn btn-outline-dark">Tambah Hero Power</a>
			<?php
			// Menginclude file konfigurasi
			include 'koneksi.php';

			// Query untuk mendapatkan data dari tabel hero
			$sql = "SELECT nama_hero, role_hero, jenis_hero, deskripsi, image FROM heropower";
			$result = $koneksi->query($sql);

			if ($result->num_rows > 0) {
				// Menampilkan tabel
				echo '<table class="table table-striped mt-3">
            <tr>
                <th>Nama Hero</th>
                <th>Role Hero</th>
                <th>Jenis Hero</th>
                <th>Deskripsi</th>
            </tr>';
				while ($row = $result->fetch_assoc()) {
					echo "<tr>
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