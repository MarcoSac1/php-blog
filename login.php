<?php
session_start();
require "includes/db_conn.php";
// Questo file contiene le credenziali per connettersi al database

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
