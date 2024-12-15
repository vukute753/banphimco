<?php
session_start(); 
require_once 'conn.php'; 

//KHACHHANG
//select
function getUsername($conn, $username){
    $select = "SELECT tendangnhap FROM khachhang WHERE tendangnhap = '$username' ";
    $result = mysqli_query($conn, $select);
    return $result;
}
function getPassword($conn, $password){
    $select = "SELECT matkhau FROM khachhang WHERE matkhau = '$password' ";
    $result = mysqli_query($conn, $select);
    return $result;
}
function getPassword_Username($conn, $username){
    $select = "SELECT matkhau FROM khachhang WHERE tendangnhap = '$username'";
    $result = mysqli_query($conn, $select);
    return $result;
}
function getPassword_Email($conn, $username){
    $select = "SELECT matkhau FROM khachhang WHERE email = '$username'";
    $result = mysqli_query($conn, $select);
    return $result;
}
function getUsername_Email($conn, $email){
    $select = "SELECT tendangnhap FROM khachhang WHERE email = '$email'";
    $result = mysqli_query($conn, $select);
    return $result;
}
function getEmail($conn, $email){
    $select = "SELECT email FROM khachhang WHERE email = '$email'";
    $result = mysqli_query($conn, $select);
    return $result;
}
function getNumberphone($conn, $numberphone){
    $select = "SELECT sodienthoai FROM khachhang WHERE sodienthoai = '$numberphone'";
    $result = mysqli_query($conn, $select);
    return $result;
}
function getAllNumberphone($conn, $numberphone, $username){
    $select = "SELECT sodienthoai 
               FROM khachhang 
               WHERE sodienthoai = '$numberphone' 
               AND tendangnhap != '$username'";
    $result = mysqli_query($conn, $select);
    return $result;
}
//insert
function addUser($conn, $fullname, $username, $password, $email )
{
    $addUser = "INSERT INTO khachhang(hoten, tendangnhap, matkhau, email, ngaytao)
                        VALUE ('$fullname', '$username', '$password', '$email', CURDATE())";
    $result = mysqli_query($conn, $addUser);
    return $result;
}
//update
function updateInf($conn, $username, $fullname, $numberphone, $gender)
    {
        $update_inf = "UPDATE khachhang 
                    SET hoten = '$fullname', sodienthoai = '$numberphone', gioitinh = '$gender' 
                    WHERE tendangnhap = '$username' ";
        return mysqli_query($conn, $update_inf);
    }
function updateAddress($conn, $username, $address)
    {
        $update_inf = "UPDATE khachhang 
                    SET diachi = '$address'
                    WHERE tendangnhap = '$username' ";
        return mysqli_query($conn, $update_inf);
    }
function updatePassword($conn, $username, $password)
    {
        $update_inf = "UPDATE khachhang 
                    SET matkhau = '$password'
                    WHERE tendangnhap = '$username' ";
        return mysqli_query($conn, $update_inf);
    }





//Handle 

