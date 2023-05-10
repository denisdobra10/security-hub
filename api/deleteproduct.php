<?php

require_once(__DIR__ . "/../controllers/Products.php");

$id = $_GET['id'];

DeleteProduct($id);

echo "success";

?>