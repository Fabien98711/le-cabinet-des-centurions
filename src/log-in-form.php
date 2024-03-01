<?php
session_start();



$postData=$_POST; 
$email=$postData['mail']; 
$password=$postData['password']; 


if (!isset($email) || !isset($password) ||empty($email) || empty($password) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo('Le mail ou le mot de passe ne sont pas valides');
    return;
}

  else{ try {

    require_once(__DIR__ . '/db_connect.php');
    
    $stmt= $pdo->prepare('SELECT password, username, user_id FROM user WHERE mail = :email'); 
    $stmt->bindParam(':email', $email, PDO::PARAM_STR); 
    $test=$stmt->execute(); 
    $user=$stmt->fetch(PDO::FETCH_ASSOC);

    
    $test= password_verify($password, $user['password']); 
    var_dump($test); 

    if($test){
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_id'] = $user['user_id']; 
        header("Location: logged.php");
    exit(); 
} else {
    $_SESSION['error']="Échec de la connexion, l'identifiant ou le mot de passe sont erronés.";
    header("Location: log-in.php"); 
    exit(); 
}
    


     

 }
    
 
 catch (PDOException $e) {
     // Gestion des erreurs PDO
     echo "Erreur : " . $e->getMessage();
 }

 $pdo=null; 
}

 





  