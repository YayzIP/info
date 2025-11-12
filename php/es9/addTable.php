<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $table = isset($_POST['table']) ? intval($_POST['table']) : -1;
    if (isAvailable($table)) {
        if (!isset($_SESSION['tavoli'])) {
            $_SESSION['tavoli'] = [];
        }
        // Initialize the table with an empty orders array
        $_SESSION['tavoli'][$table] = [];
        header('Location: index.php?result=success');
        exit;
    }
    header('Location: index.php?result=error');
    exit;
}

function isAvailable($toAdd)
{
    if ($toAdd === -1) {
        return false;
    }

    if (!isset($_SESSION['tavoli'])) {
        return true;
    }

    // Check if a table with this number already exists (by key)
    return !array_key_exists($toAdd, $_SESSION['tavoli']);
}

?>