<?php
include('dbsettings.php');
$conn = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

 $db = mysql_select_db ($data , $conn);


$chron = $_GET['chron'];
$mobid = $_GET['mobid'];

$result = mysql_query("SELECT * FROM npc".$chron." WHERE id=".$mobid);

$row = mysql_fetch_array($result);

if($row['map']==1)
{
    mysql_query("UPDATE npc".$chron." SET map=0 WHERE id=".$mobid);
  
}
if($row['map']==0)
{
    mysql_query("UPDATE npc".$chron." SET map=1 WHERE id=".$mobid);
  
}

   $hd='Location: mobitems.php?chron='.$chron.'&mobid='.$mobid;
   mysql_close($conn);
header($hd);
   
    
?>
