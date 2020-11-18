<html>
<head>
<?php include "header.php"; ?>
<link rel = stylesheet href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel = stylesheet href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">

<script src = https://code.jquery.com/jquery-3.3.1.js></script>
<script src = https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js></script>
<script src = https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js></script>
<script src = https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js></script>
<script src = https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js></script>
<script src = https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js></script>
<script src = https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js></script>

<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
</script>


</head>
<body>
<?php 
include "navigation1.php";
?>
<?php include "dbconfiguration.php"; 
$query="select * from notes where status='Accept'";
$recieve=my_select($query);
?>
<div class="container" style="margin-top:70px">
<h2 class="text-center" style="font-family:'cooper'; color:#C04000; font-weight:bold;">View All Notes</h2>
<hr>
<br>
<table class="table table-hover" id="example">
<thead style="background-color:#000000; color:#999999">
<tr>
<th>Sr.No.</th>
<th>Title</th>
<th>Uploaded By</th>
<th>Uploading Date</th>
<th>Stream</th>
<th>Subject</th>
<th>Type Of Notes</th>
<th>Description</th>
<th>Download</th>
</tr>
</thead>
<tbody>


<?php 

/*while($row=mysqli_fetch_array($recieve))
{
echo "<tr>";
echo "<td>$row[1]</td>";
echo "<td>$row[2]</td>";
echo "<td><video width='150' height='150' controls><source src='$row[3]' type='video/mp4'></video></td>";
echo "<td><img src = $row[4] width=150 height=150></td>";

$query1 = "select * from users where emailid='$row[5]'";
$rs1 = my_select($query1);
if($row1 = mysqli_fetch_array($rs1))
{
$username1 = $row1[0];
}
echo "<td>$username1</td>";
echo "<td>$row[6]</td>";
echo "<td>$row[7]</td>";
echo "<td><a href='$row[3]' class='btn btn-danger' download>Download</a></td>";
echo "</tr>";
}

?>
*/
</tbody>
</table>
</div>

</body>
</html>