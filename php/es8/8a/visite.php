<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    session_start();

    if (isset($_POST["azzera"])) {
        session_unset();
    }

    if (!isset($_SESSION["contatore"])) {
        $_SESSION["contatore"] = 0;
    }

    $_SESSION["contatore"]++;

    echo "visite: " . $_SESSION["contatore"];

    ?>

    <br>
    <a href="index.php">Home</a>

    <form method="post">
        <input type="hidden" name="azzera">
        <button type="submit">Azzera</button>
    </form>
</body>

</html>