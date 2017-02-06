<?php

include '../common/adminpanel.php';

include '../common/con.php';


$res=fetchquery("SELECT * from levels order by lvlno");

if(res!=null)
{

?>

<table><tr><th>Level No<th><th>Enabled</th></tr>

<?php
$i=0;
 while($row=$res->fetch_assoc())
{
echo '<tr><td>'.$row['lvlno'].'</td><td>'.($row['enabled']!=0?"Yes":"No").'</td></tr>';


}

?>



</table>


<?php
}


include '../common/foot.php';
?>
