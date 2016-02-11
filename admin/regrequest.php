<?php
include "config.php";
$conn = get_conn();
$sql = "select * from company where approval_status = 0;";
$q = $conn->query($sql) or die('failed');
?>

<table class="table table-bordered table-hover" style="margin-top:10px;">
	<tr>
		<th>#</th>
		<th>Name</th>
		<th>Contact Person</th>
		<th>Email</th>
		<th>Contact No.</th>
		<th></th>
	</tr>

<?php
$i=1;

while($row = $q->fetch(PDO::FETCH_ASSOC)){
	echo  '<tr id='.$row['cid'].'><td>'.$i.'</td><td>'.$row['name'].'</td><td>'.$row['contact_person'].'</td><td>'.$row['contact_email'].'</td><td>'.$row['contact_number'].'</td>';
	echo '<td><button class="btn btn-default approve-btn-reg"><span class="glyphicon glyphicon-ok"></span> Approve</button>';
	echo ' &nbsp;&nbsp; <button class="btn btn-default reject-btn-reg"><span class="glyphicon glyphicon-trash"></span> Reject</button></td></tr>';
	$i++;

}
?>
</table>
<script>
	
	$('.approve-btn-reg').click(function(){
		var selectedRow = $(this).parent().parent();
		comp_id = selectedRow.attr('id');
		
		var rowData = []
		i = 0;
		selectedRow.find('td').each(function(){
			rowData[i++] = $(this).html();
		});
		
		$.ajax({
			type : 'POST',
			url : 'approve_reg.php',
			data : {cid : comp_id},
			cache : false,
			dataType : 'json',
			success : function (result){
				if (result != 1)
					alert(result);
				else{
					
					selectedRow.css("background-color","#eee");
					selectedRow.find('.reject-btn-reg').remove();
					selectedRow.find('.approve-btn-reg').html("Approved");
					selectedRow.find('.approve-btn-reg').prop("disabled",true);
					
					
					alert(rowData[1]+" has been approved and is listed in companies tab");
				}
			}
		});
	
	
	});
	
	$('.reject-btn-reg').click(function(){
		var selectedRow = $(this).parent().parent();
		comp_id = selectedRow.attr('id');
		
		var rowData = []
		i = 0;
		selectedRow.find('td').each(function(){
			rowData[i++] = $(this).html();
		});
		r = confirm("Are you sure you want to reject "+rowData[1]+"?"); 
		if (r==true)
		{
			
			$.ajax({
			type : 'POST',
			url : 'reject_reg.php',
			data : {cid : comp_id},
			cache : false,
			dataType : 'json',
			success : function (result){
				if (result != 1)
					alert(result);
				else{
					
						selectedRow.css("background-color","#eee");
						selectedRow.find('.reject-btn-reg').remove();
						selectedRow.find('.approve-btn-reg').html("Rejected");
						selectedRow.find('.approve-btn-reg').prop("disabled",true);
					}
				}
			});
			
		}

		
	});
	
</script>







