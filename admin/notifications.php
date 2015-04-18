<?php include 'header.php';?>
		<div id="page-wrapper">
			<ul class="nav nav-tabs" style="padding-top:10px;">
				<li class="active" style="width:50%"><a href="#regrequest" data-toggle="tab"><b>Registration requests</b></a></li>	
				<li  style="width:50%"><a href="#interviewrequest" data-toggle="tab"><b>Interview requests</b></a></li>	
			</ul>

			<div class="tab-content">
				<div class="tab-pane active" id="regrequest">
					<?php include 'regrequest.php';?>
				</div>

				<div class="tab-pane" id="interviewrequest">
					<?php include 'interviewrequest.php';?>
				</div>
			</div>
		</div>
	</div>
	<script>
		$('#sidebar4').addClass('active');
	</script>
	</body>

</html>
