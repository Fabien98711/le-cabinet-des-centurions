<?php session_start(); 


$id = $_GET['id'];



    require_once(__DIR__ . '/db_connect.php');
    $stmt = $pdo->prepare('SELECT *  FROM appt WHERE appt_id = :id'); 
    $stmt->bindParam(':id', $id, PDO::PARAM_STR); 
    $stmt->execute(); 

    

    $selectedAppt=$stmt->fetchAll(PDO::FETCH_ASSOC); 





 ?>
 <!DOCTYPE html>
 <html lang="fr">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/ProjetCnam/dist/output.css">
 </head>
 <body>

 <div class="bg-cover bg-center h-screen " style="background-image: url('../dist/images/bg-img2.jpg');">
<div class="bg-gradient-to-r from-cyan-600 to-blue-600 opacity-75 h-full flex flex-col">
    <div class="my-8 bg-white shadow-lg m-auto rounded-lg p-8 w-1/2">
    <h2 class="font-medium text-lg text-dark p-auto m-auto">   
    <?php 
    foreach ($selectedAppt as $appt) {
        $appt['appt_id'] . "<br>";
        $appt['appt_date'] . "<br>";
        $appt['appt_time'] . "<br>";
        $appt['therapist_name']; 

        
    }
    $_SESSION['appt_id']=$appt['appt_id'] ; 
    $_SESSION['appt_date']=$appt['appt_date']; 
    $_SESSION['appt_time']=$appt['appt_time']; 
    $_SESSION['therapist_name']=$appt['therapist_name']; 
    
    
     echo 'Souhaitez-vous annuler le rendez-vous du '. $appt['appt_date'].' à '.$appt['appt_time'].' avec '.$appt['therapist_name'].' ?'; ?>
    </h2>                                                   
   <form action="canceled_appt.php" method="post" class="grid grid-cols-2 gap-4">
   <button type="submit" class=" font-medium border rounded-lg mx-8 mt-6 bg-amber-400 p-4 shadow-md shadow-gray-200 hover:cursor-pointer hover:shadow-gray-300  hover:bg-amber-300 transition duration-300 hover:outline outline-offset-2 outline-blue-500">Valider</button>
   <a href="logged.php"  class=" font-medium border rounded-lg mx-8 mt-6 bg-red-400 p-4 shadow-md shadow-gray-200 hover:cursor-pointer hover:shadow-gray-300  hover:bg-red-300 transition duration-300 hover:outline outline-offset-2 outline-red-500">Annuler</a>
   </form> 



    </div>

</div>

</div>
 <?php $pdo=null ; ?>   
 </body>
 </html>