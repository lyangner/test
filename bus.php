<?php
include_once "function.php";
header('Content-Type: text/html; charset=utf-8', true);
setlocale(LC_ALL, 'ru_RU.utf8');
include("lib/MyDb_bus.php");  /* Соединяемся с базой */
?>

<h3><a href="http://php/bus.php">На главную</a></h3>
<form action="" method="GET" enctype="text/plain" border="1">
        <p align="center"><button type="submit" name="ostanovki" value="ostanovki"style="margin-right:20px;">Вывести остановки</button>
        <button type="submit" name="bus" value="bus" style="margin-right:20px;">Вывести автобусы</button>
        <button type="submit" name="routes" value="routes"style="margin-right:20px;">Вывести маршруты</button></p><p> <BR></p>
</form>

<div style="text-align: center;">
    <div align="center"  style="display:inline-block;border:1px solid #ccc; padding:10px;margin-right:20px;vertical-align: top;">
        <form action="" method="GET" enctype="text/plain" border="1">
            <p align="center"><b>Найти ближайшую остановку:</b></p>
             <p align="center"><br>Введите ширину: <input type="text" name="latitude"/></p>
          <p align="center"><br>Введите долготу: <input type="text" name="longitude"/></p>
        <p align="center"><input type="submit" value="Подсчитать"></p>
        </form>
    </div>
    <div align="center"  style="display:inline-block;border:1px solid #ccc; padding:10px;margin-right:20px;vertical-align: top;">
        <form action="" method="GET" enctype="text/plain" border="1">
            <p align="center"><b>Найти остановки в радиусе:</b></p>
            <p align="center"><br>Введите ширину: <input type="text" name="latitude"/></p>
            <p align="center"><br>Введите longitude: <input type="text" name="longitude"/></p>
            <p align="center"><br>Введите долготу: <input type="text" name="radius"/></p>
            <p align="center"><input type="submit" value="Подсчитать"></p>
        </form>
    </div>

    <div align="center" style="display:inline-block;border:1px solid #ccc; padding:10px;margin-right:20px;vertical-align: top;">
    <form action="" method="GET" enctype="text/plain" border="1">
        <p align="center"><b>Найти список автобусов выбранной остановки:</b></p>
        <?php

        $query_sel = mysqli_query($db, "SELECT title FROM bus group by title");
        $result_sel = mysqli_fetch_array($query_sel);
        echo "<p><br>Выберите автобус: <select name='title'  onChange=\"window.location='?title='+this.value;\">";

        if (isset($_GET["title"]))
        {
            //printf("<option value='%s'>Автобус №%s</option>", $_GET["title"], $_GET["title"]);
        }
        else
            {
                print_r("<option value='#' selected>Выберите автобус</option>");
            }
                do
        {
        if (isset($_GET["title"])) {
            if ($_GET["title"]==$result_sel["title"])
                {
                    printf("<option value='%s' selected>Автобус №%s</option>", $_GET["title"], $_GET["title"]);
                }
                else
                {
                    printf("<option value='%s'>Автобус №%s</option>", $result_sel["title"], $result_sel['title']);
                }
        }
        else
        {
            printf("<option value='%s'>Автобус №%s</option>", $result_sel["title"], $result_sel['title']);
        }
        }
        while ($result_sel = mysqli_fetch_array($query_sel));
        echo "</select></p>";

if (isset($_GET["title"]) && ($_GET["title"]!=""))
{
    $query_sel_way = mysqli_query($db, "SELECT r.way, s1.title as startStation, s2.title as endStation FROM bus as b INNER JOIN routes as r on r.bus=b.id INNER JOIN station as s1 on s1.id=b.startStation INNER JOIN station as s2 on s2.id=b.endStation where b.title=$_GET[title]");
    $result_sel_way = mysqli_fetch_array($query_sel_way);
    echo "<p><br>Выберите маршрут: <select name='way'  onChange=\"window.location='?title='+$_GET[title]+'&way='+this.value;\">";

    if (isset($_GET["way"]))
    {
        //printf("<option value='%s'>Автобус №%s</option>", $_GET["title"], $_GET["title"]);
    }
    else
    {
        print_r("<option value='#' selected>Выберите маршрут</option>");
    }
    do
    {
        if (isset($_GET["way"])) {
            if ($_GET["way"]==$result_sel_way["way"])
            {
                printf("<option value='%s' selected>%s - %s</option>", $_GET["way"],$result_sel_way["startStation"], $result_sel_way["endStation"]);
            }
            else
            {
                printf("<option value='%s'>%s - %s</option>", $result_sel_way["way"],  $result_sel_way["startStation"], $result_sel_way["endStation"]);
            }
        }
        else
        {
            printf("<option value='%s'>%s - %s</option>", $result_sel_way["way"], $result_sel_way["startStation"], $result_sel_way["endStation"]);
        }
    }
    while ($result_sel_way = mysqli_fetch_array($query_sel_way));
    echo "</select></p>";
}

