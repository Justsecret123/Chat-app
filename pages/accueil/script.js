
                $(document).ready(function()
                 {
                    $(".input-zone").val('');
                    
                    $("#new_conv").click(function(){
                      
                        window.open("new_message.html");
                    });
                   
                    
                    $(".conversation").mouseenter(function(){
                
                    $(this).find(".conversation-user").css("color", "white");
                     $(this).find(".conversation-message p").css("color", "white");
                     $(this).find(".conversation-time").css("color", "white");
                });
                  $(".conversation").mouseleave(function(){
                
                     $(this).find(".conversation-user").css("color", "grey");
                     $(this).find(".conversation-message p").css("color", "grey");
                     $(this).find(".conversation-time").css("color", "grey");
                });
                  
                  $(".conversation").click(function(){
                    
                       $(".send-div").attr('id', $(this).find(".conversation-user").attr("id"));
                      var user = $(this).find(".conversation-user").text();
                      $(".current-user-name").html(user);
                      $(".current-user-photo").empty();
                      $(".current-user-photo").append($(this).find(".conversation-photo").html());
                      $(".conversation-zone").find("p").remove();
                      $(".conversation-zone").find("img").remove();
                       $.post("load_disc_one.php", {id: $(".send-div").attr("id")}, function(data, status){
                      $(".conversation-zone").append(data);
                           $(".input-file").val('');
                           
                            });
                          });
                    
                         $(document).on("click", ".conversation", function(){
                      $(".send-div").attr('id', $(this).find(".conversation-user").attr("id"));
                      var user = $(this).find(".conversation-user").text();
                      $(".current-user-name").html(user);
                        $(".current-user-photo").empty();
                      $(".current-user-photo").append($(this).find(".conversation-photo").html());
                      $(".conversation-zone").find("p").remove();
                      $(".conversation-zone").find("img").remove();
                       $.post("load_disc_one.php", {id: $(".send-div").attr("id")}, function(data, status){
                      $(".conversation-zone").append(data);
                           /* var id = $(".conversation-zone p:last-child").attr("id");
                           alert(id);*/
                           $(".inputfile").val('');
                        });
                         });
                  
                  
                  $("#send").click(function(){
                      if($(".input-zone").val() !== "")
                          {
                              
                              var text = $(".input-zone").val();
                              var id = $(".send-div").attr("id");
                             /* alert("text =" + text + " id = " + id + ";");*/
                             var fileName = $(".inputfile").val();
                              if( $(".inputfile").files == typeof undefined || fileName == "")
                              {
                                    /*alert("no files selected");*/
                                   $.post("send.php",
                                     {      
                                        rec: $(".send-div").attr("id"),
                                        text: $(".input-zone").val()
                                      }
                                    );
                              }
                              
                             else 
                             {      /*alert(fileName);*/
                                    $("form").submit();
                                   /* setTimeout(function(){
                                        $.post("send_with_attachment.php",
                                     {      
                                        rec: $(".send-div").attr("id"),
                                        text: $(".input-zone").val()
                                      }, function(data,status){
                                             alert(data);
                                         }
                                    );  }*/
                             }
                              
                             
                               $(".input-zone").val('');
                              $(".inputfile").val('');
                              $(".conversation-zone p:last-child").focus();
                            
                            
                          }
                  });
                    
            $("form").submit(function(e){
                    
                var rec= $(".send-div").attr("id");
                var text= $(".input-zone").val();
                var formData = new FormData($('form')[0]);
                formData.append('rec', rec);
                formData.append('text', text);
                
               e.preventDefault();
           
                 $.ajax({
                        //Fichier d'upload
                        url: 'upload_file.php',
                        type: 'POST',

                        //Données du formulaire
                        data: formData,

                       //Ne pas prendre en compte le type/contenu des données 
                        cache: false,
                        contentType: false,
                        processData: false,

                        // XMLHttpRequest
                        xhr: function () {
                          var myXhr = $.ajaxSettings.xhr();
                          if (myXhr.upload) {
                            //Gestion de la progression de l'upload
                            myXhr.upload.addEventListener('progress', function (e) {
                              if (e.lengthComputable) {
                                $('progress').attr({
                                  value: e.loaded,
                                  max: e.total,
                                });
                              }
                            }, false);
                          }
                          return myXhr;
                        }
                      });
                NewMessages();
              
            });
                    
   
                    function NewMessages(){
                        
                        setTimeout (function(){
                        var attr = $(".send-div").attr('id');

                        if(typeof attr !== typeof undefined && attr !==false)
                        {
                        /*var d = $(".conversation-zone p:last-child").attr("id").substr(2);
                        alert(d);*/
                             $(".conversation-zone p:last-child").focus();
                        $.post("NewMessage.php", {idMessage: $(".conversation-zone p:last-child").attr("id").substr(2), idUser: $(".send-div").attr("id")}, function(data, status){
                        $(".conversation-zone").append(data);
                        });}
                         NewMessages();  
                        },5000);}
              
                  NewMessages(); 
                  
                
            function load_disc(){

            setTimeout( function(){
                var last = $(".conversation-side").html();
/*                alert(last);*/
                  $.post("load_disc.php", function(data, status){
                if(data !== last)
                {   $(".conversation").remove();
                    $(".conversation-side").append(data);}
                });
                        load_disc();
                                }, 5000); 
                                }
          
load_disc();
                  
                  
                    
                });
            
            
            
   