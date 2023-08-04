
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="formStyle7.css">
        <title>User Login</title>
    </head>
    <body>
        <h2>User Login:</h2>
        <form action="userLoginProcess.php" method="post">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <input type="submit" value="Login">
        </form>
    </body>
</html>