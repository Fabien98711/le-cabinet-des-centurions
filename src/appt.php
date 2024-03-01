<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr" class="min-h-100vh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/ProjetCnam/dist/output.css">
</head>
<body class="min-h-full">

<div class="bg-cover bg-center min-h-100vh  " style="background-image: url('../dist/images/bg-img2.jpg');">
    <div class="bg-gradient-to-r from-cyan-600 to-blue-600 opacity-75 h-screen ">
    <h1 class="font-medium text-xl text-white text-center  p-8">Avec qui souhaitez vous prendre un rendez-vous?
</h1>

<nav class="mt-16 mx-10 min-h-100vh">
    <ul class="grid grid-cols-4 h3/4 mx-4 my-auto">

    <li class=" bg-white  mx-8  rounded-3xl hover:outline outline-offset-2 outline-amber-300 ">
            <a href="./damien-appt.php" class="p-4 ">
                <div class="flex flex-col items-center">
                    <!-- Image du kiné (ajustez le chemin de l'image) -->
                    <img  class=" rounded-full w-5/6 lg:h-48 md:h-24  "src="../dist/images/damien_perfil.jpeg" alt="Damien" width="50" height="50">
                    <!-- Nom du kiné -->
                    <span class="mt-6 text-lg font-medium">Damien</span>
                </div>
            </a>
        </li>
        <li class=" bg-white  mx-8 rounded-3xl hover:outline outline-offset-2 outline-amber-300 hover:duration:500 ">
            <a href="./maelle-appt.php" class="p-4 ">
                <div class="flex flex-col items-center ">
                    <!-- Image du kiné (ajustez le chemin de l'image) -->
                    <img class=" rounded-full w-5/6 lg:h-48 md:h-24 object-cover" src="../dist/images/maëlle_perfil.jpeg" alt="Maëlle" width="20%" height="20%">
                    <!-- Nom du kiné -->
                    <span class="mt-6 text-lg font-medium">Maëlle</span>
                </div>
            </a>
        </li>
        <li class="bg-white   mx-8 rounded-3xl hover:outline outline-offset-2 outline-amber-300 hover:duration:500 ">
            <a href="./rosemary-appt.php" class="p-4">
                <div class="flex flex-col items-center ">
                    <!-- Image du kiné (ajustez le chemin de l'image) -->
                    <img class=" rounded-full w-5/6 lg:h-48 md:h-24 object-cover" src="../dist/images/therapist_perfil.jpg" alt="Rose Mary" width="50" height="50">
                    <!-- Nom du kiné -->
                    <span class=" mt-6 text-lg font-medium">Rose Mary</span>
                </div>
            </a>
        </li>
        <li class="bg-white  mx-8 rounded-3xl hover:outline outline-offset-2 outline-amber-300 hover:duration:500">
            <a href="./thibaut-appt.php" class="p-4">
                <div class="flex flex-col items-center">
                    <!-- Image du kiné (ajustez le chemin de l'image) -->
                    <img class=" rounded-full w-5/6 lg:h-48 md:h-24 object-cover "src="../dist/images/thibaut_perfil.jpeg" alt="Thibaut" width="50" height="50">
                    <!-- Nom du kiné -->
                    <span class=" mt-6 text-lg font-medium">Thibaut</span>
                </div>
            </a>
        </li>
    </ul>
</nav>
    </div>
</div>


    
</body>
</html>


