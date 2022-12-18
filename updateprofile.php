<?php
require_once 'koneksi.php';

extract($_POST);

$sql = "UPDATE user SET fullname = ?, email = ?, phonenumber = ? WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ssss', $fullname, $email, $phonenumber, $username);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    $json = [
        'result' => 'success'
    ];
} else {
    $json['result'] = 'failed';
    $json['message'] = $conn->error;
}

echo json_encode($json);
