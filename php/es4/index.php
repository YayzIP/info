<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

$users = $_POST['users'] ?? 0;
$earnings = $_POST['earnings'] ?? 0;

?>

    <h2>Inserisci i tuoi dati</h2>
    <form action="target.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>

        <p>Plan:</p>
        <input type="radio" id="one" name="months" value="1" required>
        <label for="one">1 Month</label><br>

        <input type="radio" id="two" name="months" value="2">
        <label for="two">2 Months</label><br>

        <input type="radio" id="three" name="months" value="3">
        <label for="three">3 Months</label><br>

        <input type="radio" id="year" name="months" value="12">
        <label for="year">1 Year</label><br><br>

        <input type="hidden" name="users" value="<?php echo $users ?>">
        <input type="hidden" name="earnings" value="<?php echo $earnings ?>">


        <input type="submit" value="Submit">
    </form>

</body>

</html>