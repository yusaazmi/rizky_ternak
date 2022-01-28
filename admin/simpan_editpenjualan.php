<?php
include 'koneksi.php';

$update = mysqli_query($dbc,"UPDATE penjualan
SET 
id_buku='$_POST[id_buku]',nama_pembeli='$_POST[nama_pembeli]',id_kasir='$_POST[id_kasir]', jumlah='$_POST[jumlah]', tanggal='$_POST[tanggal]' 
WHERE id_penjualan='$_POST[id_penjualan]'");

if($update)
    {
        echo "<script>alert('Berhasil Update!');window.location='form_penjualan.php';</script>";    }
else
    {
        echo 'gagal edit';
    }
?>