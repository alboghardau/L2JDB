<?php

include('dbsettings.php');

$chron=$_GET['chron'];

$mobid= $_GET['mobid'];

$conn = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

 $db = mysql_select_db ($data , $conn);
 
 $result = mysql_query("SELECT * FROM npc".$chron.' WHERE id='.$mobid);
 $row = mysql_fetch_array($result);
 
 $tmpid= $row['idTemplate'];
 
 mysql_query("DELETE FROM spawnlist".$chron." WHERE npc_templateid=".$tmpid);
 
 
  mysql_close($conn);
  
     $hd='Location: mobitems.php?chron='.$chron.'&mobid='.$mobid;
     header($hd);
?>
