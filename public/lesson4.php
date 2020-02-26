<?php
$file = new SplFileObject('numbers.txt');
$file->seek(0);
$num1 = str_split($file->current());
$file->seek(1);
$num2 = str_split($file->current());

function largeSum($n1, $n2)
{
    $result = '';
    $shift = 0;
    $count1 = 5;
    $count2 = 0;
    if (count($n1) < count($n2)) {
        $temp = $n1;
        $n1 = $n2;
        $n2 = $temp;
        $count1 = count($n1);
        $count2 = count($n2);
    }
    var_dump($count1);
//    for ($i = $count1; $i >= 0; $i--) {
//        $sum = $n1[$i] + $n2[$i];
//        if ($sum > 9) {
//            $result = $result . (string)(($sum - 10) + $shift);
//            $shift = 1;
//        } else {
//            $result = $result . (string)($sum + $shift);
//            $shift = 0;
//        }
//    }
    var_dump($result);
}

largeSum($num1, $num2);

//var_dump($num1);
//var_dump($num2);