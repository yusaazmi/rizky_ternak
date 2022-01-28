<?php
include 'koneksi.php';

$update = mysqli_query($dbc, "UPDATE kasir 
SET
nama_kasir='$_POST[nama_kasir]', 
alamat='$_POST[alamat]',
telepon='$_POST[telepon]',
status='$_POST[status]' 
WHERE id_kasir='$_POST[id_kasir]'");

if($update)
    {
        echo "<script>alert('Berhasil Update!');window.location='form_kasir.php';</script>";
    }
else
    {
        echo 'gagal edit';
    }
?>