function getSpecialCharacters() {
    // Danh sách các ký tự đặc biệt 
    return ['@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '=', '+', '{', '}', '[', ']', '|', '\\', ':', ';', '"', '\'', '<', '>', ',', '.', '/', '?', '!', '~', '`', '£', '€', '©', '®', '™'];
}


function validateString($string) { //check string

     // Lấy danh sách ký tự đặc biệt
     $specialChars = getSpecialCharacters();
    // Kiểm tra xem chuỗi có chứa ký tự đặc biệt trong danh sách không
    foreach ($specialChars as $char) {
        if (strpos($string, $char) !== false) {
            return "error0"; // Chứa ký tự đặc biệt
        }
    }

    // Kiểm tra chuỗi chỉ chứa số
    if (ctype_digit($string)) {
        return "error1";
    }

    // Kiểm tra độ dài nhỏ hơn 5
    if (strlen($string) < 5) {
        return "error2";
    }

    // Chuỗi hợp lệ
    return 1;
}

function checkLogin($conn, $username, $password){
    $getUsername = getUsername($conn, $username);
    $getEmail = getEmail($conn, $username);
    $getPassword_Username =getPassword_Username($conn, $username);
    $getPassword_Email =getPassword_Email($conn, $username);

    $result;

    if(!mysqli_num_rows($getUsername) || !mysqli_num_rows($getEmail)){ //kiểm tra Tài khoản hoặc Email đúng không
        $result = 'error0';
    }
    if(mysqli_num_rows($getUsername) || mysqli_num_rows($getEmail)){ //Nếu đúng(Tài khoản hoặc Email)

        $getPassword; //Biến lấy mật khẩu
        
        if(mysqli_num_rows($getUsername)){ //Kiểm tra mật khẩu nếu nhập Tài khoản
            $getPassword = $getPassword_Username; 
        }
        else{
            $getPassword = $getPassword_Email; //Kiểm tra mật khẩu nếu nhập Email
        }

        $pass = mysqli_fetch_assoc($getPassword); //Lấy mảng

        $check_pass = password_verify($password, $pass['matkhau']);//check mat khau

        if($check_pass === true){
            $result = 'success';
        }
        else{
            $result = 'error1';
        }
        
    }
return $result;

}






//REGISTER
if(isset($_POST['btnRegister'])){
    if(empty($_POST['fullname'])){
        header("Location:../php/formLogin-Register.php?tab=register&error=Chưa nhập họ tên");
    }
    if(empty($_POST['username'])){
        header("Location:../php/formLogin-Register.php?tab=register&error=Chưa nhập tên người dùng");
    }
    if(empty($_POST['email'])){
        header("Location:../php/formLogin-Register.php?tab=register&error=Chưa nhập email");
    }
    if(empty($_POST['password'])){
        header("Location:../php/formLogin-Register.php?tab=register&error=Chưa nhập mật khẩu");
    }
    if(empty($_POST['repeatPass'])){
        header("Location:../php/formLogin-Register.php?tab=register&error=Chưa nhập xác nhận mật khẩu");
    }
    
    else{
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repeatPass = $_POST['repeatPass'];

        

        $getUsername = mysqli_num_rows(getUsername($conn, $username)); 
        $getEmail = mysqli_num_rows(getEmail($conn, $email)); 
        // $getNumberphone = mysqli_num_rows(getNumberphone($conn, $numberphone)); 

        $checkfullname = validateString($fullname);

       if($checkfullname == 'error0'){
        header("Location:../php/formLogin-Register.php?tab=register&error=Tên không được chứa ký tự đặc biệt");
        exit();
       }
       else if($checkfullname == 'error1'){
        header("Location:../php/formLogin-Register.php?tab=register&error=Tên không được chứa số");
        exit();
       }
       else if($checkfullname == 'error2'){
        header("Location:../php/formLogin-Register.php?tab=register&error=Tên phài hơn 5 ký tự");
        exit();
       }
       else if (strpos($username, ' ') !== false) {
        header("Location:../php/formLogin-Register.php?tab=register&error=Tên người dùng không được chứa khoảng trắng");
        exit(); 
       }
       else if(strlen($username) > 50){
        header("Location:../php/formLogin-Register.php?tab=register&error=Tên người dùng quá dài");
        exit();
       }
       else if($getUsername){
        header("Location:../php/formLogin-Register.php?tab=register&error=Tên người dùng đã tồn tại");
        exit();
       }
       else if($getEmail){
        header("Location:../php/formLogin-Register.php?tab=register&error=Email đã tồn tại");
        exit();
       }
       else if(strlen($email) > 255){
        header("Location:../php/formLogin-Register.php?tab=register&error=Email quá dài");
        exit();
       }
       else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location:../php/formLogin-Register.php?tab=register&error=Email không hợp lệ");
        exit();
       }
       else if($repeatPass != $password){
        header("Location:../php/formLogin-Register.php?tab=register&error=Mật khẩu nhập lại không đúng");
        exit();
       }
       else if(strlen($password) > 255){
        header("Location:../php/formLogin-Register.php?tab=register&error=Mật khẩu quá dài");
        exit();
       }
       else if(strlen($password) < 8){
        header("Location:../php/formLogin-Register.php?tab=register&error=Mật khẩu quá ngắn");
        exit();
       }

       //hash password
       $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        addUser($conn, $fullname, $username, $hashedPassword, $email);
       
       header("Location:../php/formLogin-Register.php?tab=register&success=Đăng ký thành công");
   
    }
}


//LOGIN

else if(isset($_POST['btnLogin'])){


    if(empty($_POST['username'])){
        header("Location:../php/formLogin-Register.php?&error=Chưa nhập tên người dùng");
        exit();
    }
    if(empty($_POST['password'])){
        header("Location:../php/formLogin-Register.php?&error=Chưa nhập mật khẩu");
        exit();
    }

    else{

        $username = $_POST['username'];
        $password = $_POST['password'];

        $getUsername_Email = getUsername_Email($conn, $username);
        $row = mysqli_fetch_assoc($getUsername_Email);
        
        if(mysqli_num_rows($getUsername_Email)){
            $username = $row['tendangnhap']; 
        }
        else{
            $username = $_POST['username'];
        }



        $checkLogin = checkLogin($conn, $username, $password);
        if($checkLogin == 'error0'){
            header("Location:../php/formLogin-Register.php?&error=Tài khoản không đúng");
            exit();
        }
        else if($checkLogin == 'error1'){
            header("Location:../php/formLogin-Register.php?&error=Sai mật khẩu");
            exit();
        }
        else{
        if($checkLogin == 'success'){
            $_SESSION['username'] = $username;
            header("Location:../server.php");
            exit();
        }
        else{
            header("Location:../php/formLogin-Register.php?&error=Sai thông tin đăng nhập");
            exit();
        }
        }


    }

}

