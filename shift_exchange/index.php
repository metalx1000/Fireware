<?php include('load.php');?>
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
            function generateKey() {
                var length = 8,
                    charset = "abcdefghijklnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
                    retVal = "";
                for (var i = 0, n = charset.length; i < length; ++i) {
                    retVal += charset.charAt(Math.floor(Math.random() * n));
                }
                return retVal;
            }

            pid=generateKey();

            $(document).ready(function(){
                $("#user2").val(localStorage.user);
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

                $("#submit").click(function(){
                    exit=false;
                    if($("#comments").val()==""){
                        $("#comments").val(".")
                    }
                    $(".item").each(function(){
                        var val = $(this).val();
                        if(val==""){
                            var id = $(this).attr('id');
                            alert("########################\n'"+id+"' Cannot be left blank!\n#####################");
                            exit=true;
                            return false;
                        }
                    });
                    if(exit){return false};
                    localStorage.user = $("#user2").val();
                    $.get( "update.php", {
                        user:$("#user").val(),
                        user2:$("#user2").val(),
                        exchange_date:$("#exchange_date").val(),
                        comments:$("#comments").val(),
                        pid:pid
                    }).done(function( data ) {
                        alert("Exchange Logged");
                    });                                        
                });

                name_count=0;
                $('#user_search').on('click', 'li', function(e) {
                    var name = e.target.innerHTML;
                    if(name_count==0){
                        $("#user").val(name);
                        name_count=1;
                    }else{
                        $("#user2").val(name);
                        name_count=0;
                    }
                });
       

            });
        </script>
</head>
<body>
	<div data-role="page" data-theme="a">
            <div data-role="navbar">
                <ul>
                    <li><a href="view.php" data-ajax="false">View Entries</a></li>
                    <li><a href="index.php?key=SAKDF23984FSA" data-ajax="false">New Entry</a></li>
                </ul>
            </div><!-- /navbar -->
		<div data-role="header" data-position="inline">
			<h1>Shift Exchange Log</h1>
		</div>
		<div data-role="content" data-theme="a">
<ul id="user_search" data-role="listview" data-inset="true" data-filter="true" data-filter-reveal="true" data-filter-placeholder="Search Names">
</ul>
    
                    <input type="text" id="user" placeholder="This Person" data-clear-btn="true" class="item">
                    <label>Will work for</label>
                    <input type="text" id="user2" placeholder="This Person" data-clear-btn="true" class="item">
                    <label>On this day</label>
                    <input type="date" id="exchange_date" data-role="date" class="item">
                    <label>Comments:</label>
                    <input type="text" id="comments" class="item">
                    <a href="#" id="submit" data-role="button">Submit</a>
		</div>
	</div>
</body>
</html>
