<?php
const COUNT = 20;
const MIN_RAND = 1;
const MAX_RAND = 10000;

function randomArray()
{
    $start = mt_rand(MIN_RAND, MAX_RAND);
    for ($i = 0; $i < COUNT; $i++) {
        $array[] = $start;
        $start++;
    }
    return deleteItem($array);
}

function deleteItem($array)
{
    $n = mt_rand(0, COUNT);
    array_splice($array, $n, 1);
    return $array;
}

function findHole($array)
{
    $left = 0;
    $right = count($array) - 1;
    $iter = 0;
    while ($right - $left >= 1) {
        $middle = floor(($left + $right) / 2);
        echo 'Left - ' . $left;
        echo '| Middle - ' . $middle;
        echo '| Right - ' . $right . '<br>';
        if ($middle - $left !== ($array[$middle] - $array[$left])) {
            $right = $middle;
        } elseif ($right - $middle !== ($array[$right] - $array[$middle])) {
            $left = $middle;
        } else {
            echo "Массив не подходит условию";
        }
    }
    return $array[$left] + 1;
}
$array = randomArray();
var_dump($array);
echo (findHole($array));


