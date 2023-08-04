<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="formStyle7.css">
    <title>Rent Vehicle</title>
</head>
<body>

<?php

//error checking
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//require_once 'connect.php';

$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root';
$db_db = 'car_rental';


$link=mysqli_init();

if (!$link) {
    die("mysqli_init failed");
}

$mysqli = @new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db
);

if ($mysqli->connect_error) {
    echo 'Errno: '.$mysqli->connect_errno;
    echo '<br>';
    echo 'Error: '.$mysqli->connect_error;
    exit();
}

//end of connection code

// Check for ID (vehicle)
if (isset($_GET['id'])) {
    $vehicle_id = $_GET['id'];

    // Retrieve vehicle information
    $vehicle_query = "SELECT * FROM Vehicle WHERE Vehicle_ID = $vehicle_id";
    //$vehicle_result = mysqli_query($link, $vehicle_query);
    $vehicle_result = $mysqli ->query($vehicle_query);
    $vehicle_row = mysqli_fetch_assoc($vehicle_result);

    if ($vehicle_row) {
        echo "<h1>Rent Vehicle</h1>";
        echo "<p>Vehicle: {$vehicle_row['Manufacturer']} {$vehicle_row['Model']} (Year: {$vehicle_row['Year']})</p>";

        // Display rental form
        include 'rentalForm.php';  // Include the rental form

    } else {
        echo "Vehicle not found.";
    }
} else {
    echo "Invalid vehicle ID.";
}
?>

</body>
</html>

