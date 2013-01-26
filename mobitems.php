<?php

include('dbsettings.php');

$chron=$_GET['chron'];

$mobid= $_GET['mobid'];


$rate=1;

include('upper.php');
?>
<center><form method="post" action="dropfillmob.php?chron=<?php echo $chron."&mobid=".$mobid;?>">
<input type="submit" value="Update Droplist Names"/></form>
    
    <form methodd="get" action="deletemobmap.php" >
        <input type="hidden" name="chron" value="<?php echo $chron; ?>"/>
        <input type="hidden" name="mobid" value="<?php echo $mobid; ?>"/>
        <input type="submit" value="Delete Map"/>
    
    </form>

        
</center>
<form method="post" action="adddrop.php?chron=<?php echo $chron;?>&mobid=<?php echo $mobid;?>">
    ItemId:<input type="text" name="itemid"/>
    Min:<input type="text" name="min"/>
    Max:<input type="text" name="max"/>
    Category:(-1=spoil)<input type="text" name="cat"/>
    Chance:<input type="text" name="chance"/>

    
    <input type="submit"/>
    
</form>

</center>
<form method="post" action="dropparser.php?chron=<?php echo $chron;?>&mobid=<?php echo $mobid;?>">
Spoillist Input<input type="text" name="text"/>
    Category:(-1=spoil)<input type="text"  name="cat"/>


    
    <input type="submit"/></form>
 <form method ="post" action="dropadd.php?chron=<?php echo $chron;?>&mobid=<?php echo $mobid;?>"> 
  Droplist Input<input type="text" name="text"/>
     <input type="submit"/></form>

<form method="post" action="mapparser.php?chron=<?php echo $chron;?>&mobid=<?php echo $mobid;?>">
MobPos Input<input type="text" name="text"/>



    
    <input type="submit"/>
    
</form>
<form method="get" action="deletedrop.php">
            <input type="hidden" name="chron" value="<?php echo $chron; ?>"/>
        <input type="hidden" name="mobid" value="<?php echo $mobid; ?>"/>
  <input type="submit" value="Delete Drops"/>
</form>
<?php




$conn = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

 $db = mysql_select_db ($data , $conn);

 //select template formob

 $tmpid= mysql_query("Select * From npc". $chron ." WHERE id=" . $mobid);
 $mobtmpid = mysql_fetch_array($tmpid);
 $mobtemplate = $mobtmpid['idTemplate'];
 
 echo "Map:";
 
 echo '<a href="mapchange.php?chron='.$chron.'&mobid='.$mobid.'"><img src="images/'.$mobtmpid['map'].'.png"/></a>';
 
 echo "<h3><center>Id: ".$mobtmpid['id']." Level: ".$mobtmpid['level']." Name: ".$mobtmpid['name']." HP: ".round($mobtmpid['hp']). " Exp:". $mobtmpid['exp']."</center></h3><br>";


$result= mysql_query('Select * From spawnlist'.$chron .' WHERE npc_templateid='.$mobtemplate);

//map display

$raw= mysql_fetch_array($result);

//adenmap

$ratio = 378;
$cx = 334;
$cy= 620;

if(mysql_num_rows($result)!= 0 && ($raw['locx']> -130000))
    {
    
    echo '<center><div style="position:relative;width: 930px; height: 1295px; background-image:url('.$host.'images/adenmap.jpg); ">';
    mysql_data_seek($result,0);
    while ($line = mysql_fetch_array($result))
{

    if($line['locy']<=0)
    {
    $loy=$cy-($line['locy']/$ratio*(-1));
    }
 else {
    $loy=$line['locy']/$ratio+$cy;
    }

    if($line['locx']<=0)
    {
    $lox=$cx-($line['locx']/$ratio*(-1));
    }
 else
 {
 $lox=$line['locx']/$ratio+$cx;
 }

    echo '<div style="position:absolute;top:'.$loy.'px;left:'.$lox.'px;'.'">';
    echo '<img src="'.$host.'images/mob.png" alt""/>';
    echo '</div>';
}
        
        echo '</div></center>';
    
    }


    
 //gracia map   
    
    $ratio = 250;
    $cx = 1260;
    $cy= -470;
    
