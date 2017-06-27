
<?php
/* Task 8 by Helen Lianhner  */
$count=0;
$el=0;
$sum=0;
$sumCh=0;
$avg=0;
$prost=0;

for ($x=48; $x>=-74; $x=$x-6) {
    echo $x . "<br />";
    $el++;

    /* считаем количество и сумму четных элементов */
    if ($x % 2 == 0) {
        $count = $count + 1;
        $sumCh = $sumCh + $x;

    }

    /* считаем сумму нечетных элементов */
    if ($x % 2 != 0) {
        $sum = $sum + $x;
    }


}

/* для подсчета простых чисел*/
for ($x=48; $x>=-74; $x=$x-6) {
    if ($x < 2)
        continue;
    else {
        $check = true;
        for ($j = 2; $j < $x; $j++) {
            if ($x % $j === 0)
                $check = false;
        }
        if ($check === true)
            $prost++;
    }
}

/* считаем среднее значение элементов кратных 2 */
if ($count != 0) {
    $avg = $sumCh / $count;
}

/* вывод на экран результатов */
echo "<p align='center'>Количество чётных элементов = ".$count." в интервале от (48 до - 74)<br>";
echo "<p align='center'>Сумма нечётных элементов = ".$sum." в интервале от (48 до - 74)<br>";
echo "<p align='center'>Среднее значение элементов кратных 2 = ".$avg." в интервале от (48 до - 74)<br>";
echo "</p><p align='center'>Количество простых чисел = ".$prost." в интервале от (48 до - 74)</p>";
echo "<p align='center'>* * *</p>";
echo "<p align='center'><b>Количество всех элементов = ".$el." в интервале от (48 до - 74)</b></p>";

?>
