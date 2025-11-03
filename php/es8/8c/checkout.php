<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $action = $_GET["action"] ?? "";
    if ($action === "clear") {
        session_destroy();
        header("Location: carrello.php");
        exit;
    } else if ($action === "confirm") {

    }
}
?>