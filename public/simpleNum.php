<?php
$number = 600851475143;
$dividers = new SplMaxHeap();

function divisibility($num, SplMaxHeap $dividers) {
    for ($i=2; $i<=$num; $i++) {
        if (($num % $i) == 0) {
            $dividers->insert($num/$i);
        }
        if ($i % 1000000 == 0) echo $i/1000000 . '  ';
    }


//    foreach ($dividers as $value) {
//        if (($num % $value) == 0) {
//            $result[] = $num/$value;
//        }

//    }

    return $dividers->extract();
}

var_dump(divisibility($number, $dividers));