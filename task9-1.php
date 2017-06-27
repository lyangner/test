<?php
/* Task 9 - 1 by Helen Lianhner  */
function forma()
{
?>
    <form name="forma" action="task9-1.php" method="GET" align="center">
        <p align="center"> <br>Введите имя: <input name="imya" type="text"></p>
    <p align="center"><input type="submit" value="Go"></p>
    </form>
<?php
}
function aaa($arr,$len)
{
   for ($i=0;$i<=$len-1;$i++)
   {
printf("<p align='center'>%s</p>",$arr[$i]);
   }
}
forma();
$name=trim($_GET['imya']);
$len=strlen($name);
$arr= preg_split('//u',$name,-1,PREG_SPLIT_NO_EMPTY);
aaa($arr,$len);
?>