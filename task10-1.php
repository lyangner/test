
<?php
/* Task 10 - 1 by Helen Lianhner  */
function forma()
{
?>
    <form name="forma" action="task2.php" method="GET" align="center">
        <p align="center"> <br>Введите месяц на русском языке: <input name="month" type="text"></p>
        <!--<input name="year" type="text">-->
    <p align="center"><input type="submit" value="Узнать количество дней"></p>
    </form>

<?php





}
function aaa($mon)
{
    switch ($mon)
    {
        case "январь":
        case "март":
        case "май":
        case "июль":
        case "август":
        case "октябрь":
        case "декабрь":
            echo "<p align=\"center\">Месяц <b>".$mon . " </b>содержит 31 день.</p>";
            break;
        case "апрель":
        case "июнь":
        case "сентябрь":
        case "ноябрь":
            echo "<p align='center'>Месяц <b>".$mon . " </b>содержит 30 дней.</p>";

            break;
        case "февраль":
            echo "<p align='center'>Месяц <b>".$mon . " </b>содержит 28/29 дней.</p>";
            break;

    }


}
forma();
$mon=trim($_GET['month']);
$mon=mb_strtolower($mon);
aaa($mon);
?>
