<?php

include "db.php";
session_start();
$conn = get_conn();

$sql = "insert into student values('".$_REQUEST['entryno']."','".$_REQUEST['password']."','".$_REQUEST['first_name']."','".$_REQUEST['middle_name']."','".$_REQUEST['last_name']."','".$_REQUEST['email']."','".$_REQUEST['department']."','".$_REQUEST['cgpa']."','".$_REQUEST['percen10']."','".$_REQUEST['percen12']."','','".$_REQUEST['applying_for']."') ;";

echo $sql;

$q = $conn->exec($sql) or die('failed');

$_SESSION['notify'] = "new student has been added";

header("Location: index.php");

?>
