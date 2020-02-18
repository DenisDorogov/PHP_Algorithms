<?php
//$number = 600851475143;
//$dividers = new SplMaxHeap();
//
//function divisibility($num, SplMaxHeap $dividers) {
//    for ($i=2; $i<=$num; $i++) {
//        if (($num % $i) == 0) {
//            $dividers->insert($num/$i);
//        }
//        if ($i % 1000000 == 0) echo $i/1000000 . '  ';
//    }
////    foreach ($dividers as $value) {
////        if (($num % $value) == 0) {
////            $result[] = $num/$value;
////        }
//
////    }
//    return $dividers->extract();
//}
//var_dump(divisibility($number, $dividers));
function maxPrimeDivider($n)
{
    $res = $n % 2 ? 1 : 2;

    while (!($n % 2)) {
        $n /= 2;
    }

    for ($q = 3; $q * $q < $n; $q += 2) {
        for (; !($n % $q); $n /= $q) {
            $res = $q;
        }
    }

    return $res > $n ? $res : $n;
}

$n = 41;
print_r('Самый большой делитель числа ' . $n . ' = ' . maxPrimeDivider($n) . PHP_EOL);
$n = 600851475143;
$t = microtime(true);
print_r('Самый большой делитель числа ' . $n . ' = ' . maxPrimeDivider($n) . PHP_EOL);
echo microtime(true) - $t;
