<?php
include '../koneksi.php';

$nama = $_POST['nama'];
$email =$_POST['email'];
$subjek = $_POST['subjek'];
$pesan = $_POST['pesan'];

$query = "INSERT INTO t_contact (id_contact,nama,email,subjek,pesan) values ('','$nama','$email','$subjek','$pesan')";
mysqli_query($dbc,$query) or die(mysqli_error($dbc));

if($query)
{
    echo "<script>alert('Berhasil Menambahkan!');window.location='../contact.php';</script>";
}
else
{
    echo "gagal";
}
?>