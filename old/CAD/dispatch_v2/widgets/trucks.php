      <select name="trucks" id="trucks" multiple="multiple" size="4" data-native-menu="false" data-mini="true">
        <option value="choose-one" data-placeholder="true">Choose Trucks to Dispatch</option>
      </select>
      <script>
        var trucks = ["Engine 20","Engine 21","Engine 22","Engine 23","Engine 24","Engine 70","Engine 71","Engine 72","Engine 73","Engine 74","Engine 75"];
        trucks.forEach(function(truck){
          var truck = "<option value='"+truck+"'>"+truck+"</option>";
          $("#trucks").append(truck);
        });
      </script>

