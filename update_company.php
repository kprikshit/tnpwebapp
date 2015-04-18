<?php
include "db_driver.php";

$sql = "update company set name='".$_REQUEST['name']."',contact_email='".$_REQUEST['contact_email']."',contact_number='".$_REQUEST['contact_number']."',contact_person='".$_REQUEST['contact_person']."' where cid='".$_SESSION['cid']."' ;";

#echo $sql;

$q = $conn->exec($sql);
if($q){
	$_SESSION['notify'] = "Company details have been updated";
	header("Location: welcome_company.php");
}
else{
	$_SESSION['notify'] = "Internal Error. Please try Again";
	header("Location: welcome_company.php");
}
?>
