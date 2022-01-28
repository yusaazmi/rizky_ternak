<?php
include 'koneksi.php';
session_start();
if (!isset($_SESSION['username'])){
    echo "<script data-toggle='modal' data-target='#mylogin'>alert('anda harus login');window.location='index.php';</script>";
}
else{
    $id_user = $_POST['id_user'];
    $total_bayar = $_POST['total_bayar'];
    $date = $_POST['tgl_pemesanan'];
    $jml_pemesanan = $_POST['jml_pemesanan'];
    $kode_unik = $_POST['kode_unik'];
    $bukti_pembayaran = $_FILES['bukti_pembayaran']['name'];
    $total_bayar = $_POST['total_bayar'];

    $tmp = $_FILES['bukti_pembayaran']['tmp_name'];
    $b = date('dmYHis').$bukti_pembayaran;
    $path = 'img/'. $b;
    if(move_uploaded_file($tmp , $path)){
        $query = "INSERT INTO t_pemesanan (id_user,jml_pemesanan,bukti_pembayaran,kode_unik,total_bayar,tgl_pemesanan,status_pembayaran) values ('$id_user','$jml_pemesanan','$b','$kode_unik','$total_bayar','$date','belum terbayar')";
        mysqli_query($dbc,$query) or die(mysqli_error($dbc));
        if($query)
        {
            echo "<script>alert('Pemesanan berhasil! Silahkan tunggu admin kami menghubungi anda :)');window.location='index.php';</script>";
        }
        else
        {
            echo "gagal";
        }
    }
}
?>