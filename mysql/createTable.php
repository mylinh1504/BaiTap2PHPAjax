<?php
include("connect.php");

    $sql = "CREATE TABLE posts(
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(50) NOT NULL,
        content TEXT,
        status VARCHAR(20),
        date DATE 
    )" ;
     $query = mysqli_query($conn,$sql);
    if(!$query = true){
        echo" tạo bảng thất bại";
    }
    // else{
    //     echo("tạo bảng thành công");
    // }
    
?>