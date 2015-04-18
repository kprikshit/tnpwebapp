<?php
include "db_driver.php";
#knowing if some one is logged in or not
$cid = @$_SESSION['cid'];
$entryno = @$_SESSION['entryno'];
$loggedin = (isset($cid) or isset($entryno));
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <meta name="description" content="iit ropar">
    <meta name="author" content="vishwash batra">
    <link rel="icon" href="../../favicon.ico">

    <title> Training and Placement Cell- IIT Ropar </title>

  
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
            <li ><a href="homeredirect.php">Home</a></li>
            <li class="active"><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
<?php
if ($loggedin){
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
<br>

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
            <h1> </h1>
            <p> The link you accessed is probably broken. Please try again with proper link or report it to us</p>
          <div class="row">
            <div class="col-xs-6 col-lg-6">
            </div><!--/.col-xs-6.col-lg-4-->

  
</div>
<br>
<br>
    
  </div><!--/row-->

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

