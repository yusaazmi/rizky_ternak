<?php
include '../koneksi.php';
if( isset($_GET['id']) ){

    // ambil id dari query string
    $ayam= $_GET['id'];

    // buat query hapus
    $sql = "DELETE FROM t_ayam WHERE id_ayam=$ayam";
    $query = mysqli_query($dbc, $sql);
    
    // apakah query hapus berhasil?
    if( $query ){
        echo "<script>alert('Berhasil Hapus!');window.location='ayam.php';</script>";
    } 
    else {
        die ("gagal menghapus...");
    }
} 

 else {
    die("akses dilarang...");
 }


?>