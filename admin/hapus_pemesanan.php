<?php
include '../koneksi.php';
if( isset($_GET['id']) ){

    // ambil id dari query string
    $pemesanan= $_GET['id'];

    // buat query hapus
    $sql = "DELETE FROM t_pemesanan WHERE id_pemesanan=$pemesanan";
    $query = mysqli_query($dbc, $sql);
    
    // apakah query hapus berhasil?
    if( $query ){
        echo "<script>alert('Berhasil Hapus!');window.location='pemesanan.php';</script>";
    } 
    else {
        die("gagal menghapus...");
    }
} 

 else {
    die("akses dilarang...");
 }


?>