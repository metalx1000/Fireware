<?php
        $bottle=$_GET['bottle'];
?>
<!DOCTYPE html>
<html>
        <head>
                <title>SCBA Bottle Check</title>
                <?php include("../headers/header1.php");?>
               
                <script>
                        $(document).ready(function(){

                                $("#user").val(localStorage.user);
                                $("#user").selectmenu("refresh");

                                $("#station").val(localStorage.station);
                                $("#station").selectmenu("refresh");

                                $("#truck").val(localStorage.truck);
                                $("#truck").selectmenu("refresh");

                                $("#full").click(function(){
                                        send("FULL");
                                });

                                $("#low").click(function(){
                                        send("LOW");
                                });

                                function send(PSI){
                                        var bottle=$("#bottle").val();
                                        var user=$("#user").val();
                                        var station=$("#station").val();
                                        var truck=$("#truck").val();
                                        var comments=$("#comments").val();

                                        var url="submit_log.php";
                
                                        $.post(url,{
                                                "user": user,
                                                "station": station,
                                                "truck": truck,
                                                "bottle": bottle,
                                                "PSI": PSI,
                                                "comments": comments
                                        }).done(function( data ) {
                                                alert( data );
                                        }).fail(function() {
                                                alert( "error - Unable to Send" );
                                        });


                                        $("#bottle").val("");
                                        $("#comments").val("");

                                }
                        });
                </script>
        </head>
        <body>
                <div data-role="page" data-theme="a">
                        <div data-role="header" data-position="inline">
                                <h1>SCBA Bottle Check</h1>
                        </div>
                        <div data-role="content" data-theme="a">
                                <label>Bottle Inventory:</label>
                                <input type="number" id="bottle" value="<?php echo $bottle;?>">
                                <?php
                                        include("../employee/user.php");
                                        include("../trucks/truck.php");
                                        include("../stations/station.php");

                                ?>

                                <label>Comments:</label>
                                <textarea id="comments"></textarea>

                                <label>PSI Over 4,000?</label>
                                <div class="ui-grid-a">
                                    <div class="ui-block-a"><button id="low" data-theme="b">No</button></div>
                                    <div class="ui-block-b"><button id="full" data-theme="c">Yes</button></div>
                                </div>
                        </div>
                </div>
        </body>
</html>
                              
