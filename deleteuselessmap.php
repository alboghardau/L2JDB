<?php
set_time_limit(3600);
include('dbsettings.php');
$chron = 'fry';

$conn = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

 $db = mysql_select_db ($data , $conn);
 
 $result = mysql_query("SELECT * FROM spawnlist".$chron);
 while ($row=  mysql_fetch_array($result))
 {
     
     $r = mysql_query("SELECT * FROM npc".$chron." WHERE idTemplate=".$row['npc_templateid']);
     if(mysql_num_rows($r)==0)
     {
         
         mysql_query( "DELETE FROM spawnlist".$chron." WHERE npc_templateid=".$row['npc_templateid']);
     }
     
 }
 
 
 
 
 
 
 mysql_close($conn);
?>