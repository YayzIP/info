<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <?php
function printNum($num)
{
    echo "<tr><td>$num</td></tr>";
}

$array = [];
for ($i = 0; $i < 100; $i++) {
    if ($i % 3 == 0) {
        $array[] = $i;
        printNum($i);
    }
}
printNum(count($array));

$tot = 0;
for ($i = 0; $i < count($array); $i++) {
    $tot += $array[$i];
}
printNum($tot / count($array));

?>
        </tr>

    </table>

</body>

</html>