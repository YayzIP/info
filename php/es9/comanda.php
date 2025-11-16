<?php
session_start();
include './menu.php';

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $selected = isset($_GET['table']) ? intval($_GET['table']) : null;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comande</title>
    <style>
        a {
            text-decoration: none;
            color: green;
        }
    </style>
</head>

<body>
    <h1>Comande</h1>

    <p><a href="addComanda.php">Aggiungi comanda</a></p>
    <p><a href="index.php">Home</a></p>

    <?php if (empty($_SESSION['tavoli'])): ?>
        <p>Non ci sono tavoli.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($_SESSION['tavoli'] as $t => $orders): ?>
                <?php
                // compute total for this table
                $total = 0;
                if (is_array($orders)) {
                    foreach ($orders as $o) {
                        $p = isset($o['prezzo']) ? floatval($o['prezzo']) : 0;
                        $q = isset($o['quantita']) ? intval($o['quantita']) : 1;
                        $total += $p * $q;
                    }
                }
                ?>
                <li>
                    Tavolo <?= htmlspecialchars($t) ?> - Totale: €<?= number_format($total, 2, ',', '.') ?> - <a
                        href="comanda.php?table=<?= $t ?>">Vedi comande</a>
                </li>
            <?php endforeach; ?>
        </ul>

        <?php if ($selected !== null): ?>
            <h2>Comande tavolo <?= $selected ?></h2>
            <?php if (empty($_SESSION['tavoli'][$selected])): ?>
                <p>Non ci sono comande per questo tavolo.</p>
            <?php else: ?>
                <ul>
                    <?php
                    $selectedTotal = 0;
                    foreach ($_SESSION['tavoli'][$selected] as $order):
                        $selectedTotal += (isset($order['prezzo']) ? floatval($order['prezzo']) : 0) * (isset($order['quantita']) ? intval($order['quantita']) : 1);
                        ?>
                        <li><?= htmlspecialchars($order['categoria'] . ' - ' . $order['nome'] . ' x' . $order['quantita'] . ' - €' . $order['prezzo']) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <p><strong>Totale tavolo: €<?= number_format($selectedTotal, 2, ',', '.') ?></strong></p>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>

</body>

</html>