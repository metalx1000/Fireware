<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Shift Exchange Log</title>
	<link rel="stylesheet" href="themes/exchange.min.css" />
	<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <script>

            function get_json(){
                var url="get.php";
                $.getJSON( url, function( data ) {
                    $('#entries').empty();
                    for(var i = 0;i<data.length;i++){
                        var user=data[i].user;
                        var user2=data[i].user2;
                        var comments=data[i].comments;
                        var exchange_date=data[i].exchange_date;
                        var info = '<li><a>';
                        info += user+" will work for "+user2;
                        info += " on <br>"+exchange_date;
                        info += '<br>'+comments+'</a></li>';
                        $('#entries').append(info);
                    }
                    $('#entries').listview('refresh');             
                });
            }

            $(document).ready(function(){
                get_json();
            });
        </script>
</head>
<body>
	<div data-role="page" data-theme="a">
            <div data-role="navbar">
                <ul>
                    <li><a href="index.php?key=SAKDF23984FSA" data-ajax="false">Make Entry</a></li>
                    <li><a href="print.php" data-ajax="false">Printable List</a></li>
                </ul>
            </div><!-- /navbar -->
		<div data-role="header" data-position="inline">
			<h1>Shift Exchange Log</h1>
		</div>
		<div data-role="content" data-theme="a">
<ul id="entries" data-role="listview" data-inset="true" data-filter="true">
</ul>
    
		</div>
	</div>
</body>
</html>
