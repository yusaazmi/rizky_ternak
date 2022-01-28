<?php
include '../koneksi.php';

$jenis_ayam = $_POST['jenis_ayam'];
$ukuran = $_POST['ukuran'];
$harga = $_POST['harga'];
$gambar = $_FILES['gambar']['name'];
$deskripsi = $_POST['deskripsi'];
$tmp = $_FILES['gambar']['tmp_name'];

$foto = date('dmYHis').$gambar;

$path = '../img/'.$foto;
if(move_uploaded_file($tmp , $path)){

    $query = "INSERT INTO t_ayam (jenis_ayam,ukuran,harga,gambar,deskripsi) values ('$jenis_ayam','$ukuran','$harga','$foto','$deskripsi')";
    mysqli_query($dbc,$query) or die(mysqli_error($dbc));
    
    if($query)
    {
        echo "<script>alert('Berhasil Menambahkan!');window.location='ayam.php';</script>";
    }
    else
    {
        echo "gagal";
    }
}
else{
     echo "<script>alert('Gagal Menambahkan!');window.location='';</script>";
}
    ?>