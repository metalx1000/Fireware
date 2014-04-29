<!DOCTYPE html>
<html>
	<head>
                <?php include("../headers/header1.php");?>
	</head>
	<body>
		<div data-role="page" data-theme="a">
			<div data-role="header" data-position="inline">
				<h1>FireWare Main Menu</h1>
			</div>
			<div data-role="content" data-theme="a">
                                <ul data-role="listview" data-filter="true" data-inset="true">
                                    <?php include("get_menu.php");?>
                                </ul>

			</div>
		</div>
	</body>
</html>
