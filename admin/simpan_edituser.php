<?php
include '../koneksi.php';
if(empty($_POST['password']))
{
    $query = "UPDATE t_user SET 
    username='$_POST[username]', 
    nama='$_POST[nama]', 
    alamat='$_POST[alamat]', 
    kodepos='$_POST[kodepos]', 
    no_hp='$_POST[no_hp]', 
    type_user='$_POST[type_user]' 
    WHERE id_user='$_POST[id_user]'";
    $update = mysqli_query($dbc,$query);
}
else
{
    $password = md5($_POST['password']);
    $query = "UPDATE t_user SET 
    username='$_POST[username]', 
    password='$password', 
    nama='$_POST[nama]', 
    alamat='$_POST[alamat]', 
    kodepos='$_POST[kodepos]', 
    no_hp='$_POST[no_hp]', 
    type_user='$_POST[type_user]' 
    WHERE id_user='$_POST[id_user]'";
    $update = mysqli_query($dbc,$query);
}
if($update)
    {
        echo "<script>alert('Berhasil Update!');window.location='user.php';</script>";
    }
else
    {
        echo 'gagal edit';
    }
?>