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
//echo $countCycle % 2;

//Универсальная рекурсия (пока не работает)
function spiral($x, $y)
{
    global $counter, $countCycle, $start, $finish, $i;
    $i -= $start;
    for ($i; $i < $x - $finish;) {
        $array[$start][$i] = $counter;
        $counter++;
        if ($countCycle % 4 < 2) {
            $i++;
        } else {
            $i--;
        };
//        if ($counter == 10) {
//            var_dump($x);
//            die;
//        }
    }

//    ($countCycle % 2 == 0) ? $i++ : $i--;
    $start = $x;
    $x = $x - 1;//Убираем номер последней заполненной стороны
    $countCycle++;
    if ($counter == 16) {

    } else {
        spiral($y, $x);
    }

}

//4 цикла заполняющих периметр, + рекурсия для перехода внутрь.
function spiralSTD($x, $y)
{
    global $array, $counter, $a, $b, $iterationLog, $start;
    $j = $start;
    $i = $start;
    echo 'Start i='. $i. ' j='.$j . PHP_EOL. '<br>';
    for ($i ; $i < $x - $start - 1; $i++) {//i-столбцы,
        $array[$j][$i] = $counter++; //[строка][столбец]
        $iterationLog[] = [$i, $start, $counter - 1]; //Отладка
    }
    echo 'FIRST   i='. $i. ' j='.$j . PHP_EOL. '<br>';
    $iterationLog[] = ['--', '--'];

    for ($j ; $j < $y - $start - 1; $j++) {
        $array[$j][$i] = $counter++;
        $iterationLog[] = [$i, $j, $counter - 1];
    }
    echo 'SECOND i='. $i. ' j='.$j . PHP_EOL. '<br>';
    $iterationLog[] = ['--', '--'];

    for ($i; $i > $start; $i--) {
        $array[$j][$i] = $counter++;
        $iterationLog[] = [$i, $j, $counter - 1];
    }
    echo 'THIRD  i='. $i. ' j='.$j . PHP_EOL. '<br>';
    $iterationLog[] = ['--', '--'];

    for ($j; $j > $start+1; $j--) {
        $array[$j][$i] = $counter++;
        $iterationLog[] = [$i, $j, $counter - 1];
    }
    echo 'FOURTH i='. $i. ' j='.$j . PHP_EOL . '<br><br>';

    $start = $start + 1;
    $iterationLog[] = ['==', '==', $start];


    if ($counter < 20) {
        spiralSTD($y, $x);
    }
}

function render($array)
{
    global $a, $b;
    $count = count($array);
    echo '<table>';
    for ($i = 0; $i < $count + 1; $i++) {
        echo '<tr>';
        for ($j = 0; $j < count($array[$i]); $j++) {
            echo "<td width='20px'> {$array[$i][$j]} </td>";
        }
        echo '</tr>';
    }
    echo '</table>';

}

//$start = microtime(true);
spiralSTD($a, $b);
//echo microtime(true) - $start;

render($array);
render($iterationLog);
