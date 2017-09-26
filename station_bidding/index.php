<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" crossorigin="anonymous"></script>

    <style>
      .card{
        margin-top: 10px;
      }

    </style>
    <script>
      var stations = [];
      var list = [];
      $(document).ready(function(){
        getList();
        setInterval(getList,5000);
      });

      function getList(){
        var url = 'list.php';
        $.getJSON( url, function( data ) {
          list = data;
          data.forEach(function(i){
            stations.push(i[2]);
          });
          }).done(function(){

          stations = sort(stations);
          createBox();
        });
      }

      function sort(arr) {
        return arr.sort().filter(function(el,i,a) {
          return (i==a.indexOf(el));
        });
      }

      function createBox(){
        $("#stationList").html("");
        stations.forEach(function(s){
          s = s.replace(" ", "_");
          $("#stationList").append('<div class="col-lg-4"><div class="card"><div class="card-header">'+s+'</div><div class="card-block" id="'+s+'"></div> </div></div>');
        });
        loadStaff();
      }

      function loadStaff(){
        list.forEach(function(i){
          var s = i[2];
          s = s.replace(" ", "_");
          var name = i[0];
          var rank = i[1];

          if(rank == "Fire Fighter"){
            var t = '<a href="#" class="btn btn-success btn-block">'+name+'</a>';
            }else if(rank == "Lieutenant"){
            var t = '<a href="#" class="btn btn-danger btn-block">'+name+'</a>';
            }else{
            var t = '<a href="#" class="btn btn-warning btn-block">'+name+'</a>';
          }

          $("#"+s).append(t);
        });
      }

    </script>
  </head>
  <body>
    <br><br>
    <div id="main" class="container">
      <div id="stationList" class="row">

      </div>

    </body>
  </html>

