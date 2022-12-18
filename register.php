<?php
require_once 'koneksi.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];

    $sql = "INSERT INTO `user` (username, fullname, password, email, phonenumber) VALUES (?, ? ,? ,?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssss', $username, $fullname, $password, $email, $phonenumber);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $json = [
            'result' => 'success'
        ];
    } else {
        $json['result'] = 'failed';
        $json['message'] = $conn->error;
    }
} else {
    $json['result'] = 'failed regis';
    $json['message'] = $conn->error;
}


echo json_encode($json);
