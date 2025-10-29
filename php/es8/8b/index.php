<?php
session_start();
// Se già autenticato, reindirizza a home
if (isset($_SESSION['utente'])) {
    header('Location: home.php');
    exit;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">

</head>

<body>
    <h1>Accedi</h1>
    <form action="home.php" method="post">
        <label for="username">Username</label>
        <input id="username" name="username" type="text" required>

        <label for="password">Password</label>
        <input id="password" name="password" type="password" required>

        <button type="submit">Entra</button>
    </form>
</body>

</html>