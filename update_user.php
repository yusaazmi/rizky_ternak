<?php
include 'koneksi.php';

$query = "UPDATE t_user SET nama ='$_POST[nama]', alamat = '$_POST[alamat]', kodepos = '$_POST[kodepos]', no_hp ='$_POST[no_hp]'";
$update = mysqli_query($dbc,$query);
if($update)
{
    echo "<script>alert('Update Berhasil!');window.location='myaccount.php'</script>";
}
?>