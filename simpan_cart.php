<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['username'])){
    echo "<script  data-toggle='modal' data-target='#mylogin'>alert('anda harus login');window.location='index.php';</script>";
}
else{

$query= "SELECT * FROM t_ayam WHERE id_ayam='$_GET[id]'";
$id_user = $_SESSION['id_user'];
// $sql = "SELECT *,(t_cart.jumlah*t_ayam.harga) as total FROM t_cart,t_ayam WHERE t_cart.id_ayam=t_ayam.id_ayam AND t_cart.id_user='$id_user'";
// $query2 = mysqli_query($dbc,$sql);
// $cart = mysqli_fetch_array($query2);
// $total1 = $total + $cart['total'];
$query3 = "INSERT INTO t_cart (id_ayam,id_user,jumlah) values ('$_GET[id]','$id_user',1)";
$x = mysqli_query($dbc,$query3) or die(mysqli_error($dbc));

if($x)
{
    echo "<script>alert('Berhasil Menambahkan!');window.location='cart.php';</script>";
}
else
{
    echo "gagal";
}
}
?>