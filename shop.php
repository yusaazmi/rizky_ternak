<?php include 'header.php';?>
 <!-- Start All Title Box -->
 <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Belanja</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                                    <span>Sort by </span>
                                    <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
									<option data-display="Select">Nothing</option>
									<option value="1">Popularity</option>
									<option value="2">High Price → High Price</option>
									<option value="3">Low Price → High Price</option>
									<option value="4">Best Selling</option>
								</select>
                                </div>
                                <?php 
                                $count = "SELECT count(*) AS jumlah from t_ayam";
                                $query1 = mysqli_query($dbc,$count);
                                $result = mysqli_fetch_array($query1);
                                echo "<p>Menunjukan semua hasil ".$result['jumlah']."</p>";
                                ?>
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
                                    <?php
                                        $sql= "SELECT * FROM t_ayam";
                                        $query= mysqli_query($dbc,$sql);
                                        while($ayam = mysqli_fetch_array($query))
                                        {
                                            ?>
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                    <?php echo "<img src='img/$ayam[gambar]' class='img-fluid' alt='Image' >";?>
                                                        <div class="mask-icon">
                                                            <ul>
                                                                <li><?php echo"<a href='detail.php?id=".$ayam['id_ayam']."' data-toggle='tooltip' data-placement='right' title='View'><i class='fas fa-eye'></i></a>"?></li>
                                                            </ul>
                                                            <?php echo "<a class='cart' href='simpan_cart.php?id=".$ayam['id_ayam']."'>Add to Cart</a>";?>
                                                        </div>
                                                    </div>
                                                    <div class="why-text">
                                                        <!-- jenis ayam -->
                                                        <?php echo "<h4>".$ayam['jenis_ayam']."</h4>"; ?>
                                                        <!-- harga -->
                                                        <?php echo "<h5>Rp.".number_format($ayam['harga'])."</h5>"; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }?>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="list-view">
                                        <?php
                                        $sql= "SELECT * FROM t_ayam";
                                        $query= mysqli_query($dbc,$sql);
                                        while($ayam1 = mysqli_fetch_array($query)){
                                        ?>
                                    <div class="list-view-box">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <?php echo"<img src='img/$ayam1[gambar]' class='img-fluid' alt='Image'>";?>
                                                        <div class="mask-icon">
                                                            <ul>
                                                                <?php echo "<li><a href='detail.php?id=".$ayam1['id_ayam']."' data-toggle='tooltip' data-placement='right' title='View'><i class='fas fa-eye'></i></a></li>"?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                <div class="why-text full-width">
                                                    <?php echo "<h4>".$ayam1['jenis_ayam']."</h4>";
                                                    echo "<h5>Rp.".number_format($ayam1['harga'])."</h5>";
                                                    echo "<p>".$ayam1['deskripsi']."</p>";
                                                    echo "<a class='btn hvr-hover' href='simpan_cart.php?id=".$ayam1['id_ayam']."'>Add to Cart</a>";
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <?php
                                        }
                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="search-product">
                            <form action="#">
                                <input class="form-control" placeholder="Search here..." type="text">
                                <button type="submit"> <i class="fa fa-search"></i> </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- End Shop Page -->

    <!-- Start Instagram Feed  -->
    
<?php include 'footer.php';?>