<?php
include 'header.php';
$query= "SELECT * FROM t_user WHERE id_user='$_GET[id]'";
$ambil= mysqli_query($dbc, $query);
$data= mysqli_fetch_array($ambil);
?>

<!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">User</h4>
                        <div class="ml-auto text-right">
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <form action="simpan_edituser.php" method="POST">
                            <div class="card-body">
                                <h5 class="card-title">Form Update User</h5>
                                <input type="hidden" name="id_user" value="<?php echo $data['id_user'];?>">
                                <div class="row mb-3 align-items-center">
                                    <div class="col-lg-4 col-md-12 text-right">
                                        <span>Username</span>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <input type="text" data-toggle="tooltip" class="form-control" name="username" id="username" required value="<?php echo $data['username'];?>">
                                    </div>                                   
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <div class="col-lg-4 col-md-12 text-right">
                                        <span>Password</span>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <input type="password" data-toggle="tooltip" class="form-control" name="password" id="password">
                                    </div>                                   
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <div class="col-lg-4 col-md-12 text-right">
                                        <span>Nama</span>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <input type="text" data-toggle="tooltip" class="form-control" name="nama" id="nama" required value="<?php echo $data['nama'];?>">
                                    </div>                                   
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <div class="col-lg-4 col-md-12 text-right">
                                        <span>Alamat</span>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <input type="text" data-toggle="tooltip" class="form-control" name="alamat" id="alamat" required value="<?php echo $data['alamat'];?>">
                                    </div>                                   
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <div class="col-lg-4 col-md-12 text-right">
                                        <span>Kode Pos</span>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <input type="text" data-toggle="tooltip" class="form-control" name="kodepos" id="kodepos" required value="<?php echo $data['kodepos'];?>">
                                    </div>                                   
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <div class="col-lg-4 col-md-12 text-right">
                                        <span>Telepon</span>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <input type="text" data-toggle="tooltip" class="form-control" name="no_hp" id="no_hp" required value="<?php echo $data['no_hp'];?>">
                                    </div>                                   
                                </div>  
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 text-right">Type User</label>
                                    <div class="col-md-8">
                                            <select name="type_user" id="type_user" class="btn btn-secondary dropdown-toggle" style="width: 100%; height:36px;" require>                                           
                                            <option type="button" class="btn btn-secondary btn-sm" value="" value="<?php echo $data['type_user'];?>">Pilihan</option>
                                                <option value="user">user</option>
                                                <option value="admin">admin</option>
                                        </select>
                                    </div> 
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>  
                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- TAbel -->
                    <div class="col-md-8">     
                            <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">List Invoice</h5>
                                        <div class="table-responsive">
                                            <table id="zero_config" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>ID User</th>
                                                        <th>Username</th>
                                                        <th>Password</th>
                                                        <th>Alamat</th>
                                                        <th>Kode Pos</th>
                                                        <th>Telepon</th>
                                                        <th>Type User</th>
                                                        <th>Option</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $sql= "SELECT * FROM t_user";
                                                $query= mysqli_query($dbc,$sql);
                                                while($user = mysqli_fetch_array($query))
                                                {
                                                    echo "<tr>";
                                                    echo "<td>".$user['id_user']."</td>";
                                                    echo "<td>".$user['username']."</td>";
                                                    echo "<td>".$user['password']."</td>";
                                                    echo "<td>".$user['alamat']."</td>";
                                                    echo "<td>".$user['kodepos']."</td>";
                                                    echo "<td>".$user['no_hp']."</td>";
                                                    echo "<td>".$user['type_user']."</td>";
                                                    echo "<td>";
                                                    echo "
                                                        <a class='sidebar-link waves-effect waves-dark sidebar-link' href='update_user.php?id=".$user['id_user']."' aria-expanded='false'>
                                                        <i class='mdi mdi-grease-pencil'></i>
                                                        <span class='hide-menu'></span>
                                                        </a>
                                                        <a class='sidebar-link waves-effect waves-dark sidebar-link' href='hapus_user.php?id=".$user['id_user']."'onclick=\"return  confirm('Apakah yakin akan menghapus? Y/N');\" aria-expanded='false'>
                                                        <i class='mdi mdi-delete'></i>
                                                        <span class='hide-menu'></span></a>";
                                                        echo "</tr>";    
                                                }           
                                                ?>
                                                </tbody>                                    
                                            </table>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
<?php include 'footer.php';?>