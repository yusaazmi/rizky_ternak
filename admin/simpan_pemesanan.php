<?php
include '../koneksi.php';

$id_user = $_POST['id_user'];
$tgl_pemesanan = $_POST['tgl_pemesanan'];
$jml_pemesanan = $_POST['jml_pemesanan'];
$id_ayam = $_POST['id_ayam'];


$query = "INSERT INTO t_pemesanan values ('','$id_user','$tgl_pemesanan','$jml_pemesanan','$id_ayam')";
$query2= mysqli_query($dbc,$query) or die(mysqli_error($dbc));

if($query2)
{
    $select = "SELECT * FROM t_pemesanan,t_ayam WHERE t_pemesanan.id_ayam = t_ayam.id_ayam ORDER BY t_pemesanan.id_pemesanan desc limit 1";
    $select2 = mysqli_query($dbc,$select);
    $select3 = mysqli_fetch_array($select2);
    $total = $select3['harga']*$jml_pemesanan;
    $random = rand(10,100);
    $query1 = "INSERT INTO t_pembayaran  values ('', '$select3[id_pemesanan]','$random','$total')";
    $query13 =mysqli_query($dbc,$query1) ;
    if($query13)
    {
         echo "<script>alert('Berhasil Menambahkan!');window.location='pemesanan.php';</script>";
    }
}
else
{
    echo "gagal";
}


?>