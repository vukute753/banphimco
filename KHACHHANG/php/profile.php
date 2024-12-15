<?php
session_start(); 
require_once '../MDB/MDB.php';
require_once '../services/profileServices.php';
if(isset($_SESSION['username']))
{
?>
    <link rel="stylesheet" type="text/css" href="../ASSETS/css/base.css">
    <link rel="stylesheet" type="text/css" href="../ASSETS/css/reset.css">
    <link rel="stylesheet" type="text/css" href="../ASSETS/css/style.css">
    <link rel="stylesheet" type="text/css" href="../ASSETS/font/fontawesome/css/all.css">
    <link rel="stylesheet" href="../ASSETS/css/inf.css">

<!-- HEADER -->
<div class="header-pos-fix">
    <!-- header -->
    <div class="wrapper">
        <header class="header">
            <img id="header-logo" src="../ASSETS/img/IMG-home-page/logo.png" alt="">
            <div class="header-container">
                <div class="header-searching">
                    
                <div class="input-group">

                
                    

                <form action='../server.php?page=product.php&search' method="post" style="display: flex; align-items:center;">
                                    <div class="form-outline" data-mdb-input-init>
                                        <input style="height: 40px; width: 300px" type="search" id="form1" class="form-control" name="search_value"/>
                                        <label class="form-label" for="form1">Search</label>
                                    </div>
                         <button  style="height: 40px;"  name="btn_search" type="submit" class="btn btn-outline-primary" data-mdb-ripple-init>
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
</div>
                   
                </div>
                <div class="header-contact">
                    <img id="header-contact_phone" src="../ASSETS/img/IMG-home-page/phone.svg" alt="">
                    <div class="header-contact_container">
                        <p style="margin: 0;" id="header-contact-hotline">
                            Tổng đài hổ trợ/ Hotline
                        </p>
                        <p id="header-contact-numberphone" style="margin: 0;">
                            032777381
                        </p>
                    </div>
                </div>
                <div class="header-login">
                    <img id="header-login-icon" src="../ASSETS/img/IMG-home-page/circle-user-regular 1.svg" alt="">
                    <div class="header-login-container">
                        <p id="header-login_hello" style="margin: 5px 0;">
                            Xin Chao!
                        </p>
                        <p id="header-login_user" style="margin: 5px 0;">
                            <?php
                            if (isset($_SESSION['username'])) {
                                echo ('<a href=profile.php>' . $_SESSION['username'] . '</a>');
                            } else {
                                echo ('<a href="formLogin-Register.php">Đăng nhập</a>');
                            }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="header-cart">
                <a id="header-cart_icon" href="<?php if (isset($_SESSION['username'])) {
                                                    echo 'cart.php';
                                                } else {
                                                    echo 'formLogin-Register.php';
                                                } ?>"> <img src="../ASSETS/img/IMG-home-page/cart-shopping-solid 2.svg" alt=""></a>
            </div>
        </header>

    </div>
    <!-- end header -->
    <!-- navigation -->
    <div class="menu ">

        <div class="wrapper ">
            <ul class="menu-list">
                <li class="menu-item"><a class="menu-item_title" href="../server.php">Trang Chủ</a>

                </li>
                <li class="menu-item"><a class="menu-item_title" href="../server.php?page=product.php">Sản phẩm</a>

                </li>
                <li class="menu-item"><a class="menu-item_title" href="#">Kiến thức và bảo hành</a>

                </li>
                <li class="menu-item"><a class="menu-item_title" href="#footer">Liên hệ</a>

                </li>

            </ul>
        </div>
    </div>
    <!-- end navigation -->
</div>
<!-- END HEADER -->







<!-- CONTENT -->

