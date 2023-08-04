<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="formStyle7.css">
        <title>Car Rental Main Page</title>
    </head>
    <body>

        <div >
            <h1 >Car Rental</h1>
            <h2 >Employee Login:</h2>
            <form action="employeeLogin.php" method="post">
                <label  for="email">Email:</label>
                <input type="text"   id="email" name="email" required>
                <br>
                <label  for="password">Password:</label>
                <input type="password"  id="password" name="password" required>
                <br>
                <input type="submit" value="Login">
            </form>

            <br>
            <button class="btn btn-primary btn-block btn-large" onclick= "window.location.href = 'createEmployee.php'">New Employee? Click here</button>

        <br>

        <h1>Regular users:</h1>
        <button class="btn btn-primary btn-block btn-large" onclick= "window.location.href = 'betterSearch.php'">Search Cars</button>
        <br>

        <button class="btn btn-primary btn-block btn-large" onclick= "window.location.href = 'userLogin.php'">User Login</button>
        </div>

    </body>
</html>
