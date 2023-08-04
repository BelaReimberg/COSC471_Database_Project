<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="formStyle7.css">
    <title>Vehicle Search</title>
</head>
<body>

<h1>Vehicle Search</h1>

<form method="POST">
    <label for="search">Search:</label>
    <input type="text" name="search" id="search" placeholder="Enter search term">
    <input type="submit" value="Search">
</form>

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST["search"];

    // LIKE clause to find matching vehicles
    //JOIN with location to get location name
    $sql = "SELECT v.*, l.Location_name
            FROM Vehicle v
            JOIN Location l ON v.Location_ID = l.Location_ID 
            WHERE v.Model LIKE '%$search%'
            OR v.Manufacturer LIKE '%$search%'
            OR v.Year LIKE '%$search%'
            OR v.Color LIKE '%$search%'
            OR l.Location_name LIKE '%$search%'
            AND v.Available_no > 0"; //only shows available cars

    //$result = mysqli_query($link, $sql);
    $result = $mysqli ->query($sql);

    if (!$result) {
        echo "Error: " . mysqli_error($link);
        exit();
    }

    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Search Results</h2>";
        echo "<table border='1'>
                <tr>
                    <th>Manufacturer</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Color</th>
                    <th>Location</th>
                    <th>Rent</th>
                </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row["Manufacturer"]}</td>
                    <td>{$row["Model"]}</td>
                    <td>{$row["Year"]}</td>
                    <td>{$row["Color"]}</td>
                    <td>{$row["Location_name"]}</td>
                    <td><a href='rent.php?id={$row["Vehicle_ID"]}'>Rent</a></td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "No results found, please choose different specifications.";
    }
}
?>

</body>
</html>

