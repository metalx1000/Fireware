<!DOCTYPE html>
<html>
	<head>
                <?php include("../headers/header1.php");?>
		<script src="../js/supply_submit.js"></script>
	</head>
	<body>
		<div data-role="page" data-theme="a">
			<div data-role="header" data-position="inline">
				<h1>Medical Supply Order</h1>
			</div>
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
