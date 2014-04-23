<!DOCTYPE html>
<html>
	<head>
		<title>Fuel Log</title>
                <?php include("../headers/header1.php");?>
		<script>
			$(document).ready(function(){

				$("#send").click(function(){
					send();
				});

				function send(){
					var start=$("#start").val();
					var finish=$("#finish").val();
					var gallons=$("#gallons").val();
					var user=$("#user").val();
					var station=$("#station").val();
					var truck=$("#truck").val();
					var comments=$("#comments").val();

					var url="submit_log.php";
		
					$.post(url,{
						"user": user,
						"station": station,
						"truck": truck,
						"start": start,
						"finish": finish,
						"gallons": gallons,
						"comments": comments
					}).done(function( data ) {
						alert( data );
					}).fail(function() {
						alert( "error - Unable to Send" );
					});


					localStorage.user=user;
					localStorage.station=station;
					localStorage.truck=truck;

//					window.location.replace("http://filmsbykris.com");
				}
			});
		</script>
	</head>
	<body>
		<div data-role="page" data-theme="a">
			<div data-role="header" data-position="inline">
				<h1>Fuel Log Form</h1>
			</div>
			<div data-role="content" data-theme="a">
				<label>Start:</label>
				<input type="number" id="start">

				<label>Finish:</label>
				<input type="number" id="finish">

				<label>Gallons:</label>
				<input type="number" id="gallons">

				<?php 
					include("../employee/user.php");
					include("../trucks/truck.php");
					include("../stations/station.php");

				?>

				<label>Comments</label>
				<textarea id="comments"></textarea>

				<div class="ui-grid-a">
					<div class="ui-block-a"><button id="send" data-theme="b">Submit</button></div>
				</div>

			</div>
		</div>
	</body>
</html>
