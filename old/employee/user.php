<script>
                        $(document).ready(function(){

                                $("#user").val(localStorage.user);
                                $("#user").selectmenu("refresh");

                                $("#user").change(function(){
                                    localStorage.user = $("#user").val();
                                }); 

                        });

</script>


<select name="user" id="user">
	<?php  include('all.php');?>
</select>

<!--
<script>
    var user = document.getElementById('user');
    user.value = "test";
</script>

-->
