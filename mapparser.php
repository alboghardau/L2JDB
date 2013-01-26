<?php
set_time_limit(5);
include('dbsettings.php');
$mobid = $_GET['mobid'];
$chron = $_GET['chron'];
$text = $_POST['text'];

$conn = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

 $db = mysql_select_db ($data , $conn);
 
 
 $result = mysql_query('SELECT * FROM npc'.$chron.' WHERE id='.$mobid);
 $row = mysql_fetch_array($result);




 $oldchars= array("additional_make_multi_list=","additional_make_list=","corpse_make_list=",'{{','}}',"{{{","{{{{","}}}","}}}}");
 $newchars= array("","","",'{','}',"{","{","}","}");
 
  $old= array("{",';','}');
 $new= array("",',',')');

$txt = str_replace($oldchars, $newchars,$text);
$txt = str_replace($oldchars, $newchars,$txt);
echo $txt.'<br/>';

$last=   substr_count($txt,'};{');     

for($i=1;$i<=$last;$i++)

{
        $nr = 1+strpos($txt,'};{');
        $t = substr($txt,0,$nr);

    
    $txt = substr($txt,$nr+1);
    
        $t = str_replace($old, $new, $t);
    echo $t.'<br/>';
    
    $q = "INSERT INTO spawnlist".$chron." (npc_templateid,locx,locy,locz,heading) VALUES 
    (".$row['idTemplate'].",".$t;
    echo $q.'<br/>';
    mysql_query($q);
    
}

$txt = str_replace($old, $new, $txt);
echo $txt.'<br/>';

 $q = "INSERT INTO spawnlist".$chron." (npc_templateid,locx,locy,locz,heading) VALUES 
    (".$row['idTemplate'].",".$txt;
 mysql_query($q);



mysql_close($conn);

   $hd='Location: mobitems.php?chron='.$chron.'&mobid='.$mobid;
header($hd);
?>
