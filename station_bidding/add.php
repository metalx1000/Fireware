<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function(){
        $("#pid").val(Math.floor(Math.random() * 900000000));
        stationList(20,24);
        stationList(60,63);
        stationList(70,75);
        stationList(90,90);
      });

      function stationList(n,m){
        for(var i = n;i<=m;i++){
          $("#station").append("<option value='Station_"+i+"'>"+i+"</option>");
        }
      }
    </script>
  </head>
  <body>

    <div id="main" class="container">
      <form id="form" action="update_db.php">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="name" class="form-control" id="name" name="name">
        </div>
        <!--station-->
        <div class="form-group">
          <label for="station">Station:</label>
          <select class="form-control" id="station" name="station">
            <option></option>
          </select>
        </div>

        <!--Rank-->
        <div class="form-group">
          <label for="rank">Rank:</label>
          <select class="form-control" id="rank" name="rank">
            <option ></option>
            <option value="Fire Fighter">Fire Fighter</option>
            <option value="Engineer">Engineer</option>
            <option value="Lieutenant">Lieutenant</option>
          </select>
        </div>
        <input type="hidden" id="pid" name="pid" value="1234">
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>

  </body>
</html>

