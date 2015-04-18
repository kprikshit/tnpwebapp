<html>
<head>
	<link href = "assets/css/bootstrap.min.css" rel="stylesheet">
	<link href = "assets/css/bootstrap-theme.min.css">
	<link href = "assets/css/style.css" rel="stylesheet">
	<script src= "assets/js/jquery-1.11.2.min.js"></script>
</head>
	<body>
		<div class="head">
			<div class="container">
				<h2><center>Training and Placement Cell</center></h2>
				<h4><center>Indian Institute of Technology Ropar</h4>
			</div>
		</div>

		<div class="container">
		<!-- login form to log into psql to connect to university database -->
		<form class="form-signin well" action="connect.php" method="post">
			<center><img src="images/admin.png" id="admin-img"></center>
			<center><h4 class="form-signin-heading">Admin Login</h4></center> 
			<input type="text" class="form-control" placeholder = "Username" name="uname" required autofocus/>
			<input type="password" class="form-control" name="pass" placeholder="Password" required/>
			<!-- Displaying error message if login fails -->
			<?php 
				if (isset($_GET['msg'])){
					echo "<p id='err_msg'>The username or password you entered is incorrect.</p>";
				}				
			?>
			<button type="submit" class="btn btn-lg btn-primary btn-block">Log in</button> 
		</form>
	</div>
	</body>
</html>
