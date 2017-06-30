<?php
include_once "function.php";
/* Task 10 - 2 by Helen Lianhner  */
function forma()
{
    ?>
    <form name="forma" action="task10-2.php" method="GET" align="center">
        <p align="center"> <br>Введите текст на английском языке: <input name="tekst" type="text"></p>
        <p align="center"><input type="submit" value="Подсчитать"></p>
    </form>
    <?php
}
function counter($tekst)
{
    $len=strlen($tekst);
    $arr= preg_split('//u',$tekst,-1,PREG_SPLIT_NO_EMPTY);
    $kolvoGl=0;
    $mas=array();
    for ($i=0;$i<=$len-1;$i++)
    {
       if (($arr[$i]=="a") || ($arr[$i]=="o") || ($arr[$i]=="u") ||  ($arr[$i]=="e") || ($arr[$i]=="i") || ($arr[$i]=="y"))
        {
        $kolvoGl++;
        if (!isset($arr_glas["$arr[$i]"])) {
            $mas[$arr[$i]]= 1;
            $arr_glas[$arr[$i]] = $mas[$arr[$i]];
            }
        else
            {
            $mas[$arr[$i]]=$mas[$arr[$i]]+1;
            $arr_glas[$arr[$i]] = $mas[$arr[$i]];
            }
        }
    }

    if (isset($_GET['tekst'])) {
        if ($_GET['tekst'] != '') {
            echo "Введенный текст: " . $_GET['tekst'];
            echo "<br>Количество гласных букв на английском языке в тексте: " . $kolvoGl . "<br><br>";
            pre($arr_glas);
        } else {
            echo "Вы не ввели текст!";
        }
    }
}
forma();
$tekst=trim($_GET['tekst']);
$tekst=mb_strtolower($tekst);
counter($tekst);
?>