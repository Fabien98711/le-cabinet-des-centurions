<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/ProjetCnam/dist/output.css">
</head>
<body class="bg-cover bg-center h-screen" style="background-image: url('../dist/images/bg-img.jpg');">
    
        <div class="bg-gradient-to-r from-cyan-600 to-blue-600 opacity-75 h-screen flex flex-col">

            <?php require_once(__DIR__ . '/header.php'); ?>

            <div class="my-8 bg-white shadow-lg m-auto rounded-lg p-8 w-1/2">
                
                <?php
                if (isset($_SESSION['error'])) {//vérifie que la variable de session 'error' est définie
                    echo '<p class="bg-red-500 text-white p-4 rounded-xl m-4">' . htmlspecialchars($_SESSION['error']) . '</p>';
                    unset($_SESSION['error']);//l'erreur n'est affichée qu'une seule fois
                }
                ?>
                <h2 class="text-xl font-medium">Connectez-vous</h2>
                <form action="log-in-form.php"  method="post" class="grid my-6">
                    
                    <input type="email" id="mail" name="mail" placeholder="Email"required class=" my-2 mx-4 p-2 shadow-md shadow-gray-200 rounded   hover:cursor-text hover:shadow-gray-300 placeholder-slate-600  focus:placeholder-slate-300 ">
                    
                    <input type="password" id="password" name="password" placeholder="Mot de passe"required class="my-2 mx-4 p-2 shadow-md shadow-gray-200 rounded   hover:cursor-text hover:shadow-gray-300 placeholder-slate-600  focus:placeholder-slate-300 ">
                    <input type="submit" value="Se connecter" class=" font-medium border rounded-lg mt-8 bg-amber-400 p-4 shadow-md shadow-gray-200 hover:cursor-pointer hover:shadow-gray-300 hover:bg-amber-300 transition duration-300">
                    
                </form>
                <h6 class="font-medium">Pas encore de compte? <a href="./sign-in.php" class="text-blue-400 font-medium hover:text-blue-600 transition duration-300">Inscrivez-vous</a></h6>

            </div>

             

        </div>
    
</body>
</html>