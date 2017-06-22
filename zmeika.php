<?php
/* Объявляем массив: */
$array = array();

/*Заполняем массив случайными числами: */
echo '<table ><tr><td>';
for ($k = 0; $k < 2; $k++):
    $array[$k] = $k;
    print_r($array[$k]);
endfor;
echo '</td></tr></table>';
/* Выводим содержимое массива: */

?>