// UPDATE THÔNG TIN CÁ NHÂN
else if(isset($_POST['btnUpdateInf'])){

    if(isset($_SESSION['username'])){
        if(empty($_POST['fullname'])){
            header("Location:../php/profile.php?tab=update&error=Tên không hợp lệ");
        }
        if(empty($_POST['numberphone'])){
            header("Location:../php/profile.php?tab=update&error=Số điện thoại không hợp lệ");
        }
        
        else{
            $fullname = $_POST['fullname'];
            $username  = $_SESSION['username'];
            $numberphone = $_POST['numberphone'];
            $gender = $_POST['gender'];
    
            $getAllNumberphone = mysqli_num_rows(getAllNumberphone($conn, $numberphone, $username)); 
            $checkfullname = validateString($fullname);
    
           if($checkfullname == 'error0'){
            header("Location:../php/profile.php?tab=update&error=Tên không được chứa ký tự đặc biệt");
            exit();
           }
           else if($checkfullname == 'error1'){
            header("Location:../php/profile.php?tab=update&error=Tên không được chứa số");
            exit();
           }
           else if($checkfullname == 'error2'){
            header("Location:../php/profile.php?tab=update&error=Tên phài hơn 5 ký tự");
            exit();
           }
           else if($getAllNumberphone){
            header("Location:../php/profile.php?tab=update&error=Số điện thoại đã tồn tại");
            exit();
           }
           else if(strlen($numberphone) > 13){
            header("Location:../php/profile.php?tab=update&error=Số điện thoại phải từ 8-12 số");
            exit();
           }
           else if(strlen($numberphone) < 8){
            header("Location:../php/profile.php?tab=update&error=Số điện thoại phải từ 8-12 số");
            exit();
           }
           else if(!preg_match('/^[0-9]+$/', $numberphone)){
            header("Location:../php/profile.php?tab=update&error=Số điện thoại không được chứa ký tự");
            exit();
           }
           else{
            updateInf($conn, $username, $fullname, $numberphone, $gender);
            header("Location:../php/profile.php?success=Cập nhật thông tin thành công");
            exit();
           }
     

        }

    }



    else{
        header("Location:../php/formLogin-Register.php");
            exit();
    }
    
}




 //Update ADDRESS
 else if(isset($_POST['btnUpdateAddress'])){
    $username  = $_SESSION['username'];
    $address = $_POST['address'];
    if(strlen($address) > 150){
        header("Location:../php/profile.php?tab=address&error=Địa chỉ quá dài");
        exit();
       }
    else if(strlen($address) < 20){
        header("Location:../php/profile.php?tab=address&error=Địa chỉ quá ngắn");
        exit();
       }
    else{
        updateAddress($conn, $username, $address);
        header("Location:../php/profile.php?success=Cập nhật địa chỉ thành công");
        exit();
    }
    

}


// Update PASSWORD
// updatePassword($conn, $username, $password)
else if(isset($_POST['btnUpdatePassword'])){
    $username  = $_SESSION['username'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $repeatNewPassword = $_POST['repeatNewPassword'];


    if(empty($_POST["oldPassword"])){
        header("Location:../php/profile.php?tab=password&error=Chưa nhập mật khẩu cũ");
        exit();
    }
    if(empty($_POST["newPassword"])){
        header("Location:../php/profile.php?tab=password&error=Chưa nhập mật khẩu mới");
        exit();
    }
    if(empty($_POST["repeatNewPassword"])){
        header("Location:../php/profile.php?tab=password&error=Chưa nhập xác nhận mật khẩu mới");
        exit();
    }
    else{

        

        $getOldPassword = getPassword_Username($conn, $username); //Lấy mật khẩu trong csdl để so sánh
        $OldPass = mysqli_fetch_assoc($getOldPassword); //Lấy mảng
        $check_pass = password_verify($oldPassword, $OldPass['matkhau']);//check mat khau

        

        if($check_pass){ //so sánh
            if($newPassword != $repeatNewPassword){
                header("Location:../php/profile.php?tab=password&error=Xác nhận mật khẩu không đúng");
                exit();
            }
            else if(strlen($newPassword) > 255){
                header("Location:../php/profile.php?tab=password&error=Mật khẩu mới quá dài");
                exit();
               }
            else if(strlen($newPassword) < 8){
                header("Location:../php/profile.php?tab=password&error=Mật khẩu mới quá ngắn");
                exit();
               }
           else{
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT); //băm mật khẩu mới
            updatePassword($conn, $username, $hashedPassword);
            header("Location:../php/profile.php?success=Đổi mật khẩu thành công");
            exit();
           }
        }
        else{
            header("Location:../php/profile.php?tab=password&error=Mật khẩu cũ không đúng");
            exit();
        }

        
        
        


    }

    

}












else{
    header("Location:../php/formLogin-Register.php");
            exit();
}







?>