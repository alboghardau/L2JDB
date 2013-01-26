<?php

include('dbsettings.php');

$chron=$_GET['chron'];
$mname=$_POST['mname'];


include('upper.php');




 if(strlen($mname)<3)  goto end;
?>

        <center><table id="table">
                <tr class="itm">
<td id="col1"> Lvl </td>
<td id="col1"> Map </td>
<td id="col2"> Mob's Name </td>
<td id="col5"> Type </td></tr>
</table></center>

<?php

$connection = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

$db = mysql_select_db ($data , $connection);

$result = mysql_query ("Select * From npc".$chron , $connection);



        while($row = mysql_fetch_array($result))
{
   

    if(stristr($row[2],$mname))
    {
        echo '<center><table id="table">';
        echo '<tr class="itm">';
        echo '<td id="col1">' . $row['level'] . '</td>';
        echo '<td id="col1">';
        if($row['map']==1)
        {
            echo '<img src="images/map.png" alt="map">';
        }
            
        echo '</td>' ; 
        echo '<td id="col2"> <a href="'.$host.'mobitems.php?chron='.$chron.'&mobid='. $row['id'].'">' . $row['name'] . '</a></td>';
        if($row['aggro']>0)
        {
        echo '<td id="col5">' . "Agresive" . '</td>';
        }
        else {
        echo '<td id="col5">' . "Passive" . '</td>';
}
        echo "</tr>";
        echo '<img src="images/interline.png" alt="inter" />';
        echo '</table></center>';
    }
    
}
?>


<?php

mysql_close($connection);
end:
if(strlen($mname)<3)  echo "<br><center>Minimum 4 letters required.</center><br>";
include('lower.php');

?>
