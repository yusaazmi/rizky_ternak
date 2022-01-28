<?php
include 'koneksi.php';
if( isset($_GET['id']) ){

    // ambil id dari query string
    $penjualan= $_GET['id'];

    // buat query hapus
    $sql = "DELETE FROM penjualan WHERE id_penjualan=$penjualan";
    $query = mysqli_query($dbc, $sql);
    
    // apakah query hapus berhasil?
    if( $query ){
        echo "<script>alert('Berhasil Hapus!');window.location='form_penjualan.php';</script>";
    } 
    else {
        die("gagal menghapus...");
    }
} 

 else {
    die("akses dilarang...");
 }


?>