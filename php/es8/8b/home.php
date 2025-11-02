<?php
session_start();
if (!isset($_SESSION["utente"])) {
    header("Location: login.php");
    exit;
}

$utente = $_SESSION["utente"];
$login_time = $_SESSION["login_time"];
$tempo_trascorso = time() - $login_time;
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>

<body>
    <h1>Benvenuto, <?= htmlspecialchars($utente) ?>!</h1>
    <p>Hai effettuato il login alle: <?= date("H:i:s", $login_time) ?></p>
    <p>Tempo trascorso: <?= $tempo_trascorso ?> secondi</p>

    <a href="logout.php">Logout</a>
</body>

</html>