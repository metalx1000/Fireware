<!DOCTYPE html>
<html>
	<head>
                <?php include("../headers/header1.php");?>
		<script>
			$(document).ready(function(){
                                $("#title").html("Fuel Log");

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
					var mileage=$("#mileage").val();
					var comments=$("#comments").val();

					var url="submit_log.php";
		
					$.post(url,{
						"user": user,
						"station": station,
						"truck": truck,
						"start": start,
						"finish": finish,
						"gallons": gallons,
                                                "mileage": mileage,
						"comments": comments
					}).done(function( data ) {
						alert( data );
					}).fail(function() {
						alert( "error - Unable to Send" );
					});

//					window.location.replace("http://filmsbykris.com");
				}
			});
		</script>
	</head>
	<body>
		<div data-role="page" data-theme="a">
                            <?php include("../php/nav_home.php");?>
			<div data-role="content" data-theme="a">
				<label>Start:</label>
				<input type="number" id="start">

				<label>Finish:</label>
				<input type="number" id="finish">

				<label>Gallons:</label>
				<input type="number" id="gallons">

				<label>Mileage:</label>
				<input type="number" id="mileage">

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
