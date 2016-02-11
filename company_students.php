<?php

include "db_driver.php";
$cid = @$_SESSION['cid'];
if(isset($cid)) $company = get_company($cid,$conn)
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
            <a href="company_interview.php" class="list-group-item"> Interviews </a>
            <a href="company_students.php" class="list-group-item active"> Students </a>
          
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
if ( isset($cid) ){
	$students = get_students_interviews($cid, $conn);
	$selectedstuds  = get_selected_students($cid, $conn);
?>
<h2 class="page-header"> Students who applied to the interviews: </h2>
<div class="bs-example" data-example-id="striped-table">
    <table class="table table-striped">
      <thead>
        <tr>
          <th> # </th>
          <th> Entry Number </th>
          <th> CGPA </th>
          <th> Interview Date </th>
          <th> Interview Time </th>
          <th> Select </th>
          <th> Reject </th>
        </tr>
      </thead>
      <tbody>
<?php
$num = 1;
while ($student = $students->fetch(PDO::FETCH_ASSOC))
{
 echo "<tr> 
 <td> ".$num. " </td> 
 <td> <a href='view_student.php?a=".$student['entryno']."'> ".$student['entryno']." </a> </td>  
 <td> ".$student['cgpa']." </td> <td>".$student['date']." </td>
 <td>".$student['time']." </td> <td> <a href='select_student.php?a=".$student['entryno']."&b=".$student['date']."&c=".$student['time']."'> <span class='glyphicon glyphicon-ok' aria-hidden='true'></span> </a> </td> 
 <td> <a href='reject_student.php?a=".$student['entryno']."&b=".$student['date']."&c=".$student['time']."'> <span class='glyphicon glyphicon-remove' aria-hidden='true'> </span> </a> </td> 
 </tr> ";


 $num++;
}
?>       
	</tbody>
    </table>
	<!-- selected students inteview-->
	<h2 class="page-header"> Already Selected Students: </h2>
	<table class="table table-striped">
      <thead>
        <tr>
          <th> # </th>
          <th> Entry Number </th>
          <th> Name </th>
          <th> Email </th>
          <th> CGPA </th>
        </tr>
      </thead>
      <tbody>
<?php
$num = 1;
while ($student = $selectedstuds->fetch(PDO::FETCH_ASSOC)){
 echo "<tr> 
		<td> ".$num. " </td>  <td> <a href='view_student.php?a=".$student['entryno']."'> ".$student['entryno']." </a> </td>  
		<td> ".$student['first_name']." ".$student['last_name']."</td>
		<td> ".$student['email']." </td>
		<td> ".$student['cgpa']." </td>
		</tr> ";
 $num++;
}
?>  
	</tbody>
    </table>
</div><!-- /example -->
  
  
<?php
}
else
{
echo "<p> Your session has expired. Please log into continue </p> ";
}
?>
          </div>
      </div><!--/row-->
     </div>
      <hr>
      <footer>
        <p>&copy; Developed as part of Database Project for CSL451-2015, IIT Ropar </p>
      </footer>
    </div><!--/.container-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="static/jquery/jquery.min.js"></script>
    <script src="static/js/bootstrap.min.js"></script>

  </body>
</html>


