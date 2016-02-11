<?php

$sql = "select * from interview where approval_status = 0;";
$q = $conn->query($sql) or die('failed');
?>

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
	
	echo '<tr id='.$row['cid'].'><td>'.$i.'</td><td>'.$row2['name'].'</td><td>'.$row['type'].'</td><td>'.$row['date'].'</td>';
	echo '<td>'.$row['time'].'</td>';
	echo '<td><button class="btn btn-default approve-btn"><span class="glyphicon glyphicon-ok"></span> Approve</button>';
	echo ' &nbsp;&nbsp; <button class="btn btn-default reject-btn"><span class="glyphicon glyphicon-trash"></span> Reject</button></td></tr>';
	$i++;

}
?>
</table>

<script>
	
	
	$('.approve-btn').click(function(){
		var selectedRow = $(this).parent().parent();
		comp_id = selectedRow.attr('id');
		
		var rowData = []
		i = 0;
		selectedRow.find('td').each(function(){
			rowData[i++] = $(this).html();
		});
		
		interviewType = rowData[2];
		
		$.ajax({
			type : 'POST',
			url : 'approve_interview.php',
			data : {cid : comp_id,intrv_type:interviewType},
			cache : false,
			dataType : 'json',
			success : function (result){
				if (result != 1)
					alert(result);
				else{
					
					selectedRow.css("background-color","#eee");
					selectedRow.find('.reject-btn').remove();
					selectedRow.find('.approve-btn').html("Approved");
					selectedRow.find('.approve-btn').prop("disabled",true);
					
					alert("Interview for "+rowData[1]+" on "+ rowData[3]+" has been approved and is listed in interviews scheduled tab");
					//$('#numComp').html(result);
				}
			}
		});
	
	
	});
	
	$('.reject-btn').click(function(){
		var selectedRow = $(this).parent().parent();
		comp_id = selectedRow.attr('id');
		
		var rowData = []
		i = 0;
		selectedRow.find('td').each(function(){
			rowData[i++] = $(this).html();
		});
		
		interviewType = rowData[2];
		r = confirm("Are you sure you want to reject "+rowData[1]+"?"); 
		if (r==true)
		{
			$.ajax({
			type : 'POST',
			url : 'reject_interview.php',
			data : {cid : comp_id,intrv_type:interviewType},
			cache : false,
			dataType : 'json',
			success : function (result){
				if (result != 1)
					alert(result);
				else{
					
					selectedRow.css("background-color","#eee");
					selectedRow.find('.reject-btn').remove();
					selectedRow.find('.approve-btn').html("Rejected");
					selectedRow.find('.approve-btn').prop("disabled",true);
					
				}
			}
		});	
				
		}

		
	});
	
</script>
