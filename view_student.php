<?php

include "db_driver.php";

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
      if (isset($_SESSION['entryno']) or isset($_SESSION['cid']))
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
            <a href="welcome_company.php" class="list-group-item"> Profile </a>
            <a href="company_interview.php" class="list-group-item"> Interviews </a>
            <a href="company_students.php" class="list-group-item"> Students </a>
            <a href="#" class="list-group-item active"> View Student </a>
          
          </div>

        </div><!--/.sidebar-offcanvas-->

        <div class="col-xs-12 col-sm-9">
          <div class="jumbotron">
<?php


$student = get_student($_REQUEST['a'],$conn);


if (isset($_SESSION['cid']))
{
?>


<div class="bs-docs-section">
  <h2 id="breadcrumbs" class="page-header"> <?php  echo $_REQUEST['a']; ?>   </h2>

    
  <div class="bs-example" data-example-id="simple-breadcrumbs">
  <ol class="breadcrumb">
      <li><a href="#"> Full Name </a></li>
      <li class="active"> <?php echo $student['first_name']." ".$student['middle_name']." ".$student['last_name']; ?> </li>
    </ol>
  <ol class="breadcrumb">
      <li><a href="#"> Email </a></li>
      <li class="active"> <?php echo $student['email'] ; ?> </li>
    </ol>
   
    <ol class="breadcrumb">
      <li><a href="#"> Department </a></li>
      <li class="active"> <?php echo $student['department']; ?> </li>
    </ol>
  <ol class="breadcrumb">
      <li><a href="#"> CGPA </a></li>
      <li class="active"> <?php echo $student['cgpa']; ?> </li>
    </ol>
  <ol class="breadcrumb">
      <li><a href="#"> 10th Percentage </a></li>
      <li class="active"> <?php echo $student['percen10']; ?> </li>
    </ol>
  <ol class="breadcrumb">
      <li><a href="#"> 12th Percentage </a></li>
      <li class="active"> <?php echo $student['percen12']; ?> </li>
    </ol>
  <ol class="breadcrumb">
      <li><a href="#"> Resume: </a></li>
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
<?php

   }

else {

echo "<p> Your session has expired. Please log in to continue </p> ";
   }

?>

          </div>

      </div><!--/row-->
     </div>
  </div> <!-- container -->

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


