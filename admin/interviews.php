<?php 
include 'header.php';
include "config.php";
$conn = get_conn();
$sql = "select * from interview where approval_status = 1;";
$q = $conn->query($sql) or die('failed');
?>
		
		<div id="page-wrapper">
			<p style="padding-top:10px;"> <b>Following interviews are scheduled so far:</b> </p>
			<table class="table table-bordered table-hover" style="margin-top:10px;">
				<tr>
					<th>#</th>
					<th>Company Name</th>
					<th>Type</th>
					<th>Date</th>
					<th>Time</th>
					<th>Actions</th>
				</tr>

			<?php
				$i=1;
				while($row = $q->fetch(PDO::FETCH_ASSOC)){
					$query2 = "select * from company where cid = '".$row['cid']."';";
					$q2 = $conn->query($query2) or die('failed');
					$row2 = $q2->fetch(PDO::FETCH_ASSOC);
					
					echo '<tr><td>'.$i.'</td><td>'.$row2['name'].'</td><td>'.$row['type'].'</td><td>'.$row['date'].'</td>';
					echo '<td>'.$row['time'].'</td>';
					echo '<td><button class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span> View Details</button></td></tr>';
					$i++;

				}
				?>
			</table>
		</div>


	</div>
	<script>
		$('#sidebar3').addClass('active');
		
	</script>
	
	</body>

</html>

