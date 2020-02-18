<?php
$a = 4;
$b = 4;
$array = [];
$counter = 1;
$countCycle = 1;
$start = 0;
$i = 0;

function spiral($x, $y) {
    global $counter,$countCycle, $start, $i;
    $i -= $start;
    for ($i ; $i<$x; ) {
        $array[$start][$i] = $counter;
        $counter++;
        if ($countCycle % 2 == 0) {$i++;} else {$i--;};
        if ($counter == 10) {
            var_dump($x);
            die;
        }

    }

//    ($countCycle % 2 == 0) ? $i++ : $i--;
    $start = $x;
    $x = $x-1;//Убираем номер последней заполненной стороны
    $countCycle++;
    if ($counter == 16) {

    } else {
        spiral($y, $x);
    }

}

function spiralSTD($x, $y) {
    global $array, $counter;
    for ($i = 0; $i<$x; $i++) {
        $array[0][$i] = $counter++;
        echo $array[0][$i];
    }
    echo '<br>';
    for ($j = 1; $j<$y; $j++) {
        $array[$j][$i-1] = $counter++;
        echo $array[$j][$i-1];
    }
    echo '<br>';

    for ($i = $i-1; $i>0; $i--) {
        $array[$j][$i] = $counter++;
        echo $array[$j][$i];

    }
    echo '<br>';

    for ($j = $j-2; $j>0; $j--) {
        $array[$j][$i] = $counter++;
        echo $array[$j][$i];

    }
}

function render($array) {
    foreach ($array as $row) {
        var_dump($row);
        echo '<tr>';
        foreach ($row as $value) {
            var_dump($row);
            echo "<td> {$value} </td>";
        }
        echo '</tr>';
    }
}

$start = microtime(true);
spiralSTD($a, $b);
var_dump($array);
echo  microtime(true) - $start;

render($array);
