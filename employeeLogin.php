<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="formStyle7.css">
    <title>Login Response</title>
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

    //if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //get form info
    $email = $_POST["email"];
    $password = $_POST["password"];

    //authentication logic
    //query that gets email= $email  and password= $password
    //SELECT Email, Password FROM Employee Where Email= x and Password= x
    $sql = "SELECT Employee_ID FROM Employee WHERE Email = '$email' AND Password = '$password' ";

    //run query
    $result = $mysqli->query($sql);

    //if records were found
    //if ($result) {
        // Check if a matching record was found
        if ($result->num_rows == 1) {
            //fetch id
            $row = $result->fetch_assoc();
            $employeeID = $row["Employee_ID"];
            //$employeeName= $row["First_Name"];

            //enter page with corresponding ID
            header("Location: employeePage.php?id=".$employeeID);
            exit(); // exit the script
        } else {
            //display it failed
            echo "Login Failed!";
        }
    //} else {
    //    echo "Error executing the query: " . $link->error;
    //}

    //check
    /*
    if ($email === "admin" && $password === "admin") {
        //send to employee page
        echo "<h1>Login Successful!</h1>";
    }
    else {
        echo "<h1>Login Failed!</h1>";
    }
    //}
    */
    ?>
</body>
</html>
