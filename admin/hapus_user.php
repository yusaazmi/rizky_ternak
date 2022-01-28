<?php
include '../koneksi.php';
if( isset($_GET['id']) ){

    // ambil id dari query string
    $user= $_GET['id'];

    // buat query hapus
    $sql = "DELETE FROM t_user WHERE id_user=$user";
    $query = mysqli_query($dbc, $sql);
    
    // apakah query hapus berhasil?
    if( $query ){
        echo "<script>alert('Berhasil Hapus!');window.location='user.php';</script>";
        
    } 
    else {
        die("gagal menghapus...");
    }
} 

 else {
    die("akses dilarang...");
 }


?>