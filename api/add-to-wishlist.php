<?php

require_once(__DIR__ . "/../controllers/Wishlist.php");
require_once(__DIR__ . "/../controllers/Users.php");

header("Content-Type: application/json");

// Get the request data
$data = json_decode(file_get_contents("php://input"), true);

// Extract the product ID from data
$userId = GetUserData($_COOKIE['user'])['id'];
$productId = $data["product_id"];

AddToWishlist($userId, $productId);

echo "success";

?>
