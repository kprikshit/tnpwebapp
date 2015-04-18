<?php

include "db.php";
session_start();
$conn = get_conn();

# addcourse.php



$sql = "insert into courses_done values('".$_SESSION['entryno']."','".$_REQUEST['course_code']."','".$_REQUEST['course_name']."'); " ;

$q = $conn->exec($sql) or die('failed');

header('Location: student_courses.php');

?>
