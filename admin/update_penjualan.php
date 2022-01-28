<?php
include 'header.php';
$query= "SELECT * FROM penjualan WHERE id_penjualan='$_GET[id]'";
$ambil= mysqli_query($dbc, $query);
$data= mysqli_fetch_array($ambil);
?>

<!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Penjualan</h4>
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
                            <form action="simpan_editpenjualan.php" method="POST">
                            <input type="hidden" name="id_penjualan" value="<?php echo $data['id_penjualan'];?>">
                            <div class="card-body">
                                <h5 class="card-title">Form Update</h5>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 text-right">ID Buku</label>
                                    <div class="col-md-8">
                                        <select name="id_buku" id="id_buku" class="btn btn-secondary dropdown-toggle" style="width: 100%; height:36px;" require>
                                        <option value=""><?php echo $data['id_buku'];?></option>
                                        <?PHP $query= mysqli_query ($dbc, "SELECT * FROM buku");
                                            while($x= mysqli_fetch_array($query))
                                            {
                                            echo "<option value=$x[id_buku]>$x[id_buku]($x[judul])</option>";
                                            }
                                        ?>      
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <div class="col-lg-4 col-md-12 text-right">
                                        <span>Nama Pembeli</span>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <input type="text" data-toggle="tooltip" class="form-control" name="nama_pembeli" id="nama_pembeli" required value="<?php echo $data['nama_pembeli'];?>">
                                    </div>   
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-md-12 text-right">ID Kasir</label>
                                    <div class="col-md-8">
                                        <select name="id_kasir" id="id_kasir" class="btn btn-secondary dropdown-toggle" style="width: 100%; height:36px;" require>
                                        <option value=""><?php echo $data['id_kasir'];?></option>
                                        <?PHP $query= mysqli_query ($dbc, "SELECT * FROM kasir");
                                            while($x= mysqli_fetch_array($query))
                                            {
                                            echo "<option value=$x[id_kasir]>$x[id_kasir]($x[nama_kasir])</option>";
                                            }
                                        ?>      
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <div class="col-lg-4 col-md-12 text-right">
                                        <span>Jumlah</span>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <input type="number" min="0" data-toggle="tooltip" class="form-control" name="jumlah" id="jumlah" required value="<?php echo $data['jumlah'];?>">
                                    </div>   
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <div class="col-lg-8 col-md-12">
                                        <input type="hidden" data-toggle="tooltip" class="form-control" name="total" id="total" required>
                                    </div>   
                                </div>      
                                <div class="row mb-3 align-items-center">
                                    <div class="col-lg-4 col-md-12 text-right">
                                        <span>Tanggal</span>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <input type="date" data-toggle="tooltip" class="form-control" name="tanggal" id="tanggal" required <?php echo $data['tanggal'];?>>
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
                                        <h5 class="card-title">List penjualan</h5>
                                        <div class="table-responsive">
                                            <table id="zero_config" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>ID penjualan</th>
                                                        <th>ID Buku</th>
                                                        <th>Nama Pembeli</th>
                                                        <th>ID kasir</th>
                                                        <th>Jumlah</th>
                                                        <th>Tanggal</th>
                                                        <th>Total</th>
                                                        <th>Option</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                        $sql= "SELECT *,(penjualan.jumlah*buku.harga_jual) as total FROM penjualan,buku WHERE buku.id_buku=penjualan.id_buku";
                                                        $query= mysqli_query($dbc,$sql);
                                                        $total="SELECT (penjualan.jumlah*buku.harga_jual) as total from penjualan,buku WHERE buku.id_buku=penjualan.id_buku";
                                                        $q1=mysqli_query($dbc,$total);
                                                        $tot=mysqli_fetch_array($q1);
                                                        while($penjualan = mysqli_fetch_array($query))
                                                        {
                                                            echo "<tr>";
                                                            echo "<td>".$penjualan['id_penjualan']."</td>";
                                                            echo "<td>".$penjualan['id_buku']."</td>";
                                                            echo "<td>".$penjualan['nama_pembeli']."</td>";
                                                            echo "<td>".$penjualan['id_kasir']."</td>";
                                                            echo "<td>".$penjualan['jumlah']."</td>";                    
                                                            echo "<td>".$penjualan['tanggal']."</td>";
                                                            echo "<td>Rp".number_format($penjualan['total'])."</td>";
                                                            echo "<td>";
                                                            echo "
                                                        <a class='sidebar-link waves-effect waves-dark sidebar-link' href='update_penjualan.php?id=".$penjualan['id_penjualan']."' aria-expanded='false'>
                                                        <i class='mdi mdi-grease-pencil'></i>
                                                        <span class='hide-menu'></span>
                                                        </a>
                                                        <a class='sidebar-link waves-effect waves-dark sidebar-link' href='hapus_penjualan.php?id=".$penjualan['id_penjualan']."'onclick=\"return  confirm('Apakah yakin akan menghapus? Y/N');\" aria-expanded='false'>
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