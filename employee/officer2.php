<script>
                        $(document).ready(function(){

                                $("#officer2").val(localStorage.officer2);
                                $("#officer2").selectmenu("refresh");
                                
                                $("#officer2").change(function(){
                                    localStorage.officer2 = $("#officer2").val();
                                }); 
                        });
</script>

<select name="officer2" id="officer2">
        <?php  include('all.php');?>
</select>

