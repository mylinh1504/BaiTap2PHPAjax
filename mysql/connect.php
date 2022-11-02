<?php
    $servername = "localhost";
    $username = "root";
    $password = "123456788";
    $dbname = "assignment2";
   
    $conn = new mysqli($servername, $username, $password,$dbname);
    // $conn -> set_charset("utf8");
  
    if(!$conn){
        die("Connect fail:".mysqli_connect_error());
    } 
  mysqli_set_charset($conn,"utf8");
    // echo("connect success!");



?>