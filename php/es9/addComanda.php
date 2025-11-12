<?php
session_start();

// Require login
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

include './menu.php';

// Helper: check if table exists
function table_exists($table)
{
    return isset($_SESSION['tavoli']) && array_key_exists($table, $_SESSION['tavoli']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $table = isset($_POST['table']) ? intval($_POST['table']) : -1;
    $dish = $_POST['dish'] ?? '';
    $qty = isset($_POST['qty']) ? max(1, intval($_POST['qty'])) : 1;

    if ($table === -1 || $dish === '' || !table_exists($table)) {
        header('Location: index.php?result=order_error');
        exit;
    }

    // dish value encoded as tipo::nome
    $parts = explode('::', $dish, 2);
    if (count($parts) !== 2) {
        header('Location: index.php?result=order_error');
        exit;
    }
    [$tipo, $nome] = $parts;

    if (!isset($menu[$tipo][$nome])) {
        header('Location: index.php?result=order_error');
        exit;
    }

    $prezzo = $menu[$tipo][$nome]['prezzo'];

    $orderItem = [
        'nome' => $nome,
        'categoria' => $tipo,
        'prezzo' => $prezzo,
        'quantita' => $qty,
    ];

    // Append order to the table's orders array
    if (!isset($_SESSION['tavoli'][$table]) || !is_array($_SESSION['tavoli'][$table])) {
        $_SESSION['tavoli'][$table] = [];
    }
    $_SESSION['tavoli'][$table][] = $orderItem;

    header('Location: index.php?result=order_success');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aggiungi Comanda</title>
    <style>
        a {
            text-decoration: none;
            color: green;
        }
    </style>
</head>

<body>
    <h1>Aggiungi comanda</h1>

    <?php if (empty($_SESSION['tavoli'])): ?>
        <p>Non ci sono tavoli. <a href="index.php">Torna</a> e aggiungi un tavolo prima.</p>
    <?php else: ?>
        <form action="addComanda.php" method="POST">
            <label for="table">Tavolo</label>
            <select name="table" id="table" required>
                <option value="" disabled selected>Scegli un tavolo</option>
                <?php foreach (array_keys($_SESSION['tavoli']) as $t): ?>
                    <option value="<?= $t ?>"><?= $t ?></option>
                <?php endforeach; ?>
            </select>

            <label for="dish">Piatto</label>
            <select name="dish" id="dish" required>
                <option value="" disabled selected>Scegli un piatto</option>
                <?php foreach ($menu as $tipo => $piatti): ?>
                    <?php foreach ($piatti as $nome => $piatto): ?>
                        <option value="<?= $tipo . '::' . $nome ?>">
                            <?= htmlspecialchars($tipo . ' - ' . $nome . ' - €' . $piatto['prezzo']) ?>
                        </option>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </select>

            <label for="qty">Quantità</label>
            <input type="number" name="qty" id="qty" value="1" min="1" required>

            <button type="submit">Aggiungi</button>
        </form>
    <?php endif; ?>

</body>

</html>