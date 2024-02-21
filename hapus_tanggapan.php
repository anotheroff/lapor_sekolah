<?php
include 'koneksi.php';
$id = $_GET["id_tanggapan"];
$query = mysqli_query($conn, "DELETE FROM tanggapan WHERE id_tanggapan='$id'");

if ($query) {
    echo '<script>alert("Berhasil hapus tanggapan"); window.location.href = "tabel_tanggapan.php";</script>';
} else {
    echo '<script>alert("gagal hapus tanggapan");</script>';
}
?>