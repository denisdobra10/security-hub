<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once(__DIR__ . "/../controllers/Users.php");

// Try to post informations and create new account
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    // Get the request body as JSON
    $json = file_get_contents('php://input');

    // Decode the JSON into a PHP array
    $data = json_decode($json, true);

    // Get the values from the array
    $email = $data['email'];

    // Call your function to create the account using the data
    print(Subscribe($email));
}
else
{
    print("GET Requests are not allowed!");
}
?>
