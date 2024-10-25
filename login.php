<?php
session_start();
require "includes/db_conn.php";

// Controlla se l'utente vuole fare logout
if (isset($_GET['logout'])) {
    // Distruggi la sessione
    session_unset(); // Rimuove tutte le variabili di sessione
    session_destroy(); // Distrugge la sessione
    header("Location: index.php"); // Redireziona alla pagina di login
    exit();
}

// Questo blocco gestisce il login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Preleva i dati inseriti dall'utente
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepara una query per verificare l'utente
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        // L'utente esiste, ora verifichiamo la password
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            // Login riuscito, salva l'utente in sessione
            $_SESSION['username'] = $username;
            header("Location: adminpage.php"); // Redireziona alla pagina protetta
            exit();
        } else {
            // Password errata
            header("Location: index.php?error=404");
            exit();
        }
    } else {
        // Username errato
        header("Location: index.php?error=404");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login">
        <form action="login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <button type="submit">Login</button>
            <button>
                <a href="login.php?logout=true">Logout</a>
            </button>
        </form>
    </div>
</body>
</html>
