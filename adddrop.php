<?php

include('dbsettings.php');

$chron = $_GET['chron'];
$mobid = $_GET['mobid'];

$min = $_POST['min'];
$max = $_POST['max'];
$itemid = $_POST['itemid'];
$chance = $_POST['chance'];
$cat = $_POST['cat'];

$conn = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

 $db = mysql_select_db ($data , $conn);
 
 $query = '
INSERT INTO droplist'.$chron.' (mobId,itemId,min,max,category,chance) 
VALUES    ('.$mobid.','.$itemid.','.$min.','.$max.','.$cat.','.$chance.')
';
 
 mysql_query($query);
 
 
 
 mysql_close($conn);
$hd='Location: mobitems.php?chron='.$chron.'&mobid='.$mobid;
header($hd);
?>
