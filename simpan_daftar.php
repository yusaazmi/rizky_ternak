<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$kodepos = $_POST['kodepos'];
$no_hp = $_POST['no_hp'];


$query = "INSERT INTO t_user (username,password,nama,alamat,kodepos,no_hp) values ('$username','$password','$nama','$alamat','$kodepos','$no_hp')";
mysqli_query($dbc,$query) or die(mysqli_error($dbc));

if($query)
{
    echo "<script>alert('Berhasil Menambahkan!');window.location='index.php';</script>";
}
else
{
    echo "gagal";
}
?>