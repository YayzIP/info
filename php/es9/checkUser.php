<?php

session_start();

$utenti = [
    "giampaolo" => "giampaolo",
    "carlo" => "carlo",
    "fucone" => "giampaolo",
    "mastrogiacomo" => "mastrogiacomo"
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? "";
    $password = $_POST['password'] ?? "";
    if (isset($utenti[$username])) {
        if ($utenti[$username] === $password) {
            $_SESSION['user'] = $username;
            header("Location: index.php");
            exit;
        }
        header("Location: login.php?error=password");
        exit;
    }
    header("Location: login.php?error=username");
    exit;
}

?>