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

//Delete vehicle with given ID

//get vid (vehicle id) and id (employee id)
$vehicle_id = $_GET['vid'];
$employee_id = $_GET['id'];

$delete_query ="DELETE FROM Vehicle WHERE Vehicle_ID = $vehicle_id";
$delete_result = $mysqli->query($delete_query);

if($delete_result){
    echo "<script>window.alert('Vehicle successfully deleted')</script>";
    header("Location: employeePage.php?id=".$employee_id);
    exit(); // exit the script
}else{
    echo "failed deletion";
}


?>