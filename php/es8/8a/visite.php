<?php
session_start();

if (isset($_POST["azzera"])) {
    session_destroy();
    header("Location: index.php");
    exit;
}
// Se non esiste il contatore, lo inizializzo
if (!isset($_SESSION["contatore"])) {
    $_SESSION["contatore"] = 0;
}
$_SESSION["contatore"]++;

// Salvo o mostro l'ultima visita
$_SESSION["ultima_visita"] = date("d/m/Y H:i:s");

header("Location: index.php");
exit;