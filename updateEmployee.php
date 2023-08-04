<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="formStyle7.css">
    <title>Update Profile</title>
</head>
<body>

<h1>Update Profile</h1>

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


$employee_id = $_POST['employee_id'];  //

// Fetch existing profile information
$employee_query = "SELECT * FROM Employee WHERE Employee_ID = $employee_id";
$employee_result = $mysqli ->query($employee_query);

$account_info_row = mysqli_fetch_assoc($employee_result);

if ($account_info_row) {
    // Populate form fields with existing information
    $first_name = $account_info_row['First_name'];
    $last_name = $account_info_row['Last_name'];
    $date_of_birth = $account_info_row['Date_of_Birth'];
    $position = $account_info_row['Position'];
    $email = $account_info_row['Email'];
    $phone = $account_info_row['Phone'];
    $password = $account_info_row['Password'];
    $location_id = $account_info_row['Location_ID'];

    //get location name based on location id
    $location_name_query = "SELECT Location_name FROM Location WHERE Location_ID='$location_id'";
    //run
    $location_name_result= $mysqli->query($location_name_query);
    //retrieve
    if($location_name_row = mysqli_fetch_assoc($location_name_result)){
        $location_name = $location_name_row['Location_name'];

        // update form
        include 'updateEmployeeForm.php';  // update form on a separate file

    }else{
        echo "bug";//no valid location
    }


} else {
    echo "Employee profile not found.";
}
?>

</body>
</html>