<div class="row w-100" style="padding-top: 200px;height: 800px;">
  <div class="col-3">
    <!-- Tab navs -->
    <div
      class="nav flex-column nav-tabs text-center"
      id="v-tabs-tab"
      role="tablist"
      aria-orientation="vertical">

      <!-- Thong tin tai khoan -->
      <a
        data-mdb-tab-init
        class="nav-link active"
        id="v-tabs-home-tab"
        href="#v-tabs-home"
        role="tab"
        aria-controls="v-tabs-home"
        aria-selected="true">
        Thông tin tài khoản
        </a>

    

        <!-- Cap nhat thong tin -->
        <a
        data-mdb-tab-init
        class="nav-link"
        id="v-tabs-changeInf-tab"
        href="#v-tabs-changeInf"
        role="tab"
        aria-controls="v-tabs-changeInf"
        aria-selected="true">
        Thay đổi thông tin
        </a>




        <!-- Dia chi -->
      <a
        data-mdb-tab-init
        class="nav-link"
        id="v-tabs-address-tab"
        href="#v-tabs-address"
        role="tab"
        aria-controls="v-tabs-address"
        aria-selected="false"
        >Địa chỉ giao dịch</a>



       <!-- Don hang -->
       <a
        data-mdb-tab-init
        class="nav-link"
        id="v-tabs-order-tab"
        href="#v-tabs-order"
        role="tab"
        aria-controls="v-tabs-order"
        aria-selected="false"
        >Đơn hàng</a>

           <!-- Danh gia -->
      <a
        data-mdb-tab-init
        class="nav-link"
        id="v-tabs-evalue-tab"
        href="#v-tabs-evalue"
        role="tab"
        aria-controls="v-tabs-evalue"
        aria-selected="false"
        >Đánh giá</a>


        <!-- Doi mat khau -->
      <a
        data-mdb-tab-init
        class="nav-link"
        id="v-tabs-changePass-tab"
        href="#v-tabs-changePass"
        role="tab"
        aria-controls="v-tabs-changePass"
        aria-selected="false"
        >Đổi mật khẩu</a>

        
    </div>
    <!-- Tab navs -->

    <!-- Additional Buttons -->
    <div class="mt-3 text-center">
      <button
        type="button"
        class="btn btn-danger btn-sm w-75"
        onclick="logout()"
      >
        <a style="display:block; color: #fff; width: 100%;" href="logout.php">Đăng xuất</a>
      </button>
    </div>
    <!-- Additional Buttons -->
  </div>


  <div class="col-9">
    <!-- Tab content -->
    <div class="tab-content" id="v-tabs-tabContent">

    <!-- Thong tin tai khoan -->
     <?php  
     $username = $_SESSION['username'];
     $getAllUser = getAllUser($conn, $username);
     $row = mysqli_fetch_assoc($getAllUser); ?>

