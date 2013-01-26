<?php
set_time_limit(5);
include('dbsettings.php');

$chron = $_GET['chron'];
$mobid = $_GET['mobid'];
$cat = $_POST['cat'];
$text = $_POST['text'];


$conn = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

 $db = mysql_select_db ($data , $conn);


echo $text.'<br/>';

 $oldchars= array("additional_make_multi_list=","additional_make_list=","corpse_make_list=",'{{','}}',"{{{","{{{{","}}}","}}}}");
 $newchars= array("","","",'{','}',"{","{","}","}");
 
  $old= array("{",';','}');
 $new= array("",',',')');

$txt = str_replace($oldchars, $newchars,$text);
$txt = str_replace($oldchars, $newchars,$txt);
echo $txt.'<br/>';

$nr=0;
$last=   substr_count($txt,'};{');     



for($i=1;$i<=$last;$i++)

       
{
    $nr = 1+strpos($txt,'};{');

    $t = substr($txt,0,$nr);
    echo $t.'<br/>';

    
    $len = strpos($t,";")-strpos($t,'{')-1;
    $itmname = substr($t, 1+ strpos($t,'{'),$len);
   
    
    $query = 'SELECT * FROM item_pch WHERE A="'.$itmname.'"';
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);
    
    $t = str_replace($itmname,$row['B'],$t);


    $len = strrpos($t,"}")-strrpos($t,';')-1;
    $rate = substr($t, 1+ strrpos($t,';'),$len);

    $rat = round($rate*10000*rand(950,1050)/1000);
    $t = str_replace($rate,$rat,$t);
    
    $t = str_replace($old, $new, $t);
    echo $t.'<br/>';

    
    $q = "INSERT INTO droplist".$chron." (mobId,category,itemId,min,max,chance) VALUES (".$mobid.','.$cat.','.$t;
        echo $q.'<br/>';
        
       mysql_query($q);
    
    
    
    
    $txt = substr($txt,$nr+1);
 
    
    
}
   echo $txt.'<br/>';

    $len = strpos($txt,";")-strpos($txt,'{')-1;
    $itmname = substr($txt, 1+ strpos($txt,'{'),$len);

   
    
    $query = 'SELECT * FROM item_pch WHERE A="'.$itmname.'"';
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);

    
    $txt = str_replace($itmname,$row['B'],$txt);
    
    $len = strrpos($txt,"}")-strrpos($txt,';')-1;
    $rate = substr($txt, 1+ strrpos($txt,';'),$len);
    $rat = round($rate*10000*rand(950,1050)/1000);
    $txt = str_replace($rate,$rat,$txt);
        $txt = str_replace($old, $new, $txt);
        echo $txt."<br/>";
    
    $q = "INSERT INTO droplist".$chron." (mobId,category,itemId,min,max,chance) VALUES (".$mobid.','.$cat.','.$txt;
        echo $q.'<br/>';
        
        mysql_query($q);
   
   
   
   mysql_close($conn);
   
   $hd='Location: mobitems.php?chron='.$chron.'&mobid='.$mobid;
header($hd);
?>
