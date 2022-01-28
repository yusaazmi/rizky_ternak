<?php
include '../koneksi.php';

$query=("UPDATE t_pemesanan SET 
status_pembayaran='$_POST[status_pembayaran]'
WHERE id_pemesanan='$_POST[id_pemesanan]'");
$update = mysqli_query($dbc,$query );

if($update)
    {
         echo "<script>alert('Berhasil Update!');window.location='pemesanan.php';</script>";
      
    }
else
    {
       
    }
?>