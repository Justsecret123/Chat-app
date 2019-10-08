<html>
<head>
    
    <!--Meta-->
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=0.9">
    
      <!--CSS-->
        <link rel="stylesheet" href="style.css" />
    
    <!--Bootstrap & Font-awesome-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" />
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    

    
</head>
    
    
<body>

    
    
    
    <div class="header">
        
        <div class="navigation-bar">
            
            <ul>
                <li>  <a href="#home" class="active"> Home   <i class='fas fa-home' style='font-size:15px; color:white;'> </i></a>  </li>
                <li>  <a href="#messages"> Messages <i class='fab fa-rocketchat' style='font-size:15px; color:white;'></i> </a>    </li>
                <li>  <a href="#notifications"> Notifications <i class='fas fa-bell' style='font-size:15px;color:white'></i> </a> </li>
                <li class="dropdown">  <a href="javascript:void(0)"> Mon compte  <i class='fas fa-user' style='font-size:15px;color:white'></i> </a> 
                
                            <div class="dropdown-content">
                                <a href="#param"> Paramètres </a>
                                <a href="#logout"> Se déconnecter </a>
                                <a href = "#comm"> Besoin d'aide? </a>
                            </div>
                
                
                </li>
            </ul>
        
        </div>
    
    </div>
    
            
    
  <?php ob_start(); ?>
            
         <div class= "main">
        
        
        
        <div class = "search-bar">
            <input type="text" class="search-input" placeholder="Que voulez-vous ?" name="search-text" max-length="15" /> 
            <i class='fas fa-search' style='font-size:18px;color:deepskyblue' id="search-icon"></i>
            
              
        </div>
        
         <div class="main-content">
                
             <div class="text-center">
                <p style="color: red; font-weight: 300; font-family: inherit; font-size: 20px;">
                    Bonjour,
                <?php session_start();
                  echo htmlspecialchars($_SESSION["login"]);
                  echo " !"; ?>
                </p>
            </div>
             
        </div>     
    
    
    
    </div>
 <?php $content = ob_get_clean(); ?>
<?php require "template.php"; ?>
    
    <div class="footer">
         <span style="color: white;">  ©Copyright 2019. Tous droits réservés </span> <!--<input type="text" class="search-input"  placeholder="Que recherchez-vous?" name="search-text"> <i class='fas fa-search' style='font-size:12px; font-weight:600; color:#d3d3d3' id="search-icon"> </i>-->
    </div>
    
    
</body>
    
</html>