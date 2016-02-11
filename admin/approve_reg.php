<?php

include "config.php";
session_start();
$conn = get_conn();
$cid = $_POST['cid'];

$sql = "update company set approval_status = 1 where cid = '".$cid."'";
$q = $conn->query($sql);
if(!$q){
	echo json_encode(pg_last_error($conn));
}
else{
	
	$sql2 = "insert into approves values('".$_SESSION['name']."','".$cid."')";
	
	$q2 = $conn->query($sql2) or die('failed');
	if(!$q2)
		echo pg_last_error($conn);
	else
		echo 1;
}	

?>
