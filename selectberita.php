<?php
require_once 'koneksi.php';

$idjenis = (isset($_POST['idjenis']) ? $_POST['idjenis'] : '');
$sql = "SELECT b.* FROM jenis_berita jb INNER JOIN berita b on jb.idberita = b.idberita WHERE jb.idjenis LIKE '%$idjenis%'";
$res = $conn->query($sql);

$arr_news = [];

while ($row = $res->fetch_assoc()) {
    $news = [];
    $news['news'] = $row;
    $sqlGambar = "select * from gambar where idberita = " . $row['idberita'];
    $resGambar = $conn->query($sqlGambar);
    while ($rowGambar = $resGambar->fetch_assoc()) {
        $news['gambar'][] = $rowGambar;
    }
    $arr_news[] = $news;
}
$kategori = [];
if (isset($_POST['idjenis'])) {
    $sql = "SELECT nama FROM jenis where idjenis = $idjenis";
    $res = $conn->query($sql);
    while ($row = $res->fetch_assoc()) {
        $kategori[] = $row;
    }
}

$json = [
    'result' => 'success',
    'arraynews' => $arr_news,
    'news_category' => $kategori
];

echo json_encode($json);
