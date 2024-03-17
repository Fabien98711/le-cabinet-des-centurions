<?php session_start();
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

<div class="bg-cover bg-center h-screen  " style="background-image: url('../dist/images/bg-img2.jpg');">
    <div class="bg-gradient-to-r from-cyan-600 to-blue-600 opacity-75 h-screen overflow-y-auto ">
    <nav class=' mx-4 p-2 px-4 border-b flex justify-end' >
            <a href="./logged.php" class="text-white p-4 border rounded-lg border-slate-200 font-medium hover:scale-105 duration-150">retour à votre espace</a>  
    </nav>

    

    <h2 class="font-medium text-xl text-white text-center  p-8"> <?php echo $_SESSION['username'] ?>, voici vos rendez-vous. </h2>
    <?php


require_once(__DIR__ . '/db_connect.php');
    $stmt = $pdo->prepare('SELECT *  FROM appt WHERE user_id = :user'); 
    $stmt->bindParam(':user', $_SESSION['user_id'], PDO::PARAM_STR); 
    $stmt->execute(); 

    $fixed_appt=$stmt->fetchAll(PDO::FETCH_ASSOC); 
     ?>

     <div class="w-3/4 m-auto p-4  grid grid-cols-3 rounded-2xl  max-h-5/6 ">

     <?php 
        foreach ($fixed_appt as $appt) {
           
             ?>

            <div class="bg-slate-300 m-6 rounded-xl p-6 text-lg  group/item  group/item hover:text-black ">
            <?php echo " Le " . $appt['appt_date']. "<br> à  " . $appt['appt_time'] . "<br> avec " . $appt['therapist_name'] ;   ?>  
            <div class="bg-white p-2 mx-2 my-6 rounded-xl">
            Motif de la consultation:<br> 
                <?php echo $appt['motive'] ?>
            
            </div>
            <a class=' flex justify-center items-center m-4 p-2 group/edit rounded-lg invisible text-base hover:bg-red-300 group-hover/item:visible ' href="cancel_appt.php?id=<?php echo $appt['appt_id']; ?>">Supprimer</a>
        
            </div>
            <?php } ?>

     </div>

    </div>
</div>

<?php 
$pdo=null; ?>
    
</body>


</html>