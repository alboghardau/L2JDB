<?php
include('dbsettings.php');
$chron = $_GET['chron'];
$mobid = $_GET['mobid'];
$itemid = $_GET['itemid'];
$cat = $_GET['cat'];

echo $mobid . $itemid . $cat;

$conn = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

 $db = mysql_select_db ($data , $conn);

$query = '
DELETE FROM droplist'.$chron.' WHERE mobId='.$mobid.' AND itemId='.$itemid.' AND category='.$cat.'    
';
 
 mysql_query($query);
 
  mysql_close($conn);
$hd='Location: mobitems.php?chron='.$chron.'&mobid='.$mobid;
header($hd);

?>
