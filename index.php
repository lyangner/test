<?php


$x=4;
$y=1;
$v=1;
$k='levo';
do {
    $mass[$x][$y]=$v;
    $fin=0;
    if (!$fin AND $k=='levo') {
        $x--;
        if ($x<1 OR isset($mass[$x][$y])) { $x++; $k='niz'; }
        else $fin=1;
    }
    if (!$fin AND $k=='niz') {
        $y++;
        if ($y>4 OR isset($mass[$x][$y])) { $y--; $k='pravo'; }
        else $fin=1;
    }
    if (!$fin AND $k=='pravo') {
        $x++;
        if ($x>4 OR isset($mass[$x][$y])) { $x--; $k='verh'; }
        else $fin=1;
    }
    if (!$fin AND $k=='verh') {
        $y--;
        if ($y<1 OR isset($mass[$x][$y])) { $y++; $k='levo'; }
        else $fin=1;
    }
    if (!$fin AND $k=='levo') {
        $x--;
        if ($x<1 OR isset($mass[$x][$y])) { $x++; $k='niz'; }
        else $fin=1;
    }
    $v++;
} while ($v<=16);

$tbl = '';
for ($y=1;$y<=4;$y++) {
    $tr = '';
    for ($x=1;$x<=4;$x++) {
        $tr .= '<td>'.$mass[$x][$y].'</td>';
    }
    $tbl .= '<tr>'.$tr.'</tr>';
}
echo '<table>'.$tbl.'</table>';
    // todo доделать !!!

/**
 * @param mixed $data
 */
function pre ($data){
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}



?>