<?php
include('dbsettings.php');
set_time_limit(3600);

 $oldchars= array(" ","(",")","%","<",">");
 $newchars= array("-","-","-","-","-","-");

$connection = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

$db = mysql_select_db ($data , $connection);

header('Content-Type: text/xml');
 print '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
 print '<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';


$q = "SELECT * FROM armorfry";

$result = mysql_query($q);

while($row=mysql_fetch_array($result))
{
    $test="SELECT * FROM droplistfry WHERE itemId=".$row['item_id'];
    
    $res=mysql_query($test);
    
    if(mysql_num_rows($res)>0)
    {
     print '<url>';   
     print '<loc>';
     print 'http://www.l2tactics.com/droplocator/fry/1/'.$row['item_id'].'/'.str_replace($oldchars,$newchars,$row['name']).'.html';
     print '</loc>';
     print '<changefreq>never</changefreq>';
     print '</url>';  
     
     
   


       
        
    }



    
}





print '</urlset>';

mysql_close($connection);

?>
