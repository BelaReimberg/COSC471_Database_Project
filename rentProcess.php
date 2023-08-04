<?php

//error checking
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// database connection
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

//
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //retrieve customer form info
    $vehicle_id = $_POST["vehicle_id"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    //new
    $address=$_POST["address"];
    $phone = $_POST["phone"];

    $email = $_POST["email"];
    $pass= $_POST["password"];
    $license_number = $_POST["license_number"];


    //rental info
    $rent_from = $_POST["rent_from"];
    $rent_to = $_POST["rent_to"];

    // Insert customer information into Customer table
    $customer_query = "INSERT INTO Customer (First_name, Last_name, Email, Customer_Phone, License_number,Password,Address)
                       VALUES ('$first_name', '$last_name', '$email', '$phone', '$license_number','$pass','$address')";

    //execute customer query
    $customer_result = $mysqli ->query($customer_query);
    //$customer_result = mysqli_query($link, $customer_query);

    if ($customer_result) {
        // insert Customer ID in rental
        // mysqli_insert_id() -> Returns the value generated for an AUTO_INCREMENT column by the last query
        $customer_id = mysqli_insert_id($mysqli);

        // Insert rental information into Rental table
        $cost =5000; //cost is static for testing
        $rental_query = "INSERT INTO Rental (Customer_ID, Vehicle_ID, Start_Date, End_Date,Cost)
                         VALUES ($customer_id, $vehicle_id, '$rent_from', '$rent_to','$cost')";
        //$rental_result = mysqli_query($link, $rental_query);

        //execute rental query
        $rental_result = $mysqli ->query($rental_query);

        if ($rental_result) {
            echo "Rental information added successfully.You can now log in with you email and password";
            //display button to go back
            echo '<a href="menu.php">Back to main menu</a>';
        } else {
            echo "Error adding rental information.";
        }
    } else {
        echo "Error adding customer information.";
    }

    // Update vehicle availability (reduce by 1))
    $update_vehicle_query = "UPDATE Vehicle SET Available_no = Vehicle.Available_no - 1 WHERE Vehicle_ID = $vehicle_id";
    $update_vehicle_result= $mysqli->query($update_vehicle_query);
}
?>

