<?php 
require_once '../services/cartServices.php';
if(isset($_SESSION['username'])){

    $idUsername = $getIdUsername['makhachhang']; //makhachhang

    $getCart = getAllCart_IdUsername($conn, $idUsername);
    $num_row_cart = mysqli_num_rows($getCart);
    

?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../ASSETS/css/base.css">
    <link rel="stylesheet" type="text/css" href="../ASSETS/css/reset.css">
    <link rel="stylesheet" type="text/css" href="../ASSETS/css/cart.css">
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
                                <li class="breadcrumb-item font-weight-bold"><a class="black-text text-uppercase active-2" href="#"><span class="mr-md-3 mr-1">Giỏ hàng</span></a><i class="fa fa-angle-double-right text-uppercase " aria-hidden="true"></i></li>
                                <li class="breadcrumb-item font-weight-bold"><a class="black-text text-uppercase " href="payment.php"><span class="mr-md-3 mr-1">Thanh toán</span></a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            
                <div class="row justify-content-around">
                    <div class="" style = "width: 90%;">
                        <div class="card border-0 ">
                            <div class="card-header card-2" style = "margin: 0 0 10px 0 !important;">
                                <p class="card-text text-muted mt-md-4  mb-2 space">GIỎ HÀNG <span class=" small text-muted ml-2 cursor-pointer">(Điều chỉnh giỏ hàng)</span> </p>
                                <hr class="my-2">
                            </div>
                            <div class="card-body pt-0">
                                <?php if ($num_row_cart){
                                     $totalPriceAll = 0;
                                     $totalQuatifyAll = 0;
                                    ?>
                                   
                                    <?php while ($row = mysqli_fetch_assoc($getCart)) {
                                        $idPrd = $row['masanpham']; // Mã sản phẩm
                                        $quantify = $row['soluong']; // Số lượng
                                        $getPrd = mysqli_fetch_assoc(getAllProduct_IdPrd($conn, $idPrd));
                                        $namePrd = $getPrd['tensanpham'];
                                        $image = $getPrd['hinhanh'];
                                        $price = $row['soluong'] * $getPrd['gia']; // Giá sản phẩm
                                        $totalPriceAll += $price;
                                        $totalQuatifyAll += $quantify;
                                        ?>
                                        <div class="row rowPrd" style="margin: 10px 0;">
                                            <div class="col-auto col-md-7 width60">
                                                <div class="media flex-column flex-sm-row">
                                                    <img class="img-fluid" src="../../QUANLI/ASSETS/img/IMG-Product/<?php echo $image; ?>" width="62" height="62">
                                                    <div class="media-body my-auto">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <p class="mb-0"><b><?php echo $namePrd; ?></b></p>
                                                                <small class="text-muted">Đảm bảo chất lượng</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex" style="align-items: center;">
                                                <button class="decrement btn btn-link px-2">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <p style="display:none" class="idPrd"><?php echo $idPrd; ?></p>
                                                <input min=1 style="width:70px;" class="quantityInput form-control form-control-sm" min="0" value="<?php echo $quantify; ?>" type="number" />
                                                <p style="display:none" class="pricePrd"><?php echo $getPrd['gia']; ?></p>
                                                <button class="increment btn btn-link px-2">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                                <div style="margin-left:50px; width: 200px;" class="pl-0 flex-sm-col col-auto my-auto">
                                                    <p style="margin:0;"><b><?php echo number_format($price); ?>đ</b></p>
                                                </div>

                                                <div class="col-md-1 col-lg-1 col-xl-1 text-end delete">
                                                    <p style="display:none" class = "deletePrd" ><?php echo $idPrd; ?></p>
                                                    <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                                </div>

                                            </div>

                                            

                                        </div>
                                    <?php } 
                                    } else{
                                    echo '<p>KHÔNG CÓ SẢN PHẨM NÀO TRONG GIỎ HÀNG CỦA BẠN<p>';
                                }  ?>
                                        <?php if(isset($_GET['success'])) { ?>
                                            <div class="alert alert-primary" role="alert">
                                                <?php echo $_GET['success'] ;?>
                                                </div>

                                            <?php  } ?>
                                
                                            <?php if(!empty($totalQuatifyAll)){ ?>
                                        <div class="card-body p-4" style="width: 100%;">
                                            <h6>Tổng số lượng: <span class="totalQuantity"><?php if(!empty($totalQuatifyAll)){ echo $totalQuatifyAll; } ?></span></h6>
                                            <h6>Tổng giá: <span class="totalPrice"><?php if(!empty($totalPriceAll)){ echo number_format($totalPriceAll); }?>đ</span></h6>
                                        </div>
                                        <?php } ?>
                              

                            
                                <div class="row mb-5 mt-4 ">
                                    <a <?php if(!$num_row_cart){ ?> href="#" <?php } else { ?> href="payment.php" <?php } ?> class="col-md-7 col-lg-6 mx-auto"><button type="button" class="btn btn-block btn-outline-primary btn-lg">Thanh toán</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>



// Lấy tất cả các sản phẩm
document.querySelectorAll('.rowPrd').forEach(function(productRow) {
    const quantityInput = productRow.querySelector('.quantityInput');
    const decrementButton = productRow.querySelector('.decrement');
    const incrementButton = productRow.querySelector('.increment');
  
    const productId = productRow.querySelector('.idPrd').textContent;
    const pricePerUnit = parseFloat(productRow.querySelector('.pricePrd').textContent);
    let totalPriceElement = productRow.querySelector('div.my-auto > p > b');
    
    let quantity = parseInt(quantityInput.value);


   

    function sendDataToServer(quantity) {
        // AJAX request để gửi dữ liệu
        
        console.log({ idPrd: productId, quantity: quantity });
        fetch('../services/cartUpdateQuantify.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ idPrd: productId, quantity: quantity }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('Cập nhật thành công:', data);
            } else {
                console.error('Lỗi:', data.message);
            }
        })
        .catch(error => console.error('Lỗi mạng:', error));
    }



   





    // Hàm cập nhật giá trị và tổng giá
    function updateQuantity() {
        quantity = parseInt(quantityInput.value) || 0;
        const totalPrice = pricePerUnit * quantity;
        totalPriceElement.textContent = new Intl.NumberFormat().format(totalPrice) + 'đ';
        console.log(`Sản phẩm ID: ${productId}, Số lượng: ${quantity}, Tổng giá: ${totalPrice}`);
        sendDataToServer(quantity);
    }

    // Lắng nghe sự kiện thay đổi trực tiếp trong input
    quantityInput.addEventListener('input', updateQuantity);

    // Lắng nghe sự kiện click vào nút giảm
    decrementButton.addEventListener('click', function() {
        quantityInput.stepDown();
        updateQuantity();
    });

    // Lắng nghe sự kiện click vào nút tăng
    incrementButton.addEventListener('click', function() {
        quantityInput.stepUp();
        updateQuantity();
    });

  

});


