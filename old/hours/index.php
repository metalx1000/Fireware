<!DOCTYPE html>
<html>
	<head>
                <?php include("../headers/header1.php");?>
		<script>
			$(document).ready(function(){

                                $("#title").html("Entering Hours for " + date);

				$("#send").click(function(){
					send();
				});

				function send(){
					var url="submit_log.php";
	
					$.post(url, $( "#form1" ).serialize()
					).done(function( data ) {
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
                            <form id="form1">
				<?php 
					include("../employee/user_no_local.php");
					include("../stations/station.php");
                                        include("range.php");
				?>


				<label>Comments</label>
				<input type="text" id="comments" name="comments" form="form1">

				<div class="ui-grid-a">
					<div class="ui-block-a"><button id="send" data-theme="b">Submit</button></div>
				</div>
                            </form>
			</div>
		</div>
	</body>
</html>
