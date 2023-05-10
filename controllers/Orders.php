<?php

function PlaceOrder($data)
{
    $userId = $data['user_id'];
    $products = $data['products'];
    $totalPrice = $data['totalPrice'];
    $name = $data['name'];
    $email = $data['email'];
    $address = $data['address'];
    $city = $data['city'];
    $country = $data['country'];
    $phone = $data['phone'];
    $notes = $data['notes'];

    $query = "INSERT INTO orders(user_id, products, totalPrice, name, email, address, city, country, phone, notes) 
    VALUES ('$userId', '$products', '$totalPrice','$name','$email','$address','$city','$country','$phone', '$notes')";

    Query($query);
}

?>