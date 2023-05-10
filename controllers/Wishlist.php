<?php

require_once(__DIR__ . "/../DBController.php");

function AddToWishlist($userId, $productId) {

    $conn = ConnectToDatabase();

    // Check if user already has a cart
    $query = "SELECT * FROM wishlist WHERE user_id = $userId";
    $result = mysqli_query($conn, $query);
  
    if (mysqli_num_rows($result) > 0) {
      // User already has a cart, update products
      $row = mysqli_fetch_assoc($result);
      $products = json_decode($row['products'], true);
  
      if (isset($products[$productId])) {
        // Product already exists in cart, increment quantity
        return;
      } else {
        // Product does not exist in cart, add to list
        $products[$productId] = 1;
      }
  
      $productsJson = json_encode($products);
      $cartId = $row['id'];
  
      $query = "UPDATE wishlist SET products = '$productsJson' WHERE id = $cartId";
      mysqli_query($conn, $query);
    } else {
      // User does not have a cart, create new cart
      $products = array($productId => 1);
      $productsJson = json_encode($products);
  
      $query = "INSERT INTO wishlist (user_id, products) VALUES ('$userId', '$productsJson')";
      mysqli_query($conn, $query);
    }

    $conn->close();
}

function RemoveFromWishlist($userId, $productId) {

    $conn = ConnectToDatabase();

    // Check if user has a cart
    $query = "SELECT * FROM wishlist WHERE user_id = $userId";
    $result = mysqli_query($conn, $query);
  
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $products = json_decode($row['products'], true);
  
      if (isset($products[$productId])) {
        $quantity = $products[$productId];
  
        if ($quantity > 1) {
          // Decrement quantity
          $quantity--;
          $products[$productId] = $quantity;
        } else {
          // Remove product from list
          unset($products[$productId]);
        }
  
        $productsJson = json_encode($products);
        $cartId = $row['id'];
  
        $query = "UPDATE wishlist SET products = '$productsJson' WHERE id = $cartId";
        mysqli_query($conn, $query);
      }
    }

    $conn->close();
}

function EraseProductFromWishlists($productId) {

  $conn = ConnectToDatabase();

  // Query all wishlists
  $query = "SELECT * FROM wishlist";
  $result = mysqli_query($conn, $query);

  while ($row = mysqli_fetch_assoc($result)) {
    $products = json_decode($row['products'], true);

    if (isset($products[$productId])) {
      unset($products[$productId]);
      $productsJson = json_encode($products);
      $wishlistId = $row['id'];

      $query = "UPDATE wishlist SET products = '$productsJson' WHERE id = $wishlistId";
      mysqli_query($conn, $query);
    }
  }

  $conn->close();
}



function DeleteWishlist($userId) {

    $conn = ConnectToDatabase();

    $query = "DELETE FROM wishlist WHERE user_id = $userId";
    mysqli_query($conn, $query);

    $conn->close();
}
  
function CountWishlistItems($userId) {

    $conn = ConnectToDatabase();

    $query = "SELECT * FROM wishlist WHERE user_id = $userId";
    $result = mysqli_query($conn, $query);
  
    $conn->close();

    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $products = json_decode($row['products'], true);
      $count = 0;
  
      foreach ($products as $productId => $quantity) {
        $count += $quantity;
      }
  
      return $count;
    } else {
      return 0;
    }
}
  
function GetWishlistItems($userId) {

    $conn = ConnectToDatabase();

    $query = "SELECT * FROM wishlist WHERE user_id = $userId";
    $result = mysqli_query($conn, $query);
  
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $products = json_decode($row['products'], true);

        $productsList = array();
      
        foreach($products as $product_id => $quantity) {
            // Get data for each product from database
            $query = "SELECT * FROM products WHERE id='$product_id'";
            $result = mysqli_query($conn, $query);

            $productData = mysqli_fetch_assoc($result);
            $productData['quantity'] = $quantity;

            $productsList[] = $productData;
        }

        $conn->close();
        return $productsList;
    } else {
        $conn->close();
        return array();
    }
}

function GetWishlistProductsJson($email)
{
    // Get user id by email
    $conn = ConnectToDatabase();
    $stmt = $conn->prepare("SELECT id FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userId = $result->fetch_assoc()['id'];

    // Get json object from cart for that user id
    $stmt = $conn->prepare("SELECT products FROM wishlist WHERE user_id=?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $products = $result->fetch_assoc()['products'];

    $conn->close();

    return $products;
}

  

?>