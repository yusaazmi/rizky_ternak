<?php include 'header.php';?>
<!-- kurang input total -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Pemesanan</h4>
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
                                <h5 class="card-title">List pemesanan</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID Pemesanan</th>
                                                <th>ID User</th>
                                                <th>Jumlah Pemesanan</th>
                                                <th>Bukti Pembayaran</th>
                                                <th>Kode Unik</th>
                                                <th>Total Bayar</th>
                                                <th>Tanggal Pemesanan</th>
                                                <th>Status Pembayaran</th>
                                                <th>Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                                $total = 0;
                                                $sql= "SELECT * FROM t_pemesanan";
                                                $query= mysqli_query($dbc,$sql);
                                                while($pemesanan = mysqli_fetch_array($query))
                                                {
                                                    echo "<tr>";
                                                    echo "<td>".$pemesanan['id_pemesanan']."</td>";
                                                    echo "<td>".$pemesanan['id_user']."</td>";
                                                    echo "<td>".$pemesanan['jml_pemesanan']."</td>";
                                                    echo "<td><a href='../img/$pemesanan[bukti_pembayaran]'><img src='../img/$pemesanan[bukti_pembayaran]' width='100' height='100'></a></td>";
                                                    echo "<td>".$pemesanan['kode_unik']."</td>";
                                                    echo "<td>Rp".number_format($pemesanan['total_bayar'])."</td>";
                                                    echo "<td>".date("d-F-Y",strtotime($pemesanan['tgl_pemesanan']))."</td>";
                                                    echo "<td>".$pemesanan['status_pembayaran']."</td>";
                                                    echo "<td>";
                                                    echo "
                                                <a class='sidebar-link waves-effect waves-dark sidebar-link' href='update_pemesanan.php?id=".$pemesanan['id_pemesanan']."' aria-expanded='false'>
                                                <i class='mdi mdi-grease-pencil'></i>
                                                <span class='hide-menu'></span>
                                                </a>
                                                <a class='sidebar-link waves-effect waves-dark sidebar-link' href='hapus_pemesanan.php?id=".$pemesanan['id_pemesanan']."'onclick=\"return  confirm('Apakah yakin akan menghapus? Y/N');\" aria-expanded='false'>
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