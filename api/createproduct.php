<?php

require_once(__DIR__ . "/../controllers/Products.php");

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $title = $_POST["title"];
  $description = $_POST["description"];
  $price = $_POST["price"];
  $category = $_POST["categoryDropdown"];
  
  // Check if image was uploaded
  if (!empty($_FILES["image"])) {
    $image_name = uniqid() . "-" . $_FILES["image"]["name"];
    $image_tmp_name = $_FILES["image"]["tmp_name"];
    $image_size = $_FILES["image"]["size"];
    $image_type = $_FILES["image"]["type"];

    // Check if image is valid
    if (getimagesize($image_tmp_name)) {

      // Generate unique filename for the image
      $image_path = __DIR__ . "/../img/" .  $image_name;

      // Move the image to the img directory
      move_uploaded_file($image_tmp_name, $image_path);

      // Save product data to database
      CreateProduct($title, $image_name, $description, $price, $category);

      echo 'success';
    } else {
      // Return an error response if the image is invalid
      http_response_code(400);
      echo "invalid_image";
      exit;
    }
  } else {
    // Return an error response if no image was uploaded
    http_response_code(400);
    echo "no_image";
    exit;
  }
}

?>
