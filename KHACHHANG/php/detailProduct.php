<?php
session_start();
require_once "../services/conn.php";
require_once "../services/productServices.php";
require_once "../MDB/MDB.php";
 ?>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">


    
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id']; 
    $getPrdID = getPrdID($conn, $id);
    $row_SP = mysqli_fetch_assoc($getPrdID);

    $idPrd = $row_SP['masanpham'];
    $getEvalue = getEvalue($conn, $idPrd);
    $getEvalueRating = getEvalueRating($conn, $idPrd);
    $numEvalue = mysqli_num_rows($getEvalue);

    $getNumStar = getEvalueRating($conn, $idPrd);
    $onestar = 0;
    $twostar = 0;
    $threestar = 0;
    $fourstar = 0;
    $fivestar = 0;
    while($rowNumStar = mysqli_fetch_assoc($getNumStar)){
        if($rowNumStar['diemdanhgia']  == 5){
            $fivestar += 1;
        }
        else if($rowNumStar['diemdanhgia']  == 4){
            $fourstar += 1;
        }
        else if($rowNumStar['diemdanhgia'] == 3){
            $threestar += 1;
        }
        else if($rowNumStar['diemdanhgia'] == 2){
            $twostar += 1;
        }
        else if($rowNumStar['diemdanhgia'] == 1){
            $onestar += 1;
        }
    }

    
    $rating = 0;
    $roundedResult = 0;
    while($rowRating = mysqli_fetch_assoc($getEvalueRating)){
        $rating += $rowRating['diemdanhgia'];
        $result = $rating / $numEvalue;
        $roundedResult = round($result, 1);
    }
   
    
    if($row_SP){
    ?>



<div class="card shadow-lg ">
                <div class="row p-2 mt-3 justify-content-between mx-sm-2">
                    <div class="col">
                        <div class="row justify-content-start ">
                            <div class="col">
                                <img class="irc_mi img-fluid cursor-pointer " src="../ASSETS/img/IMG-home-page/logo.png"  width="70" height="70" >
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="header-login" style = "display: flex;
                                                            align-items: baseline;">
                            <div class="header-login-container">
                                <p id="header-login_user" style="margin: 5px 0;">
                                    <?php
                                    if (isset($_SESSION['username'])) {
                                        echo ('<a href=profile.php>' . $_SESSION['username'] . '</a>');
                                    }
                                    ?>
                                </p>
                            </div>

                            <div class="header-cart" style = "margin: 0 0 0 20px">
                                <a id="header-cart_icon" href="<?php if (isset($_SESSION['username'])) {
                                                                    echo 'cart.php';
                                                                } else {
                                                                    echo 'formLogin-Register.php';
                                                                } ?>"> <img src="../ASSETS/img/IMG-home-page/cart-shopping-solid 2.svg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div  class="row  justify-content-center text-center" style = "width: 100%;">
                    <div class="col-12 mt-3 ">
                        <nav aria-label="breadcrumb" class="second ">
                            <ol style = "margin: 0px;" class="breadcrumb indigo lighten-6 first  ">
                                <li class="breadcrumb-item font-weight-bold "><a class="black-text text-uppercase " href="../server.php"><span class="mr-md-3 mr-1">Trang chủ ></span></a> </li>
                                <li class="breadcrumb-item font-weight-bold"><a class="black-text text-uppercase active-2" href="../server.php?page=product.php"><span class="mr-md-3 mr-1">Sản phẩm ></span></a></li>
                                <li class="breadcrumb-item font-weight-bold"><a class="black-text text-uppercase " href="#"><span style="color: #ccc;" class="mr-md-3 mr-1">Chi tiết</span></a></li>
                            </ol>
                        </nav>
                    </div>
                </div>


<div class="container mt-5">


