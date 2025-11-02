<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
session_start();
$ultima_visita = $_SESSION["ultima_visita"] ?? "Nessuna visita precedente";
?>

<body>
    <form action="visite.php" method="POST">
        <button type="submit">Aggiungi Visita</button>
        <button type="submit" name="azzera">Azzera visite</button>
    </form>
    <h1>Hai aggiunto <?= $_SESSION["contatore"] ?? "0" ?> visite durante questa sessione.</h1>
    <p>Ultima visita: <?= htmlspecialchars($ultima_visita) ?></p>
</body>

</html>