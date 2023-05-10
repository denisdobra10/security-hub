<?php

require_once(__DIR__ . "/../controllers/Orders.php");
require_once(__DIR__ . "/../controllers/Users.php");
require_once(__DIR__ . "/../controllers/Cart.php");

header("Content-Type: application/json");

// Get data from request
$data = json_decode(file_get_contents("php://input"), true);

$userId = GetUserData($_COOKIE['user'])['id'];
$data['user_id'] = $userId;

// Place the order
PlaceOrder($data);

// Delete cart after placing order
DeleteCart($userId);

echo "success";

?>
