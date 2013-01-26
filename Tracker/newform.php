<?php
include('upper.php');
?>
<br>
<center><form action="new.php" method="get">
   Title
    <input type="text" name="title"/>
   Type
   <select name="type">
   <option value="Bug">Bug</option>
   <option value="Feature">Feature</option>
   </select>
   <br>  Description
   <input type="text" name="description"/>
   <input type="submit" value="Submit"/>
    
</form>
</center>






<?php
include('lower.php');
?>