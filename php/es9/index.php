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
    <title>Document</title>
    <link rel="stylesheet" href="styles/home.css">
</head>

<body>
    <h1>Home Page</h1>
    <p>ciao <?= $_SESSION['user'] ?>!!!!!!!!</p>
    <?php if ($result === 'success'): ?>
        <p style="color: green;">Aggiunto con successo</p>
    <?php elseif ($result === 'error'): ?>
        <p style="color: red;">Errore: non disponibile</p>
    <?php endif; ?>

    <button id="addTable">Aggiungi tavolo</button>
    <a href="comanda.php"><button id="addComanda">Aggiungi comanda</button></a>

    <form action="addTable.php" style="display: none; margin-top: 20px;" method="POST">
        <label for="table">Tavolo</label>
        <input type="number" name="table" id="table" min="0" required>
        <input type="submit" value="Add">
    </form>

    <a href="logout.php" style="text-decoration: none;"><button id="logout">logout</button></a>

    <script src="script/home.js"></script>
</body>

</html>