<?php if(isset($_GET['success'])){ ?>
        <div class="alert alert-info myAlert" role="alert">
            <?php echo $_GET['success']; ?> 
            </div>
     <?php } ?>
    <div class="row">
        <!-- Product Images -->
        <div class="col-md-6 mb-4">
            <img src="../../QUANLI/ASSETS/img/IMG-Product/<?php echo $row_SP['hinhanh']; ?>" alt="Product" class="img-fluid rounded mb-3 product-image" id="mainImage">
        </div>

        <!-- Product Details -->
        <form class="col-md-6" method="post" <?php if(isset($_SESSION['username'])) { ?> action="../services/cartServices.php?id=<?php echo $row_SP['masanpham']; ?>"  <?php } 
        else { ?>  action="formLogin-Register.php"   <?php } ?>  >
            <h2 class="mb-3"><?php echo $row_SP['tensanpham']; ?></h2>
            <p class="text-muted mb-4">Mã: <?php echo $row_SP['masanpham']; ?></p>
            <div class="mb-3">
                <span style = "color: red;" class="h4 me-2"><?php echo number_format($row_SP['gia']); ?>đ</span>
            </div>
            <div class="mb-3">
                <?php if($roundedResult < 0.5) { ?>
                    <i class="bi bi-star text-warning"></i>
                    <?php }
                    else if($roundedResult == 0.5) { ?>
                    <i class="bi bi-star-half text-warning"></i>
                    <?php }
                    else if($roundedResult < 1.5) { ?>
                    <i class="bi bi-star-fill text-warning"></i>
                    <?php }
                    else if($roundedResult == 1.5) { ?>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-half text-warning"></i>
                    <?php }
                    else if($roundedResult < 2.5) { ?>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <?php }
                    else if($roundedResult == 2.5) { ?>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-half text-warning"></i>
                    <?php }
                    else if($roundedResult < 3.5) { ?>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <?php }
                    else if($roundedResult == 3.5) { ?>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-half text-warning"></i>
                    <?php }
                    else if($roundedResult < 4.5) { ?>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <?php }
                    else if($roundedResult = 4.5) { ?>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-half text-warning"></i>
                    <?php }
                    else if($roundedResult > 4.9) { ?>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <?php } ?>
                <span class="ms-2"><?php  echo $roundedResult; ?> (<?php echo $numEvalue; ?>)</span>
            </div>
            <div class="mb-4">
                <h5>Màu:</h5>
                <div class="btn-group" role="group" aria-label="Color selection">
                    <input type="radio" class="btn-check" name="color" id="black" autocomplete="off" checked>
                    <label class="btn btn-outline-dark" for="black">Black</label>
                    <input type="radio" class="btn-check" name="color" id="silver" autocomplete="off">
                    <label class="btn btn-outline-secondary" for="silver">Silver</label>
                    <input type="radio" class="btn-check" name="color" id="blue" autocomplete="off">
                    <label class="btn btn-outline-primary" for="blue">Blue</label>
                </div>
            </div>
            <div class="mb-4">
                <label for="quantity" class="form-label">Số lượng:</label>
                <input type="number" name="quantify" class="form-control" id="quantity" value="1" min="1" style="width: 80px;">
            </div>
            <button type ="submit" name="btnAddCart" class="btn btn-primary btn-lg mb-3 me-2">
                    <i class="bi bi-cart-plus"></i> Thêm vào giỏ
                </button>
            <!-- <button type ="submit" name="btnPayment" class="btn btn-outline-secondary btn-lg mb-3">
                    <i class=""></i> Thanh toán
                </button> -->
            <div class="mt-4">
                <h5>Ưu đãi</h5>
                <ul>
                    <li>Bảo hành 3 tháng</li>
                    <li>Giảm 10% khi mua 2 sản phẩm trở lên</li>
                    <li>Tặng nước vệ sinh bàn phím</li>
                    <li>Hỗ trợ đổi trả nếu sản phẩm gặp vấn đề trong quá trình giao</li>
                </ul>
            </div>
        </form>
    </div>

    <div class="detail">
            <h5>Mô tả sản phẩm</h2>
            <p><?php echo $row_SP['mota']; ?></p>













    </div>
</div>



