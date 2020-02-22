<?php
const COUNT = 20000;
const MIN_RAND = 1;
const MAX_RAND = 10000;
$iter = 0;

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
    $n = mt_rand(1, COUNT-1);
    echo "Удалено значение {$array[$n]} <br>";
    array_splice($array, $n, 1);
    return $array;
}

function findHole($array)
{
    $left = 0;
    $right = count($array) - 1;
    global $iter;
    while ($right - $left >= 2) {
        $iter++;
        $middle = (int)floor(($left + $right) / 2);

        if (($middle - $left) !== ($array[$middle] - $array[$left])) {
            $right = $middle;
        } elseif (($right - $middle) !== ($array[$right] - $array[$middle])) {
            $left = $middle;
        } else {
            echo "Массив не подходит условию";
        }
    }
    return $array[$left] + 1;
}
$array = randomArray();

echo 'Отсутствует значение: ' . findHole($array);
echo " Найдено с помощью  {$iter} итераций";
var_dump($array);


