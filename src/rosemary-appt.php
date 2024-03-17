<?php session_start(); 
$id='t03'; 
$name='Rose Mary'; 
$_SESSION['therapist_id']=$id;
$_SESSION['therapist_name']=$name; ?>

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
<body>


<div class="bg-cover bg-center h-screen " style="background-image: url('../dist/images/bg-img2.jpg');">
    <div class="bg-gradient-to-r from-cyan-600 to-blue-600 opacity-75 h-full flex flex-col content-center justify-center items-center">
    <?php require_once(__DIR__ . '/calendar.php'); ?>
    </div>
</div>






</body>
<script src="http://localhost/ProjetCnam/dist/calendar.js"></script>
</html>
