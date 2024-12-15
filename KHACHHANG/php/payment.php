<?php session_start();
require_once '../services/conn.php';
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    function getIdUsername($conn, $username){
        $select = "SELECT makhachhang FROM khachhang WHERE tendangnhap = '$username' ";
        $result = mysqli_query($conn, $select);
        return $result;
    }
    
    $getIdUsername = mysqli_fetch_assoc(getIdUsername($conn, $username));
    $idUsername = $getIdUsername['makhachhang']; //makhachhang


    function getAllCart_IdUsername($conn, $idUsername){
        $select = "SELECT * FROM giohang WHERE makhachhang = '$idUsername' ";
        $result = mysqli_query($conn, $select);
        return $result;
    }

    $num_row_cart = mysqli_num_rows(getAllCart_IdUsername($conn, $idUsername));

    function getAllUsername($conn, $username){
        $select = "SELECT * FROM khachhang WHERE tendangnhap = '$username' ";
        $result = mysqli_query($conn, $select);
        return $result;
    }

    function getAllProduct_IdPrd($conn, $idPrd){
        $select = "SELECT * FROM sanpham WHERE masanpham = '$idPrd' ";
        $result = mysqli_query($conn, $select);
        return $result;
    }


    $getAllCart = getAllCart_IdUsername($conn, $idUsername);
    $getAllUsername = mysqli_fetch_assoc(getAllUsername($conn, $username));

?>


