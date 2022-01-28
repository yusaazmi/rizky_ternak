<?php include 'header.php';
if (!isset($_SESSION['username'])){
    echo "<script  data-toggle='modal' data-target='#mylogin'>alert('anda harus login');window.location='index.php';</script>";
}
 
$query = "SELECT * from t_user where id_user= $id_user";
$q1 = mysqli_query($dbc,$query);
$q2 = mysqli_fetch_array($q1);
?>
<!-- Start All Title Box -->
<div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>My Profile / <?php echo $q2['username'];?></h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> My Profile </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->
<div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <tr>
                        <td>
                            <h2><?php echo $q2['nama'];?></h2>
                        </td>
                        <td>
                            <p>Alamat <?php echo $q2['alamat'];?></p>
                        </td>
                        <td>
                            <p>Kode pos <?php echo $q2['kodepos'];?></p>
                        </td>
                        <td>
                            <p>No telfon <?php echo $q2['no_hp'];?></p>
                        </td>
                        </tr>
                    </div>
                    <div>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#myedit">Edit Profil</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL EDIT PROFIL -->
<div id="myedit" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Profile</h4>
            </div>
            <div class="modal-body">
                <form action="update_user.php" method="POST">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="hidden" name="id_user" value="<?php echo $q2['id_user']?>">
                        <input type="text" class="form-control" name="nama" placeholder="nama">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="alamat" class="form-control" name="alamat" placeholder="alamat">
                    </div>
                    <div class="form-group">
                        <label for="kodepos">Kodepos</label>
                        <input type="kodepos" class="form-control" name="kodepos" placeholder="kodepos">
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Nomor HP</label>
                        <input type="no_hp" class="form-control" name="no_hp" placeholder="no_hp">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
            <!-- <a href="daftar.php">Daftar Sekarang</a> -->
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>

