<?php
session_start();
include './menu.php';
include './logoutBtnGenerator.php';

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $selected = isset($_GET['table']) ? intval($_GET['table']) : null;
}

generateLogout();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comande</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen p-6">

    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-green-700 mb-6">Comande</h1>

        <div class="flex gap-4 mb-6">
            <a href="addComanda.php"
                class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded transition">Aggiungi
                comanda</a>
            <a href="index.php"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded transition">Home</a>
        </div>

        <?php if (empty($_SESSION['tavoli'])): ?>
        <p class="text-gray-600">Non ci sono tavoli.</p>
        <?php else: ?>
        <ul class="space-y-4">
            <?php foreach ($_SESSION['tavoli'] as $t => $orders): ?>
            <?php
                    $total = 0;
                    if (is_array($orders)) {
                        foreach ($orders as $o) {
                            $p = isset($o['prezzo']) ? floatval($o['prezzo']) : 0;
                            $q = isset($o['quantita']) ? intval($o['quantita']) : 1;
                            $total += $p * $q;
                        }
                    }
                    ?>
            <li class="flex justify-between items-center bg-gray-100 p-4 rounded shadow-sm">
                <span class="font-medium">Tavolo <?= htmlspecialchars($t) ?> - Totale:
                    €<?= number_format($total, 2, ',', '.') ?></span>
                <a href="comanda.php?table=<?= $t ?>"
                    class="text-green-600 hover:text-green-800 font-semibold transition">Vedi comande</a>
            </li>
            <?php endforeach; ?>
        </ul>

        <?php if ($selected !== null): ?>
        <div class="mt-8">
            <h2 class="text-2xl font-semibold text-green-700 mb-4">Comande tavolo <?= $selected ?></h2>
            <?php if (empty($_SESSION['tavoli'][$selected])): ?>
            <p class="text-gray-600">Non ci sono comande per questo tavolo.</p>
            <?php else: ?>
            <ul class="space-y-2 mb-4">
                <?php
                            $selectedTotal = 0;
                            foreach ($_SESSION['tavoli'][$selected] as $order):
                                $selectedTotal += (isset($order['prezzo']) ? floatval($order['prezzo']) : 0) * (isset($order['quantita']) ? intval($order['quantita']) : 1);
                                ?>
                <li class="flex justify-between items-center bg-gray-50 p-3 rounded border">
                    <span><?= htmlspecialchars($order['categoria'] . ' - ' . $order['nome'] . ' x' . $order['quantita']) ?></span>
                    <span class="font-medium">€<?= number_format($order['prezzo'], 2, ',', '.') ?></span>
                </li>
                <?php endforeach; ?>
            </ul>
            <p class="text-lg font-bold text-green-700">Totale tavolo:
                €<?= number_format($selectedTotal, 2, ',', '.') ?></p>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <?php endif; ?>
    </div>

</body>

</html>