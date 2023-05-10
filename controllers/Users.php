<?php

require_once(__DIR__ . "/../DBController.php");

// Signup function

function CreateAccount($name, $email, $password)
{
    // Open connection to database
    $conn = ConnectToDatabase();

    // Check if email already exists in database
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = QueryDB($conn, $query);

    if(mysqli_num_rows($result) > 0)
    {
        return "email_used";
    }
    else
    {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Create and add user to database
        $query = "INSERT INTO users(name, email, password) VALUES('$name', '$email', '$hashed_password')";
        mysqli_query($conn, $query);

        return "success";
    }
}

// END Signup function


// Login function

function Login($email, $password)
{
    // Open connection to database
    $conn = ConnectToDatabase();

    // Check if email exists in database
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = QueryDB($conn, $query);

    if(mysqli_num_rows($result) > 0)
    {
        // Check if password matches password in database
        if(password_verify($password, mysqli_fetch_assoc($result)['password']))
        {
            return "success";
        }
        else
        {
            return "incorrect_password";
        }
    }
    else
    {
        return "email_not_found";
    }
}

// END Login function



// GetUserData function

function GetUserData($email)
{
    $query = "SELECT * FROM users WHERE email='$email'";
    return mysqli_fetch_assoc(Query($query));
}

// END GetUserData function


// Subscribe function

function Subscribe($email)
{
    // Open connection to database
    $conn = ConnectToDatabase();

    // Check if email already exists in database
    $query = "SELECT * FROM newsletter WHERE email='$email'";
    $result = QueryDB($conn, $query);

    if(mysqli_num_rows($result) > 0)
    {
        return "already_subscribed";
    }
    else
    {
        // Create and add user to database
        $query = "INSERT INTO newsletter(email) VALUES('$email')";
        mysqli_query($conn, $query);

        return "success";
    }
}

// END Subscribe function


// Function to send contact message
function ContactUs($data)
{
    $name = $data['name'];
    $email = $data['email'];
    $phone = $data['phone'];
    $message = $data['message'];

    $query = "INSERT INTO contact_us(name, email, phone, message) 
    VALUES ('$name', '$email', '$phone','$message')";

    Query($query);
}
// END Contact Message function


?>