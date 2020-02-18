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
    for ($i = 0; $i<$x; $i++) {//i-столбцы,
        $array[0][$i] = $counter++; //[строка][столбец]
    }
    for ($j = 1; $j<$y; $j++) {
        $array[$j][$i-1] = $counter++;
    }
    for ($i = $i-2; $i>=0; $i--) {
        $array[$j-1][$i] = $counter++;
    }
    echo $i;
    echo $j;
    for ($j = $j-2; $j>0; $j--) {
        $array[$j][$i+1] = $counter++;
    }
}

function render($array) {
    global $a, $b;
    echo '<table>';
    for ($i= 0; $i < $a+1; $i++) {
        echo '<tr>';
        for ($j= 0; $j < $b; $j++) {
            echo "<td width='20px'> {$array[$i][$j]} </td>";
        }
        echo '</tr>';
    }
    echo '</table>';

}

$start = microtime(true);
spiralSTD($a, $b);
var_dump($array);
echo  microtime(true) - $start;

render($array);
