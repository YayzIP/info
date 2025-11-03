<?php

$prodotti = [
    "1" => ["nome" => "forbici", "prezzo" => 8.2],
    "2" => ["nome" => "spazzolino", "prezzo" => 2.5],
    "3" => ["nome" => "tenda", "prezzo" => 45.8]
]

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul>
        <?php foreach ($prodotti as $id => $prodotto): ?>
            <li>
                <p><?= $prodotto["nome"] ?></p>
                <p>prezzo: <?= $prodotto["prezzo"] ?></p>
                <a href="carrello.php?add=<?= $id ?>">ADD</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <a href="carrello.php">Visualizza il carrello</a>

</body>

</html>