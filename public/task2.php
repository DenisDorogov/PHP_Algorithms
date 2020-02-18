<?php

// 1)
$n = 100;
$array = [];

for ($i = 0; $i < $n; $i++) {
    for ($j = 1; $j < $n; $j *= 2) {
        $array[$i][$j] = true;
    }
}//Сложность O( n*log(n) ).  Итераций 100*7 = 700
var_dump($array);

$n = 100;
$array = [];

for ($i = 0; $i < $n; $i += 2) {
    for ($j = $i; $j < $n; $j++) {
        $array[$i][$j]= true;
    }

} //Сложность O(n/2*n/2) ~ O( (n^2)/4 ) 5050 итераций
