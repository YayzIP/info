<?php
session_start();

if (!isset($_SESSION["carrello"])) {
    $_SESSION["carrello"] = [];
}

$prodotti = [
    "1" => ["nome" => "forbici", "prezzo" => 8.2],
    "2" => ["nome" => "spazzolino", "prezzo" => 2.5],
    "3" => ["nome" => "tenda", "prezzo" => 45.8]
];

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $id = $_GET["add"] ?? "";


    if (isset($prodotti[$id])) {

        if (!contains($id)) {
            $_SESSION["carrello"][] = ["id" => $id, "prodotto" => $prodotti[$id], "qta" => 1];
        }
        header(header: "Location: prodotti.php");
        exit;
    }
}

// Aggiorna anche il carrello
function contains($id){
    foreach ($_SESSION["carrello"] as &$prodotto) {
        if ($id === $prodotto["id"]) {
            $prodotto["qta"]++;
            return true;
        }
    }
    return false;
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
    <ul>
        <?php foreach ($_SESSION["carrello"] as $prodotto): ?>
            <li>
                <p><?= $prodotto["prodotto"]["nome"] ?></p>
                <p><?= $prodotto["qta"] ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
    <p>
        <?php
        $count = 0;
        foreach ($_SESSION["carrello"] as $prodotto) {
            $count += $prodotto["qta"];
        }
        echo $count;
        ?>
    </p>
    <p>
        <?php
        $tot = 0;
        foreach ($_SESSION["carrello"] as $prodotto) {
            $tot += $prodotto["prodotto"]["prezzo"];
        }
        echo $tot . "€";
        ?>
    </p>

    <a href="checkout.php?action=clear">svuota carrello</a><br>
    <a href="checkout.php?action=confirm">conferma ordine</a><br>
    <a href="prodotti.php">Aggiungi altri prodotti</a>
</body>

</html>