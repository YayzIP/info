<?php

session_start();

include 'getdata.php';

if (isset($_SESSION['filled'])) {
    switch ($_SESSION['filled']) {
        case 1:
            header('Location: contatti.php', true, 303);
            exit;

        case 2:
            header('Location: riepilogo.php', true, 303);
            exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fields = [
        'nome',
        'cognome',
        'cf',
        'sesso',
        'data_nascita',
        'luogo_nascita',
        'indirizzo',
        'citta',
        'cap',
        'provincia'
    ];

    $data = getData($fields);

    foreach ($data as $key => $value) {
        $_SESSION['form_data'][$key] = $value;
    }

    $errors = [];

    if ($data['cap'] !== '' && !preg_match('/^[0-9]{5}$/', $data['cap'])) {
        $errors[] = 'CAP deve essere formato da 5 cifre.';
    }
    if ($data['provincia'] !== '' && !preg_match('/^[A-Za-z]{2}$/', $data['provincia'])) {
        $errors[] = 'Provincia: inserire la sigla di due lettere.';
    }
    if ($data['cf'] !== '' && !preg_match('/^[A-Z]{6}[0-9]{2}[A-Z][0-9]{2}[A-Z][0-9]{3}[A-Z]$/', $data['cf'])) {
        $errors[] = 'Codice_Fiscale: inserire 16 caratteri secondo il pattern del codice fiscale.';
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
        header('Location: anagrafici.php', true, 303);
        exit;
    } else {
        $_SESSION['filled'] = 1;
        header('Location: contatti.php', true, 303);
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
    <h1>Form dati anagrafici</h1>
    <?php if (isset($_SESSION['errors'])): ?>
        <?php foreach ($_SESSION['errors'] as $error): ?>
            <p style="color: red;"><?= $error ?></p>
        <?php endforeach ?>
    <?php endif;
    unset($_SESSION['errors']);
    ?>
    <form method="POST" novalidate>
        <fieldset>
            <legend>Informazioni personali</legend>

            <label for="nome">Nome *</label><br>
            <input type="text" id="nome" name="nome" required maxlength="255" <?php if (isset($_SESSION['form_data']['nome'])): ?> value="<?= $_SESSION['form_data']['nome'] ?>" <?php endif ?>><br><br>

            <label for="cognome">Cognome *</label><br>
            <input type="text" id="cognome" name="cognome" required maxlength="255" <?php if (isset($_SESSION['form_data']['cognome'])): ?> value="<?= $_SESSION['form_data']['cognome'] ?>" <?php endif ?>><br><br>

            <label for="cf">Codice fiscale *</label><br>
            <input type="text" id="cf" name="cf" <?php if (isset($_SESSION['form_data']['cf'])): ?> value="<?= $_SESSION['form_data']['cf'] ?>" <?php endif ?> required maxlength="16" minlength="16"
                pattern="^[A-Z]{6}[0-9]{2}[A-Z][0-9]{2}[A-Z][0-9]{3}[A-Z]$"
                title="Inserisci un codice fiscale valido (16 caratteri)"><br><br>

            <label for="sesso">Sesso *</label><br>
            <select name="sesso" id="sesso" required>
                <option value="M" <?php if (isset($_SESSION['form_data']['sesso']) && $_SESSION['form_data']['sesso'] == 'M'): ?>selected<?php endif ?>>Maschio</option>
                <option value="F" <?php if (isset($_SESSION['form_data']['sesso']) && $_SESSION['form_data']['sesso'] == 'F'): ?>selected<?php endif ?>>Femmina</option>
            </select><br><br>

            <label for="data_nascita">Data di nascita *</label><br>
            <input type="date" id="data_nascita" name="data_nascita" <?php if (isset($_SESSION['form_data']['data_nascita'])): ?> value="<?= $_SESSION['form_data']['data_nascita'] ?>" <?php endif ?> required><br><br>

            <label for="luogo_nascita">Luogo di nascita *</label><br>
            <input type="text" id="luogo_nascita" name="luogo_nascita" maxlength="80" <?php if (isset($_SESSION['form_data']['luogo_nascita'])): ?> value="<?= $_SESSION['form_data']['luogo_nascita'] ?>" <?php endif ?> required><br><br>

        </fieldset>

        <fieldset>
            <legend>Residenza</legend>
            <label for="indirizzo">Indirizzo *</label><br>
            <input type="text" id="indirizzo" name="indirizzo" maxlength="255" <?php if (isset($_SESSION['form_data']['indirizzo'])): ?> value="<?= $_SESSION['form_data']['indirizzo'] ?>" <?php endif ?> required><br><br>

            <label for="citta">Città *</label><br>
            <input type="text" id="citta" name="citta" maxlength="80" <?php if (isset($_SESSION['form_data']['citta'])): ?> value="<?= $_SESSION['form_data']['citta'] ?>" <?php endif ?> required><br><br>

            <label for="cap">CAP *</label><br>
            <input type="text" id="cap" name="cap" <?php if (isset($_SESSION['form_data']['cap'])): ?> value="<?= $_SESSION['form_data']['cap'] ?>" <?php endif ?> pattern="[0-9]{5}" maxlength="5" title="Inserisci 5 cifre"
                required><br><br>

            <label for="provincia">Provincia (sigla) *</label><br>
            <input type="text" id="provincia" name="provincia" <?php if (isset($_SESSION['form_data']['provincia'])): ?> value="<?= $_SESSION['form_data']['provincia'] ?>" <?php endif ?> maxlength="2" pattern="[A-Za-z]{2}"
                title="Inserisci 2 lettere" required>
        </fieldset>

        <button type="submit">Invia</button>
        <button type="reset">Annulla</button>
    </form>
</body>

</html>