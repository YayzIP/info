<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>

<?php


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = $_POST['name'] ?? "";
    $email = $_POST['email'] ?? "";
    $message = $_POST['message'] ?? "";

    $errors = [];

    // Sanifica input
    $name = filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS); // rimuove caratteri pericolosi
    $email = filter_var($email, FILTER_SANITIZE_EMAIL); // pulisce l'email
    $message = filter_var($message, FILTER_SANITIZE_FULL_SPECIAL_CHARS); // pulisce il messaggio

    // Validazione Nome
    if (empty($name)) {
        $errors[] = "Il nome è obbligatorio";
    } elseif (!preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/u", $name)) {
        $errors[] = "Il nome può contenere solo lettere e spazi";
    }

    // Validazione Email
    if (empty($email)) {
        $errors[] = "L'email è obbligatoria";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Formato email non valido";
    }

    // Validazione Messaggio
    if (strlen($message) > 300) {
        $errors[] = "Il messaggio non può superare 300 caratteri";
    }

    // Se tutto è valido
    if (empty($errors)) {
        // Va fatto qualcosa
        header("Location: thankyou.php");
        exit;
    } else {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}


?>