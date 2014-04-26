                function send(item){
                        var user=$("#user").val();
                        var station=$("#station").val();
                        var quantity=$("#quantity").val();

                           if(quantity == ""){
                                alert("Please Enter a Quantity!");
                           }else{
                                var url="submit_log.php";
                
                                $.post(url,{
                                        "user": user,
                                        "station": station,
                                        "quantity": quantity,
                                        "item": item
                                }).done(function( data ) {
                                        alert( data );
                                }).fail(function() {
                                        alert( "error - Unable to Send" );
                                });
//                                      window.location.replace("http://filmsbykris.com");
                            }
                }

