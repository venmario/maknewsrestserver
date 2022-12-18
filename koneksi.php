<?php
header("Access-Control-Allow-Origin: *");
$conn = new mysqli("localhost", "hybrid_160419091", "ubaya", "hybrid_160419091");
if ($conn->connect_error) {
    $json = ["result" => "error", "message" => "unable to connect"];
	echo json_encode($json);
    die();
}
