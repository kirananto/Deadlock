<?php

include '../common/adminpanel.php';

include '../common/con.php';

if(isset($_POST))
{

}

?>


<form method="POST" action="addlevel.php">


Level No:<input type="text" name="lvlno"></input>

Level Image:<input type="file" name="fileToUpload" id="fileToUpload">

 <input type="submit" name="f" >



</form>


<?php
include '../common/foot.php';
?>
