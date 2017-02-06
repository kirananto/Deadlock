<?php

include '../common/con.php';
include '../common/header.php';


$res=fetchquery("SELECT * from leadersboard order by lvlno asc;");
?>

<table>

<tr><th>Rank</th><th>Name</th><th>Level</th></tr>
<?php
if($res!=null)
{

for($i=0;$i<$res->num_rows;$i++)
{
$r=$res->fetch_assoc();

echo '<tr><td>'.($i+1).'</td><td>'.$r['Name'].'</td><td>'.$r['lvlno'].'</td></tr>';

}

}

?>

</table>
<?php



include '../common/foot.php';


?>
