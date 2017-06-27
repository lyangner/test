<?php
/* Task 9 - 2 by Helen Lianhner  */

function aaa($znach,$kolvo)
{
   for ($i=0;$i<=$kolvo-1;$i++)
   {
$arr[$i]="$znach";
   }
   pre($arr);
}
function pre ($arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}
$kolvo=3; /*размерность массива*/
$znach= "2"; /*значение, которым надо заполнить массив*/
aaa($znach,$kolvo);

?>