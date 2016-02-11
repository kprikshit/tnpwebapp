<?php 
include 'header.php';
include "config.php";
$conn = get_conn();
$sql = "select * from company where approval_status = 1;";
$q = $conn->query($sql) or die('failed');
?>
		<div id="page-wrapper">
			<p style="padding-top:10px;"> <b>Following companies have registered for this session:</b> </p>
			<table class="table table-bordered table-hover">
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Contact Person</th>
					<th>Email</th>
					<th>Contact No.</th>
					<th>Approved by</th>
					<th></th>
				</tr>
				<?php
				$i = 1;
				while($row = $q->fetch(PDO::FETCH_ASSOC)){
					$sql2 = "select * from approves where cid = '".$row['cid']."'";
					$q2 = $conn->query($sql2) or die('failed');
					$row2 = $q2->fetch(PDO::FETCH_ASSOC);
					echo '<tr>';
					echo  '<td>'.$i.'</td>
						<td>'.$row['name'].'</td>
						<td>'.$row['contact_person'].'</td>
						<td>'.$row['contact_email'].'</td>
						<td>'.$row['contact_number'].'</td>';
					echo '<td>'.$row2['aid'].'</td>';
					echo  '<td><button class="btn btn-default"><span class="glyphicon glyphicon-eye-open"></span> View company profile</button></td></tr>';		
					$i++;	
				}	
				?>
			</table>
		</div>


	</div>
	<script>
		$('#sidebar2').addClass('active');
	</script>
	
	</body>

</html>
