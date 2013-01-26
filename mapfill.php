<?php
include('upper.php');
set_time_limit(3600);
include('form.php');
include('dbsettings.php');

$cont1=$_GET['cont1'];
$cont2=$_GET['cont2'];
$chron=$_GET['chron'];




$connection = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

$db = mysql_select_db ($data , $connection);

$contor=$cont1;
while ( $contor<=$cont2 )
{
    $row=mysql_query("SELECT * FROM spawnlist".$chron ." WHERE npc_templateid=".$contor);
    if(mysql_num_rows($row)>0)
    {
        $q="UPDATE npc".$chron." SET map=1 WHERE idTemplate=".$contor;
        mysql_query($q);
        echo $q.'<br>';

        
    }
   
$contor++;
}

$contor=$cont1;
while ( $contor<=$cont2 )
{
    $row=mysql_query("SELECT * FROM npc".$chron ." WHERE id=".$contor);
    $r=mysql_fetch_array($row);
    if($r['map']==1)
    {
    
    $q2="UPDATE droplist".$chron." SET map=1 WHERE mobId=".$contor;
    mysql_query($q2);
    echo $q2."<br>";


        
    }
   
$contor++;
}





mysql_close($connection);
include('lower.php')

?>
