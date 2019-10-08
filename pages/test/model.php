<?php

        try
        {
             $db=new PDO('mysql:localhost; dbname=projet2;charset=utf8','root','Eyeshield 21');
            echo "Connexion à la base de données réussie";
            
        }
        catch(Exception $e)
        {
            die('Erreur :'.$e->getMessage());
        }
        
       $req = $db->prepare('SELECT * from compte');
       $req->execute();

?>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Ma liste de comptes</title>
        <link href="style.css" rel="stylesheet" /> 
    </head>

        <body>
    
            <?php
                while($data=$req->fetch())
                {
                ?>
            
                <div class="comptes">
            
                    <h3>
                        <?php echo $data['LOGIN']; ?>
                        <em>   Sa date d'inscription est <?php echo $data['INSCRIPTION']; ?></em>
                    </h3>
                        
                        <p>
                            <?php echo $data['EMAIL'];
                            ?>
                        </p>
                </div>
            <?php
                }
            $req->closeCursor();
            ?>
            
        </body>

</html>