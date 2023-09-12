<?php
require_once '../Model/User.php';
require_once '../Model/SqlRequest.php';
require_once '../html-element/header.php';
require_once '../html-element/footer.php';
require_once '../html-element/logState.php';

session_start();

$request = new SqlRequest();

// besoin de routeur pour mettre dans un autre fichier
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $login = $user->getLogin();
    $userID = $user->getId($login);
    if ($user->getLogState() == false) {
        header("Location: login.php");
        exit();
    }
}else {
    header("Location: login.php");
    exit();
}

// Récupérer les informations de l'utilisateur actuel à partir de la base de données
$result = $request->getLoginById($userID);

if ($result) {
    $currentLogin = $result['login'];
    $currentPassword = $result['password'];
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/png" href="../assets/img/gestionnaire-fichier.png" />
        <link rel="stylesheet" href="../assets/css/profile.css">

        <script src="../assets/js/main.js"></script>
        <script src="../assets/js/profile.js"></script>

        <title>Gestionnaire de fichier</title>
    </head>

    <body>
        <?php echo generateHeader(); ?>

        <section class="main-container">

            <?php echo generateLogState(); ?>
            
            <div class="container">
                <form id="profile-form" method="post" action="">
                    <div class="input-box">
                        <img src="../assets/img/login.png" alt="login icon" title="login">
                        <input type="text" id="login" name="login" placeholder="Login" value="<?php echo $currentLogin; ?>" required>
                    </div>

                    <div class="input-box">
                        <img src="../assets/img/password.png" alt="password icon" title="password">
                        <input type="password" id="password" name="password" placeholder="Password" value="<?php echo $currentPassword; ?>" required>
                    </div>

                    <button type="button" id="toggle-password">Show</button>

                    <input id="submit" type="submit" value="Edit">

                    <?php if (isset($error)) : ?>
                        <p class="error"><?php echo $error; ?></p>
                    <?php endif; ?>
                </form>
            </div>
        </section>

        <?php echo generateFooter(); ?>
    </body>
</html>