<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Form di  registrazione 
    </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="login-box">
        <form action="login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <br><br>
            <button type="submit">Login</button>
        </form>
    </header>
<h2>Login</h2>
</body>

</html>