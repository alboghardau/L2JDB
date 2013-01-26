<?php
include('dbsettings.php');
include('upper.php');
set_time_limit(3600);




$mobid=$_GET['mobid'];
$chron=$_GET['chron'];


$connection = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

$db = mysql_select_db ($data , $connection);

$a = mysql_query("SELECT * FROM npc".$chron." WHERE id=".$mobid);
$ar = mysql_fetch_array($a);

$map = $ar['map'];


$q="SELECT * FROM droplist".$chron." WHERE mobId=".$mobid;
$res=mysql_query($q);

while ($row = mysql_fetch_array($res))
{
  $t=mysql_query("SELECT * FROM etcitem".$chron." WHERE item_id=".$row['itemId']);
  $f=mysql_fetch_array($t);
  if(mysql_num_rows($t)>0)
  {

  mysql_query("UPDATE droplist".$chron.' SET itemname="'.$f['name'].'" WHERE itemId='.$row['itemId']." AND mobId=".$mobid);
  mysql_query("UPDATE droplist".$chron.' SET icon="'.$f['icon'].'" WHERE itemId='.$row['itemId']." AND mobId=".$mobid)  ;
  }
    
}

$q="SELECT * FROM droplist".$chron." WHERE mobId=".$mobid;
$res=mysql_query($q);

while ($row = mysql_fetch_array($res))
{
  $t=mysql_query("SELECT * FROM armor".$chron." WHERE item_id=".$row['itemId']);
  $f=mysql_fetch_array($t);
  if(mysql_num_rows($t)>0)
  {

  mysql_query("UPDATE droplist".$chron.' SET itemname="'.$f['name'].'" WHERE itemId='.$row['itemId']." AND mobId=".$mobid);
  mysql_query("UPDATE droplist".$chron.' SET icon="'.$f['icon'].'" WHERE itemId='.$row['itemId']." AND mobId=".$mobid)  ;
  }
    
}


$q="SELECT * FROM droplist".$chron." WHERE mobId=".$mobid;
$res=mysql_query($q);

while ($row = mysql_fetch_array($res))
{
  $t=mysql_query("SELECT * FROM weapon".$chron." WHERE item_id=".$row['itemId']);
  $f=mysql_fetch_array($t);
  if(mysql_num_rows($t)>0)
  {

  mysql_query("UPDATE droplist".$chron.' SET itemname="'.$f['name'].'" WHERE itemId='.$row['itemId']." AND mobId=".$mobid);
  mysql_query("UPDATE droplist".$chron.' SET icon="'.$f['icon'].'" WHERE itemId='.$row['itemId']." AND mobId=".$mobid)  ;
  }
    
}

$a=mysql_query("SELECT * FROM npc".$chron." WHERE id=".$mobid);
$ra=mysql_fetch_array($a);
echo $ra['name'];

mysql_query("UPDATE droplist".$chron.' SET mobname="'.$ra['name'].'" WHERE mobId='.$mobid);
mysql_query("UPDATE droplist".$chron." SET moblvl=".$ra['level']." WHERE mobId=".$mobid);
mysql_query("UPDATE droplist".$chron." SET map=".$map." WHERE mobId=".$mobid);


mysql_close($connection);

$hd='Location: mobitems.php?chron='.$chron.'&mobid='.$mobid;


include('lower.php');
header($hd);

?>