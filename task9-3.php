<?php
/* Task 9 - 3 by Helen Lianhner  */
function forma()
{
    ?>
    <form name="forma" action="task9-3.php" method="GET" align="center">
        <p align="center"> <br>Введите символ отступа: <input name="tab" type="text"></p>
        <p align="center"><input type="submit" value="Вывести массив с отступом"></p>
    </form>
    <?php
}

function pre ($arr,$tab)
{
    if (is_array($arr) == true) {
        foreach ($arr as $value) {
            if (is_array($value) == true) {
                pre($value,$tab);
            } else {
                echo '<pre>'.$tab;
                print_r($value);
                echo '</pre>';
            }
        }
    }
}

function createMasOfMas($massiv,$kolvo,$tab)
{
   for ($i=0;$i<=$kolvo-1;$i++)
   {
$arr[$i]=$massiv;
   }
   pre($arr,$tab);
}

forma();
/*if (isset($_GET['tab'])) {
    if ($_GET['tab'] != '') {
        $tab = $_GET['tab'];
    } else {
        echo 'Вы не ввели символ табуляции';
       echo '<input type="submit" value="Вывести без отступа">';


    }
//}*/
if (isset($_GET['tab']))
   {$tab = $_GET['tab'];}
$kolvo=2; /*размерность массива*/
$massiv=array('1' => $first=array(1 => 'a', 2 => 'b'), '2' => '+', '3' => '=');
$znach= "+"; /*значение, которым надо заполнить массив*/
createMasOfMas($massiv,$kolvo,$tab);
?>