<?php
function clean($s)
{
    return htmlspecialchars(trim((string) $s), ENT_QUOTES, 'UTF-8');
}

$data = [];
$fields = [
    'nome',
    'cognome',
    'data_nascita',
    'luogo_nascita',
    'indirizzo',
    'citta',
    'cap',
    'provincia',
    'telefono',
    'email',
    'cf'
];

foreach ($fields as $f) {
    $data[$f] = isset($_POST[$f]) ? clean($_POST[$f]) : '';
}

$errors = [];
foreach ($data as $required) {
    if ($required === '') {
        $errors[] = $required;
    }
}
if ($data['nome'] === '' || $data['cognome'] === '') {
    $errors[] = 'Nome e cognome sono obbligatori.';
}
if ($data['email'] !== '' && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Email non valida.';
}
if ($data['cap'] !== '' && !preg_match('/^[0-9]{5}$/', $data['cap'])) {
    $errors[] = 'CAP deve essere formato da 5 cifre.';
}
if ($data['provincia'] !== '' && !preg_match('/^[A-Za-z]{2}$/', $data['provincia'])) {
    $errors[] = 'Provincia: inserire la sigla di due lettere.';
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

        .errors {
            color: #a00;
            margin-bottom: 16px
        }
    </style>
</head>

<body>
    <h1>Riepilogo dati</h1>

    <?php if (!empty($errors)): ?>
        <div class="errors">
            <strong>Si sono verificati questi errori:</strong>
            <ul>
                <?php foreach ($errors as $err): ?>
                    <li><?php echo $err; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <table>
        <tr>
            <th>Campo</th>
            <th>Valore</th>
        </tr>
        <tr>
            <td>Nome</td>
            <td><?php echo $data['nome']; ?></td>
        </tr>
        <tr>
            <td>Cognome</td>
            <td><?php echo $data['cognome']; ?></td>
        </tr>
        <tr>
            <td>Data di nascita</td>
            <td><?php echo $data['data_nascita']; ?></td>
        </tr>
        <tr>
            <td>Luogo di nascita</td>
            <td><?php echo $data['luogo_nascita']; ?></td>
        </tr>
        <tr>
            <td>Indirizzo</td>
            <td><?php echo $data['indirizzo']; ?></td>
        </tr>
        <tr>
            <td>Città</td>
            <td><?php echo $data['citta']; ?></td>
        </tr>
        <tr>
            <td>CAP</td>
            <td><?php echo $data['cap']; ?></td>
        </tr>
        <tr>
            <td>Provincia</td>
            <td><?php echo $data['provincia']; ?></td>
        </tr>
        <tr>
            <td>Telefono</td>
            <td><?php echo $data['telefono']; ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $data['email']; ?></td>
        </tr>
        <tr>
            <td>Codice fiscale</td>
            <td><?php echo $data['cf']; ?></td>
        </tr>
    </table>

    <p><a href="anagrafici.php">Torna al form</a></p>
</body>

</html>