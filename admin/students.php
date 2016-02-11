<?php include 'header.php';?>
		<div id="page-wrapper">
			<ul class="nav nav-tabs" style="padding-top:10px;">
				<li class="active" style="width:50%"><a href="#finalyear" data-toggle="tab"><b></b>Eligible for Placements</b></a></li>	
				<li  style="width:50%"><a href="#prefinalyear" data-toggle="tab"><b>Eligible for Internships</b></a></li>	
			</ul>

			<div class="tab-content">
				<div class="tab-pane active" id="finalyear">
					<?php include 'final_year_students.php';?>
				</div>

				<div class="tab-pane" id="prefinalyear">
					<?php include 'pre_final_year_students.php';?>
				</div>
			</div>

		
		</div>
	</div>
	<script>
		$('#sidebar1').addClass('active');
	</script>

	</body>

</html>
