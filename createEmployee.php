<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="formStyle7.css">
    <title>Create Employee Account</title>
</head>
<body>

    <h1>Create Employee Account</h1>
    <!--Create employee form-->
    <form method="POST" action="employeeProcess.php">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required><br>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required><br>

        <label for="date_of_birth">Date of Birth:</label>
        <input type="date" name="date_of_birth" required><br>

        <label for="position">Position:</label>
        <input type="text" name="position" required><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" required><br>

        <label for="location_name">Location Name:</label>
        <input type="text" name="location_name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Create Account">
    </form>

</body>
</html>
