<?php session_start();

$postData= $_POST; 
$date= $postData['date']; 





 

try {
    require_once(__DIR__ . '/db_connect.php');
    // Configurer PDO pour signaler les erreurs
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connexion à la base de données réussie.";

} catch (PDOException $e) {
    // En cas d'erreur, afficher le message d'erreur
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}

$stmt1= $pdo->prepare('SELECT * FROM appt WHERE date =:date'); 
$stmt1->bindParam(':date', $date, PDO::PARAM_STR); 

$stmt1->execute(); 

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

return $result; 








$stmt=$pdo -> prepare('INSERT INTO appt (user_id, therapist_id, appt_date) VALUES (:user_id, :therapist_id, :appt_date)'); 


$stmt->bindParam(':user_id',$_SESSION['user_id'], PDO::PARAM_STR ); 
$stmt->bindParam(':therapist_id', $_SESSION['therapist_id'],PDO::PARAM_STR) ;
$stmt->bindParam(':appt_date', $date, PDO::PARAM_STR  ); 


$stmt->execute(); 







?>
