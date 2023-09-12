<?php
require_once 'Model/user.php';
require_once './html-element/header.php';
require_once './html-element/footer.php';
require_once './html-element/logState.php';

session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/png" href="./assets/img/gestionnaire-fichier.png" />
        <link rel="stylesheet" href="./assets/css/index.css">

        <script src="assets/js/main.js"></script>

        <title>Module de Connexion B2</title>
    </head>

    <body>
        <?php echo generateHeaderIndex(); ?>

        <section class="main-container">

            <?php echo generateLogStateIndex(); ?>

            <h1>Bienvenue sur le Module de Connexion</h1>

            <div class="buttons">
                <a href="View/register.php" class="button">Inscription</a>
                
                <a href="View/login.php" class="button">Connexion</a>
            </div>

            <!-- <img id="switchTheme" src="assets/img/theme-sombre.png" alt="clair/sombre"> -->
        </section>


        <?php echo generateFooterIndex(); ?>
    </body>
</html>