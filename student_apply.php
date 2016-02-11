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
if (isset($entryno)){
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
            <a href="student_apply.php" class="list-group-item active"> Apply </a>
          
          </div>

        </div><!--/.sidebar-offcanvas-->

        <div class="col-xs-12 col-sm-9">
          <div class="jumbotron">
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
<?php
if (isset($entryno) ){
$companies = get_distinct_companies($conn);
echo "<h2  class='page-header'> Upcoming Companies: </h2>";
while ($company = $companies->fetch(PDO::FETCH_ASSOC)){
	echo "<a href='view_company.php?a=".$company['cid']."'> <button class='btn btn-primary'>".$company['name']."</button> </a>";
}
?>
<div class="bs-example" data-example-id="striped-table">
    <table class="table table-striped">
      <thead>
        <tr>
          <th> Company </th>
          <th> Date </th>
          <th> Time </th>
          <th> Apply </th>
        </tr>
      </thead>
      <tbody>
<?php
$interviews = get_upcoming_interviews($conn,$entryno);
echo "<h2 class='page-header'> Interviews you can apply to: </h2>";
if($interviews !=null){
	while ($interview = $interviews->fetch(PDO::FETCH_ASSOC)){
	 echo "<tr> 
		<td> <a href='view_interview.php?a=".$interview['cid']."&b=".$interview['date']."&c=".$interview['time']."'> ".$interview['name']." </a> </td> 
		<td> ".$interview['date']." </td> 
		<td> ".$interview['time']." </td> 
		<td> <a href='apply_interview.php?a=".$interview['cid']."&b=".$interview['date']."&c=".$interview['time']."'> Apply </a> </td> 
		</tr>";
	}
}
?>       
	</tbody>
    </table>
  </div><!-- /example -->
<?php
 }
else{
echo "<p> Your session has expired. Please log into continue </p> ";
 }
?>
		  </div>
        </div>
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


