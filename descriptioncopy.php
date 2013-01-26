<?php
set_time_limit(3600);
include('dbsettings.php');

$chron='c6';

$conn = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

 $db = mysql_select_db ($data , $conn);
 
 $result = mysql_query('SELECT * FROM item');
 
 while($row = mysql_fetch_array($result))
 {
     $q = "UPDATE etcitem".$chron.' SET description="'.$row['description'].'" WHERE item_id='.$row['id'];
     //echo $q.'<br/>';
     mysql_query($q);
     $q = "UPDATE armor".$chron.' SET description="'.$row['description'].'" WHERE item_id='.$row['id'];
     mysql_query($q);
     $q = "UPDATE weapon".$chron.' SET description="'.$row['description'].'" WHERE item_id='.$row['id'];
     mysql_query($q);
     
     
     
     
 }
 
 
 
 
 
 
 mysql_close($conn);

?>
