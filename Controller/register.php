<?php
require_once '../Model/User.php';
require_once '../Model/SqlRequest.php';

session_start();

$request = new SqlRequest();

$errors = array();

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupére les données du formulaire
    $login = htmlspecialchars($_POST["login"]);
    $firstname = htmlspecialchars($_POST["firstname"]);
    $lastname = htmlspecialchars($_POST["lastname"]);
    $password = htmlspecialchars($_POST["password"]);
    $confirmPassword = htmlspecialchars($_POST["confirm_password"]);

    // Vérifie si le login est déjà utilisé
    if ($request->validateLogin($login)) {
        $errors[] = "Ce login est déjà utilisé. Veuillez en choisir un autre.";
    }

    // Vérifie si le mot de passe respecte les critères
    $passwordPattern = "/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
    if (!preg_match($passwordPattern, $password)) {
        $errors[] = "Le mot de passe doit contenir au moins 8 caractères, une majuscule, un chiffre et un caractère spécial.";
    }

    // Vérifie si les mots de passe correspondent
    if ($password !== $confirmPassword) {
        $errors[] = "Les mots de passe ne correspondent pas.";
    }

    // Insére les données dans la base de données si aucune erreur n'est survenue
    if (empty($errors)) {
        unset($_SESSION['errors']);
        if ($request->register($login, $firstname, $lastname, $password)) {
            header("Location: ../View/login.php");
            exit();
        }
    }else {
        $_SESSION['errors'] = $errors;
        header("Location: ../View/register.php");
        exit();
    }
}