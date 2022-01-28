<?php include "header.php";?>

            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Ayam</h4>
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
                            <form action="simpan_ayam.php" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <h5 class="card-title">Form Ayam</h5>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 text-right">Jenis Ayam</label>
                                    <div class="col-md-8">
                                        <select name="jenis_ayam" id="jenis_ayam" class="btn btn-secondary dropdown-toggle" style="width: 100%; height:36px;" require>                                           
                                        <option type="button" class="btn btn-secondary btn-sm" value="">Pilihan</option>
                                                <option value="Ayam Hidup">Ayam Hidup</option>
                                                <option value="Ayam Potong">Ayam Potong</option>
                                                <option value="Ayam Utuh">Ayam Utuh</option>
                                        </select>
                                    </div> 
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <div class="col-lg-4 col-md-12 text-right">
                                        <span>Ukuran</span>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <input type="text" data-toggle="tooltip" class="form-control" name="ukuran" id="ukuran" required>
                                    </div>                                   
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <div class="col-lg-4 col-md-12 text-right">
                                        <span>Harga Satuan</span>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <input type="number" data-toggle="tooltip" class="form-control" name="harga" id="harga" required>
                                    </div>                                   
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <div class="col-lg-4 col-md-12 text-right">
                                        <span>Gambar</span>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <input type="file" data-toggle="tooltip" class="form-control" name="gambar" id="gambar" required>
                                    </div>                                   
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <div class="col-lg-4 col-md-12 text-right">
                                        <span>Deskripsi Singkat</span>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <input type="text" data-toggle="tooltip" class="form-control" name="deskripsi" id="deskripsi" required>
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
                                    <h5 class="card-title">List ayam</h5>
                                    <div class="table-responsive">
                                        <table id="zero_config" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ID ayam</th>
                                                    <th>Jenis ayam</th>
                                                    <th>Ukuran</th>
                                                    <th>Harga Satuan</th>
                                                    <th>Gambar</th>
                                                    <th>Deskripsi Singkat</th>
                                                    <th>Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $sql= "SELECT * FROM t_ayam";
                                                $query= mysqli_query($dbc,$sql);
                                                while($ayam = mysqli_fetch_array($query))
                                                {
                                                    echo "<tr>";
                                                    echo "<td>".$ayam['id_ayam']."</td>";
                                                    echo "<td>".$ayam['jenis_ayam']."</td>";
                                                    echo "<td>".$ayam['ukuran']."</td>";
                                                    echo "<td>Rp".number_format($ayam['harga'])."</td>";
                                                    echo "<td><img src='../img/$ayam[gambar]' width='100' height='100'></td>";
                                                    echo "<td>".$ayam['deskripsi']."</td>";
                                                    echo "<td>";
                                                    echo "
                                                    <a class='sidebar-link waves-effect waves-dark sidebar-link' href='update_ayam.php?id=".$ayam['id_ayam']."' aria-expanded='false'>
                                                    <i class='mdi mdi-grease-pencil'></i>
                                                    <span class='hide-menu'></span>
                                                    </a>
                                                    <a class='sidebar-link waves-effect waves-dark sidebar-link' href='hapus_ayam.php?id=".$ayam['id_ayam']."'onclick=\"return  confirm('Apakah yakin akan menghapus? Y/N');\" aria-expanded='false'>
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