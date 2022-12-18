<?php
require_once 'koneksi.php';

extract($_POST);

$sql = 'SELECT * FROM user WHERE username = ? AND password = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $username, $password);
$stmt->execute();
$res = $stmt->get_result();

if ($res->num_rows == 1) {
    $json = [
        'result' => 'success'
    ];
} else {
    $json['result'] = 'failed';
    $json['message'] = $conn->error;
}

echo json_encode($json);
