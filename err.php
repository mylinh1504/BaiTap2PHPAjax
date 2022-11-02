<?php

$errors = [];
$data = [];

if(empty($_POST['title'])){
    $errors['title'] = 'title required';
}

if(empty($_POST['date'])){
    $errors['date'] = 'date required';
}

if(empty($_POST['content'])){
    $errors['content'] = 'content required';
}

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} 
else{
    $servername = "localhost";
    $username = "root";
    $password = "123456788";
    $dbname = "assignment2";
    $conn = new mysqli($servername,$username, $password,$dbname);
    mysqli_set_charset($conn,"utf8");
    
    $title = $_POST["title"];
    $content = $_POST["content"];
    $status =  $_POST["status"]; 
    $date = $_POST["date"];
    $sql= "INSERT INTO posts (title,content,status,date) VALUES ( '$title', '$content', '$status', '$date')";
    mysqli_query($conn,$sql);

    $data['success'] = true;
    $data['message'] = 'Success!';
}


echo json_encode($data);
