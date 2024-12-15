<?php
session_start(); 
require_once 'conn.php'; 


$username = $_SESSION['username'];
//get
function getIdUsername($conn, $username){
    $select = "SELECT makhachhang FROM khachhang WHERE tendangnhap = '$username' ";
    $result = mysqli_query($conn, $select);
    return $result;
}

function getPricePrd($conn, $idPrd){
    $select = "SELECT gia FROM sanpham WHERE masanpham = '$idPrd' ";
    $result = mysqli_query($conn, $select);
    return $result;
}
function getAllCart_IdUsername($conn, $idUsername){
    $select = "SELECT * FROM giohang WHERE makhachhang = '$idUsername' ";
    $result = mysqli_query($conn, $select);
    return $result;
}
function getAllCart_IdUsername_IdPrd($conn, $idUsername, $idPrd){
    $select = "SELECT * FROM giohang WHERE makhachhang = '$idUsername' AND masanpham = '$idPrd'";
    $result = mysqli_query($conn, $select);
    return $result;
}
function getAllProduct_IdPrd($conn, $idPrd){
    $select = "SELECT * FROM sanpham WHERE masanpham = '$idPrd' ";
    $result = mysqli_query($conn, $select);
    return $result;
}
function getAllOrder($conn, $idUsername){
    $select = "SELECT * FROM donhang WHERE makhachhang = '$idUsername' ORDER BY madonhang DESC ";
    $result = mysqli_query($conn, $select);
    return $result;
}

//insert
function addCart($conn, $idUsername, $idPrd, $quantify, $totalPrice){
   $insert = "INSERT INTO giohang (makhachhang, masanpham, soluong, gia) VALUES ('$idUsername', '$idPrd', $quantify, $totalPrice)";
   $result = mysqli_query($conn, $insert);
}
function addOrder($conn, $idUsername, $totalPrice, $method, $totalQuantifyAll){
    $insert = "INSERT INTO donhang (makhachhang, ngaydathang, tonggia, phuongthucthanhtoan, tongsanpham) VALUES ('$idUsername', CURDATE(), $totalPrice, '$method',  $totalQuantifyAll)";
    $result = mysqli_query($conn, $insert);
}

function addOrderDetail($conn, $idOrder, $idPrd, $quantify){
    $insert = "INSERT INTO chitietdonhang (madonhang, masanpham, soluong, trangthaidanhgia) VALUES ('$idOrder', '$idPrd', $quantify, '0')";
    $result = mysqli_query($conn, $insert);
 }

//update
function updateQuantifyCart($conn, $idUsername , $idPrd, $totalQuantify){
    $update = "UPDATE giohang SET soluong = $totalQuantify WHERE makhachhang = '$idUsername'  AND masanpham = '$idPrd'";
    $result = mysqli_query($conn, $update);
}



//delete
function deleteCart($conn, $idUsername){
    $delete = "DELETE FROM giohang WHERE makhachhang = '$idUsername'";
    $result = mysqli_query($conn, $delete);
}




$getIdUsername = mysqli_fetch_assoc(getIdUsername($conn, $username)); 


if(isset($_POST["btnAddCart"])){
    
    
    $idPrd = $_GET['id']; //masanpham
    $quantify = $_POST['quantify']; //soluong

    
    $idUsername = $getIdUsername['makhachhang']; //makhachhang


    $getPrice = mysqli_fetch_assoc(getPricePrd($conn, $idPrd));
    $totalPrice = $getPrice['gia'] * $quantify; //tonggia


    //kiem tra san pham da co trong gio hang chua
    $getPrd = mysqli_fetch_assoc(getAllCart_IdUsername_IdPrd($conn, $idUsername, $idPrd));
    $getNumPrd = mysqli_num_rows(getAllCart_IdUsername_IdPrd($conn, $idUsername, $idPrd)); 
    if($getNumPrd){
        $totalQuantify = $quantify + $getPrd['soluong'] ;
        updateQuantifyCart($conn, $idUsername , $idPrd, $totalQuantify);
        header("Location:../php/detailProduct.php?id=$idPrd&success=Thêm sản phẩm thành công");
        exit();
    }
    else{
        addCart($conn, $idUsername, $idPrd, $quantify, $totalPrice);
        header("Location:../php/detailProduct.php?id=$idPrd&success=Thêm sản phẩm thành công");
        exit();
    }


    
            
}

else if(isset($_POST["btnPayment"])){

    $totalPriceAll = $_POST['totalPriceAll'];
    $totalQuantifyAll = $_POST['totalQuatifyAll'];
    $method = $_POST['method'];
    
    
    $idUsername = $getIdUsername['makhachhang']; //makhachhang

    

    addOrder($conn, $idUsername, $totalPriceAll, $method, $totalQuantifyAll);

    $getOrder = mysqli_fetch_assoc(getAllOrder($conn, $idUsername));
    $idOrder = $getOrder['madonhang'];


    $idPrdArray = $_POST['idPrd']; // Mảng ID sản phẩm
    $quantifyArray = $_POST['quantify']; // Mảng số lượng sản phẩm

    // Kiểm tra dữ liệu đầu vào
    if (is_array($idPrdArray) && is_array($quantifyArray) && count($idPrdArray) === count($quantifyArray)) {
        foreach ($idPrdArray as $index => $idPrd) {
            $quantify = $quantifyArray[$index];
            addOrderDetail($conn, $idOrder, $idPrd, $quantify);
            
            
           
        }
        deleteCart($conn, $idUsername);
        header("Location:../php/cart.php?success=Thanh toán thành công");
            exit();
    } else {
        header("Location:../php/cart.php?error=Thanh toán thất bại");
            exit();
    }
    

    

    

 
        
  
}























?>