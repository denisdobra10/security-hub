<?php

require_once(__DIR__ . "/../DBController.php");
require_once(__DIR__ . "/Wishlist.php");
require_once(__DIR__ . "/Cart.php");

// Create Product function

function CreateProduct($title, $image, $description, $price, $category)
{
    // Insert product into database
    $query = "INSERT INTO products (title, image, description, price, category) VALUES ('$title', '$image', '$description', '$price', '$category')";
    Query($query);
}

// END Create Product function


// Update Product function

function UpdateProduct($id, $title, $image, $description, $price, $category)
{
    // Insert product into database
    $query = "UPDATE products SET title='$title', description='$description', price='$price', category='$category', image='$image' WHERE id='$id'";
    Query($query);
}

// END Update Product function


// Delete Product function
function DeleteProduct($id)
{
    $conn = ConnectToDatabase();

    // Delete product from every wishlist
    // Query all wishlists
    $query = "SELECT * FROM wishlist";
    $result = mysqli_query($conn, $query);
  
    while ($row = mysqli_fetch_assoc($result)) {
      $products = json_decode($row['products'], true);
  
      if (isset($products[$id])) {
        unset($products[$id]);
        $productsJson = json_encode($products);
        $wishlistId = $row['id'];
  
        $query = "UPDATE wishlist SET products = '$productsJson' WHERE id = $wishlistId";
        mysqli_query($conn, $query);
      }
    }
    
    // Delete product from every cart
    // Query all carts
    $query = "SELECT * FROM cart";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $products = json_decode($row['products'], true);

        if (isset($products[$id])) {
        unset($products[$id]);
        $productsJson = json_encode($products);
        $wishlistId = $row['id'];

        $query = "UPDATE cart SET products = '$productsJson' WHERE id = $wishlistId";
        mysqli_query($conn, $query);
        }
    }


    // Remove image from server
    $product = GetProductById($id);
    $imgLocation = __DIR__ . "/../img/";
    unlink($imgLocation . $product['image']);

    $query = "DELETE FROM products WHERE id = $id";
    QueryDB($conn, $query);

    $conn->close();

}
// END Delete Product function



// Get all products from database by category
// get an associative array containing every element from a specific category
function GetProductsByCategory($category) {
    $query = "SELECT * FROM products WHERE category='$category'";
    $result = Query($query);
    $products = array(); // Initialize an empty array to store products
    while($row = mysqli_fetch_assoc($result)) {
        $products[] = $row; // Store the row as a product in the array
    }
    return $products; // Return the array containing all the products
}


// END Get All Products by category function


// Get product by id function
function GetProductById($id)
{
    $query = "SELECT * FROM products WHERE id=$id";
    return mysqli_fetch_assoc(Query($query));
}

// Get the last items from products table
// return them as associative
function GetFreshestProducts()
{
    $query = "SELECT * FROM products ORDER BY id DESC LIMIT 6";
    $result = Query($query);
    $products = array();
    
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }
    
    return $products;
}

function GetSuggestedProducts()
{
    $query = "SELECT * FROM products ORDER BY id DESC LIMIT 6";
    $result = Query($query);
    $products = array();
    
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }
    
    return $products;
}


// Search for products
function SearchProducts($searchTerm) {
    // Establish a database connection
    $conn = ConnectToDatabase();

    // Replace spaces with '%' wildcard characters in the search term
    $searchTerm = str_replace("+", " ", $searchTerm);

    // Prepare the SQL query with a parameterized placeholder
    $query = "SELECT * FROM products WHERE title LIKE ? OR description LIKE ?";

    // Create a prepared statement object
    $stmt = mysqli_prepare($conn, $query);

    // Bind the search term parameter to the statement
    $searchTerm = "%" . $searchTerm . "%";
    mysqli_stmt_bind_param($stmt, "ss", $searchTerm, $searchTerm);

    // Execute the query and retrieve the results
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Create an associative array to hold the results
    $products = array();

    // Loop through each row in the result set
    while ($row = mysqli_fetch_assoc($result)) {
        // Add the row to the products array
        $products[] = $row;
    }

    // Close the statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    // Return the products array
    return $products;
}




?>