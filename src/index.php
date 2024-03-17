<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/ProjetCnam/dist/output.css">
    

</head>
<body class="bg-slate-200 border">
    <div class="bg-cover bg-center h-screen rounded-br-full " style="background-image: url('../dist/images/bg-img2.jpg');">
        <div class="bg-gradient-to-r from-cyan-600 to-blue-600 opacity-75 h-screen rounded-br-full">
            
        <?php require_once(__DIR__ . '/header.php'); ?>

           <div class="grid grid-cols-2">
            <div >
                <h1 class="text-3xl text-white m-8 p-8 font-medium">Le cabinet des Centurions</h1>
                <section class="m-8 p-8">
                    <h2 class="text-lg text-white font-medium">Bienvenue dans notre cabinet de kinésithéraphie et d'ostéopathie de Castelnau-le-Lez</h2> 
                    <p class="text-md text-white my-8 font-medium">Nous sommes heureux de vous accueillir du lundi au vendredi</p> 
                </section>
                <a href="./log-in.php" class="p-4 m-16 rounded-lg text-white border-2 border-slate-200 font-medium duration-150">Prendre un rendez-vous</a>
                                    
            </div>
            <nav>
                <ul class="text-white flex justify-end my-2 mx-4">
                    <a href="#presentation" class="link">Qui sommes nous</a>
                    <a href="#treatment" class="link">Traitements</a>
                    <a href="#articles" class="link">Articles</a>
                    <a class="px-4 py-2 mx-1 border-2 border-slate-200 rounded-lg font-medium hover:scale-105 duration-150" href="./log-in.php">Prendre un rendez-vous</a>
                </ul>
            </nav>

           </div> 


               
    </div>
    </div>
    <?php require_once(__DIR__ . '/main.php'); ?>
    
</body>
</html>