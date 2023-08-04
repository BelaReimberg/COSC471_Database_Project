<!-- Form to be inserted in rent.php -->
<form method="POST" action="rentProcess.php">
    <input type="hidden" name="vehicle_id" value="<?php echo $vehicle_id; ?>">

    <!--Customer data -->
    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" required><br>

    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" required><br>

    <label for="phone">Phone:</label>
    <input type="text" name="phone" required><br>

    <label for="address">Address:</label>
    <input type="text" name="address" required><br>

    <label for="license_number">License number:</label>
    <input type="text" name="license_number" required><br>

    <label for="email">Email:</label>
    <input type="text" name="email" required><br>

    <label for="password">Set Password:</label>
    <input type="text" name="password" required><br>

    <!--Rental dates -->
    <h3>Rental information</h3>
    <label for="rent_from">Rent From:</label>
    <input type="date" name="rent_from" required><br>

    <label for="rent_to">Rent To:</label>
    <input type="date" name="rent_to" required><br>

    <input type="submit" value="Rent">
</form>
