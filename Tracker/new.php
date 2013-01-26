<?php
include('dbsettings.php');


$title=$_GET['title'];
$type=$_GET['type'];
$description=$_GET['description'];

$connection = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

$db = mysql_select_db ($data , $connection);
$quer="INSERT INTO istracker (title,description,type,status) VALUES ('".$title."','".$description."','".$type."','Open')";
//echo $quer;
mysql_query($quer);

mysql_close($connection);

header('Location: tracker.php');

?>

