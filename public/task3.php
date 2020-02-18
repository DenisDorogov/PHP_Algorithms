<?php
$a = 4;
$b = 4;
$array = [];
$counter = 1;
$countCycle = 2;
$start = 0;
$finish = 1;
$i = 0;
$iterationLog = [];
echo $countCycle % 2;

function spiral($x, $y) {
    global $counter,$countCycle, $start, $finish, $i;
    $i -= $start;
    for ($i ; $i<$x-$finish; ) {
        $array[$start][$i] = $counter;
        $counter++;
        if ($countCycle % 4 < 2 ) {$i++;} else {$i--;};
//        if ($counter == 10) {
//            var_dump($x);
//            die;
//        }

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
    global $array, $counter,$a, $b, $iterationLog;
    $iterator = 0;
    for ($i = $iterator; $i<$a-$iterator-1; $i++) {//i-столбцы,
        $array[$iterator][$i] = $counter++; //[строка][столбец]
        $iterationLog[] = [$i,$iterator];
    }
    for ($j = $iterator; $j<$b-$iterator-1; $j++) {
        $array[$j][$i] = $counter++;
        $iterationLog[] = [$i,$j];

    }
    for ($i; $i>$iterator; $i--) {
        $array[$j][$i] = $counter++;
        $iterationLog[] = [$i,$j];
    }
    for ($j; $j>$iterator; $j--) {
        $array[$j][$i] = $counter++;
        $iterationLog[] = [$i,$j];
    }


    if ($counter <= $a*$b)  {
        $iterator++;
        spiralSTD($x, $y);
    }
}

function render($array) {
    global $a, $b;
    $count = count($array);
    echo '<table>';
    for ($i= 0; $i < $count+1; $i++) {
        echo '<tr>';
        for ($j= 0; $j < count($array[$i]); $j++) {
            echo "<td width='20px'> {$array[$i][$j]} </td>";
        }
        echo '</tr>';
    }
    echo '</table>';

}

$start = microtime(true);
spiral($a, $b);
echo  microtime(true) - $start;

render($array);
//render($iterationLog);