if(mysql_num_rows($result)!= 0 && ($raw['locx'] < -130000))
    {
    
    echo '<center><div style="position:relative;width: 700px; height: 535px; background-image:url('.$host.'images/graciamap.jpg); ">';
    mysql_data_seek($result,0);
    while ($line = mysql_fetch_array($result))
{

    if($line['locy']<=0)
    {
    $loy=$cy-($line['locy']/$ratio*(-1));
    }
 else {
    $loy=$line['locy']/$ratio+$cy;
    }

    if($line['locx']<=0)
    {
    $lox=$cx-($line['locx']/$ratio*(-1));
    }
 else
 {
 $lox=$line['locx']/$ratio+$cx;
 }

    echo '<div style="position:absolute;top:'.$loy.'px;left:'.$lox.'px;'.'">';
    echo '<img src="'.$host.'images/mob.png" alt""/>';
    echo '</div>';
}
        
        echo '</div></center>';
    
    }



    

 $result1= mysql_query ("Select * From droplist".$chron." WHERE mobId=".$mobid." ORDER BY chance DESC " , $conn);
$a=0;

if (mysql_num_rows($result1)!=0)
{

echo '    
<br>
    <center>Drop</center>
    <br><center><table id="table"><tr class="itm">
<td id="col1">Icon</td>
<td id="col3">ID</td>
<td id="col2"> Item`s Name </td>
<td id="col3"> Min Nr. </td>
<td id="col4"> Max Nr. </td>
<td id="col5"> Rate </td></tr>
</table></center>
    ';
}
//table listing drop

		while ($row = mysql_fetch_array($result1))
{

   

    if( $row['category']>=0 )
    {
        echo '<center><table id="table">';
        echo '<tr class="itm">';
        $droprate =$row['chance']/10000*$rate;
        if ($droprate<=100)
        {
            $droprate = number_format($droprate ,2 );
            $min=$row['min'];
            $max=$row['max'];
        }
        else if($droprate>100)
        {
            $min=number_format($row['min']*$droprate/100 , 0);
            $max=number_format($row['max']*$droprate/100 , 0);
            $droprate=100;
        }


        echo '<td id="ico">' . '<img src="'.$host.'../l2tactics/droplocator/ico/' . $row['icon'] . '_0.jpg">' . '</td>';
        echo '<td id="col3"><a href="delitem.php?mobid='.$mobid.'&itemid='.$row['itemId'].'&chron='.$chron.'&cat='.$row['category'].'">' . "DEL". '</a></td>';
                echo '<td id="col3">' . $row['itemId']. '</td>';
        echo '<td id="col2">'  . $row['itemname'] .'</td>';
        echo '<td id="col3">' . $min . '</td>';
        echo '<td id="col4">' . $max , '</td>';
        echo '<td id="col5">' . $droprate ."%" . '</td>';
        echo '</tr>';
        //echo '<img src="images/interline.png" alt="inter" />';
        echo '</table></center>';
        $a++;

        }


}

if($a==0) { echo '<br><center>No dropable items.</center></br>' ; }





 $result1= mysql_query ("Select * From droplist".$chron." WHERE mobId=".$mobid." ORDER BY chance DESC " , $conn);
$a=0;

if (mysql_num_rows($result1)!=0)
{

echo '
    <br><center>Spoil</center>
    <br><center><table id="table">
    <tr class="itm">
<td id="col1">Icon</td>
<td id="col3">ID</td>
<td id="col2"> Item`s Name </td>
<td id="col3"> Min Nr. </td>
<td id="col4"> Max Nr. </td>
<td id="col5"> Rate </td></tr>
</table></center>
';

}

//table listing drop

		while ($row = mysql_fetch_array($result1))
{

    if($row['category']<0)
    {
        echo '<center><table id="table">';
        echo '<tr class="itm">';
        $droprate =$row['chance']/10000*$rate;
        if ($droprate<=100)
        {
            $droprate = number_format($droprate ,2 );
            $min=$row['min'];
            $max=$row['max'];
        }
        else if($droprate>100)
        {
            $min=number_format($row['min']*$droprate/100 , 0);
            $max=number_format($row['max']*$droprate/100 , 0);
            $droprate=100;
        }

        echo '<td id="ico">' . '<img src="'.$host.'../l2tactics/droplocator/ico/' . $row['icon'] . '_0.jpg">' . '</td>';
        echo '<td id="col3"><a href="delitem.php?mobid='.$mobid.'&itemid='.$row['itemId'].'&chron='.$chron.'&cat='.$row['category'].'">' . "DEL". '</a></td>';
        echo '<td id="col3">' . $row['itemId']. '</td>';
        echo '<td id="col2">' .  $row['itemname'] .'</td>';
        echo '<td id="col3">' . $min . '</td>';
        echo '<td id="col4">' . $max , '</td>';
        echo '<td id="col5">' . $droprate ."%" . '</td>';
        echo '</tr>';
        //echo '<img src="images/interline.png" alt="inter" />';
        echo '</table></center>';
        $a++;

        }


}

if($a==0) { echo '<center>No spoilable items.</center></br>' ; }

mysql_close($conn);

include('lower.php');
?>