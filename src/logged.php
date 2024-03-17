
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/ProjetCnam/dist/output.css">
</head>
<body class="bg-slate-200 border">
    <div class="bg-cover bg-center h-screen rounded-br-full " style="background-image: url('../dist/images/bg-img4.jpg');">
    
        <div class="bg-gradient-to-r from-cyan-600 to-blue-600 opacity-75 h-screen rounded-br-full">
           
            
        <?php require_once(__DIR__ . '/header.php'); ?>

            <div class="grid grid-cols-3 gap-3 grid-rows-3 ">
                <h2 class="font-medium text-lg text-white p-6 col-span-1  mx-2 "> Bonjour <span class="text-xl "><?php echo $_SESSION['username']; ?></span></h2>
                
                
                <nav class= "col-start-2 col-end-4 m-4 p-4">
                <ul class="text-white flex justify-around my-2 mx-4">
                    <a href="#presentation" class="px-4 py-2 mx-1 font-medium hover:border-b-2 border-slate-200 cursor-pointer duration-150 ">Qui sommes nous</a>
                    <a href="#treatment" class="px-4 py-2 mx-1 font-medium hover:border-b-2 border-slate-200 cursor-pointer duration-150 ">Traitements</a>
                    <a href="#articles" class="px-4 py-2 mx-1 font-medium hover:border-b-2 border-slate-200 cursor-pointer duration-150 ">Articles</a>
                    <a class="px-4 py-2 mx-1 border-2 border-slate-200 rounded-lg font-medium hover:scale-105 duration-150" href="./appt.php">Prendre un rendez-vous</a>
                </ul>

                </nav>
                
                <div class ="row-span-2 mx-2 p-6">
                <h2 class="text-lg text-white font-medium ">Bienvenue dans notre cabinet de kinésithéraphie et d'ostéopathie de Castelnau-le-Lez</h2> 
                    <p class="text-md text-white my-8 font-medium">Nous sommes heureux de vous accueillir du lundi au vendredi</p> 
                </div>

                <nav class= "col-start-2 col-end-4 m-2 py-4 px-8">
                    <ul class="text-white flex justify-around ">
                        <a class="px-4 py-2 mx-4 border-2 border-slate-200 rounded-lg font-medium hover:scale-105 duration-150 " href="fixed-appt-new.php">Vos rendez-vous</a>
                        
                        <a class="px-4 py-2 mx-4 border-2 border-slate-200 rounded-lg font-medium hover:scale-105 duration-150" href="./log-out.php">Se déconnecter</a>
                        
                        <a class="px-4 py-2 mx-4 border-2 border-slate-200 rounded-lg font-medium hover:scale-105 duration-150" href="./delete_perfil.php">Supprimer mon compte</a>
                    </ul>
                </nav>
            </div >

        </div>
        
    
    
    
        
    </div>

    <?php require_once(__DIR__ . '/main.php'); ?>

    
</body>
</html>