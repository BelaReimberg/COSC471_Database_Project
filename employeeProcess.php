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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //get form data
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $date_of_birth = $_POST["date_of_birth"];
    $position = $_POST["position"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $location_name = $_POST["location_name"];

    // Get Location_ID based on Location_name
    //(location names are unique)
    $location_Query = "SELECT Location_ID FROM Location WHERE Location_name = '$location_name'";

    //run query
    $locationResult = $mysqli ->query($location_Query);

    if ($location_row = mysqli_fetch_assoc($locationResult)) {
        //valid location

        $location_id = $location_row["Location_ID"];

        //set hire date to current date
        $hire_date = date("Y-m-d");

        // Insert employee information into Employee table
        // (ID is auto incremented)
        $employee_query = "INSERT INTO Employee (First_name, Last_name, Date_of_Birth, Position, Email, Phone, Password, Location_ID,Hire_date)
                           VALUES ('$first_name', '$last_name', '$date_of_birth', '$position', '$email', '$phone', '$password', $location_id,'$hire_date')";
        //run query
        $employee_result = $mysqli -> query($employee_query);

        // fetch new id
        $employee_id = mysqli_insert_id($mysqli);

        if ($employee_result) {
            //send to employee page with corresponding ID
            header("Location: employeePage.php?id=".$employee_id);
            exit(); // exit the script

        } else {
            echo "Error";
        }

    } else {
        //no valid location
        echo "Location not found.";
    }
}
?>

