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

            function get_json(user){
                var url="get.php?user='"+user+"'";
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
                $("#mytitle").html("Viewing for " + localStorage.user);
                get_json(localStorage.user);

                $("#get_change").click(function(){
                    get_list();
                });

                $('#user_search').on('click', 'li', function(e) {
                    localStorage.user = e.target.innerHTML;
                    get_json(localStorage.user);
                    $.mobile.changePage( "#main" );
                    $("#mytitle").html("Viewing for " + localStorage.user); 
                });
            });

            function get_list(){
                $.get( "users.php", function( data ) {
                    var a=[];
                    a=data.split("\n");
                    a.forEach(function(entry) {
                        output='<li><a href="#">'+entry+'</a></li>';
                        $("#user_search").append(output).listview('refresh');
                    });
                }).done(function() {
                    $("#user_search").listview('refresh');
                    $('ul').trigger('create');
                });
            };
        </script>
</head>
<body>
	<div data-role="page" data-theme="a" id="main">
            <div data-role="navbar">
                <ul>
                    <li><a href="index.php?key=SAKDF23984FSA" data-ajax="false">Make Entry</a></li>
                    <li><a href="print.php" data-ajax="false">Printable List</a></li>
                    <li><a href="#change" data-ajax="false" id="get_change">Change User</a></li>
                </ul>
            </div><!-- /navbar -->
		<div data-role="header" data-position="inline">
			<h1 id="mytitle">Shift Exchange Log</h1>
		</div>
		<div data-role="content" data-theme="a">
<ul id="entries" data-role="listview" data-inset="true" data-filter="true">
</ul>
    
		</div>
	</div>

        <div data-role="page" data-theme="a" id="change">
            <div data-role="navbar">
                <ul>
                    <li><a href="#main" data-ajax="false">Back to View</a></li>
                </ul>
            </div>
            <div data-role="header" data-position="inline">
                <h1>Change User</h1>
            </div>
            <div data-role="content" data-theme="a">

               <ul id="user_search" data-role="listview" data-inset="true" data-filter="true" data-filter-reveal="false" data-filter-placeholder="Search Names">
                </ul>
            </div>
        </div>
</body>
</html>
