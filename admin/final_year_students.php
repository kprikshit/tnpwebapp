<?php
include "config.php";
$conn = get_conn();
$type = "'placement';";
$sql = "select * from student where applying_for =".$type;
$q = $conn->query($sql) or die('failed');
?>
<table class="table table-bordered table-hover" style="margin-top:10px;">
	<tr>
		<th>#</th>
		<th>Entry Number</th>
		<th>Name</th>
		<th>CGPA</th>
		<th></th>
	</tr>

<?php
$i=1;
while( $row = $q->fetch(PDO::FETCH_ASSOC) ){
	echo '<tr><td>'.$i.'</td><td>'.$row['entryno'].'</td><td>'.$row['first_name'].' '.$row['last_name'].'</td><td>'.$row['cgpa'].'</td>';
	echo '<td><button class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span> View Profile</button></td></tr>';
	$i++;

}
?>
</table>
