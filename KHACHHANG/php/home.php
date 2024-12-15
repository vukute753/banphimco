

<!-- padđing 160px -->
<div class="content-padding-t160"></div>
<!-- banner -->
<div class="banner">
</div>
<!-- end banner -->

<?php if(isset($_GET['success'])) {echo '<script>alert("'.$_GET['success'].'")</script>';}?>
<!--  content1 -->
<div class="content1">
    <div class="wrapper">
        <div class="content1-circle">
            <div class="content1-circle_item">
                <a class="content1-circle_img" href="server.php?page=product.php&keyboard">
                    <img src="./ASSETS/img/IMG-home-page/Ellipse1.png" alt="#Keyboard">
                </a>
                <a class="content1-circle_title" href="server.php?page=product.php&keyboard"> Bàn Phím Cơ</a>
            </div>
            <div class="content1-circle_item">
                <a class="content1-circle_img" href="server.php?page=product.php&keycap">
                    <img src="./ASSETS/img/IMG-home-page/Ellipse2.png" alt="">
                </a>
                <a class="content1-circle_title" href="server.php?page=product.php&keycap">KeyCap</a>
            </div>
            <div class="content1-circle_item">
                <a class="content1-circle_img" href="server.php?page=product.php&phuKien">
                    <img src="./ASSETS/img/IMG-home-page/Ellipse3.png" alt="">
                </a>
                <a class="content1-circle_title" href="server.php?page=product.php&phuKien">Phụ Kiện</a>
            </div>
            <div class="content1-circle_item">
                <a class="content1-circle_img" href="server.php?page=product.php&tuidungbanphim">
                    <img src="./ASSETS/img/IMG-home-page/Ellipse4.png" alt="">
                </a>
                <a class="content1-circle_title" href="server.php?page=product.php&tuidungbanphim">Túi đựng bàn phím</a>
            </div>
            <div class="content1-circle_item">
                <a class="content1-circle_img" href="server.php?page=product.php&daulube">
                    <img src="./ASSETS/img/IMG-home-page/Ellipse5.png" alt="">
                </a>
                <a class="content1-circle_title" href="server.php?page=product.php&daulube">Dầu Lube</a>
            </div>
        </div>
    </div>
</div>
<!-- end content -->


<!-- content2 -->
<!-- keyboard -->
 <?php
 $getType1 = getType1($conn); $num1 = mysqli_num_rows($getType1);
 $getType2 = getType2($conn); $num2 = mysqli_num_rows($getType2);
 $getType3 = getType3($conn); $num3 = mysqli_num_rows($getType3);
 $getType4 = getType4($conn); $num4 = mysqli_num_rows($getType4);
 $getType6 = getType6($conn); $num6 = mysqli_num_rows($getType6);
 $getType7 = getType7($conn); $num7 = mysqli_num_rows($getType7);
  ?>

