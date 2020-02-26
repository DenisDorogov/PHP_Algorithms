<?php
$file = new SplFileObject('numbers.txt');

function preparationNumber($file, $line) {
    $file->seek($line);
    $num = $file->current();

    $num = preg_filter('/\D+/', '', $num);
    echo $num . '<br>';
    return array_reverse(str_split($num));
}

function largeSum($n1, $n2)
{
    $result = '';
    $shift = 0;
    $count1 = count($n1);
    $count2 = count($n2);
    if ($count1 < $count2) {
        $temp = $n1;
        $n1 = $n2;
        $n2 = $temp;
        $count1 = count($n1);
//        $count2 = count($n2);
    }

    for ($i = 0; $i < $count1; $i++) {
        $sum = $n1[$i] + $n2[$i] + $shift;
//        echo "sum = $sum <br>";
        if ($sum > 9) {
            $result = (string)(($sum - 10)) . $result;
//            echo "result = $result <br>";
            $shift = 1;
        } else {
            $result = (string)($sum) . $result;
//            echo "result = $result <br>";
            $shift = 0;
        }
    }
    if ($shift == 1) {
        $result = '1' . $result;
    }


    return $result;
}

$num1 = preparationNumber($file, 0);
$num2 = preparationNumber($file, 1);

$file = new SplFileObject('numbers.txt', 'a');

$answer = largeSum($num1, $num2);

if ($file->fwrite($answer)) {
    echo "Результат записан в файл <br>";
    echo "Сумма равна: {$answer}";
}



