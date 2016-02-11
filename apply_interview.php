<?php
#student applying for a interview 
include "db_driver.php";
$student = get_student($_SESSION['entryno'],$conn);
$sql = "select * from interview where cid='".$_REQUEST['a']."' and date='".$_REQUEST['b']."' and time='".$_REQUEST['c']."' ;";
$q = $conn->query($sql) or die('failed');
$r = $q->fetch(PDO::FETCH_ASSOC);
## check criteria
if ($r['min_cgpa'] <= $student['cgpa']){
	if (($r['min_10th_percen'] <= $student['percen10']) and ($r['min_12th_percen'] <= $student['percen12'])){
		$sql2 = "insert into interested values('".$r['cid']."','".$r['date']."','".$r['time']."','".$r['type']."','".$_SESSION['entryno']."','request') ;" ;
		#echo $sql2;
		$q = $conn->exec($sql2) or die('failed');
		$_SESSION['notify'] = "your interview has been scheduled with the company";
		header("Location: student_apply.php");
	}
	else{
		$_SESSION['notify'] =  "you are not eligible for this interview";
		header("Location: student_apply.php");
	}
}
else{
	$_SESSION['notify'] = "you are not eligible for this interview";
	header("Location: student_apply.php");
}

?>
