<?php
require_once 'koneksi.php';

$idberita = $_POST['idberita'];
// $idberita = 1;

$sql = "SELECT judul FROM berita WHERE idberita = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idberita);
$stmt->execute();
$res = $stmt->get_result();

$row = $res->fetch_assoc();
$json['newstitle'] = $row;

$sql = "SELECT k.idkomentar,k.konten,k.created_at,u.username,u.fullname,u.gambar FROM komentar k INNER JOIN user u on k.username = u.username WHERE k.idberita = ? ORDER BY `k`.`idkomentar` ASC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idberita);
$stmt->execute();
$res = $stmt->get_result();

if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        $json['comments'][] = $row;
    }
} else {
    $json['message'] = $conn->error;
}
$json['result'] = 'success';

echo json_encode($json);
