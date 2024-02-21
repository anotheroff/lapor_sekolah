<?php
include 'koneksi.php';
if (isset($_POST["submit"])) {
    $nik = $_POST["nik"];
    $nama = $_POST["nama"];
    $telp = $_POST["no_telp"];
    $tgl_adu = $_POST["tgl_pengaduan"];
    $isi = $_POST["isi_laporan"];

    $masyarakat = mysqli_query($conn, "INSERT INTO masyarakat(NIK, nama, no_telp) values('$nik','$nama','$telp')");
    $pengaduan = mysqli_query($conn, "INSERT INTO pengaduan(NIK, tgl_pengaduan, isi_laporan) values('$nik','$tgl_adu','$isi')");

    if ($masyarakat && $pengaduan) {
        echo '<script>alert("Berhasil Melakukan Pengaduan"); window.location.href = "show_pengaduan_masyarakat.php";</script>';
    } else {
        echo '<script>alert("gagal melakukan pengaduan");</script>';
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Masyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<style>
    input.form-control {
        padding-left: 2.5em;
    }

    textarea.form-control {
        padding-left: 2.5em;
        padding-top: 5%;
    }

    .input-field {
        position: relative;
    }

    .input-field .material-icons {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        left: 10px;
    }

    .input-icon {
        position: absolute;
        left: 0.5em;
        top: 50%;
        transform: translateY(-50%);
    }
</style>

<body>
    <div class>

    </div>

    <nav class="navbar bg-primary d-flex justify-content-center">
        <a class="navbar-brand text-light fw-bold" href="index.php">Portal Pengaduan Masyarakat</a>
    </nav>

    <div class="container-fluid mt-3" style="padding-right:30%; padding-left:30%;">
        <form action="" method="POST" id="pengaduanForm">
            <div class="d-flex justify-content-center">
                <h4 style="color:blue;">Form Pengaduan Masyarakat</h4>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="mb-3 mt-4 input-field">
                        <i class="material-icons prefix">person</i>
                        <input class="form-control" name="nik" id="nik" type="number" placeholder="NIK" oninput="checkForm()">
                    </div>
                    <div class="mb-3 mt-2 input-field">
                        <i class="material-icons prefix">person</i>
                        <input class="form-control" name="nama" id="nama" type="text" placeholder="Nama" oninput="checkForm()">
                    </div>
                    <div class="mb-3 mt-2 input-field">
                        <i class="material-icons prefix">local_phone</i>
                        <input class="form-control" name="no_telp" id="no_telp" type="number" placeholder="No Telepon" oninput="checkForm()">
                    </div>
                    <div class="mb-3 mt-2 input-field">
                        <i class="material-icons prefix"></i>
                        <input class="form-control" name="tgl_pengaduan" id="tgl_pengaduan" type="date" oninput="checkForm()" placeholder="Tanggal Pengaduan">
                    </div>
                    <div class=" mb-3 mt-2 input-field">
                        <i class="material-icons prefix">message</i>
                        <textarea class="form-control" name="isi_laporan" id="isi_laporan" type="text" oninput="checkForm()"
                            placeholder="Isi pengaduan anda..."></textarea>
                    </div>
                    <div class="d-flex" style="justify-content:space-between;">
                        <button type="submit" name="submit" id="submit" style="width: 250px;" class="btn btn-primary"
                            disabled>Kirim</button>
                        <button type="button" onclick="resetForm()" style="width: 250px;"
                            class="btn btn-danger">BATAL</button>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <a href="show_pengaduan_masyarakat.php" class="bt-3" style="color:blue;">Lihat pengaduan
                            lainnya</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script>
    function getCurrentDate() {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        return yyyy + '-' + mm + '-' + dd;
    }

    document.getElementById("tgl_pengaduan").value = getCurrentDate();

    function resetForm() {
        document.getElementById("pengaduanForm").reset();
    }

    function checkForm() {
        var nik = document.getElementById("nik").value;
        var nama = document.getElementById("nama").value;
        var noTelp = document.getElementById("no_telp").value;
        var tglPengaduan = document.getElementById("tgl_pengaduan").value;
        var isiLaporan = document.getElementById("isi_laporan").value;

        var submitButton = document.getElementById("submit");

        if (nik !== '' && nama !== '' && noTelp !== '' && tglPengaduan !== '' && isiLaporan !== '') {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    }
</script>


</html>