<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="formStyle7.css">
    <title>Update Employee Account</title>
</head>
<body>

<h1>Update Employee Account</h1>
<!--Create employee form-->
<form method="POST" action="updateEmployeeProcess.php">

    <!-- employee ID hidden field -->
    <input type="hidden" name="employee_id" value="<?php echo $employee_id; ?>">

    <label for="first_name">First Name:</label>
    <input type="text" value='<?php echo $first_name; ?>' name="first_name" required><br>

    <label for="last_name">Last Name:</label>
    <input type="text" value='<?php echo $last_name; ?>' name="last_name" required><br>

    <label for="date_of_birth">Date of Birth:</label>
    <input type="date" value='<?php echo $date_of_birth; ?>' name="date_of_birth" required><br>

    <label for="position">Position:</label>
    <input type="text" value='<?php echo $position; ?>' name="position" required><br>

    <label for="phone">Phone:</label>
    <input type="text" value='<?php echo $phone; ?>' name="phone" required><br>

    <label for="location_name">Location Name:</label>
    <input type="text" value='<?php echo $location_name; ?>' name="location_name" required><br>

    <label for="email">Email:</label>
    <input type="email" value='<?php echo $email; ?>' name="email" required><br>

    <label for="password">Password:</label>
    <input type="password" value='<?php echo $password; ?>' name="password" required><br>


    <input type="submit" value="Update Account">
</form>

</body>
</html>

