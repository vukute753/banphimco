<?php
require_once 'conn.php'; 

//select
function getAllUser($conn, $username){
    $select = "SELECT * FROM khachhang WHERE tendangnhap = '$username' ";
    $result = mysqli_query($conn, $select);
    return $result;
}


function getIdUsername($conn, $username){
    $select = "SELECT makhachhang FROM khachhang WHERE tendangnhap = '$username' ";
    $result = mysqli_query($conn, $select);
    return $result;
}

function getAllOrder($conn, $idUsername){
    $select = "SELECT * FROM donhang WHERE makhachhang = '$idUsername' ORDER BY madonhang DESC ";
    $result = mysqli_query($conn, $select);
    return $result;
}

function getAllOrderLimit($conn, $idUsername, $getlocation, $prd_dsp){
    $select = "SELECT * FROM donhang WHERE makhachhang='$idUsername' ORDER BY madonhang DESC LIMIT $getlocation, $prd_dsp";
    $result = mysqli_query($conn, $select);
    return $result;
}
function getOrderDetail($conn, $idOrder){
    $select = "SELECT * FROM chitietdonhang WHERE madonhang='$idOrder'";
    $result = mysqli_query($conn, $select);
    return $result;
}
function getAllProduct($conn, $idPrd){
    $select = "SELECT * FROM sanpham WHERE masanpham='$idPrd'";
    $result = mysqli_query($conn, $select);
    return $result;
}
function getOrder($conn, $idOrder){
    $select = "SELECT * FROM donhang WHERE madonhang = '$idOrder'";
    $result = mysqli_query($conn, $select);
    return $result;
}
function getOrderEvalue($conn, $status, $idUsername){
    $select = "SELECT * FROM donhang WHERE trangthai = '$status' AND makhachhang='$idUsername'";
    $result = mysqli_query($conn, $select);
    return $result;
}
function getAllOrderDetailEvalue($conn, $idOrder, $statusEvalue){
    $select = "SELECT * FROM chitietdonhang WHERE madonhang='$idOrder' AND trangthaidanhgia = '$statusEvalue'";
    $result = mysqli_query($conn, $select);
    return $result;
}
function getOrderDetailEvalue($conn, $idOrder, $statusEvalue, $getlocation, $prd_dsp){
    $select = "SELECT * FROM chitietdonhang WHERE madonhang='$idOrder' AND trangthaidanhgia = '$statusEvalue' ORDER BY madonhang DESC LIMIT $getlocation, $prd_dsp";
    $result = mysqli_query($conn, $select);
    return $result;
}

function getProductsNotEvaluated($conn, $idUsername, $statusOrder, $statusEvalue, $getlocation, $prd_dsp) {
    $select = "
        SELECT ctdh.*, sp.tensanpham, sp.hinhanh, dh.ngaydathang
        FROM chitietdonhang ctdh
        JOIN sanpham sp ON ctdh.masanpham = sp.masanpham
        JOIN donhang dh ON ctdh.madonhang = dh.madonhang
        WHERE dh.makhachhang = '$idUsername' 
          AND dh.trangthai = '$statusOrder'
          AND ctdh.trangthaidanhgia = '$statusEvalue'
        ORDER BY dh.ngaydathang DESC
        LIMIT $getlocation, $prd_dsp
    ";
    $result = mysqli_query($conn, $select);
    return $result;
}




$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['madonhang'])) {
    $idOrder = $data['madonhang'];

    // Thực hiện truy vấn để lấy chi tiết đơn hàng
    $getOrderDetail = getOrderDetail($conn, $idOrder);
    $num = mysqli_num_rows($getOrderDetail);

    $getOrder = getOrder($conn, $idOrder);
    $order = mysqli_fetch_assoc($getOrder);
    // Kiểm tra nếu kết quả truy vấn có dữ liệu
    if ($num) {

        $orderDetails = []; // Mảng để lưu tất cả chi tiết sản phẩm
        $orderProducts = []; // Mảng để lưu chi tiết sản phẩm bổ sung
        
        // Duyệt qua tất cả các dòng kết quả đơn hàng
        while ($OrderDetail = mysqli_fetch_assoc($getOrderDetail)) {
            $orderDetails[] = $OrderDetail; // Thêm từng sản phẩm vào mảng orderDetails

            $idPrd = $OrderDetail['masanpham']; // Lấy mã sản phẩm từ mỗi chi tiết đơn hàng

            // Truy vấn để lấy thông tin sản phẩm
            $getAllPrd = getAllProduct($conn, $idPrd);
            while($prd = mysqli_fetch_assoc($getAllPrd)) {
                $orderProducts[] = $prd; // Thêm sản phẩm vào mảng orderProducts
            }
        }

        // Gửi phản hồi JSON kèm dữ liệu đơn hàng
        echo json_encode([
            'success' => true,
            'message' => 'Cập nhật thành công.',
            'madonhang' => $idOrder,
            'orderDetail' => $orderDetails,  // Trả về chi tiết đơn hàng
            'orderProduct' => $orderProducts,
            'order' => $order // Trả về thông tin sản phẩm
        ]);
    } else {
        // Trường hợp không tìm thấy đơn hàng
        echo json_encode([
            'success' => false,
            'message' => 'Không tìm thấy đơn hàng.'
        ]);
    }
} else if(isset($_POST['btnRating'])) {

    $idPrd = $_POST['idPrd'];
    $idUsername = $_POST['idUsername'];
    $idOrder = $_POST['idOrder'];
    $review = $_POST['review'];
    $rating = $_POST['rating'];
    $img = $_FILES['prdImage'];

    if(!empty($_FILES['prdImage']['name'])){
    $hinhanh = $_FILES['prdImage']['name'];
    move_uploaded_file($_FILES['prdImage']['tmp_name'], "../../QUANLI//ASSETS/img/IMG-Product/" . $hinhanh);
    }

    echo $idPrd;
    echo '<br>';
    echo $idUsername;
    echo '<br>';
    echo $idOrder;
    echo '<br>';
    echo $review;
    echo '<br>';
    echo $rating;
    echo '<br>';
    print_r($img);
    echo '<br>';

     // Lưu đánh giá vào cơ sở dữ liệu
     $insertRating = " INSERT INTO danhgiasanpham (makhachhang, masanpham, madonhang, diemdanhgia, noidung, ngaytao, hinhanh)
     VALUES ('$idUsername', '$idPrd', '$idOrder', '$rating', '$review', CURDATE(), '$hinhanh')";
     $resultRating = mysqli_query($conn, $insertRating);

     //Cập nhật trạng thái đánh giá cho sản phẩm
     $updateOrderDetail = "UPDATE chitietdonhang SET trangthaidanhgia = '1' WHERE madonhang='$idOrder' AND masanpham='$idPrd'";
     $resultOrderDetail = mysqli_query($conn, $updateOrderDetail);
     header("location:../php/profile.php?tab=evalue&success=Gửi đánh giá thành công");
     exit();

}










?>