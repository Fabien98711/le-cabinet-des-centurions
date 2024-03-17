<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planificateur de rendez-vous</title>
    <link rel="stylesheet" href="http://localhost/ProjetCnam/dist/output.css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://kendo.cdn.telerik.com/2022.1.301/styles/kendo.default-v2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    
    <script src="https://kendo.cdn.telerik.com/2022.1.301/js/kendo.all.min.js"></script>
</head>
<body class="bg-slate-200 " >
<div class="bg-cover bg-center h-screen" style="background-image: url('../dist/images/bg-img9.jpg');">
    <div class="bg-gradient-to-r from-cyan-600 to-blue-600 opacity-75 h-screen flex content-center justify-center items-center">
    <?php 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['date'])) {
    $date = $_POST['date'];
    $_SESSION['date'] = $date;

    $timestamp = strtotime($date);
    $dayOfWeek = date('N', $timestamp); // Retourne le jour de la semaine en chiffre (1 pour lundi, 2 pour mardi, etc.)

    // Vérifier si la date est un samedi ou un dimanche
    if ($dayOfWeek == 6 || $dayOfWeek == 7) {
        echo "<h3 class='font-medium text-xl text-white text-center p-12'>Nous sommes désolés, il n'y a aucun créneau disponible le week-end.</h3>";//pb d'affichage quand on met du margin au h
        header("refresh:3;url=appt.php");
        exit();
    } else {


try {
    require_once(__DIR__ . '/db_connect.php');
    // Configurer PDO pour signaler les erreurs
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer tous les créneaux disponibles pour la date donnée
    $allTimes = ['08:30', '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00','13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '17:00'];

    // Récupérer les créneaux déjà pris pour la date donnée
    $stmt1 = $pdo->prepare('SELECT appt_time FROM appt WHERE appt_date = :date AND therapist_id= :therapist_id');
    $stmt1->bindParam(':date', $date, PDO::PARAM_STR);
    $stmt1->bindParam(':therapist_id', $_SESSION['therapist_id'], PDO::PARAM_STR); 
    $stmt1->execute();

    $therapistTakenTimes = $stmt1->fetchAll(PDO::FETCH_COLUMN);

    $stmt2 = $pdo->prepare('SELECT appt_time FROM appt WHERE appt_date= :date AND user_id =:user_id'); 
    $stmt2->bindParam(':date', $date, PDO::PARAM_STR);
    $stmt2->bindParam(':user_id',$_SESSION['user_id'],PDO::PARAM_STR); 
    $stmt2->execute(); 

    $userTakenTimes=$stmt2->fetchAll(PDO::FETCH_COLUMN);

    // Calculer les créneaux disponibles
    $availableTimes = array_diff($allTimes, $therapistTakenTimes);
    $availableTimes = array_diff($availableTimes, $userTakenTimes ); 

    // Afficher le formulaire avec les créneaux disponibles
    if (empty($availableTimes)) {
        echo "<h3>Nous sommes désolés, il n'y a aucun créneau disponible à cette date.</h3>";
        header("refresh:3;url=appt.php");
        exit();
    } else {
?>
        <div class="flex content-center justify-center  bg-white shadow-lg   rounded-lg p-6 w-1/2 ">
        
        <form action="traitement_appt.php " method="POST" class="flex  flex-col ">
            <input type="hidden" name="date" value="<?php echo $date; ?>"/>
            
            <select name="selected_time" id="selected_time" class="p-2 border border-slate-500 rounded-xl" required>
                <option value="" class="p-2 border border-slate-400">-- Choisissez un créneau --</option>
                <?php
                foreach ($availableTimes as $time) {
                    echo "<option value=\"$time\">$time</option>";
                }
                ?>
                

                <textarea name="motive" id="motive" cols="30" rows="3" class=" mt-8 p-2 border border-slate-500 rounded-xl" placeholder="Motif de votre consultation"></textarea>  
            </select><br>
            
     

            
            <div class="flex flex-row ">
<button type="submit" class=" font-medium border rounded-lg mx-8 mt-4 bg-amber-400 p-4 shadow-md shadow-gray-200 hover:cursor-pointer hover:shadow-gray-300  hover:bg-amber-300 transition duration-300 ">Valider</button>
   <a href="logged.php" class=" font-medium border rounded-lg mx-8 mt-4 bg-red-400 p-4 shadow-md shadow-gray-200 hover:cursor-pointer hover:shadow-gray-300  hover:bg-red-300 transition duration-300 ">Annuler</a>
            </div>
            
        </form>
        </div>
        
<?php
    }
} catch (PDOException $e) {
    // En cas d'erreur, afficher le message d'erreur
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
}
} else {
    // Redirige l'utilisateur vers la première page si la date n'est pas définie
    header("Location: logged.php");
    exit();
}

$pdo = null;
?>
    </div>
</div>

</body>
<script src="http://localhost/ProjetCnam/dist/calendar.js"></script>
</html>