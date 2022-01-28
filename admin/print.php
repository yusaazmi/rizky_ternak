<?php include 'header.php';?>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Invoice</h4>
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
                    <div class="col-md-12">
                        <div class="card card-body printableArea">
                            <?php                            
                            $sql="SELECT * from item LEFT JOIN product ON product.id=item.productid LEFT JOIN invoice ON item.invoiceid=invoice.id LEFT JOIN customer ON invoice.customerid=customer.id WHERE item.id=$_GET[id]";
                            $total="SELECT (item.quantity*product.price) as total from item,product WHERE item.productid=product.id and item.id=$_GET[id]";
                            $query= mysqli_query($dbc,$sql);
                            $q= mysqli_query($dbc,$total);
                            $query1= mysqli_fetch_array($query);
                            $q1= mysqli_fetch_array($q);
                            // $total="SELECT (product.price*item.quantity) as total from product,item LEFT JOIN product ON item.productid=product.id LEFT JOIN invoice ON item.invoiceid=invoice.id LEFT JOIN customer ON invoice.customerid=customer.id and item.id=$_GET[id]";
                            // $query2= mysqli_query($dbc,$total);
                            // $query3= mysqli_fetch_array($query2);
                            ?>
                            <h3><b>INVOICE</b> <span class="pull-right"><?php echo"$query1[invoiceid]";?></span></h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <address>
                                            <h3> &nbsp;<b class="text-danger">Yusa Industries</b></h3>
                                            <p class="text-muted m-l-5"><?php echo"$query1[street]";?>
                                                <br/> 
                                               </p>
                                        </address>
                                    </div>
                                    <div class="pull-right text-right">
                                        <address>
                                            <h3>To,</h3>
                                            <h4 class="font-bold"><?php echo"$query1[firstname] $query1[lastname]";?></h4>
                                            <p class="text-muted m-l-30"><?php echo"$query1[street]";?>
                                                <br/> <?php echo"$query1[city]";?>
                                                <br/> <?php echo"$query1[postalcode]";?>
                                                </p>
                                            <p class="m-t-30"><b>Invoice Date :</b> <i class="fa fa-calendar"></i><?php echo"$query1[invoicedate]";?></p>
                                            <p><b>Due Date :</b> <i class="fa fa-calendar"></i></p>
                                        </address>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Description</th>
                                                    <th class="text-right">Quantity</th>
                                                    <th class="text-right">Price Cost</th>
                                                    <th class="text-right">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td><?php echo"$query1[nama]";?></td>
                                                    <?php while($item= mysqli_fetch_array($query1))
                                                    {
                                                    echo"<td>".$query1[quantity]."</td>";
                                                    echo"<td>Rp".number_format($query1['price'])."</td>";
                                                    echo"<td>Rp".number_format($q1['total'])."</td>";
                                                    echo"</tr>";
                                                    ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pull-right m-t-30 text-right">
                                        <p>Sub - Total amount: $13,848</p>
                                        <p>vat (10%) : $138 </p>
                                        <hr>
                                        <h3><b>Total :</b> $13,986</h3>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <div class="text-right">
                                        <button class="btn btn-danger" type="submit"> Proceed to payment </button>
                                    </div>
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
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php include 'footer.php';?>