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
					var user=$("#user").val();
					var user2=$("#user2").val();
					var officer=$("#officer").val();
					var officer2=$("#officer2").val();
					var date=$("#date").val();
					var comments=$("#comments").val();

					var url="submit_log.php";
		
					$.post(url,{
						"user": user,
						"user2": user2,
						"officer": officer,
						"officer2": officer2,
						"date": date,
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
			<div data-role="header" data-position="inline">
				<h1>Shift Exchange Form</h1>
			</div>
			<div data-role="content" data-theme="a">
				<?php include("../employee/user.php");?>
				<label>Requests a Shift Exchange with:</label>
				<?php include("../employee/user2.php");?>

				<label>On:</label>
        			<input type="date" id="date" name="date">
                                
				<label>Request will be sent for approval to Lt:</label>
				<?php include("../employee/officer.php");?>

				<label>And BC:</label>
				<?php include("../employee/officer2.php");?>

                                <label>Comments</label>
				<textarea id="comments"></textarea>

				<div class="ui-grid-a">
					<div class="ui-block-a"><button id="send" data-theme="b">Submit</button></div>
				</div>

			</div>
		</div>
	</body>
</html>
