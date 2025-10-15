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

    $array = [];
    $len = 10;
    for ($i = 0; $i < $len; $i++) {
        $array[] = rand(1, 100);
    }

    // 1
    foreach ($array as $num) {
        echo "<p>$num</p>";
    }

    // 2 e 3
    $min = min($array);
    $max = max($array);
    $media = 0;
    $tot = 0;

    foreach ($array as $num) {
        $tot += $num;
    }

    $media = $tot/count($array);

    echo "<p>minimo => $min</p>";
    echo "<p>massimo => $max</p>";
    echo "<p>media => $media</p>";


    // 4
    $ordineInverso = array_reverse($array);
    foreach($ordineInverso as $num) {
        echo "<p>$num</p>";

    }


    // 5
    $pari = [];

    foreach ($array as $key => $num) {
        if ($num % 2 == 0) {
            $pari["P$key"] = $num;
        }
    }
    var_dump($pari);

            
?>
</body>
</html>