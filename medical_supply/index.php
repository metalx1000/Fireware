<!DOCTYPE html>
<html>
	<head>
                <?php include("../headers/header1.php");?>
		<script src="../js/supply_submit.js"></script>
                <script>
                    $(document).ready(function(){
                        //set title
                        $("#title").html("Medical Supply Order Form");
                    });
                </script>

	</head>
	<body>
		<div data-role="page" data-theme="a">
                        <?php include("../php/nav_home.php");?>

			<div data-role="content" data-theme="a">
				<?php 
					include("../employee/user.php");
					include("../stations/station.php");

				?>

                                <label>Quantity</label>
                                <input type="number" id="quantity" name="quantity" value="1">


                                <ul data-role="listview" data-filter="true" data-inset="true">
                                    <?php include("get_list.php");?>
                                </ul>

			</div>
		</div>
	</body>
</html>
