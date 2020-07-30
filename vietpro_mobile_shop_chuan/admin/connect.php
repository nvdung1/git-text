<?php

if(!defined('TEMPLATE')){
    die('Ban khong co quyen truy cap file nay');
}
// kết nối PHP với MySQL Server
$conn = mysqli_connect('localhost','root','','vietpro_mobile_shop2');
if($conn){
    
    mysqli_query($conn, "SET NAMES 'utf8' "); // khai báo ngôn ngữ sử dụng trong CSDL cho PHP
    //print_r('ket noi csdl thanh cong');
}else{
    die('ket noi that bai');
}

?>