<?php if(isset($_GET['success'])){ ?>
        <div class="alert alert-success myAlert" role="alert">
            <?php echo $_GET['success']; ?> 
            </div>
     <?php } ?>

     
      <div
        class="tab-pane fade show active"
        id="v-tabs-home"
        role="tabpanel"
        aria-labelledby="v-tabs-home-tab"
        style = "height: 0;">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-6 mb-4 mb-lg-0" style = "width: 70%; ">
                <div class="card mb-3" style="border-radius: .5rem;">
                <div class="row g-0">
                    <div class="col-md-4 gradient-custom text-center text-white"
                    style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                    <img src="../ASSETS/img/tao.JPG"
                        alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                    <h5><?php echo $row['hoten'] ?></h5>
                    <p><?php echo $row['gioitinh'] ?></p>
                    </div>
                    <div class="col-md-8">
                    <div class="card-body p-4">
                        <h6>Thông tin chung</h6>
                        <p class="text-muted" style ="font-size: 12px;">Ngày tạo: <?php echo $row['ngaytao'] ?></p>
                        <hr class="mt-0 mb-4">
                        <div class="row pt-1">
                        <div class="col-6 mb-3">
                            <h6>Email</h6>
                            <p class="text-muted"><?php echo $row['email'] ?></p>
                        </div>
                        <div class="col-6 mb-3">
                            <h6>Số điện thoại</h6>
                            <p class="text-muted"><?php if(strlen($row['sodienthoai']) < 1) { echo 'Chưa cập nhật'; } else { echo $row['sodienthoai']; } ?></p>
                        </div>
                        <div class="col-6 mb-3" style ="    width: 100%;">
                            <h6>Địa chỉ</h6>
                            <p class="text-muted"><?php if(strlen($row['diachi']) < 1) { echo 'Chưa cập nhật'; } else { echo $row['diachi']; } ?></p>
                        </div>
                        </div>
                      
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>

     

      </div>





      <!-- Cap nhat thong tin -->
      <div
        class="tab-pane fade"
        id="v-tabs-changeInf"
        role="tabpanel"
        aria-labelledby="v-tabs-changeInf-tab">
        
        <?php if(isset($_GET['error'])){ ?>

        <div class="alert alert-danger myAlert" role="alert">
        <?php echo $_GET['error']; ?>
        </div>

        <?php } ?>


        <form action="../services/userServices.php" method="post"> 
                <div
                class="tab-pane fade show active"
                id="v-tabs-home"
                role="tabpanel"
                aria-labelledby="v-tabs-home-tab"
                style = "height: 0;">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-lg-6 mb-4 mb-lg-0" style = "width: 50%; ">
                        <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-8" style = "width: 100%; ">
                            <div class="card-body p-4" style = "width: 100%; ">
                                <h6>Cập nhật thông tin</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1" style = "width: 100%; ">
                                <div class="col-6 mb-3" style = "width: 100%; ">
                                    <h6>Họ tên</h6>
                                    <div class="form-outline" data-mdb-input-init style = "width: 50%; " >
                                        <input style = "width: 100%; " id="typeText" class="form-control text-muted" type="text" name="fullname" value="<?php echo $row['hoten'] ?>" />
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <h6>Giới tính</h6>
                                    <div class="gender" style="width:300px;     display: flex;">
                                        <?php if ($row['gioitinh'] == 'Nam') { ?>
                                            <label style = "margin-right: 20px;">Nam<input type="radio" name="gender" value="Nam" checked></label><br>
                                            <label style = "margin-right: 20px;">Nữ<input type="radio" name="gender" value="Nũ"></label><br>
                                            <label style = "margin-right: 20px;">Khác<input type="radio" name="gender" value="Khác"></label>
                                        <?php } else if ($row['gioitinh'] == 'Nữ') { ?>
                                            <label style = "margin-right: 20px;">Nam<input type="radio" name="gender" value="Nam"></label><br>
                                            <label style = "margin-right: 20px;">Nữ<input type="radio" name="gender" value="Nũ" checked></label><br>
                                            <label style = "margin-right: 20px;">Khác<input type="radio" name="gender" value="Khác"></label>
                                        <?php } else { ?>
                                            <label style = "margin-right: 20px;">Nam<input type="radio" name="gender" value="Nam"></label><br>
                                            <label style = "margin-right: 20px;">Nữ<input type="radio" name="gender" value="Nũ"></label><br>
                                            <label style = "margin-right: 20px;">Khác<input type="radio" name="gender" value="Khác" checked></label>
                                        <?php } ?>
                                    </div>
                                </div>   
                                <div class="col-6 mb-3">
                                    <h6>Số điện thoại</h6>
                                    <input style = "width: 100%; " id="typeText" class="form-control text-muted" type="text" name="numberphone" value="<?php echo $row['sodienthoai'] ?>" />
                                </div>
                                </div>
                                <button type="submit" name="btnUpdateInf" class="btn btn-primary" data-mdb-ripple-init>Cập nhật</button>
                            
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
            </div>
        </form>
        
      </div>


      <!-- Dia chi -->
      <div
        class="tab-pane fade"
        id="v-tabs-address"
        role="tabpanel"
        aria-labelledby="v-tabs-address-tab">

        <?php if(isset($_GET['error'])){ ?>

        <div class="alert alert-danger myAlert" role="alert">
        <?php echo $_GET['error']; ?>
        </div>

        <?php } ?>

        <?php $provinces = [
            "An Giang", "Bà Rịa - Vũng Tàu", "Bạc Liêu", "Bắc Kạn", "Bắc Giang", 
            "Bắc Ninh", "Bến Tre", "Bình Dương", "Bình Định", "Bình Phước", 
            "Bình Thuận", "Cà Mau", "Cần Thơ", "Cao Bằng", "Đà Nẵng", 
            "Đắk Lắk", "Đắk Nông", "Điện Biên", "Đồng Nai", "Đồng Tháp", 
            "Gia Lai", "Hà Giang", "Hà Nam", "Hà Nội", "Hà Tĩnh", 
            "Hải Dương", "Hải Phòng", "Hậu Giang", "Hòa Bình", "Hưng Yên", 
            "Khánh Hòa", "Kiên Giang", "Kon Tum", "Lai Châu", "Lạng Sơn", 
            "Lào Cai", "Lâm Đồng", "Long An", "Nam Định", "Nghệ An", 
            "Ninh Bình", "Ninh Thuận", "Phú Thọ", "Phú Yên", "Quảng Bình", 
            "Quảng Nam", "Quảng Ngãi", "Quảng Ninh", "Quảng Trị", "Sóc Trăng", 
            "Sơn La", "Tây Ninh", "Thái Bình", "Thái Nguyên", "Thanh Hóa", 
            "Thừa Thiên Huế", "Tiền Giang", "TP Hồ Chí Minh", "Trà Vinh", 
            "Tuyên Quang", "Vĩnh Long", "Vĩnh Phúc", "Yên Bái"
        ];
        ?>

      <form action="../services/userServices.php" method="post"> 
                <div
                class="tab-pane fade show active"
                id="v-tabs-home"
                role="tabpanel"
                aria-labelledby="v-tabs-home-tab"
                style = "height: 0;">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-lg-6 mb-4 mb-lg-0" style = "width: 70%; ">
                        <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-8">
                            <div class="card-body p-4">
                                <h6>Cập nhật địa chỉ</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                <div class="col-6 mb-3" style ="width: 100%;">
                                    <h6 class = "text-muted" style = "font-size: 15px;" >Tỉnh/Thành, Quận/Huyện, Phường/Xã, Tên đường, Khu vực, Số nhà</h6>
                                    <input id="typeText" class="form-control text-muted" type="text" name="address" value="<?php echo $row['diachi'] ?>" />
                                </div>
                                </div>
                                <button type="submit" name="btnUpdateAddress" class="btn btn-primary" data-mdb-ripple-init>Cập nhật</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
            </div>
        </form>

      </div>

      


      <!-- Don hang -->

      <?php



        $getIdUsername = mysqli_fetch_assoc(getIdUsername($conn, $username)); 
        $idUsername = $getIdUsername['makhachhang'];
        $getOrder = getAllOrder($conn, $idUsername);

        $num_rows = mysqli_num_rows(getAllOrder($conn, $idUsername));

        $prd_dsp = 5; //so san pham muon hien thi
        $total = ceil($num_rows / $prd_dsp); //tong so nut page hien thi

        $btn_page = 1;

        if(isset($_GET['btn-page'])){
            $btn_page = $_GET['btn-page'];//lay trang san pham
        }
        $getlocation = ($btn_page - 1) * $prd_dsp; // lay vi tri cua san pham




        $getOrderLimit = getAllOrderLimit($conn, $idUsername, $getlocation, $prd_dsp);


      
      

      ?>
      <div
        class="tab-pane fade"
        id="v-tabs-order"
        role="tabpanel"
        aria-labelledby="v-tabs-order-tab">


        <div> 
                <div
                class="tab-pane fade show active"
                id="v-tabs-home"
                role="tabpanel"
                aria-labelledby="v-tabs-home-tab"
                style = "height: 0;">

                    <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-lg-6 mb-4 mb-lg-0" style = "width: 90%; ">
                        <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0">
                            <div class="col-md-8" style = "width: 100%;">
                            <div class="card-body p-4">
                            <?php echo ('<div class="btn-page">');
                        for ($btn = 1; $btn <= $total; $btn++) {
                            if (isset($_SESSION['username'])) {
                              // Nếu người dùng đã đăng nhập, hiển thị liên kết với giá trị nút
                              echo ('<a href="profile.php?tab=order&btn-page=' . $btn . '" class="nav-link" id="' . $btn . '">' . $btn . '</a>');
                          } else {
                              // Nếu người dùng chưa đăng nhập, chuyển đến trang đăng nhập
                              echo ('<a href="../php/formLogin-Register.php" class="nav-link">' . $btn . '</a>');
                          }
                          };
                        echo ('</div>');
                        ?>



                                <h6>Đơn hàng</h6>
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">Mã đơn hàng</th>
                                        <th scope="col">Ngày đặt hàng</th>
                                        <th scope="col">Sản phẩm</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php while ($rowOrder = mysqli_fetch_assoc($getOrderLimit)) { ?>
                                        <tr>
                                        <th scope="row"><?php echo $rowOrder['madonhang']; ?></th>
                                        <td><?php echo $rowOrder['ngaydathang']; ?></td>
                                        <td><?php echo $rowOrder['tongsanpham']; ?></td>
                                        <td><?php echo number_format($rowOrder['tonggia']); ?>đ</td>
                                        <td><?php echo $rowOrder['trangthai']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-view-details" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?php echo $rowOrder['madonhang']; ?>">
                                                Xem chi tiết
                                            </button>
                                        
                                        </td>
                                        </tr>    
                                        <?php } ?>
                                    </tbody>    
                                </table>
                                
                                
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    
            </div>
        </div>
        
      </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <p id="modalOrderId"></p>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="productDetails"></div>

        
        <div class="method"style ="margin-top:100px;">
            <p id="paymentMethod"></p> <!-- Phương thức thanh toán -->
            <p id="shippingAddress"></p> <!-- Địa chỉ giao hàng -->
            <p id="numberphone"></p> 
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>












 <!-- Danh gia -->
