
1. Определить сложность следующих алгоритмов:

- Поиск элемента массива с известным индексом.
    Равен O(n) + O(1) + O(1); Перебор осуществляется один раз.
    Количество итераций равно количеству элементов. + сравнение + итератор.

- Дублирование одномерного массива через foreach.
    Равен O(n) + O(1) + O(1); Перебор осуществляется один раз.
    Количество итераций равно количеству элементов + копирование + итератор.

- Рекурсивная функция нахождения факториала числа.
    Равна O(n) + O(1) + O(1);
<?php
$n = 20;
$result = 1;
function factorial($n) {
    if ($n == 1) { return 1; }
    return $n * factorial($n-1);
}
echo "Факториал {$n} равен " . factorial($n);