<?php if($num1){ ?>
<a href="#" class="container-content2">
    <div id="Keyboard" class="wrapper align-content2">
        <H1 id="content2-keyboard_title">Bàn Phím Cơ</H1>
        <div class="content2">
            <?php while($row_1 = mysqli_fetch_assoc($getType1)) { ?>
                <div class="content2-keyboard">
                    <div class="content2-card">
                        <a href="./php/detailProduct.php?id=<?php echo $row_1['masanpham']; ?>"><img style="width: 215px; height: 170px" src="../QUANLI/ASSETS/img/IMG-Product/<?php echo $row_1['hinhanh'] ?>" alt="" class="content2-keyboard_product"></a>
                        <a href="./php/detailProduct.php?id=<?php echo $row_1['masanpham']; ?>">
                            <div class="content2-keyboard_discription">
                                <?php echo $row_1['tensanpham']; ?>
                            </div>
                        </a>
                        <a href="./php/detailproduct.php?id=<?php echo $row_1['masanpham']; ?>">
                            <button class="content2-keyboard_newprice">
                            <p><?php echo number_format($row_1['gia']) . '<span style="font-size: 8px"> VNĐ</span>'; ?></p>
                            </button>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</a>
<?php } ?>
<!-- end Keyboard -->





 <!-- KIT -->
  <?php if($num2) { ?>
 <a href="#" class="container-content2">
    <div id="KeyCap" class="wrapper align-content2">
        <H1 id="content2-keyboard_title">KIT</H1>
        <div class="content2">
            <?php while($row_2 = mysqli_fetch_assoc($getType2) ) { ?>
                <div class="content2-keyboard">
                    <div class="content2-card">
                        <a href="./php/detailProduct.php?id=<?php echo $row_2['masanpham']; ?>"><img style="width: 215px; height: 170px" src="../QUANLI/ASSETS/img/IMG-Product/<?php echo $row_2['hinhanh'] ?>" alt="" class="content2-keyboard_product">
                        </a>
                        <a href="./php/detailProduct.php?id=<?php echo $row_2['masanpham']; ?>">
                            <div class="content2-keyboard_discription">
                                <?php echo $row_2['tensanpham']; ?>
                            </div>
                        </a>
                        <a href="./php/detailproduct.php?id=<?php echo $row_2['masanpham']; ?>">
                            <button class="content2-keyboard_newprice">
                            <p><?php echo number_format($row_2['gia']) . '<span style="font-size: 8px"> VNĐ</span>'; ?></p>
                            </button>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</a>
<?php } ?>
 <!-- end KIT -->



<!-- Keycap -->
<?php if($num3){ ?>
<a href="#" class="container-content2">
    <div id="KeyCap" class="wrapper align-content2">
        <H1 id="content2-keyboard_title">KeyCap</H1>
        <div class="content2">
            <?php while($row_3 = mysqli_fetch_assoc($getType3) ) { ?>
                <div class="content2-keyboard">
                    <div class="content2-card">
                        <a href="./php/detailProduct.php?id=<?php echo $row_3['masanpham']; ?>"><img style="width: 215px; height: 170px" src="../QUANLI/ASSETS/img/IMG-Product/<?php echo $row_3['hinhanh'] ?>" alt="" class="content2-keyboard_product"></a>
                        <a href="./php/detailProduct.php?id=<?php echo $row_3['masanpham']; ?>">
                            <div class="content2-keyboard_discription">
                                <?php echo $row_3['tensanpham']; ?>
                            </div>
                        </a>
                        <a href="./php/detailproduct.php?id=<?php echo $row_3['masanpham']; ?>">
                            <button class="content2-keyboard_newprice">
                            <p><?php echo number_format($row_3['gia']) . '<span style="font-size: 8px"> VNĐ</span>'; ?></p>
                            </button>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</a>
<?php } ?>
<!-- end Keycap -->


<!-- Phụ Kiện -->
<?php if($num4) { ?>
<a href="#" class="container-content2">
    <div id="PhuKien" class="wrapper align-content2">
        <H1 id="content2-keyboard_title">Phụ Kiện</H1>
        <div class="content2">
            <?php while($row_4 = mysqli_fetch_assoc($getType4)) { ?>
                <div class="content2-keyboard">
                    <div class="content2-card">
                        <a href="./php/detailProduct.php?id=<?php echo $row_4['masanpham']; ?>"><img style="width: 215px; height: 170px" src="../QUANLI/ASSETS/img/IMG-Product/<?php echo $row_4['hinhanh'] ?>" alt="" class="content2-keyboard_product"></a>
                        <a href="./php/detailProduct.php?id=<?php echo $row_4['masanpham']; ?>">
                            <div class="content2-keyboard_discription">
                                <?php echo $row_4['tensanpham']; ?>
                            </div>
                        </a>
                        <a href="./php/detailproduct.php?id=<?php echo $row_4['masanpham']; ?>">
                            <button class="content2-keyboard_newprice">
                                <p><?php echo number_format($row_4['gia']) . '<span style="font-size: 8px"> VNĐ</span>'; ?></p>
                            </button>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</a>
<?php } ?>
<!-- end phụ Kiện -->



<!-- Switch -->
<?php if($num6){ ?>
<a href="#" class="container-content2">
    <div id="PhuKien" class="wrapper align-content2">
        <H1 id="content2-keyboard_title">Switch</H1>
        <div class="content2">
            <?php while($row_6 = mysqli_fetch_assoc($getType6)) { ?>
                <div class="content2-keyboard">
                    <div class="content2-card">
                        <a href="./php/detailProduct.php?id=<?php echo $row_6['masanpham']; ?>"><img style="width: 215px; height: 170px" src="../QUANLI/ASSETS/img/IMG-Product/<?php echo $row_6['hinhanh'] ?>" alt="" class="content2-keyboard_product"></a>
                        <a href="./php/detailProduct.php?id=<?php echo $row_6['masanpham']; ?>">
                            <div class="content2-keyboard_discription">
                                <?php echo $row_6['tensanpham']; ?>
                            </div>
                        </a>
                        <a href="./php/detailproduct.php?id=<?php echo $row_6['masanpham']; ?>">
                            <button class="content2-keyboard_newprice">
                                <p><?php echo number_format($row_6['gia']) . '<span style="font-size: 8px"> VNĐ</span>'; ?></p>
                            </button>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</a>
<?php } ?>
<!-- end Switch -->




<!-- end content2 -->