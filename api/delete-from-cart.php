<?php

require_once(__DIR__ . "/../controllers/Cart.php");
require_once(__DIR__ . "/../controllers/Users.php");

header("Content-Type: application/json");

// Get the request data
$data = json_decode(file_get_contents("php://input"), true);

// Extract the product ID from data
$userId = GetUserData($_COOKIE['user'])['id'];
$productId = $data["product_id"];

RemoveFromCart($userId, $productId);

echo "success";

?>
