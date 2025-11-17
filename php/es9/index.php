<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $result = $_GET['result'] ?? "";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./styles/home.css">
</head>

<body class="bg-gray-100 min-h-screen flex flex-col items-center p-6">

    <div class="w-full max-w-xl bg-white shadow-lg rounded-xl p-6 mt-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Ciao
            <span class="tracking-wide">
                <?= $_SESSION['user'] ?>
            </span>
            👋
        </h1>

        <?php if ($result === 'success'): ?>
        <p class="text-green-600 font-medium mb-4">Aggiunto con successo</p>
        <?php elseif ($result === 'error'): ?>
        <p class="text-red-600 font-medium mb-4">Errore: non disponibile</p>
        <?php endif; ?>

        <div class="flex gap-3 mb-6">
            <button id="addTable"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                Aggiungi tavolo
            </button>

            <a href="comanda.php">
                <button id="addComanda"
                    class="bg-green-600 text-white px-4 py-2 rounded-lg shadow hover:bg-green-700 transition">
                    Aggiungi comanda
                </button>
            </a>
        </div>

        <form action="addTable.php" method="POST" class="hidden flex flex-col gap-3 mt-4" id="tableForm">

            <label for="table" class="text-gray-700 font-medium">Tavolo</label>
            <input type="number" name="table" id="table" min="0" required
                class="border rounded-lg px-3 py-2 outline-none focus:ring-2 focus:ring-blue-500">

            <input type="submit" value="Add"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition cursor-pointer w-28">
        </form>

        <div>
            <a href="logout.php">
                <button id="logout">
                    Logout
                </button>
            </a>
        </div>
    </div>

    <script>
    // Replace your external JS file
    const btn = document.getElementById('addTable');
    const form = document.querySelector('form');

    btn.addEventListener('click', () => {
        form.classList.toggle('hidden');
        form.classList.toggle('flex');
    });
    </script>

</body>

</html>