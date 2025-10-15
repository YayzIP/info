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
$users = $_POST['users'];
$earnings = $_POST['earnings'];

?>

<form action="./index.php" method="post">
        <input type="hidden" name="users" value="<?php echo $users ?>">
        <input type="hidden" name="earnings" value="<?php echo $earnings ?>">
        <input type="submit" value="Add User">
    </form>


    <?php

echo "users: $users --- earnings: $earnings";

?>

</body>
</html>