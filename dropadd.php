<?php

set_time_limit(5);
include('dbsettings.php');

$text = $_POST['text'];
$chron = $_GET['chron'];
$mobid = $_GET['mobid'];
echo $text."<br/>";

$old= array('{{','}}',"{{{","{{{{","}}}","}}}}");
$new= array('{','}',"{","{","}","}");
 
$oldchars= array("additional_make_multi_list=","additional_make_list=","corpse_make_list=");
$newchars= array("","","");

$conn = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

$db = mysql_select_db ($data , $conn);
 

 
$text = str_replace($oldchars, $newchars,$text);
echo $text.'<br/>';

$last =   substr_count($text,'};{{{')+1;     

//split text into array

for($i=1;$i<=$last;$i++)
{
        $nr = 1+strpos($text,'};{{{');
        echo $nr.'<br/>';
                
        //reset position for last part of text
        if($nr==1) {$nr=1000;}
        
    $t = substr($text,0,$nr);
    
    echo $t.'<br/>';
    $arr[$i]=$t;
    
    $text = substr($text,$nr+1);
    
}
//multiplier parsing
for($i=1;$i<=$last;$i++)
{
    $multi[$i] = strrchr($arr[$i],";");
    $multi[$i] = str_replace(";","",$multi[$i]);
    $multi[$i] = str_replace("}","",$multi[$i]);
    $multi[$i] = str_replace("}","",$multi[$i]);
}

echo $multi[1];

//delete multi from strings

for($i=1;$i<=$last;$i++)
{
    
    $arr[$i] = substr($arr[$i],0,strrpos($arr[$i],';'));
}

//echo $arr[3];
echo '<br/>';
//storing items array
$c = 1;

for($i=1;$i<=$last;$i++)
{
    $rnum = substr_count($arr[$i],'};{')+1;
    for($j=1;$j<=$rnum;$j++)
    {
            $pos = 1+strpos($arr[$i],'};{');
            if($pos ==1 )
            {
                $pos = 1000;
            }
            $item[$c] = substr($arr[$i],0,$pos);
            $arr[$i] = substr($arr[$i],$pos+1);
            $mul[$c] = $multi[$i];
            $c++;
            
    }
}

//cleaning signs
for($j=1;$j<$c;$j++)
{
     $item[$j] = str_replace($old,$new,$item[$j]);
     $item[$j] = str_replace($old,$new,$item[$j]);
}

//parsing items
for($j=1;$j<$c;$j++)
{
    $name[$j] = substr($item[$j],1,strpos($item[$j],";")-1);
    echo $name[$j];
    $chance = substr($item[$j],strrpos($item[$j],";")+1,-1);

    $rchance[$j] = $chance * ($mul[$j]/100) *10000;
    if($rchance[$j] <1)
    {
        $rchance[$j]=1;
    }
    $rchance[$j] = round($rchance[$j])*rand(900,1100)/1000;
    echo $rchance[$j];
    //trim name/chance
    $l = strrpos($item[$j],";")-strpos($item[$j],";")+1;
    $item[$j] = substr($item[$j],strpos($item[$j],";"),$l);
    //change ; into ,
    $item[$j] = str_replace(";",",",$item[$j]);
    
}
//getting name id
for($i=1;$i<$c;$i++)
{
    $query = 'SELECT * FROM item_pch WHERE A="'.$name[$i].'"';
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);
    
    $item[$i] = "(1,".$mobid.",".$row['B'].$item[$i].$rchance[$i].")";
}


//display item array
echo "<br/>";

for($i=1;$i<$c;$i++)
{
      $q = "INSERT INTO droplist".$chron. " (category,mobId,itemId,min,max,chance) VALUES ".$item[$i];
      echo $q."<br/>";
      mysql_query($q);
}
mysql_close($conn);
   $hd='Location: mobitems.php?chron='.$chron.'&mobid='.$mobid;
    header($hd);

?>
