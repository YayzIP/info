<?php
session_start();

$utenti = [
    "admin" => "1234",
    "user" => "abcd"
];

if (isset($_SESSION["utente"])) {
    header("Location: home.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    if (isset($utenti[$username]) && $utenti[$username] === $password) {
        $_SESSION["utente"] = $username;
        $_SESSION["login_time"] = time();
        header("Location: home.php");
        exit;
    } else {
        $errore = "Credenziali errate.";
    }
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <?php if (isset($errore))
        echo "<p style='color:red;'>$errore</p>"; ?>

    <form method="post">
        <label>Username: <input type="text" name="username"></label><br>
        <label>Password: <input type="password" name="password"></label><br>
        <button type="submit">Accedi</button>
    </form>
</body>

</html>