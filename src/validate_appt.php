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
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://kendo.cdn.telerik.com/2022.1.301/styles/kendo.default-v2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    
    <script src="https://kendo.cdn.telerik.com/2022.1.301/js/kendo.all.min.js"></script>
 </head>
 <body>

 <?php


require_once(__DIR__ . '/db_connect.php');

$stmt= $pdo->prepare('INSERT INTO appt (user_id, therapist_id, therapist_name, appt_date, appt_time, motive)VALUES (:user, :therapist_id,:therapist_name,  :date, :time, :motive)'); 
$stmt->bindParam(':user', $_SESSION['user_id'], PDO:: PARAM_STR); 
$stmt->bindParam(':therapist_id',$_SESSION['therapist_id'],PDO::PARAM_STR); 
$stmt->bindParam(':therapist_name',$_SESSION['therapist_name'],PDO::PARAM_STR); 
$stmt->bindParam(':date',$_SESSION['date'], PDO::PARAM_STR ); 
$stmt->bindParam(':time',$_SESSION['time'],PDO::PARAM_STR  ); 
$stmt->bindParam(':motive',$_SESSION['motive'],PDO::PARAM_STR  ); 

$stmt->execute(); 

?>

<div class="bg-cover bg-center h-screen " style="background-image: url('../dist/images/bg-img2.jpg');">
    <div class="bg-gradient-to-r from-cyan-600 to-blue-600 opacity-75 h-full">
    <h2 class="font-medium text-xl text-white text-center p-8">
    <?php echo $_SESSION['username']. ', vous avez pris rendez-vous avec ' .$_SESSION['therapist_name'] .' le '.$_SESSION['date'].' à '.$_SESSION['time'] ?>
</h2>  
    </div>
</div>

<?php 
$pdo=null?>
    
 </body>
 <script src="http://localhost/ProjetCnam/dist/calendar.js"></script>
 </html>