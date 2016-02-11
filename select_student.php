<?php

include "db_driver.php";

$sql = "update interested set status='selected' where entryno='".$_REQUEST['a']."' and date='".$_REQUEST['b']."' and time='".$_REQUEST['c']."' and cid='".$_SESSION['cid']."' ;";
echo $sql;


$q = $conn->exec($sql) or die('failed');
if($q){
	$_SESSION['notify'] = "student ".$_REQUEST['a']." was selected for the job";
}
else{
	$_SESSION['notify'] = "Internal Error. Please Try Again";
}
header("Location: company_students.php");

?>
