<?php
include 'koneksi.php';

// Process search form submission
if (isset($_POST['tcari'])) {
    $search_query = $_POST['cari'];
    $sql = "SELECT * FROM tanggapan WHERE 
            id_tanggapan LIKE '%$search_query%' OR
            id_pengaduan LIKE '%$search_query%' OR
            tgl_tanggapan LIKE '%$search_query%' OR
            tanggapan LIKE '%$search_query%'
            ORDER BY id_tanggapan DESC";
} else {
    // Default query without search
    $sql = "SELECT * FROM tanggapan ORDER BY id_tanggapan DESC";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengaduan Masyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>

<body>
    <nav class="navbar bg-primary d-flex justify-content-center">
        <a class="navbar-brand text-light fw-bold" href="#">Portal Pengaduan Masyarakat</a>
    </nav>
    <div class="container mt-3">
        <div class="d-flex mb-3">
            <form method="POST" class="d-flex mx-auto ">
                <input class="form-control me-2" type="search" name="cari" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary me-2" type="submit" name="tcari">Search</button>
                <button href="tabel_tanggapan" class="btn btn-secondary me-2" type="submit" name="refresh">Refresh</button>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </form>
        </div>
        <table class="table table-striped table-hover table-bordered">
            <thead class="table-light">
                <th>ID Tanggapan</th>
                <th>ID Pengaduan</th>
                <th>Tgl Tanggapan</th>
                <th>Tanggapan</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['id_tanggapan']}</td>";
                    echo "<td>{$row['id_pengaduan']}</td>";
                    echo "<td>{$row['tgl_tanggapan']}</td>";
                    echo "<td>{$row['tanggapan']}</td>";
                    echo "<td>
                            <a href='edit_tanggapan.php?id_tanggapan={$row['id_tanggapan']}' style='color:white;'class='btn btn-warning'>Edit</a>
                            <a href='hapus_tanggapan.php?id_tanggapan={$row['id_tanggapan']}' class='btn btn-danger' onclick='return confirm(\"Are you sure?\")'>Hapus</a>
                        </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            <a class="text-center" href="tabel_pengaduan.php">Tabel Pengaduan</a>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455r+AoJl+0I4" crossorigin="anonymous">
    </script>

</html>