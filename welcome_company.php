<?php
include "db_driver.php";
$cid = @$_SESSION['cid'];
if($cid !=null) $company = get_company($cid,$conn);
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
          <a class="navbar-brand" href="homeredirect.php">TnP Cell - IIT Ropar</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="homeredirect.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
<?php
if (isset($_SESSION['cid'])){
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
            <a href="welcome_company.php" class="list-group-item active"> Profile </a>
            <a href="company_interview.php" class="list-group-item"> Interviews </a>
            <a href="company_students.php" class="list-group-item"> Students </a>
          
          </div>

        </div><!--/.sidebar-offcanvas-->

        <div class="col-xs-12 col-sm-9">
          <div class="jumbotron">
<?php
if (isset($_SESSION['cid'])){
?>
<div class="bs-docs-section">
  <h2 id="breadcrumbs" class="page-header"> Welcome <?php  echo $company['name']; ?>   </h2>
<!--- Notification Code-->
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
  <p class="lead"> Your profile <a href="edit_company.php"> <button class="btn btn-primary"> Edit </button> </a> </p>
  <div class="bs-example" data-example-id="simple-breadcrumbs">
  <ol class="breadcrumb">
      <li> Company Name </li>
      <li class="active"> <?php echo $company['name']; ?> </li>
    </ol>
  <ol class="breadcrumb">
      <li> Contact Email </li>
      <li class="active"> <?php echo $company['contact_email'] ; ?> </li>
    </ol>
   
    <ol class="breadcrumb">
      <li> Contact Person </li>
      <li class="active"> <?php echo $company['contact_person']; ?> </li>
    </ol>
  <ol class="breadcrumb">
      <li> Contact Number </li>
      <li class="active"> <?php echo $company['contact_number']; ?> </li>
    </ol>
  
  </div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Set up an Interview 
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Enter details of the interview </h4>
      </div>
      <div class="modal-body">
        

<form action="add_interview.php" method="POST">
  <div class="form-group">
    <label for="Date"> Date of the Interview </label>
    <input type="date" class="form-control" name="date" placeholder="date(mm-dd-yyyy)"> 
  </div>
  <div class="form-group">
    <label for="Time"> Time </label>
    <input type="time" class="form-control" name="time" placeholder="time(23:55)">
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
	<label  for="resumeShortlist"> Resume Shortlisting: &nbsp; </label>
	<label class="checkbox-inline">
		<input type="checkbox"  name="resume_shortlist" value="True">.
	</label>
    <!--<input type="checkbox" class="form-control" name="resume_shortlist" value="True">-->
  </div>
  <div class="form-group">
    <label for="resumeShortlist"> Hiring Branch </label><br/>
	<div style="font-size: 16px;">
		<label class="checkbox-inline">
			<input type="checkbox"  name="CS" value="CS"> Computer Science
		</label>
		<label class="checkbox-inline">
			<input  type="checkbox"  name="EE" value="EE"> Electrical Engineering
		</label>
		<label class="checkbox-inline">
			<input  type="checkbox"  name="ME" value="ME"> Mechanical Engineering
		</label>
		<!--
		<input type="checkbox" class="form-control" name="CS" value="CS">Computer Science </input>
		<input type="checkbox" class="form-control" name="EE" value="EE">  Electrical Engineering </input>
		<input type="checkbox" class="form-control" name="ME" value="ME"> Mechanical Engineering</input>
	-->
	</div>
  </div>
  <div class="form-group">
    <label for="minCGPA"> Minimum CGPA Criteria </label>
    <input type="text" class="form-control" name="min_cgpa" placeholder="Minimum CGPA">
  </div>
  <div class="form-group">
    <label for="min10th"> Minimum 10th Standard Percentage </label>
    <input type="text" class="form-control" name="min_10th_percen" placeholder="%">
  </div>
 <div class="form-group">
    <label for="min12th"> Minimum 12th Standard Percentage </label>
    <input type="text" class="form-control" name="min_12th_percen" placeholder="%">
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
	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
</form>

    </div>
  </div>
</div>
</div>

<?php
}
else{
	echo "<p> Your session has expired. Please log into continue </p> ";
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


