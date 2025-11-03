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
        $_SESSION["carrello"][] = $prodotti[$id];
        header(header: "Location: prodotti.php");
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
    <ul>
        <?php foreach ($_SESSION["carrello"] as $prodotto): ?>
            <li>
                <p><?= $prodotto["nome"] ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
    <p><?= count($_SESSION["carrello"]) ?></p>
    <p>
        <?php
        $tot = 0;
        foreach ($_SESSION["carrello"] as $prodotto) {
            $tot += $prodotto["prezzo"];
        }
        echo $tot . "€";
        ?>
    </p>

    <a href="checkout.php?action=clear">svuota carrello</a><br>
    <a href="checkout.php?action=confirm">conferma ordine</a>
</body>

</html>