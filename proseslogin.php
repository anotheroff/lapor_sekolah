<?php
session_start();
include "koneksi.php";

$pass = ($_POST['password']);
$username = mysqli_escape_string($conn,$_POST['username']);
$passwword = mysqli_escape_string($conn,$pass);

$login = mysqli_query($conn, "SELECT * FROM petugas where username = '$username' and password ='$passwword'");

$data = mysqli_fetch_array ($login);

if ($data){
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];

    header("location:tabel_pengaduan.php");
}else{
    echo "<script>
    alert ('Maaf , login anda gagal , pastikan username dan password anda benar');
    document.location='login.php';
    </script>";
}
?>+