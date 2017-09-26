<script>
                        $(document).ready(function(){

                                $("#user2").val(localStorage.user2);
                                $("#user2").selectmenu("refresh");

                                $("#user2").change(function(){
                                    localStorage.user2 = $("#user2").val();
                                }); 

                        });

</script>


<select name="user2" id="user2">
        <?php  include('all.php');?>
</select>

