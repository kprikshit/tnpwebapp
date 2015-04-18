<?php
session_start();

// when clicked to the PAGE LOGO AND NAME (TnP cell IIT ROPAR), where to redirect the page

$studentloggedin = isset($_SESSION['entryno']);
$companyloggedin = isset($_SESSION['cid']);
if($studentloggedin){
	header("Location: welcome_student.php");
}
else if($companyloggedin){ 
	header("Location: welcome_company.php");
}
else{
	session_unset();
	header("Location: index.php");
}
?>