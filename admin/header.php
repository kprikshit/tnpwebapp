<?php
session_start();

if(($_SESSION['auth']!=1))
{
	header("location:index.php");
	exit;	
}
else
{
	
?>

<html>
<head>
	<link href = "assets/css/bootstrap.min.css" rel="stylesheet">
	<link href = "assets/css/bootstrap-theme.min.css" rel="stylesheet">
	<link href = "assets/css/style.css" rel="stylesheet">
	<script src= "assets/js/jquery-1.11.2.min.js"></script>
	<script src= "assets/js/bootstrap.min.js"></script>
	<script src= "assets/js/bootstrap-tab.js"></script>
</head>
	<body>
		<div class="head">
			<div class="container">
				<h3><center>IIT Ropar - Training and Placement Cell</center></h3>
				
			</div>
		</div>

		<div id="wrapper">
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0"  >
			<div class="container">	
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<p class="navbar-brand" style="height:40px;">Welcome <?php echo $_SESSION['name']; ?></p>
				</div>
				
				<ul class="nav navbar-top-links navbar-right">
					<li>
						<a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
					</li>
					
				</ul>
			</div>
			<div class="navbar-default sidebar" role="navigation">
				<div class="sidebar-nav navbar-collapse">
					<ul class="nav" id="side-menu">
						<li>
							<a href="students.php" id="sidebar1"><span class="glyphicon glyphicon-education"></span> Students</a>
						</li>
						<li>
							<a href="company.php" id="sidebar2"><span class="glyphicon glyphicon-list-alt"></span> Companies</a>
						</li>
						<li>
							<a href="interviews.php" id="sidebar3"><span class="glyphicon glyphicon-calendar"></span> Interviews scheduled</a>
						</li>
						<li>
							<a href="notifications.php" id="sidebar4"><span class="glyphicon glyphicon-bell"></span> Notifications</a>
						</li>
						<li>
							<a href="stats.php" id="sidebar5"><span class="glyphicon glyphicon-stats"></span> Stats</a>
						</li>
					</ul>
				</div>
			</div>	
		</nav>
<?php
}
?>

