<?php
include('upper.php');
set_time_limit(6000);
include('form.php');
include('dbsettings.php');

$chron=$_GET['chron'];

$connection = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

$db = mysql_select_db ($data , $connection);


$q="SELECT * FROM etcitem".$chron;
$res=mysql_query($q);
while ($row = mysql_fetch_array($res))
{

  mysql_query("UPDATE droplist".$chron.' SET tbl=1 WHERE itemId='.$row['item_id']);



    
}

$q="SELECT * FROM armor".$chron;
$res=mysql_query($q);
while ($row = mysql_fetch_array($res))
{

  mysql_query("UPDATE droplist".$chron.' SET tbl=2 WHERE itemId='.$row['item_id']);


    
}

$q="SELECT * FROM weapon".$chron;
$res=mysql_query($q);
while ($row = mysql_fetch_array($res))
{

  mysql_query("UPDATE droplist".$chron.' SET tbl=3 WHERE itemId='.$row['item_id']);


    
}







mysql_close($connection);
include('lower.php')




?>
