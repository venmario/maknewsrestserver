<?php
require_once 'koneksi.php';

$idkomentar = $_POST['idkomentar'];

$sql = "DELETE FROM komentar where idkomentar = $idkomentar";
$res = $conn->query($sql);

if ($res->num_rows > 0) {
    $json['result'] = 'success';
} else {
    $json['result'] = 'failed';
    $json['message'] = $conn->error;
}
echo json_encode($json);
