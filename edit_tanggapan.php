<?php
include 'koneksi.php';

if (isset($_POST["submit"])) {
    $id_tanggapan = $_GET['id_tanggapan'];
    $tgl_tanggapan = $_POST["tgl_tanggapan"];
    $tanggapan = $_POST["tanggapan"];
    $result = mysqli_query($conn, "SELECT * FROM tanggapan WHERE id_tanggapan='$id_tanggapan'");
    $row = mysqli_fetch_assoc($result);
    $id_pengaduan = $row['id_pengaduan'];

    $update = mysqli_query($conn, "UPDATE tanggapan SET tanggapan= '$tanggapan' WHERE id_tanggapan=$id_tanggapan");

    if ($update) {
        echo '<script>alert("Berhasil edit tanggapan"); window.location.href = "tabel_tanggapan.php";</script>';
    } else {
        echo '<script>alert("gagal edit tanggapan");</script>';
    }
}

$id_tanggapan = $_GET['id_tanggapan'];
$result = mysqli_query($conn, "SELECT * FROM tanggapan WHERE id_tanggapan='$id_tanggapan'");
$row = mysqli_fetch_assoc($result);

$id_pengaduan = $row['id_pengaduan'];
$tgl_tanggapan = $row['tgl_tanggapan'];
$tanggapan = $row['tanggapan'];
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
    <?php
    include 'koneksi.php';
    $id_tanggapan = $_GET['id_tanggapan'];
    $update = mysqli_query($conn, "SELECT * from tanggapan WHERE id_tanggapan='$id_tanggapan'");
    foreach ($update as $row) {
        ?>
        <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                    <form class="" action="" method="post">
                        <div class="form-group">
                            <label>ID Pengaduan</label>
                            <input type="number" name="id_pengaduan" class="form-control"
                                value="<?php echo $id_pengaduan; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Tanggapan</label>
                            <input type="date" name="tgl_tanggapan" class="form-control"
                                value="<?php echo $tgl_tanggapan; ?>" readonly />
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextareal">Isi Tanggapan</label>
                            <textarea class="form-control" name="tanggapan" id="exampleFormControlTextareal"
                                rows="3"><?php echo $tanggapan; ?></textarea>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <a style="color:white" href="tabel_tanggapan.php" class="btn btn-secondary">Lihat Pengaduan
                            Lainnya</a>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
        crossorigin="anonymous"></script>

</body>

</html>