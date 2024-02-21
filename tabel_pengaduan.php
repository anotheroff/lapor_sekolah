<?php
include_once("koneksi.php");

// Process search form submission
if (isset($_POST['tcari'])) {
    $search_query = $_POST['cari'];
    $result = mysqli_query($conn, "SELECT * FROM pengaduan WHERE 
        id_pengaduan LIKE '%$search_query%' OR 
        NIK LIKE '%$search_query%' OR 
        tgl_pengaduan LIKE '%$search_query%' OR 
        isi_laporan LIKE '%$search_query%' 
        ORDER BY id_pengaduan DESC");
} else {
    // Default query without search
    $result = mysqli_query($conn, "SELECT * FROM pengaduan ORDER BY id_pengaduan DESC");
}
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
            <form method="POST" class="d-flex mx-auto">
                <input class="form-control me-2" type="search" name="cari" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary me-2" type="submit" name="tcari">Search</button>
                <button href="tabel_pengaduan" class="btn btn-secondary me-2" type="submit"
                    name="refresh">Refresh</button>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </form>
        </div>
        <table class="table table-striped table-hover table-bordered">
            <thead class="table-light">
                <th>ID Pengaduan</th>
                <th>NIK</th>
                <th>Tgl Pengaduan</th>
                <th>Isi Laporan</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php
                while ($data = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $data['id_pengaduan'] . "</th>";
                    echo "<th scope='row'>" . $data['NIK'] . "</th>";
                    echo "<td width='25%'>" . $data['tgl_pengaduan'] . "</td>";
                    echo "<td>" . $data['isi_laporan'] . "</td>";

                    // Check if there is a corresponding tanggapan
                    $id_pengaduan = $data['id_pengaduan'];
                    $tanggapan_result = mysqli_query($conn, "SELECT * FROM tanggapan WHERE id_pengaduan = $id_pengaduan");
                    $has_tanggapan = mysqli_num_rows($tanggapan_result) > 0;

                    echo "<td class='text-center'>";
                    if ($has_tanggapan) {
                        echo "<a style='color:white' href='tabel_tanggapan.php?id=" . $data['id_pengaduan'] . "' class='btn btn-sm btn-success'>Lihat Tanggapan</a>";
                    } else {
                        echo "<a style='color:white' href='tanggapi.php?id=" . $data['id_pengaduan'] . "' class='btn btn-sm btn-success'>Tanggapi</a>";
                    }
                    echo "</td>";

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            <a class="text-center" href="tabel_tanggapan.php">Tabel Tanggapan</a>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</html>