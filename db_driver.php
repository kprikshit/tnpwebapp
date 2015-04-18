<?php
session_start();
include "db.php";
$conn = get_conn();

function get_student($entryno,$conn)
{
 
 $sql = "select * from student where entryno='".$entryno."' ;";

 $q = $conn->query($sql) or die('failed');

 $r = $q->fetch(PDO::FETCH_ASSOC);
 
 return $r;   
}

function get_courses($entryno,$conn)
{
 $sql = "select * from courses_done where entryno='".$entryno."' ;";

 $q = $conn->query($sql) or die('failed');
  return $q;

}

# getting the upcoming interviews for a student
function get_upcoming_interviews($conn, $entryno){
	#get student info
	$student = get_student($entryno,$conn);
	#get applied interviews
	$sql = "select count(*) from interested  where entryno='".$entryno."' and status='selected'";
	$q = $conn->query($sql) or die('failed');
	$r = $q->fetch(PDO::FETCH_ASSOC);
	if($r['count'] == '0'){
		#get all interviews for his branch
		#$allbranchinterviews = get_branch_interviews($branch, $conn); 
		#FAULTY CODE, CHECK IT AGAIN
		$sql = "select * from interview natural join company natural join hiring_branch where branch='".$student['department']."' and cid not in (select cid from interested where entryno='".$entryno."');";
		$q = $conn->query($sql) or die('failed');
		return $q;
	}
	else
		return null;
}

function get_applied_interviews($entryno,$conn){
 #getting company name too
 $sql = "select * from interested natural join interview natural join company where entryno='".$entryno."' ; ";
 
 $q = $conn->query($sql) or die('failed');
 return $q;

}

function get_branch_interviews($branch, $conn){
	$sql = "select * from interview natural join hiring_branch where branch='".$branch."' ; ";
	$q = $conn->query($sql) or die('failed');
	return $q;
}

#################### functions for company


function get_company($cid,$conn)
{
 
 $sql = "select * from company where cid='".$cid."' ;";

 $q = $conn->query($sql) or die('failed');

 $r = $q->fetch(PDO::FETCH_ASSOC);
 
 return $r;   
}


function get_interviews($cid,$conn)
{
 $sql = "select * from interview where cid='".$cid."' ;";
 
 $q = $conn->query($sql) or die('failed');
 
 return $q;

}

#this is now fetched from companies instead of interview
function get_distinct_companies($conn){
$sql = "select cid,name from company; ";

$q = $conn->query($sql) or die('failed');

return $q;

}


function get_students_interviews($cid,$conn)
{
$sql = "select * from interested natural join student where cid='".$cid."' and status='request';";

$q = $conn->query($sql) or die('failed');

return $q;

}

function get_selected_students($cid, $conn){
	$sql = "select * from interested natural join student where cid='".$cid."' and status='selected';";
	$q = $conn->query($sql) or die('failed');
	return $q;
}


function get_interview($cid,$date,$time,$conn)
{

$sql = "select * from interview natural join company where date='".$date."' and time='".$time."' and cid='".$cid."' ;"; 

$q = $conn->query($sql) or die('failed');

$r = $q->fetch(PDO::FETCH_ASSOC);

return $r;

}

?>
