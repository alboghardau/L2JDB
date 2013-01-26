<?php
set_time_limit(5);
include('dbsettings.php');
$chron = $_GET['chron'];
$mobid = $_GET['mobid'];

$conn = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

$db = mysql_select_db ($data , $conn);

mysql_query("DELETE FROM droplist".$chron." WHERE mobId=".$mobid." AND category>=0");

mysql_close($conn);

   $hd='Location: mobitems.php?chron='.$chron.'&mobid='.$mobid;
   echo $hd;
    header($hd);
?>
