<?php

session_start();

if (!isset($_SESSION['filled']) || $_SESSION['filled'] < 1) {
    header('Location: anagrafici.php', true, 303);
    exit;
}

if ($_SESSION['filled'] > 1) {
    header('Location: riepilogo.php', true, 303);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['filled'] = 2;
    header('Location: riepilogo.php', true, 303);
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="riepilogo.php" method="POST">
        <fieldset>
            <legend>Contatti</legend>
            <label for="telefono">Telefono</label><br>
            <input type="tel" id="telefono" name="telefono" maxlength="20" required><br><br>

            <label for="cellulare"></label><br>
            <input type="tel" id="cellulare" name="cellulare" maxlength="20" required><br><br>

            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" maxlength="120" required><br><br>

        </fieldset>
    </form>
</body>

</html>