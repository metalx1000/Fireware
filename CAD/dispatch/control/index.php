<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CAD DISPATCHER</title>
	<link rel="stylesheet" href="themes/cad.min.css" />
	<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

        <script>
            $(document).ready(function(){

                $('#units_search').children('li').children('a').bind('touchstart mousedown', function(e){
                    var unit = $(this).html();
                    $("#units").append(unit + ", ");
                });
       
                $(".submit").children('button').bind('touchstart mousedown', function(e){
                    var call_type = e.currentTarget.innerHTML;
                    var units = $("#units").html();
                    var address = $("#address").val();

                    $.get( "submit.php", { call_type: call_type, units: units, address: address } )
                        .done(function(data){
                            $("#address").val('');
                            $("#units").html('');
                        });
                }); 
            });
        </script>
</head>
<body>
	<div data-role="page" data-theme="a">
		<div data-role="header" data-position="inline">
			<h1>Control Screen</h1>
		</div>
		<div data-role="content" data-theme="a">
                    <div id="units"> </div>
                    <ul id="units_search" data-role="listview" data-inset="true" data-filter="true" data-filter-reveal="true" data-filter-placeholder="Units...">
                        <li><a href="#" class="unit" class="unit">Engine 20</a></li>
                        <li><a href="#" class="unit">Engine 21</a></li>
                        <li><a href="#" class="unit">Engine 22</a></li>
                        <li><a href="#" class="unit">Engine 23</a></li>
                        <li><a href="#" class="unit">Engine 24</a></li>
                        <li><a href="#" class="unit">Engine 70</a></li>
                        <li><a href="#" class="unit">Engine 71</a></li>
                        <li><a href="#" class="unit">Engine 72</a></li>
                        <li><a href="#" class="unit">Engine 73</a></li>
                        <li><a href="#" class="unit">Engine 74</a></li>
                        <li><a href="#" class="unit">Medic 20</a></li>
                        <li><a href="#" class="unit">Medic 21</a></li>
                        <li><a href="#" class="unit">Medic 22</a></li>
                        <li><a href="#" class="unit">Medic 23</a></li>
                        <li><a href="#" class="unit">Medic 24</a></li>
                    </ul>

                    <input type="text" id="address" placeholder="Address">

                    <label>Type of Call</label>
                    <fieldset class="ui-grid-a">
                        <div class="ui-block-a submit"><button type="submit" data-theme="c">Medical</button></div>
                        <div class="ui-block-b submit"><button type="submit" data-theme="b">Fire</button></div>     
                    </fieldset>
		</div>
	</div>
</body>
</html>
