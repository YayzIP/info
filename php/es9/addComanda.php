<?php
session_start();


if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

include './menu.php';
include './logoutBtnGenerator.php';
generateLogout();


function table_exists($table)
{
    return isset($_SESSION['tavoli']) && array_key_exists($table, $_SESSION['tavoli']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $table = isset($_POST['table']) ? intval($_POST['table']) : -1;
    $dish = $_POST['dish'] ?? '';
    $qty = isset($_POST['qty']) ? max(1, intval($_POST['qty'])) : 1;

    if ($table === -1 || $dish === '' || !table_exists($table)) {
        header('Location: index.php?result=error');
        exit;
    }

    $parts = explode('::', $dish, 2);
    if (count($parts) !== 2) {
        header('Location: index.php?result=error');
        exit;
    }
    [$tipo, $nome] = $parts;

    if (!isset($menu[$tipo][$nome])) {
        header('Location: index.php?result=error');
        exit;
    }

    $prezzo = $menu[$tipo][$nome]['prezzo'];

    $orderItem = [
        'nome' => $nome,
        'categoria' => $tipo,
        'prezzo' => $prezzo,
        'quantita' => $qty,
    ];

    if (!isset($_SESSION['tavoli'][$table]) || !is_array($_SESSION['tavoli'][$table])) {
        $_SESSION['tavoli'][$table] = [];
    }
    $_SESSION['tavoli'][$table][] = $orderItem;

    header('Location: index.php?result=success');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aggiungi Comanda</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center text-green-700">Aggiungi Comanda</h1>

        <?php if (empty($_SESSION['tavoli'])): ?>
        <p class="text-center text-gray-600 mb-4">
            Non ci sono tavoli.
            <a href="index.php" class="text-green-600 font-semibold hover:underline">Torna</a> e aggiungi un tavolo
            prima.
        </p>
        <?php else: ?>
        <form action="addComanda.php" method="POST" class="space-y-4">
            <div>
                <label for="table" class="block text-gray-700 font-medium mb-1">Tavolo</label>
                <select name="table" id="table" required
                    class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="" disabled selected>Scegli un tavolo</option>
                    <?php foreach (array_keys($_SESSION['tavoli']) as $t): ?>
                    <option value="<?= $t ?>"><?= $t ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label for="dish" class="block text-gray-700 font-medium mb-1">Piatto</label>
                <select name="dish" id="dish" required
                    class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="" disabled selected>Scegli un piatto</option>
                    <?php foreach ($menu as $tipo => $piatti): ?>
                    <?php foreach ($piatti as $nome => $piatto): ?>
                    <option value="<?= $tipo . '::' . $nome ?>">
                        <?= htmlspecialchars($tipo . ' - ' . $nome . ' - €' . $piatto['prezzo']) ?>
                    </option>
                    <?php endforeach; ?>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label for="qty" class="block text-gray-700 font-medium mb-1">Quantità</label>
                <input type="number" name="qty" id="qty" value="1" min="1" required
                    class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <button type="submit"
                class="w-full bg-green-600 text-white font-semibold py-2 rounded-md hover:bg-green-700 transition-colors">
                Aggiungi
            </button>
        </form>
        <?php endif; ?>
    </div>
</body>

</html>