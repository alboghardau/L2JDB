<?php

include('dbsettings.php');
$chron = 'fry';

$conn = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

 $db = mysql_select_db ($data , $conn);
 
 $result = mysql_query("SELECT * FROM droplist".$chron);
 while ($row=  mysql_fetch_array($result))
 {
     
     $r = mysql_query("SELECT * FROM npc".$chron." WHERE id=".$row['mobId']);
     if(mysql_num_rows($r)==0)
     {
         
         mysql_query( "DELETE FROM droplist".$chron." WHERE mobId=".$row['mobId']);
     }
     
 }
 
 
 
 
 
 
 mysql_close($conn);
?>
