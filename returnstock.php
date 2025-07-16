<?php
$data = json_decode(file_get_contents("php://input"), true);
$conn = new mysqli("localhost", "root", "", "bakery");

$id = (int)$data['productId'];
$conn->query("UPDATE products SET stock = stock - 1 WHERE id = $id AND stock > 0");
?>