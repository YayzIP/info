<?php

session_start();

include 'getdata.php';

if (!isset($_SESSION['filled']) || $_SESSION['filled'] < 1) {
    header('Location: anagrafici.php', true, 303);
    exit;
}

if ($_SESSION['filled'] > 1) {
    header('Location: riepilogo.php', true, 303);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fields = ['telefono', 'cellulare', 'email'];

    $data = getData($fields);

    foreach ($data as $key => $value) {
        $_SESSION['form_data'][$key] = $value;
    }

    $errors = [];

    if ($data['email'] !== '' && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email non valida.';
    }

    if (!empty($errors)) {
        if (!isset($_SESSION['errors'])) {
            $_SESSION['errors'] = [];
        }
        foreach ($errors as $error) {
            $_SESSION['errors'][] = $error;
        }
    }

    if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
        header('Location: contatti.php', true, 303);
        exit;
    } else {
        $_SESSION['filled'] = 2;
        header('Location: riepilogo.php', true, 303);
        exit;
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="riepilogo.php" method="POST">
        <fieldset>
            <legend>Contatti</legend>
            <label for="telefono">Telefono</label><br>
            <input type="tel" id="telefono" name="telefono" <?php if (isset($_SESSION['form_data']['telefono'])): ?>
                    value="<?= $_SESSION['form_data']['telefono'] ?>" <?php endif ?> maxlength="20" required><br><br>

            <label for="cellulare">Cellulare</label><br>
            <input type="tel" id="cellulare" name="cellulare" <?php if (isset($_SESSION['form_data']['cellulare'])): ?>
                    value="<?= $_SESSION['form_data']['cellulare'] ?>" <?php endif ?> maxlength="20" required><br><br>

            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" <?php if (isset($_SESSION['form_data']['email'])): ?>
                    value="<?= $_SESSION['form_data']['email'] ?>" <?php endif ?> maxlength="120" required><br><br>

        </fieldset>
        <button type="submit">Invia</button>
        <button type="reset">Annulla</button>
    </form>
</body>

</html>