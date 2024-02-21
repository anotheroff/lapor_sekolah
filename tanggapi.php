<?php
session_start();

include 'koneksi.php';
$username = $_SESSION["username"];
$result = mysqli_query($conn, "SELECT id_petugas FROM petugas WHERE username = '$username'");
$data = mysqli_fetch_assoc($result);
$id_petugas = $data['id_petugas'];

if (isset($_GET["id"])) {
    $id_pengaduan = $_GET['id'];
    $result_pengaduan = mysqli_query($conn, "SELECT * FROM pengaduan WHERE id_pengaduan=$id_pengaduan");
    while ($data_pengaduan = mysqli_fetch_array($result_pengaduan)) {
        $tgl_pengaduan = $data_pengaduan['tgl_pengaduan'];
        $isi_laporan = $data_pengaduan['isi_laporan'];
    }
} else {

}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.  googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
    <title>Pengaduan</title>
</head>

<body>
    <nav class="navbar bg-primary d-flex justify-content-center">
        <a class="navbar-brand text-light fw-bold" href="#">Portal Pengaduan Masyarakat</a>
    </nav>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <form class="mt-4" action="" method="post">
                    <center>
                        <h3>Beri Tanggapan</h3>
                    </center>
                    <div class="form-group mt-3">
                        <label>Id Pengaduan</label>
                        <input type="number" name="id_pengaduan" class="form-control"
                            value="<?php echo $id_pengaduan; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Isi laporan</label>
                        <input type="text" name="isi_laporan" class="form-control" value="<?php echo $isi_laporan; ?>"
                            readonly>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pengaduan</label>
                        <input type="date" name="tgl_pengaduan" class="form-control"
                            value="<?php echo $tgl_pengaduan; ?>" readonly />
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextareal">Isi Tanggapan</label>
                        <textarea class="form-control" name="tanggapan" id="exampleFormControlTextareal"
                            rows="3"></textarea>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    <a style="color:white" href="tabel_tanggapan.php" class="btn btn-secondary">Lihat Pengaduan
                        Lainnya</a>
                </form>
                <?php

                if (isset($_POST['submit'])) {
                    $id_pengaduan = $_POST['id_pengaduan'];
                    $isi_laporan = $_POST['isi_laporan'];
                    $tgl_pengaduan = $_POST['tgl_pengaduan'];
                    $tanggapan = $_POST['tanggapan'];
                    $tgl_tanggapan = date("Y-m-d");
                    $_SESSION['id_petugas'] = $id_petugas;
                    $result = mysqli_query($conn, "INSERT INTO tanggapan(id_pengaduan, id_petugas, tgl_tanggapan, tanggapan) VALUES('$id_pengaduan','$id_petugas', '$tgl_tanggapan', '$tanggapan')");
                    if ($result) {
                        header("Location: tabel_tanggapan.php");
                        exit;
                    } else {
                        echo "Terjadi kesalahan saat menambahkan tanggapan.";
                    }
                }

                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
        crossorigin="anonymous"></script>

</body>

</html>