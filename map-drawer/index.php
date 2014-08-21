<!DOCTYPE html>
<html lang="ja">
	<head>
        <meta charset="UTF-8">
        <title>Sketch</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="javascript/sketch_simple.js"></script>
         <script src="javascript/opencv.js"></script>
        <style>
            #address{
                width:50%
            }

        </style> 
    </head>
    
    <body>

<div id="search">
    <input type=text id="address" placeholder="Enter Address here">
    <button id="btnSearch">Search</button>
</div>
<div class="tools">
  <a href="#tools_sketch" data-tool="marker">Marker</a>
  <a href="#tools_sketch" data-tool="eraser">Eraser</a>
</div>
<canvas id="tools_sketch" width="640" height="500" style="background: url(<?php
$address=$_GET['address'];
$address=urlencode($address);
//echo "http://maps.googleapis.com/maps/api/staticmap?center=1481%2018th%20ave%20ne%20naples%20fl&zoom=18&size=640x500&maptype=hybrid";
echo "http://maps.googleapis.com/maps/api/staticmap?center=$address&zoom=19&size=640x500&maptype=hybrid";
?>
) no-repeat center center;"></canvas>
<script type="text/javascript">
  $(document).ready(function() {
    $('#tools_sketch').sketch({defaultColor: "RED"});

    $.each(['#f00', '#ff0', '#0f0', '#0ff', '#00f', '#f0f', '#000', '#fff'], function() {
      $('.tools').append("<a href='#tools_sketch' data-color='" + this + "' style='background: " + this + ";'>color</a> ");
    });
    $.each([3, 5, 10, 15], function() {
      $('.tools').append("<a href='#tools_sketch' data-size='" + this + "' style='background: #ccc'>" + this + "</a> ");
    });
    $('#tools_sketch').sketch();

        $("#btnSearch").click(function(){
            var address = $("#address").val();
            window.location.href = "index.php?address=" + address;
        });


  });
</script>
        
   </body>
</html>
