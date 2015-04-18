<?php 
session_start();
include 'db.php';
$loggedin = isset($_SESSION['entryno']);
if($loggedin){
	
	#uploaded file info
	$uploaded_file = @$_FILES['resumefile'];
	$ext = pathinfo($uploaded_file["name"], PATHINFO_EXTENSION);
	if($uploaded_file == null){
		$_SESSION['notify'] = "File was not uploaded successfully.";
		header("Location: welcome_student.php");
		die();
	}
	if($ext != "pdf"){
		$_SESSION['notify'] = "Please upload pdf files only";
		header("Location: welcome_student.php");
		die();
	}
	
	
	$conn = get_conn();
	$entryno = @$_REQUEST['entryno'];
	
	#store location info
	$curr_path = getcwd()."/";
	$storeloc = "resumes/";
	$finalpath = $curr_path.$storeloc;
	
	$filename = $uploaded_file["name"];
	#new file name entry no-resume;
	$newfilename = $entryno.".pdf";
	
	$final_storage_path = $finalpath.$newfilename;
	$final_resume_link = $storeloc.$newfilename;
	if( move_uploaded_file( $uploaded_file['tmp_name'], $final_storage_path) ) {
		$query = "update student set resume_link='".$final_resume_link."' where entryno ='".$entryno."'";
		$q = $conn->query($query);
		if($q){
			$_SESSION['notify'] = "Resume Uploaded Successfully";
			//header("Location: welcome_student.php");
		}
		else{
			$_SESSION['notify'] = "Error in uploading. Please try again.";
			//echo $query;
			header("Location: welcome_student.php");
		}
	}
	else{
		$_SESSION['notify'] = "Internal Error Occured. Please try again";
		header("Location: welcome_student.php");
	}
}
else{
	$_SESSION['notify'] = "Not logged in.";
	header("Location: welcome_student.php");
}

?>