<link rel="stylesheet" type="text/css" href="../ASSETS/css/base.css">
    <link rel="stylesheet" type="text/css" href="../ASSETS/css/reset.css">
    <link rel="stylesheet" type="text/css" href="../ASSETS/css/payment.css">
    <link rel="stylesheet" type="text/css" href="../ASSETS/font/fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<div class=" container-fluid my-5 ">
    <div class="row justify-content-center ">
        <div class="col-xl-10">
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
                        <div class="header-login">
                            <div class="header-login-container">
                                <p id="header-login_hello" style="margin: 5px 0;">
                                    Xin Chao!
                                </p>
                                <p id="header-login_user" style="margin: 5px 0;">
                                    <?php
                                    if (isset($_SESSION['username'])) {
                                        echo ('<a href=profile.php>' . $_SESSION['username'] . '</a>');
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row  mx-auto justify-content-center text-center">
                    <div class="col-12 mt-3 ">
                        <nav aria-label="breadcrumb" class="second ">
                            <ol class="breadcrumb indigo lighten-6 first  ">
                                <li class="breadcrumb-item font-weight-bold "><a class="black-text text-uppercase " href="../server.php"><span class="mr-md-3 mr-1">Trang chủ</span></a><i class="fa fa-angle-double-right " aria-hidden="true"></i></li>
                                <li class="breadcrumb-item font-weight-bold"><a class="black-text text-uppercase" href="cart.php"><span class="mr-md-3 mr-1">Giỏ hàng</span></a><i class="fa fa-angle-double-right text-uppercase " aria-hidden="true"></i></li>
                                <li class="breadcrumb-item font-weight-bold"><a class="black-text text-uppercase active-2" href="#"><span class="mr-md-3 mr-1">Thanh toán</span></a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                
            
                <form method="post" action="../services/cartServices.php" class="row justify-content-around">
                    <div class="col-md-5">
                        <div class="card border-0">
                            <div class="card-header pb-0">
                                <p class="card-text text-muted mt-4  space">THÔNG TIN GIAO DỊCH (<?php echo $getAllUsername['makhachhang'] ?>)</p>
                                <hr class="my-0">
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="NAME" class="small text-muted mb-1">HỌ TÊN</label>
                                    <p type="text" class="form-control form-control-sm" name="NAME" id="NAME"><?php echo $getAllUsername['hoten'] ?> </p>
                                </div>
                                <div class="form-group">
                                    <label for="NAME" class="small text-muted mb-1">SỐ ĐIỆN THOẠI</label>
                                    <p type="text" class="form-control form-control-sm" name="NAME" id="NAME"><?php echo $getAllUsername['sodienthoai'] ?> </p>                                
                                </div>
                                <div class="form-group">
                                    <label for="NAME" class="small text-muted mb-1">ĐỊA CHỈ</label>
                                    <p type="text" class="form-control form-control-sm" name="NAME" id="NAME"><?php echo $getAllUsername['diachi'] ?> </p>                                
                                </div>  
                                <div class="form-group form-control form-control-sm" style = "display: flex; justify-content: space-around;">
                                    <label>Thanh toán khi nhận hàng <input type="radio" name="method" value="Thanh toán khi nhận hàng" checked></label>
                                    <label>Thanh toán chuyển khoản <input type="radio" name="method" value="Thanh toán chuyển khoản"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-5">
                        <div class="card border-0 ">
                            <div style = "margin:0 0 10px 0;" class="card-header card-2">
                                <p class="card-text text-muted mt-md-4  mb-2 space">GIỎ HÀNG</p>
                                <hr class="my-2">
                            </div>
                            <div class="card-body pt-0">

                            <?php 
                            $totalPriceAll = 0;
                            $totalQuatifyAll = 0;
                            
                            while ($row = mysqli_fetch_assoc($getAllCart)) {
                                $idPrd = $row['masanpham']; // Mã sản phẩm
                                $quantify = $row['soluong']; // Số lượng
                                $getPrd = mysqli_fetch_assoc(getAllProduct_IdPrd($conn, $idPrd));
                                $namePrd = $getPrd['tensanpham'];
                                $image = $getPrd['hinhanh'];
                                $price = $row['soluong'] * $getPrd['gia']; // Giá sản phẩm
                                $totalPriceAll += $price;
                                $totalQuatifyAll += $quantify;
                                ?>

                                <div class="row  justify-content-between">
                                    <div class="col-auto col-md-7">
                                        <div class="media flex-column flex-sm-row">
                                            <img class="img-fluid" src="../../QUANLI/ASSETS/img/IMG-Product/<?php echo $image; ?>" width="62" height="62">
                                            <div class="media-body  my-auto">
                                                <div class="row ">
                                                    <div class="col-auto"><p class="mb-0"><b><?php echo $namePrd; ?></b></p><small class="text-muted">(Đảm bảo chất lượng)</small></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" pl-0 flex-sm-col col-auto  my-auto"> <p class="boxed-1"><?php echo $quantify; ?></p></div>
                                    <div class=" pl-0 flex-sm-col col-auto  my-auto "><p><b><?php echo number_format($price); ?>đ</b></p></div>
                                </div>   
                                
                                <input style="display:none;" type="text" value="<?php echo $idPrd; ?>" class="form-control" name="idPrd[]"/>
                                <input style="display:none;" type="text" value="<?php echo $quantify; ?>" class="form-control" name="quantify[]"/>

                                <?php } ?>


                                    <div style = "margin-top:10px !important;" class="card-header card-2">
                                        <input style="display:none;" type="text" value="<?php echo $totalQuatifyAll; ?>" class="form-control" name="totalQuatifyAll"/>
                                        <input style="display:none;" type="text" value="<?php echo $totalPriceAll; ?>" class="form-control" name="totalPriceAll"/>
           

                                        <p class="card-text text-muted mt-md-4  mb-2 space">Tổng sản phẩm: <?php echo $totalQuatifyAll; ?></p>
                                        <p class="card-text text-muted ">Tổng giá: <?php echo number_format($totalPriceAll); ?></p>
                                        <hr class="my-2">
                                    </div>
                        
                                <div class="row mb-5 mt-4 ">
                                    <div class="col-md-7 col-lg-6 mx-auto"><button type="<?php if(!$num_row_cart){ echo "button"; } else {echo "submit"; } ?>" name="btnPayment" class="btn btn-block btn-outline-primary btn-lg">Xác nhận</button></div>
                                </div>
                            </div>

                           
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>






<?php }
    else{
        header("Location:formLogin-Register.php");
                exit();
    }
    ?>
