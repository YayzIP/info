<?php
if (!isset($_SESSION["utente"])) {
    header('Location: index.php');
    exit;
} else {
    $_SESSION["utente"] = ["username" => $_POST["username"], "password" => $_POST["password"]];
    echo "Benvenuto, " . $_SESSION["utente"];
}
?>