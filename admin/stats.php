<?php 

include 'header.php';
include 'config.php';
$conn = get_conn();
$sql = "select count(*) from interested natural join student where department = 'CSE' and status = 'placed';";
$q = $conn->query($sql) or die('failed');
$row = $q->fetch(PDO::FETCH_ASSOC);
$placedinCS = $row['count'];

?>
		<div id="page-wrapper">
			<table class="table table-bordered table-hover" style="margin-top:10px;width:60%">
				<tr>
					<th>#</th>
					<th>Statistic</th>
					<th>Value</th>
				</tr>
				<tr>
					<td>1</td>
					<td>No. of students placed in CS department</td>
					<td><?php echo $placedinCS; ?></td>
				</tr>
				<tr>
					<td>2</td>
					<td>No. of students placed in EE department</td>
					<td>23</td>
				</tr>
				<tr>
					<td>3</td>
					<td>No. of students placed in ME department</td>
					<td>28</td>
				</tr>
				<tr>
					<td>4</td>
					<td>Avg. CGPA of students placed in CS </td>
					<td>7.76</td>
				</tr>
				<tr>
					<td>5</td>
					<td>Avg. CGPA of students placed in EE </td>
					<td>7.65</td>
				</tr>
				<tr>
					<td>6</td>
					<td>Avg. CGPA of students placed in ME </td>
					<td>7.45</td>
				</tr>
				<tr>
					<td>7</td>
					<td>Avg. salary offered in CS department</td>
					<td>800000</td>
				</tr>
				<tr>
					<td>8</td>
					<td>Avg. salary offered in EE department</td>
					<td>700000</td>
				</tr>
				<tr>
					<td>9</td>
					<td>Avg. salary offered in ME department</td>
					<td>600000</td>
				</tr>
			</table>	
		</div>
	</div>
	<script>
		$('#sidebar5').addClass('active');
	</script>
	</body>

</html>

