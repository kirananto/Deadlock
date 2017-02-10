<?php
session_start();

include '../common/adminpanel.php';
include '../common/auth.php';
if($_SESSION['userData']['isadmin']==0)
{

header("Location:/");
exit;

}

include '../common/con.php';


$res=fetchquery("SELECT * from users");





?>

<table id="users" class="display"  >

<tr><th>id</th><th>Name</th><th>College</th><th>Email</th><th>Mobile No</th></tr>

<?php
while($row=$res->fetch_assoc())
{


echo '<tr onclick="view('.$row['id'].')">';

$a=array("id","college","email","mobno");
for($i=0;$i<count($a);$i++)
{
if($i==1){echo '<td>'.$row['first_name'].' '.$row['last_name'].'</td>';}
echo '<td>'.$row[$a[$i]].'</td>';


}
echo '</tr>';





}

?>


</table>

<table id="usertrys" class= "display">

 <thead>
                                <tr>
                                    <th>LevelNo</th>
                                    <th>Answer</th>
                                    <th>ip</th>
                                    <th>Date </th>
                                    
                                </tr>
                            </thead>
                            <tbody id="trys">
                            </tbody>

</table> 

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>
<script>
$(document).ready( function () {
    $('#users').DataTable();
} );


function view(id)
{


$.post("viewusers.php",{"id":id},function(dataset){
console.log(dataset);

$('#trys').html('');
for(i=0;i<dataset.length;i++)
{
a='';
for(j=0;j<4;j++)
{
a=a+'<td>'+dataset[i][j]+'</td>';
}

$('#trys').append('<tr>'+a+'</tr>');
}

     $('#usertrys').DataTable( /*{
        data: dataset,
        columns: [
            { title: "Level No" },
            { title: "Tried Answer" },
            { title: "Date" },
            { title: "ip" }
        ]
    }*/ );
} );
}
</script>


<?php





include '../common/foot.php';
?>


