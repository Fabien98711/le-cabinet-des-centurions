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

<div class="bg-cover bg-center h-screen rounded-br-full " style="background-image: url('../dist/images/bg-img2.jpg');">
    <div class="bg-gradient-to-r from-cyan-600 to-blue-600 opacity-75 h-screen rounded-br-full">
    <?php require_once(__DIR__ . '/header.php'); ?>

    <h2 class="font-medium text-xl text-white text-center m-8 p-4"> <?php echo $_SESSION['username'] ?>, voici vos rendez-vous. </h2>
    <?php


    $pdo= new PDO('mysql:host = localhost;dbname=user; charset=utf8', 'root', ''); 
    $stmt = $pdo->prepare('SELECT *  FROM appt WHERE user_id = :user'); 
    $stmt->bindParam(':user', $_SESSION['user_id'], PDO::PARAM_STR); 
    $stmt->execute(); 

    $fixed_appt=$stmt->fetchAll(PDO::FETCH_ASSOC); 
    
                         
    
    foreach ($fixed_appt as $appt) {
        // Convertir la date dans le format souhaité
        $formattedDate = date("d F Y", strtotime($appt['appt_date']));
    
    
        // Afficher les informations avec la date formatée et un lien de suppression
        echo "<div class='  mb-4 grid grid-cols-2'>";
        echo "<div>"; 
        echo "<p class='font-medium text-base text-white text-center mx-6 px-4 py-2'>Le " . $formattedDate . ", à " . $appt['appt_time'] . ", avec " . $appt['therapist_name'] . "</p>"; 
        echo "</div>";
        
        
        echo "<div>"; 
        echo "<form action='cancel_appt.php' method='post' class='ml-2'>";
        echo "<input type='hidden' name='id' value='{$appt['appt_id']}'>";
        echo "<button type='submit' class=' px-2 py-2 m-1 text-sm  italic'>Supprimer</button>";
        echo "</form>";
        echo "</div>";
    
        echo "</div>";
    }
    


    ?>
    </div>
</div>

    
    
</body>
</html>