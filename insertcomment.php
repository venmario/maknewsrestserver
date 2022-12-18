<?php
require_once 'koneksi.php';

extract($_POST);


$sql = "INSERT INTO komentar (idberita,username,konten) VALUES (?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $idberita, $username, $konten);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    $json['result'] = 'success';
} else {
    $json['result'] = 'failed';
    $json['message'] = $conn->error;
}

echo json_encode($json);
