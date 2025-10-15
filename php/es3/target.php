<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$materia = $_POST['materia'];

echo "La materia preferita di $nome $cognome è $materia";


?>

</body>

</html>