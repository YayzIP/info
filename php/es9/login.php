<?php

session_start();

if (isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $error = $_GET['error'] ?? "";
    if ($error === 'username') {
        $errorMessage = 'User non esistente';
    }
    if ($error === 'password') {
        $errorMessage = 'password errata';
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/login.css">
</head>

<body>
    <div>
        <h1>login</h1>

        <p id="error"><?= $errorMessage ?></p>
        <form action="checkUser.php" method="POST">
            <label for="username">Username *</label>
            <input type="text" name="username" id="username" required>
            <label for="password">Password *</label>
            <input type="password" name="password" id="password" required>
            <button type="submit" id="submit">submit</button>
        </form>
    </div>
</body>

</html>