if (isset($_GET["way"]) && ($_GET["way"]!=""))
        {

            echo "<p><br>Выберите остановку: <select name='ost'  onChange=\"window.location='?title='+$_GET[title]+'&way='+$_GET[way]+'&ost='+this.value;\">";

            if (isset($_GET["ost"]))
            {
                //printf("<option value='%s'>Автобус №%s</option>", $_GET["title"], $_GET["title"]);
            }
            else
            {
                print_r("<option value='#' selected>Выберите остановку</option>");
            }

            $query_sel_ost = mysqli_query($db, "SELECT r.route FROM routes as r INNER JOIN bus as b on r.bus=b.id where b.title=$_GET[title] and r.way =$_GET[way]");
            $result_sel_ost = mysqli_fetch_array($query_sel_ost);

        $massivOstanovok = explode(", ", $result_sel_ost['route']);
        $kolvo = count($massivOstanovok);
        for ($i=0; $i<$kolvo; $i++)
        {
            $resultOst = mysqli_query($db, "SELECT s.title FROM station as s where s.id = $massivOstanovok[$i]");
            $myrowOst = mysqli_fetch_array($resultOst);
            $ostanovka = trim($myrowOst["title"]);

            if (isset($_GET["ost"])) {
                if ($_GET["ost"]==$massivOstanovok[$i])
                {
                    printf("<option value='%s' selected>%s</option>", $_GET["ost"], $ostanovka);
                }
                else
                {
                    printf("<option value='%s'>%s</option>", $massivOstanovok[$i], $ostanovka);
                }
            }
            else
            {
                printf("<option value='%s'>%s</option>", $massivOstanovok[$i], $ostanovka);
            }

        }
echo "</select></p>";
}
        ?>
    </form>
    </div>
</div>

<p> <BR></p>

<?php

if (isset($_GET["ost"]) && ($_GET["ost"]!=""))
{
    $query_routes = mysqli_query($db, "SELECT r.route, b.title, r.way, s1.title as startStation, s2.title as endStation, s3.title as titleOst FROM routes as r inner join bus as b on r.bus=b.id INNER JOIN station as s1 on s1.id=b.startStation INNER JOIN station as s2 on s2.id=b.endStation INNER JOIN station as s3 on s3.id=$_GET[ost]");
    $result_routes = mysqli_fetch_array($query_routes);
echo "<h3 style='text-align:center;'><b>Автобусы, которые останавливаются на остановке ".trim($result_routes['titleOst']).":</b></h3><p align='center'>";
    do {
        $massivOstanovok = explode(", ", $result_routes['route']);
        if (in_array($_GET["ost"], $massivOstanovok))
{
    echo "Автобус №".$result_routes["title"]." (".$result_routes["startStation"]." - ".$result_routes["endStation"].")<br>";
}
    }
    while ($result_routes = mysqli_fetch_array($query_routes));
    echo "</p>";

    $query_routes = mysqli_query($db, "select b.title, t.budni, t.vyhodnye, s1.title as startStation, s2.title as endStation
from time as t
inner join bus as b on t.id_bus=b.id 
inner join routes as r on r.bus=b.id
INNER JOIN station as s1 on s1.id=b.startStation 
INNER JOIN station as s2 on s2.id=b.endStation
where t.id_ost = $_GET[ost] and b.title = $_GET[title] and r.way=$_GET[way]");
    $result_routes = mysqli_fetch_array($query_routes);

    printf("<div style='text-align: center;border:1px solid #ccc; padding:10px;margin-right:20px;'><h3><u>Расписание автобуса №%s (%s - %s) </u></h3><p><b>По будням: %s</b></p><p style='color:red;'><b>По выходным: %s</b></p></div>", $result_routes["title"],$result_routes["startStation"],$result_routes["endStation"],$result_routes["budni"],$result_routes["vyhodnye"] );
}

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

    echo '<div style="text-align: center"> <H3>Остановки</H3></div>';
    print_r("<table align='center' border='1' cellspacing='0' cellpadding='5'><tr><td><b>№ п/п</b></td><td><b>Название</b></td><td><b>Ширина</b></b></td><td><b>Долгота</b></td></tr>");
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

    echo '<div style="text-align: center"> <H3>Автобусы</H3></div>';

    print_r("<table align='center' border='1' cellspacing='0' cellpadding='5'><tr><td><b>№ п/п</b></td><td><b>Название </b></td><td><b>Маршрут</b></td><td><b>Остановки</b></td><td><b>Направление</b></td></tr>");
    do {
        $masvyvod="";
        $massivOstanovok = explode(", ", $myrow12['marshrut']);
        $kolvo = count($massivOstanovok);
        for ($i=0; $i<$kolvo; $i++)
        {
            $str = "SELECT s.title FROM station as s where s.id = $massivOstanovok[$i]";
            $resultOst = mysqli_query($db, "SELECT s.title FROM station as s where s.id = $massivOstanovok[$i]");
            $myrowOst = mysqli_fetch_array($resultOst);

            $ostanovka = trim($myrowOst[title]);
            $masvyvod .=  $ostanovka.", ";
        }

        $masvyvod= substr( trim($masvyvod), 0, -1);

        printf("<tr><td>%s</td><td>Автобус №%s</td><td>%s - %s</td><td>%s</td><td>%s</td></tr>", $myrow12['id'], $myrow12['title'], $myrow12['startStation'], $myrow12['endStation'],  $masvyvod, $myrow12['way']);
    } while ($myrow12 = mysqli_fetch_array($result12));

    print_r("</tr></table>");
}

