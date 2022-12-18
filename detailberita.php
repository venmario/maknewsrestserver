<?php
require_once 'koneksi.php';

$idberita = (isset($_POST['idberita'])) ? $_POST['idberita'] : 3;

$sql = "SELECT * FROM berita where idberita = $idberita";
$res = $conn->query($sql);

$data['news'] = $row = $res->fetch_assoc();

$sql = "SELECT * FROM gambar where idberita =$idberita";
$res = $conn->query($sql);
while ($rowGambar = $res->fetch_assoc()) {
    $data['gambar'][] = $rowGambar;
}

$json = [
    'result' => 'success',
    'data' => $data
];

echo json_encode($json);