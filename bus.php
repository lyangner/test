<?php
include_once "function.php";

header('Content-Type: text/html; charset=utf-8', true);
setlocale(LC_ALL, 'ru_RU.utf8');
include("lib/MyDb_bus.php");  /* Соединяемся с базой */

?>

<h3><a href="http://php/bus.php">На главную</a></h3>
<form action="" method="GET" enctype="text/plain" border="1">

    <p align="center"><button type="submit" name="ostanovki" value="ostanovki">Вывести остановки</button>
        <button type="submit" name="bus" value="bus">Вывести автобусы</button>
        <button type="submit" name="routes" value="routes">Вывести маршруты</button></p>


    <hr><p align="center">Введите ближайшую остановку:</p>
    <p align="center"><br>Введите latitude: <input type="text" name="latitude"/></p>
    <p align="center"><br>Введите longitude: <input type="text" name="longitude"/></p>

  <p align="center"><input type="submit" value="Подсчитать"></p>

</form>
<hr>




<!---->
<!--<div align="center">-->
<!--    <form action="" method="GET" enctype="text/plain" border="1">-->
<!---->
<!--        <p><br>Введите название: <input type="text" name="title"/></p>-->
<!--        <p><br>Введите номер в списке: <input type="text" name="sort_order"/></p>-->
<!--        <p align="center"><input type="submit" value="Добавить"></p>-->
<!--    </form>-->
<!--</div><br>-->
<!---->


<?php
//

if ($_GET['ostanovki']=='ostanovki')
{
    ostanovki($db);
}

if ($_GET['bus']=='bus')
{
    bus($db);
}

if ($_GET['routes']=='routes')
{
    routes($db);
}

function ostanovki($db)
{
    $result1 = mysqli_query($db, "SELECT * FROM station");
    $myrow1 = mysqli_fetch_array($result1);

    echo '<p align="center">Остановки</p>';
    print_r("<table align='center' border='1' cellspacing='0' cellpadding='5'><tr><td>id</td><td>title</td><td>latitude</td><td>longtitude</td></tr>");
    do {
        printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $myrow1['id'], $myrow1['title'], $myrow1['latitude'], $myrow1['longitude']);
    } while ($myrow1 = mysqli_fetch_array($result1));

    print_r("</tr></table>");
}

function bus($db)
{
    $result12 = mysqli_query($db, "SELECT b.id, b.title as title, s.title as startStation, s2.title as endStation, r.way as way , r.route as marshrut
FROM bus as b
inner join station as s on b.startStation = s.id
inner join station as s2 on b.endStation = s2.id
inner join routes as r on b.id = r.bus
");
    $myrow12 = mysqli_fetch_array($result12);

    echo '<p align="center">Автобусы</p>';
    print_r("<table align='center' border='1' cellspacing='0' cellpadding='5'><tr><td>id</td><td>title</td><td>startStation</td><td>endStations</td><td>stationArray</td><td>way</td></tr>");
    do {
        $masvyvod="";
        $massivOstanovok = explode(", ", $myrow12['marshrut']);
        $kolvo = count($massivOstanovok);
        for ($i=0; $i<$kolvo; $i++)
        {
//            $massiv = $massivOstanovok[$i];
            $str = "SELECT s.title FROM station as s where s.id = $massivOstanovok[$i]";
            $resultOst = mysqli_query($db, "SELECT s.title FROM station as s where s.id = $massivOstanovok[$i]");
            $myrowOst = mysqli_fetch_array($resultOst);

            $ostanovka = trim($myrowOst[title]);
            $masvyvod .=  $ostanovka.", ";
        }

        $masvyvod= substr( trim($masvyvod), 0, -1);

        printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $myrow12['id'], $myrow12['title'], $myrow12['startStation'], $myrow12['endStation'],  $masvyvod, $myrow12['way']);
    } while ($myrow12 = mysqli_fetch_array($result12));

    print_r("</tr></table>");
}

function routes($db)
{
    $result3 = mysqli_query($db, "SELECT routes.id, bus.title as bus, routes.way, routes.kolvo_stations, routes.route FROM `routes` inner join bus on bus.id = routes.bus");
    $myrow3 = mysqli_fetch_array($result3);

    echo '<p align="center">Маршруты</p>';
    print_r("<table align='center' border='1' cellspacing='0' cellpadding='5'><tr><td>id</td><td>bus</td><td>route</td><td>way</td><td>kolvo_stations</td></tr>");
    do {
        $masvyvod="";
        $massivOstanovok = explode(", ", $myrow3['route']);
        $kolvo = count($massivOstanovok);
        for ($i=0; $i<$kolvo; $i++)
        {
//            $massiv = $massivOstanovok[$i];
            $str = "SELECT s.title FROM station as s where s.id = $massivOstanovok[$i]";
            $resultOst = mysqli_query($db, "SELECT s.title FROM station as s where s.id = $massivOstanovok[$i]");
            $myrowOst = mysqli_fetch_array($resultOst);

            $ostanovka = trim($myrowOst[title]);
            $masvyvod .=  $ostanovka.", ";
        }

        $masvyvod= substr( trim($masvyvod), 0, -1);

        printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $myrow3['id'], $myrow3['bus'], $masvyvod, $myrow3['way'],$myrow3['kolvo_stations']);
    } while ($myrow3 = mysqli_fetch_array($result3));

    print_r("</tr></table>");
}


function blizhajshaja($db, $a,$b)
{
    $i=0;
    $resultBO = mysqli_query($db, "SELECT * FROM station");
    $myrowBO = mysqli_fetch_array($resultBO);
do {

    $sum [$i] = abs($a - $myrowBO["latitude"])+abs($b - $myrowBO["longitude"]);
    $i++;
}
while ($myrowBO = mysqli_fetch_array($resultBO));
//    pre($sum);
    asort($sum);
//    pre($sum);
    $id=key($sum)+1;
    $result_itog = mysqli_query($db, "SELECT * FROM station where id=$id");
    $myrow_itog = mysqli_fetch_array($result_itog);

    printf("<p align='center'>Ближайшая остановка от %s, %s: <b>%s</b> (%s, %s)</p>", $a, $b, $myrow_itog['title'],$myrow_itog['latitude'],$myrow_itog['longitude']);

}
if ((isset($_GET["latitude"])) and (isset($_GET["longitude"])))

{
    if (($_GET["latitude"]!="") and ($_GET["longitude"]!=""))
    {
        blizhajshaja($db, $_GET["latitude"], $_GET["longitude"]);
        echo "<hr>";
        ostanovki($db);
    }
    else
    {
        echo "Вы не ввели значения!";
    }
}


?>





