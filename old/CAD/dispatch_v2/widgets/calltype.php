      <select name="calltype" id="calltype" data-native-menu="false" data-mini="true">
        <option value="choose-one" data-placeholder="true">Dispatch Type</option>
      </select>
      <script>
        var calltype = [
        "Medical Call",
        "Residential Structure Fire",
        "Commercial Structure Fire",
        "Residential Fire Alarm",
        "Commercial Fire Alarm",
        "Motor Vehicle Accident"
        ];
        calltype.forEach(function(calltype){
          var calltype = "<option value='"+calltype+"'>"+calltype+"</option>";
          $("#calltype").append(calltype);
        });
      </script>

