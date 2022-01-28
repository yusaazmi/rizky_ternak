<!-- pembayaran hapus -->
<?php include 'header.php';
if (!isset($_SESSION['username'])){
    echo "<script  data-toggle='modal' data-target='#mylogin'>alert('anda harus login');window.location='index.php';</script>";
}?>
<div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="shop.php">Belanja</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Tagihan Pembayaran</h3>
                        </div>       
                            <div class="row">
                            <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="rounded p-2 bg-light">
                                <?php
                                if (isset($_SESSION['username'])){
                                    $sql = "SELECT *,(t_cart.jumlah*t_ayam.harga) as total FROM t_cart,t_ayam WHERE t_cart.id_ayam=t_ayam.id_ayam AND t_cart.id_user='$id_user'";
                                    $query = mysqli_query($dbc,$sql);
                                    $total = 0;
                                    $jumlah = 0;
                                    while($cart = mysqli_fetch_array($query))
                                    {
                                    $total = $total + $cart['total'];
                                    $jumlah = $jumlah + $cart['jumlah'];
                                    echo "<div class='media mb-2 border-bottom'>";
                                    echo "<div class='media-body'> <a href=''>".$cart['jenis_ayam']."</a>";
                                    echo "<div class='small text-muted'>Harga: Rp.".number_format($cart['harga'])."<span class='mx-2'>|</span> Jumlah:".$cart['jumlah']. "<span class='mx-2'>|</span> Subtotal: Rp.".number_format($cart['total'])."</div>";
                                    echo "</div>";
                                    echo "</div>";
                                    }
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="order-box">
                                <div class="title-left">
                                    <h3>Pesanan Anda</h3>
                                </div>
                                <div class="d-flex">
                                    <div class="font-weight-bold">Product</div>
                                    <div class="ml-auto font-weight-bold">Total</div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Sub Total</h4>
                                    <?php echo "<div class='ml-auto font-weight-bold'>Rp.".number_format($total)."</div>";?>
                                </div>
                                <div class="d-flex">
                                    <h4>Kode Unik</h4>
                                    <?php 
                                    $kd = $id_user;
                                    echo "<input type='hidden' name='kode_unik' id='kode_unik' value='$kd'>";
                                    echo "<div class='ml-auto font-weight-bold'>".$kd."</div>";
                                    ?>
                                </div>
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Total Bayar</h5>
                                    <?php 
                                    $total2 = $total + $kd;
                                    $date = date("Y-m-d");
                                    echo "<div class='ml-auto h5'>Rp.".number_format($total2)."</div>";
                                    ?>
                                </div>
                                <hr> </div>
                        </div>
                            <div class="d-block my-3">
                                <div class="custom-control custom-radio">
                                    <input id="" name="" type="radio" class="custom-control-input" checked required>
                                    <label class="custom-control-label" for="">
                                    <img src="img/logo_bri.png" width=120 height=30 alt="">
                                    </label>
                                    <p>Transfer ke Nomor Rekening : 1123 2321 321 A.n. Rizky Ternak</p>
                                </div>
                                <div class="col-md-8 mb-3">
                        <form action="simpan_pemesanan.php" method="POST" enctype="multipart/form-data">
                        <p>Foto Bukti Pembayaran</p>
                        <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" required>
                        <input type="hidden" name="id_user" id="id_user" for="id_user" value="<?php echo $id_user;?>">
                        <input type="hidden" name="jml_pemesanan" id="jml_pemesanan" value="<?php echo $jumlah;?>">
                        <input type="hidden" name="kode_unik" id="kode_unik" value="<?php echo $kd;?>">
                        <input type="hidden" name="total_bayar" id="total_bayar" value="<?php echo $total2;?>">
                        <input type="hidden" name="tgl_pemesanan" id="tgl_pemesanan" value="<?php echo $date;?>">
                                    <div class="invalid-feedback"> Bukti Pembayaran diperlukan. </div>
                                </div>
                            </div>
                        <div class="col-12 d-flex shopping-box">
                            <button type ="submit" class="btn btn-success">Pesan Sekarang</button>
                        </form> 
                        </div>
                            <hr class="mb-1"> 
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php';?>