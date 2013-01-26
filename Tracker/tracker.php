<?php
include('upper.php');
echo "<br>";
include('dbsettings.php');

echo '<center><a href="newform.php">Add new.</a></center><br>';

$connection = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

$db = mysql_select_db ($data , $connection);

$result = mysql_query("SELECT * FROM istracker");

while($row = mysql_fetch_array($result))
{
    echo '<center><table id="table">';
    echo '<tr>';
    echo '<td id="col1">'.$row['id'].'</td>';
    echo '<td id="col2">'.$row['title'].'</td>';
    echo '<td id="col2">'.$row['type'].'</td>';
    if($row['status']=="Open")
    {
        echo '<td id="col6">'.$row['status'].'</td>';
    }
    
    
    echo '</tr>';
    echo '<tr>';    
    echo '<td colspan="4">'.$row['description'].'</td>';
    echo '</tr>';    
    echo '</table></center>';
    echo '<br>';
    
}

mysql_close($connection);
 
include('lower.php');
?>