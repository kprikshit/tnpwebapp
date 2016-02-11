<?php

session_start();
include 'db.php';
$conn = get_conn();

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
            <li class="active"><a href="homeredirect.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
 <?php
   if (isset($_SESSION['cid']) or isset($_SESSION['entryno']))
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
<br>
    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">
	  
        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
            <h1> TnP Cell- IIT Ropar</h1>
            <p> Welcome to online portal for all information related to training and placement of students of Indian Institute of Technology Ropar, Rupnagar, Punjab, India </p>


<?php
 if (isset($_SESSION['notify']))
 {
?>
 <div class="bs-example bs-example-standalone" data-example-id="dismissible-alert-js">
    <div class="alert alert-warning alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong> Alert: </strong> <?php echo $_SESSION['notify']; ?>
    </div>
<?php
unset($_SESSION['notify']);
}
?>
<!--<a href='admin/index.php'> Click here for Admin Portal </a>-->
<?php
#no need for this now. it is already done.
#if (isset($_SESSION['entryno']) or isset($_SESSION['cid'])){
if(false){
	echo "welcome ".$_SESSION['entryno'].$_SESSION['cid']." <br> ";
	echo "<a href='welcome_student.php'> Go To Student Portal </a>";
}
else {
?>     
		<div class="row">
		<div class="col-xs-6 col-lg-6">
    <form class="form-signin" action="student_verification.php" method="POST">
        <h2 class="form-signin-heading">Student sign in</h2>
        <label for="inputEntryNumber" class="sr-only">Entry Number</label>
        <input type="text" name="entryno" class="form-control" placeholder="Entry Number" required autofocus><br/>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required><br/>
      <!--  <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>  -->

        <button class="btn btn-primary btn-block" type="submit">I'm a Student</button>
      </form>
  <!--  <a href="new_student.php"> <button type="button" class="btn btn-link"> Not Registered? </button> </a> -->

            </div><!--/.col-xs-6.col-lg-4-->

          <div class="col-xs-6 col-lg-6">

    <form class="form-signin" action="company_verification.php" method="POST">
        <h2 class="form-signin-heading">Company sign in</h2>
        <label for="inputCompanyUsername" class="sr-only">Username</label>
        <input type="text" name="cid" class="form-control" placeholder="Username" required autofocus><br/>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required><br/>
     <!--   <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>  -->
        <button class="btn btn-primary btn-block" type="submit">I'm a Company</button>
      </form>
   <!--  <a href="new_company.php"> <button type="button" class="btn btn-link"> Not Registered? </button> </a> -->
<br>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  New Company
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Enter details of the Company</h4>
      </div>
      <div class="modal-body">
        
 <p> Please enter information below to send a request for registration to the TnP Officer of IIT Ropar </p>
<form action="register_company.php" method="POST">

  <div class="form-group"> 
    <label for="exampleInputPassword1">Username</label>
    <input type="text" class="form-control" name="cid" placeholder="Username">
  </div>
  <div class="form-group"> 
    <label for="exampleInputPassword1">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Name">
  </div>
 

  
  <div class="form-group"> 
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
 
<div class="form-group">
    <label for="exampleInputEmail1">Contact Email address</label>
    <input type="email" class="form-control" name="contact_email" placeholder="Enter email">
  </div>
 
 <div class="form-group">
    <label for="exampleInputEmail1">Contact Number</label>
    <input type="text" class="form-control" name="contact_number" placeholder="Enter number">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Contact Name</label>
    <input type="text" class="form-control" name="contact_person" placeholder="Enter contact name">
  </div>
 
 





      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Send Request</button>
      </div>
</form>
    </div>
  </div>
</div>

<?php } ?>
	</div><!--/.col-xs-6.col-lg-4-->  
	</div>
	<br><br>
		<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
  
		</div><!--/.sidebar-offcanvas-->    
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

