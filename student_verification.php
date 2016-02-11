<?php

include "db.php";
session_start();
$conn = get_conn();

$sql ="select * from student where entryno='".$_REQUEST['entryno']."' ;" ;

$q = $conn->query($sql);
if(!$q){
	$_SESSION['notify'] = "Incorrect password or username";
	header("Location: index.php");
	die();
}

$r = $q->fetch(PDO::FETCH_ASSOC);

if ($r['password'] == $_REQUEST['password']){
  session_unset();
  #session_destroy();
  $sql = "select count(*) from interested where entryno='".$_REQUEST['entryno']."' and status='selected' ;";
  #echo $sql;
  $r = $conn->query($sql) or die('failed');
  $q = $r->fetch(PDO::FETCH_ASSOC);
  
  if ($q['count'] != '0'){
   $sql2 = "select cid from interested where entryno='".$_REQUEST['entryno']."' and status='selected';";
   $q2 = $conn->query($sql2) or die('failed');
   $r = $q2->fetch(PDO::FETCH_ASSOC);
   $_SESSION['notify'] = "Congrats. You have been selected at ".$r['cid'];
   $_SESSION['entryno'] = $_REQUEST['entryno'];
   header("Location: welcome_student.php");
   
   #header("Location: congrats.php?a=".$r['cid']);
  }
  else{  
	$_SESSION['entryno'] = $_REQUEST['entryno'];
	header("Location: welcome_student.php");
 }
}
else{
	$_SESSION['notify'] = "Incorrect password or username";
	header("Location: index.php");
	die();
 }
?>
