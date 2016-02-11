<?php

include "config.php";
$conn = get_conn();
$cid = $_POST['cid'];
$type = $_POST['intrv_type'];

$sql = "delete from interview where cid = '".$cid."' and type = '".$type."'";
$q = $conn->query($sql);
if(!$q){
	echo json_encode(pg_last_error($conn));
}
else{
	/*$sql2 = "select count(*) from company where approval_status = 1;";
	$q2 = $conn->query($sql2) or die('failed');
	$row2 = $q2->fetch(PDO::FETCH_ASSOC);
	echo $row2['count'];*/
	echo 1;
}	

?>

