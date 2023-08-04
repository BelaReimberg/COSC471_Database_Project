<?php
//error check
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//connection code

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
// end of connection code


//get form data
$employee_id = $_POST["employee_id"];
$manufacturer = $_POST["manufacturer"];
$model = $_POST["model"];
$year = $_POST["year"];
$color = $_POST["color"];
$available = $_POST["available_number"];
$fuel = $_POST["fuel_type"];
$location_name = $_POST["location_name"];

//get location id
$retrieve_location_q="SELECT Location_ID FROM Location WHERE Location_name= '$location_name'";
//run
$retrieve_location_result= $mysqli->query($retrieve_location_q);
//retrieve
$location_row = mysqli_fetch_assoc($retrieve_location_result);
$location_id = $location_row["Location_ID"];

//Create new vehicle
$create_vehicle_query ="INSERT INTO Vehicle (Model, Manufacturer, Year, Color, Available_no, Fuel_type, Location_ID) 
                        VALUES ('$model','$manufacturer','$year','$color','$available','$fuel','$location_id')";
//run
$vehicle_result = $mysqli->query($create_vehicle_query);
//retrieve
//$vehicle_row = mysqli_fetch_assoc($vehicle_result);
//$location_id = $location_row["Location_ID"];
if ($vehicle_result) {
    //send to employee page with corresponding ID
    header("Location: employeePage.php?id=".$employee_id);
    exit(); // exit the script

} else {
    echo "Error";
}



?>
