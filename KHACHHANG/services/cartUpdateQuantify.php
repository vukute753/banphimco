<?php
session_start();
require_once 'conn.php'; 
$username = $_SESSION['username'];



$data = json_decode(file_get_contents("php://input"), true);



if (isset($data['idPrd'], $data['quantity'])) {


    $idPrd = ($data['idPrd']);
    $quantity = ($data['quantity']);

    // Kiểm tra dữ liệu
    if ($quantity < 0) {
        echo json_encode(['success' => false, 'message' => 'Số lượng không hợp lệ.']);
        exit;
    }

    //Lấy giá sản phẩm
    $selectPrd = "SELECT * FROM sanpham WHERE masanpham = '$idPrd' ";
    $resultPrd = mysqli_query($conn, $selectPrd);

    $getPrd = mysqli_fetch_assoc($resultPrd);
    $getNum = mysqli_num_rows($resultPrd);
    $pricePrd = $getPrd['gia'];

    $totalPrice = $pricePrd * $quantity;

    //Lấy mã khách hàng
    $selectUsername = "SELECT * FROM khachhang WHERE tendangnhap = '$username' ";
    $resultUsername = mysqli_query($conn, $selectUsername);

    $getUsername = mysqli_fetch_assoc($resultUsername);
    $idUsername = $getUsername['makhachhang'];


    // Thực hiện cập nhật CSDL
    $updateCart = "UPDATE giohang SET soluong = $quantity, gia = $totalPrice WHERE masanpham = '$idPrd' AND makhachhang = '$idUsername'";
    $resultCart = mysqli_query($conn, $updateCart);


    echo json_encode(['success' => true, 'message' => 'Cập nhật thành công.']);
  

 
   

    
}

else if (isset($data['deletePrd'])) {
    $deletePrd = ($data['deletePrd']);


    //Lấy mã khách hàng
    $selectUsername = "SELECT * FROM khachhang WHERE tendangnhap = '$username' ";
    $resultUsername = mysqli_query($conn, $selectUsername);

    $getUsername = mysqli_fetch_assoc($resultUsername);
    $idUsername = $getUsername['makhachhang'];

    $deleteId = "DELETE FROM giohang WHERE makhachhang = '$idUsername' AND masanpham = '$deletePrd' ";
    $result = mysqli_query($conn, $deleteId);

    echo json_encode(['success' => true, 'message' => 'Cập nhật thành công.']);
}


else {
    echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ.']);
}
?>
