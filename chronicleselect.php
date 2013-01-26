<?php

$chron = $_GET["chron"];
if($chron=='c6')
    
{
        echo '<center><img src="'.$host.'images/interludep.png" alt="c9"/> <a href="'.$host.'dbsearch.php?chron=fry"><img src="'.$host.'images/freya.png" alt="freya"/></a></center>';
}

if($chron=='fry')
    
{
    echo '<center><a href="'.$host.'dbsearch.php?chron=c6"><img src="'.$host.'images/interlude.png" alt="c6"/></a> <img src="'.$host.'images/freyap.png" alt="freya"/></center>';
}

?>