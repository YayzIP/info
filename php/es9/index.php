<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
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

    <button id="addTable">Aggiungi tavolo</button>
    <button id="addComanda">Aggiungi comanda</button>

    <form action="addTable.php" style="display: none; margin-top: 20px;" method="POST">
        <label for="table">Tavolo</label>
        <input type="number" name="table" id="table" min="0" required>
        <input type="submit" value="Add">
    </form>

    <form action="addComanda.php" style="display: none; margin-top: 20px;">
        <label for="table">Tavolo</label>
        <select name="table" id="table">
            <?php foreach ($_SESSION["tavoli"] as $tavolo): ?>
                <option value="<?= $tavolo ?>"><?= $tavolo ?></option>
            <?php endforeach ?>
        </select>
    </form>



    <a href="logout.php" style="text-decoration: none;"><button id="logout">logout</button></a>

    <script src="script/home.js"></script>
</body>

</html>