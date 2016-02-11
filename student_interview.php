<?php
#session_start();
#include "db.php";
include "db_driver.php";
$conn = get_conn();

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
<br>
<br>
<br>

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">


        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">

          <div class="list-group">
            <a href="welcome_student.php" class="list-group-item"> Profile </a>
            <a href="student_courses.php" class="list-group-item"> Courses Done </a>
            <a href="student_interview.php" class="list-group-item active"> Interviews </a>
            <a href="student_apply.php" class="list-group-item"> Apply </a>
          
          </div>

        </div><!--/.sidebar-offcanvas-->

        <div class="col-xs-12 col-sm-9">
          <div class="jumbotron">
<?php
$list = get_applied_interviews($entryno,$conn);
if (isset( $entryno )){
?>
		<h2 class="page-header"> Applied Interviews: </h2>
<div class="bs-example" data-example-id="striped-table">
    <table class="table table-striped">
      <thead>
        <tr>
          <th> Company </th>
          <th> Date </th>
          <th> Time </th>
          <th> Job Location </th>
          <th> Job Designation </th>
          <th> Job Salary </th>
          <th> Status </th>
        </tr>
      </thead>
      <tbody>
<?php
while ( $one = $list->fetch(PDO::FETCH_ASSOC) ){
 #<td> <a href='view_interview.php?a=".$one['cid']."&b=".$one['date']."&c=".$one['time']."'> ".$one['cid']." </a> </td> 
 echo "<tr> 
	<td> <a href='view_company.php?a=".$one['cid']."' </a>".$one['name']."</td> 
	<td> ".$one['date']." </td> 
	<td> ".$one['time']." </td>
	<td> ".$one['job_location']." </td>
	<td> ".$one['job_designation']." </td>
	<td> ".$one['job_salary']." </td>";
	if($one['status']=="request"){
		echo "<td> Pending </td>";
	}
	else{
		echo "<td> <b>Selected </b></td>";
	}
	echo "</tr> ";
}
?>       
	</tbody>
    </table>
  </div><!-- /example -->
<?php
   }
else {
echo "<p> Your session has expired. Please log into continue </p> ";
}
?>
	</div>
		</div><!--/row-->
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


