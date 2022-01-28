<?php
include '../koneksi.php';
if( isset($_GET['id']) ){

    // ambil id dari query string
    $cart= $_GET['id'];

    // buat query hapus
    $sql = "DELETE FROM t_cart WHERE id_cart=$cart";
    $query = mysqli_query($dbc, $sql);
    
    // apakah query hapus berhasil?
    if( $query ){
        echo "<script>alert('Berhasil Hapus!');window.location='cart.php';</script>";
    } 
    else {
        die("gagal menghapus...");
    }
} 

 else {
    die("akses dilarang...");
 }


?>