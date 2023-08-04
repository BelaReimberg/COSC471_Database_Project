<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="formStyle7.css">
    <title>User page</title>
</head>
<body>

<h1>Welcome </h1>

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

//get customer id
$customer_id = $_GET['id'];



    // LIKE clause to find matching vehicles
    //JOIN with location to get location name
    $sql = "SELECT *
            FROM Rental, Vehicle
            WHERE Rental.Vehicle_ID = Vehicle.Vehicle_ID AND Customer_ID = $customer_id "; //only shows rentals from corresponding customer

    $result = $mysqli ->query($sql);

    if (!$result) {
        echo "Error: " . mysqli_error($link);
        exit();
    }

    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Current rentals</h2>";
        echo "<table border='1'>
                <tr>
                    <th>Manufacturer</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Cost</th>
                </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row["Manufacturer"]}</td>
                    <td>{$row["Model"]}</td>
                    <td>{$row["Year"]}</td>
                    <td>{$row["Start_date"]}</td>
                    <td>{$row["End_date"]}</td>
                    <td>{$row["Cost"]}</td>
                    <!--<td><a href='return.php?rid={$row["Rental_ID"]}&id={$row["Customer_ID"]}'>Return</a></td> -->
                </tr>";
        }

        echo "</table>";
    } else {
        echo "No results found, please choose different specifications.";
    }

?>
<br>
<button onclick="window.location.href = 'menu.php'">Back to menu</button>

</body>
</html>

