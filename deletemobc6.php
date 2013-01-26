<?php
include('upper.php');
include('form.php');
include('dbsettings.php');


$mobid=$_GET['mobid'];
echo $mobid."<br>";

$connection = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

$db = mysql_select_db ($data , $connection);

$query1="DELETE FROM npcc6 WHERE id=".$mobid .";";
echo $query1."<br>";

$query2="DELETE FROM droplistc6 WHERE mobID=".$mobid.";";
echo $query2."<br>";

mysql_query ($query1, $connection);

mysql_query ($query2 , $connection);



mysql_close($connection);
include('lower.php')
?>