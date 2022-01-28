<?php
include '../koneksi.php';

$query=("UPDATE t_ayam SET 
jenis_ayam='$_POST[jenis_ayam]',
ukuran='$_POST[ukuran]',
harga='$_POST[harga]'   
WHERE id_ayam='$_POST[id_ayam]'");
$update = mysqli_query($dbc,$query );

if($update)
    {
         echo "<script>alert('Berhasil Update!');window.location='ayam.php';</script>";
      
    }
else
    {
       
    }
?>