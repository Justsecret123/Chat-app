

<html>
    
    
<head>
    
   <!--Meta-->
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=0.9">
    <title>Chat</title>
    
      <!--CSS-->
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="style2.css" />
        <link rel="stylesheet" href="style3.css" />
    
    <!--Bootstrap & Font-awesome-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" />
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="script.js"></script>
    
</head>
    
    
<body>

    
    
    
    <div class="header">
        
        <div class="navigation-bar">
            
            <ul>
                <li>  <a href="home.php" class="active"> Home   <i class='fas fa-home' style='font-size:15px; color:white;'> </i></a>  </li>
                <li>  <a href="indexMessages.php"> Messages <i class='fab fa-rocketchat' style='font-size:15px; color:white;'></i> </a>    </li>
                <li>  <a href="#notifications"> Notifications <i class='fas fa-bell' style='font-size:15px;color:white'></i> </a> </li>
                <li class="dropdown">  <a href="javascript:void(0)"> Mon compte  <i class='fas fa-user' style='font-size:15px;color:white'></i> </a> 
                
                            <div class="dropdown-content">
                                <a href="#param"> Paramètres </a>
                                <a href="../../index.html"> Se déconnecter </a>
                                <a href = "#comm"> Besoin d'aide? </a>
                            </div>
                
                
                </li>
            </ul>
        
        </div>
    
    </div>
    
    
    
    
    
    
        
         <div class="main-content" style="height: 93.7%">
             
       
             
             <div class="conversation-side">
                 <div class="conversation-side-title">
                    <p> Discussions  <i class="fa fa-plus-circle" style="font-size:24px; color: white; position: relative; left: 15%; top: 5px;" id="new_conv"></i> </p>
                    
                </div>
                 <div class = "conversation" id="new">
                  <div class = "conversation-user">
                    <input type="text" placeholder="Nom d'utilisateur..." /> </div> 
                 
                 
                 </div>
                 
                 <?= htmlspecialchars(displayConversationsAll()); ?>
                 
                 
                 
            
             
             </div>
                
             <div class="conversation-header">
                <div class = "current-user">
                    <div class = "current-user-photo">
                    </div>
                    <div class="current-user-name">
                    </div>
                </div>
                
                 
                  
             
             </div>
             
             <div class="conversation-zone">
                 
               <!--  <?= htmlspecialchars (displayMessagesUsers()); ?>-->
                 
                     
             
             
             </div>
             
             <div class="conversation-input-zone">
                 
                 <textarea placeholder="Votre message ici..." autofocus name="input-zone" class="input-zone" name="text">
                     
                 </textarea>
             
             </div>
             
             <style>
            .inputfile 
                 {
                width: 25px!important;
                height: 25px!important;
                opacity: 0!important;
                overflow: hidden!important;
                position: absolute!important;
                /*z-index: -1!important;*/
                }
                 label
                {
                    width: 25px;
                    height: 25px!important;
                }
                 
                .inputfile + label 
                 {
                    font-size: 18px!important;
                    color: white!important;
                    display: inline-block!important;
                    border-radius: 25px!important;
                 }

                    .inputfile:focus + label,
                    .inputfile + label:hover {
                        background-color: white!important;
                    }

                    .inputfile:hover {
                        cursor: pointer; /* "hand" cursor */
                    }
                 #trash-icon
                 {
                    position: relative;
                    bottom: 150%;
                     left: 85%;
                 }
                 
                 form
                 {margin: 0;}
                 

             </style>
             
             <div class="attachment-div">
                 <form name = "form_file"  method="post" enctype="multipart/form-data" action="#" >
                 <input type="file" name="file" id="file"  class="inputfile" accept=".jpg, .jpeg, .png" unique/>
                <label for="file">
                    <i class='fas fa-paperclip' style='font-size:25px;color: grey'></i> <i class='fas fa-trash-alt' style='font-size:12px;color: grey;' id="trash-icon"></i>
                </label>
                </form>
             
             </div>
             
             <div class="send-div">
                 
                 <i class='far fa-paper-plane' style='font-size:25px;color:grey;' id="send"></i>
             
             </div>
            
        </div>     
    
    
    
    
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    </body>

</html>