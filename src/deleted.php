<?php session_start(); 
 ?>

 <!DOCTYPE html>
 <html lang="fr">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta http-equiv="refresh" content="5;url=index.php"><!-- Redirigez vers la page d'accueil après 5 secondes -->
    <link rel="stylesheet" href="http://localhost/ProjetCnam/dist/output.css">

 </head>
 <body>

 <?php
try{
   require_once(__DIR__ . '/db_connect.php');
 $stmt=$pdo->prepare('DELETE FROM user WHERE user_id= :id '); 
 $stmt->bindParam(':id', $_SESSION['user_id'], PDO::PARAM_STR); 
                         
 $stmt->execute(); 
 $rowCount = $stmt->rowCount(); 
 ?>

 <div class="bg-cover bg-center h-screen " style="background-image: url('../dist/images/bg-img2.jpg');">
    <div class="bg-gradient-to-r from-cyan-600 to-blue-600 opacity-75 h-full">
    <?php if ($rowCount > 0) { ?>
    <h2 class="font-medium text-xl text-white text-center p-12">
    Votre compte a bien été supprimé
</h2>  
   <?php
    }
    else
    {
      echo "erreur lors de la suppression"; 
    }

    
     }  catch (PDOException $e) {
         // Gestion des erreurs PDO
         echo "Erreur lors de la suppression : " . $e->getMessage();
    }
    ?>

    </div>
</div>

 <?php
 $pdo=null?>
    
 </body>
 </html>