<?php 
session_start();
if(!isset($_SESSION['username'])) {
require_once '../MDB/MDB.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../ASSETS/css/formLogin-Register.css">
    <link rel="stylesheet" href="../ASSETS/css/reset.css">
    <link rel="stylesheet" href="../ASSETS/font/fontawesome/css/all.min.css">
</head>

<!-- Pills navs -->
<ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="tab-login" data-mdb-pill-init href="#pills-login" role="tab"
      aria-controls="pills-login" aria-selected="true">Đăng nhập</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="tab-register" data-mdb-pill-init href="#pills-register" role="tab"
      aria-controls="pills-register" aria-selected="false">Đăng ký</a>
  </li>
</ul>
<!-- Pills navs -->

<!-- Pills content -->

<!-- LOGIN -->
<div class="tab-content">
  <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
  <div class="text-center mb-3 listIcon">
        <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
          <i class="fab fa-facebook-f"></i>
        </button>

        <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
          <i class="fab fa-google"></i>
        </button>

        <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
          <i class="fab fa-twitter"></i>
        </button>

        <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
          <i class="fab fa-github"></i>
        </button>
      </div>

    <form action="../services/userServices.php" method="post">
      <!-- Username input -->
      <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" id="loginName" class="form-control" name="username" />
        <label class="form-label" for="loginName" >Email hoặc Tài khoản</label>
      </div>
      <!-- Password input -->
      <div data-mdb-input-init class="form-outline mb-4">
        <input type="password" id="loginPassword" class="form-control" name="password" />
        <label class="form-label" for="loginPassword">Mật khẩu</label>
      </div>

      <!-- 2 column grid layout -->
      <div class="row mb-4">
        <div style="width: 100%;" class="col-md-6 d-flex justify-content-center">
          <!-- Simple link -->
          <a href="#!">Quên mật khẩu?</a>
        </div>
      </div>

      <!-- Submit button -->
      <button type="submit" name="btnLogin" class="btn btn-primary btn-block mb-4">Đăng nhâp</button>
    </form>
  </div>




<a href="../server.php" style = "color:#fff">Trang chủ</a>



<?php if(isset($_GET['error'])){ ?>

  <div class="alert alert-danger" role="alert">
   <?php echo $_GET['error']; ?>
  </div>

<?php } ?>


<?php if(isset($_GET['success'])){ ?>

  <div class="alert alert-success" role="alert">
  <?php echo $_GET['success']; ?>
  </div>



<?php } ?>

  <!-- REGISTẺR -->
  <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
    <form action="../services/userServices.php" method="post">
      <div class="text-center mb-3 listIcon">
 
        <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
          <i class="fab fa-facebook-f"></i>
        </button>

        <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
          <i class="fab fa-google"></i>
        </button>

        <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
          <i class="fab fa-twitter"></i>
        </button>

        <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
          <i class="fab fa-github"></i>
        </button>
      </div>

  
      <!-- Name input -->
      <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" id="registerName" class="form-control" name="fullname"/>
        <label class="form-label" for="registerName">Họ tên</label>
      </div>

      <!-- Username input -->
      <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" id="registerUsername" class="form-control" name="username" />
        <label class="form-label" for="registerUsername">Tài khoản</label>
      </div>

      <!-- Email input -->
      <div data-mdb-input-init class="form-outline mb-4">
        <input type="email" id="registerEmail" class="form-control" name="email" />
        <label class="form-label" for="registerEmail">Email</label>
      </div>

      <!-- Password input -->
      <div data-mdb-input-init class="form-outline mb-4">
        <input type="password" id="registerPassword" class="form-control" name="password" />
        <label class="form-label" for="registerPassword">Mật khẩu</label>
      </div>

      <!-- Repeat Password input -->
      <div data-mdb-input-init class="form-outline mb-4">
        <input type="password" id="registerRepeatPassword" class="form-control" name="repeatPass"/>
        <label class="form-label" for="registerRepeatPassword">Nhập lại mật khẩu</label>
      </div>

      <!-- Submit button -->
      <button type="submit" name="btnRegister" class="btn btn-primary btn-block mb-3">Đăng ký</button>
    </form>
  </div>
</div>
<!-- Pills content -->

</html>




<script>
// Lắng nghe sự kiện chuyển sang tab Đăng nhập
document.querySelector('#tab-login').addEventListener('click', function() {
  // Cập nhật URL thành URL gốc mà không tham số nào
  history.replaceState(null, '', 'http://localhost/BANPHIMCO/KHACHHANG/php/formLogin-Register.php');
  // Tải lại trang
  window.location.reload();
});
</script>



<script>
  // Lấy tham số "tab" từ URL
  const urlParams = new URLSearchParams(window.location.search);
  const activeTab = urlParams.get('tab');

  // Kích hoạt tab tương ứng nếu tham số "tab" được truyền
  if (activeTab === 'register') {
    // Kích hoạt tab Đăng ký
    document.querySelector('#tab-register').classList.add('active');
    document.querySelector('#tab-login').classList.remove('active');

    // Hiển thị nội dung tab Đăng ký
    document.querySelector('#pills-register').classList.add('show', 'active');
    document.querySelector('#pills-login').classList.remove('show', 'active');
  }
</script>



    <!-- MDB -->
    <script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.1.0/mdb.umd.min.js"
></script>

<?php } else {
 header("Location:../server.php");
 exit();
} ?>