<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Inserisci i tuoi dati</h2>
    <form action="target.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="cognome">Cognome:</label>
        <input type="text" id="cognome" name="cognome" required><br><br>

        <p>Materia preferita:</p>
        <input type="radio" id="informatica" name="materia" value="informatica" required>
        <label for="informatica">Informatica</label><br>

        <input type="radio" id="sistemi_reti" name="materia" value="sistemi e reti">
        <label for="sistemi_reti">Sistemi e reti</label><br>

        <input type="radio" id="tpsit" name="materia" value="tpsit">
        <label for="tpsit">TPSIT</label><br><br>

        <button type="submit">Invia</button>
    </form>
</body>

</html>