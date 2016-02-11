<?php

include "db_driver.php";

$sql = "delete from interested where entryno='".$_REQUEST['a']."' and date='".$_REQUEST['b']."' and time='".$_REQUEST['c']."' and cid='".$_SESSION['cid']."' ;";
echo $sql;


$q = $conn->exec($sql) or die('failed');


$_SESSION['notify'] = "student ".$_REQUEST['a']." was rejected for the job.";

header("Location:company_students.php");

?>
