<?php
require_once 'koneksi.php';

$username = $_POST['username'];
$sql = "SELECT gambar FROM user WHERE username = $username";
$res = $conn->query($sql);

$row = $res->fetch_assoc();
$old_image = $row['gambar'];

if($old_image == "default.jpg"){
    if (file_exists("images/users/$old_image")) {
        unlink("images/users/$old_image");
    }   
}

$new_image =  uniqid(sha1(strtotime("now"))) . ".jpg";

$sql = "UPDATE user SET gambar = '$new_image' WHERE username = '$username'";
$res = $conn->query($sql);
move_uploaded_file($_FILES['photo']['tmp_name'], "images/users/$new_image");
