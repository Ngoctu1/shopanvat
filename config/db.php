<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'shop_an_vat';

    $conn = mysqli_connect($hostname,$username,$password,$database);

    if(!$conn) {
        die("Kết nối thất bại". mysqli_connect_error());
    }else{
        mysqli_set_charset($conn,'utf8');
    }

    /*
    1. mysqli_fetch_assoc : chuyển các bản ghi sang dạng mảng có key là kiểu kết hợp
    2. mysqli_fetch_array : chuyển các bản ghi sang dạng mảng có key vừa là tuần tự, vừa kết hợp
    3. mysqli_fetch_row: chuyển các bản ghi sang dạng mảng có key là kiểu tuần tự (số nguyên)
    */
?>
