
<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'security-cameras');


// Function to connect to db and return a mysqli object
function ConnectToDatabase()
{
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if (!$conn) {
        throw new Exception('Could not connect to database: ' . mysqli_connect_error());
    }

    return $conn;
}


// Function that takes a query as parameter, executes on database and return the result
function QueryDB($db, $query)
{
    return mysqli_query($db, $query);
}

function Query($query)
{
    $conn = ConnectToDatabase();
    $result = mysqli_query($conn, $query);
    $conn->close();

    return $result;
}

?>
