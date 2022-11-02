<?php 
$servername = "localhost";
    $username = "root";
    $password = "123456788";
    $dbname = "assignment2";
   
    $conn = new mysqli($servername, $username, $password,$dbname);
    if(!$conn){
        die("Connect fail:".mysqli_connect_error());
    } 
  mysqli_set_charset($conn,"utf8");

$data = array("data");
$sql ="SELECT * FROM posts";
$query = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_assoc($query)){
  $data[]= $row ;

}
echo json_encode($data);
  




?>