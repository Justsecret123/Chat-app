  $(document).ready(function(){
      
    
                        
                        $("#home").delay(200).animate({opacity: '1'}, 500);
                        
                        $("#continue_btn").click(function(){
                            
                            $("#home").delay(300).animate({left: '-50%', opacity: '0'},1000,function(){
                                $("form").show();
                             $("#form").animate({right: '0%', opacity: '1'},1000); 
                                
                            });
                             
                            
                        });
                        
                        $("#icon_next_one").click(function(){
                            
                            $("#home").remove();
                            $("#form").delay(300).animate({right: '100%', opacity: '0'},1000);
                            if($(".inputfile").val() == null)
                                { event.preventDefault();
                                $.post("index2.php");}
                            else{$.post("index.php");}
                         
                            
                            });
      
                        $("#submit_perso").click(function(event)
                                                {
                            if($(".inputfile").val() == null)
                                { event.preventDefault();
                                $.post("index2.php");}
                            else{$.post("index.php");}
                        });
                           
                                              
     

               
               /* $("form").delay(200).animate({opacity: '0.5', left: '-30%'}, 500);
                $("form_two").delay(200).animate({opacity: '0.5', left: '-30%'}, 500);*/
                    });