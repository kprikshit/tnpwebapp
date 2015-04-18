<?php

include "db.php";
session_start();
$conn = get_conn();

# welcome to add_interview.php
#flag for error
$flag = 0;

echo $_REQUEST['CS'];

echo $_REQUEST['EE'];

echo $_REQUEST['ME'];

$date = $_REQUEST['date'];

$time =  $_REQUEST['time'];

$type =  $_REQUEST['type'];

$num_rounds =  $_REQUEST['num_of_rounds'];

if ($_REQUEST['resume_shortlist'] != "True")
 $resume =  "False";
else
 $resume =  $_REQUEST['resume_shortlist'];


$min_c = $_REQUEST['min_cgpa'];

$min_10 = $_REQUEST['min_10th_percen'];

$min_12 =  $_REQUEST['min_12th_percen'];

$degree = $_REQUEST['degree'];

$job_l = $_REQUEST['job_location'];

$job_s = $_REQUEST['job_salary'];

$job_d = $_REQUEST['job_designation'];


$sql = "insert into interview values('".$date."','".$time."','".$type."','".$_SESSION['cid']."','".$num_rounds."','".$resume."','".$min_c."','".$min_10."','".$min_12."','".$degree."','".$job_l."','".$job_s."','".$job_d."','0'); ";

echo $sql;

$q = $conn->exec($sql) or die('failed');


if ($_REQUEST['CS']=="CS")
{
$sql3 = "insert into Hiring_branch values('".$_SESSION['cid']."','CS','".$date."','".$time."','".$type."');";
echo $sql3;
$q = $conn->exec($sql3) or die('failed');
}


if ($_REQUEST['EE']=="EE")
{
$sql3 = "insert into Hiring_branch values('".$_SESSION['cid']."','EE','".$date."','".$time."','".$type."');";
echo $sql3;
$q = $conn->exec($sql3) or die('failed');
}

if ($_REQUEST['ME']=="ME")
{
$sql3 = "insert into Hiring_branch values('".$_SESSION['cid']."','ME','".$date."','".$time."','".$type."');";
echo $sql3;
$q = $conn->exec($sql3) or die('failed');
}


$_SESSION['notify'] = "Request for scheduling interview has been sent to the administrator";

header("Location: welcome_company.php");

?>
