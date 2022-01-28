<?php include 'header.php';
if (!isset($_SESSION['username'])){
    echo "<script  data-toggle='modal' data-target='#mylogin'>alert('anda harus login');window.location='index.php';</script>";
}?>
<div class="cart-box-main">
        <div class="container" action="update_cart.php">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Gambar Produk</th>
                                    <th>Jenis Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                            <form action="update_cart.php" method="POST">
                                <?php 
                                if (isset($_SESSION['username'])){
                                    $sql = "SELECT *,(t_cart.jumlah*t_ayam.harga) as total FROM t_cart,t_ayam WHERE t_cart.id_ayam=t_ayam.id_ayam AND t_cart.id_user='$id_user'";
                                    $query = mysqli_query($dbc,$sql);
                                    $total = 0;
                                    $jumlah = 0;
                                        while($cart = mysqli_fetch_array($query))
                                        {
                                            echo "<input type='hidden' id='id_cart' name='id_cart' value='$cart[id_cart]'>";
                                            echo "<tr>";
                                            echo "<td class='thumbnail-img'>";
                                            echo "<a href='#'>
                                            <img class='img-fluid' src='img/$cart[gambar]' alt=''/>
                                            </a>";
                                            echo "</td>";
                                            echo "<td class='name-pr'>";
                                            echo "<a href='#' for='jenis_ayam'>".$cart['jenis_ayam']."</a>";
                                            echo "</td>";
                                    echo "<td class='price-pr'><p>Rp.".number_format($cart['harga'])."</p></td>";
                                    echo "<td class='quantity-box'><input id='jumlah' name='jumlah' type='number' size='4' value='$cart[jumlah]' min='1' step='1' class='c-input-text qty text'></td>";
                                    echo "<td class='total-pr'>Rp.".number_format($cart['total'])."<p></p>";
                                    echo "</td>";
                                    $jumlah = $jumlah + $cart['jumlah'];
                                    echo "<td class='remove-pr'><button class='ml-auto btn hvr-hover' type='submit'>Update Cart</a>
                                    </td>";
                                    echo "<td class='remove-pr'><a href='hapus_cart.php?id=$cart[id_cart]'><i class='fas fa-times'></i></a>
                                    </td>";
                                    echo "</tr>";
                                    $total = $total + $cart['total'];
                                }
                            }
                            ?>                            
                            </tbody>
                        <!-- <div class="row my-5">
                            <div class="col-lg-12 col-sm-12">
                                <div class="col-12 d-flex shopping-box">       
                                    <button class="ml-auto btn hvr-hover" type="submit">Update Cart</button>
                                </div>
                            </div>
                        </div> -->
                            </form>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Ringkasan Pesanan</h3>
                        <div class="d-flex">
                            <h4>Sub Total</h4>
                            <div class="ml-auto font-weight-bold"><?php echo "Rp.".number_format($total);?></div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <?php 
                            $total2 = 0;
                            $total2 = $total2 + $total;
                            ?>
                            <h5>Total</h5>
                            <div class="ml-auto h5"><?php echo "Rp.". number_format($total2);?></div>
                        </div>
                        <hr> </div>
                <!-- <form action="simpan_pemesanan.php" method="POST">
                    <input type="hidden" id="total_bayar" name="total_bayar" value="<?php echo $total2;?>">
                    <input type="hidden" id="jml_pemesanan" name="jml_pemesanan" value="<?php echo $jumlah;?>">
                    <input type="hidden" id="id_user" name="id_user" value="<?php echo $_SESSION['id_user'];?>">
                    <button class="ml-auto btn hvr-hover" type="submit">Checkout</button>
                </form> -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->

<?php include 'footer.php';?>