<?php include 'header.php';?>
<!-- Start Slider -->
<div id="slides-shop" class="cover-slides">
    <!-- loop data ayam -->
        <ul class="slides-container">
        <?php
         $sql= "SELECT * FROM t_ayam";
         $query= mysqli_query($dbc,$sql);
            while($ayam = mysqli_fetch_array($query))
            {
            echo "<li class='text-center'>";
            echo "<img src='img/$ayam[gambar]' alt=''>";
               echo "<div class='container'>";
                   echo "<div class='row'>";
                      echo "<div class='col-md-12'>";
                            echo "<h1 class='m-b-20'><strong>Selamat datang di <br> Rizky Ternak</strong></h1>";
                            echo "<p><a class='btn hvr-hover' href='shop.php'>Belanja Sekarang</a></p>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
                echo "<div class='slides-navigation'>";
                echo "<a href='#' class='next'><i class='fa fa-angle-right' aria-hidden='true'></i></a>";
                echo "<a href='#' class='prev'><i class='fa fa-angle-left' aria-hidden='true'></i></a>";
                echo "</div>";
            echo "</li>";
        }
        ?>
        </ul>
</div>
    <!-- End Slider -->
<?php include 'footer.php';?>