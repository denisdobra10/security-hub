<?php
require_once(__DIR__ . "/../controllers/Products.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['categoryDropdown'];
    $image = null;
    $productInfo = GetProductById($id); 

    // Check if new image is selected
    if (isset($_FILES['new_image']) && $_FILES['new_image']['error'] == UPLOAD_ERR_OK) {
        $old_image = $productInfo['image'];
        if ($old_image != 'default.png') {
            unlink(__DIR__ . "/../img/$old_image");
        }
        $image_name = uniqid() . "-" . $_FILES["new_image"]["name"];
        $image_tmp_name = $_FILES["new_image"]["tmp_name"];

        $image_path = __DIR__ . "/../img/" .  $image_name;

        // Move the image to the img directory
        move_uploaded_file($image_tmp_name, $image_path);
    } else {
        $image_name = $productInfo['image'];
    }

    // Update image in db
    UpdateProduct($id, $title, $image_name, $description, $price, $category);

    echo 'success';

}
?>