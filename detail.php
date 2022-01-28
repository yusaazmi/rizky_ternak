<?php include 'header.php';
$query= "SELECT * FROM t_ayam WHERE id_ayam='$_GET[id]'";
$ambil= mysqli_query($dbc, $query);
$data= mysqli_fetch_array($ambil);
?>
<div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop Detail</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="shop.php">Shop</a></li>
                        <li class="breadcrumb-item active">Shop Detail </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <?php echo"<img class='d-block w-100' src='img/$data[gambar]' alt='First slide'>";?> </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <form action="simpan_cart2.php" method="POST">
                        <input type="hidden" name="id_ayam" value="<?php echo $data['id_ayam'];?>">
                        <?php echo "<h2>".$data['jenis_ayam']."</h2>";?>
                        <?php echo "<h5>Rp".number_format($data['harga'])."</h5>";?>
						<h4>Deskripsi Singkat:</h4>
						<?php echo "<p>".$data['deskripsi']."</p>";?>
						<ul>
							<li>
								<div class="form-group quantity-box">
									<label class="control-label">Jumlah</label>
									<input class="form-control" value="0" min="0" max="20" type="number" name="jumlah">
								</div>
							</li>
						</ul>
						<div class="price-box-bar">
							<div class="cart-and-bay-btn">
                            <button class="btn btn-success" type="submit">Add to cart</button>
								<!-- <?php echo "<a class='btn hvr-hover' data-fancybox-close='' href='simpan_cart2.php?id=".$data['id_ayam']."'>Add to cart </a>";?> -->
							</div>
						</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php';?>