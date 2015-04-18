<?php

#include "db.php";
include "db_driver.php";
#session_start();
#$conn = get_conn();

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
	<br><br><br>
    <div class="container">
      <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">

          <div class="list-group">
            <a href="welcome_student.php" class="list-group-item"> Profile </a>
            <a href="student_courses.php" class="list-group-item active"> Courses Done </a>
            <a href="student_interview.php" class="list-group-item"> Interviews </a>
            <a href="student_apply.php" class="list-group-item"> Apply </a>
          </div>
        </div><!--/.sidebar-offcanvas-->
        <div class="col-xs-12 col-sm-9">
			<div class="jumbotron">
				
<?php
$student = get_student($entryno,$conn);
$courses = get_courses($entryno,$conn);
if (isset($_SESSION['entryno']))
  {
?>
	<h2  class="page-header"> Courses Done: </h2>
	<div class="bs-example" data-example-id="hoverable-table">
		<table class="table table-hover">
		  <thead>
			<tr>
			  <th>#</th>
			  <th>Course Name</th>
			  <th>Course Code</th>
			</tr>
		  </thead>
		  <tbody>
	<?php
	$num= 1;
	while ($course = $courses->fetch(PDO::FETCH_ASSOC)){
	echo "<tr> <td>".(string)$num."</td> <td> ".$course['course_name']."</td> <td>".$course['course_code']." </td> </tr> ";
	$num++;
	}
	?>
	</tbody>
		</table>
	</div><!-- /example -->

<!-- FOR ADDING COURSES
<form class="form-inline" action="add_course.php" method="POST">
  <div class="form-group">
    <label for="exampleInputName2"> Course Name</label>
    <input type="text" class="form-control" name="course_name" placeholder="CSL-xxx">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail2"> Course Code </label>
    <input type="email" class="form-control" name="course_code" placeholder="Advanced Algorithms">
  </div>
  <button type="submit" class="btn btn-default"> Add Course </button>
</form>
-->
<?php
}
else {
echo "<p> Your session has expired. Please log into continue </p> ";
}
?>
			</div><!--/jumbotron-->
      </div><!--col-xs-12-->
     </div><!--/row-->
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