<div
class="tab-pane fade"
id="v-tabs-evalue"
role="tabpanel"
aria-labelledby="v-tabs-evalue-tab">

<?php if(isset($_GET['error'])){ ?>

<div class="alert alert-warning myAlert" role="alert">
<?php echo $_GET['success']; ?>
</div>

<?php } ?>


<div> 
        <div
        class="tab-pane fade show active"
        id="v-tabs-home"
        role="tabpanel"
        aria-labelledby="v-tabs-home-tab"
        style = "height: 0; ">

            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-6 mb-4 mb-lg-0" style = "width: 90%; ">
                <div class="card mb-3" style="border-radius: .5rem;">
                <div class="row g-0">
                    <div class="col-md-8" style = "width: 100%;">
                    <div class="card-body p-4">
                    <?php echo ('<div class="btn-page">');
                for ($btn = 1; $btn <= $total; $btn++) {
                    if (isset($_SESSION['username'])) {
                      // Nếu người dùng đã đăng nhập, hiển thị liên kết với giá trị nút
                      echo ('<a href="profile.php?tab=evalue&btn-page=' . $btn . '" class="nav-link" id="' . $btn . '">' . $btn . '</a>');
                  } else {
                      // Nếu người dùng chưa đăng nhập, chuyển đến trang đăng nhập
                      echo ('<a href="../php/formLogin-Register.php" class="nav-link">' . $btn . '</a>');
                  }
                  };
                echo ('</div>');
                ?>

                        <div class="div" style="    display: flex
