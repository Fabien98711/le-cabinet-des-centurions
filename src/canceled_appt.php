<?php session_start(); 
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta http-equiv="refresh" content="5;url=logged.php"><!-- Redirigez vers la page d'accueil après 5 secondes -->
    <link rel="stylesheet" href="http://localhost/ProjetCnam/dist/output.css">
 </head>
 <body>

 <?php

 require_once(__DIR__ . '/db_connect.php');
 $stmt=$pdo->prepare('DELETE FROM appt WHERE appt_id= :id '); 
 $stmt->bindParam(':id', $_SESSION['appt_id'], PDO::PARAM_STR); 
 $stmt->execute(); 

 ?>

<div class="bg-cover bg-center h-screen " style="background-image: url('../dist/images/bg-img2.jpg');">
    <div class="bg-gradient-to-r from-cyan-600 to-blue-600 opacity-75 h-full">
    <h2 class="font-medium text-xl text-white text-center  p-12">
    <?php echo $_SESSION['username']. ', vous avez supprimé le rendez-vous du '.$_SESSION['appt_date'].' à '.$_SESSION['appt_time'] .' avec ' .$_SESSION['therapist_name'] ?>
</h2>  
    </div>
</div>

 </body>
 </html>