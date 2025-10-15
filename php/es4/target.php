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

$name = $_POST['name'];
$age = $_POST['age'];
$months = (int)$_POST['months'];
$users = $_POST['users'];
$earnings = $_POST['earnings'];

function getPrice($age)
{
    if ($age < 18 || $age > 65) {
        return 35;
    }
    return 45;
}

function getDiscount($months)
{
    switch ($months) {
        case 1:
            return 1;

        case 2:
            return 0.9;

        case 3:
            return 0.85;

        default:
            return 0.8;
    }
}

$price = $months * getPrice($age) * getDiscount($months);

echo "<p>$name - $age - Months: $months - Price: $price </p><br>";

$users++;
$earnings = $earnings + $price;

?>

    <!-- <a href="javascript:window.history.back();">Back</a><br> -->

    <form action="./index.php" method="post">
        <input type="hidden" name="users" value="<?php echo $users ?>">
        <input type="hidden" name="earnings" value="<?php echo $earnings ?>">
        <input type="submit" value="Add User">
    </form>

    <form action="./db.php" method="post">
        <input type="hidden" name="users" value="<?php echo $users ?>">
        <input type="hidden" name="earnings" value="<?php echo $earnings ?>">
        <input type="submit" value="Counter">
    </form>


</body>

</html>