;
    justify-content: space-between;">
                        <h6>Đánh giá</h6>
                        <!-- Button trigger modal -->
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                            Sản phẩm đã đánh giá
                          </button>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Mã đơn hàng</th>
                                <th scope="col">Ngày đặt hàng</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Tên sản phẩm</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                            <?php

                                  $statusOrder = "Đã giao hàng";
                                  $statusEvalue = 0; // Sản phẩm chưa được đánh giá
                                  $prd_dsp = 4; // Số sản phẩm muốn hiển thị trên mỗi trang
                                  $btn_page = isset($_GET['btn-page']) ? $_GET['btn-page'] : 1;
                                  $getlocation = ($btn_page - 1) * $prd_dsp; // Vị trí bắt đầu

                                  // Đếm tổng số sản phẩm chưa đánh giá
                                  $countQuery = "
                                      SELECT COUNT(*) AS total 
                                      FROM chitietdonhang ctdh
                                      JOIN donhang dh ON ctdh.madonhang = dh.madonhang
                                      WHERE dh.makhachhang = '$idUsername'
                                        AND dh.trangthai = '$statusOrder'
                                        AND ctdh.trangthaidanhgia = '$statusEvalue'
                                  ";
                                  $countResult = mysqli_query($conn, $countQuery);
                                  $totalRow = mysqli_fetch_assoc($countResult)['total'];
                                  $totalPages = ceil($totalRow / $prd_dsp);

                                  // Lấy dữ liệu sản phẩm phân trang
                                  $products = getProductsNotEvaluated($conn, $idUsername, $statusOrder, $statusEvalue, $getlocation, $prd_dsp);



                                while($OrderDetailEvalue = mysqli_fetch_assoc($products)){ //Các sản phẩm của từng đơn hàng
                                  $idPrd = $OrderDetailEvalue['masanpham'];    

                                  $getAllPrd = getAllProduct($conn, $idPrd);
                                  $AllPrd = mysqli_fetch_assoc($getAllPrd);
                                            
                                  ?>
                                <tr>
                                  <th scope="row"><?php echo $OrderDetailEvalue['madonhang']; ?></th>
                                  <td><?php echo $OrderDetailEvalue['ngaydathang']; ?></td>
                                  <td>
                                      <img class="img-fluid" 
                                          src="../../QUANLI/ASSETS/img/IMG-Product/<?php echo $OrderDetailEvalue['hinhanh']; ?>" 
                                          width="62" height="62">
                                  </td>
                                  <td><?php echo $OrderDetailEvalue['tensanpham']; ?></td>
                                  <td>
                                      <button 
                                          style="font-size:10px; background-color: #d8d800;" 
                                          type="button" 
                                          class="btn btn-primary open-evaluate-modal" 
                                          data-idprd="<?php echo $idPrd; ?>" 
                                          data-idorder="<?php echo $OrderDetailEvalue['madonhang']; ?>" 
                                          data-idusername="<?php echo $idUsername; ?>" 
                                          data-toggle="modal" 
                                          data-target="#exampleModalCenter">
                                          Gửi đánh giá
                                      </button>
                                  </td>
                              </tr>


                                </td>
                                </tr> 
                             <?php            
                            }  ?>                           
                            </tbody>    
                        </table>
                        
                        
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            
    </div>
</div>

</div>

