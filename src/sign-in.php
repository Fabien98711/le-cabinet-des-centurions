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
<body class="bg-cover bg-center h-screen" style="background-image: url('../dist/images/bg-img3.jpg');">
    <div class="bg-gradient-to-r from-cyan-600 to-blue-600 opacity-75 h-full flex flex-col overflow-y-auto">
        
    <?php require_once(__DIR__ . '/header.php'); ?>



        <div class="my-6 bg-white shadow-lg m-auto rounded-lg p-8 w-1/2">
        <?php
                if (isset($_SESSION['error-sign-in'])) {
                    echo '<p class="bg-red-500 text-white p-4 rounded-xl m-4">' . htmlspecialchars($_SESSION['error-sign-in']) . '</p>';
                    unset($_SESSION['error-sign-in']);
                }
                ?>
            <h2 class="text-xl font-medium ">Inscrivez-vous</h2>
            <form action="sign-in-form.php" method="POST" class="grid my-6">
                
                <input type="email" id="email" name="email" placeholder="Email" required class="my-2 mx-4 p-2 shadow-md shadow-gray-200 rounded   hover:cursor-text hover:shadow-gray-300 placeholder-slate-600  focus:placeholder-slate-300 ">
                
                <input type="text" id="userName" name="userName" placeholder="Identifiant" required class="my-2 mx-4 p-2  shadow-md shadow-gray-200 rounded hover:cursor-text hover:shadow-gray-300 placeholder-slate-600  focus:placeholder-slate-300 ">
                                                                 
                <input type="tel" id="phone" name="phone" placeholder="Téléphone" required class="my-2 mx-4 p-2  shadow-md shadow-gray-200 rounded hover:cursor-text hover:shadow-gray-300 placeholder-slate-600  focus:placeholder-slate-300 ">
                
                <input type="password" id="password" name="password" placeholder="Mot de passe" required class="my-2 mx-4 p-2  shadow-md shadow-gray-200 rounded hover:cursor-text hover:shadow-gray-300 placeholder-slate-600  focus:placeholder-slate-300  ">
                <button type="submit" class=" font-medium border rounded-lg mt-6 bg-amber-400 p-4 shadow-md shadow-gray-200 hover:cursor-pointer hover:shadow-gray-300  hover:bg-amber-300 transition duration-300">S'inscrire</button>
            </form>
            <h6 class="font-medium">Vous avez déjà un compte? <a href="./log-in.php" class="text-blue-400 font-medium  hover:text-blue-600 transition duration-300">Connectez-vous</a></h6>

        </div>

    </div>

    
</body>
</html>