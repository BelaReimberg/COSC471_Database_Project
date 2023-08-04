<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root';
$db_db = 'car_rental';


$link=mysqli_init();

if (!$link) {
    die("mysqli_init failed");
}
global $mysqli;

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
/*
echo 'Success: A proper connection to MySQL was made.';
echo '<br>';
echo 'Host information: '.$mysqli->host_info;
echo '<br>';
echo 'Protocol version: '.$mysqli->protocol_version;
*/
//$mysqli->close();

?>


<?php
/*
$host="localhost";
//$port=8889;
//$socket="";
$user="root";
$password="root";
$dbname="car_rental";

$link=mysqli_init();

$success=musqli_real_connect(
  $link,
  $host,
  $user,
  $password,
  $dbname//,
  //$port
);
//$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
//or die ('Could not connect to the database server' . mysqli_connect_error());
*/
?>