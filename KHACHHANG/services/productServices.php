
<?php

//PRODUCT
function getAll($conn){
    $select = "SELECT * FROM sanpham";
    $result = mysqli_query($conn, $select);
    return $result;
}
//Limit
function getLimit($conn, $getlocation, $prd_dsp){
    $select = "SELECT * FROM sanpham ORDER BY masanpham DESC LIMIT $getlocation, $prd_dsp";
    $result = mysqli_query($conn, $select);
    return $result;
}
function getLimitPrice($conn, $min, $max){
    $select = "SELECT * FROM sanpham WHERE gia BETWEEN $min AND $max ORDER BY gia DESC";
    $result = mysqli_query($conn, $select);
    return $result;
}

//Search
function searchPrd($conn, $value){
        $select = "SELECT * FROM `sanpham` 
            WHERE LOWER(REPLACE(tensanpham, ' ', '')) LIKE LOWER(REPLACE('%$value%', ' ', '')) 
            ORDER BY masanpham DESC";
    $result = mysqli_query($conn, $select);
    return $result;
}

//Type
function getType1($conn){
    $selectType1 = "SELECT * FROM sanpham WHERE loai=1 ORDER BY masanpham DESC LIMIT 0,5";
    $result = mysqli_query($conn, $selectType1);
    return $result;
}

function getType2($conn){
    $selectType2 = "SELECT * FROM sanpham WHERE loai=2 ORDER BY masanpham DESC LIMIT 0,5";
    $result = mysqli_query($conn, $selectType2);
    return $result;
}

function getType3($conn){
    $selectType3 = "SELECT * FROM sanpham WHERE loai=3 ORDER BY masanpham DESC LIMIT 0,5";
    $result = mysqli_query($conn, $selectType3);
    return $result;
}

function getType4($conn){
    $selectType4 = "SELECT * FROM sanpham WHERE loai=4 ORDER BY masanpham DESC LIMIT 0,5";
    $result = mysqli_query($conn, $selectType4);
    return $result;
}

function getType6($conn){
    $selectType6 = "SELECT * FROM sanpham WHERE loai=6 ORDER BY masanpham DESC LIMIT 0,5";
    $result = mysqli_query($conn, $selectType6);
    return $result;
}

function getType7($conn){
    $selectType7 = "SELECT * FROM sanpham WHERE loai=7 ORDER BY masanpham DESC LIMIT 0,5";
    $result = mysqli_query($conn, $selectType7);
    return $result;
}

function getType13($conn){
    $selectType13 = "SELECT * FROM sanpham WHERE loai=13 ORDER BY masanpham DESC LIMIT 0,5";
    $result = mysqli_query($conn, $selectType13);
    return $result;
}
//Id
function getPrdId($conn, $id){
    $select = "SELECT * FROM sanpham WHERE masanpham ='$id' ";
    $result = mysqli_query($conn, $select);
    return $result;
}
function getEvalue($conn, $idPrd){
    $select = "SELECT * FROM danhgiasanpham WHERE masanpham ='$idPrd' ";
    $result = mysqli_query($conn, $select);
    return $result;
}
function getEvalueRating($conn, $idPrd){
    $select = "SELECT * FROM danhgiasanpham WHERE masanpham ='$idPrd' ";
    $result = mysqli_query($conn, $select);
    return $result;
}
function getUsername($conn, $idUsername){
    $select = "SELECT * FROM khachhang WHERE makhachhang ='$idUsername' ";
    $result = mysqli_query($conn, $select);
    return $result;
}
//Handle search
function normalizeString($string) {
    // Bỏ dấu tiếng Việt
    $string = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $string);

    // Loại bỏ ký tự đặc biệt
    $string = preg_replace('/[^a-zA-Z0-9\s]/', '', $string);

    // Xóa khoảng trắng
    $string = str_replace(' ', '', $string);

    // Chuyển về chữ thường
    $string = mb_strtolower($string, 'UTF-8');

    return $string;
}

if(isset($_POST['btnPrice'])){
    $minprice = $_POST['minprice'];
    $maxprice = $_POST['maxprice'];


}





















?>