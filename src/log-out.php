<?php session_start(); ?>





<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirection</title>
    <meta http-equiv="refresh" content="2;url=index.php"> <!-- Redirigez vers la page d'accueil après 2 secondes -->
    <link rel="stylesheet" href="http://localhost/ProjetCnam/dist/output.css">
</head>
<body>
    <div class="bg-cover bg-center h-screen" style="background-image: url('../dist/images/bg-img5.jpg');">
        <div class="bg-gradient-to-r from-cyan-600 to-blue-600 opacity-75 h-screen">
        <h1 class="font-medium text-xl text-white text-center p-8">A bientôt <?php echo $_SESSION['username']; ?></h1>
        </div>
    </div>

    <?php session_destroy();
?>

</body>
</html>





