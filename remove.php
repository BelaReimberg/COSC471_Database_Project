<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="formStyle7.css">
    <title>Removing  Vehicle</title>
</head>
<body>

<h1>Removing Vehicle</h1>
<br>
<h2>Are you sure you want to remove:</h2>
<?php echo
//error check
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//connection code

$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root';
$db_db = 'car_rental';


$link = mysqli_init();

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
    echo 'Errno: ' . $mysqli->connect_errno;
    echo '<br>';
    echo 'Error: ' . $mysqli->connect_error;
    exit();
}
// end of connection code


//retrieve info

$vehicle_id = $_GET['vid'];
$employee_id = $_GET['id'];

// Retrieve vehicle information
$vehicle_query = "SELECT * FROM Vehicle WHERE Vehicle_ID = $vehicle_id";
//$vehicle_result = mysqli_query($link, $vehicle_query);
$vehicle_result = $mysqli ->query($vehicle_query);
$vehicle_row = mysqli_fetch_assoc($vehicle_result);


echo "<p>Vehicle: {$vehicle_row['Color']} {$vehicle_row['Manufacturer']} {$vehicle_row['Model']} (Year: {$vehicle_row['Year']})</p>";


?>
<button onclick="window.location.href = 'removeProcess.php?vid=<?php echo $vehicle_id; ?>&id=<?php echo $employee_id; ?>'">Yes</button>
<button onclick="window.location.href = 'employeeSearch.php?id=<?php echo $employee_id; ?>'">No</button> <!-- Goes back to employee page-->
</body>
</html>
