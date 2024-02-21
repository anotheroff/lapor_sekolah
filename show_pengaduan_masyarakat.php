<!doctype html>
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

    th:first-child,
    td:first-child {
      max-width: 150px;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }
  </style>
</head>

<body>
  <nav class="navbar bg-primary d-flex justify-content-center">
    <a class="navbar-brand text-light fw-bold" href="index.php">Portal Pengaduan Masyarakat</a>
  </nav>

  <div class="container mt-3">
    <div class="d-flex mb-3">
      <form method="POST" class="d-flex mx-auto ">
        <input class="form-control me-2" type="search" name="cari" placeholder="Search" aria-label="Search">
        <button class="btn btn-primary me-2" type="submit" name="tcari">Search</button>
        <button href="show_pengaduan_masyarakat.php" class="btn btn-secondary me-2" type="submit"
          name="refresh">Refresh</button>
        <a href="form.php" style="color: white;" class="btn btn-warning">Formulir</a>
      </form>
    </div>
    <table class="table table-striped table-hover table-bordered">
      <thead class="table-light">
        <th>Tanggal Pengaduan</th>
        <th>isi laporan</th>
      </thead>
      <tbody>
        <?php
        include 'koneksi.php';

        $result;

        if (isset($_POST['tcari'])) {
          $query = "SELECT * FROM pengaduan WHERE tgl_pengaduan LIKE '%" . $_POST['cari'] . "%' OR NIK LIKE '%" . $_POST['cari'] . "%' OR isi_laporan LIKE '%" . $_POST['cari'] . "%'";
          $result = mysqli_query($conn, $query);
        } else {
          $query = "SELECT * FROM pengaduan";
          $result = mysqli_query($conn, $query);
        }

        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
              <td>" . $row['tgl_pengaduan'] . "</td>
              <td>" . $row['isi_laporan'] . "</td>
            </tr>";
          }
        } else {
          echo "<tr><td colspan='2'>No results found</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</html>