<!-- <Modal lịch sử đánh giá -->
 <!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style = "max-width: 1200px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lịch sử đánh giá</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <table class="table">
        <thead>
          <tr>
            <th scope="col">Mã sản phẩm</th>
            <th scope="col"></th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col"></th>
            <th scope="col">Nội dung</th>
            <th scope="col">Ngày đánh giá</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $getEvalue = "SELECT * FROM danhgiasanpham WHERE makhachhang = '$idUsername' ORDER BY id DESC";
          $resultGetEvalue = mysqli_query($conn, $getEvalue);

          while($rowEvalue = mysqli_fetch_assoc($resultGetEvalue)){
            $idPrd =$rowEvalue['masanpham'];
            $getPrd = getAllProduct($conn, $idPrd);
            $rowPrd = mysqli_fetch_assoc($getPrd);
          ?>
          <tr>
          
            <td><a href="detailproduct.php?id=<?php echo $rowEvalue['masanpham'];?>"><?php echo $rowEvalue['masanpham'];?></a></td>
            <td><img src="../../QUANLI/ASSETS/img/IMG-Product/<?php echo $rowPrd['hinhanh']; ?>" width=70 height=70 alt=""></td>
            <td><?php echo $rowPrd['tensanpham'] ?></td>
            <td><?php echo $rowEvalue['diemdanhgia']; ?><i class="bi bi-star-fill text-warning"></i></td>
            <td><?php echo $rowEvalue['noidung']; ?></td>
            <td><?php echo $rowEvalue['ngaytao']; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>

      </div>
    </div>
  </div>
</div>


<!-- Modal đánh giá -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5>Đánh Giá Sản Phẩm</h5>
        </div>
        <div class="card-body">
        <form action="../services/profileServices.php" method="POST" enctype="multipart/form-data">
            <!-- Input ẩn để gửi thông tin sản phẩm -->
            <input type="hidden" id="modal-idprd" name="idPrd" value="">
            <input type="hidden" id="modal-idusername" name="idUsername" value="">
            <input type="hidden" id="modal-idorder" name="idOrder" value="">

            <div class="mb-3">
                <label for="prdImage" class="form-label">Hình ảnh minh họa (nếu có)</label>
                <input type="file" id="prdImage" name="prdImage" class="form-control">
            </div>
            <div class="mb-3">
                <label for="review" class="form-label">Nhận Xét:</label>
                <textarea id="review" name="review" class="form-control" rows="4" placeholder="Hãy viết nhận xét của bạn..."></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Đánh Giá:</label>
                <div class="star-rating">
                    <input type="radio" id="star5" name="rating" value="5">
                    <label for="star5"><i class="fas fa-star"></i></label>
                    
                    <input type="radio" id="star4" name="rating" value="4">
                    <label for="star4"><i class="fas fa-star"></i></label>
                    
                    <input type="radio" id="star3" name="rating" value="3">
                    <label for="star3"><i class="fas fa-star"></i></label>
                    
                    <input type="radio" id="star2" name="rating" value="2">
                    <label for="star2"><i class="fas fa-star"></i></label>
                    
                    <input type="radio" id="star1" name="rating" value="1">
                    <label for="star1"><i class="fas fa-star"></i></label>
                </div>
            </div>
            <button type="submit" name="btnRating" class="btn btn-success">Gửi Đánh Giá</button>
        </form>

        </div>
    </div>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>



<style>
        .star-rating {
            direction: rtl;
            font-size: 2rem;
        }
        .star-rating input[type="radio"] {
            display: none;
        }
        .star-rating label {
            color: #ddd;
            cursor: pointer;
        }
        .star-rating input[type="radio"]:checked ~ label {
            color: #f5c518;
        }
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #f5c518;
        }
    </style>









      <!-- Doi mat khau -->
      <div
        class="tab-pane fade"
        id="v-tabs-changePass"
        role="tabpanel"
        aria-labelledby="v-tabs-changePass-tab">

        <?php if(isset($_GET['error'])){ ?>

        <div class="alert alert-danger myAlert" role="alert">
        <?php echo $_GET['error']; ?>
        </div>

        <?php } ?>
                
        <form action="../services/userServices.php" method="post"> 
                <div
                class="tab-pane fade show active"
                id="v-tabs-home"
                role="tabpanel"
                aria-labelledby="v-tabs-home-tab"
                style = "height: 0;">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-lg-6 mb-4 mb-lg-0" style = "width: 30%; ">
                        <div class="card mb-3" style="border-radius: .5rem;">
                        <div class="row g-0" style ="width: 100%;">
                            <div class="col-md-8" style ="width: 100%;">
                            <div class="card-body p-4">
                                <h6>Đổi mật khẩu</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                <div class="col-6 mb-3" style ="width: 100%;">
                                    <h6 class = "text-muted" style = "font-size: 15px;" >Mật khẩu cũ</h6>
                                    <input id="typeText" class="form-control text-muted" type="password" name="oldPassword" />
                                </div>
                                </div>
                                <div class="row pt-1">
                                <div class="col-6 mb-3" style ="width: 100%;">
                                    <h6 class = "text-muted" style = "font-size: 15px;" >Mật khẩu mới</h6>
                                    <input id="typeText" class="form-control text-muted" type="password" name="newPassword" />
                                </div>
                                </div>
                                <div class="row pt-1">
                                <div class="col-6 mb-3" style ="width: 100%;">
                                    <h6 class = "text-muted" style = "font-size: 15px;" >Xác nhận mật khẩu mới</h6>
                                    <input id="typeText" class="form-control text-muted" type="password" name="repeatNewPassword" />
                                </div>
                                </div>
                                <button type="submit" name="btnUpdatePassword" class="btn btn-primary" data-mdb-ripple-init>Cập nhật</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
            </div>
        </form>
      </div>


      



    </div>
    <!-- Tab content -->
  </div>






  <!-- DETAIL ORDER -->
   

