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
            <a href="welcome_company.php" class="list-group-item active"> Profile </a>
            <a href="company_interview.php" class="list-group-item"> Interviews </a>
            <a href="company_students.php" class="list-group-item"> Students </a>
          
          </div>

        </div><!--/.sidebar-offcanvas-->

        <div class="col-xs-12 col-sm-9">
          <div class="jumbotron">
<?php


if (isset($_SESSION['cid']))
  {
?>


<div class="bs-docs-section">
  <h2 id="breadcrumbs" class="page-header"> welcome <?php  echo $company['cid']; ?>   </h2>

<?php
 if (isset($_SESSION['notify']))
 {
?>

 <div class="bs-example bs-example-standalone" data-example-id="dismissible-alert-js">
    <div class="alert alert-warning alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong> New Notification: </strong> <?php echo $_SESSION['notify']; ?>
    </div>


<?php
 unset($_SESSION['notify']);

 }
?>
  
  <form action="update_company.php" method="POST">
  <div class="bs-example" data-example-id="simple-breadcrumbs">
  <ol class="breadcrumb">
      <li><a href="#"> Company Name </a></li>
      <input type="text" name="name" value="<?php echo $company['name']; ?>" >
    </ol>
  <ol class="breadcrumb">
      <li><a href="#"> Contact Email </a></li>
      <input type="email" name="contact_email" value= "<?php echo $company['contact_email'] ; ?>">
    </ol>
   
    <ol class="breadcrumb">
      <li><a href="#"> Contact Person </a></li>
      <input type="text" name="contact_person" value="<?php echo $company['contact_person']; ?> ">
    </ol>
  <ol class="breadcrumb">
      <li><a href="#"> Contact Number </a></li>
      <input type="text" name="contact_number" value="<?php echo $company['contact_number']; ?>">
    </ol>
  
  </div>
 
 <p class="lead"> Your profile  <input class="btn-primary" type="submit" value="Update">    </p>
 </form>

<a href="welcome_company.php"> <button class="btn-primary" > Cancel </button> </a>
<?php
}
else{
	echo "</p> Please log into continue </p>";
}
?>
          </div>

      </div><!--/row-->
     </div>
  </div> <!-- container -->

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


