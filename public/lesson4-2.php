<?php
$a = 9;
$n = 7000;

//$a = array_reverse(str_split($a));
//$n = array_reverse(str_split($n));

function inPower($a, $n)
{
    $result = array_reverse(str_split($a));

    for ($n; $n > 1; $n--) {
        $count = count($result);
        $shift = 0;
        for ($i = 0; $i < $count; $i++) {
            $intermediate = array_reverse(str_split($result[$i] * $a));

            $result[$i] = $intermediate[0] + $shift;
            $shift = $intermediate[1];
//            var_dump($result);

        }
        if ($shift > 0) {
            $result[] = $shift;
        }
    }

    return strrev(implode($result));
}

$start = microtime(true);
echo inPower($a, $n);
$time =  microtime(true) - $start;
echo "<br> Время выполнения {$time} с.";
//echo 3+ null;