</div>




















<!-- FOOTER -->
<?php require_once 'footer.php'; ?>
<!-- END FOOTER -->


<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<!-- MÀU NÚT CHUYỂN TRÁNG -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Lấy giá trị tham số btn-page từ URL
    const urlParams = new URLSearchParams(window.location.search);
    const btnPage = urlParams.get('btn-page'); // Giá trị của btn-page trong URL

    // Kiểm tra xem giá trị btn-page có tồn tại và tô màu nút tương ứng
    if (btnPage) {
        const activeButton = document.getElementById(btnPage);
        if (activeButton) {
            activeButton.style.backgroundColor = "#007bff"; // Thay đổi màu nút khi nó được chọn
            activeButton.style.color = "#fff"; // Tô chữ màu trắng
        }
    }
});
</script>



<!-- CHI TIẾT SẢN PHẨM -->
<script>
document.addEventListener("DOMContentLoaded", function () {
  const detailButtons = document.querySelectorAll(".btn-view-details");
  const modalOrderId = document.getElementById("modalOrderId");
  const productDetails = document.getElementById("productDetails"); // Div chứa thông tin sản phẩm
  const paymentMethodElement = document.getElementById("paymentMethod"); // Thẻ để hiển thị phương thức thanh toán
  const shippingAddressElement = document.getElementById("shippingAddress"); // Thẻ để hiển thị địa chỉ 
  const numberphoneElement = document.getElementById('numberphone');
  detailButtons.forEach(button => {
    button.addEventListener("click", function () {
      const orderId = this.getAttribute("data-id"); // Lấy madonhang từ data-id
      modalOrderId.textContent = `Mã đơn hàng: ${orderId}`; // Gán mã đơn hàng vào thẻ p

      // Gửi dữ liệu ngay sau khi gán mã đơn hàng vào thẻ <p>
      fetch("../services/profileServices.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ madonhang: orderId }), // Dữ liệu gửi đi
      })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            // Xóa các sản phẩm cũ trước khi thêm mới
            productDetails.innerHTML = ""; 
            
            // Hiển thị phương thức thanh toán và địa chỉ giao hàng
            paymentMethodElement.textContent = `Phương thức thanh toán: ${data.order.phuongthucthanhtoan}`; // Hiển thị phương thức thanh toán
            shippingAddressElement.textContent = `Địa chỉ: <?php echo $row['diachi'];  ?>`; // Hiển thị địa chỉ
            numberphoneElement.textContent = `Số điện thoại: <?php echo $row['sodienthoai'];  ?> `
            // Hiển thị thông tin đơn hàng
            console.log("Mã đơn hàng:", data.madonhang);
            console.log("Đơn hàng:", data.order);
            console.log("Dữ liệu đơn hàng:", data.orderDetail);
            console.log('Dữ liệu sản phẩm:', data.orderProduct);

            const orderDetails = data.orderDetail;
            const orderProducts = data.orderProduct;

            // Duyệt qua từng sản phẩm và hiển thị
            orderDetails.forEach((order, index) => {
              const product = orderProducts[index]; // Lấy sản phẩm tương ứng
              const formattedPrice = parseInt(product.gia).toLocaleString();
              // Tạo phần tử HTML cho mỗi sản phẩm
              const productHTML = `
                <div class="row justify-content-between mb-3">
                  <div class="col-auto col-md-7">
                    <div class="media flex-column flex-sm-row">
                      <img class="img-fluid" src="../../QUANLI/ASSETS/img/IMG-Product/${product.hinhanh}" width="62" height="62" alt="Product Image">
                      <div class="media-body my-auto">
                        <div class="row">
                          <div class="col-auto">
                          
                          
                            <p class="mb-0"><b><a href="detailproduct.php?id=${product.masanpham}">${product.tensanpham}</a></b></p>
                            <small class="text-muted">(Đảm bảo chất lượng)</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="pl-0 flex-sm-col col-auto my-auto">
                    <p class="boxed-1">${order.soluong}</p>
                  </div>
                  <div class="pl-0 flex-sm-col col-auto my-auto">
                    <p><b>${formattedPrice}đ</b></p>
                  </div>
                </div>
              `;

              // Thêm sản phẩm vào modal
              productDetails.innerHTML += productHTML;
            });
          } else {
            console.error("Lỗi:", data.message);
            document.getElementById("modalOrderDetails").textContent = "Không tìm thấy dữ liệu đơn hàng.";
          }
        });
    });
  });
});