function routes($db)
{
    $result3 = mysqli_query($db, "SELECT routes.id, bus.title as bus, routes.way, routes.kolvo_stations, routes.route FROM `routes` inner join bus on bus.id = routes.bus");
    $myrow3 = mysqli_fetch_array($result3);

    echo '<div style="text-align: center"> <H3>Маршруты</H3></div>';

    print_r("<table align='center' border='1' cellspacing='0' cellpadding='5'><tr><td><b>№ п/п</b></td><td><b>Автобус </b></td><td><b>Остановки</b></td><td><b>Направление</b></td><td><b>Количество остановок маршрута</b></td></tr>");
    do {
        $masvyvod="";
        $massivOstanovok = explode(", ", $myrow3['route']);
        $kolvo = count($massivOstanovok);
        for ($i=0; $i<$kolvo; $i++)
        {
            $str = "SELECT s.title FROM station as s where s.id = $massivOstanovok[$i]";
            $resultOst = mysqli_query($db, "SELECT s.title FROM station as s where s.id = $massivOstanovok[$i]");
            $myrowOst = mysqli_fetch_array($resultOst);

            $ostanovka = trim($myrowOst[title]);
            $masvyvod .=  $ostanovka.", ";
        }

        $masvyvod= substr( trim($masvyvod), 0, -1);

        printf("<tr><td>%s</td><td>Автобус №%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $myrow3['id'], $myrow3['bus'], $masvyvod, $myrow3['way'],$myrow3['kolvo_stations']);
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
    //pre($sum);
    $id=key($sum)+1;
    $result_itog = mysqli_query($db, "SELECT * FROM station where id=$id ");
    $myrow_itog = mysqli_fetch_array($result_itog);
next($sum);
    $id2=key($sum)+1;
    $result_itog2 = mysqli_query($db, "SELECT * FROM station where id=$id2 ");
    $myrow_itog2 = mysqli_fetch_array($result_itog2);

    $sum1 = abs($a - $myrow_itog["latitude"])+abs($b - $myrow_itog["longitude"]);
    $sum2 = abs($a - $myrow_itog2["latitude"])+abs($b - $myrow_itog2["longitude"]);
if ($sum1 == $sum2)
    {        printf("<p align='center'>Ближайшие остановки от %s, %s: <b>%s</b> (%s, %s) и <b>%s</b> (%s, %s)</p>", $a, $b, $myrow_itog['title'], $myrow_itog['latitude'], $myrow_itog['longitude'], $myrow_itog2['title'], $myrow_itog2['latitude'], $myrow_itog2['longitude']);
    }
    else {
        printf("<p align='center'>Ближайшая остановка от %s, %s: <b>%s</b> (%s, %s)</p>", $a, $b, $myrow_itog['title'], $myrow_itog['latitude'], $myrow_itog['longitude']);
    }
}

function radius($db, $a,$b,$r)
{
    printf("<p align='center'>Ближайшие остановки в радиусе %s от %s,%s :</p>",$r, $a, $b);
    $resultBOR = mysqli_query($db, "SELECT * FROM station");
    $myrowBOR = mysqli_fetch_array($resultBOR);
    $i=0;
    do {
        $sumX = abs($a - $myrowBOR["latitude"]);
        $sumY = abs($b - $myrowBOR["longitude"]);
//        $sum = $sumX + $sumY;
//        ($sum<=$r)
        if (($sumX<=$r) and ($sumY<=$r))
        {
            printf("<p align='center'><b>%s</b> (%s, %s)</p>", $myrowBOR['title'], $myrowBOR['latitude'], $myrowBOR['longitude']);
        }
    }
    while ($myrowBOR = mysqli_fetch_array($resultBOR));
}

if ((isset($_GET["latitude"])) and (isset($_GET["longitude"])))
{
    if (!isset($_GET["radius"])or($_GET["radius"]==""))
    {
        if (($_GET["latitude"] != "") and ($_GET["longitude"] != "")) {
            blizhajshaja($db, $_GET["latitude"], $_GET["longitude"]);
            echo "<hr>";
            ostanovki($db);
        }
    }
    else
    {
        if (($_GET["latitude"] != "") and ($_GET["longitude"] != "") and ($_GET["radius"] != "")) {
            radius($db, $_GET["latitude"], $_GET["longitude"], $_GET["radius"]);
            echo "<hr>";
            ostanovki($db);
        }
    }
}
?>