<div class="review-header">
<h3>ĐÁNH GIÁ SẢN PHẨM</h5>
</div>
<div class="container-star">

    <div class="total-star">
    <b><?php echo $roundedResult; ?></i>/5<i class="bi bi-star-fill text-warning"></i></b>
    </div>

    <div class="star">
    <i class="bi bi-star-fill text-warning"></i>
    <i class="bi bi-star-fill text-warning"></i>
    <i class="bi bi-star-fill text-warning"></i>
    <i class="bi bi-star-fill text-warning"></i>
    <i class="bi bi-star-fill text-warning"></i>
    (<?php echo $fivestar; ?>)
    </div>

    <div class="star">
    <i class="bi bi-star-fill text-warning"></i>
    <i class="bi bi-star-fill text-warning"></i>
    <i class="bi bi-star-fill text-warning"></i>
    <i class="bi bi-star-fill text-warning"></i>
    (<?php echo $fourstar; ?>)
    </div>

    <div class="star">
    <i class="bi bi-star-fill text-warning"></i>
    <i class="bi bi-star-fill text-warning"></i>
    <i class="bi bi-star-fill text-warning"></i>
    (<?php echo $threestar; ?>)
    </div>

    <div class="star">
    <i class="bi bi-star-fill text-warning"></i>
    <i class="bi bi-star-fill text-warning"></i>
    (<?php echo $twostar; ?>)
    </div>

    <div class="star">
    <i class="bi bi-star-fill text-warning"></i>
    (<?php echo $onestar; ?>)
    </div>

</div>

<?php 
if($roundedResult != 0){
while($row = mysqli_fetch_assoc($getEvalue)){
    $idUsername = $row['makhachhang'];
    $getUsername = mysqli_fetch_assoc(getUsername($conn, $idUsername));

    
    
?>
<div class="review-container">
    <div class="review-header">
        <h5 class="reviewer-name"><?php echo $getUsername['hoten'] ?><span> (<?php echo $row['diemdanhgia'] ?><i class="bi bi-star-fill text-warning"></i>)</span></h5>
        <span class="review-date"><?php echo $row['ngaytao'] ?></span>
    </div>
    <div class="review-body">
        <p class="review-text"><?php echo $row['noidung'] ?></p>
    </div>
    <div class="review-rating">
        <div class="stars" id="stars"></div>
    </div>
   
    <?php if(!empty($row['hinhanh'])) { ?>

        <div class="review-image">
        <img src="../../QUANLI/ASSETS/img/IMG-Product/<?php echo $row['hinhanh'];?>" class="review-img" width="100" height="100">
    </div>

        <?php } ?>

</div>
<?php } } else {
    echo "<h6> Chưa có đánh giá nào </h6>";
} ?>

<style>
    .review-header {
    margin: 20px 10px 10px 10px;
}

.total-star{
    font-size:30px;
    padding: 0 5px 0 0;
    margin-right: 30px;
    border-right: 1px solid;
}
.container-star{
    display: flex;
    align-items: center;
    padding: 0 10px;
    margin: 10px 0 20px 0;
}

.container-star .star {
    border: 1px solid;
    padding: 5px;
    border-radius: 10px;
    margin-right: 30px;
}
    .review-container {
    background-color: #f9f9f9;
    padding: 0 20px;
    border-radius: 8px;
    width: 100%;
    margin: 10px 0;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.review-header {
    display: flex;
    justify-content: space-between;
    font-family: Arial, sans-serif;
    margin-bottom: 10px;
}

.reviewer-name {
    font-weight: bold;
    font-size: 16px;
    color: #333;
}

.review-date {
    font-size: 14px;
    color: #888;
}

.review-body {
    font-size: 15px;
    color: #555;
    margin-bottom: 10px;
}

.review-rating {
    margin-bottom: 10px;
}

.stars {
    display: inline-block;
}

.star {
    font-size: 18px;
    color: #ffd700; /* Màu vàng cho sao */
}

.star.empty {
    color: #ddd; /* Màu xám cho sao rỗng */
}

.review-image {
    margin-top: 10px;
}

.review-img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    display: block;
}

</style>






<script>
  // Đợi 3 giây sau khi tải trang
  setTimeout(function() {
  const alerts = document.getElementsByClassName('myAlert');
  for (let i = 0; i < alerts.length; i++) {
    alerts[i].style.display = 'none';
  }
}, 2000);

</script>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function changeImage(event, src) {
            document.getElementById('mainImage').src = src;
            document.querySelectorAll('.thumbnail').forEach(thumb => thumb.classList.remove('active'));
            event.target.classList.add('active');
        }
</script>






<?php }
    else{
        echo '<h1>SẢN PHẨM KHÔNG TỒN TẠI</h1>';
    }

 } ?>























