<?php
include_once "function.php";
pre($_POST);
pre($_FILES);
$id=$_POST["id"];
$file=$_POST["file"];

$allowtypes=["image/png","image/jpg","image/jpeg"];
$logs= [];

if (in_array($_FILES['file']['type'], $allowtypes))
{
$logs[]='test1 +';
}
else
{
    $logs[]='test1 -';
}

if ($_FILES['FILE']['ERROR'])
{
$logs[]='test2 -';
}
else
{
    $logs[]='test2 +';
}

$size=11024000;
if ($_FILES['FILE']['size'] > $size)
{$logs[]='test3 +';
}
else
{$logs[]='test3 +';
}



$date=new \DateTime();
$path=$_SERVER['CONTEXT_DOCUMENT_ROOT'].'/uploads/'.$date->format('y/m/d/i/');

if (!file_exists($path))
{
mkdir($path, 777, true);
}

$name=$date->format('m/d/i/s');
$name=.substr($_FILES['file']['name'], strrpos($_FILES['file']['name'],'.'));

$to=$_FILES['file']['tmp_name'];
if (file_exists($path $fileName))
{
    copy($from, $to);
}


pre($path);

//__DIR__

pre($logs);
?>