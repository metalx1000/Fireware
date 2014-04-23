<script>
                        $(document).ready(function(){
                                $("#truck").val(localStorage.truck);
                                $("#truck").selectmenu("refresh");
                        });
</script>
				<select id="truck">
					<?php include("all.php");?>
				</select>
