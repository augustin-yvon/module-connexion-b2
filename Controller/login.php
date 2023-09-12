<?php
require_once '../Model/User.php';
require_once '../Model/Database.php';
require_once '../Model/SqlRequest.php';

session_start();

$request = new SqlRequest();

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $login = htmlspecialchars($_POST["login"]);
    $password = htmlspecialchars($_POST["password"]);

    if ($request->checkInfo($login, $password)) {
        // Créer l'objet utilisateur
        $user = new User($login, $password);

        $id = $request->getId($login);

        // Ajouter l'id à l'objet utilisateur
        if ($id !== false) {
            $user->setId($id);
        }

        // Mettre l'utilisateur à l'état connecté
        $user->login();

        $_SESSION["user"] = $user;

        header("Location: ../View/profile.php");
        exit();
    } else {
        $error = "Login ou mot de passe incorrect.";
        $_SESSION['error'] = $error;
        header("Location: ../View/login.php");
        exit();
    }
}