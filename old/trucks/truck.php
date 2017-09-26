<script>
                        $(document).ready(function(){
                                $("#truck").val(localStorage.truck);
                                $("#truck").selectmenu("refresh");

                                $("#truck").change(function(){
                                    localStorage.truck = $("#truck").val();
                                }); 


                        });
</script>
				<select id="truck">
					<?php include("all.php");?>
				</select>