</script>


<!-- GỬI ĐÁNH GIÁ -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Bắt sự kiện khi bấm nút "Gửi đánh giá"
    document.querySelectorAll('.open-evaluate-modal').forEach(function (button) {
        button.addEventListener('click', function () {
            // Lấy dữ liệu từ thuộc tính data-*
            const idPrd = this.getAttribute('data-idprd');
            const idOrder = this.getAttribute('data-idorder');
            const idUsername = this.getAttribute('data-idusername');

            // Gán vào các input ẩn trong modal (nếu cần)
            document.getElementById('modal-idprd').value = idPrd;
            document.getElementById('modal-idorder').value = idOrder;
            document.getElementById('modal-idusername').value = idUsername;

            console.log('idPrd:', idPrd);
            console.log('idOrder:', idOrder);
            console.log('idUsername:', idUsername);
        });
    });
});

</script>





<!-- THÔNG BÁO -->
<script>
  // Đợi 3 giây sau khi tải trang
  setTimeout(function() {
  const alerts = document.getElementsByClassName('myAlert');
  for (let i = 0; i < alerts.length; i++) {
    alerts[i].style.display = 'none';
  }
}, 2000);

</script>

<!-- CHUYỂN TRANG -->
<script>
  // Lấy tham số "tab" từ URL
  const urlParams = new URLSearchParams(window.location.search);
  const activeTab = urlParams.get('tab');

  // Kích hoạt tab tương ứng nếu tham số "tab" được truyền
  if (activeTab === 'update') {
    // Kích hoạt tab Update
    document.querySelector('#v-tabs-changeInf-tab').classList.add('active');
    document.querySelector('#v-tabs-home-tab').classList.remove('active');

    // Hiển thị nội dung tab Đăng ký
    document.querySelector('#v-tabs-changeInf').classList.add('active', 'show');
    document.querySelector('#v-tabs-home').classList.remove('active', 'show');
  }
  else if(activeTab === 'address')
  {
    // Kích hoạt tab address
    document.querySelector('#v-tabs-address-tab').classList.add('active');
    document.querySelector('#v-tabs-home-tab').classList.remove('active');

    // Hiển thị nội dung tab địa chỉ
    document.querySelector('#v-tabs-address').classList.add('active', 'show');
    document.querySelector('#v-tabs-home').classList.remove('active', 'show');

  }
  else if(activeTab === 'password')
  {
    // Kích hoạt tab password
    document.querySelector('#v-tabs-changePass-tab').classList.add('active');
    document.querySelector('#v-tabs-home-tab').classList.remove('active');

    // Hiển thị nội dung tab mật khẩu
    document.querySelector('#v-tabs-changePass').classList.add('active', 'show');
    document.querySelector('#v-tabs-home').classList.remove('active', 'show');
  }
  else if(activeTab === 'order')
  {
    // Kích hoạt tab password
    document.querySelector('#v-tabs-order-tab').classList.add('active');
    document.querySelector('#v-tabs-home-tab').classList.remove('active');

    // Hiển thị nội dung tab mật khẩu
    document.querySelector('#v-tabs-order').classList.add('active', 'show');
    document.querySelector('#v-tabs-home').classList.remove('active', 'show');

  }
  else if(activeTab === 'evalue')
  {
    // Kích hoạt tab password
    document.querySelector('#v-tabs-evalue-tab').classList.add('active');
    document.querySelector('#v-tabs-home-tab').classList.remove('active');

    // Hiển thị nội dung tab mật khẩu
    document.querySelector('#v-tabs-evalue').classList.add('active', 'show');
    document.querySelector('#v-tabs-home').classList.remove('active', 'show');

  }
</script>



<script>
    // Initialization for ES Users
import { Tab, initMDB } from "mdb-ui-kit";

initMDB({ Tab });
</script>
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.umd.min.js"
></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<?php }
else {
    header("Location:../php/formLogin-Register.php");
    exit();
} ?>