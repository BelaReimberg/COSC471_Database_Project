<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="formStyle7.css">
    <title>Welcome Page</title>
</head>
<body>
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


// Check for employee ID
if (isset($_GET["id"])) {
    $employeeID = $_GET["id"];
} else {
    // send back otherwise
    header("Location: login.php");
    exit();
}
//retrieve name based on id
$sql ="SELECT First_Name FROM Employee WHERE Employee_ID=$employeeID ";

$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
$employeeName = $row["First_Name"];
?>

    <h1>Welcome Employee <?php echo $employeeName; ?></h1>

    <!-- Update account page -->
    <form action="updateEmployee.php" method="post">
        <!-- employee ID hidden field -->
        <input type="hidden" name="employee_id" value="<?php echo $employeeID; ?>">
        <!-- Submit -->
        <input type="submit" value="Update Profile">
    </form>
    <br>
    <!-- Employee search page -->

    <button onclick="window.location.href = 'employeeSearch.php?id=<?php echo $employeeID; ?>'">Search Page</button>

    <br><br>
    <button onclick="window.location.href = 'addVehicle.php?id=<?php echo $employeeID; ?>'">Add Vehicle</button>
    <br><br>
    <button onclick="window.location.href = 'menu.php'">Back to menu</button>
    <!--
    <script>
        function editProfile() {
            // Redirect to the edit profile page
            window.location.href = "editProfile.php?id=";
        }

        function searchPage() {
            // Redirect to the search page
            window.location.href = "searchPage.php";
        }
    </script>
    -->
</body>
</html>

