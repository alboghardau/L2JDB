<?php
include('upper.php');
set_time_limit(3600);
include('form.php');
include('dbsettings.php');

$cont1=$_GET['cont1'];
$cont2=$_GET['cont2'];
$scol=$_GET['scol'];
$rcol=$_GET['rcol'];
$col1=$_GET['col1'];
$tbl1=$_GET['tbl1'];
$col2=$_GET['col2'];
$tbl2=$_GET['tbl2'];

echo $cont1.' '.$cont2.' '.$col1.' '.$tbl1.' '.$col2.' '.$tbl2;

$connection = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

$db = mysql_select_db ($data , $connection);

$contor=$cont1;
while ( $contor<=$cont2 )
{
    $sq="SELECT * FROM ".$tbl1." WHERE ".$scol."=".$contor;
    echo $sq.'<br>';
    
    $quer1=mysql_query($sq ,$connection);
    $row1=mysql_fetch_array($quer1);

    if($row1[$col1!=""])
    {
        
    $rq="UPDATE ".$tbl2." SET ".$col2.'="'.$row1[$col1].'" WHERE '.$rcol."=".$contor ;
    echo $rq."<br>";
    mysql_query($rq ,$connection);
    
    }
    
    
    $contor++;
    
    
    
    
}



mysql_close($connection);
include('lower.php')
?>