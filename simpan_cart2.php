<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['username'])){
    echo "<script  data-toggle='modal' data-target='#mylogin'>alert('anda harus login');window.location='index.php';</script>";
}
else{

$id_user = $_SESSION['id_user'];
$sql = "SELECT *,(t_cart.jumlah*t_ayam.harga) as total FROM t_cart,t_ayam WHERE t_cart.id_ayam=t_ayam.id_ayam AND t_cart.id_user='$id_user'";
$query = mysqli_query($dbc,$sql);
$cart = mysqli_fetch_array($query);

$jumlah = $_POST['jumlah'];
$id_ayam = $_POST['id_ayam'];
$query = "INSERT INTO t_cart (id_cart,id_ayam,id_user,jumlah) values ('','$id_ayam','$id_user','$jumlah')";
mysqli_query($dbc,$query) or die(mysqli_error($dbc));

if($query)
{
     echo "<script>alert('Berhasil Menambahkan!');window.location='cart.php';</script>";
}
else
{
    echo "gagal";
}
}
?>