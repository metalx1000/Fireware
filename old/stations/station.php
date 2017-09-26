<script>
                        $(document).ready(function(){

                                $("#station").val(localStorage.station);
                                $("#station").selectmenu("refresh");

                                $("#station").change(function(){
                                    localStorage.station = $("#station").val();
                                }); 



                        });

</script>
                                <select name="station" id="station">
					<?php include("all.php");?>
                                </select>

