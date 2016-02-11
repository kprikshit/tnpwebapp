<?php

include "db_driver.php";

$cid = $_SESSION['cid'];


$company = get_company($cid,$conn);


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

    <title> Tnp-IIT Ropar- Company Portal </title>

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
          <a class="navbar-brand" href="index.php">TnP Cell - IIT Ropar</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
   <?php
      if (isset($_SESSION['cid']))
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
            <a href="company_interview.php" class="list-group-item active"> Interviews </a>
            <a href="company_students.php" class="list-group-item"> Students </a>
          
          </div>

        </div><!--/.sidebar-offcanvas-->

<?php

  if (isset($_SESSION['cid']))
  {
?>

        <div class="col-xs-12 col-sm-9">
          <div class="jumbotron">

<form action="add_interview.php" method="POST">
  <div class="form-group">
    <label for="Date"> Date of the Interview </label>
    <input type="text" class="form-control" name="date" placeholder="date">
  </div>
  <div class="form-group">
    <label for="Time"> Time </label>
    <input type="text" class="form-control" name="time" placeholder="time">
  </div>
  <div class="form-group">
    <label for="type"> Type </label>
    <input type="radio" name="type" value="placement"> Placement
    <input type="radio" name="type" value="training"> Training
  </div>
  <div class="form-group">
    <label for="numberOfRounds"> Number of Rounds </label>
    <input type="text" class="form-control" name="num_of_rounds" placeholder="rounds">
  </div>
  <div class="form-group">
    <label for="resumeShortlist"> Resume Shortlisting </label>
    <input type="checkbox" class="form-control" name="resume_shortlist" value="True">
  </div>
  <div class="form-group">
    <label for="resumeShortlist"> Hiring Branch </label>
     <input type="checkbox" class="form-control" name="CS" value="CS"> Computer Science
    <input type="checkbox" class="form-control" name="EE" value="EE">  Electrical Engineering 
    <input type="checkbox" class="form-control" name="ME" value="ME"> Mechanical Engineering
  </div>
  
  <div class="form-group">
    <label for="minCGPA"> Minimum CGPA Criteria </label>
    <input type="text" class="form-control" name="min_cgpa" placeholder="min_cgpa">
  </div>
  <div class="form-group">
    <label for="min10th"> Minimum 10th Standard Percentage </label>
    <input type="text" class="form-control" name="min_10th_percen" placeholder="percentage">
  </div>
 <div class="form-group">
    <label for="min12th"> Minimum 12th Standard Percentage </label>
    <input type="text" class="form-control" name="min_12th_percen" placeholder="percentage">
  </div>
 <div class="form-group">
    <label for="degree"> Degree Requirements </label>
    <input type="text" class="form-control" name="degree" placeholder="degree">
  </div>
 <label> Job Details </label> 
 <div class="form-group">
    <label class="sr-only" for="jobLocation">Job Location</label>
    <input type="text" class="form-control" name="job_location" placeholder="Location">
  </div>
  <div class="form-group">
    <label class="sr-only" for="jobDesignation"> Job Designation</label>
    <input type="text" class="form-control" name="job_designation" placeholder="Designation">
  </div>
  
<div class="form-group">
    <label class="sr-only" for="JobSalary">Amount (in rupees)</label>
    <div class="input-group">
      <div class="input-group-addon">Rs</div>
      <input type="text" class="form-control" name="job_salary" placeholder="Amount">
      <div class="input-group-addon">.00</div>
    </div>

  <button type="submit" class="btn btn-default">Submit</button>
</form>




          </div>

<?php
  }

else
{
echo "<p> Please log into continue </p>";
}

?>

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


