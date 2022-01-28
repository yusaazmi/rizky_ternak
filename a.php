<?php include 'header.php';?>
<html>
<h1>LOGIN berhasil</h1>
<h2>
    <?php
    echo "Selamat datang ". $_SESSION['username'];

    // $username = $_GET['username'];
    //     $sql = "SELECT * FROM t_user WHERE username = '$username'";
    //     $query = mysqli_query($dbc,$sql);
    //     $a = mysqli_fetch_array($query);
    //     echo $a['username'];
    ?>
</h2>
</html>