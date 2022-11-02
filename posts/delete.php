<?php
include("../mysql/connect.php");

    $id = $_POST['id'];
    $sql = " DELETE FROM posts WHERE id= $id ";
    $query = mysqli_query($conn,$sql);
    if($query){
        echo json_encode(array("delete success!"));
    }
     else{
        echo json_encode(array("xoá thất bại"));
    
     }

?>