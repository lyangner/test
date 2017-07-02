<?php
/* Task 10 - 3 by Helen Lianhner  */
function forma()
{
    ?>
    <form name="forma" action="task10-3.php" method="GET" align="center">
        <p align="center"> <br>Введите текст: <input name="tekst" type="text"></p>
        <p align="center"><input type="submit" value="Готово"></p>
    </form>
    <?php
}
function counter($tekst)
{
    $len=mb_strlen($tekst);
    $arr= preg_split('//u',$tekst,-1,PREG_SPLIT_NO_EMPTY);
    $poz=0;
    $mas=array();

    for ($i=0;$i<=$len-1;$i++) {
        if (($arr[$i] == "a") || ($arr[$i] == "а")) {
            $a = $arr[$i];
            if (isset($a)) {
                $mas[] = $i+1;
            }
        }
    }
    if ($mas!=null) {
        $mas = array_reverse($mas);
        $result = implode(', ', $mas);
        if (count($mas)>1) {
            printf("Строка: %s <br><br> Позиции символа \"а\" в обратном порядке: %s", $tekst, $result);
        }
        else
            {
                printf("Строка: %s <br><br> Позиция символа \"а\" в тексте: %s", $tekst, $result);
            }
    }
   else
    {
        printf("Строка: %s <br><br> Символа \"а\" в строке не обнаружено!", $tekst);
    }
}

forma();
if (isset($_GET['tekst'])) {
    $tekst = trim($_GET['tekst']);
    $tekst = mb_strtolower($tekst);
    if ($tekst!='')
    {
        counter($tekst);
    }
    else
    {
        echo 'Вы не ввели текст!';
    }
}
?>