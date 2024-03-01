<?php session_start();
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
    <div class="bg-cover bg-center h-screen " style="background-image: url('../dist/images/bg-img2.jpg');">
        <div class="bg-gradient-to-r from-cyan-600 to-blue-600 opacity-75 h-full flex flex-col">
        <div class="my-8 bg-white shadow-lg m-auto rounded-lg p-8 w-1/2">
        <h2 class="font-medium text-lg text-dark p-auto m-auto flex justify-center">
            <span class="m-auto my-4 p-2"><?php echo $_SESSION['username']. ', souhaitez vous supprimer votre profil ?'; ?></span>
        </h2>
        <form action="deleted.php" method="post" class="grid grid-cols-2 gap-4">
   <button type="submit" class=" font-medium border rounded-lg mx-8 mt-6 bg-amber-400 p-4 shadow-md shadow-gray-200 hover:cursor-pointer hover:shadow-gray-300  hover:bg-amber-300 transition duration-300 hover:outline outline-offset-2 outline-blue-500">Valider</button>
   <a href="logged.php"  class=" font-medium border rounded-lg mx-8 mt-6 bg-red-400 p-4 shadow-md shadow-gray-200 hover:cursor-pointer hover:shadow-gray-300  hover:bg-red-300 transition duration-300 hover:outline outline-offset-2 outline-red-500">Annuler</a>
   </form> 

        </div>
    </div>
    
</body>
</html>