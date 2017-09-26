<script>
                        $(document).ready(function(){
                                $("#officer").val(localStorage.officer);
                                $("#officer").selectmenu("refresh");

                                $("#officer").change(function(){
                                    localStorage.officer = $("#officer").val();
                                }); 

                        });
</script>
<select name="officer" id="officer">
        <?php  include('all.php');?>
</select>

