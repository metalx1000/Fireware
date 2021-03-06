<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Include the jQuery library -->
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

    <script>
        unit = "ENG24";
        msg = "";
        //Chrome Browser Suggested for audible Dispatch
        function get_dispatch(){
            console.log("Checking for Updates.");
            var _msg = msg;
            $.get( "msg.txt", { unit: unit },function( data ) {
                if(_msg != data){
                    console.log("New message: " + data);
                    console.log("Old message" + _msg);
                    msg = data;
                    $( "#msg" ).html( data );
                    var dis = new SpeechSynthesisUtterance(data);
                    window.speechSynthesis.speak(dis);
                }
            });
        }
        window.setInterval(function(){get_dispatch()}, 3000);
        get_dispatch();
    </script>
</head>
<body>
    <div id="msg"></div>
</body>
</html>
