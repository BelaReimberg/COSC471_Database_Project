<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="formStyle7.css">
    <title>Add Vehicle</title>
</head>
<body>

<?php
//get employee id
$employee_id=$_GET['id'];

?>

<h1>Add Vehicle</h1>
<!--Create employee form-->
<form method="POST" action="addVehicleProcess.php">
    <!-- employee ID hidden field -->
    <input type="hidden" name="employee_id" value="<?php echo $employee_id; ?>">

    <label for="manufacturer">Manufacturer:</label>
    <input type="text" name="manufacturer" required><br>

    <label for="model">Model:</label>
    <input type="text" name="model" required><br>

    <label for="year">Year:</label>
    <input type="year" name="year" required><br>

    <label for="color">Color:</label>
    <input type="text" name="color" required><br>

    <label for="available_number">Number available:</label>
    <input type="text" name="available_number" required><br>

    <label for="fuel_type">Fuel type:</label>
    <input type="text" name="fuel_type" required><br>

    <label for="location_name">Location:</label>
    <input type="text" name="location_name" required><br>

    <input type="submit" value="Add Vehicle">
</form>

</body>
</html>

