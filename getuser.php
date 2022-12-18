<?php
require_once 'koneksi.php';

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $sql = 'SELECT username,email,fullname,phonenumber,gambar FROM user WHERE username =?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $res = $stmt->get_result();

    $row = $res->fetch_assoc();

    $json = ['result' => 'success', 'data' => $row];
} else {
    $json = ['result' => 'success', 'message' => $conn->error];
}

echo json_encode($json);
