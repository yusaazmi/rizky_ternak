<?php
include 'koneksi.php';
session_start();
$update = mysqli_query($dbc, "UPDATE t_cart SET jumlah='$_POST[jumlah]' WHERE id_cart = '$_POST[id_cart]'");

if($update)
    {
         echo "<script>alert('Berhasil Update!');window.location='cart.php';</script>";
    }
else
    {
        echo 'gagal edit';
    }
?>