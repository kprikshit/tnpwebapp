<?php
include "db_driver.php";
$companyid = $_REQUEST['a'];
$interviewdate = $_REQUEST['b'];
$interviewtime = $_REQUEST['c'];
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
if (isset($_SESSION['entryno']) or isset($_SESSION['cid'])){
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
            <a href="welcome_student.php" class="list-group-item"> Profile </a>
            <a href="student_courses.php" class="list-group-item"> Courses Done </a>
            <a href="student_interview.php" class="list-group-item"> Interviews </a>
            <a href="student_apply.php" class="list-group-item"> Apply </a>
            <a href="#" class="list-group-item active"> Interview Details</a>
          </div>

        </div><!--/.sidebar-offcanvas-->

        <div class="col-xs-12 col-sm-9">
          <div class="jumbotron">
<?php
if (isset($_SESSION['entryno'])){
$interview = get_interview($companyid, $interviewdate, $interviewtime, $conn);
?>

<div class="bs-docs-section">
  <h2 id="breadcrumbs" class="page-header"> <?php  echo $_REQUEST['a']; ?> Interview Details   </h2>

    
  <div class="bs-example" data-example-id="simple-breadcrumbs">
  <ol class="breadcrumb">
      <li><a href="#"> Date of visiting </a></li>
      <li class="active"> <?php echo $interview['date'] ; ?> </li>
    </ol>
 <ol class="breadcrumb">
      <li><a href="#"> Time of the Interview </a></li>
      <li class="active"> <?php echo $interview['time'] ; ?> </li>
    </ol>
 
  <ol class="breadcrumb">
      <li><a href="#"> Contact Email </a></li>
      <li class="active"> <?php echo $interview['contact_email'] ; ?> </li>
    </ol>
  <ol class="breadcrumb">
      <li><a href="#"> Contact Person </a></li>
      <li class="active"> <?php echo $interview['contact_person'] ; ?> </li>
    </ol>
  <ol class="breadcrumb">
      <li><a href="#"> Contact Number </a></li>
      <li class="active"> <?php echo $interview['contact_number'] ; ?> </li>
    </ol>
   
    <ol class="breadcrumb">
      <li><a href="#"> Job Location </a></li>
      <li class="active"> <?php echo $interview['job_location']; ?> </li>
    </ol>
 <ol class="breadcrumb">
      <li><a href="#"> Job Salary </a></li>
      <li class="active"> <?php echo $interview['job_salary']; ?> </li>
    </ol>
   <ol class="breadcrumb">
      <li><a href="#"> Job Designation </a></li>
      <li class="active"> <?php echo $interview['job_designation']; ?> </li>
    </ol>
  
  <ol class="breadcrumb">
      <li><a href="#"> CGPA </a></li>
      <li class="active"> <?php echo $interview['min_cgpa']; ?> </li>
    </ol>
  <ol class="breadcrumb">
      <li><a href="#"> 10th Percentage </a></li>
      <li class="active"> <?php echo $interview['min_10th_percen']; ?> </li>
    </ol>
  <ol class="breadcrumb">
      <li><a href="#"> 12th Percentage </a></li>
      <li class="active"> <?php echo $interview['min_12th_percen']; ?> </li>
    </ol>

   <a href="apply_interview.php?a=<?php echo $interview['cid'];?>&b=<?php echo $interview['date'];?>&c=<?php echo $interview['time'];?>"> <button class='btn btn-default'> Apply  </button> </a> 
  
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