// Lắng nghe sự kiện click vào thùng rác
document.querySelectorAll('.delete a').forEach(function(deleteLink) {
    deleteLink.addEventListener('click', function(event) {

        // Ngừng sự kiện mặc định (nếu có)
        event.preventDefault();

        const productId = deleteLink.closest('.delete').querySelector('.deletePrd').textContent;
        console.log('Sản phẩm cần xóa ID:', productId);



        // Hàm gửi yêu cầu xóa sản phẩm lên server
        function sendDeleteRequest(productId) {
            fetch('../services/cartUpdateQuantify.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ deletePrd:productId })  // Gửi dữ liệu dưới dạng JSON
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('Xóa sản phẩm thành công:', data);
                } else {
                    console.error('Lỗi khi xóa sản phẩm:', data.message);
                }
            })
            .catch(error => console.error('Lỗi mạng:', error));
        }



        // Xử lý sự kiện click
        console.log('Thùng rác đã được click!');

        // Bạn có thể thực hiện hành động xóa sản phẩm hoặc phần tử nào đó ở đây
        const productRow = deleteLink.closest('.rowPrd');  // Tìm dòng sản phẩm chứa thùng rác
        if (productRow) {
            productRow.remove();  // Xóa dòng sản phẩm khỏi DOM (ví dụ)
            // Thực hiện thêm hành động khác nếu cần (ví dụ gọi API để xóa sản phẩm khỏi giỏ hàng)
            sendDeleteRequest(productId);
        }

        
    });
});

</script>



<script>

document.addEventListener('DOMContentLoaded', function() {
    // Lắng nghe sự kiện thay đổi giá trị số lượng
    const quantityInputs = document.querySelectorAll('.quantityInput');
    quantityInputs.forEach(input => {
        input.addEventListener('change', updateCartTotal);
    });

    // Lắng nghe sự kiện click vào nút tăng/giảm số lượng
    const incrementBtns = document.querySelectorAll('.increment');
    const decrementBtns = document.querySelectorAll('.decrement');

    incrementBtns.forEach(btn => {
        btn.addEventListener('click', updateCartTotal);
    });

    decrementBtns.forEach(btn => {
        btn.addEventListener('click', updateCartTotal);
    });

    // Hàm tính tổng số lượng và tổng giá
    function updateCartTotal() {
        let totalQuantity = 0;
        let totalPrice = 0;

        // Lặp qua tất cả các sản phẩm trong giỏ hàng
        const rows = document.querySelectorAll('.rowPrd');
        rows.forEach(row => {
            const quantity = row.querySelector('.quantityInput').value;
            const pricePerProduct = row.querySelector('.pricePrd').textContent;
            totalQuantity += parseInt(quantity);
            totalPrice += parseInt(quantity) * parseInt(pricePerProduct);
        });

        // Cập nhật lại thông tin tổng số lượng và tổng giá
        document.querySelector('.totalQuantity').textContent = totalQuantity;
        document.querySelector('.totalPrice').textContent = totalPrice.toLocaleString().replace(/\./g, ',') + 'đ';
    }
});


    
</script>


<?php } 

else{
    header("Location:../php/formLogin-Register.php");
    exit();
}


?>