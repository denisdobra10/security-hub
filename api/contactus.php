<?php

require_once(__DIR__ . "/../controllers/Users.php");

header("Content-Type: application/json");

// Get data from request
$data = json_decode(file_get_contents("php://input"), true);

// Place the order
ContactUs($data);


echo "success";

?>
