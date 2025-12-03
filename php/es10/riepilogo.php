<?php

session_start();

if (!isset($_SESSION['filled']) || $_SESSION['filled'] < 2) {
    header('Location: anagrafici.php', true, 303);
    exit;
}

?>

<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riepilogo dati</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 20px
        }

        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px
        }

        td,
        th {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left
        }
    </style>
</head>

<body>
    <h1>Riepilogo dati</h1>

    <table>
        <tr>
            <th>Campo</th>
            <th>Valore</th>
        </tr>
        <tr>
            <td>Nome</td>
            <td><?php echo $_SESSION['form_data']['nome']; ?></td>
        </tr>
        <tr>
            <td>Cognome</td>
            <td><?php echo $_SESSION['form_data']['cognome']; ?></td>
        </tr>
        <tr>
            <td>Data di nascita</td>
            <td><?php echo $_SESSION['form_data']['data_nascita']; ?></td>
        </tr>
        <tr>
            <td>Luogo di nascita</td>
            <td><?php echo $_SESSION['form_data']['luogo_nascita']; ?></td>
        </tr>
        <tr>
            <td>Indirizzo</td>
            <td><?php echo $_SESSION['form_data']['indirizzo']; ?></td>
        </tr>
        <tr>
            <td>Città</td>
            <td><?php echo $_SESSION['form_data']['citta']; ?></td>
        </tr>
        <tr>
            <td>CAP</td>
            <td><?php echo $_SESSION['form_data']['cap']; ?></td>
        </tr>
        <tr>
            <td>Provincia</td>
            <td><?php echo $_SESSION['form_data']['provincia']; ?></td>
        </tr>
        <tr>
            <td>Telefono</td>
            <td><?php echo $_SESSION['form_data']['telefono']; ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $_SESSION['form_data']['email']; ?></td>
        </tr>
        <tr>
            <td>Codice fiscale</td>
            <td><?php echo $_SESSION['form_data']['cf']; ?></td>
        </tr>
    </table>

    <p><a href="anagrafici.php">Torna al form</a></p>
</body>

</html>