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
        <div class="title">
            <h1><a href="index.php">My Awesome Blog</a></h1>
        </div>
        <div class="login">
            <form action="login.php" method="POST">
            <label for="username">Username:</label>
                <input type="text" name="username" required>
                <label for="password">Password:</label>
                <input type="password" name="password" required>
                <button type="submit">Login</button>
            </form>
        </div>
    </header>
    <section class="post">
    <?php
        require "includes/post.php";
    ?>
    </section>
</body>

</html>