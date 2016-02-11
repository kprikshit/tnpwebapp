<?php
include "db_driver.php";
$entryno = @$_SESSION['entryno'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="iit ropar">
    <meta name="author" content="vishwash batra">
    <link rel="icon" href="../../favicon.ico">
    <title> Tnp-IIT Ropar- Student Portal </title>

    <!-- Bootstrap core CSS -->
    <link href="static/css/bootstrap.min.css" rel="stylesheet">     
<script>
// for showing progress bar
	function _(el){
	return document.getElementById(el);
}
function uploadFile(){
	// get fil
	var file = _("resumefile").files[0];
	// alert(file.name+" | "+file.size+" | "+file.type);
	var formdata = new FormData();
	formdata.append("resumefile", file);
	formdata.append("entryno", _("entryno").value);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "student_upload_resume.php");
	ajax.send(formdata);
}
function progressHandler(event){
	var percent = (event.loaded / event.total) * 100;
	_("progressBar").value = Math.round(percent);
	_("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
}
function completeHandler(event){
	_("status").innerHTML = event.target.responseText;
	_("progressBar").value = 100;
}
function errorHandler(event){
	_("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
	_("status").innerHTML = "Upload Aborted";
}
</script>
  </head>

  <body>
    <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="homeredirect.php">TnP Cell - IIT Ropar</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="homeredirect.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
   <?php
      if (isset($_SESSION['entryno']))
           {
 ?>
         <li><a href="logout.php">Log Out</a></li>
 <?php
           }
    
 ?>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
<br>
<br>
<br>

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">


        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">

          <div class="list-group">
            <a href="welcome_student.php" class="list-group-item active"> Profile </a>
            <a href="student_courses.php" class="list-group-item"> Courses Done </a>
            <a href="student_interview.php" class="list-group-item"> Interviews </a>
            <a href="student_apply.php" class="list-group-item"> Apply </a>
          
          </div>

        </div><!--/.sidebar-offcanvas-->

        <div class="col-xs-12 col-sm-9">
          <div class="jumbotron">
<?php
$student = get_student($entryno,$conn);
if (isset($_SESSION['entryno'])){
?>

<!--- Notify code-->
<?php
if (isset($_SESSION['notify'])){
?>
<div class="bs-example bs-example-standalone" data-example-id="dismissible-alert-js">
	<div class="alert alert-warning alert-dismissible fade in" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong> New Notification: </strong> <?php echo $_SESSION['notify']; ?>
	</div>
</div>
<?php
 unset($_SESSION['notify']);
 }
?>

<div class="bs-docs-section">
  <h2 id="breadcrumbs" class="page-header"> Welcome <?php  echo $student['first_name']." ".$student['middle_name']." ".$student['last_name']; ?>   </h2>
  <p class="lead"> Your profile Information: <!--<button class="btn-primary"> Edit </button> --></p>
  <div class="bs-example" data-example-id="simple-breadcrumbs">
  <ol class="breadcrumb">
      <li> Full Name </li>
      <li class="active"> <?php echo $student['first_name']." ".$student['middle_name']." ".$student['last_name']; ?> </li>
    </ol>
  <ol class="breadcrumb">
      <li> Email </li>
      <li class="active"> <?php echo $student['email'] ; ?> </li>
    </ol>
   
    <ol class="breadcrumb">
      <li> Department </li>
      <li class="active"> <?php echo $student['department']; ?> </li>
    </ol>
  <ol class="breadcrumb">
      <li> CGPA </li>
      <li class="active"> <?php echo $student['cgpa']; ?> </li>
    </ol>
  <ol class="breadcrumb">
      <li> 10th Percentage </li>
      <li class="active"> <?php echo $student['percen10']; ?> </li>
    </ol>
  <ol class="breadcrumb">
      <li> 12th Percentage </li>
      <li class="active"> <?php echo $student['percen12']; ?> </li>
    </ol>
  <ol class="breadcrumb">
  <!-- this will be redirected too student_upload_resume.php via javascript function defined in beginning-->
	<form id= "resumeup" enctype="multipart/form-data"  method="POST">
		<li style="display: inline-block;"><a href="#">Upload New Resume: </a></li>
		<li  style="display: inline-block;class="active"> <input type="file" name="resumefile" id="resumefile"> </li>
		<input type="hidden" id="entryno" name="entryno" value="<?php echo $student['entryno'];?>" />
		<input type="submit" onclick="uploadFile()"/>
		<progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
		<p style="display: inline-block; font-size: 12px;" id="status"></p>
	</form>
    </ol>
   <ol class="breadcrumb">
      <li><a href="#"> Current Resume: </a></li>
	<?php 
		if($student['resume_link'] != ''){
	?>
		<li class="active"> <a class="btn btn-primary btn-md" href="student_viewresume.php?resumelink=<?php echo $student['resume_link']?>">View Resume</a> </li>
	<?php
		}
	else{
	?>	
		<li class="active"> No Resume Uploaded </li>
	<?php 
	}
	?>
    </ol>
  </div>
  </div>
<?php
}
else {
	echo "<p> Your session has expired. Please log into continue </p> ";
}
?>
      </div><!--/row-->
     </div>
	 </div>
      <hr>
      <footer>
        <p>&copy; Developed as part of Database Project for CSL454-2015, IIT Ropar </p>
      </footer>
    </div><!--/.container-->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="static/jquery/jquery.min.js"></script>
    <script src="static/js/bootstrap.min.js"></script>

  </body>
</html>


