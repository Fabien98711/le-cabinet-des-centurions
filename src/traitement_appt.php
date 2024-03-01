<?php session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="http://localhost/ProjetCnam/dist/output.css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://kendo.cdn.telerik.com/2022.1.301/styles/kendo.default-v2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    
    <script src="https://kendo.cdn.telerik.com/2022.1.301/js/kendo.all.min.js"></script>
</head>
<body>

<?php

$_SESSION['motive']=$_POST['motive']; 

//verifie l'heure a été soumise

if($_SERVER["REQUEST_METHOD"] == "POST" && isset ($_POST['selected_time'])){
    $selectedTime=$_POST['selected_time']; 
    $_SESSION['time']=$selectedTime; 
}





       
?>
<div class="bg-cover bg-center h-screen " style="background-image: url('../dist/images/bg-img2.jpg');">
<div class="bg-gradient-to-r from-cyan-600 to-blue-600 opacity-75 h-full flex flex-col">
    <div class="m-auto bg-white shadow-lg  rounded-lg p-8 w-1/2 ">
    <h2 class="font-medium text-xl text-dark p-auto m-auto grid grid-rows-3">
    <span class="m-auto my-4"><?php echo 'Prendre rendez-vous avec ' .$_SESSION['therapist_name']; ?> <br> </span>
    <span class="m-auto my-2">le <?php echo $_SESSION['date'];   ?> <br> </span>
    <span class="m-auto my-2">à <?php echo $_SESSION['time'];  ?> <br> </span>  
    <span class="m-auto my-2">Motif:  <?php echo $_SESSION['motive'];  ?> <br> </span>  
    </h2>
   <form action="validate_appt.php" method="post" class="grid grid-cols-2">
   <button type="submit" class=" font-medium border rounded-lg mx-8 mt-6 bg-amber-400 p-4 shadow-md shadow-gray-200 hover:cursor-pointer hover:shadow-gray-300  hover:bg-amber-300 transition duration-300 ">Valider</button>
   <a href="logged.php" class=" font-medium border rounded-lg mx-8 mt-6 bg-red-400 p-4 shadow-md shadow-gray-200 hover:cursor-pointer hover:shadow-gray-300  hover:bg-red-300 transition duration-300 ">Annuler</a>
   </form> 



    </div>

</div>

</div>



    
</body>
<script src="http://localhost/ProjetCnam/dist/calendar.js"></script>
</html>

