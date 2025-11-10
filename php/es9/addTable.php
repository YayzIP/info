<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $table = $_POST['table'] ?? -1;
}

function isAvailable($toAdd)
{
    if ($toAdd === -1) {
        return false;
    }

    if (!isset($_SESSION['tavoli'])) {
        return true;
    }
    foreach ($_SESSION['tavoli'] as $tavolo) {
        if ($toAdd === $tavolo) {
            return false;
        }
    }
    return true;
}

?>