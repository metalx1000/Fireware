<?php
 $key = $_GET['key'];

 if ( $key != "1234"){
   header( 'Location: voice.php' ) ;
 }
?>

<!DOCTYPE html>
<html>
<head>
  <!-- Include meta tag to ensure proper rendering and touch zooming -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Include jQuery Mobile stylesheets -->
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
  <!-- Include the jQuery library -->
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <!-- Include the jQuery Mobile library -->
  <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

  <script>
    $(document).ready(function(){
     $('#submit').click(function(){
        var date = new Date();
        var time = date.getHours().toString() + date.getMinutes().toString();

        var msg = $("#trucks").val().toString();
        msg += "." + $("#calltype").val();
        msg += "." + $("#address").val();
        msg += ". Time out " + time + " hours";

        $.post('submit.php',{msg:msg,calltype:"null"},function(data){
          $("#footer").html(data);
        });
      });

      $("#clear").click(function(){
        $.post('submit.php',{msg:"null",calltype:"clear"},function(data){
          $("#footer").html(data);
        });
      });
    });
  </script>
</head>
<body>

<div data-role="page" id="pageone">
  <div data-role="header">
    <h1>CAD Emulator v2</h1>
  </div>

  <div data-role="main" class="ui-content">
    <form id="main">
      <?php include("widgets/trucks.php");
            include("widgets/calltype.php");?>
      <input type="text" id="address" name="address" placeholder="Address - Example '123 Pine Street'" data-clear-btn="true">
    </form>
      <button id="submit">Dispatch Call</button>
  </div>

  <div data-role="footer">
    <h1>Last Dispatch:</h1>
    <h1 id="footer"></h1>
  </div>

  <button id="clear">Clear</button>
</div> 

</body>
</html>

