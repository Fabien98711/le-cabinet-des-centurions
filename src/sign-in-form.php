<?php
session_start();
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
  <div class="bg-gradient-to-r from-cyan-600 to-blue-600 opacity-75 h-screen "> 

  <?php
$postData = $_POST; 

 

function emailExists($email)//vérifier si le mail existe dans la base de données
{
    
  require_once(__DIR__ . '/db_connect.php');
    $stmt = $pdo->prepare('SELECT COUNT(*) AS count FROM user WHERE mail = :email');
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si le nombre de résultats est supérieur à 0, cela signifie que l'email existe déjà
    return $result['count'] > 0;
    $pdo=null; 
}


if (
  // Vérifie si l'email est manquant ou invalide
  (!isset($postData['email']) || !filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) ||
  // Vérifie si l'identifiant est manquant
  (!isset($postData['userName'])) ||
  // Vérifie si le numéro de téléphone est incorrect
  (!preg_match("#^(\+33|0)[67][0-9]{8}$#", $postData['phone'])) ||
  // Vérifie si le mot de passe est manquant
  (!isset($postData['password'])) ||
  // Vérifie si l'email est déjà dans la base de données
  emailExists($postData['email'])
) {
  // Si l'une des conditions ci-dessus est vraie, affichez un message d'erreur et arrêtez l'exécution
  $_SESSION['error-sign-in']="impossible de créer le compte, certains champs ne sont pas valides ou l'email est déjà utilisé.";
    header("Location: sign-in.php"); 
    exit();
  
}

else{

try {
    
  $pdo = new PDO ('mysql:host=localhost; dbname=user; charset=utf8', 'root', '');

    // vérifie que les données sont présentes dans $postData
    if (isset($postData['email'], $postData['userName'], $postData['phone'], $postData['password'])) {
        // Utilisez les valeurs récupérées du tableau $postData
        $email = $postData['email'];
        $userName = $postData['userName'];
        $phone = $postData['phone'];
        $password = $postData['password'];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Requête préparée pour l'insertion
        $stmt = $pdo->prepare("INSERT INTO user (mail, username, phone, password) VALUES (:email, :userName, :phone, :password)");

        // Liaison des valeurs avec les paramètres de la requête préparée
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':userName', $userName, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);

        // Exécution de la requête
        $stmt->execute();
        ?>

        <h3 class='font-medium text-xl text-white text-center p-12'> Votre profil a été créé avec succès</h3>
        <?php
        header("refresh:3;url=index.php");
        exit();

    } else {
        echo "Certaines données nécessaires sont manquantes dans \$postData.";
    }
} catch (PDOException $e) {
    // Gestion des erreurs PDO
    echo "Erreur : " . $e->getMessage();
}

// Fermeture de la connexion à la base de données
$pdo = null;

}

?>

  </div>
</div>


  
</body>
</html>


