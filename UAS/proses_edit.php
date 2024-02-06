<!-- proses_edit.php -->
<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $id_ml = $_POST['id_ml'];
    $no_telp = $_POST['no_telp'];

    // Query untuk mengupdate data berdasarkan ID
    $update_sql = "UPDATE user SET nama='$nama', email='$email', id_ml='$id_ml', no_telp='$no_telp' WHERE id=$id";

    if ($koneksi->query($update_sql) === TRUE) {
        echo "Data berhasil diupdate.";
    } else {
        echo "Error: " . $update_sql . "<br>" . $koneksi->error;
    }
} else {
    echo "Metode request tidak valid.";
}

$koneksi->close();
?>