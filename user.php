<?php
include 'header.php';

$data = mysqli_query($dbc,"SELECT * FROM t_user WHERE username = '$_SESSION[username]' AND password = '$_SESSION[password]'");
$x = mysqli_fetch_array($data);
?>
<html>
<div class="">
    <h2>Selamat datang <?php echo $x['username']; ?></h2>
</div>
</html>