<?php include 'header.php';?>
<!-- kurang input total -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Cart</h4>
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
                    <div class="col-md-12">     
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">List Cart</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID Cart</th>
                                                <th>ID User</th>
                                                <th>ID Ayam</th>
                                                <th>Jumlah</th>
                                                <th>Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                                $sql= "SELECT * FROM t_cart,t_ayam,t_user WHERE t_cart.id_ayam = t_ayam.id_ayam AND t_cart.id_user = t_user.id_user";
                                                $query= mysqli_query($dbc,$sql);
                                                while($cart = mysqli_fetch_array($query))
                                                {
                                                    echo "<tr>";
                                                    echo "<td>".$cart['id_cart']."</td>";
                                                    echo "<td>".$cart['id_user']."(".$cart['nama'].")</td>";
                                                    echo "<td>".$cart['id_ayam']."(".$cart['jenis_ayam'].")</td>";
                                                    echo "<td>".$cart['jumlah']."</td>";
                                                    echo "<td>";
                                                    echo "
                                                <a class='sidebar-link waves-effect waves-dark sidebar-link' href='hapus_cart.php?id=".$cart['id_cart']."'onclick=\"return  confirm('Apakah yakin akan menghapus? Y/N');\" aria-expanded='false'>
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
<!-- Modal gambar -->
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